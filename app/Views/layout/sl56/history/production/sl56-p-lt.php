<div class="table-responsive w-auto mt-3" id="sl56-p-lt">
<input type="hidden" id="cnt-table" value="1">
<?= csrf_field(); ?>
    <table class="table table-bordered table-hover"   id="table1"
    >
    <thead align="center">
        <tr>
        <th colspan="16" scope="col"><?php echo nl2br("LEAK TESTING")?></th>
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
            <th colspan="3" scope="col" >Process Plan (Time)*</th>
            <th colspan="3" scope="col" >Quantity</th>
            <th rowspan="2" >Ket.</th>
        </tr>

        <tr>
            <th >Expired</th>
            <th >Input</th>
            <th >Output</th>
            <th >Input</th>
            <th >Output</th>
            <th >NG</th>
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
        <td rowspan="1" ><?= date('H:i', strtotime((string)$c['par008']));  ?></td>
        <td rowspan="1" >
            <?php 
                if(!(string)$c['par009']) echo "";
                else echo date('H:i', strtotime((string)$c['par009'])); 
            ?>
        </td>
        <td rowspan="1" ><?= (string)$c['par013']; ?></td>
        <td rowspan="1" ><?= (string)$c['par014']; ?></td>
        <td rowspan="1" ><?= (string)$c['par015']; ?></td>
        <td rowspan="1" ><?= (string)$c['par002']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>