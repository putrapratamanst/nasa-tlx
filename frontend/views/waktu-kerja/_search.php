<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\WaktuKerjaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="waktu-kerja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_jabatan') ?>

    <?= $form->field($model, 'hari') ?>

    <?= $form->field($model, 'waktu_masuk') ?>

    <?= $form->field($model, 'waktu_keluar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
