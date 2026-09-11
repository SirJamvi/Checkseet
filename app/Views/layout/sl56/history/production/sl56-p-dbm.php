<div class="table-responsive mt-3" id="sl56-p-dbm">
<input type="hidden" id="cnt-table" value="2">
    <table class="table table-bordered table-hover" id="table1" data-cols-width="10,15,15,15,10,10,20,10,10,10,10,10,10,10,10,10,20,10,10,10,20,10,10,15">
        <thead align="center">
            <tr>
            <th colspan="26" scope="col"><?php echo nl2br("DIE BONDING MACHINE SINGLE LASER PAGE 1")?></th>
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
                <th colspan="2" scope="col" >Time</th>
                <th colspan="3" scope="col" >Quantity</th>
                <th  rowspan="3">Yield (%)</th>
                <th colspan="4" scope="col" >Foregoing Result* <br> (20 pcs/lot)</th>
                <th colspan="4" scope="col" >Sampling Inspection <br> (200 pcs/lot)</th>
                <th rowspan="3" scope="col" >Judge</th>
                <th rowspan="3" scope="col" >M/C MTN</th>
                <th rowspan="3" scope="col" >Remark</th>
            </tr>
            <tr>
                <th  rowspan="2">In</th>
                <th  rowspan="2">Out</th>
                <th  rowspan="2">Input</th>
                <th  rowspan="2">Output</th>
                <th  rowspan="2">NG</th>
                <th  colspan="3" scope="col">Chip Condition</th>
                <th  rowspan="2">Ag Paste Condition</th>
                <th  colspan="3" scope="col">Chip Condition</th>
                <th  rowspan="2">Ag Paste Condition</th>
            </tr>
            <tr>
                <th scope="col">LD Pos</th>
                <th scope="col">Crack</th>
                <th scope="col">Chipping</th>
                <th scope="col">LD Pos</th>
                <th scope="col">Crack</th>
                <th scope="col">Chipping</th>
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
            <td rowspan="1" ><?= date('H:i', strtotime((string)$c['par008'])); ?></td>
            <td rowspan="1" >
                <?php 
                    if(!(string)$c['par009']) echo "";
                    else echo date('H:i', strtotime((string)$c['par009'])); 
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
            <td rowspan="1" ><?= (string)$c['par039']; ?></td>
            <td rowspan="1" ><?= (string)$c['par040']; ?></td>
            <td rowspan="1" ><?= (string)$c['par041']; ?></td>
            <td rowspan="1" ><?= (string)$c['par042']; ?></td>
            <td rowspan="1" ><?= (string)$c['par003']; ?></td>
            <td rowspan="1" ><?= (string)$c['par004']; ?></td>
            <td rowspan="1" ><?= (string)$c['par002']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <table class="table table-bordered table-hover" id="table2" data-cols-width="10,15,15,15,10,10,20,10,10,10,10,15">
        <thead align="center">
            <tr>
            <th colspan="14" scope="col"><?php echo nl2br("DIE BONDING MACHINE SINGLE LASER PAGE 2")?></th>
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
                <th colspan="2" scope="col" data-a-wrap="true">Measuring of die bonding position (2 pcs/shift) Standard: Point 1(Y)</th>
                <th colspan="2" scope="col" >Die Bonding Strenth (2pcs/hari)</th>
                <th rowspan="2" >Remark</th>
            </tr>
            <tr>
                <th >1</th>
                <th >2</th>
                <th >1</th>
                <th >2</th>
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
            <td rowspan="1" ><?= (string)$c['par017']; ?></td>
            <td rowspan="1" ><?= (string)$c['par018']; ?></td>
            <td rowspan="1" ><?= (string)$c['par019']; ?></td>
            <td rowspan="1" ><?= (string)$c['par020']; ?></td>
            <td rowspan="1" ><?= (string)$c['par002']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>      
</div>