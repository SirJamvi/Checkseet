<div id="sldbm" class="table-responsive">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" >
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("PIN DIE BONDING MACHINE")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" colspan="4" scope="col">Quantity</th>
        <th class="input-form" colspan="4" scope="col">Foregoing Result* (20 pcs/lot)</th>
        <th class="input-form" colspan="4" scope="col">Sampling Inspection (200 pcs/lot)</th>
        <th class="input-form" colspan="1" rowspan="2" scope="col" >Judge</th>
        <th class="input-form" colspan="1" rowspan="2" scope="col" >M/C MTN*</th>
      </tr>
      <tr>
        <th class="input-form"  rowspan="4">Input</th>
        <th class="input-form"  rowspan="4">Output</th>
        <th class="input-form"  rowspan="4">NG</th>
        <th class="input-form"  rowspan="4">Yield(%)</th>
        <th class="input-form"  rowspan="4">Chip Condition LD Pos</th>
        <th class="input-form"  rowspan="4">Chip Condition Crack</th>
        <th class="input-form"  rowspan="4">Chip Condition Chipping</th>
        <th class="input-form"  rowspan="4">Ag paste Condition</th>
        <th class="input-form"  rowspan="4">Chip Condition LD Pos</th>
        <th class="input-form"  rowspan="4">Chip Condition Crack</th>
        <th class="input-form"  rowspan="4">Chip Condition Chipping</th>
        <th class="input-form"  rowspan="4">Ag paste Condition</th>
        
      </tr>
    </thead>
    <tbody>
        <td rowspan="2"  width="110px">
          <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
        </td>
        <td rowspan="2" style="vertical-align: middle; " width="110px">
          <input type="number"  oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
          <td rowspan="2"  width="120px">
          <input type="number" step="0.01" class="form-control" id="par015" name="par015" readonly <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
        </td>
        <td rowspan="2"  width="110px">
          <input type="number" step="0.01" class="form-control" id="par016" name="par016" readonly <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
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
        <td rowspan="1"  >
          <input type="text" class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
        <td rowspan="1"  >
          <input type="text" class="form-control" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
        </td>
    </tbody>
  </table>

  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th class="input-form" colspan="2" scope="col">Measuring of die bonding position (2 pcs/shift) Standard : Point 1 (Y)</th>
        <th class="input-form" colspan="2" scope="col">Die Bonding Strength (2 pcs/hari)</th>
        <th class="input-form" rowspan="2" >Remark</th>
      </tr>
      <tr>
        <th class="input-form"  rowspan="2">1</th>
        <th class="input-form"  rowspan="2">2</th>
        <th class="input-form"  rowspan="2">1</th>
        <th class="input-form"  rowspan="2">2</th>
      </tr>
    </thead>
    <tbody>
        <td rowspan="2" >
          <input type="number" step="0.00000001" class="form-control" id="par017" name="par017" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="number" step="0.00000001" class="form-control" id="par018" name="par018" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="number" step="0.00000001" class="form-control" id="par019" name="par019" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="number" step="0.00000001" class="form-control" id="par020" name="par020" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" step="1" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
    </tbody>
  </table>
</div>