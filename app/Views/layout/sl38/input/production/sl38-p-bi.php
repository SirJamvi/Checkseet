<div class="table-responsive" id="sl38-p-bi">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="2">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("BURN IN ")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" colspan="2" >Setting Machine</th>
        <th class="input-form" rowspan="3" scope="col">Test File Name</th>
        <th class="input-form" rowspan="3" scope="col">Cassette/C hamber No.</th>
        <th class="input-form" colspan="3" scope="col">Resetting Machine</th>
        <th class="input-form" colspan="7" scope="col">Failure (NG)</th>
        <th class="input-form" rowspan="3" >Remark</th> 
      </tr>
  
      <tr>
        <th class="input-form"  colspan="2">Quantity</th>
        <th class="input-form"  colspan="3">Quantity</th>
        <th class="input-form" >A1</th>
        <th class="input-form" >B1, <br> B3-B5</th>
        <th class="input-form" >E1</th>
        <th class="input-form" >E3</th>
        <th class="input-form" >E6</th>
        <th class="input-form" >Cap</th>
        <th class="input-form" >Lead <br> Bent</th>
      </tr>
    
      <tr>
        <th class="input-form" scope="col">Input</th>
        <th class="input-form" scope="col">Setting</th>      
        <th class="input-form" scope="col">Pass</th>
        <th class="input-form" scope="col">Reject</th>
        <th class="input-form" scope="col">Yield (%)</th>     
        <th class="input-form" scope="col">A3-A5</th>
        <th class="input-form" scope="col">B2</th>
        <th class="input-form" scope="col">E2</th>
        <th class="input-form" scope="col">E4</th>
        <th class="input-form" scope="col">E7</th>
        <th class="input-form" scope="col">Stem</th>
        <th class="input-form" scope="col">Others</th>  
      </tr>
    </thead>
    <tbody>
        <td rowspan="2" >
          <input type="number" step="0.00000001" class="form-control" id="par013" name="par013" onkeyup=quantitySettingSLBI() onchange=quantitySettingSLBI() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." readonly";} ?>>
        </td>
        <td rowspan="2" >
          <input type="number" step="0.00000001" class="form-control" id="par014" name="par014" onkeyup=quantitySettingSLBI() onchange=quantitySettingSLBI() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="text" step="1" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="text" step="1" class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="number"  oninput="" step="1" class="form-control" id="par015" name="par015" onkeyup=passResettingChange() onchange=passResettingChange() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="number"  oninput="" step="1" class="form-control" id="par016" name="par016" onkeyup=rejectResettingChange() onchange=rejectResettingChange() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="number" step="0.01" class="form-control" id="par017" name="par017" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?> readonly>
        </td>
        <td rowspan="2" >
            <input type="number" step="0.00000001" class="form-control" id="par018a" name="par018a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001" class="form-control" id="par018b" name="par018b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par018'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001" class="form-control" id="par019a" name="par019a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001" class="form-control" id="par019b" name="par019b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par019'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001" class="form-control" id="par020a" name="par020a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001" class="form-control" id="par020b" name="par020b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par020'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001" class="form-control" id="par021a" name="par021a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001" class="form-control" id="par021b" name="par021b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par021'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001" class="form-control" id="par022a" name="par022a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001" class="form-control" id="par022b" name="par022b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par022'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001" class="form-control" id="par023a" name="par023a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001" class="form-control" id="par023b" name="par023b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par023'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001" class="form-control" id="par024a" name="par024a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001" class="form-control" id="par024b" name="par024b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par024'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" step="1" class="form-control" id="par035" name="par035" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par035'];} ?>>
        </td>
    </tbody>
  </table>
</div>