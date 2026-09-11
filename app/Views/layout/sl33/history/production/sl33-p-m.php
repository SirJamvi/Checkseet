<div class="table-responsive mt-3" id="sl33-p-m">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
<input type="hidden" name="cnt-proses" value="1">
  <table class="table table-bordered table-hover" id="table1"
    >
    <thead align="center">
      <tr>
        <th colspan="25" scope="col"><?php echo nl2br("PRODUCTION PROCESS CONTROL SHEET MARKING")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th rowspan="3" >No.</th>
        <th rowspan="3" >Operator Start</th>         
        <th rowspan="3" >Shift/Group </th>
        <th rowspan="3" >Operator Finish</th>         
        <th rowspan="3" >Shift/Group </th>
        <th rowspan="3" >Mch. No.</th>         
        <th rowspan="3" >Model</th>
        <th rowspan="3" >Lot No.</th>
        <th rowspan="3" >Date (dd/mm/yyyy)</th>
        <th colspan="2" scope="col">Time</th>
        <th colspan="4" scope="col" >Quantity</th>
        <th colspan="3" scope="col" >Marking Item</th>
        <th colspan="6" scope="col" >Foregoing Inspection</th>
      </tr>
      <tr>
        <th rowspan="2">In</th>
        <th rowspan="2">Out</th>
        <th rowspan="2" >Input</th>
        <th rowspan="2" >Output</th>
        <th rowspan="2" >Reject</th>
        <th rowspan="2" >Yield (%)</th>
        <th rowspan="2" >ID No by model</th>
        <th rowspan="2" >ID No by user</th>
        <th rowspan="2" >SSI (9)</th>
        <th colspan="3">Visual check 5 pcs/lot</th>
        <th colspan="3">Visual sampling inspection 20 pcs</th>
      </tr>
      <tr>
        <th scope="col">Pecah</th>
        <th scope="col">Tipis dan Pecah</th>
        <th scope="col">Bentuk</th>
        <th scope="col">Pecah</th>
        <th scope="col">Tipis</th>
        <th scope="col">Bentuk</th>
    </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+1) { ?>
            <tr>
                <td><?= $i/1+1; ?></td>
                <td ><?= $alldata[$i]['name'];?></td>
                  <td ><?= $alldata[$i]['shift'] .' / '. $alldata[$i]['group'];?></td>
                  <td >
                  <?php
                      if($alldata[$i]['name2']){
                      echo  $alldata[$i]['name2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
                  <td >
                  <?php
                      if($alldata[$i]['shift2']){
                      echo $alldata[$i]['shift2'] . ' / ' . $alldata[$i]['group2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
                <td><?= $alldata[$i]['machno']; ?></td>
                <td><?= $alldata[$i]['model']; ?></td>
                <td><?= $alldata[$i]['lotno']; ?></td>
                <td><?= date('d/m/Y', strtotime($alldata[$i]['created_at'])); ?></td>
                <td><?= date('H:i', strtotime($alldata[$i]['par008'])); ?></td>
                <td >
                  <?php
                    if($alldata[$i]['par009']){
                      echo date('H:i', strtotime($alldata[$i]['par009'])); 
                    }
                    else{
                      echo "";
                    }
                  ?>
                </td>
                <td><?= $alldata[$i]['par013']; ?></td>
                <td><?= $alldata[$i]['par014']; ?></td>
                <td><?= $alldata[$i]['par015']; ?></td>
                <td><?= $alldata[$i]['par016']; ?></td>
                <td><?= $alldata[$i]['par002']; ?></td>
                <td><?= $alldata[$i]['par003']; ?></td>
                <td><?= $alldata[$i]['par004']; ?></td>
                <td><?= $alldata[$i]['par017']; ?></td>
                <td><?= $alldata[$i]['par018']; ?></td>
                <td><?= $alldata[$i]['par019']; ?></td>
                <td><?= $alldata[$i]['par020']; ?></td>
                <td><?= $alldata[$i]['par021']; ?></td>
                <td><?= $alldata[$i]['par022']; ?></td>
            </tr>
        <?php } ?>

    </tbody>
  </table>
</div>