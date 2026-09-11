<div class="table-responsive" id="fl18-s-db1d">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("LD DIE BONDING 1 MACHINE Model GH17P28A8C2")?></th>
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
          <td >1</td>
          <td >@ Air Pressure 1</td>
          <td >0.05 ~ 0.25 MPa</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par001" name="par001" onchange="changeRange('par001',0.05,0.25)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td >2</td>
          <td >@ Air Pressure 2</td>
          <td >0.30 ~ 0.50 MPa</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par002" name="par002" onchange="changeRange('par002',0.30,0.50)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td >3</td>
          <td >@ Sub Mount (SM) Collet Vacum Pressure</td>
          <td >-80 kPa atau kurang</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par003',-99999999,-80)"  id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td >4</td>
          <td >@ Middle Collet Vacum Pressure</td>
          <td >-80 kPa atau kurang</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par004',-99999999,-80)"  id="par004" name="par004" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td >5</td>
          <td >@ Die Bonding stage Vacum Pressure</td>
          <td >-80 kPa atau kurang</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par005',-99999999,-80)"  id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>

        <tr>
          <td >6</td>
          <td >@ LD collet Load</td>
          <td >0.05 ~ 0.15 N</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par006',0.05,0.15)"  id="par006" name="par006" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td >7</td>
          <td >@ SM collet Load</td>
          <td >0.60 ~ 0.80 N</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par007',0.60,0.80)"  id="par007" name="par007" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>

        <tr>
          <td >8</td>
          <td >@ LD Needle Push Up Level</td>
          <td >0.20 ~ 0.60 mm</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par008',0.20,0.60)"  id="par008" name="par008" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
        </tr>

        <tr>
          <td >9</td>
          <td >@ SM Needle Push Up Level</td>
          <td >0.20 ~ 0.60 mm</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par009',0.20,0.60)"  id="par009" name="par009" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
        </tr>

        <tr>
          <td >10</td>
          <td >* Pengecekan posisi Die Bonding</td>
          <td >Cek posisi die bonding pada tampilan monitor</td>
          <td>
            <select class="form-select" id="par010" name="par010">
                <?php if(isset($alldata)){
                    if($alldata[0]["par010"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par010"]=="V"){
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
          <td >* Bersihkan Collet, Middle collet dan D/B stage</td>
          <td >Bersihkan menggunakan cotton bud kering</td>
          <td>
            <select class="form-select" id="par011" name="par011">
                <?php if(isset($alldata)){
                    if($alldata[0]["par011"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par011"]=="V"){
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
          <td >12</td>
          <td >* Arah lonizer Blower</td>
          <td >Arahkan lonizer ke chip sheet dan check apakah lonizer bekerja normal</td>
          <td>
            <select class="form-select" id="par012" name="par012">
                <?php if(isset($alldata)){
                    if($alldata[0]["par012"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par012"]=="V"){
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
          <td >13</td>
          <td >* Cek kondisi collet guide</td>
          <td >Pindahkan collet guide dari posisi atas ke bawah dan cek apakah collet guide goyang atau tidak</td>
          <td>
            <select class="form-select" id="par013" name="par013">
                <?php if(isset($alldata)){
                    if($alldata[0]["par013"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par013"]=="V"){
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
          <td >14</td>
          <td >@ Idle temperature heater</td>
          <td >230 ~ 270 °C</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par014',230,270)"  id="par014" name="par014" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">15</td>
          <td rowspan="2">@ Setting temperature heater</td>
          <td >Step 1 : 240 ~ 280°C</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par015',240,280)"  id="par015" name="par015" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
          </td>
        </tr>

        <tr>
          <td>Step 2 : 360 ~ 400°C</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par016',360,480)"  id="par016" name="par016" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">16</td>
          <td rowspan="2">@ Rise Time heater</td>
          <td>Step 1 : 0.5 s (UP)</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par017',0,10)"  id="par017" name="par017" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
          </td>
        </tr>

        <tr>
          <td>Step 2 : 0.5 s (UP)</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par018',0,10)"  id="par018" name="par018" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">17</td>
          <td rowspan="2">@ Keep Time heater</td>
          <td >Step 1 : 1.0 s (HT)</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par019',1,10)" id="par019" name="par019" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Step 2 : 1.5 s (HT)</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par020',1.5,10)" id="par020" name="par020" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
          </td>
        </tr>

        <tr>
          <td >18</td>
          <td >@ Solid Point Heater</td>
          <td >290 ~ 310°C</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par021',290,310)"  id="par021" name="par021" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
          </td>
        </tr>

        <tr>
          <td >19</td>
          <td >@ Rise Point Heater</td>
          <td >Sama dengan Setting Temperature Step 1</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par022',240,280)" id="par022" name="par022" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
          </td>
        </tr>

        <tr>
          <td >20</td>
          <td >@ Profile Detect</td>
          <td > 2.5 s</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par023',2.5,10)" id="par023" name="par023" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="7">21</td>
          <td rowspan="1">@ Parameter setting value : </td>
          <td rowspan="2">0 ~ 500</td>
          <td rowspan="2">
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par024',0,500)"  id="par024" name="par024" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="1">a. No.42 Lower position time of collet BST part</td>
        </tr>

        <tr>
          <td >b. No.216 Auto start frequency of LD collet BST slow</td>
          <td > 600</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par025',600,700)" id="par025" name="par025" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
          </td>
        </tr>

        <tr>
          <td >c. No.217 Maximum frequency of LD collet BST slow</td>
          <td > 600</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par026',600,700)" id="par026" name="par026" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
          </td>
        </tr>

        <tr>
          <td >d. No.287 Waiting time of BST collet descent</td>
          <td >0</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par027',0,10)" id="par027" name="par027" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td >e. No.292 Waiting time of take out on take out PP BST</td>
          <td >0 ~ 500</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par028',0,500)" id="par028" name="par028" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
          </td>
        </tr>

        <tr>
          <td >f. No.293 On timing of heating</td>
          <td >0</td>
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par029',0,10)" id="par029" name="par029" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par029'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="3">22</td>
          <td rowspan="3">Pengecekan N2</td>
          <td > @ Nilai aliran N2 : 4 - 6 l/min
          <td >
            <input class="form-control" type="number" step="0.00000001" onchange="changeRange('par030',4,6)" id="par030" name="par030" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par030'];} ?>>
          </td>
        </tr>

        <tr>
          <td >* Posisi N2</td>
          <td>
            <select class="form-select" id="par031" name="par031">
                <?php if(isset($alldata)){
                    if($alldata[0]["par031"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par031"]=="V"){
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
          <td >* Hembusan N2</td>
          <td>
            <select class="form-select" id="par032" name="par032">
                <?php if(isset($alldata)){
                    if($alldata[0]["par032"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par032"]=="V"){
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
          <td >23</td>
          <td >* Pembersihan mesin dan lingkungan sekitarnya</td>
          <td >Bersihkan dari debu dan kotoran</td>
          <td>
            <select class="form-select" id="par033" name="par033">
                <?php if(isset($alldata)){
                    if($alldata[0]["par033"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par033"]=="V"){
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
          <td colspan="3"># Note</td>
          <td >
            <input class="form-control" type="text" id="par034" name="par034" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par034'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
    <div class="note">
        <h3>Keterangan :</h3>
        <p>
            @ : Isi kolom tsb dengan nilai (value) di mesin.
        </p>
        <p>
            * : Beri tanda (V) jika kondisi OK/Good dan beri tanda (X) jika hasil pemeriksaan NG.
        </p>
        <p>
            # : Isi bagian note (catatan) apabila melakukan penggantian part, melakukan adjusment, atau terjadi kondisi yang tidak sesuai dengan standart.
        </p>
    </div>
</div>