<div class="table-responsive mt-3" id="sl33-p-dbqc">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
<input type="hidden" name="cnt-proses" value="1">
  <table class="table table-bordered table-hover" id="table1"
    >
    <thead align="center">
        <tr>
            <th colspan="22" scope="col"><?php echo nl2br("INSPECTION LD D/B 2 CONTROL CHECK SHEET")?></th>
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
            <th class="input-form" colspan="1" scope="col" >Refers</th>
            <th colspan="2" scope="col">Time</th>
            <th class="input-form" colspan="4" scope="col" >Quantity</th>
            <th class="input-form" colspan="17" scope="col" >Reject Item</th>
        </tr>
        <tr>
            <th class="input-form" >LD D/B2 Machine</th>
            <th class="input-form" >In</th>
            <th class="input-form" >Out</th>
            <th class="input-form" >Input</th>
            <th class="input-form" >Output</th>
            <th class="input-form" >Reject</th>
            <th class="input-form" >Yield</th>
            <th class="input-form" >Sic Slant</th>
            <th class="input-form" >Sic Diff</th>
            <th class="input-form" >Sic Crack</th>
            <th class="input-form" >Sic Dirt</th>
            <th class="input-form" >Sic Nothing</th>
            <th class="input-form" >LD X Diff</th>
            <th class="input-form" >LD Y Diff</th>
            <th class="input-form" >LD TH Slant</th>
            <th class="input-form" >LD Crack</th>
            <th class="input-form" >LD Dirt</th>
            <th class="input-form" >LD Nothing</th>
            <th class="input-form" >Ag Much</th>
            <th class="input-form" >Ag Few</th>
            <th class="input-form" >Ag NG</th>
            <th class="input-form" >Sic Float</th>
            <th class="input-form" >Stem Dis colour</th>
            <th class="input-form" >OTHER</th>
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
                <td><?= $alldata[$i]['par002']; ?></td>
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
                <td><?= $alldata[$i]['par017']; ?></td>
                <td><?= $alldata[$i]['par018']; ?></td>
                <td><?= $alldata[$i]['par019']; ?></td>
                <td><?= $alldata[$i]['par020']; ?></td>
                <td><?= $alldata[$i]['par021']; ?></td>
                <td><?= $alldata[$i]['par022']; ?></td>
                <td><?= $alldata[$i]['par023']; ?></td>
                <td><?= $alldata[$i]['par024']; ?></td>
                <td><?= $alldata[$i]['par025']; ?></td>
                <td><?= $alldata[$i]['par026']; ?></td>
                <td><?= $alldata[$i]['par027']; ?></td>
                <td><?= $alldata[$i]['par028']; ?></td>
                <td><?= $alldata[$i]['par029']; ?></td>
                <td><?= $alldata[$i]['par030']; ?></td>
                <td><?= $alldata[$i]['par031']; ?></td>
                <td><?= $alldata[$i]['par032']; ?></td>
                <td><?= $alldata[$i]['par033']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
  </table>
</div>