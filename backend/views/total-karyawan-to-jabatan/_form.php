<?php

use backend\models\Jabatan;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

    /* @var $this yii\web\View */
    /* @var $model backend\models\TotalKaryawanToJabatan */
    /* @var $form yii\widgets\ActiveForm */
$jabatan = Jabatan::find()->leftJoin('total_karyawan_to_jabatan', 'jabatan.id = total_karyawan_to_jabatan.id_jabatan')->where(['total_karyawan'=>NULL] )->all();
if(count($jabatan) == 0){
    $jabatan = Jabatan::find()->all();
}
$listData = ArrayHelper::map($jabatan, 'id', 'nama_jabatan');


?>

<div class="total-karyawan-to-jabatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jabatan')->dropDownList(
        $listData,
        ['prompt' => 'Select Jabatan', 'disabled' => !$model->isNewRecord ?  'disabled' : false])
        
    ?>

    <?= $form->field($model, 'total_karyawan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
