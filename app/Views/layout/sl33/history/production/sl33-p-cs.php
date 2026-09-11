<div class="table-responsive mt-3" id="sl33-p-cs">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
  <table class="table table-bordered table-hover" <?php $selected_device = filter_input(INPUT_POST, 'device',	FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY
    ); if ($selected_device === "sl56"){echo "";}else{echo "";}; ?>
     id="table1">
    <thead align="center">
      <tr>
        <th colspan="30" scope="col"><?php echo nl2br("CAP SEAL\n(Automatic Machine)")?></th>
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
        <th colspan="3" scope="col">Quantity</th>
        <th rowspan="3">Cap Lot No.</th>
        <th colspan="8" scope="col">FOR GOING MICROSCOPIC INSPECTION</th>
        <th rowspan="3">Stem Dimension</th>
        <th rowspan="3">Cap Length</th>
        <th rowspan="3">Off Center Measurement</th>
        <th rowspan="3">Peel Off Test</th>
        <th rowspan="3">Waktu Pemakaian Upper Electrode (24000 kali)</th>
        <th rowspan="3">Waktu Pemakaian Middle Electrode (2000 kali)</th>
        <th rowspan="3">Pergantian Electrode</th>
      </tr>
      <tr>
        <th rowspan="2">In</th>
        <th rowspan="2">Out</th>
        <th rowspan="2">Input</th>
        <th rowspan="2">Output</th>
        <th rowspan="2">Reject</th>
        <th colspan="8">(20 pcs/Lot)</th>
      </tr>
      <tr>
        <th scope="col">Cap NG</th>
        <th scope="col">Cap Crack</th>
        <th scope="col">Off Center</th>
        <th scope="col">Glass Scratch</th>
        <th scope="col">Stem Scratch</th>
        <th scope="col">Protrution</th>
        <th scope="col">Glass Crack</th>
        <th scope="col">Burry</th>
      </tr>
    </thead>
    <tbody>
    <?php for($i = 0; $i < count($alldata); $i=$i+5) { ?>
      <tr>
        <td><?= $i+1; ?></td>
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
        <td><?= (string)$alldata[$i]['par013']; ?></td>
        <td><?= (string)$alldata[$i]['par014']; ?></td>
        <td><?= (string)$alldata[$i]['par015']; ?></td>
        <td><?= (string)$alldata[$i]['par002']; ?></td>
        <td><?= (string)$alldata[$i]['par035']; ?></td>
        <td><?= (string)$alldata[$i]['par036']; ?></td>
        <td><?= (string)$alldata[$i]['par037']; ?></td>
        <td><?= (string)$alldata[$i]['par038']; ?></td>
        <td><?= (string)$alldata[$i]['par039']; ?></td>
        <td><?= (string)$alldata[$i]['par040']; ?></td>
        <td><?= (string)$alldata[$i]['par041']; ?></td>
        <td><?= (string)$alldata[$i]['par042']; ?></td>
        <td><?= (string)$alldata[$i]['par003']; ?></td>
        <td><?= (string)$alldata[$i]['par004']; ?></td>
        <td><?= (string)$alldata[$i]['par005']; ?></td>
        <td><?= (string)$alldata[$i]['par006']; ?></td>
        <td><?= (string)$alldata[$i]['par016']; ?></td>
        <td><?= (string)$alldata[$i]['par017']; ?></td>
        <td><?= (string)$alldata[$i]['par007']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  
</div>