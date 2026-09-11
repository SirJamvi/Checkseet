<div class="table-responsive" id="fl18-s-wb4">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("WIRE BOND MACHINE")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col">Start up Check Item</th>
            <th colspan="3" scope="col" >Standard</th>
            <th colspan="3"scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td >1</td>
          <td >* Checking of gold wire route <br> (Pemeriksaan rute gold wire)</td>
          <td colspan="3">Lap dan bersihkan wire guide dan ring guide dengan bemcoat beralkohol</td>
          <td colspan="3">
            <input class="form-control" type="text"  id="par001" name="par001" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td >2</td>
          <td >@ Checking of Air Pressure <br> (Memeriksa nilai air)</td>
          <td colspan="3">0.35 ~ 0.55 Mpa</td>
          <td colspan="3">
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par002',0.35,0.55)" placeholder="" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td >3</td>
          <td >* Cleaning of Machine <br> (Membersihkan Mesin)</td>
          <td colspan="3">Bersihkan mesin dari debu dan device yang jatuh</td>
          <td colspan="3">
            <input class="form-control" type="text" step="0.000000001" placeholder="" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td ></td>
          <td ></td>
          <td colspan="3"></td>
          <td>A</td>
          <td>B</td>
          <td>C</td>
        </tr>

        <tr>
          <td >4</td>
          <td >@ Capilary usage count <br> Pemakaian capilary</td>
          <td colspan="3">600.000 wires</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" placeholder="" id="par004a" name="par004a">
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" placeholder="" id="par004b" name="par004b">
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" placeholder="" id="par004c" name="par004c">
          </td>
        </tr>

        <tr>
          <td rowspan="12">5</td>
          <td rowspan="12">@ Checking of bonding parameter <br> (Memeriksa parameter bonding)</td>
          <td rowspan="6">LD</td>
          <td rowspan="2">Us-Pwr</td>
          <td >Pad : 30 ~ 70</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par005a',30,70)" placeholder="" id="par005a" name="par005a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par005b',30,70)" placeholder="" id="par005b" name="par005b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par005'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par005c',30,70)" placeholder="" id="par005c" name="par005c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par005'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Lead : 40 ~ 80</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par006a',40,80)" placeholder="" id="par006a" name="par006a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par006b',40,80)" placeholder="" id="par006b" name="par006b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par006'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par006c',40,80)" placeholder="" id="par006c" name="par006c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">Time</td>
          <td >Pad : 10 ~ 30</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par007a',10,30)" placeholder="" id="par007a" name="par007a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par007b',10,30)" placeholder="" id="par007b" name="par007b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par007'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par007c',10,30)" placeholder="" id="par007c" name="par007c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par007'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Lead : 10 ~ 30</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par008a',10,30)" placeholder="" id="par008a" name="par008a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par008b',10,30)" placeholder="" id="par008b" name="par008b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par008'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par008c',10,30)" placeholder="" id="par008c" name="par008c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par008'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">Force</td>
          <td >Pad : 40 ~ 60</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par009a',40,60)" placeholder="" id="par009a" name="par009a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par009b',40,60)" placeholder="" id="par009b" name="par009b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par009'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par009c',40,60)" placeholder="" id="par009c" name="par009c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par009'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Lead : 60 ~ 80</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par010a',60,80)" placeholder="" id="par010a" name="par010a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par010b',60,80)" placeholder="" id="par010b" name="par010b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par010'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par010c',60,80)" placeholder="" id="par010c" name="par010c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par010'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="6">Sic Mount</td>
          <td rowspan="2">Us-Pwr</td>
          <td >Pad : 30 ~ 70</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par011a',30,70)" placeholder="" id="par011a" name="par011a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par011b',30,70)" placeholder="" id="par011b" name="par011b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par011'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par011c',30,70)" placeholder="" id="par011c" name="par011c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par011'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Lead : 40 ~ 80</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par012a',40,80)" placeholder="" id="par012a" name="par012a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par012b',40,80)" placeholder="" id="par012b" name="par012b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par012'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par012c',40,80)" placeholder="" id="par012c" name="par012c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par012'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">Time</td>
          <td >Pad : 10 ~ 30</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par013a',10,30)" placeholder="" id="par013a" name="par013a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par013b',10,30)" placeholder="" id="par013b" name="par013b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par013'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par013c',10,30)" placeholder="" id="par013c" name="par013c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par013'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Lead : 10 ~ 30</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par014a',10,30)" placeholder="" id="par014a" name="par014a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par014b',10,30)" placeholder="" id="par014b" name="par014b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par014'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par014c',10,30)" placeholder="" id="par014c" name="par014c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par014'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">Force</td>
          <td >Pad : 40 ~ 60</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par015a',40,60)" placeholder="" id="par015a" name="par015a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par015b',40,60)" placeholder="" id="par015b" name="par015b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par015'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par015c',40,60)" placeholder="" id="par015c" name="par015c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par015'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Lead : 60 ~ 80</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par016a',60,80)" placeholder="" id="par016a" name="par016a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par016b',60,80)" placeholder="" id="par016b" name="par016b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par016'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par016c',60,80)" placeholder="" id="par016c" name="par016c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par016'];} ?>>
          </td>
        </tr>

        <tr>
          <td >6</td>
          <td >@ Checking of Temperature (PV) </td>
          <td colspan="3">Temperature PV <br>: 175 ~ 185 °C </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par017a',175,185)" placeholder="" id="par017a" name="par017a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par017b',175,185)" placeholder="" id="par017b" name="par017b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par017'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par017c',175,185)" placeholder="" id="par017c" name="par017c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par017'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td >7</td>
          <td ># Pemeriksaan grounding (Baut pengunci di conductive mat, banana plug, koneksi kabel grounding)</td>
          <td colspan="3">Terpasang bagus /tidak longgar, lepas, putus.</td>
          <td colspan="3">
            <select class="form-select" id="par018" name="par018">
                <?php if(isset($alldata)){
                    if($alldata[0]["par018"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par018"]=="V"){
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
          <td colspan="5">Note</td>
          <td colspan="3">
            <input class="form-control" type="text" placeholder="" id="par019" name="par019" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="note">
    <h3>Note :</h3>
    <p>
        # : Beri tanda (V) jika kondisi OK/Good dan beri tanda (X) jika hasil pemeriksaan NG
    </p>
</div>