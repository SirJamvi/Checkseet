<div class="table-responsive" id="sl90-s-bi">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("BURN IN MACHINE START UP (Chiller Type)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col" >Start Up Check Item</th>
            <th scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td>1</td>
          <td >*Checking Safety-Device <br> Memeriksa perangkat keamanan</td>
          <td >Lakukan aging dengan ACC, buka tutupnya dengan sengaja dan pastikan power suply berhenti</td>
          <td>
              <select id="par001" name="par001" class="form-select">
              <?php if(isset($alldata)){
                if($alldata[0]["par001"]=="-"){
                  echo '
                    <option value="-" selected>-</option>
                    <option value="OK">OK</option>
                    <option value="NG">NG</option>
                  ';
                }
                else if($alldata[0]["par001"]=="OK")
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
          <td rowspan="2">2</td>
          <td rowspan="2">* Water leak confirmation <br> Konfirmasi kebocoran air</td>
          <td >Pastikan apakah tidak ada kebocoran air pada chiller </td>
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
          <td >Pastikan tidak ada kebocoran pipa dari chiller ke heatsink</td>
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
          <td >* Confirmation of cooling water level (Chiller) <br> Konfirmasi ketinggian air pada chiller</td>
          <td >Pastikan apakah tidak ada kebocoran air pada chiller </td>
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
          <td >* Confirmation of overheating revention temperature (Chiller) <br> Konfirmasi overheat pada chiller</td>
          <td >Setting Temperature 90°C</td>
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
          <td >@ Chiller temperatur check <br> Memeriksa suhu chiller</td>
          <td >87°C ~ 93°C</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par006" name="par006" onchange="changeRange('par006',87,93)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="3">6</td>
          <td rowspan="3">* Confirmation of the filter <br> Konfirmasi Filter</td>
          <td >Pastikan filter tidak rusak</td>
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
          <td >Pastikan filter tidak ternoda</td>
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
          <td >Pastikan filter tidak terlepas</td>
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
          <td rowspan="3">7</td>
          <td rowspan="3">* Confirmation of alumunium tape <br> Konfirmasi alumunium tape</td>
          <td >Pastikan alumunium tape tidak terlepas</td>
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
          <td >Pastikan alumunium tape tidak sobek</td>
          <td>
              <select id="par011" name="par011" class="form-select">
              <?php if(isset($alldata)){
                if($alldata[0]["par011"]=="-"){
                  echo '
                    <option value="-" selected>-</option>
                    <option value="OK">OK</option>
                    <option value="NG">NG</option>
                  ';
                }
                else if($alldata[0]["par011"]=="OK")
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
          <td >Bersihkan kotoran pada alumunium tape dengan alcohol</td>
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
          <td colspan="3" >Note</td>
          <td >
            <input class="form-control" type="text" id="par013" name="par013" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>