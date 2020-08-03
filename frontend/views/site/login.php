<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Account Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'login100-form validate-form flex-sb flex-w']); ?>

    <span class="login100-form-title p-b-32">
        <?= Html::encode($this->title) ?>
    </span>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput() ?>


    <div style="color:#999;margin:1em 0">
        <br>
        Create A New Account? <?= Html::a('<b><u>Sign Up</u></b>', ['site/signup']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Login', ['class' => 'login100-form-btn', 'name' => 'login-button']) ?>
    </div>



    <?php ActiveForm::end(); ?>
</div>
