<div class="table-responsive" id="sl90-p-bi">
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
        <th class="input-form" rowspan="3" >Test File Name</th>
        <th class="input-form" rowspan="3" >Cassette/C hamber No.</th>
        <th class="input-form" rowspan="3" >Box No</th>
        <th class="input-form" colspan="2" scope="col">Screw Tightening Check</th>
        <th class="input-form" colspan="2" scope="col">Setting Machine</th>
        <th class="input-form" colspan="3" scope="col">Resetting Machine</th>
      </tr>
  
      <tr>
        <th class="input-form"  rowspan="2">Torque wrench Standard 20cN.M</th>
        <th class="input-form"  rowspan="2">Screw Loose (OK)/(NG)</th>
        <th class="input-form"  colspan="2">Quantity</th>
        <th class="input-form"  colspan="3">Quantity</th>
      </tr>
    
      <tr>
        <th class="input-form" scope="col">Input</th>
        <th class="input-form" scope="col">Setting</th>      
        <th class="input-form" scope="col">Pass</th>
        <th class="input-form" scope="col">Reject</th>
        <th class="input-form" scope="col">Yield (%)</th>     
      </tr>
    </thead>
    <tbody>
        <td rowspan="2" >
          <input type="text" step="1" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="text" step="1" class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="text" step="1" class="form-control" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="text" step="1" class="form-control" id="par005" name="par005" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
        </td>
        <td rowspan="2" >
        <select id="par006" name="par006" class="form-select">
            <?php if(isset($alldata)){
                if($alldata[0]["par006"]=="-"){
                    echo '
                    <option value="-" selected>-</option>
                    <option value="OK">OK</option>
                    <option value="NG">NG</option>
                    ';
                }
                else if($alldata[0]["par006"]=="OK")
                {
                    echo '
                    <option value="-">-</option>
                    <option value="OK" selected>OK</option>
                    <option value="NG">NG</option>
                    ';
                }
                else{
                    echo '
                    <option value="-">-</option>
                    <option value="OK">OK</option>
                    <option value="NG" selected>NG</option>
                    ';
                }
                }
                else{
                echo '<option value="-">-</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>';
                } ?>
            </select>
        </td>
        <td rowspan="2" >
          <input type="number" step="0.00000001" class="form-control" id="par013" name="par013" onkeyup=quantitySettingSLBI() onchange=quantitySettingSLBI() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." readonly";} ?>>
        </td>
          <td rowspan="2" >
          <input type="number" step="0.00000001" class="form-control" id="par014" name="par014" onkeyup=quantitySettingSLBI() onchange=quantitySettingSLBI() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
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

    </tbody>
  </table>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th class="input-form" colspan="7" scope="col">Failure (NG)</th>
        <th class="input-form" rowspan="3" >Ket (OK/AGL)</th>  
      </tr>
  
      <tr>
        <th class="input-form" >A1</th>
        <th class="input-form" >A3</th>
        <th class="input-form" >A4</th>
        <th class="input-form" >A5</th>
        <th class="input-form" >B1-B5</th>
        <th class="input-form" >STEM</th>
        <th class="input-form" >Lead Bent</th>
      </tr>
    
      <tr>
        <th class="input-form" scope="col">E1</th>
        <th class="input-form" scope="col">E2</th>
        <th class="input-form" scope="col">E3</th>
        <th class="input-form" scope="col">E4</th>
        <th class="input-form" scope="col">E6</th>
        <th class="input-form" scope="col">E7</th>
        <th class="input-form" scope="col">Others</th>    
      </tr>
    </thead>
    <tbody>
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