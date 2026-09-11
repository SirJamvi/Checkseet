<div class="table-responsive" id="sl38-s-ft">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("FINAL TEST MACHINE START UP\n Alphax (LD1360AHP) Single Laser 3.8")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col" >Start Up Check Item</th>
            <th colspan="2" scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td>1</td>
          <td >@ Air Pressure</td>
          <td colspan="2">0.4 ~ 0.6 MPa</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par001" name="par001" onchange="changeRange('par001',0.4,0.6)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="9">2</td>
          <td rowspan="9">* Standard Sample Measurement <br> (Pengukuran Standard Sample)</td>
          <td rowspan="9">Ukur standard sample pada setiap holder</td>
          <td >Holder</td>
          <td ></td>
        </tr>

        <tr>
          <td >1</td>
          <td>
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
        </tr>
        <tr>
          <td >2</td>
          <td>
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
        </tr>
        <tr>
          <td >3</td>
          <td>
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
        </tr>
        <tr>
          <td >4</td>
          <td>
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
        </tr>
        <tr>
          <td >5</td>
          <td>
            <select id="par006" name="par006" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par006"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[0]["par006"]=="OK")
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
          <td >7</td>
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
          <td >8</td>
          <td>
            <select id="par009" name="par009" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par009"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[0]["par009"]=="OK")
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
          <td >3</td>
          <td >* Checking of Contact pin <br> (Memeriksa Contact Pin)</td>
          <td colspan="2">Check kondisi probe pin holder apakah terjadi pembengkokan, patah.</td>
          <td>
            <select id="par010" name="par010" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par010"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[0]["par010"]=="OK")
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
          <td rowspan="9">4</td>
          <td rowspan="9">@ Check temperature <br> (Memeriksa temperature)</td>
          <td rowspan="9">Check temperatur pada setiap holder <br> 25°C ± 1°C</td>
          <td >Holder</td>
          <td ></td>
        </tr>

        <tr>
          <td >1</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par011" name="par011" onchange="changeRange('par011',24,26)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
          </td>
        </tr>
        <tr>
          <td >2</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par012" name="par012" onchange="changeRange('par012',24,26)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
          </td>
        </tr>
        <tr>
          <td >3</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par013" name="par013" onchange="changeRange('par013',24,26)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
        </tr>
        <tr>
          <td >4</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par014" name="par014" onchange="changeRange('par014',24,26)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
          </td>
        </tr>
        <tr>
          <td >5</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par015" name="par015" onchange="changeRange('par015',24,26)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
          </td>
        </tr>
        <tr>
          <td >6</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par016" name="par016" onchange="changeRange('par016',24,26)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
          </td>
        </tr>
        <tr>
          <td >7</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par017" name="par017" onchange="changeRange('par017',24,26)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
          </td>
        </tr>
        <tr>
          <td >8</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par018" name="par018" onchange="changeRange('par018',24,26)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
          </td>
        </tr>

        <tr>
          <td >5</td>
          <td >* Check Over ride Setting <br> *(Memeriksa pengaturan over ride)</td>
          <td colspan="2">Konfirmasi pengaturan over ride ke "OFF"</td>
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
          <td >6</td>
          <td >* Cleaning of Machine <br> *(Membersihkan Mesin)</td>
          <td colspan="2">Bersihkan mesin dari debu atau kotoran dengan Lap dan dari device yang terjatuh.</td>
          <td>
            <select id="par020" name="par020" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par020"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[0]["par020"]=="OK")
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
          <td colspan="4" >Note</td>
          <td >
            <input class="form-control" type="text" id="par021" name="par021" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>