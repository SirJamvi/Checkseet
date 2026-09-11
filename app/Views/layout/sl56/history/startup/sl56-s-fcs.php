<div class="table-responsive" id="slcs">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="4">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("FOREGOING CAP SEAL")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th rowspan="2" >No</th>
        <th rowspan="2" >Date</th>
        <th rowspan="2" >Shift</th >
        <th rowspan="2" >Group</th>
        <th rowspan="2" >Alasan Inspeksi</th>
        <th colspan="4" scope="col" >Visual & Peel Test Check *</th>
        <th colspan="5" scope="col" >Off Center & Stem Check</th>
        <th rowspan="2" >1st Lot Production Use</th>
        <th rowspan="2" >Notes</th>
      </tr>
      <tr>
        <th >ST1</th>
        <th >ST2</th>
        <th >ST3</th>
        <th >ST4</th>
        <th >Label</th>
        <th >ST1</th>
        <th >ST2</th>
        <th >ST3</th>
        <th >ST4</th>
      </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+4) { ?>
            <tr>
                <td rowspan="4" ><?= $i/2+1; ?></td>
                <td rowspan="4" ><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
                <td rowspan="4" ><?= (string)$alldata[$i]['shift']; ?></td>
                <td rowspan="4" ><?= (string)$alldata[$i]['group']; ?></td>
                <td rowspan="4" ><?= (string)$alldata[$i]['par002']; ?></td>
                <td rowspan="4" ><?= (string)$alldata[$i]['par035']; ?></td>
                <td rowspan="4" ><?= (string)$alldata[$i]['par036']; ?></td>
                <td rowspan="4" ><?= (string)$alldata[$i]['par037']; ?></td>
                <td rowspan="4" ><?= (string)$alldata[$i]['par038']; ?></td>
                <th scope="row">X.</th>
                <td rowspan="1" ><?= (string)$alldata[$i]['par017']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par018']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par019']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par020']; ?></td>
                <td rowspan="4" ><?= (string)$alldata[$i]['par003']; ?></td>
                <td rowspan="4" ><?= (string)$alldata[$i]['par004']; ?></td>
            </tr>
            <tr>
                <th scope="row">Y.</th>
                <td rowspan="1" ><?= (string)$alldata[$i]['par021']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par022']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par023']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par024']; ?></td>
            </tr>
            <tr>
                <th scope="row">r.</th>
                <td rowspan="1" ><?= (string)$alldata[$i]['par025']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par026']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par027']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par028']; ?></td>
            </tr>
            <tr>
                <th scope="row">s.</th>
                <td rowspan="1" ><?= (string)$alldata[$i]['par029']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par030']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par031']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par032']; ?></td>
            </tr>
            <?php } ?>
          
    </tbody>
  </table>
</div>