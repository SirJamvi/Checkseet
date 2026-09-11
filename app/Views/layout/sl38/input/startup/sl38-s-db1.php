<div class="table-responsive" id="sl38-s-db1">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("PIN DIE BONDING 1 MACHINE")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th colspan="2" scope="col">Start up Check Item</th>
            <th scope="col" >Standard</th>
            <th scope="col" >Data</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td rowspan="2">1</td>
          <td rowspan="2">@ Pressure</td>
          <td >Air Pressure</td>
          <td >0.30 ~ 0.50 MPa</td>
          <td>
            <input class="form-control" type="number" step=0.001 id="par001" name="par001" onchange="changeRange('par001',0.30,0.50)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
            <td >N2 Pressure</td>
            <td >0.14 ~ 0.16 MPa</td>
            <td>
            <input class="form-control" type="number" step=0.001 id="par002" name="par002" onchange="changeRange('par002',0.14,0.16)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
            </td>
        </tr>

        <tr>
          <td rowspan="2">2</td>
          <td rowspan="2">@ Vacum Pressure</td>
          <td >D/B Collet</td>
          <td >-80.0 kPa atau kurang</td>
          <td>
            <input class="form-control" type="number" step=0.001 id="par003" name="par003" onchange="changeRange('par003',-9999999,-80)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
            <td >Middle Collet</td>
            <td >-80.0 kPa atau kurang</td>
            <td>
            <input class="form-control" type="number" step=0.001 id="par004" name="par004" onchange="changeRange('par004',-9999999,-80)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
            </td>
        </tr>

        <tr>
          <td >3</td>
          <td colspan="2">@ Collet Load</td>
          <td >0.8 ~ 1.2 N</td>
          <td>
            <input class="form-control" type="number" step=0.001 id="par005" name="par005" onchange="changeRange('par005',0.80,1.20)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>

        <tr>
          <td >4</td>
          <td colspan="2">@ Needle Push Up Level</td>
          <td >0.4 ~ 0.6 mm</td>
          <td>
            <input class="form-control" type="number" step=0.001 id="par006" name="par006" onchange="changeRange('par006',0.40,0.60)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td >5</td>
          <td colspan="3">* Pengecekan posisi die bonding <br> (Check posisi die bonding pada monitor)</td>
          <td>
            <select id="par007" name="par007" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par007"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[0]["par007"]=="OK")
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
        </tr>
        
        <tr>
          <td >6</td>
          <td colspan="3">* Needle and collet Check the shape and dirt <br> (Bersihkan dengan Cotton Bud)</td>
          <td>
            <select id="par008" name="par008" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par008"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[0]["par008"]=="OK")
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
        </tr>

        <tr>
          <td rowspan="3">7</td>
          <td rowspan="3">@ Collet down position</td>
          <td >Chip sheet</td>
          <td >-80 ~ -120 μm</td>
          <td>
            <input class="form-control" type="number" step=0.001 id="par009" name="par009" onchange="changeRange('par009',-120,-80)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Middle stage</td>
          <td >-80 ~ -120 μm</td>
          <td>
            <input class="form-control" type="number" step=0.001 id="par010" name="par010" onchange="changeRange('par010',-120,-80)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          </td>
        </tr>

        <tr>
          <td >D/B stage</td>
          <td >-80 ~ -120 μm</td>
          <td>
            <input class="form-control" type="number" step=0.001 id="par011" name="par011" onchange="changeRange('par011',-120,-80)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td >8 </td>
          <td colspan="3">*Pengecekan kondisi collet guide (check apakah collet guide goyang) </td>
          <td>
            <select id="par012" name="par012" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par012"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[0]["par012"]=="OK")
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
        </tr>
        
        <tr>
          <td rowspan="3">9</td>
          <td rowspan="3">@ Dispenser indication</td>
          <td >Air Pressure</td>
          <td >0.05 ~ 0.30 MPa</td>
          <td>
            <input class="form-control" type="number" step=0.001 id="par013" name="par013" onchange="changeRange('par013',0.05,0.30)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Dispense Time</td>
          <td >20 ~ 100 ms</td>
          <td>
            <input class="form-control" type="number" step=0.001 id="par014" name="par014" onchange="changeRange('par014',20,100)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Vaccum Pressure</td>
          <td >-0.3 ~ -0.1 kPa</td>
          <td>
            <input class="form-control" type="number" step=0.001 id="par015" name="par015" onchange="changeRange('par015',-0.3,-0.1)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">10</td>
          <td rowspan="2" colspan="2">* Check kondisi Ag Paste</td>
          <td >Posisi</td>
          <td>
            <select id="par016" name="par016" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par016"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[0]["par016"]=="OK")
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
        </tr>

        <tr>
          <td >Quantity</td>
          <td>
            <select id="par017" name="par017" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par017"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[0]["par017"]=="OK")
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
        </tr>

        <tr>
          <td >11</td>
          <td colspan="3">* Cleaning Machine <br> (Bersihkan mesin dan lingkungan sekitarnya dari debu dan kotoran)</td>
          <td>
            <select id="par018" name="par018" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par018"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[0]["par018"]=="OK")
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
        </tr>

        <tr>
          <td >12</td>
          <td colspan="3">* Check the dropped material <br> (Pengecekkan apakah ada material yang jatuh seperti chip, stem, dll)</td>
          <td>
            <select id="par019" name="par019" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par019"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[0]["par019"]=="OK")
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
        </tr>
        
        <tr>
          <td colspan="4">Note</td>
          <td>
            <input class="form-control" type="text"  id="par020" name="par020" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
          </td>
        </tr>
      </tbody>
    </table>
</div>