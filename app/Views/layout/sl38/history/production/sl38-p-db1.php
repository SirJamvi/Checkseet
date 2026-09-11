<div class="table-responsive mt-3" id="sl38-p-db1">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="2">
  <table class="table table-bordered table-hover" id="table1"
    >
    <thead align="center">
      <tr>
        <th colspan="20" scope="col"><?php echo nl2br("LD DIE BONDING 1 MACHINE PAGE 1")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th rowspan="3" >No.</th>
        <th rowspan="3">Operator Start</th>        
        <th rowspan="3">Shift/Group </th>
        <th rowspan="3">Operator Finish</th>         
        <th rowspan="3">Shift/Group </th>
        <th rowspan="3" >Mch. No.</th>         
        <th rowspan="3" >Model</th>
        <th rowspan="3" >Lot No.</th> 
        <th rowspan="3" >Date (dd/mm/yyyy)</th>
        <th colspan="2">Time</th>
        <th class="input-form" colspan="3" scope="col">Quantity</th>
        <th class="input-form" rowspan="3" >Yield (%)</th>
        <th class="input-form" colspan="4" scope="col">Foregoing Result * (20 pcs/lot)</th>
        <th class="input-form" rowspan="3" >Remark</th>
      </tr>
      <tr>
        <th class="input-form"  rowspan="2">IN</th>
        <th class="input-form"  rowspan="2">OUT</th>
        <th class="input-form"  rowspan="2">Input</th>
        <th class="input-form"  rowspan="2">Output</th>
        <th class="input-form"  rowspan="2">NG</th>  
        <th class="input-form"  colspan="3" scope="col">Chip Condition</th>
        <th class="input-form"  rowspan="2" scope="col">Ag paste Condition</th>
      </tr>
      <tr>      
        <th class="input-form"  >LD Pos</th>
        <th class="input-form"  >Crack</th>
        <th class="input-form"  >Chipping</th>
      </tr>
    </thead>
    <thead align="center">
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach($alldata as $c): ?>
        <tr>
        <td rowspan="1" ><?= $i++; ?></td>
        <td rowspan="1" ><?= (string)$c['name'];?></td>
          <td rowspan="1" ><?= (string)$c['shift'] .' / '. (string)$c['group'];?></td>
          <td rowspan="1" >
          <?php
              if((string)$c['name2']){
              echo  (string)$c['name2'];
              }
              else{
              echo "";
              }
          ?>
          </td>
          <td rowspan="1" >
          <?php
              if((string)$c['shift2']){
              echo (string)$c['shift2'] . ' / ' . (string)$c['group2'];
              }
              else{
              echo "";
              }
          ?>
          </td>
        <td rowspan="1" ><?= (string)$c['machno']; ?></td>
        <td rowspan="1" ><?= (string)$c['model']; ?></td>
        <td rowspan="1" ><?= (string)$c['lotno']; ?></td>
        <td rowspan="1" ><?= date('d/m/Y', strtotime((string)$c['par008'])); ?></td>
        <td rowspan="1" ><?= date('H:i', strtotime((string)$c['par008'])); ?></td>
        <td >
          <?php
            if((string)$c['par009']){
              echo date('H:i', strtotime((string)$c['par009'])); 
            }
            else{
              echo "";
            }
          ?>
        </td>
        <td rowspan="1" ><?= (string)$c['par013']; ?></td>
        <td rowspan="1" ><?= (string)$c['par014']; ?></td>
        <td rowspan="1" ><?= (string)$c['par015']; ?></td>
        <td rowspan="1" ><?= (string)$c['par016']; ?></td>
        <td rowspan="1" ><?= (string)$c['par035']; ?></td>
        <td rowspan="1" ><?= (string)$c['par036']; ?></td>
        <td rowspan="1" ><?= (string)$c['par037']; ?></td>
        <td rowspan="1" ><?= (string)$c['par038']; ?></td>
        <td rowspan="1" ><?= (string)$c['par002']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
  <br>
  <table class="table table-bordered table-hover" id="table2"
    >
    <thead align="center">
      <tr>
        <th colspan="9" scope="col"><?php echo nl2br("LD DIE BONDING 1 MACHINE PAGE 2")?></th>
      </tr>
      <tr>
        <th class="input-form" colspan="4" scope="col">Sampling Inspection * (200 pcs/lot)</th>
        <th class="input-form" colspan="3" >Measuring of die bonding position <br> (2 pcs/shift)</th>
        <th class="input-form" colspan="2" >Die Bonding Strength <br> (2 pcs/shift)</th>
      </tr>
      <tr>
        <th class="input-form" colspan="3" scope="col">Chip condition</th>
        <th class="input-form" rowspan="2">Ag paste Condition</th>
        <th class="input-form" rowspan="2" scope="col">Sample</th>
        <th class="input-form" rowspan="2" scope="col">X</th>
        <th class="input-form" rowspan="2" scope="col">Y</th>
        <th class="input-form" rowspan="2" scope="col">Sample</th>
        <th class="input-form" rowspan="2" scope="col">Result</th>
      </tr>
      <tr>
        <th class="input-form" >LD Pos</th>
        <th class="input-form" >Crack</th>
        <th class="input-form" >Chipping</th>
      </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach($alldata as $c): ?>
        <tr>
        <td rowspan="2" ><?= (string)$c['par039']; ?></td>
        <td rowspan="2" ><?= (string)$c['par040']; ?></td>
        <td rowspan="2" ><?= (string)$c['par041']; ?></td>
        <td rowspan="2" ><?= (string)$c['par042']; ?></td>
        <th scope="row">Sample 1</th>
        <td rowspan="1" ><?= (string)$c['par017']; ?></td>
        <td rowspan="1" ><?= (string)$c['par018']; ?></td>
        <th scope="row">Sample 1</th>
        <td rowspan="1" ><?= (string)$c['par019']; ?></td>
        </tr>
        <tr>
        <th scope="row">Sample 2</th>
        <td rowspan="1" ><?= (string)$c['par020']; ?></td>
        <td rowspan="1" ><?= (string)$c['par021']; ?></td>
        <th scope="row">Sample 2</th>
        <td rowspan="1" ><?= (string)$c['par022']; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
  </table>
</div>