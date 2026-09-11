<div class="table-responsive mt-3" id="fl18-s-bi">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("START UP CHECK SHEET OF BURN IN BOX MACHINE")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="3">Start up Checking Item</th>
            <th rowspan="3">Standard</th>
            <th rowspan="3">Battery ID</th>
            <th colspan=<?= 4+$lenData ?>>Hasil Start Up Check</th>
            <th rowspan="3">Note</th>
        </tr>
        <tr>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
            <?php } ?>
        </tr>
        <tr>
            <th >Result <br> (V)</th>
            <th >J</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td >@ Measure battery Voltage of <br> "Judgement LED Unit" <br> Ukur tegangan batterai untuk <br> "Judgment LED Unit"</td>
            <td >7 ~ 10V</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par001']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par002']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par003']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par004']; ?></td>
            <?php } ?>
        </tr>
    </tbody>
    
    </table>
    
    <div class="note">
        <h3>Ket :</h3>
        <p>
            - J : Judgment -> Fill judgment with : V = GOOD, X = Not Good (NG)
        </p>
        <p>
            - @ Tulis hasil pemeriksaan sesuai dengan angka yang ditunjukkan
        </p>
    </div>
</div>