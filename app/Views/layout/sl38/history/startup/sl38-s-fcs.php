<div class="table-responsive mt-3" id="sl38-s-fcs">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("FOREGOING CAP SEAL")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" rowspan="2" >No.</th>
        <th class="input-form" rowspan="2" >Model Name</th>
        <th class="input-form" rowspan="2" >Mch. No.</th>         
        <th class="input-form" rowspan="2" >Lot No.</th> 
        <th class="input-form" rowspan="2" >Shift</th>
        <th class="input-form" rowspan="2" >Group</th>
        <th class="input-form" rowspan="2" >Date (dd/mm/yyyy)</th>
        <th class="input-form" rowspan="2" >Alasan Inspeksi</th>
        <th class="input-form" colspan="4" scope="col" >Visual & Peel Test Check *</th>
        <th class="input-form" colspan="5" scope="col" >Off Center & Stem Check</th>
        <th class="input-form" rowspan="2" >1st Lot Production Use</th>
        <th class="input-form" rowspan="2" >Notes</th>
      </tr>
      <tr>
        <th class="input-form" >ST1</th>
        <th class="input-form" >ST2</th>
        <th class="input-form" >ST3</th>
        <th class="input-form" >ST4</th>
        <th class="input-form" >Label</th>
        <th class="input-form" >ST1</th>
        <th class="input-form" >ST2</th>
        <th class="input-form" >ST3</th>
        <th class="input-form" >ST4</th>
      </tr>
    </thead>
    <tbody>
    <?php for($i = 0; $i < count($alldata); $i=$i+1) { ?>
        <tr>
            <td rowspan="3" ><?= $i+1; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['model']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['machno']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['lotno']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['shift']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['group']; ?></td>
            <td rowspan="3" ><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['par001']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['par002']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['par003']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['par004']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['par005']; ?></td>
            <th scope="row">X.</th>
            <td rowspan="1" ><?= (string)$alldata[$i]['par006']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par007']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par008']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par009']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['par010']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['par011']; ?></td>
        </tr>
        <tr>
            <th scope="row">Y.</th>
            <td rowspan="1" ><?= (string)$alldata[$i]['par012']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par013']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par014']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par015']; ?></td>
        </tr>
        <tr>
            <th scope="row">r.</th>
            <td rowspan="1" ><?= (string)$alldata[$i]['par016']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par017']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par018']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par019']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
  </table>
</div>