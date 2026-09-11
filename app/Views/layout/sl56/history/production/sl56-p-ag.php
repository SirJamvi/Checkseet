<div class="table-responsive w-auto mt-3" id="sl56-p-ag">
<input type="hidden" id="cnt-table" value="1">
<?= csrf_field(); ?>
  <table class="table table-bordered table-hover" id="table1" 
    >
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("AG PASTE HARDENING")?></th>
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
        <th colspan="2" scope="col" >Quantity</th>
        <th colspan="2" scope="col" >Operator Name</th>
        <th colspan="3" scope="col" >Temperature</th>
        <th colspan="3" scope="col" >Time</th>
    </tr>
    <tr>
        <th rowspan="2" >Input</th>
        <th rowspan="2" >Output</th>
        <th rowspan="2" >Input to Oven</th>
        <th rowspan="2" >Take Out from Oven</th>
        <th rowspan="2" >Setting</th>
        <th rowspan="2" >At Input</th>
        <th rowspan="2" >At take Out</th>
        <th rowspan="2" >Input</th>
        <th colspan="2" scope="col" >At Take Out</th>
        </tr>
    <tr>
        <th scope="col">Plan</th>
        <th scope="col">Actual</th>
    </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+1) { ?>
          <tr>
            <td ><?= $i+1; ?></td>
            <td ><?= (string)$alldata[$i]['name'];?></td>
            <td ><?= (string)$alldata[$i]['shift'] .' / '. (string)$alldata[$i]['group'];?></td>
            <td >
              <?php
                if((string)$alldata[$i]['name2']){
                  echo  (string)$alldata[$i]['name2'];
                }
                else{
                  echo "";
                }
              ?>
            </td>
            <td >
              <?php
                if((string)$alldata[$i]['shift2']){
                  echo (string)$alldata[$i]['shift2'] . ' / ' . (string)$alldata[$i]['group2'];
                }
                else{
                  echo "";
                }
              ?>
            </td>
            <td ><?= (string)$alldata[$i]['machno']; ?></td>
            <td ><?= (string)$alldata[$i]['model']; ?></td>
            <td ><?= (string)$alldata[$i]['lotno']; ?></td>
            <td ><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
            <td ><?= (string)$alldata[$i]['par013']; ?></td>
            <td ><?= (string)$alldata[$i]['par014']; ?></td>
            <td ><?= (string)$alldata[$i]['name']; ?></td>
            <td ><?= (string)$alldata[$i]['name2']; ?></td>
            <td ><?= (string)$alldata[$i]['par015']; ?></td>
            <td ><?= (string)$alldata[$i]['par016']; ?></td>
            <td ><?= (string)$alldata[$i]['par017']; ?></td>
            <td ><?= date('H:i', strtotime((string)$alldata[$i]['par008'])); ?></td>
            <td >
                <?php 
                    if(!(string)$alldata[$i]['par009']) echo "";
                    else echo date('H:i', strtotime((string)$alldata[$i]['par009'])); 
                ?>
            </td>
            <td >
                <?php 
                    if(!(string)$alldata[$i]['par009']) echo "";
                    else echo date('H:i', strtotime((string)$alldata[$i]['par009'])); 
                ?>
            </td>
          </tr>
        <?php } ?>
    </tbody>
  </table>
</div>