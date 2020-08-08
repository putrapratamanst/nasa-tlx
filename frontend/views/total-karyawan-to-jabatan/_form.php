<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TotalKaryawanToJabatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="total-karyawan-to-jabatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jabatan')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'total_karyawan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
