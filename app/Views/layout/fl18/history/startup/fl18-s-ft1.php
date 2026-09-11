<div class="table-responsive mt-3" id="fl18-s-ft1">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
            <th colspan="<?=6+$lenData?>" scope="col"><?php echo nl2br("VERIFICATION START UP OF FINAL TEST MACHINE")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="4">No</th>
            <th rowspan="4">Start up Check Item</th>
            <th colspan="3" rowspan="4"></th>
            <th rowspan="4">Standard</th>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <th colspan="3" colspan=<?= $lenData ?>>Hasil Start Up</th>
            <?php } ?>
        </tr>
        <tr>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <th colspan="3">Check</th>
            <?php } ?>
        </tr>
        <tr>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
            <?php } ?>
        </tr>
        <tr>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <th >Actual</th>
                <th >Adjust <br> YES / NO</th>
                <th >After Adjust</th>
            <?php } ?>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td >1</td>
            <td >Pemeriksaan Air Pressure</td>
            <td colspan="3"></td>
            <td >0.4 ~ 0.6 Mpa</td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td ><?= (string)$alldata[$i]['par001']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td ><?= (string)$alldata[$i]['par002']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td ><?= (string)$alldata[$i]['par003']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td rowspan="8">2</td>
            <td rowspan="8">Start Up Sample Measurement</td>
            <td rowspan="8">Ukur start up <br> sample pada <br> setiap holder</td>
            <td rowspan="8">H <br> O <br> L <br> D <br> E <br> R </td>
            <td >1</td>
            <td></td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par004']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+1]['par004']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+2]['par004']; ?></td>
            <?php } ?>
        </tr>

       <tr>
            <td >2</td>
            <td></td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par005']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+1]['par005']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+2]['par005']; ?></td>
            <?php } ?>
       </tr>

       <tr>
            <td >3</td>
            <td></td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par006']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+1]['par006']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+2]['par006']; ?></td>
            <?php } ?>
           
       </tr>

       <tr>
            <td >4</td>
            <td></td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par007']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+1]['par007']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+2]['par007']; ?></td>
            <?php } ?>
       </tr>

       <tr>
            <td >5</td>
            <td></td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par008']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+1]['par008']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+2]['par008']; ?></td>
            <?php } ?>
       </tr>

       <tr>
            <td >6</td>
            <td></td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par009']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+1]['par009']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+2]['par009']; ?></td>
            <?php } ?>
       </tr>

       <tr>
            <td >7</td>
            <td></td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par010']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+1]['par010']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+2]['par010']; ?></td>
            <?php } ?>
       </tr>

       <tr>
            <td >8</td>
            <td></td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par011']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+1]['par011']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+2]['par011']; ?></td>
            <?php } ?>
       </tr>

       <tr>
            <td >3</td>
            <td >Pengukuran sample OK dan NG</td>
            <td colspan="3">Pastikan sample OK dijudgement OK <br> (masuk ke tray rank 1) dan sample NG <br> dijudgement NG (masuk ke box NG)</td>
            <td></td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par012']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+1]['par012']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+2]['par012']; ?></td>
            <?php } ?>
       </tr>
       
       <tr>
            <td >4</td>
            <td >Pemeriksaan Contact Pin</td>
            <td colspan="3">Cek kondisi probe pin holder apakah <br> terjadi pembengkokan, patah</td>
            <td></td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par013']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+1]['par013']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+2]['par013']; ?></td>
            <?php } ?>
       </tr>

       <tr>
            <td >5</td>
            <td >Cleaning Machine</td>
            <td colspan="3">Bersihkan mesin dari debu atau <br> kotoran dengan lap dan dari device <br> yang terjatuh</td>
            <td></td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par014']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+1]['par014']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i+2]['par014']; ?></td>
            <?php } ?>
           
       </tr>

       <tr>
            <td >6</td>
            <td >Cek Temperature dalam mesin Final <br> Test</td>
            <td colspan="3">Lihat temperature pada digital <br> thermometer di dalam mesin FT <br> Standard : 22 ~ 28°C</td>
            <td></td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par015']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par016']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par017']; ?></td>
            <?php } ?>
       </tr>

       <tr>
            <td colspan="6">Confirmation Lot No.</td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par018']; ?></td>
            <?php } ?>
       </tr>

       <tr>
            <td colspan="6">NOTE</td>
            <?php for($i = 0; $i < $lenData; $i=$i+3) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par019']; ?></td>
            <?php } ?>
       </tr>


    </tbody>
    </table>
</div>