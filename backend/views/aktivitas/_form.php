<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Aktivitas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aktivitas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_aktivitas')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
