<div class="table-responsive mt-3" id="sl33-p-vi1">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
<input type="hidden" name="cnt-proses" value="1">
  <table class="table table-bordered table-hover" id="table1"
    >
    <thead align="center">
        <tr>
            <th colspan="22" scope="col"><?php echo nl2br("PRODUCTION CONTROL SHEET VISUAL INSPECTION\n (Single Laser 3.3)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="3">No</th>
            <th rowspan="3">Operator Start</th>
            <th rowspan="3">Shift/Group</th>
            <th rowspan="3">Operator Finish</th>
            <th rowspan="3">Shift/Group</th>
            <th rowspan="3" >Mch. No.</th>         
            <th rowspan="3" >Model</th>
            <th rowspan="3" >Lot No.</th> 
            <th rowspan="3" >Date (dd/mm/yyyy)</th>
            <th class="input-form" colspan="4" scope="col" >Quantity</th>
            <th class="input-form" colspan="9" scope="col" >Reject Item</th>
        </tr>
        <tr>
            <th class="input-form" rowspan="2">Input</th>
            <th class="input-form" rowspan="2">Output</th>
            <th class="input-form" rowspan="2">Reject</th>
            <th class="input-form" rowspan="2">Yield (%)</th>
            <th class="input-form" >Dust</th>
            <th class="input-form" >Gold Wire</th>
            <th class="input-form" >LD Crack</th>
            <th class="input-form" >LD Dirt</th>
            <th class="input-form" >LD Chipping</th>
            <th class="input-form" >LD Position</th>
            <th class="input-form" >LD Peel Off</th>
            <th class="input-form" >Stem Scratch</th>
            <th class="input-form" >Stem Bari</th>
        </tr>
        <tr>
            <th class="input-form" >Stem NG</th>
            <th class="input-form" >Cap Bari</th>
            <th class="input-form" >Cap Crack</th>
            <th class="input-form" >Cap NG</th>
            <th class="input-form" >Marking NG</th>
            <th class="input-form" >Lead Bend</th>
            <th class="input-form" >Pin NG</th>
            <th class="input-form" >Others</th>
            <th class="input-form" ></th>
        </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+2) { ?>
            <tr>
                <td rowspan="2" ><?= $i/2+1; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['name'];?></td>
                  <td rowspan="2" ><?= (string)$alldata[$i]['shift'] .' / '. (string)$alldata[$i]['group'];?></td>
                  <td rowspan="2" >
                  <?php
                      if((string)$alldata[$i]['name2']){
                      echo  (string)$alldata[$i]['name2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
                  <td rowspan="2" >
                  <?php
                      if((string)$alldata[$i]['shift2']){
                      echo (string)$alldata[$i]['shift2'] . ' / ' . (string)$alldata[$i]['group2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['machno']; ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['model']; ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['lotno']; ?></td>
                    <td rowspan="2" ><?= date('d/m/Y', strtotime((string)$alldata[$i]['par008'])); ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['par013']; ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['par014']; ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['par015']; ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['par016']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par017']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par018']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par019']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par020']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par021']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par022']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par023']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par024']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par025']; ?></td>
            </tr>
            <tr>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par017']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par018']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par019']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par020']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par021']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par022']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par023']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par024']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par025']; ?></td>
            </tr>
            <?php }; ?>
    </tbody>
  </table>
</div>