<?php

use frontend\models\AktivitasToKriteria;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AktivitasToKriteria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aktivitas-to-kriteria-form">

    <?php if ($isUpdate == false) {  ?>

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
    <?php } else { ?>
        <form action="update?idKriteria=<?= $idKriteria ?>" method="POST">
            <table>
                <?php
                foreach ($listAktivitasByJabatan as $key => $value) {
                    $valueForm = NULL;
                    $detailKriteriaJabatan = AktivitasToKriteria::detailAktivitasToKriteriaAndJabatan($idJabatan, $idKriteria,$value['id']);
                    if($detailKriteriaJabatan){
                        $valueForm = $detailKriteriaJabatan->value;
                    }
                    ?>
                    <tr>
                        <td><label for="fname"><?= $value['aktivitas']['nama_aktivitas']; ?></label></td>
                        <td><input type="number" id="fname" name="<?= $detailKriteriaJabatan['id']; ?>" value="<?= $valueForm; ?>" required></td>
                    </tr>
                <?php } ?>
            </table><br>
            <?= Html::a('Back', ['/site/index'], ['class' => 'btn btn-success']) ?>
            <input type="submit" value="Submit" class="btn btn-primary">

        </form>

    <?php } ?>

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
