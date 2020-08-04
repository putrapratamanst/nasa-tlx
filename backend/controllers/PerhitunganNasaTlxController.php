<?php 

namespace backend\controllers;

use backend\models\Jabatan;
use frontend\models\AktivitasToJabatan;
use frontend\models\Kriteria;
use Yii;
use yii\web\Controller;

class PerhitunganNasaTlxController extends Controller 
{
    public function actionHasil($id)
    {
        $listAktivitasByJabatan = AktivitasToJabatan::find()->with('aktivitas')->where(['id_jabatan' => $id])->asArray()->all();
        $listKriteria = Kriteria::listKriteria();

        $detailJabatan = Jabatan::detailJabatan($id);
        return $this->render('hasil', [
            'namaJabatan' => $detailJabatan->nama_jabatan,
            'idJabatan' => $id,
            'listAktivitasByJabatan' => $listAktivitasByJabatan,
            'listKriteria' => $listKriteria,

        ]);
    }    
}
