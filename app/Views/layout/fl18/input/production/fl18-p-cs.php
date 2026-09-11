<div class="table-responsive">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns">
    <thead align="center">
      <tr>
        <th colspan="14" scope="col"><?php echo nl2br("PRODUCTION CONTROL SHEET CAP SET AUTO")?></th>
      </tr>
      <tr>
        <th class="input-form" colspan="4" scope="col">Quantity</th>
        <th class="input-form" colspan="6" scope="col">Foregoing Check (2 frame/lot)</th>
        <th class="input-form" colspan="2" scope="col">Cap Strength</th>
      </tr>
      <tr>
        <th class="input-form"  rowspan="4">Input</th>
        <th class="input-form"  rowspan="4">Output</th>
        <th class="input-form"  rowspan="4">NG</th>
        <th class="input-form"  rowspan="4">Yield</th>
        <th class="input-form"  rowspan="6">Float</th>
        <th class="input-form"  rowspan="6">Direction Surface</th>
        <th class="input-form"  rowspan="6">Direction 180</th>
        <th class="input-form"  rowspan="6">Scarch Cap</th>
        <th class="input-form"  rowspan="6">Scarch Frame</th>
        <th class="input-form"  rowspan="6">No Cap</th>
        <th class="input-form" colspan="2" scope="col">0.6 N atau lebih (2pcs/hari)</th>
        
      </tr>
      <tr>
        <th class="input-form" colspan="1" scope="col">A</th>
        <th class="input-form" colspan="1" scope="col">B</th>
      </tr>
    </thead>
    <tbody>
        <td rowspan="2" >
          <input type="number" oninput="" step="1" class="form-control" id="par013" name="par013"  onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." readonly";} ?>>
        </td>
        <td rowspan="2" >
          <input type="number" oninput="" step="1" class="form-control" id="par014" name="par014"  onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="number" oninput="" step="1" class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
        </td>
        <td rowspan="2" >
          <input type="number" oninput="" step="0.01" class="form-control" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?> readonly>
        </td>
        <td rowspan="2" >
            <select class="form-select" id="par035" name="par035" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par035'];} ?>>
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
            <select class="form-select" id="par036" name="par036" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par036'];} ?>>
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
            <select class="form-select" id="par037" name="par037" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par037'];} ?>>
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
            <select class="form-select" id="par038" name="par038" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par038'];} ?>>
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
            <select class="form-select" id="par039" name="par039" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par039'];} ?>>
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
            <select class="form-select" id="par040" name="par040" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par040'];} ?>>
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
          <input type="number" oninput="" step="0.00000001" class="form-control" id="par017" name="par017" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017']." readonly";} ?>>
        </td>
        <td rowspan="2" >
          <input type="number" oninput="" step="0.00000001" class="form-control" id="par018" name="par018" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018']." readonly";} ?>>
        </td>
    </tbody>
  </table>
</div>