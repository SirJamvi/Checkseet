<div class="table-responsive w-auto mt-3" id="sl56-p-bi">
<input type="hidden" id="cnt-table" value="1">
<?= csrf_field(); ?>
  <table class="table table-bordered table-hover"  id="table1"
    >
    <thead align="center">
      <tr>
        <th colspan="25" scope="col"><?php echo nl2br("BURN IN")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th rowspan="3" >No.</th>
        <th rowspan="3" >Mch. No.</th>         
        <th rowspan="3" >Model</th>
        <th rowspan="3" >Lot No.</th> 
        <th colspan="5" scope="col">Setting Machine</th>
        <th rowspan="3" >Test File Name</th>
        <th rowspan="3" >Cassette/C hamber No.</th>
        <th colspan="6" scope="col">Resetting Machine</th>
        <th colspan="7" scope="col">Failure (NG)</th>
        <th rowspan="3" >Ket (OK/AGL)</th>
      </tr>
  
      <tr>
        <th  rowspan="2">Date</th>
        <th  rowspan="2">Operator / Shift</th>
        <th  colspan="1">Time</th>
        <th  colspan="2">Quantity</th>
       
        <th  rowspan="2">Date</th>
        <th  rowspan="2">Operator / Shift</th>
        <th  rowspan="2">Time</th>
        <th  colspan="3">Quantity</th>
        
        <th >A1</th>
        <th >B1, <br> B3-B5</th>
        <th >E1</th>
        <th >E3</th>
        <th >E6</th>
        <th >Cap</th>
        <th >Lead <br> Bent</th>
      </tr>
    
      <tr>
        <th scope="col">Make a lot</th>
        <th scope="col">Input</th>
        <th scope="col">Setting</th>      
       
        <th scope="col">Pass</th>
        <th scope="col">Reject</th>
        <th scope="col">Yield (%)</th>
        <th scope="col">A3-A5</th>
        <th scope="col">B2</th>
        <th scope="col">E2</th>
        <th scope="col">E4</th>
        <th scope="col">E7</th>
        <th scope="col">Stem</th>
        <th scope="col">Others</th>
      </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+2) { ?>
            <tr>
                <td rowspan="2" ><?= $i/2+1; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['machno']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['model']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['lotno']; ?></td>
                <td rowspan="2" ><?= date('d/m/Y', strtotime((string)$alldata[$i]['par008'])); ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['name']."(".(string)$alldata[$i]['shift'].")"; ?></td>
                <td rowspan="2" ><?= date('H:i', strtotime((string)$alldata[$i]['par008'])); ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par013']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par014']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par002']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par003']; ?></td>
                
                <td rowspan="2" >
                    <?php 
                      if(!(string)$alldata[$i]['par009']) echo "";
                      else echo date('d/m/Y', strtotime((string)$alldata[$i]['par009'])); 
                    ?>
                </td>
                <td rowspan="2" ><?= (string)$alldata[$i]['name2']."(".(string)$alldata[$i]['shift2'].")"; ?></td>
                <td rowspan="2" >
                    <?php 
                      if(!(string)$alldata[$i]['par009']) echo "";
                      else echo date('H:i', strtotime((string)$alldata[$i]['par009'])); 
                    ?>
                </td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par015']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par016']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par017']; ?></td>

                <td rowspan="1" ><?= (string)$alldata[$i]['par018']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par019']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par020']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par021']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par022']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par023']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par024']; ?></td>

                <td rowspan="2" ><?= (string)$alldata[$i]['par035']; ?></td>
            </tr>
            <tr>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par018']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par019']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par020']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par021']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par022']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par023']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par024']; ?></td>
            </tr>
            <?php } ?>
    </tbody>
  </table>
</div>