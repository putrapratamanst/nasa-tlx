<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AktivitasToKriteria */

$this->title = "Kriteria : {$namaKriteria}";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aktivitas-to-kriteria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'listAktivitasByJabatan' => $listAktivitasByJabatan,
        'idKriteria' => $idKriteria,
    ]) ?>

</div>
