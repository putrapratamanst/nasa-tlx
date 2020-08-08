<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TotalKaryawanToJabatan */

$this->title = 'Create Total Karyawan To Jabatan';
$this->params['breadcrumbs'][] = ['label' => 'Total Karyawan To Jabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="total-karyawan-to-jabatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
