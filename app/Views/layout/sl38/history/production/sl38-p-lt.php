<div class="table-responsive mt-3" id="sl38-p-lt">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
        <th colspan="20" scope="col"><?php echo nl2br("LEAK TESTING")?></th>
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
        <th colspan="3" scope="col" >Process Plan (Time)*</th>
        <th colspan="3" scope="col">Quantity</th>
        <th rowspan="2" scope="col">Yield (%)</th>
        <th colspan="3" scope="col">Item NG</th>
        <th rowspan="2" scope="col">Remark</th>
        </tr>

        <tr>
            <th >Expired</th>
            <th >Input</th>
            <th >Output</th>
            <th >Input</th>
            <th >Output</th>      
            <th >NG</th>
            <th >Gross</th>
            <th >Leak</th>     
            <th >Other</th> 
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
        <td rowspan="1" ><?= (string)$c['par010']; ?></td>
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
        <td rowspan="1" ><?= (string)$c['par017']; ?></td>
        <td rowspan="1" ><?= (string)$c['par018']; ?></td>
        <td rowspan="1" ><?= (string)$c['par019']; ?></td>
        <td rowspan="1" ><?= (string)$c['par002']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>