<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kriteria */

$this->title = 'Create Kriteria';
$this->params['breadcrumbs'][] = ['label' => 'Kriteria', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kriteria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
