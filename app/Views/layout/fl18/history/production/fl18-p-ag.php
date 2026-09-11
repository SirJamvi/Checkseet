<div class="table-responsive mt-3" id="fl18-p-ag">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
  <table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
            <th colspan="18" scope="col"><?php echo nl2br("PRODUCTION PROCESS CONTROL SHEET AG PASTE HARDENING")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="2" >No.</th>    
            <th rowspan="2" >Mch. No.</th>         
            <th rowspan="2" >Date</th>
            <th rowspan="2" >Model</th>
            <th rowspan="2" >Lot No.</th> 
            <th colspan="2" >Quantity</th>
            <th colspan="2" >Operator Name</th>
            <th colspan="2" >Time</th>
            <th colspan="3" >Temperature</th>
        </tr>
        <tr>
            <th >Input</th>
            <th >Output</th>
            <th >Input to oven</th>
            <th >Take out from oven</th>
            <th >Input</th>
            <th >Take Out</th>
            <th >Setting</th>
            <th >At Input</th>
            <th >At take Out</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+1) { ?>
            <tr>
                <td ><?= $i/1+1; ?></td>
                <td ><?= (string)$alldata[$i]['machno']; ?></td>
                <td ><?= date('d/m/Y', strtotime($alldata[$i]['par008'])); ?></td>
                <td ><?= (string)$alldata[$i]['model']; ?></td>
                <td ><?= (string)$alldata[$i]['lotno']; ?></td>
                <td ><?= (string)$alldata[$i]['par013']; ?></td>
                <td ><?= (string)$alldata[$i]['par014']; ?></td>
                <td ><?= (string)$alldata[$i]['name'].'('.(string)$alldata[$i]['shift'].')';?></td>
                <td >
                  <?php
                    if((string)$alldata[$i]['name2']){
                      echo  (string)$alldata[$i]['name2'].'('.(string)$alldata[$i]['shift2'].')';
                    }
                    else{
                      echo "";
                    }
                  ?>
                </td>
                <td ><?= date('H:i', strtotime((string)$alldata[$i]['par008'])); ?></td>
                <td >
                  <?php
                    if((string)$alldata[$i]['par009']){
                      echo date('H:i', strtotime((string)$alldata[$i]['par009'])); 
                    }
                    else{
                      echo "";
                    }
                  ?>
                </td>
                <td ><?= (string)$alldata[$i]['par015']; ?></td>
                <td ><?= (string)$alldata[$i]['par016']; ?></td>
                <td ><?= (string)$alldata[$i]['par017']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
    </table>
</div>