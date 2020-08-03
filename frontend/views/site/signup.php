<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Account Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <span class="login100-form-title p-b-32">
        <?= Html::encode($this->title) ?>
    </span>



    <?php $form = ActiveForm::begin(['id' => 'form-signup', 'class' => 'login100-form validate-form flex-sb flex-w']); ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'login100-form-btn pull-right', 'name' => 'signup-button']) ?>
        <?= Html::a('Login', ['login'], ['class' => 'login100-form-btn pull-left']) ?>

    </div>

    <?php ActiveForm::end(); ?>
</div>
