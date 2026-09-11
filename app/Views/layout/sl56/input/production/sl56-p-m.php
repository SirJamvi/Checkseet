<div class="table-responsive" id="slcsm">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th colspan="30" scope="col"><?php echo nl2br("MARKING")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" colspan="3" scope="col" >Quantity</th>
        <th class="input-form" rowspan="4" >Yield (%)</th>
        <th class="input-form" colspan="1" scope="col" >Marking Item</th>
        <th class="input-form" colspan="4" scope="col" >Foregoing Inspection <br> Visual (karakter marking) 5 pcs/lot</th>
        <th class="input-form" colspan="4" scope="col" >Sampling Inspection <br> Visual (karakter marking) 20 pcs/tray</th>
        <th class="input-form" rowspan="4" >Note</th>
      </tr>
    
      <tr>
        <th class="input-form"  rowspan="3" >Input</th>
        <th class="input-form"  rowspan="3" >Output</th>
        <th class="input-form"  rowspan="3" >Reject</th>
        <th class="input-form"  rowspan="3" >Model Code</th>
        <th class="input-form"  rowspan="4" >Pecah</th>
        <th class="input-form"  rowspan="4" >Tipis & Pecah</th>
        <th class="input-form"  rowspan="4" >Bentuk huruf</th>
        <th class="input-form"  rowspan="4" >Others</th>
        <th class="input-form"  rowspan="4" >Pecah</th>
        <th class="input-form"  rowspan="4" >Tipis & Pecah</th>
        <th class="input-form"  rowspan="4" >Bentuk huruf</th>
        <th class="input-form"  rowspan="4" >Others</th>
      </tr>
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
          <input type="text" step="1" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
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
        <td rowspan="2" >
            <select id="par043" name="par043" class="form-select">
              <?php if(isset($alldata)){
                  if($alldata[0]["par043"]=="-"){
                    echo '
                      <option value="-" selected>-</option>
                      <option value="OK">OK</option>
                      <option value="NG">NG</option>
                    ';
                  }
                  else if($alldata[0]["par043"]=="OK")
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
          <input type="text" step="1" class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
    </tbody>
  </table>
</div>