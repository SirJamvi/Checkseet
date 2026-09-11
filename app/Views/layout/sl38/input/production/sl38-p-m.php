<div class="table-responsive" id="sl38-p-m">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th colspan="29" scope="col"><?php echo nl2br("PRODUCTION PROCESS CONTROL SHEET MARKING")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" colspan="3" scope="col" >Quantity</th>
        <th class="input-form" colspan="1" scope="col" >Marking Item</th>
        <th class="input-form" colspan="4" scope="col" >Foregoing Inspection</th>
        <th class="input-form" rowspan="2" scope="col" >Remark</th>
      </tr>
      <tr>
        <th class="input-form" >Input</th>
        <th class="input-form" >Output</th>
        <th class="input-form" >Reject</th>
        <th class="input-form" >Model Code</th>
        <th class="input-form" >Posisi pada Cap</th>
        <th class="input-form" >Tipis & Pecah</th>
        <th class="input-form" >Bentuk</th>
        <th class="input-form" >Others</th>
      </tr>
    </thead>
    <tbody>
        <td >
          <input type="number" step="1" class="form-control" id="par013" name="par013" onkeyup="quantityChange4()" onchange="quantityChange4()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." readonly";} ?>>
        </td>
        <td >
          <input type="number" step="1" class="form-control" id="par014" name="par014" onkeyup="quantityChange4()" onchange="quantityChange4()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
        <td >
          <input type="number" step="0.00000001" class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015']." ";} ?> readonly>
        </td>
        <td >
          <input type="text" step="0.00000001" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?> readonly>
        </td>
        <td>
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
        <td>
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
        <td>
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
        <td>
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
        <td >
          <input type="text" class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>

    </tbody>
  </table>
</div>