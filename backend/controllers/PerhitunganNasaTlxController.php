<?php 

namespace backend\controllers;

use backend\models\Jabatan;
use backend\models\PerhitunganNasa;
use frontend\models\AktivitasToJabatan;
use frontend\models\Kriteria;
use Yii;
use yii\web\Controller;

class PerhitunganNasaTlxController extends Controller 
{
    public function actionAnalisisBebanKerja($id)
    {
        $listAktivitasByJabatan = AktivitasToJabatan::find()->with('aktivitas')->where(['id_jabatan' => $id])->asArray()->all();
        $listKriteria = Kriteria::listKriteria();

        $detailJabatan = Jabatan::detailJabatan($id);
        return $this->render('analisis-beban-kerja', [
            'namaJabatan' => $detailJabatan->nama_jabatan,
            'idJabatan' => $id,
            'listAktivitasByJabatan' => $listAktivitasByJabatan,
            'listKriteria' => $listKriteria,

        ]);
    }    

    public function actionHasil($id)
    {
        $perhitunganNasa = PerhitunganNasa::find()->where(['id_jabatan' => $id])->all();
        $listAktivitasByJabatan = AktivitasToJabatan::find()->with('aktivitas')->where(['id_jabatan' => $id])->asArray()->all();
        $listKriteria = Kriteria::listKriteria();

        $detailJabatan = Jabatan::detailJabatan($id);
        return $this->render('nasa_tlx', [
            'namaJabatan' => $detailJabatan->nama_jabatan,
            'idJabatan' => $id,
            'listAktivitasByJabatan' => $listAktivitasByJabatan,
            'listKriteria' => $listKriteria,
            'perhitunganNasa' => $perhitunganNasa,

        ]);
    }    
}
