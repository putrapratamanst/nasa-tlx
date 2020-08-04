<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AktivitasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aktivitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aktivitas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Aktivitas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nama_aktivitas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
