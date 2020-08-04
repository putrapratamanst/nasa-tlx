<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Aktivitas */

$this->title = 'Create Aktivitas';
$this->params['breadcrumbs'][] = ['label' => 'Aktivitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aktivitas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
