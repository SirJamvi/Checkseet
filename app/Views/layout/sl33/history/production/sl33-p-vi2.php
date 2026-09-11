<div class="table-responsive mt-3" id="sl33-p-vi2">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
<input type="hidden" name="cnt-proses" value="1">
  <table class="table table-bordered table-hover" id="table1"
    >
    <thead align="center">
      <tr>
        <th colspan="16" scope="col"><?php echo nl2br("PRODUCTION CONTROL SHEET VISUAL INSPECTION 2\n (Khusus GH06510F4A)")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th rowspan="2" >No.</th>
        <th rowspan="2" >Operator Start</th>         
        <th rowspan="2" >Shift/Group </th>
        <th rowspan="2" >Operator Finish</th>         
        <th rowspan="2" >Shift/Group </th>
        <th rowspan="2" >Mch. No.</th>         
        <th rowspan="2" >Model</th>
        <th rowspan="2" >Lot No.</th>
        <th rowspan="2" >Date (dd/mm/yyyy)</th>
        <th colspan="4" scope="col" >Quantity</th>
        <th colspan="3" scope="col" >Reject Item</th>
      </tr>
      <tr>
        <th >Input</th>
        <th >Output</th>
        <th >Reject</th>
        <th >Yield (%)</th>
        <th >Glass crack</th>
        <th >Glass Scratch</th>
        <th >Others</th>
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
                <td><?= $alldata[$i]['par013']; ?></td>
                <td><?= $alldata[$i]['par014']; ?></td>
                <td><?= $alldata[$i]['par015']; ?></td>
                <td><?= $alldata[$i]['par016']; ?></td>
                <td><?= $alldata[$i]['par017']; ?></td>
                <td><?= $alldata[$i]['par018']; ?></td>
                <td><?= $alldata[$i]['par019']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
  </table>
</div>