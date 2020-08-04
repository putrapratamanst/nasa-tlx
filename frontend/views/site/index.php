<?php

/* @var $this yii\web\View */

use frontend\models\AktivitasToKriteria;

$listByJabatan = AktivitasToKriteria::detailAktivitasToKriteriaByJabatan($idJabatan);

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron" style="padding: 0px;">
        <h1><?= Yii::$app->user->identity->username ?></h1>

        <p class="lead">
            <marquee>Selamat Datang di Aplikasi Penilaian Beban Kerja</marquee>
        </p>
        <hr>
    </div>

    <div class="body-content">

        <div class="row" style="text-align: center;">
            <?php
            foreach ($listKriteria as $key => $value) { ?>

                <div class="col-lg-6">
                    <h2><?= $value->nama_kriteria; ?></h2>
                    <?php
                    $aktivitasByKriteria = AktivitasToKriteria::detailAktivitasToKriteria($idJabatan, $value['id']);

                    if (!$aktivitasByKriteria) { ?>
                        <p><a class="btn btn-default" href="/aktivitas-to-kriteria/create?idKriteria=<?= $value->id; ?>">Input Data <?= $value->nama_kriteria; ?></a></p>
                    <?php } else { ?>
                        <p><a class="btn btn-primary" href="/aktivitas-to-kriteria/update?idKriteria=<?= $value->id; ?>">Update Data <?= $value->nama_kriteria; ?></a></p>
                    <?php }
                    ?>
                </div>
            <?php } ?>
        </div>
        <br>

        <?php if (count($listByJabatan) > 0) { ?>

            <table>
                <caption>FORM <?= strtoupper(Yii::$app->user->identity->username) ?></caption>

                <thead>
                    <tr>
                        <th>Aktivitas</th>
                        <?php
                        foreach ($listKriteria as $keylistKriteria => $valuelistKriteria) { ?>
                            <th><?= $valuelistKriteria->nama_kriteria ?></th>

                        <?php } ?>
                        <th>Beban Kerja</th>

                    </tr>
                </thead>


                <?php
                foreach ($listAktivitasByJabatan as $keylistAktivitasByJabatan => $valuelistAktivitasByJabatan) { ?>
                    <tr>
                        <td><?= $valuelistAktivitasByJabatan['aktivitas']['nama_aktivitas']; ?></td>
                        <?php
                        foreach ($listKriteria as $keylistKriteria => $valuelistKriteria) { ?>
                            <td>
                                <?php
                                $detailKriteriaJabatan = AktivitasToKriteria::detailAktivitasToKriteriaAndJabatan($idJabatan, $valuelistKriteria['id'], $valuelistAktivitasByJabatan['id_aktivitas']);
                                if ($detailKriteriaJabatan) { ?>

                                    <?= $detailKriteriaJabatan->value ?>
                            </td>
                        <?php } ?>

                    <?php } ?>
                    <td>
                        <?php 
                        $sum = 1;
                        $hasilBebanKerja = AktivitasToKriteria::bebanKerjaByAktifitas($idJabatan, $valuelistAktivitasByJabatan['id_aktivitas']);
                        foreach ($hasilBebanKerja as $keyhasilBebanKerja => $valuehasilBebanKerja) {
                            $beban = (int)$valuehasilBebanKerja->value;
                            $sum *= $beban;
                        }
                        echo $sum. " menit";
                        ?>

                        
                    </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>

    </div>
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
