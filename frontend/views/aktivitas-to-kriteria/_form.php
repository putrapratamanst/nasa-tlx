<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AktivitasToKriteria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aktivitas-to-kriteria-form">

    <form action="create?idKriteria=<?= $idKriteria ?>" method="POST">
        <table>
            <?php
            foreach ($listAktivitasByJabatan as $key => $value) { ?>
                <tr>
                    <td><label for="fname"><?= $value['aktivitas']['nama_aktivitas']; ?></label></td>
                    <td><input type="number" id="fname" name="<?= $value['id']; ?>" value="" required></td>
                </tr>
            <?php } ?>
        </table><br>
        <?= Html::a('Back', ['/site/index'], ['class' => 'btn btn-success']) ?>
        <input type="submit" value="Submit" class="btn btn-primary">

    </form>

</div>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
