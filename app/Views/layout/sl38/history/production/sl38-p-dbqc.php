<div class="table-responsive mt-3" id="sl38-p-dbqc">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
            <th colspan="27" scope="col"><?php echo nl2br("INSPECTION PIN D/B CONTROL")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Operator Start</th>        
            <th rowspan="2">Shift/Group </th>
            <th rowspan="2">Operator Finish</th>         
            <th rowspan="2">Shift/Group </th>
            <th rowspan="2">Lot No</th>
            <th rowspan="2">Model Name</th>
            <th rowspan="2">Date</th>
            <th colspan="4" scope="col" >Quantity</th>
            <th colspan="15" scope="col" >Reject Item</th>
        </tr>
        <tr>
            <th >Input</th>
            <th >Output</th>
            <th >Reject</th>
            <th >Yield</th>
            <th >PD Lack</th>
            <th >PD Dirt</th>
            <th >BadMark</th>
            <th >PD Ag Few</th>
            <th >PD Ag Much</th>
            <th >PD Float</th>
            <th >PD Y Diff</th>
            <th >PD Nothing</th>
            <th >Missing</th>
            <th >PD Slant</th>
            <th >Only Paste</th>
            <th >No Paste</th>
            <th >OTHER</th>
            <th >Lead Bend</th>
            <th >Ag Adhesion</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+1) { ?>
            <tr>
                <td ><?= $i+1; ?></td>
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
                <td ><?= (string)$alldata[$i]['lotno']; ?></td>
                <td ><?= (string)$alldata[$i]['model']; ?></td>
                <td ><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
                <td ><?= (string)$alldata[$i]['par013']; ?></td>
                <td ><?= (string)$alldata[$i]['par014']; ?></td>
                <td ><?= (string)$alldata[$i]['par015']; ?></td>
                <td ><?= (string)$alldata[$i]['par016']; ?></td>
                <td ><?= (string)$alldata[$i]['par017']; ?></td>
                <td ><?= (string)$alldata[$i]['par018']; ?></td>
                <td ><?= (string)$alldata[$i]['par019']; ?></td>
                <td ><?= (string)$alldata[$i]['par020']; ?></td>
                <td ><?= (string)$alldata[$i]['par021']; ?></td>
                <td ><?= (string)$alldata[$i]['par022']; ?></td>
                <td ><?= (string)$alldata[$i]['par023']; ?></td>
                <td ><?= (string)$alldata[$i]['par024']; ?></td>
                <td ><?= (string)$alldata[$i]['par025']; ?></td>
                <td ><?= (string)$alldata[$i]['par026']; ?></td>
                <td ><?= (string)$alldata[$i]['par027']; ?></td>
                <td ><?= (string)$alldata[$i]['par028']; ?></td>
                <td ><?= (string)$alldata[$i]['par029']; ?></td>
                <td ><?= (string)$alldata[$i]['par030']; ?></td>
                <td ><?= (string)$alldata[$i]['par031']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
    </table>
</div>