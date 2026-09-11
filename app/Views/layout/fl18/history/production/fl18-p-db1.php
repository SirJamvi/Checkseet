<div class="table-responsive mt-3" id="fl18-p-db1">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
  <table class="table table-bordered table-hover" id="table1">
    <thead align="center">
      <tr>
        <th colspan="34" scope="col"><?php echo nl2br("PRODUCTION PROCESS CONTROL DIE BONDING 1")?></th>
      </tr>
      <tr>
        <th rowspan="3" >No.</th>
        <th rowspan="3" >Operator Start</th>
        <th rowspan="3" >Shift/Group</th>
        <th rowspan="3" >Operator Finish</th>
        <th rowspan="3" >Shift/Group</th>         
        <th rowspan="3" >Mch. No.</th>         
        <th rowspan="3" >Date</th>
        <th rowspan="3" >Model</th>
        <th rowspan="3" >Lot No.</th> 
        <th rowspan="3" >Shift</th>
        <th rowspan="3" >Group</th>
        <th rowspan="3" >Condition</th>
        <th rowspan="3">LD chip <br> Lot no.</th>
        <th rowspan="3">SM chip <br> Lot no.</th>
        <th colspan="3" scope="col">Quantity (finish)</th>
        <th rowspan="3">Yield (%)</th>
        <th colspan="2">Time</th>
        <th colspan="6" scope="col">Foregoing Result (20 pcs/lot)</th>
        <th rowspan="3" >Back Side <br> Checking <br> (1pcs/Lot) <br> ≥ 80%</th>
        <th rowspan="3" >Die Bond <br> Strength <br> (1pcs/Lot)</th>
        <th rowspan="3" >Fillet Check * <br> (2pcs/Lot)</th>
        <th rowspan="3" >Mark Check * <br> (2pcs/Lot)</th>
        <th colspan="4" scope="col">LD chip measure <br> (2pcs/ LD chip lot no)</th>
        <!-- <th rowspan="3" >Action</th>          -->
      </tr>
      <tr>
        <th rowspan="2">Input</th>
        <th rowspan="2">Output</th>
        <th rowspan="2">NG</th>
        <th rowspan="2">IN</th>
        <th rowspan="2">OUT</th>
        <th colspan="2" scope="col">SM chip</th>
        <th colspan="4" scope="col">LD chip</th>
        <th colspan="2" scope="col">Sample 1</th>
        <th colspan="2" scope="col">Sample 2</th>
      </tr>
      <tr>
        <th >Crack</th>
        <th >Chipping</th>
        <th >LD pos</th>
        <th >Miss LD chip</th>
        <th >Crack</th>
        <th >Chipping</th>
        <th >Tebal <br> (μm)</th>
        <th >Panjang <br> (μm)</th>
        <th >Tebal <br> (μm)</th>
        <th >Panjang <br> (μm)</th>
      </tr>
    </thead>

    <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+1) { ?>
            <tr>
            <td rowspan="2" ><?= $i+1; ?></td>
            <td rowspan="2" ><?= $alldata[$i]['name'];?></td>
              <td rowspan="2" ><?= $alldata[$i]['shift'] .' / '. $alldata[$i]['group'];?></td>
              <td rowspan="2" >
              <?php
                  if($alldata[$i]['name2']){
                  echo  $alldata[$i]['name2'];
                  }
                  else{
                  echo "";
                  }
              ?>
              </td>
              <td rowspan="2" >
              <?php
                  if($alldata[$i]['shift2']){
                  echo $alldata[$i]['shift2'] . ' / ' . $alldata[$i]['group2'];
                  }
                  else{
                  echo "";
                  }
              ?>
              </td>
            <td rowspan="2" ><?= $alldata[$i]['machno']; ?></td>
            <td rowspan="2" ><?= date('d/m/Y', strtotime($alldata[$i]['created_at'])); ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['model']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['lotno']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['shift']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['group']; ?></td>
          
            <th scope="row">Lot No</th>
            <td rowspan="1" ><?= (string)$alldata[$i]['par002']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par003']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par013']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par014']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par015']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par016']; ?></td>
            <td rowspan="2" ><?= date('H:i', strtotime($alldata[$i]['par008'])) ?></td>
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
            <td rowspan="2" ><?= (string)$alldata[$i]['par035']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par036']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par037']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par038']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par039']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par040']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par017']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par018']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par041']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par042']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par019']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par020']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par021']; ?></td>
            <td rowspan="2" ><?= (string)$alldata[$i]['par022']; ?></td>
            <!-- <td rowspan="2">
              <ul class="list-inline m-0">
                  <i class="bi bi-pencil-square"></i>
                  <li class="list-inline-item">
                      <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                  </li>
                  <li class="list-inline-item">
                      <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                  </li>
              </ul>
            </td> -->
        </tr>
        <tr>
            <th scope="row">Qty</th>
            <td rowspan="1" ><?= (string)$alldata[$i]['par004']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par005']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
  </table>
</div>