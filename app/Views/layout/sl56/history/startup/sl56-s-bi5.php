<div class="table-responsive mt-3" id="sl56-s-bi5">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
        <th colspan=<?= 4+$lenData ?> scope="col"><?php echo nl2br("BURN IN START UP\n Daitoh Machine (Single Laser 5.6 RED GHZ002A4 (GH0632BA2GL))")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th colspan="2" scope="col" >Start Up Check Item</th>
            <th colspan="2" scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up</th>
        </tr>
        
        <tr>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
            <?php } ?>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td rowspan="3">1</td>
            <td rowspan="3" colspan="2"><br> See on indicator machine display <br> Memeriksa temperatur chamber Burn In <br> lihat pada indikator display mesin</td>
            <td rowspan="3">Temperature <br> setting</td>
            <td >Setting (write value) </td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par001']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >Actual (write value) </td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par002']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >(± 0.5°C from setting) <br> (Judge ok or not)</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par003']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td rowspan="2">2</td>
            <td rowspan="2">Checking Cooling Gas Pressure</td>
            <td >High Pressure Side</td>
            <td colspan="2">1.0 ~ 2.2 Mpa</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par004']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >Low Pressure Side</td>
            <td colspan="2">0.35 ~ 0.50 Mpa</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par005']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td rowspan="2">3</td>
            <td rowspan="2">Cleaning Machine <br> Clean machine in loader-unloader area <br> (Bersihkan mesin di area loader-unloader)</td>
            <td >Set</td>
            <td rowspan="2" colspan="2">Tidak ada foreign material, dirt, dust. <br> isi dengan "✔"</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par006']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >Reset</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par007']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td colspan="5">Note</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par008']; ?></td>
            <?php } ?>
        </tr>
    </tbody>   
    </table>
</div>