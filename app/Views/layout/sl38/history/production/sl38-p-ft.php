<div class="table-responsive mt-3" id="sl38-p-ft">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
    <table class="table table-bordered table-hover"  id="table1" 
    >
    <thead align="center">
        <tr>
        <th colspan="25" scope="col"><?php echo nl2br("FINAL TEST")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="4" >No.</th>
            <th rowspan="4">Operator Start</th>        
            <th rowspan="4">Shift/Group </th>
            <th rowspan="4">Operator Finish</th>         
            <th rowspan="4">Shift/Group </th>
            <th rowspan="4" >Mch. No.</th>         
            <th rowspan="4" >Model</th>
            <th rowspan="4" >Lot No.</th> 
            <th rowspan="4" >Date (dd/mm/yyyy)</th>
            <th colspan="4" scope="col" style="width:25%;">Quantity</th>
            <th colspan="12" scope="col" >Failure Item</th>
        </tr>
    
        <tr>            
            <th rowspan="3">Input</th>
            <th rowspan="3">Output</th>
            <th rowspan="3">Reject</th> 
            <th rowspan="3">Yield (%)</th>
            <th >lf.PD/RdPo ldrak1/ lmop/m.Kink <br> (00)</th>
            <th >lf.LD <br> (01)</th>
            <th >LD.lr <br> (02)</th>
            <th >Vop <br> (03)</th>
            <th >lop <br> (04)</th>
            <th >lth <br> (05)</th>
            <th >Eta <br> (06)</th>
            <th >L.Kink2 <br> (07)</th>
            <th >Pmax <br> (08)</th>
            <th >lmax <br> (09)</th>
            <th >Pol <br> (0A)</th>
            <th >PhPl <br> (0B)</th>
        </tr>

        <tr>
            <th >Thv <br> (0C)</th>
            <th >Thh <br> (0D)</th>
            <th >Phv <br> (0E)</th>
            <th >Phh <br> (0F)</th>
            <th >Rpv <br> (10)</th>
            <th >Rph <br> (11)</th>
            <th >Lp <br> (12)</th>
            <th >LD Short <br> (13)</th>
            <th >LD Open <br> (14)</th>
            <th >lop.Err <br> (15)</th>
            <th >Kink.Err <br> (16)</th>
            <th >Pol.Err <br> (17)</th>
        </tr>

        <tr>
            <th >FFV.Err <br> (18)</th>
            <th >FFh.Err <br> (19)</th>
            <th >SP.Err <br> (1A)</th>
            <th >LDlr.Err <br> (1B)</th>
            <th >lm.Err/PDlr.Err <br> (1C)</th>
            <th >L.Kink3 <br> (1D)</th>
            <th >L.Kink4 <br> (1E)</th>
            <th >Others</th>
            <th >RANK 2</th>
            <th >RANK 3</th>
            <th >RANK 4</th>
            <th >Lead Bend</th>
        </tr>

    </thead>
    <tbody>
    <?php for($i = 0; $i < count($alldata); $i=$i+3) { ?>
        <tr>
            <td rowspan="3" ><?= $i/3+1; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['name'];?></td>
                  <td rowspan="3" ><?= (string)$alldata[$i]['shift'] .' / '. (string)$alldata[$i]['group'];?></td>
                  <td rowspan="3" >
                  <?php
                      if((string)$alldata[$i]['name2']){
                      echo  (string)$alldata[$i]['name2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
                  <td rowspan="3" >
                  <?php
                      if((string)$alldata[$i]['shift2']){
                      echo (string)$alldata[$i]['shift2'] . ' / ' . (string)$alldata[$i]['group2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
            <td rowspan="3" ><?= (string)$alldata[$i]['machno']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['model']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['lotno']; ?></td>
            <td rowspan="3" ><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['par013']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['par014']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['par015']; ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['par016']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par017']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par018']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par019']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par020']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par021']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par022']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par023']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par024']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par025']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par026']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par027']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par028']; ?></td>
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
            <td rowspan="1" ><?= (string)$alldata[$i+1]['par026']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+1]['par027']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+1]['par028']; ?></td>
        </tr>
        <tr>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par017']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par018']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par019']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par020']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par021']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par022']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par023']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par024']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par025']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par026']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par027']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i+2]['par028']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
    </table>
</div>