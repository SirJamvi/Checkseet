<div class="table-responsive mt-3" id="sl38-f-fldsm">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
        <th colspan=<?= 12+$lenData ?> scope="col"><?php echo nl2br("FOREGOING LDSM MACHINE")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="3">No</th>
            <th rowspan="3">Model Name</th>
            <th rowspan="3">Lot.No</th>
            <th rowspan="3">Operator Name</th>
            <th rowspan="3">Date</th>
            <th rowspan="3">Shift</th>
            <th rowspan="3">Group</th>
            <th colspan="6" scope="col">Die Bonding Strength*</th>
            <th colspan="2" scope="col">Wettability area >= 90%</th>
            <th rowspan="3">Remark</th>
        </tr>
        <tr>
            <th rowspan="2">Sample</th>
            <th scope="col" colspan="3">LD Chip & SM</th>
            <th scope="col" colspan="2">Submount & Stem</th>
            <th rowspan="2">LD Chip & SM</th>
            <th rowspan="2">Submount & Stem</th>

        </tr>
        <tr>
            <th scope="col">Result</th>
            <th scope="col">Remain <br> % LD</th>
            <th scope="col">Judge <br> (OK/NG)</th>
            <th scope="col">Result</th>
            <th scope="col">Judge <br> (OK/NG)</th>
        </tr>
    </thead>

    <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+4) { ?>
        <tr>
            <td rowspan="4" ><?= $i/4+1; ?></td>
            <td rowspan="4" ><?= (string)$alldata[$i]['model']; ?></td>
            <td rowspan="4" ><?= (string)$alldata[$i]['lotno']; ?></td>
            <td rowspan="4" ><?= (string)$alldata[$i]['empid']; ?></td>
            <td rowspan="4" ><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
            <td rowspan="4" ><?= (string)$alldata[$i]['shift']; ?></td>
            <td rowspan="4" ><?= (string)$alldata[$i]['group']; ?></td>
            <td rowspan="1" ><b>Front 1</b></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par017']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par018']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par035']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par019']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par036']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par037']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par038']; ?></td>
            <td rowspan="4" ><?= (string)$alldata[$i]['par003']; ?></td>
        </tr>
        <tr>
            <td rowspan="1" ><b>Front 2</b></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par020']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par021']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+1]['par035']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par022']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+1]['par036']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+1]['par037']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+1]['par038']; ?></td>
        </tr>
        <tr>
            <td rowspan="1" ><b>Back 1</b></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par023']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par024']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par035']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par025']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par036']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par037']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par038']; ?></td>
        </tr>
        <tr>
            <td rowspan="1" ><b>Back 2</b></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par026']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par027']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+3]['par035']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par028']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+3]['par036']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+3]['par037']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+3]['par038']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
</div>