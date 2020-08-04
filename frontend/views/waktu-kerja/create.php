<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\WaktuKerja */

$this->title = 'Waktu Kerja';
$this->params['breadcrumbs'][] = ['label' => 'Waktu Kerja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="waktu-kerja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'isUpdate'=>false,
        'idJabatan' => $idJabatan,
        'waktuKerja' => $waktuKerja,

    ]) ?>

</div>
