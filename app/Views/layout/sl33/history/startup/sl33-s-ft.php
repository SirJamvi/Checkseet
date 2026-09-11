<div class="table-responsive mt-3" id="sl33-s-ft">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
            <th colspan=<?= 5+(2*$lenData) ?> scope="col"><?php echo nl2br("FINAL TEST MACHINE START UP CHECK SHEET")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" rowspan="2">No</th>
            <th scope="col" rowspan="2">Start Up Check Item</th>
            <th colspan="3" rowspan="2">Standard</th>
            <th colspan="2" colspan=<?= $lenData ?>>Hasil Start Up</th>
        </tr>

        <tr>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="2"><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
            <?php } ?>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>1</td>
            <td >@ Air Pressure</td>
            <td colspan="3">0.4 ~ 0.6 MPa</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="2"><?= (string)$alldata[$i]['par001']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td rowspan="9">2</td>
            <td rowspan="9">Standard Sample Measurement <br> (Pengukuran Standard Sample)</td>
            <td rowspan="9">Ukur standard sample pada setiap holder</td>
            <td >In side</td>
            <td >Out side</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td >In side</td>
                <td >Out side</td>
            <?php } ?>
        </tr>

        <tr>
            <td >1</td>
            <td >1</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par002']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par003']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >2</td>
            <td >2</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par004']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par005']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >3</td>
            <td >3</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par006']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par007']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >4</td>
            <td >4</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par008']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par009']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >5</td>
            <td >5</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par010']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par011']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >6</td>
            <td >6</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par012']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par013']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >7</td>
            <td >7</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par014']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par015']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >8</td>
            <td >8</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par016']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par017']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >3</td>
            <td >Checking judgment <br> (Cek Judgment)</td>
            <td colspan="3">Pengukuran O.K sample dan NG sample <br> dan check judge harus benar</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="2"><?= (string)$alldata[$i]['par018']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >4</td>
            <td colspan="4">Cleaning device cramp parts and circle table fix parts each 8 parts by <br> alcohol <br> (Bersihkan bagian penjepit device dan circle table fix parts untuk <br> setiap 8 part dengan alkohol)</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="2"><?= (string)$alldata[$i]['par019']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >5</td>
            <td >Cleaning of Machine <br> (Membersihkan Mesin)</td>
            <td colspan="3">Bersihkan mesin dari debu atau kotoran <br> dengan Lap dan dari device yang terjatuh.</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="2"><?= (string)$alldata[$i]['par020']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td colspan="5" >Note</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="2"><?= (string)$alldata[$i]['par021']; ?></td>
            <?php } ?>
        </tr>
    </tbody>   
    </table>
</div>