<div class="table-responsive">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns">
        <thead align="center">
        <tr>
            <th colspan="35" scope="col"><?php echo nl2br("WIRE BONDING")?></th>
        </tr>
        </thead>
        <thead align="center">
            <tr>
                <th class="input-form" rowspan="3"  width="250px">Gold Wire Lot No.</th>
                <th class="input-form" rowspan="3"  width="250px">Assy Lot No.</th>
                <th class="input-form" colspan="4" rowspan="1" scope="col" >Quantity</th>
                <th class="input-form" colspan="4" rowspan="1" scope="col" >Foregoing Inspection (20pcs/lot)</th>
                <!-- <th class="input-form" colspan="12" scope="col" >Lakukan wire pull test 2pcs/shift</th> -->
            </tr>
        
            <tr>
                <th class="input-form" rowspan="2">Input</th>
                <th class="input-form" rowspan="2">Output</th>
                <th class="input-form" rowspan="2">NG</th>
                <th class="input-form" rowspan="2">Yield</th>
                <th class="input-form" rowspan="2">Ball Pos</th>
                <th class="input-form" colspan="2">Ball Size</th>
                <th class="input-form" rowspan="2">Loop Shape</th>
            </tr>
            <tr>
                <th class="input-form">X</th>
                <th class="input-form">Y</th>
            </tr>
        </thead>
        <tbody>
            <td>
                <input type="text" class="form-control" id="par002" name="par002" placeholder="Gold Wire Lot No" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
            </td>
            <td>
                <input type="text" class="form-control" id="par003" name="par003" placeholder="Assy Lot No." <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
            </td>
            <td>
                <input type="text"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
            </td>
            <td>
                <input type="text"  oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
            </td>
            <td>
                <input type="text" class="form-control" id="par015" name="par015" readonly <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
            </td>
            <td>
                <input type="text" step="0.01" class="form-control" id="par016" name="par016" readonly <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?> readonly>
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
        </tbody>
        </table>

    <table class="table table-striped-columns">
    <thead align="center">
        <tr>
            <th colspan="16" scope="col" >Lakukan wire pull test 2pcs/shift*</th>
        </tr>
    
        <tr>
            <th class="input-form" scope="col" colspan="6">Sample 1</th>
            <th class="input-form" scope="col" colspan="6">Sample 2</th>
        </tr>

        <tr> 
            <th class="input-form" scope="col" colspan="2">Submount</th>
            <th class="input-form" scope="col" colspan="2">LD</th>
            <th class="input-form" scope="col" colspan="2">PD</th>
            <th class="input-form" scope="col" colspan="2">Submount</th>
            <th class="input-form" scope="col" colspan="2">LD</th>
            <th class="input-form" scope="col" colspan="2">PD</th>
        </tr>    
    
        <tr>
            <th class="input-form" scope="col">Val</th>
            <th class="input-form" scope="col">Pos</th>

            <th class="input-form" scope="col">Val</th>
            <th class="input-form" scope="col">Pos</th>

            <th class="input-form" scope="col">Val</th>
            <th class="input-form" scope="col">Pos</th>
            
            <th class="input-form" scope="col">Val</th>
            <th class="input-form" scope="col">Pos</th>

            <th class="input-form" scope="col">Val</th>
            <th class="input-form" scope="col">Pos</th>

            <th class="input-form" scope="col">Val</th>
            <th class="input-form" scope="col">Pos</th>
        </tr>
    </thead>
    <tbody>
    <td>
            <input type="number" step="0.00000000001" class="form-control" id="par017" name="par017"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td>
        <td>
            <select id="par039" name="par039" class="form-select">
                 <?php if(isset($alldata)){
                    if($alldata[0]["par039"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par039"]=="A")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A" selected>A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par039"]=="B")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B" selected>B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par039"]=="C")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C" selected>C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par039"]=="D")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D" selected>D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else{
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D" >D</option>
                        <option value="E" selected>E</option>
                        ';
                    }}
                    else{
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }?>
            </select>
        </td>
        <td>
            <input type="number" step="0.00000000001" class="form-control" id="par018" name="par018"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td>
        <td>
            <select id="par040" name="par040" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par040"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par040"]=="A")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A" selected>A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par040"]=="B")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B" selected>B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par040"]=="C")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C" selected>C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par040"]=="D")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D" selected>D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else{
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D" >D</option>
                        <option value="E" selected>E</option>
                        ';
                    }}
                    else{
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }?>
            </select>
        </td>
        <td>
            <input type="number" step="0.00000000001" class="form-control" id="par019" name="par019"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td>
        <td>
            <select id="par041" name="par041" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par041"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par041"]=="A")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A" selected>A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par041"]=="B")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B" selected>B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par041"]=="C")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C" selected>C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par041"]=="D")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D" selected>D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else{
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D" >D</option>
                        <option value="E" selected>E</option>
                        ';
                    }}
                    else{
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }?>
            </select>
        </td>
        <td>
            <input type="number" step="0.00000000001" class="form-control" id="par020" name="par020"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
        </td>
        <td>
            <select id="par042" name="par042" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par042"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par042"]=="A")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A" selected>A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par042"]=="B")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B" selected>B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par042"]=="C")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C" selected>C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par042"]=="D")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D" selected>D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else{
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D" >D</option>
                        <option value="E" selected>E</option>
                        ';
                    }}
                    else{
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }?>
            </select>
        </td>
        <td>
            <input type="number" step="0.00000000001" class="form-control" id="par021" name="par021"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
        </td>
        <td>
            <select id="par043" name="par043" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par043"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par043"]=="A")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A" selected>A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par043"]=="B")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B" selected>B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par043"]=="C")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C" selected>C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par043"]=="D")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D" selected>D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else{
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D" >D</option>
                        <option value="E" selected>E</option>
                        ';
                    }}
                    else{
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }?>
            </select>
        </td>
        <td>
            <input type="number" step="0.00000000001" class="form-control" id="par022" name="par022"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
        </td>
        <td>
            <select id="par044" name="par044" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par044"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par044"]=="A")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A" selected>A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par044"]=="B")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B" selected>B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par044"]=="C")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C" selected>C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else if($alldata[0]["par044"]=="D")
                    {
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D" selected>D</option>
                        <option value="E">E</option>
                        ';
                    }
                    else{
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D" >D</option>
                        <option value="E" selected>E</option>
                        ';
                    }}
                    else{
                        echo '
                        <option value="-">-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        ';
                    }?>
            </select>
        </td>   
    </tbody>
    </table>
</div>
</div>