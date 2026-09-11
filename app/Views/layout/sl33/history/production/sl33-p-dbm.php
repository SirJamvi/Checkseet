<div class="table-responsive mt-3" id="sl33-p-dbm">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
<input type="hidden" name="cnt-proses" value="1">
  <table class="table table-bordered table-hover" id="table1"
    >
    <thead align="center">
        <tr>
            <th colspan="22" scope="col"><?php echo nl2br("PRODUCTION PROCESS CONTROL SHEET LD DIE BONDING 2 AUTO MACHINE")?></th>
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
            <th colspan="3" scope="col" >Quantity</th>
            <th rowspan="3" >Yield (%)</th>
            <th rowspan="3" >Head No.</th>
            <th colspan="6" scope="col">Foregoing Result (5 pcs/head/lot) <br> (OK: V, NG: X)</th>
        </tr>
        <tr>
            <th class="input-form" rowspan="2">Input</th>
            <th class="input-form" rowspan="2">Output</th>
            <th class="input-form" rowspan="2">Input</th>
            <th class="input-form" rowspan="2">Output</th>
            <th class="input-form" rowspan="2">NG</th>
            <th class="input-form" colspan="2">SM Chip</th>
            <th class="input-form" colspan="4">LD Chip</th>
        </tr>
        <tr>      
            <th class="input-form" >Crack</th>
            <th class="input-form" >Chipping</th>
            <th class="input-form" >LD position</th>
            <th class="input-form" >Miss LD Chip</th>
            <th class="input-form" >Crack</th>
            <th class="input-form" >Chipping</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+4) { ?>
            <tr>
                <td rowspan="8"><?= $i/4+1; ?></td>
                <td rowspan="8"><?= $alldata[$i]['name'];?></td>
                  <td rowspan="8"><?= $alldata[$i]['shift'] .' / '. $alldata[$i]['group'];?></td>
                  <td rowspan="8">
                  <?php
                      if($alldata[$i]['name2']){
                      echo  $alldata[$i]['name2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
                  <td rowspan="8">
                  <?php
                      if($alldata[$i]['shift2']){
                      echo $alldata[$i]['shift2'] . ' / ' . $alldata[$i]['group2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
                <td rowspan="8"><?= $alldata[$i]['machno']; ?></td>
                <td rowspan="8"><?= $alldata[$i]['model']; ?></td>
                <td rowspan="8"><?= $alldata[$i]['lotno']; ?></td>
                <td rowspan="8"><?= date('d/m/Y', strtotime($alldata[$i]['created_at'])); ?></td>
                <td rowspan="8"><?= date('H:i', strtotime($alldata[$i]['par008'])); ?></td>
                <td rowspan="8" >
                  <?php
                    if($alldata[$i]['par009']){
                      echo date('H:i', strtotime($alldata[$i]['par009'])); 
                    }
                    else{
                      echo "";
                    }
                  ?>
                </td>
                <td rowspan="8"><?= $alldata[$i]['par013']; ?></td>
                <td rowspan="8"><?= $alldata[$i]['par014']; ?></td>
                <td rowspan="8"><?= $alldata[$i]['par015']; ?></td>
                <td rowspan="8"><?= $alldata[$i]['par016']; ?></td>

                <td ><b>1</b></td>
                <td ><?= $alldata[$i]['par002']; ?></td>
                <td ><?= $alldata[$i]['par003']; ?></td>
                <td ><?= $alldata[$i]['par004']; ?></td>
                <td ><?= $alldata[$i]['par005']; ?></td>
                <td ><?= $alldata[$i]['par006']; ?></td>
                <td ><?= $alldata[$i]['par007']; ?></td>
            </tr>
            <tr>
              <td ><b>2</b></td>
              <td><?= $alldata[$i]['par035']; ?></td>
              <td><?= $alldata[$i]['par036']; ?></td>
              <td><?= $alldata[$i]['par037']; ?></td>
              <td><?= $alldata[$i]['par038']; ?></td>
              <td><?= $alldata[$i]['par039']; ?></td>
              <td><?= $alldata[$i]['par040']; ?></td>
            </tr>
            <tr>
              <td ><b>3</b></td>
              <td ><?= $alldata[$i+1]['par002']; ?></td>
              <td ><?= $alldata[$i+1]['par003']; ?></td>
              <td ><?= $alldata[$i+1]['par004']; ?></td>
              <td ><?= $alldata[$i+1]['par005']; ?></td>
              <td ><?= $alldata[$i+1]['par006']; ?></td>
              <td ><?= $alldata[$i+1]['par007']; ?></td>
            </tr>
            <tr>
              <td ><b>4</b></td>
              <td><?= $alldata[$i+1]['par035']; ?></td>
              <td><?= $alldata[$i+1]['par036']; ?></td>
              <td><?= $alldata[$i+1]['par037']; ?></td>
              <td><?= $alldata[$i+1]['par038']; ?></td>
              <td><?= $alldata[$i+1]['par039']; ?></td>
              <td><?= $alldata[$i+1]['par040']; ?></td>
            </tr>
            <tr>
              <td ><b>5</b></td>
              <td ><?= $alldata[$i+2]['par002']; ?></td>
              <td ><?= $alldata[$i+2]['par003']; ?></td>
              <td ><?= $alldata[$i+2]['par004']; ?></td>
              <td ><?= $alldata[$i+2]['par005']; ?></td>
              <td ><?= $alldata[$i+2]['par006']; ?></td>
              <td ><?= $alldata[$i+2]['par007']; ?></td>
            </tr>
            <tr>
              <td ><b>6</b></td>
              <td><?= $alldata[$i+2]['par035']; ?></td>
              <td><?= $alldata[$i+2]['par036']; ?></td>
              <td><?= $alldata[$i+2]['par037']; ?></td>
              <td><?= $alldata[$i+2]['par038']; ?></td>
              <td><?= $alldata[$i+2]['par039']; ?></td>
              <td><?= $alldata[$i+2]['par040']; ?></td>
            </tr>
            <tr>
              <td ><b>7</b></td>
              <td ><?= $alldata[$i+3]['par002']; ?></td>
              <td ><?= $alldata[$i+3]['par003']; ?></td>
              <td ><?= $alldata[$i+3]['par004']; ?></td>
              <td ><?= $alldata[$i+3]['par005']; ?></td>
              <td ><?= $alldata[$i+3]['par006']; ?></td>
              <td ><?= $alldata[$i+3]['par007']; ?></td>
            </tr>
            <tr>
              <td ><b>8</b></td>
              <td><?= $alldata[$i+3]['par035']; ?></td>
              <td><?= $alldata[$i+3]['par036']; ?></td>
              <td><?= $alldata[$i+3]['par037']; ?></td>
              <td><?= $alldata[$i+3]['par038']; ?></td>
              <td><?= $alldata[$i+3]['par039']; ?></td>
              <td><?= $alldata[$i+3]['par040']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
  </table>
</div>