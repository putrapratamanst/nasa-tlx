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
                <h4 class="panel-title">Analisis Beban Kerja: <?= $namaJabatan ?></h4>
            </a>
            <div id="collapseOne" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="headingOne" style="">
                <div class="panel-body">

                    <?php if (count($listByJabatan) > 0) { ?>

                        <table class="table table-bordered">

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
                            $totalBeban = 0;
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
                                    $totalBeban += $sum;
                                    echo $sum . " menit";
                                    ?>


                                </td>

                                </tr>
                            <?php } ?>
                            <tr>
                                <td>Total</td>
                                <?php
                                foreach ($listKriteria as $keylistKriterias => $valuelistKriterias) { ?>
                                    <td><?= AktivitasToKriteria::totalValue($idJabatan, $valuelistKriterias['id']) ?></td>
                                <?php } ?>
                                <td><?= $totalBeban ?> menit</td>

                            </tr>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="panel">
            <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h4 class="panel-title">Waktu Kerja</h4>
            </a>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Hari</th>
                                <th>Waktu Masuk</th>
                                <th>Waktu Keluar</th>
                                <th>Waktu Kerja</th>
                                <th>Waktu Istirahat</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <tr>
                                    <td><?= $hari ?></td>
                                    <td><?= $valuewaktuKerja['waktu_masuk'] ?></td>
                                    <td><?= $valuewaktuKerja['waktu_keluar'] ?></td>
                                    <td><?php
                                        $a = new DateTime($valuewaktuKerja['waktu_masuk']);
                                        $b = new DateTime($valuewaktuKerja['waktu_keluar']);
                                        $interval = $a->diff($b);
                                        $intervalResult = $hari == "Sabtu" ? (int)$interval->format("%H")  :$interval->format("%H") - 1;
                                        $totalInterval += $intervalResult;
                                        echo  $intervalResult . " Jam";
                                        ?></td>
                                    <td> 1 Jam</td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel">
            <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <h4 class="panel-title">Jam Kerja Efektif </h4>
            </a>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Total Jam Kerja</th>
                                <th><?= $totalInterval ?> Jam</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Total Menit Kerja</th>
                                <th><?php
                                    $totalMenit = $totalInterval * 60;
                                    echo $totalMenit;
                                    ?> Menit</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;" rowspan="10">Jam Kerja Efektif dengan Allowance 5%</th>
                                <th><?= (95 / 100) * $totalInterval * 60 ?> Menit</th>
                            </tr>
                            <tr>
                                <th><?= ((95 / 100) * $totalInterval * 60) / 60 ?> Jam Seminggu</th>
                            </tr>
                            <tr>
                                <th><?php
                                    $jamPerHari =  (((95 / 100) * $totalInterval * 60) / 60)/5;
                                    echo $jamPerHari
                                    ?> Jam Perhari</th>
                            </tr>
                            <tr>
                                <th><?php
                                    $array = [];
                                    $str = strval($jamPerHari);

                                    $arr = explode(".", str_replace("'", "", $str));

                                    foreach ($arr as $elem)
                                        $array[] = trim($elem);

                                    echo $array[0]." Jam " .(($array[1] /100) *60)." Menit";
                                    ?> </th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;" rowspan="10">Jumlah Hari Kerja Per Tahun</th>
                                <th>Jumlah hari pertahun</th>
                                <th>365 Hari</th>
                            </tr>
                            <tr>
                                <th>Libur Minggu</th>
                                <th>52 Hari</th>
                            </tr>
                            <tr>
                                <th>Libur Resmi</th>
                                <th>23 Hari</th>
                            </tr>
                            <tr>
                                <th>Cuti tahunan</th>
                                <th>12 Hari</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>87 Hari</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>278 Hari</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>32 Minggu</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>8 Bulan</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>2.66 Triwulan</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;" rowspan="2">Jam Kerja Efektif Per Tahun</th>
                                <th><?php
                                $jamPerTahun = $jamPerHari * 266;
                                echo $jamPerTahun
                                ?> Jam Per Tahun</th>
                            </tr>
                            <tr>
                                <th><?= $jamPerTahun * 60 ?> Menit Per Tahun</th>
                            </tr>
                        </thead>
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
                                
                                $jmlhKebutuhan = $jamPerHari == 0 ? 0 : $totalBeban / $jamPerTahun;
                                echo $jmlhKebutuhan ?> Karyawan </th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Jumlah Karyawan Exsisting</th>
                                <th><?php
                                    $existingEmployee = TotalKaryawanToJabatan::find()->where(['id_jabatan' => $idJabatan])->one();
                                    $jmlExisting=$existingEmployee ? $existingEmployee->total_karyawan : 0;
                                    echo $jmlExisting;
                                    ?> Karyawan </th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Kurang Tambah</th>
                                <th><?php
                                $show = 0;
                                if($jmlhKebutuhan != 0)
                                {

                                    $arrays = [];
                                    $strs = strval($jmlhKebutuhan);

                                    $arrs = explode(".", str_replace("'", "", $strs));

                                    foreach ($arrs as $elem)
                                        $arrays[] = trim($elem);

                                    $show = $arrays[0] - $jmlExisting;
                                }

                                    echo $show;

                                 ?> Karyawan</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Efektivitas Unit</th>
                                <th><?= $jamPerHari == 0 ? 0 : round($totalBeban / (($jamPerHari * $totalMenit) / 60)) ?> Karyawan </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- end of accordion -->


</div>
