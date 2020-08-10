<?php

use backend\models\WaktuKerja;
use frontend\models\AktivitasToKriteria;
use frontend\models\TotalKaryawanToJabatan;

$listByJabatan = AktivitasToKriteria::detailAktivitasToKriteriaByJabatan($idJabatan);

?><div class="x_content">

    <!-- start accordion -->
    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel">
            <a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <h4 class="panel-title">NASA-TLX: <?= $namaJabatan ?></h4>
            </a>
            <div id="collapseOne" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="headingOne" style="">
                <div class="panel-body">

                    <?php if (count($listByJabatan) > 0) { ?>

                        <table class="table table-bordered">

                            <thead>
                                <tr style="text-align: center;">
                                    <th rowspan="2">Aktivitas</th>
                                    <th rowspan="2">Volume Kerja</th>
                                    <th colspan="6">Beban Kerja</th>
                                    <th rowspan="2">Total</th>
                                    <th rowspan="2">Beban Kerja</th>
                                    <th rowspan="2">Rata Rata</th>
                                </tr>
                                <tr style="text-align: center;">
                                    <?php
                                    $waktuKerja = WaktuKerja::waktuKerjaByJabatan($idJabatan);
                                    $hari = "";
                                    $totalInterval = 0;
                                    foreach ($waktuKerja as $keywaktuKerja => $valuewaktuKerja) {
                                        switch ($valuewaktuKerja['hari']) {
                                            case 1:
                                                $hari = "Senin";
                                                break;
                                            case 2:
                                                $hari = "Selasa";
                                                break;
                                            case 3:
                                                $hari = "Rabu";
                                                break;
                                            case 4:
                                                $hari = "Kamis";
                                                break;
                                            case 5:
                                                $hari = "Jumat";
                                                break;
                                            case 6:
                                                $hari = "Sabtu";
                                                break;

                                            default:
                                                # code...
                                                break;
                                        } ?>
                                        <td><?= $hari ?></td>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $detailKriteriaJabatanSum = 0;
                                $sumTotal = 0;
                                $sumTotalArray = [];

                                foreach ($listAktivitasByJabatan as $keylistAktivitasByJabatan => $valuelistAktivitasByJabatan) {
                                ?>
                                    <tr>
                                        <td><?= $valuelistAktivitasByJabatan['aktivitas']['nama_aktivitas']; ?>
                                        </td>

                                        <td>
                                            <?php
                                            $detailKriteriaJabatan = AktivitasToKriteria::detailAktivitasToKriteriaAndJabatan($idJabatan, 2, $valuelistAktivitasByJabatan['id_aktivitas']);
                                            if ($detailKriteriaJabatan) {
                                                $detailSum = (int)$detailKriteriaJabatan->value;
                                                $detailKriteriaJabatanSum += $detailSum;
                                            ?>
                                                <?= $detailKriteriaJabatan->value ?>
                                        </td>
                                    <?php } ?>

                                    <?php
                                    $waktuKerja = WaktuKerja::waktuKerjaByJabatan($idJabatan);
                                    $hari = "";
                                    $totalInterval = 0;
                                    foreach ($waktuKerja as $keywaktuKerja => $valuewaktuKerja) {
                                        switch ($valuewaktuKerja['hari']) {
                                            case 1:
                                                $hari = "Senin";
                                                break;
                                            case 2:
                                                $hari = "Selasa";
                                                break;
                                            case 3:
                                                $hari = "Rabu";
                                                break;
                                            case 4:
                                                $hari = "Kamis";
                                                break;
                                            case 5:
                                                $hari = "Jumat";
                                                break;
                                            case 6:
                                                $hari = "Sabtu";
                                                break;

                                            default:
                                                # code...
                                                break;
                                        }
                                    ?>
                                        <td><?php
                                            $a = new DateTime($valuewaktuKerja['waktu_masuk']);
                                            $b = new DateTime($valuewaktuKerja['waktu_keluar']);
                                            $interval = $a->diff($b);
                                            $intervalResult = $hari == "Sabtu" ? (int)$interval->format("%H")  : $interval->format("%H") - 1;
                                            $totalInterval += $intervalResult;
                                            echo  $intervalResult . " Jam";
                                            ?>
                                        </td>
                                    <?php } ?>
                                    <td> <?php
                                            $a = $detailKriteriaJabatan->value + $totalInterval;
                                            $sumTotal += $a;
                                            echo $a; ?>
                                    </td>
                                    <td><?= $a / 6 ?></td>
                                    <td><?= $a / 6 ?></td>
                                    </tr>
                                <?php
                                    array_push($sumTotalArray, $a / 6);
                                } ?>
                                <tr>
                                    <td>Total</td>
                                    <td><?= $detailKriteriaJabatanSum ?></td>
                                    <td colspan="6"></td>
                                    <td><?= $sumTotal ?></td>
                                    <td><?= $sumTotal / 6 ?></td>
                                    <td><?= $sumTotal / 6 ?></td>
                                </tr>
                            </tbody>


                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="panel">
            <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h4 class="panel-title">Waktu Kerja Per Tahun</h4>
            </a>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Beban Kerja</th>
                                <th>Norma Waktu</th>
                                <th>Hari Kerja /1 Tahun</th>
                                <th>Beban Kerja / 1 Tahun</th>
                                <th>Waktu Efektif Kerja / 1 Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sumTotalArray as $keysumTotalArray => $valuesumTotalArray) { ?>

                                <tr>
                                    <td><?= $valuesumTotalArray; ?></td>
                                    <td>5.6</td>
                                    <td>266</td>
                                    <td><?= $valuesumTotalArray * 5.6 * 266 ?></td>
                                    <td><?= 266 * 8.36 ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel">
            <a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <h4 class="panel-title">Kebutuhan Karyawan </h4>
            </a>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Jumlah Kebutuhan Karyawan</th>
                                <th><?php
                                    $jmlhKebutuhan = ($sumTotal / 6) / (266 * 8.36) * 100;
                                    echo $jmlhKebutuhan;
                                    ?> Karyawan
                                 
                            </th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Jumlah Karyawan Exsisting</th>
                                <th><?php
                                    $existingEmployee = TotalKaryawanToJabatan::find()->where(['id_jabatan' => $idJabatan])->one();
                                    $jmlExisting = $existingEmployee ? $existingEmployee->total_karyawan : 0;
                                    echo $jmlExisting;?> Karyawan </th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Kurang Tambah</th>
                                <th><?php
                                    $show = 0;
                                    if ($jmlhKebutuhan != 0) {

                                        $arrays = [];
                                        $strs = strval($jmlhKebutuhan);

                                        $arrs = explode(".", str_replace("'", "", $strs));

                                        foreach ($arrs as $elem)
                                            $arrays[] = trim($elem);

                                            $show = $arrays[0] - $jmlExisting;
                                    }

                                    if ($arrays[0] > $jmlExisting) {
                                        echo "-".$show;
                                    } else {
                                        echo $show;
                                    }

                                    ?> Karyawan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- end of accordion -->


</div>
