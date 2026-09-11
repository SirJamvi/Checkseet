<div class="table-responsive" id="sl56-f-fcs">
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
        <th rowspan="2" >Alasan Inspeksi</th>
        <th colspan="4" scope="col" >Visual & Peel Test Check *</th>
        <th colspan="5" scope="col" >Off Center & Stem Check</th>
        <th rowspan="2" >1st Lot Production Use</th>
        <th rowspan="2" >Notes</th>
      </tr>
      <tr>
        <th >ST1</th>
        <th >ST2</th>
        <th >ST3</th>
        <th >ST4</th>
        <th >Label</th>
        <th >ST1</th>
        <th >ST2</th>
        <th >ST3</th>
        <th >ST4</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td rowspan="4" >
            <textarea class="form-control" id="par002" name="par002" rows="5" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>></textarea>
          </td>
          <td rowspan="4" >
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
          <td rowspan="4" >
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
          <td rowspan="4" >
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
          <td rowspan="4" >
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
          <th scope="row">X.</th>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par017" name="par017" placeholder="X." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par018" name="par018" placeholder="X." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par019" name="par019" placeholder="X." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par020" name="par020" placeholder="X." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
          </td>

          <td rowspan="4" >
            <textarea class="form-control" id="par003" name="par003" rows="5" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>></textarea>
          </td>
          <td rowspan="4" >
            <textarea class="form-control" id="par004" name="par004" rows="5" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>></textarea>
          </td>
        </tr>
        
        <tr>
          <th scope="row">Y.</th>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par021" name="par021" placeholder="Y." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par022" name="par022" placeholder="Y." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par023" name="par023" placeholder="Y." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par024" name="par024" placeholder="Y." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
          </td>
        </tr>

        <tr>
          <th scope="row">r.</th>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par025" name="par025" placeholder="r." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par026" name="par026" placeholder="r." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par027" name="par027" placeholder="r." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par028" name="par028" placeholder="r." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
          </td>
        </tr>

        <tr>
          <th scope="row">s.</th>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par029" name="par029" placeholder="s." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par029'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par030" name="par030" placeholder="s." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par030'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par031" name="par031" placeholder="s." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par031'];} ?>>
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par032" name="par032" placeholder="s." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par032'];} ?>>
          </td>
        </tr>
    </tbody>
  </table>
</div>