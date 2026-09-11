<div class="table-responsive mt-3" id="sl38-p-m">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
  <table class="table table-bordered table-hover" id="table1"
    >
    <thead align="center">
      <tr>
        <th colspan="20" scope="col"><?php echo nl2br("MARKING")?></th>
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
        <th colspan="3" scope="col" >Quantity</th>
        <th colspan="2" scope="col" >Time</th>
        <th colspan="2" scope="col" >Marking Item</th>
        <th colspan="4" scope="col" >Foregoing Inspection</th>
        <th rowspan="2" scope="col" >Remark</th>
      </tr>
      <tr>
        <th >Input</th>
        <th >Output</th>
        <th >Reject</th>
        <th >In</th>
        <th >Out</th>
        <th >Date </th>
        <th >Model Code</th>
        <th >Posisi pada Cap</th>
        <th >Tipis & Pecah</th>
        <th >Bentuk</th>
        <th >Others</th>
      </tr>
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
        <td rowspan="1" ><?= (string)$c['par013']; ?></td>
        <td rowspan="1" ><?= (string)$c['par014']; ?></td>
        <td rowspan="1" ><?= (string)$c['par015']; ?></td>
        <td rowspan="1" ><?= date('H:i', strtotime((string)$c['par008'])); ?></td>
        <td rowspan="1" >
          <?php
            if((string)$c['par009']){
              echo date('H:i', strtotime((string)$c['par009'])); 
            }
            else{
              echo "";
            }
          ?>
        </td>
        <td rowspan="1" ><?= date('d/m/Y', strtotime((string)$c['par008'])); ?></td>
        <td rowspan="1" ><?= (string)$c['par002']; ?></td>
        <td rowspan="1" ><?= (string)$c['par035']; ?></td>
        <td rowspan="1" ><?= (string)$c['par036']; ?></td>
        <td rowspan="1" ><?= (string)$c['par037']; ?></td>
        <td rowspan="1" ><?= (string)$c['par038']; ?></td>
        <td rowspan="1" ><?= (string)$c['par003']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>