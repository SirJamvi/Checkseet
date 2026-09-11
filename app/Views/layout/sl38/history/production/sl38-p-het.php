<div class="table-responsive mt-3" id="sl38-p-het">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
    <table class="table table-bordered table-hover"   id="table1"
    >
    <thead align="center">
        <tr>
        <th colspan="10" scope="col"><?php echo nl2br("HELIUM TESTING")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="2" >No.</th>
            <th rowspan="2" >Mch. No.</th>         
            <th rowspan="2" >Model</th>
            <th rowspan="2" >Lot No.</th> 
            <th rowspan="2" >Date (dd/mm/yyyy)</th>
            <th colspan="3" scope="col" >Input/Set</th>
            <th colspan="2" scope="col" >Output/Reset</th>
        </tr>

        <tr>
            <th >Operator</th>
            <th >Quantity</th>
            <th >Output</th>
            <th >Operator</th>
            <th >Reset Time</th>
        </tr>
    </thead>
    <tbody>
        
    <?php $i = 1; ?>
        <?php foreach($alldata as $c): ?>
        <tr>
        <td rowspan="1" ><?= $i++; ?></td>
        <td rowspan="1" ><?= (string)$c['machno']; ?></td>
        <td rowspan="1" ><?= (string)$c['model']; ?></td>
        <td rowspan="1" ><?= (string)$c['lotno']; ?></td>
        <td rowspan="1" ><?= date('d/m/Y', strtotime((string)$c['created_at'])); ?></td>
        <td rowspan="1" ><?= (string)$c['name']; ?></td>
        <td rowspan="1" ><?= (string)$c['par013']; ?></td>
        <td rowspan="1" ><?= date('H:i', strtotime((string)$c['par008'])); ?></td>
        <td rowspan="1" ><?= (string)$c['name2']; ?></td>
        <td >
            <?php
            if( (string)$c['par009']){
                echo date('H:i', strtotime( (string)$c['par009'])); 
            }
            else{
                echo "";
            }
            ?>
        </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>