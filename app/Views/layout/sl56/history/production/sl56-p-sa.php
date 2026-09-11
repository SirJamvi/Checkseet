<div class="table-responsive w-auto mt-3" id="sl56-p-sa">
<input type="hidden" id="cnt-table" value="1">
<?= csrf_field(); ?>
  <table class="table table-bordered table-hover"  id="table1"
    >
    <thead align="center">
      <tr>
        <th colspan="27" scope="col"><?php echo nl2br("STEM SET A & LEAD CORRECTION")?></th>
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
        <th class="input-form" rowspan="3" >Stem Lot No</th>
        <th colspan="4" rowspan="2" scope="col" >Quantity</th>
        <th rowspan="2" colspan="2" >Time</th>
        <th class="input-form" colspan="2">Foregoing Result</th>
        <th class="input-form" colspan="3" rowspan="2">Stem NG Item</th>
        <th class="input-form" rowspan="3" >Note</th>
      </tr>

      <tr>
        <th class="input-form" colspan="2">20 pcs / 2000 pcs</th>
      </tr>
    
      <tr>
        <th class="input-form">In</th>
        <th class="input-form">Out</th>
        <th class="input-form">NG</th>
        <th class="input-form">Yield</th>
        <th class="input-form">In</th>
        <th class="input-form">Out</th>
        <th class="input-form">Qty Insp.</th>
        <th class="input-form">Qty NG</th>
        <th class="input-form">Scratch</th>
        <th class="input-form">Dirt</th>
        <th class="input-form">Direction</th>
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
            <td rowspan="1" ><?= date('d/m/Y', strtotime((string)$c['created_at'])); ?></td>
        <td rowspan="1" ><?= (string)$c['par002']; ?></td>
        <td rowspan="1" ><?= (string)$c['par013']; ?></td>
        <td rowspan="1" ><?= (string)$c['par014']; ?></td>
        <td rowspan="1" ><?= (string)$c['par015']; ?></td>
        <td rowspan="1" ><?= (string)$c['par016']; ?></td>
        <td rowspan="1" ><?= date('H:i', strtotime((string)$c['par008'])); ?></td>
        <td rowspan="1" >
            <?php 
                if(!(string)$c['par009']) echo "";
                else echo date('H:i', strtotime((string)$c['par009'])); 
            ?>
        </td>
        <td rowspan="1" ><?= (string)$c['par017']; ?></td>
        <td rowspan="1" ><?= (string)$c['par018']; ?></td>
        <td rowspan="1" ><?= (string)$c['par019']; ?></td>
        <td rowspan="1" ><?= (string)$c['par020']; ?></td>
        <td rowspan="1" ><?= (string)$c['par021']; ?></td>
        <td rowspan="1" ><?= (string)$c['par003']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>