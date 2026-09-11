<div class="table-responsive mt-3" id="fl18-p-wbc">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
<input type="hidden" name="cnt-proses" value="1">
  <table class="table table-bordered table-hover" id="table1"
    >
        <thead align="center">
          <tr>
            <th colspan="29" scope="col"><?php echo nl2br("CAPILLARY CHANGE RECORD SHEET")?></th>
          </tr>
        </thead>
        <thead align="center">
          <tr>
            <th rowspan="3">No</th>
            <th rowspan="3" >Operator Start</th>         
            <th rowspan="3" >Shift/Group </th>
            <th rowspan="3" >Operator Finish</th>         
            <th rowspan="3" >Shift/Group </th>
            <th rowspan="3" >Mch. No.</th>         
            <th rowspan="3" >Model</th>
            <th rowspan="3" >Lot No.</th>
            <th rowspan="3" >Date (dd/mm/yyyy)</th>
            <th rowspan="3">Equipment No</th>
            <th rowspan="3">Product</th>
            <th rowspan="3">Process</th>
            <th colspan="3" scope="col" >CAPILLARY USAGE QTY</th>
            <th rowspan="3">(3) Setting <br> Capillary <br> Limit <br> at <br> Machine</th>
            <th rowspan="3">(4) Setting <br> Value <br> of Torque <br> Screw <br> Driver</th>
            <th colspan="8">(5) TOOL HEIGHT RENEW</th>
            <th rowspan="3">(6) Centering <br> Gold Ball <br> (CTD) <br> RENEW</th>
            <th rowspan="3">US <br> Calibration</th>
            <th rowspan="3">PIC</th>
            <th rowspan="3">REMARK</th>
          </tr>
        
          <tr>            
            <th colspan="2" rowspan="2">(1) Usage Qty</th>
            <th rowspan="2">(2) Change <br> Yes/No</th>
            <th colspan="2">LD</th>
            <th colspan="2">MS1</th>
            <th colspan="2">MS1</th>
            <th colspan="2">PD</th>
          </tr>

          <tr>
            <th >1st</th>
            <th >2nd</th>
            <th >1st</th>
            <th >2nd</th>
            <th >1st</th>
            <th >2nd</th>
            <th >1st</th>
            <th >2nd</th>
          </tr>
        </thead>
        <tbody>
            <?php for($i = 0; $i < count($alldata); $i=$i+1) { ?>
                <tr>
                    <td><?= $i/1+1; ?></td>
                    <td ><?= $alldata[$i]['name'];?></td>
                    <td ><?= $alldata[$i]['shift'] .' / '. $alldata[$i]['group'];?></td>
                    <td >
                    <?php
                        if($alldata[$i]['name2']){
                        echo  $alldata[$i]['name2'];
                        }
                        else{
                        echo "";
                        }
                    ?>
                    </td>
                    <td >
                    <?php
                        if($alldata[$i]['shift2']){
                        echo $alldata[$i]['shift2'] . ' / ' . $alldata[$i]['group2'];
                        }
                        else{
                        echo "";
                        }
                    ?>
                    </td>
                    <td><?= $alldata[$i]['machno']; ?></td>
                    <td><?= $alldata[$i]['model']; ?></td>
                    <td><?= $alldata[$i]['lotno']; ?></td>
                    <td><?= date('d/m/Y', strtotime($alldata[$i]['created_at'])); ?></td>
                    <td><?= $alldata[$i]['par002']; ?></td>
                    <td><?= $alldata[$i]['par003']; ?></td>
                    <td><?= $alldata[$i]['par004']; ?></td>
                    <td><?= $alldata[$i]['par017']; ?></td>
                    <td><?= $alldata[$i]['par035']; ?></td>
                    <td><?= $alldata[$i]['par036']; ?></td>
                    <td><?= $alldata[$i]['par018']; ?></td>
                    <td><?= $alldata[$i]['par037']; ?></td>
                    <td><?= $alldata[$i]['par019']; ?></td>
                    <td><?= $alldata[$i]['par020']; ?></td>
                    <td><?= $alldata[$i]['par021']; ?></td>
                    <td><?= $alldata[$i]['par022']; ?></td>
                    <td><?= $alldata[$i]['par023']; ?></td>
                    <td><?= $alldata[$i]['par024']; ?></td>
                    <td><?= $alldata[$i]['par025']; ?></td>
                    <td><?= $alldata[$i]['par026']; ?></td>
                    <td><?= $alldata[$i]['par038']; ?></td>
                    <td><?= $alldata[$i]['par039']; ?></td>
                    <td><?= $alldata[$i]['par005']; ?></td>
                    <td><?= $alldata[$i]['par006']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>