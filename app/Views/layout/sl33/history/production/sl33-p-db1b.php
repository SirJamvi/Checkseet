<div class="table-responsive mt-3" id="sl33-p-db1b">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" <?php $selected_device = filter_input(INPUT_POST, 'device',	FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY
    ); if ($selected_device === "sl56"){echo "";}else{echo "";}; ?>
     id="table1">
    <thead align="center">
      <tr>
        <th colspan="40" scope="col"><?php echo nl2br("LD DIE BONDING 1 MACHINE (GH06510F4A, GH06510F4AK & GH07P28F4C) PAGE 1")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th rowspan="3" >No.</th>
        <th rowspan="3" >Operator Start</th>
        <th rowspan="3" >Shift/Group</th>
        <th rowspan="3" >Operator Finish</th>
        <th rowspan="3" >Shift/Group</th>
        <th rowspan="3" >Mch. No.</th>         
        <th rowspan="3" >Model</th>
        <th rowspan="3" >Lot No.</th> 
        <th rowspan="3" >Date (dd/mm/yyyy)</th>
        <th colspan="2" scope="col">Time</th>
        <th colspan="6" scope="col">Foregoing Result (20 pcs/lot)</th>
        <th colspan="3" scope="col">Quantity</th>
        <th rowspan="3" >Yield (%)</th>
        <th colspan="10" scope="col">Reject Item</th>
        <th colspan="3" >Back side <br> standard:80% area good colour</th>
        <th colspan="3" >Die Share</th>
        <th colspan="2" >LD Collet Pick Up Record</th>
        <th rowspan="3" >Remark</th>
      </tr>
      <tr>
        <th rowspan="2">In</th>
        <th rowspan="2">Out</th>
        <th colspan="2">SM Chip</th>
        <th colspan="4">LD Chip</th>
        <th rowspan="2">Input</th>
        <th rowspan="2">Output</th>
        <th rowspan="2">NG</th>
        <th rowspan="2">LD X Diff</th>  
        <th rowspan="2">LD Y Diff</th>
        <th rowspan="2">LD Slant</th>
        <th rowspan="2">LD Crack</th>
        <th rowspan="2">LD Chipping</th>
        <th rowspan="2">LD Scratch</th>
        <th rowspan="2">LD Dirt</th>
        <th rowspan="2">LD Nothing</th>
        <th rowspan="2">AuSn NG</th>
        <th rowspan="2">Others</th>
        <th rowspan="2">Sample 1</th>
        <th rowspan="2">Sample 2</th>
        <th rowspan="2">Sample 3</th>
        <th rowspan="2">Sample 1</th>
        <th rowspan="2">Sample 2</th>
        <th rowspan="2">Sample 3</th>
        <th rowspan="2">Total Counter</th>
        <th rowspan="2">Total Collet Pick Up</th>
      </tr>
      <tr>      
        <th >Crack</th>
        <th >Chipping</th>
        <th >LD position</th>
        <th >Miss LD Chip</th>
        <th >Crack</th>
        <th >Chipping</th>
      </tr>
    </thead>
    <thead align="center">
    </thead>
    <tbody>
    <?php for($i = 0; $i < count($alldata); $i=$i+4) { ?>
    <tr>
        <td><?= $i/4+1; ?></td>
        <td ><?= (string)$alldata[$i]['name'];?></td>
          <td ><?= (string)$alldata[$i]['shift'] .' / '. (string)$alldata[$i]['group'];?></td>
          <td >
          <?php
              if((string)$alldata[$i]['name2']){
              echo  (string)$alldata[$i]['name2'];
              }
              else{
              echo "";
              }
          ?>
          </td>
          <td >
          <?php
              if((string)$alldata[$i]['shift2']){
              echo (string)$alldata[$i]['shift2'] . ' / ' . (string)$alldata[$i]['group2'];
              }
              else{
              echo "";
              }
          ?>
          </td>
        <td><?= (string)$alldata[$i]['machno']; ?></td>
        <td><?= (string)$alldata[$i]['model']; ?></td>
        <td><?= (string)$alldata[$i]['lotno']; ?></td>
        <td><?= date('d/m/Y', strtotime((string)$alldata[$i]['par008'])); ?></td>
        <td><?= date('H:i', strtotime((string)$alldata[$i]['par008'])); ?></td>
        <td >
          <?php
            if((string)$alldata[$i]['par009']){
              echo date('H:i', strtotime((string)$alldata[$i]['par009'])); 
            }
            else{
              echo "";
            }
          ?>
        </td>
        <td><?= (string)$alldata[$i]['par027']; ?></td>
        <td><?= (string)$alldata[$i]['par028']; ?></td>
        <td><?= (string)$alldata[$i]['par029']; ?></td>
        <td><?= (string)$alldata[$i]['par030']; ?></td>
        <td><?= (string)$alldata[$i]['par031']; ?></td>
        <td><?= (string)$alldata[$i]['par032']; ?></td>
        <td><?= (string)$alldata[$i]['par013']; ?></td>
        <td><?= (string)$alldata[$i]['par014']; ?></td>
        <td><?= (string)$alldata[$i]['par015']; ?></td>
        <td><?= (string)$alldata[$i]['par016']; ?></td>
        <td><?= (string)$alldata[$i]['par033']; ?></td>
        <td><?= (string)$alldata[$i]['par034']; ?></td>
        <td><?= (string)$alldata[$i]['par035']; ?></td>
        <td><?= (string)$alldata[$i]['par036']; ?></td>
        <td><?= (string)$alldata[$i]['par037']; ?></td>
        <td><?= (string)$alldata[$i]['par038']; ?></td>
        <td><?= (string)$alldata[$i]['par039']; ?></td>
        <td><?= (string)$alldata[$i]['par040']; ?></td>
        <td><?= (string)$alldata[$i]['par041']; ?></td>
        <td><?= (string)$alldata[$i]['par042']; ?></td>
        <td><?= (string)$alldata[$i]['par017']; ?></td>
        <td><?= (string)$alldata[$i]['par018']; ?></td>
        <td><?= (string)$alldata[$i]['par019']; ?></td>
        <td><?= (string)$alldata[$i]['par020']; ?></td>
        <td><?= (string)$alldata[$i]['par021']; ?></td>
        <td><?= (string)$alldata[$i]['par022']; ?></td>
        <td><?= (string)$alldata[$i]['par023']; ?></td>
        <td><?= (string)$alldata[$i]['par024']; ?></td>
        <td><?= (string)$alldata[$i]['par002']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>