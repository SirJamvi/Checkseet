<div class="table-responsive mt-3" id="fl18-s-lc">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
      <tr>
        <th colspan=<?= 7+$lenData ?> scope="col"><?php echo nl2br("LEAD CUT MACHINE START UP")?></th>
      </tr>
      <tr>
        <th rowspan="2" >No.</th>    
        <th rowspan="2" >Mch. No.</th>         
        <th rowspan="2" >Date</th>
        <th rowspan="2" >Operator Name</th>
        <th rowspan="2" >Shift</th>
        <th colspan="2" >Check item</th>
        <th rowspan="2">Note</th>
      </tr>
      <tr>
        <th >A*</th>
        <th >B*</th>
      </tr>
    </thead>

    <tbody>
    <?php for($i = 0; $i < count($alldata); $i=$i+1) { ?>
        <tr>
            <td rowspan="3"><?= $i/1+1; ?></td>
            <td rowspan="3"><?= (string)$alldata[$i]['machno']; ?></td>
            <td rowspan="3"><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
            <td rowspan="3"><?= (string)$alldata[$i]['name'].'('.(string)$alldata[$i]['shift'].')';?></td>
            <th scope="row">A</th>
            <td colspan="col"><?= (string)$alldata[$i]['par035']; ?></td>
            <td colspan="col"><?= (string)$alldata[$i]['par036']; ?></td>
            <td colspan="col"><?= (string)$alldata[$i]['par002']; ?></td>
        </tr>

        <tr>
            <th scope="row">B</th>
            <td colspan="col"><?= (string)$alldata[$i]['par037']; ?></td>
            <td colspan="col"><?= (string)$alldata[$i]['par038']; ?></td>
            <td colspan="col"><?= (string)$alldata[$i]['par003']; ?></td>
        </tr>

        <tr>
            <th scope="row">C</th>
            <td colspan="col"><?= (string)$alldata[$i]['par039']; ?></td>
            <td colspan="col"><?= (string)$alldata[$i]['par040']; ?></td>
            <td colspan="col"><?= (string)$alldata[$i]['par004']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>