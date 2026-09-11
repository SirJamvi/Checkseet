<div class="table-responsive w-auto mt-3" id="sl56-p-m">
<input type="hidden" id="cnt-table" value="1">
<?= csrf_field(); ?>
  <table class="table table-bordered table-hover"  id="table1"
    >
    <thead align="center">
      <tr>
        <th colspan="27" scope="col"><?php echo nl2br("MARKING")?></th>
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
        <th colspan="3" scope="col" >Quantity</th>
        <th rowspan="2" >Yield (%)</th>
        <th colspan="2" scope="col" >Time</th>
        <th colspan="3" scope="col" >Marking Item</th>
        <th colspan="4" scope="col" >Foregoing Inspection <br> Visual (karakter marking) 5 pcs/lot</th>
        <th colspan="4" scope="col" >Sampling Inspection <br> Visual (karakter marking) 20 pcs/tray</th>
        <th rowspan="2" >Note</th>
      </tr>
    
      <tr>
        <th>Input</th>
        <th>Output</th>
        <th>Reject</th>
        <th>In</th>
        <th>Out</th>
        <th>Year & Month</th>
        <th>Date</th>
        <th>Model Code</th>
        <th>Pecah</th>
        <th>Tipis & Pecah</th>
        <th>Bentuk huruf</th>
        <th>Others</th>
        <th>Pecah</th>
        <th>Tipis & Pecah</th>
        <th>Bentuk huruf</th>
        <th>Others</th>
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
        <td rowspan="1" ><?= (string)$c['par004']; ?></td>
        <td rowspan="1" ><?= (string)$c['par005']; ?></td>
        <td rowspan="1" ><?= (string)$c['par002']; ?></td>
        <td rowspan="1" ><?= (string)$c['par036']; ?></td>
        <td rowspan="1" ><?= (string)$c['par037']; ?></td>
        <td rowspan="1" ><?= (string)$c['par038']; ?></td>
        <td rowspan="1" ><?= (string)$c['par039']; ?></td>
        <td rowspan="1" ><?= (string)$c['par040']; ?></td>
        <td rowspan="1" ><?= (string)$c['par041']; ?></td>
        <td rowspan="1" ><?= (string)$c['par042']; ?></td>
        <td rowspan="1" ><?= (string)$c['par043']; ?></td>
        <td rowspan="1" ><?= (string)$c['par003']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>