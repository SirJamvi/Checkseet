<div class="table-responsive mt-3" id="fl18-s-tc">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
      <tr>
        <th colspan=<?= 4+$lenData ?> scope="col"><?php echo nl2br("TIE BAR CUT MACHINE START UP")?></th>
      </tr>
      <tr>
        <th rowspan="2" >Shift</th>
        <th colspan="2" scope="col" >Check item</th>
        <th rowspan="2">Note</th>
      </tr>
      <tr>
        <th scope="col">A*</th>
        <th scope="col">B*</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <th scope="row">A</th>
        <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
            <td colspan="col"><?= (string)$alldata[$i]['par001']; ?></td>
        <?php } ?>
        <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
            <td colspan="col"><?= (string)$alldata[$i]['par002']; ?></td>
        <?php } ?>
        <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
            <td colspan="col"><?= (string)$alldata[$i]['par003']; ?></td>
        <?php } ?>
      </tr>

      <tr>
        <th scope="row">B</th>
        <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
            <td colspan="col"><?= (string)$alldata[$i]['par004']; ?></td>
        <?php } ?>
        <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
            <td colspan="col"><?= (string)$alldata[$i]['par005']; ?></td>
        <?php } ?>
        <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
            <td colspan="col"><?= (string)$alldata[$i]['par006']; ?></td>
        <?php } ?>
      </tr>

      <tr>
        <th scope="row">C</th>
        <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
            <td colspan="col"><?= (string)$alldata[$i]['par007']; ?></td>
        <?php } ?>
        <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
            <td colspan="col"><?= (string)$alldata[$i]['par008']; ?></td>
        <?php } ?>
        <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
            <td colspan="col"><?= (string)$alldata[$i]['par009']; ?></td>
        <?php } ?>
      </tr>
    </tbody>
  </table>
</div>