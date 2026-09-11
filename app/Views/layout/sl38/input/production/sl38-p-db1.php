<div class="table-responsive text-nowrap" id="sldb1">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("LD DIE BONDING 1 MACHINE")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" colspan="3" scope="col">Quantity</th>
        <th class="input-form" rowspan="3" >Yield (%)</th>
        <th class="input-form" colspan="4" scope="col">Foregoing Result * (20 pcs/lot)</th>
        <th class="input-form" rowspan="3" >Remark</th>
      </tr>
      <tr>
        <th class="input-form"  rowspan="2">Input</th>
        <th class="input-form"  rowspan="2">Output</th>
        <th class="input-form"  rowspan="2">NG</th>  
        <th class="input-form"  colspan="3" scope="col">Chip Condition</th>
        <th class="input-form"  rowspan="2" scope="col">Ag paste Condition</th>
      </tr>
      <tr>      
        <th class="input-form"  >LD Pos</th>
        <th class="input-form"  >Crack</th>
        <th class="input-form"  >Chipping</th>
      </tr>
    </thead>
    <thead align="center">
    </thead>
    <tbody>
        <td rowspan="2" >
          <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="number"  oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
          <td rowspan="2" >
          <input type="number" step="1" class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
        </td>
        <td rowspan="2" >
          <input type="number" step="0.01" class="form-control" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?> readonly>
        </td>
        <td rowspan="2" >
            <select id="par035" name="par035" class="form-select">
              <?php if(isset($alldata)){
                  if($alldata[0]["par035"]=="-"){
                    echo '
                      <option value="-" selected>-</option>
                      <option value="OK">OK</option>
                      <option value="NG">NG</option>
                    ';
                  }
                  else if($alldata[0]["par035"]=="OK")
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
            <select id="par036" name="par036" class="form-select">
              <?php if(isset($alldata)){
                  if($alldata[0]["par036"]=="-"){
                    echo '
                      <option value="-" selected>-</option>
                      <option value="OK">OK</option>
                      <option value="NG">NG</option>
                    ';
                  }
                  else if($alldata[0]["par036"]=="OK")
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
            <select id="par037" name="par037" class="form-select">
              <?php if(isset($alldata)){
                  if($alldata[0]["par037"]=="-"){
                    echo '
                      <option value="-" selected>-</option>
                      <option value="OK">OK</option>
                      <option value="NG">NG</option>
                    ';
                  }
                  else if($alldata[0]["par037"]=="OK")
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
            <select id="par038" name="par038" class="form-select">
              <?php if(isset($alldata)){
                  if($alldata[0]["par038"]=="-"){
                    echo '
                      <option value="-" selected>-</option>
                      <option value="OK">OK</option>
                      <option value="NG">NG</option>
                    ';
                  }
                  else if($alldata[0]["par038"]=="OK")
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
        <td rowspan="1" >
          <input type="text" step="1" class="form-control" id="par002" name="par002"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
    </tbody>
  </table>

  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th class="input-form" colspan="4" scope="col">Sampling Inspection * (200 pcs/lot)</th>
        <th class="input-form" colspan="3" >Measuring of die bonding position <br> (2 pcs/shift)</th>
        <th class="input-form" colspan="2" >Die Bonding Strength <br> (2 pcs/shift)</th>
      </tr>
      <tr>
        <th class="input-form" colspan="3" scope="col">Chip condition</th>
        <th class="input-form" rowspan="2">Ag paste Condition</th>
        <th class="input-form" rowspan="2" scope="col">Sample</th>
        <th class="input-form" rowspan="2" scope="col">X</th>
        <th class="input-form" rowspan="2" scope="col">Y</th>
        <th class="input-form" rowspan="2" scope="col">Sample</th>
        <th class="input-form" rowspan="2" scope="col">Result</th>
      </tr>
      <tr>
        <th class="input-form" >LD Pos</th>
        <th class="input-form" >Crack</th>
        <th class="input-form" >Chipping</th>
      </tr>
    </thead>
    <tbody>
        <tr>
        <td rowspan="2" >
            <select id="par039" name="par039" class="form-select">
              <?php if(isset($alldata)){
                  if($alldata[0]["par039"]=="-"){
                    echo '
                      <option value="-" selected>-</option>
                      <option value="OK">OK</option>
                      <option value="NG">NG</option>
                    ';
                  }
                  else if($alldata[0]["par039"]=="OK")
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
            <select id="par040" name="par040" class="form-select">
              <?php if(isset($alldata)){
                  if($alldata[0]["par040"]=="-"){
                    echo '
                      <option value="-" selected>-</option>
                      <option value="OK">OK</option>
                      <option value="NG">NG</option>
                    ';
                  }
                  else if($alldata[0]["par040"]=="OK")
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
            <select id="par041" name="par041" class="form-select">
              <?php if(isset($alldata)){
                  if($alldata[0]["par041"]=="-"){
                    echo '
                      <option value="-" selected>-</option>
                      <option value="OK">OK</option>
                      <option value="NG">NG</option>
                    ';
                  }
                  else if($alldata[0]["par041"]=="OK")
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
            <select id="par042" name="par042" class="form-select">
              <?php if(isset($alldata)){
                  if($alldata[0]["par042"]=="-"){
                    echo '
                      <option value="-" selected>-</option>
                      <option value="OK">OK</option>
                      <option value="NG">NG</option>
                    ';
                  }
                  else if($alldata[0]["par042"]=="OK")
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
          <th scope="row">Sample 1</th>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par017" name="par017"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par018" name="par018"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
          </td>
          <th scope="row">Sample 1</th>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par019" name="par019"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
          </td>
        </tr>
        <tr>
          <th scope="row">Sample 2</th>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par020" name="par020"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par021" name="par021"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
          </td>
          <th scope="row">Sample 2</th>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par022" name="par022"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
          </td>
        </tr>
      </tbody>
  </table>
</div>