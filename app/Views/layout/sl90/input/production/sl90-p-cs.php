<div class="table-responsive" id="sl90-p-cs">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" <?php $selected_device = filter_input(INPUT_POST, 'device',	FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY
    ); if ($selected_device === "sl56"){echo "";}else{echo "";}; ?>
    >
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("CAP SEAL\n(Automatic Machine)")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" colspan="3" scope="col">Quantity</th>
        <th class="input-form"  rowspan="4">Cap Lot No.</th>
        <th class="input-form" colspan="3" scope="col">Foregoing Insp. (20pcs/lot)</th>
        <th class="input-form" colspan="2"  rowspan="4">@Stem Dimension (8.975 - 9.0 mm) 5pcs/shift</th>
        <th class="input-form" colspan="4" scope="col">Usage Time</th>
      </tr>
      <tr>
        <th class="input-form"  rowspan="3">Input</th>
        <th class="input-form"  rowspan="3">Output</th>
        <th class="input-form"  rowspan="3">Reject</th>
        <th class="input-form"  rowspan="3">Stem Scratch</th>
        <th class="input-form"  rowspan="3">Protrussion</th>
        <th class="input-form"  rowspan="3">Bari</th>
        <th class="input-form" colspan="2" scope="col">Upper Electrode</th>
        <th class="input-form" colspan="2" scope="col">Middle Electrode</th>
      </tr>
      <tr>
        <th class="input-form" colspan="2" scope="col">(@10000 kali)</th>
        <th class="input-form" colspan="2" rowspan="2" >(@20000 kali)</th>
      </tr>
      <tr>
      
        <th class="input-form" scope="col">1</th>
        <th class="input-form" scope="col">2</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td rowspan="2" >
          <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup="quantityChange4()" onchange="quantityChange4()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="number"  oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup="quantityChange4()" onchange="quantityChange4()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="number" step="1" class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
        </td>
        <td rowspan="2" >
          <input type="text" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
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
        <td class="input-form"  >
          <input type="number" step="0.00000001" class="form-control" id="par016" name="par016" placeholder="1." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
        </td<td  >
          <input type="number" step="0.00000001" class="form-control" id="par017" name="par017" placeholder="2." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td<td  >
          <input type="number" step="0.00000001" class="form-control" id="par018" name="par018" placeholder="3." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td>
        <td class="input-form"  >
          <input type="number" step="0.00000001" class="form-control" id="par019" name="par019" placeholder="4." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td<td  >
          <input type="number" step="0.00000001" class="form-control" id="par026" name="par026" placeholder="5." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
        </td>
        <td  >
          <input type="number" step="0.00000001" class="form-control" id="par020" name="par020" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
        </td>
        <td  >
          <input type="number" step="0.00000001" class="form-control" id="par021" name="par021" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
        </td>
        <td class="input-form"  >
          <input type="number" step="0.00000001" class="form-control" id="par022" name="par022" placeholder="1." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
        </td<td  >
          <input type="number" step="0.00000001" class="form-control" id="par023" name="par023" placeholder="2." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
        </td>
        <td class="input-form"  >
          <input type="number" step="0.00000001" class="form-control" id="par024" name="par024" placeholder="3." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
        </td<td  >
          <input type="number" step="0.00000001" class="form-control" id="par025" name="par025" placeholder="4." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
        </td>
      </tr>
    </tbody>
  </table>
  
</div>