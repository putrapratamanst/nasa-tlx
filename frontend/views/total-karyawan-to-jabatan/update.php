<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TotalKaryawanToJabatan */

$this->title = 'Update Total Karyawan To Jabatan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Total Karyawan To Jabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="total-karyawan-to-jabatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
