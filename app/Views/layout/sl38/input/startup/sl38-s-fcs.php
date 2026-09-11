<div class="table-responsive" id="sl38-s-fcs">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" <?php $selected_device = filter_input(INPUT_POST, 'device',	FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY
    ); if ($selected_device === "sl56"){echo "";}else{echo "";}; ?>
    >
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("FOREGOING CAP SEAL")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" rowspan="2" >Alasan Inspeksi</th>
        <th class="input-form" colspan="4" scope="col" >Visual & Peel Test Check *</th>
        <th class="input-form" colspan="5" scope="col" >Off Center & Stem Check</th>
        <th class="input-form" rowspan="2" >1st Lot Production Use</th>
        <th class="input-form" rowspan="2" >Notes</th>
      </tr>
      <tr>
        <th class="input-form" >ST1</th>
        <th class="input-form" >ST2</th>
        <th class="input-form" >ST3</th>
        <th class="input-form" >ST4</th>
        <th class="input-form" >Label</th>
        <th class="input-form" >ST1</th>
        <th class="input-form" >ST2</th>
        <th class="input-form" >ST3</th>
        <th class="input-form" >ST4</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td rowspan="4" >
            <textarea class="form-control" id="par001" name="par001" rows="5" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>></textarea>
          </td>
          <td rowspan="4" >
          <select id="par002" name="par002" class="form-select">
          <?php if(isset($alldata)){
                if($alldata[0]["par002"]=="-"){
                  echo '
                    <option value="-" selected>-</option>
                    <option value="OK">OK</option>
                    <option value="NG">NG</option>
                  ';
                }
                else if($alldata[0]["par002"]=="OK")
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
          <td rowspan="4" >
            <select id="par003" name="par003" class="form-select">
            <?php if(isset($alldata)){
                if($alldata[0]["par003"]=="-"){
                  echo '
                    <option value="-" selected>-</option>
                    <option value="OK">OK</option>
                    <option value="NG">NG</option>
                  ';
                }
                else if($alldata[0]["par003"]=="OK")
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
          <td rowspan="4" >
            <select id="par004" name="par004" class="form-select">
            <?php if(isset($alldata)){
                if($alldata[0]["par004"]=="-"){
                  echo '
                    <option value="-" selected>-</option>
                    <option value="OK">OK</option>
                    <option value="NG">NG</option>
                  ';
                }
                else if($alldata[0]["par004"]=="OK")
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
          <td rowspan="4" >
            <select id="par005" name="par005" class="form-select">
            <?php if(isset($alldata)){
                if($alldata[0]["par005"]=="-"){
                  echo '
                    <option value="-" selected>-</option>
                    <option value="OK">OK</option>
                    <option value="NG">NG</option>
                  ';
                }
                else if($alldata[0]["par005"]=="OK")
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
          <th scope="row">X.</th>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par006" name="par006" placeholder="X." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par007" name="par007" placeholder="X." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par008" name="par008" placeholder="X." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par009" name="par009" placeholder="X." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>

          <td rowspan="4" >
            <input type="text" step="1" class="form-control" id="par010" name="par010" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          </td>
          <td rowspan="4" >
            <input type="text" step="1" class="form-control" id="par011" name="par011" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
          </td>
        </tr>
        <tr>
          <th scope="row">Y.</th>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par012" name="par012" placeholder="Y." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par013" name="par013" placeholder="Y." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par014" name="par014" placeholder="Y." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par015" name="par015" placeholder="Y." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
          </td>

        </tr>
        <tr>
          <th scope="row">r.</th>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par016" name="par016" placeholder="r." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par017" name="par017" placeholder="r." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par018" name="par018" placeholder="r." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par019" name="par019" placeholder="r." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
          </td>

        </tr>
    </tbody>
  </table>
</div>