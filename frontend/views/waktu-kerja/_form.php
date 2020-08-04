<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\WaktuKerja */
/* @var $form yii\widgets\ActiveForm */

$hari = [
    1 => 'Senin',
    2 => 'Selasa',
    3 => 'Rabu',
    4 => 'Kamis',
    5 => 'Jumat',
    6 => 'Sabtu',
]
?>

<div class="waktu-kerja-form">
    <?php if ($isUpdate == false && count($waktuKerja) == 0) {  ?>

        <form action="create?id=<?= $idJabatan ?>" method="POST">

            <table>
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                    </tr>
                </thead>
                <?php
                foreach ($hari as $key => $value) { ?>
                    <tr>
                        <td><label for="fname"><?= $value; ?></label></td>
                        <td><input type="time" id="fname" name="post[<?= $key; ?>][masuk]" value="" required></td>
                        <td><input type="time" id="fname" name="post[<?= $key; ?>][keluar]" value="" required></td>
                    </tr>
                <?php } ?>
            </table><br>
            <?= Html::a('Back', ['/site/index'], ['class' => 'btn btn-success']) ?>
            <input type="submit" value="Submit" class="btn btn-primary">

        </form>
    <?php }
    if (count($waktuKerja) > 0 && $isUpdate == false) { ?>
        <table>
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                </tr>
            </thead>
            <?php
            foreach ($waktuKerja as $keywaktuKerjas => $valuewaktuKerjas) { ?>
                <tr>
                    <td><label for="fname"><?= $hari[$valuewaktuKerjas->hari]; ?></label></td>
                    <td><?= $valuewaktuKerjas->waktu_masuk; ?></td>
                    <td><?= $valuewaktuKerjas->waktu_keluar; ?></td>
                </tr>
            <?php } ?>
        </table><br>
        <?= Html::a('Back', ['/site/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['update', 'id' => $idJabatan], ['class' => 'btn btn-danger']) ?>

    <?php }
    if ($isUpdate) { ?>
        <form action="update?id=<?= $idJabatan ?>" method="POST">

            <table>
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                    </tr>
                </thead>
                <?php
                foreach ($waktuKerja as $keywaktuKerja => $valuewaktuKerja) { ?>
                    <input type="hidden" id="id" name="post[<?= $keywaktuKerja; ?>][id]" value="<?= $valuewaktuKerja->id; ?>">

                    <tr>
                        <td><label for="fname"><?= $hari[$valuewaktuKerja->hari]; ?></label></td>
                        <td><input type="time" id="fname" name="post[<?= $keywaktuKerja; ?>][masuk]" value="<?= $valuewaktuKerja->waktu_masuk ?>" required></td>
                        <td><input type="time" id="fname" name="post[<?= $keywaktuKerja; ?>][keluar]" value="<?= $valuewaktuKerja->waktu_keluar ?>" required></td>
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
