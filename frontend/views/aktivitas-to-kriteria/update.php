<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AktivitasToKriteria */

$this->title = 'Update Aktivitas To Kriteria: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aktivitas To Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aktivitas-to-kriteria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
