<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\WaktuKerjaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Waktu Kerjas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="waktu-kerja-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Waktu Kerja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_jabatan',
            'hari',
            'waktu_masuk',
            'waktu_keluar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
