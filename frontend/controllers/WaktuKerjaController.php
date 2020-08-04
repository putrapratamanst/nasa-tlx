<?php

namespace frontend\controllers;

use Yii;
use frontend\models\WaktuKerja;
use frontend\models\WaktuKerjaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WaktuKerjaController implements the CRUD actions for WaktuKerja model.
 */
class WaktuKerjaController extends Controller
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
     * Lists all WaktuKerja models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WaktuKerjaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WaktuKerja model.
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
     * Creates a new WaktuKerja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionCreate($id)
    {
        $model = new WaktuKerja();
        $waktuKerja = WaktuKerja::waktuKerjaByJabatan($id);

        $post = Yii::$app->request->post();
        if ($post) {    
            foreach ($post['post'] as $keypost => $valuepost) {
                $model = new WaktuKerja();
                $model->id_jabatan = $id;
                $model->hari = $keypost;
                $model->waktu_masuk = $valuepost['masuk'];
                $model->waktu_keluar = $valuepost['keluar'];
                $model->save();
            }
            return $this->redirect('/site/index');
        }

        return $this->render('create', [
            'model' => $model,
            'idJabatan' => $id,
            'waktuKerja' => $waktuKerja,
        ]);
    }

    /**
     * Updates an existing WaktuKerja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $waktuKerja = WaktuKerja::waktuKerjaByJabatan($id);

        $post = Yii::$app->request->post();
        if ($post) {
            foreach ($post['post'] as $keypost => $valuepost) {
                $model = WaktuKerja::waktuKerjaById($valuepost['id']);
                $model->waktu_masuk = $valuepost['masuk'];
                $model->waktu_keluar = $valuepost['keluar'];
                $model->save();
            }
            return $this->redirect('/site/index');
        }


        return $this->render('update', [
            'waktuKerja' => $waktuKerja,
            'idJabatan' => $id,

        ]);
    }

    /**
     * Deletes an existing WaktuKerja model.
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
     * Finds the WaktuKerja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WaktuKerja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WaktuKerja::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
