<div class="table-responsive" id="sl38-s-ht">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("HOT TEST MACHINE START UP (LD1220TE Type)")?></th>
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
            <input class="form-control" type="number" step=0.001 id="par001" name="par001" onchaXe="chaXeRaXe('par001',0.4,0.6)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="8">2</td>
          <td rowspan="8">* Standard Sample Measurement <br> (PeXukuran Standard Sample)</td>
          <td rowspan="8">Ukur standard sample pada setiap holder</td>
          <td >1</td>
          <td>
              <select id="par002" name="par002" class="form-select">
                  <?php if(isset($alldata)){
                      if($alldata[0]["par002"]=="-"){
                      echo '
                          <option value="-" selected>-</option>
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par002"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
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
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par003"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
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
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par004"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
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
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par005"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
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
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par006"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
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
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par007"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
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
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par008"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
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
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par009"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
                  } ?>
              </select>
            </td>
        </tr>

        <tr>
          <td >3</td>
          <td >* CheckiX of Contact pin <br> (Memeriksa Contact Pin)</td>
          <td colspan="2">Check kondisi probe pin holder apakah terjadi pembeXkVan, patah.</td>
          <td>
              <select id="par010" name="par010" class="form-select">
                  <?php if(isset($alldata)){
                      if($alldata[0]["par010"]=="-"){
                      echo '
                          <option value="-" selected>-</option>
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par010"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
                  } ?>
              </select>
            </td>
        </tr>

        <tr>
          <td rowspan="2">4</td>
          <td rowspan="2">* CheckiX of Clasification <br> *(Memeriksa klasifikasi)</td>
          <td colspan="2">Good Product</td>
          <td>
              <select id="par011" name="par011" class="form-select">
                  <?php if(isset($alldata)){
                      if($alldata[0]["par011"]=="-"){
                      echo '
                          <option value="-" selected>-</option>
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par011"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
                  } ?>
              </select>
            </td>
        </tr>

        <tr>
          <td colspan="2">X Product</td>
          <td>
              <select id="par012" name="par012" class="form-select">
                  <?php if(isset($alldata)){
                      if($alldata[0]["par012"]=="-"){
                      echo '
                          <option value="-" selected>-</option>
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par012"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
                  } ?>
              </select>
            </td>
        </tr>

        <tr>
          <td >5</td>
          <td >* CleaniX of Machine <br> *(Membersihkan Mesin)</td>
          <td colspan="2">Bersihkan mesin dari debu atau kotoran deXan Lap dan dari device yaX terjatuh.</td>
          <td>
              <select id="par013" name="par013" class="form-select">
                  <?php if(isset($alldata)){
                      if($alldata[0]["par013"]=="-"){
                      echo '
                          <option value="-" selected>-</option>
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par013"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
                  } ?>
              </select>
            </td>
        </tr>

        <tr>
          <td rowspan="8">6</td>
          <td rowspan="8">* Cek temperature holder <br> * (Memeriksa temperatur holder)</td>
          <td rowspan="8">59° ~ 61°C</td>
          <td >1</td>
          <td>
              <select id="par014" name="par014" class="form-select">
                  <?php if(isset($alldata)){
                      if($alldata[0]["par014"]=="-"){
                      echo '
                          <option value="-" selected>-</option>
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par014"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
                  } ?>
              </select>
            </td>
        </tr>

        <tr>
          <td >2</td>
          <td>
              <select id="par015" name="par015" class="form-select">
                  <?php if(isset($alldata)){
                      if($alldata[0]["par015"]=="-"){
                      echo '
                          <option value="-" selected>-</option>
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par015"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
                  } ?>
              </select>
            </td>
        </tr>
        <tr>
          <td >3</td>
          <td>
              <select id="par016" name="par016" class="form-select">
                  <?php if(isset($alldata)){
                      if($alldata[0]["par016"]=="-"){
                      echo '
                          <option value="-" selected>-</option>
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par016"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
                  } ?>
              </select>
            </td>
        </tr>
        <tr>
          <td >4</td>
          <td>
              <select id="par017" name="par017" class="form-select">
                  <?php if(isset($alldata)){
                      if($alldata[0]["par017"]=="-"){
                      echo '
                          <option value="-" selected>-</option>
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par017"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
                  } ?>
              </select>
            </td>
        </tr>
        <tr>
          <td >5</td>
          <td>
              <select id="par018" name="par018" class="form-select">
                  <?php if(isset($alldata)){
                      if($alldata[0]["par018"]=="-"){
                      echo '
                          <option value="-" selected>-</option>
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par018"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
                  } ?>
              </select>
            </td>
        </tr>
        <tr>
          <td >6</td>
          <td>
              <select id="par019" name="par019" class="form-select">
                  <?php if(isset($alldata)){
                      if($alldata[0]["par019"]=="-"){
                      echo '
                          <option value="-" selected>-</option>
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par019"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
                  } ?>
              </select>
            </td>
        </tr>
        <tr>
          <td >7</td>
          <td>
              <select id="par020" name="par020" class="form-select">
                  <?php if(isset($alldata)){
                      if($alldata[0]["par020"]=="-"){
                      echo '
                          <option value="-" selected>-</option>
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par020"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
                  } ?>
              </select>
            </td>
        </tr>
        <tr>
          <td >8</td>
          <td>
              <select id="par021" name="par021" class="form-select">
                  <?php if(isset($alldata)){
                      if($alldata[0]["par021"]=="-"){
                      echo '
                          <option value="-" selected>-</option>
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par021"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
                  } ?>
              </select>
            </td>
        </tr>

        <tr>
          <td >7</td>
          <td >* Check & Wear Safety goggles <br> *(Memeriksa & memakai kacamata peXaman)</td>
          <td colspan="2">Check kondisi kacamata peXaman <br> Ketika meXukur model High Power, harus meXgunakan kacamata peXaman</td>
          <td>
              <select id="par022" name="par022" class="form-select">
                  <?php if(isset($alldata)){
                      if($alldata[0]["par022"]=="-"){
                      echo '
                          <option value="-" selected>-</option>
                          <option value="V">V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else if($alldata[0]["par022"]=="V")
                      {
                      echo '
                          <option value="-">-</option>
                          <option value="V" selected>V</option>
                          <option value="X">X</option>
                      ';
                      }
                      else{
                      echo '
                          <option value="-">-</option>
                          <option value="V">V</option>
                          <option value="X" selected>X</option>
                      ';
                      }
                  }
                  else{
                      echo '<option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>';
                  } ?>
              </select>
            </td>
        </tr>

        

        <tr>
          <td colspan="4" >Note</td>
          <td >
            <input class="form-control" type="text" id="par026" name="par026" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>