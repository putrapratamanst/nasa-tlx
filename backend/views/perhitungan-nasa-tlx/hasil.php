<?php

use frontend\models\AktivitasToKriteria;

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
                <h4 class="panel-title">Collapsible Group Items #2</h4>
            </a>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <p><strong>Collapsible Item 2 data</strong>
                    </p>
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                </div>
            </div>
        </div>
        <div class="panel">
            <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <h4 class="panel-title">Collapsible Group Items #3</h4>
            </a>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <p><strong>Collapsible Item 3 data</strong>
                    </p>
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor
                </div>
            </div>
        </div>
    </div>
    <!-- end of accordion -->


</div>
