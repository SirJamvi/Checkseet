<div class="table-responsive mt-3" id="sl38-p-cs">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
  <table class="table table-bordered table-hover" <?php $selected_device = filter_input(INPUT_POST, 'device',	FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY
    ); if ($selected_device === "sl56"){echo "";}else{echo "";}; ?> id="table1"
    >
    <thead align="center">
      <tr>
        <th colspan="24" scope="col"><?php echo nl2br("CAP SEAL\n(Automatic Cap Seal Machine Daito Technology Industry)")?></th>
      </tr>
      <tr>
        <th rowspan="4" >No.</th>
        <th rowspan="4">Operator Start</th>        
        <th rowspan="4">Shift/Group </th>
        <th rowspan="4">Operator Finish</th>         
        <th rowspan="4">Shift/Group </th>
        <th rowspan="4" >Mch. No.</th>         
        <th rowspan="4" >Model</th>
        <th rowspan="4" >Lot No.</th> 
        <th rowspan="4" >Date (dd/mm/yyyy)</th>
        <th colspan="2" scope="col">Time</th>
        <th colspan="3" scope="col">Quantity</th>
        <th  rowspan="4">Cap Lot No.</th>
        <th colspan="3" scope="col">Foregoing Insp. (20pcs/lot)</th>
        <th colspan="2"  rowspan="4">Stem Dimension</th>
        <th colspan="4" scope="col">Usage Time</th>
      </tr>
      <tr>
        <th  rowspan="3">In</th>
        <th  rowspan="3">Out</th>
        <th  rowspan="3">Input</th>
        <th  rowspan="3">Output</th>
        <th  rowspan="3">Reject</th>
        <th  rowspan="3">Stem Scratch</th>
        <th  rowspan="3">Protrussion</th>
        <th  rowspan="3">Bari</th>
        <th colspan="2" scope="col">Upper Electrode</th>
        <th colspan="2" scope="col">Middle Electrode</th>
      </tr>
      <tr>
        <th colspan="2" scope="col">(@10000 kali)</th>
        <th colspan="2" rowspan="2" >(@20000 kali)</th>
      </tr>
      <tr>
      
        <th scope="col">1</th>
        <th scope="col">2</th>
      </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+1) { ?>
        <tr>
            <td rowspan="2" ><?= $i+1; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['name'];?></td>
              <td rowspan="2" ><?= (string)$alldata[$i]['shift'] .' / '. (string)$alldata[$i]['group'];?></td>
              <td rowspan="2" >
              <?php
                  if((string)$alldata[$i]['name2']){
                  echo  (string)$alldata[$i]['name2'];
                  }
                  else{
                  echo "";
                  }
              ?>
              </td>
              <td rowspan="2" >
              <?php
                  if((string)$alldata[$i]['shift2']){
                  echo (string)$alldata[$i]['shift2'] . ' / ' . (string)$alldata[$i]['group2'];
                  }
                  else{
                  echo "";
                  }
              ?>
              </td>
            <td rowspan="2" ><?= (string)$alldata[$i]['machno']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['model']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['lotno']; ?></td>
            <td rowspan="2" ><?= date('d/m/Y', strtotime((string)$alldata[$i]['par008'])); ?></td>
            <td rowspan="2" ><?= date('H:i', strtotime((string)$alldata[$i]['par008'])); ?></td>
            <td rowspan="2">
              <?php
                if((string)$alldata[$i]['par009']){
                  echo date('H:i', strtotime((string)$alldata[$i]['par009'])); 
                }
                else{
                  echo "";
                }
              ?>
            </td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par013']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par014']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par015']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par002']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par035']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par036']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par037']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par016']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par017']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par020']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par021']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par022']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par023']; ?></td>
        </tr>
        <tr>
            <td rowspan="1" ><?= (string)$alldata[$i]['par018']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par019']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par024']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par025']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
  </table>
  
</div>