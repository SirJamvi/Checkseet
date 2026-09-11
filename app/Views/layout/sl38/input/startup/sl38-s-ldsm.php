<div class="table-responsive" id="sl38-s-ldsm">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("LDSM MACHINE START UP")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col" colspan="2">Start Up Check Item</th>
            <th scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td rowspan="3">1</td>
          <td rowspan="2">@ Air Pressure</td>
          <td >Drive Air</td>
          <td rowspan="2">0.4 ~ 0.6 Mpa</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par001" name="par001" onchange="changeRange('par001',0.40,0.60)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Blow Air</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par002" name="par002" onchange="changeRange('par002',0.40,0.60)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="2">N2 Pressure</td>
          <td >0.20 ~ 0.30 Mpa</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par003" name="par003" onchange="changeRange('par003',0.20,0.30)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="12">2</td>
          <td rowspan="3">@ Vacuum Source Pressure</td>
          <td >Source Vacuum 1</td>
          <td >-70 kPa atau kurang</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par004" name="par004" onchange="changeRange('par004',-9999999,-70)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Source Vacuum 2</td>
          <td rowspan="2">-80 kPa atau kurang</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par005" name="par005" onchange="changeRange('par005',-9999999,-80)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Source Vacuum 3</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par006" name="par006" onchange="changeRange('par006',-9999999,-80)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
            <td rowspan="9">@ Vacuum Pressure</td>
            <td > Stem Loader PP1</td>
            <td rowspan="3">-70kPa atau kurang</td>
            <td >
            <input class="form-control" type="number" step=0.001 id="par007" name="par007" onchange="changeRange('par007',-9999999,-70)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>

        <tr>
            <td > Stem Loader PP2</td>
            <td >
            <input class="form-control" type="number" step=0.001 id="par008" name="par008" onchange="changeRange('par008',-9999999,-70)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
        </tr>

        <tr>
            <td > Stem Loader PP3</td>
            <td >
            <input class="form-control" type="number" step=0.001 id="par009" name="par009" onchange="changeRange('par009',-9999999,-70)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
        </tr>

        <tr>
            <td > Submount Chip Ring</td>
            <td rowspan="2">-50kPa atau kurang</td>
            <td >
            <input class="form-control" type="number" step=0.001 id="par010" name="par010" onchange="changeRange('par010',-9999999,-50)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          </td>
        </tr>

        <tr>
            <td > Laser Chip Push-Up Ring</td>
            <td >
            <input class="form-control" type="number" step=0.001 id="par011" name="par011" onchange="changeRange('par011',-9999999,-50)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
          </td>
        </tr>

        <tr>
            <td > Stem Unloader PP1</td>
            <td rowspan="3">-70kPa atau kurang</td>
            <td >
            <input class="form-control" type="number" step=0.001 id="par012" name="par012" onchange="changeRange('par012',-9999999,-70)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
          </td>
        </tr>

        <tr>
            <td > Stem Unloader PP2</td>
            <td >
            <input class="form-control" type="number" step=0.001 id="par013" name="par013" onchange="changeRange('par013',-9999999,-70)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
        </tr>

        <tr>
            <td > Stem Unloader PP3</td>
            <td >
            <input class="form-control" type="number" step=0.001 id="par014" name="par014" onchange="changeRange('par014',-9999999,-70)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
          </td>
        </tr>

        <tr>
            <td > SM Loader PP</td>
            <td >-80kPa atau kurang</td>
            <td >
            <input class="form-control" type="number" step=0.001 id="par015" name="par015" onchange="changeRange('par015',-9999999,-80)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="4">3</td>
          <td rowspan="4">@ Collet Load</td>
          <td >LD Pick Up Collet </td>
          <td rowspan="2">0.2 ~ 0.4 N</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par016" name="par016" onchange="changeRange('par016',0.20,0.40)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
          </td>
        </tr>

        <tr>
          <td >LD DB Collet </td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par017" name="par017" onchange="changeRange('par017',0.20,0.40)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
          </td>
        </tr>

        <tr>
          <td >SM Pick Up Collet</td>
          <td rowspan="2">0.6 ~ 0.8 N</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par018" name="par018" onchange="changeRange('par018',0.60,0.80)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
          </td>
        </tr>

        <tr>
          <td >SM DB Collet</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par019" name="par019" onchange="changeRange('par019',0.60,0.80)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">4</td>
          <td rowspan="2">@ Needle Push Up Level</td>
          <td >LD</td>
          <td rowspan="2">0.2 ~ 0.6 mm</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par020" name="par020" onchange="changeRange('par020',0.20,0.60)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
          </td>
        </tr>

        <tr>
          <td >SM</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par021" name="par021" onchange="changeRange('par021',0.20,0.60)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
          </td>
        </tr>

        <tr>
          <td >5</td>
          <td >* Cleaning</td>
          <td >LD collet, SM collet, Stem collet dan masing-masing stage</td>
          <td >Bersihkan dengan cotton bud dan basahi dengan alkohol</td>
          <td>
              <select class="form-select" id="par022" name="par022">
              <?php if(isset($alldata)){
                  if($alldata[0]["par022"]=="-"){
                      echo '
                      <option value="-" selected>-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                      ';
                  }
                  else if($alldata[0]["par022"]=="V"){
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
                  echo '
                      <option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                  ';
              } ?>
              </select>
            </td>
        </tr>

        <tr>
          <td >6</td>
          <td colspan="2">* Check the collet guide</td>
          <td >Check apakah collet guide smooth dan stabil</td>
          <td>
              <select class="form-select" id="par023" name="par023">
              <?php if(isset($alldata)){
                  if($alldata[0]["par023"]=="-"){
                      echo '
                      <option value="-" selected>-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                      ';
                  }
                  else if($alldata[0]["par023"]=="V"){
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
                  echo '
                      <option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                  ';
              } ?>
              </select>
            </td>
        </tr>

        <tr>
          <td rowspan="2">7</td>
          <td rowspan="2" colspan="2">* Check arah lon Blower Fan</td>
          <td >Posisi blower</td>
          <td>
              <select class="form-select" id="par024" name="par024">
              <?php if(isset($alldata)){
                  if($alldata[0]["par024"]=="-"){
                      echo '
                      <option value="-" selected>-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                      ';
                  }
                  else if($alldata[0]["par024"]=="V"){
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
                  echo '
                      <option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                  ';
              } ?>
              </select>
            </td>
        </tr>

        <tr>
          <td >Putaran blower</td>
          <td>
              <select class="form-select" id="par025" name="par025">
              <?php if(isset($alldata)){
                  if($alldata[0]["par025"]=="-"){
                      echo '
                      <option value="-" selected>-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                      ';
                  }
                  else if($alldata[0]["par025"]=="V"){
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
                  echo '
                      <option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                  ';
              } ?>
              </select>
            </td>
        </tr>

        <tr>
          <td >8</td>
          <td colspan="2">* Check die bonding position</td>
          <td >Periksa posisi die bonding dengan melihat monitor</td>
          <td>
              <select class="form-select" id="par026" name="par026">
              <?php if(isset($alldata)){
                  if($alldata[0]["par026"]=="-"){
                      echo '
                      <option value="-" selected>-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                      ';
                  }
                  else if($alldata[0]["par026"]=="V"){
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
                  echo '
                      <option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                  ';
              } ?>
              </select>
          </td>
        </tr>

        <tr>
          <td >9</td>
          <td colspan="2">* Check the electromagnetic lock</td>
          <td >Periksa the lock "ON" pada saat pengoperasian auto</td>
          <td>
              <select class="form-select" id="par027" name="par027">
              <?php if(isset($alldata)){
                  if($alldata[0]["par027"]=="-"){
                      echo '
                      <option value="-" selected>-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                      ';
                  }
                  else if($alldata[0]["par027"]=="V"){
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
                  echo '
                      <option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                  ';
              } ?>
              </select>
            </td>
        </tr>

        <tr>
          <td >10</td>
          <td colspan="2">* Cleaning Machine</td>
          <td >Bersihkan mesin dan lingkungan sekitarnya dari debu dan kotoran</td>
          <td>
              <select class="form-select" id="par028" name="par028">
              <?php if(isset($alldata)){
                  if($alldata[0]["par028"]=="-"){
                      echo '
                      <option value="-" selected>-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                      ';
                  }
                  else if($alldata[0]["par028"]=="V"){
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
                  echo '
                      <option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                  ';
              } ?>
              </select>
            </td>
        </tr>

        <tr>
          <td >11</td>
          <td colspan="2">* Check the die bonding setting</td>
          <td >Periksa apakah pengaturan heater dan parameter sudah benar</td>
          <td>
              <select class="form-select" id="par029" name="par029">
              <?php if(isset($alldata)){
                  if($alldata[0]["par029"]=="-"){
                      echo '
                      <option value="-" selected>-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                      ';
                  }
                  else if($alldata[0]["par029"]=="V"){
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
                  echo '
                      <option value="-">-</option>
                      <option value="V">V</option>
                      <option value="X">X</option>
                  ';
              } ?>
              </select>
            </td>
        </tr>

        <tr>
          <td colspan="4" >Note</td>
          <td >
            <input class="form-control" type="text" id="par030" name="par030" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par030'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>