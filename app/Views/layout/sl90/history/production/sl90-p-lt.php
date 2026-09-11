<div class="table-responsive mt-3" id="sl90-p-lt">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
    <table class="table table-bordered table-hover"   id="table1"
    >
    <thead align="center">
        <tr>
        <th colspan="14" scope="col"><?php echo nl2br("LEAK TESTING")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="2" >No.</th>
            <th rowspan="2" >Mch. No.</th>         
            <th rowspan="2" >Model</th>
            <th rowspan="2" >Lot No.</th> 
            <th rowspan="2" >Date (dd/mm/yyyy)</th>
            <th colspan="2" >Operator</th>
            <th colspan="3" scope="col" >Process Plan (Time)*</th>
            <th colspan="3" scope="col" >Quantity</th>
            <th rowspan="2" >Ket.</th>
        </tr>

        <tr>
            <th >Input</th>
            <th >Output</th>
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
        <td rowspan="1" ><?= $c['machno']; ?></td>
        <td rowspan="1" ><?= $c['model']; ?></td>
        <td rowspan="1" ><?= $c['lotno']; ?></td>
        <td rowspan="1" ><?= date('d/m/Y', strtotime($c['created_at'])); ?></td>
        <td rowspan="1" >
            <?php
            if($c['name']){
                echo $c['name'] . '('.$c['shift'].')';
            }
            else{
                echo "";
            }
            ?>
        </td>
        <td rowspan="1" >
            <?php
            if($c['name2']){
                echo $c['name2'] . '('.$c['shift2'].')';
            }
            else{
                echo "";
            }
            ?>
        </td>
        <td rowspan="1" ><?= $c['par010']; ?></td>
        <td rowspan="1" ><?= date('H:i', strtotime($c['par008'])); ?></td>
        <td rowspan="1" >
            <?php
            if($c['par009']){
                date('H:i', strtotime($c['par009']));
            }
            else{
                echo "";
            }
            ?>
        </td>
        <td rowspan="1" ><?= $c['par013']; ?></td>
        <td rowspan="1" ><?= $c['par014']; ?></td>
        <td rowspan="1" ><?= $c['par015']; ?></td>
        <td rowspan="1" ><?= $c['par002']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>