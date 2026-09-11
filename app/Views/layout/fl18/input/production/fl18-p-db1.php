<!-- FLDB1 -->
<div class="table-responsive">
  <?= csrf_field(); ?>
  <input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns">
    <thead align="center">
      <tr>
        <th colspan="10" scope="col"><?php echo nl2br("PRODUCTION PROCESS CONTROL DIE BONDING 1")?></th>
      </tr>
      <tr>
        <th class="input-form" rowspan="3" >Condition</th>
        <th class="input-form" rowspan="3">LD chip <br> Lot no.</th>
        <th class="input-form" rowspan="3">SM chip <br> Lot no.</th>
        <th class="input-form" colspan="3" scope="col">Quantity (finish)</th>
        <th class="input-form" rowspan="3">Yield (%)</th>
        <th class="input-form" colspan="6" scope="col">Foregoing Result (20 pcs/lot)</th>
      </tr>
      <tr>
        <th class="input-form" rowspan="2">Input</th>
        <th class="input-form" rowspan="2">Output</th>
        <th class="input-form" rowspan="2">NG</th>
        <th class="input-form" colspan="2" scope="col">SM chip</th>
        <th class="input-form" colspan="4" scope="col">LD chip</th>
      </tr>
      <tr>
        <th class="input-form" >Crack</th>
        <th class="input-form" >Chipping</th>
        <th class="input-form" >LD pos</th>
        <th class="input-form" >Miss LD chip</th>
        <th class="input-form" >Crack</th>
        <th class="input-form" >Chipping</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <th scope="row">Lot No</th>
        <td>
          <input type="text" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
        <td>
          <input type="text" class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." readonly";} ?>>
        </td>
        <td rowspan="2" >
          <input type="number"  oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
          <td rowspan="2" >
          <input type="number" step="1"class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
        </td>
        <td rowspan="2" >
          <input type="number" step="0.01" class="form-control" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?> readonly>
        </td>
        <td rowspan="2">
          <select class="form-select" id="par035" name="par035" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par035'];} ?>>
          <?php if(isset($alldata)){
              if($alldata[0]["par035"]=="-"){
                echo '
                  <option value="-" selected>-</option>
                  <option value="OK">OK</option>
                  <option value="NG">NG</option>
                ';
              }
              else if($alldata[0]["par035"]=="OK"){
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
              echo '
                <option value="-">-</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
              ';
            } ?>
          </select>
        </td>
        <td rowspan="2">
          <select class="form-select" id="par036" name="par036" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par036'];} ?>>
          <?php if(isset($alldata)){
              if($alldata[0]["par036"]=="-"){
                echo '
                  <option value="-" selected>-</option>
                  <option value="OK">OK</option>
                  <option value="NG">NG</option>
                ';
              }
              else if($alldata[0]["par036"]=="OK"){
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
              echo '
                <option value="-">-</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
              ';
            } ?>
          </select>
        </td>
        <td rowspan="2">
          <select class="form-select" id="par037" name="par037" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par037'];} ?>>
          <?php if(isset($alldata)){
              if($alldata[0]["par037"]=="-"){
                echo '
                  <option value="-" selected>-</option>
                  <option value="OK">OK</option>
                  <option value="NG">NG</option>
                ';
              }
              else if($alldata[0]["par037"]=="OK"){
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
              echo '
                <option value="-">-</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
              ';
            } ?>
          </select>
        </td>
        <td rowspan="2">
          <select class="form-select" id="par038" name="par038" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par038'];} ?>>
          <?php if(isset($alldata)){
              if($alldata[0]["par038"]=="-"){
                echo '
                  <option value="-" selected>-</option>
                  <option value="OK">OK</option>
                  <option value="NG">NG</option>
                ';
              }
              else if($alldata[0]["par038"]=="OK"){
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
              echo '
                <option value="-">-</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
              ';
            } ?>
          </select>
        </td>
        <td rowspan="2">
          <select class="form-select" id="par039" name="par039" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par039'];} ?>>
          <?php if(isset($alldata)){
              if($alldata[0]["par039"]=="-"){
                echo '
                  <option value="-" selected>-</option>
                  <option value="OK">OK</option>
                  <option value="NG">NG</option>
                ';
              }
              else if($alldata[0]["par039"]=="OK"){
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
              echo '
                <option value="-">-</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
              ';
            } ?>
          </select>
        </td>
        <td rowspan="2">
          <select class="form-select" id="par040" name="par040" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par040'];} ?>>
          <?php if(isset($alldata)){
              if($alldata[0]["par040"]=="-"){
                echo '
                  <option value="-" selected>-</option>
                  <option value="OK">OK</option>
                  <option value="NG">NG</option>
                ';
              }
              else if($alldata[0]["par040"]=="OK"){
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
              echo '
                <option value="-">-</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
              ';
            } ?>
          </select>
        </td>
      </tr>
        
      <tr>
        <th scope="row">Qty</th>
        <td>
          <input type="text" class="form-control" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
        </td>
        <td>
          <input type="text" class="form-control" id="par005" name="par005" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
        </td>
      </tr>
    </tbody>
  </table>
  <table class="table table-striped-columns">
    <thead align="center">
      <tr>
        <th class="input-form" rowspan="3" >Back Side <br> Checking <br> (1pcs/Lot) <br> ≥ 80%</th>
        <th class="input-form" rowspan="3" >Die Bond <br> Strength <br> (1pcs/Lot)</th>
        <th class="input-form" rowspan="3" >Fillet Check * <br> (2pcs/Lot)</th>
        <th class="input-form" rowspan="3" >Mark Check * <br> (2pcs/Lot)</th>
        <th class="input-form" colspan="4" scope="col">LD chip measure <br> (2pcs/ LD chip lot no)</th>
      </tr>
      <tr>
        <th class="input-form" colspan="2" scope="col">Sample 1</th>
        <th class="input-form" colspan="2" scope="col">Sample 2</th>
      </tr>
      <tr>
        <th >Tebal <br> (μm)</th>
        <th >Panjang <br> (μm)</th>
        <th >Tebal <br> (μm)</th>
        <th >Panjang <br> (μm)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td rowspan="2">
          <input type="number"  oninput="" step="0.00000001" class="form-control" id="par017" name="par017" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td>
        <td rowspan="2">
          <input type="number"  oninput="" step="0.00000001" class="form-control" id="par018" name="par018" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td>
        
        <td rowspan="2">
          <select class="form-select" id="par041" name="par041" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par041'];} ?>>
          <?php if(isset($alldata)){
              if($alldata[0]["par041"]=="-"){
                echo '
                  <option value="-" selected>-</option>
                  <option value="OK">OK</option>
                  <option value="NG">NG</option>
                ';
              }
              else if($alldata[0]["par041"]=="OK"){
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
              echo '
                <option value="-">-</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
              ';
            } ?>
          </select>
        </td>
        <td rowspan="2">
          <select class="form-select" id="par042" name="par042" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par042'];} ?>>
          <?php if(isset($alldata)){
              if($alldata[0]["par042"]=="-"){
                echo '
                  <option value="-" selected>-</option>
                  <option value="OK">OK</option>
                  <option value="NG">NG</option>
                ';
              }
              else if($alldata[0]["par042"]=="OK"){
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
              echo '
                <option value="-">-</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
              ';
            } ?>
          </select>
        </td>
        <td rowspan="2">
          <input type="text" class="form-control" id="par019" name="par019" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td>
        <td rowspan="2">
          <input type="text" class="form-control" id="par020" name="par020" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
        </td>
        <td rowspan="2">
          <input type="text" class="form-control" id="par021" name="par021" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
        </td>
        <td rowspan="2">
          <input type="text" class="form-control" id="par022" name="par022" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
        </td>
      </tr>
    </tbody>
  </table>
</div>