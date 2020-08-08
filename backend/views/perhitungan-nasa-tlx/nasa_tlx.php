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
                <h4 class="panel-title">Beban Kerja: <?= $namaJabatan ?></h4>
            </a>
            <div id="collapseOne" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="headingOne" style="">
                <div class="panel-body">

                    <?php if (count($listByJabatan) > 0) { ?>

                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th>Aktivitas</th>
                                    <th colspan="7">Beban Kerja</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- munculkan kek yang d  excel -->
                            </tbody>


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
                                <th> Jam</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Total Menit Kerja</th>
                                <th> Menit</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;" rowspan="10">Jam Kerja Efektif dengan Allowance 5%</th>
                                <th>Menit</th>
                            </tr>
                            <tr>
                                <th>Jam Seminggu</th>
                            </tr>
                            <tr>
                                <th> Jam Perhari</th>
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
                                <th>Jam Per Tahun</th>
                            </tr>
                            <tr>
                                <th> Menit Per Tahun</th>
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
                                <th>Karyawan </th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Jumlah Karyawan Exsisting</th>
                                <th> Karyawan </th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Kurang Tambah</th>
                                <th>Karyawan</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Efektivitas Unit</th>
                                <th> Karyawan </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- end of accordion -->


</div>
