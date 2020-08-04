<?php

use common\widgets\Alert;
use yii\helpers\Html;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= Yii::getAlias('@web/templates/') ?><?= Yii::getAlias('@web/templates/') ?>images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web/templates/') ?>vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web/templates/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web/templates/') ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web/templates/') ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web/templates/') ?>css/main.css">
    <!--===============================================================================================-->
    <style>
        .fade {
            opacity: 1;
            transition: opacity .15s linear;
        }
    </style>
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
                <?= Alert::widget() ?>

                <?= $content; ?>
            </div>
        </div>
    </div>

</body>

</html>
