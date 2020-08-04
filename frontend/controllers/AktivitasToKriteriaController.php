<?php

namespace frontend\controllers;

use frontend\models\AktivitasToJabatan;
use Yii;
use frontend\models\AktivitasToKriteria;
use frontend\models\AktivitasToKriteriaSearch;
use frontend\models\Kriteria;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AktivitasToKriteriaController implements the CRUD actions for AktivitasToKriteria model.
 */
class AktivitasToKriteriaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AktivitasToKriteria models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AktivitasToKriteriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }


    /**
     * Displays a single AktivitasToKriteria model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AktivitasToKriteria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idKriteria)
    {
        $detailKriteria = Kriteria::detailKriteria($idKriteria);
        $idJabatan = Yii::$app->user->identity->jabatan; //pake ini, jangan pake user id. User tidak boleh bertambah karna ini hanya untuk kepala per bagian
        $listAktivitasByJabatan = AktivitasToJabatan::find()->with('aktivitas')->where(['id_jabatan' => $idJabatan])->asArray()->all();
        $post = Yii::$app->request->post();
        if ($post) {

            foreach ($post as $keypost => $valuepost) {
                $model = new AktivitasToKriteria();
                $model->id_kriteria = $idKriteria;
                $model->id_aktivitas = $keypost;
                $model->id_jabatan = $idJabatan;
                $model->value = $valuepost;
                $model->save();
            }
            return $this->redirect('/site/index');
        }

        return $this->render('create', [
            'listAktivitasByJabatan' => $listAktivitasByJabatan,
            'idKriteria' => $idKriteria,
            'namaKriteria' => $detailKriteria->nama_kriteria,
        ]);
    }

    /**
     * Updates an existing AktivitasToKriteria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idKriteria)
    {
        $detailKriteria = Kriteria::detailKriteria($idKriteria);
        $idJabatan = Yii::$app->user->identity->jabatan; //pake ini, jangan pake user id. User tidak boleh bertambah karna ini hanya untuk kepala per bagian
        $listAktivitasByJabatan = AktivitasToJabatan::find()->with('aktivitas')->where(['id_jabatan' => $idJabatan])->asArray()->all();
        $post = Yii::$app->request->post();
        if ($post) {
            foreach ($post as $key => $value) {
                $detailAktivitasKriteriaJabatan = AktivitasToKriteria::detailAktivitasToKriteriaById($key);
                $detailAktivitasKriteriaJabatan->value = $value;
                $detailAktivitasKriteriaJabatan->save();
            }
            return $this->redirect('/site/index');
        }
        
        return $this->render('update', [
            'listAktivitasByJabatan' => $listAktivitasByJabatan,
            'idKriteria' => $idKriteria,
            'idJabatan' => $idJabatan,
            'namaKriteria' => $detailKriteria->nama_kriteria,
        ]);
    }

    /**
     * Deletes an existing AktivitasToKriteria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AktivitasToKriteria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AktivitasToKriteria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AktivitasToKriteria::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
