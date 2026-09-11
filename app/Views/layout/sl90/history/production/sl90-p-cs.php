<div class="table-responsive mt-3" id="sl90-p-cs">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
  <table class="table table-bordered table-hover " <?php $selected_device = filter_input(INPUT_POST, 'device',	FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY
    ); if ($selected_device === "sl56"){echo "";}else{echo "";}; ?>
     id="table1">
    <thead align="center">
      <tr>
        <th colspan="24" scope="col"><?php echo nl2br("CAP SEAL\n(Automatic Machine)")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th rowspan="4" >No.</th>
        <th rowspan="4" >Operator Start</th>         
        <th rowspan="4" >Shift/Group </th>
        <th rowspan="4" >Operator Finish</th>         
        <th rowspan="4" >Shift/Group </th>
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
        <th colspan="2" rowspan="2" style="vertical-align: top;">(@20000 kali)</th>
      </tr>
      <tr>
        <th scope="col">1</th>
        <th scope="col">2</th>
      </tr>
    </thead>
    <tbody>
    <?php for($i = 0; $i < count($alldata); $i=$i+1) { ?>
            <tr>
              <td rowspan="3" ><?= $i+1; ?></td>
              <td rowspan="3" ><?= $alldata[$i]['name'];?></td>
                <td rowspan="3" ><?= $alldata[$i]['shift'] .' / '. $alldata[$i]['group'];?></td>
                <td rowspan="3" >
                <?php
                    if($alldata[$i]['name2']){
                    echo  $alldata[$i]['name2'];
                    }
                    else{
                    echo "";
                    }
                ?>
                </td>
                <td rowspan="3" >
                <?php
                    if($alldata[$i]['shift2']){
                    echo $alldata[$i]['shift2'] . ' / ' . $alldata[$i]['group2'];
                    }
                    else{
                    echo "";
                    }
                ?>
                </td>
              <td rowspan="3" ><?= $alldata[$i]['machno']; ?></td>
              <td rowspan="3" ><?= $alldata[$i]['model']; ?></td>
              <td rowspan="3" ><?= $alldata[$i]['lotno']; ?></td>
              <td rowspan="3" ><?= date('d/m/Y', strtotime($alldata[$i]['created_at'])); ?></td>
              <td rowspan="3" ><?= date('H:i', strtotime($alldata[$i]['par008'])); ?></td>
              <td rowspan="3" >
                  <?php
                    if($alldata[$i]['par009']){
                      echo date('H:i', strtotime($alldata[$i]['par009'])); 
                    }
                    else{
                      echo "";
                    }
                  ?>
                </td>
              <td rowspan="3" ><?= $alldata[$i]['par013']; ?></td>
              <td rowspan="3" ><?= $alldata[$i]['par014']; ?></td>
              <td rowspan="3" ><?= $alldata[$i]['par015']; ?></td>
              <td rowspan="3" ><?= $alldata[$i]['par002']; ?></td>
              <td rowspan="3" ><?= $alldata[$i]['par035']; ?></td>
              <td rowspan="3" ><?= $alldata[$i]['par036']; ?></td>
              <td rowspan="3" ><?= $alldata[$i]['par037']; ?></td>
              <td rowspan="1" ><?= $alldata[$i]['par016']; ?></td>
              <td rowspan="1" ><?= $alldata[$i]['par019']; ?></td>
              <td rowspan="3" ><?= $alldata[$i]['par020']; ?></td>
              <td rowspan="3" ><?= $alldata[$i]['par021']; ?></td>
              <td rowspan="1" ><?= $alldata[$i]['par022']; ?></td>
              <td rowspan="1" ><?= $alldata[$i]['par023']; ?></td>
            </tr>
            <tr>
              <td rowspan="1" ><?= $alldata[$i]['par017']; ?></td>
              <td rowspan="1" ><?= $alldata[$i]['par026']; ?></td>
              <td rowspan="1" ><?= $alldata[$i]['par024']; ?></td>
              <td rowspan="1" ><?= $alldata[$i]['par025']; ?></td>
            </tr>
            <tr>
              <td rowspan="1" ><?= $alldata[$i]['par018']; ?></td>
            </tr>
            <?php } ?>
    </tbody>
  </table>
  
</div>