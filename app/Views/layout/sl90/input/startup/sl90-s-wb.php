<div class="table-responsive" id="sl90-s-wb">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("WIRE BOND MACHINE (Kaijo Machine FB-910 LDW)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col">Start up Check Item</th>
            <th colspan="2" scope="col" >Standard</th>
            <th colspan="2"scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td >1</td>
          <td >*Cleaning of the wire course <br> (Membersihkan rute gold wire)</td>
          <td colspan="2">Lap dan bersihkan wire guide dan ring guide dengan bemcot beralkohol</td>
          <td colspan="2">
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
          <td >2</td>
          <td >@ Confirm the value of the vacuum pressure gauge <br> (Confirm nilai vacuum pressure)</td>
          <td colspan="2">-40 kPa or less</td>
          <td colspan="2">
            <input class="form-control" type="number" step=0.0001 id="par002" name="par002" onchange="changeRange('par002',-9999999,-40)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td >3</td>
          <td >@ Confirm the value of the air pressure gauge <br> (Confirm nilai air pressure)</td>
          <td colspan="2">0.29 ~ 0.59 Mpa</td>
          <td colspan="2">
            <input class="form-control" type="number" step=0.0001 id="par003" name="par003" onchange="changeRange('par003',0.29,0.59)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td >4</td>
          <td >@ Confirm of air tension <br> (Confirm nilai air tension)</td>
          <td colspan="2">3.0 ± 0.5 l/min</td>
          <td colspan="2">
            <input class="form-control" type="number" step=0.0001  id="par004" name="par004" onchange="changeRange('par004',2.5,3.5)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td >5</td>
          <td >@ Confirm of wireFeed</td>
          <td colspan="2">20.0 ± 0.5 l/min</td>
          <td colspan="2">
            <input class="form-control" type="number" step=0.0001  id="par005" name="par005" onchange="changeRange('par005',19.5,20.5)"placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td >6</td>
          <td >@ Capilary usage count <br> (pemakaian capilary)</td>
          <td colspan="2">100.000 wire or less <br> = 200.000 point or less</td>
          <td colspan="2">
            <input class="form-control" type="number" step=0.0001  id="par006" name="par006" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td >7</td>
          <td >@ Confirm of heater temperature <br> (Confirm nilai heater temperature)</td>
          <td colspan="2">200 ~ 220 °C</td>
          <td colspan="2">
            <input class="form-control" type="number" step=0.0001  id="par007" name="par007" onchange="changeRange('par007',200,220)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td rowspan="4">8 </td>
          <td rowspan="4">@ Checking of bonding parameter <br> (Memeriksa parameter bonding)</td>
          <td >LD</td>
          <td >SM</td>
          <td >LD</td>
          <td >SM</td>
        </tr>

        <tr>
          <td colspan="2">POWER</td>
          <td >
            <input class="form-control" type="number" step=0.0001 id="par008" name="par008" onchange="changeRange2('par008',40,50,85,95)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step=0.0001 id="par009" name="par009" onchange="changeRange2('par009',40,50,85,95)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="2">TIME</td>
          <td >
            <input class="form-control" type="number" step=0.0001 id="par010" name="par010" onchange="changeRange2('par010',15,25,20,30)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step=0.0001 id="par011" name="par011" onchange="changeRange2('par011',15,25,20,30)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td colspan="2">PRESS</td>
          <td >
            <input class="form-control" type="number" step=0.0001 id="par012" name="par012" onchange="changeRange2('par012',35,45,115,125)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step=0.0001 id="par013" name="par013" onchange="changeRange2('par013',35,45,115,125)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td colspan="4">Note</td>
          <td colspan="2">
            <input class="form-control" type="text"  id="par014" name="par014" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
          </td>
        </tr>
      </tbody>
    </table>
</div>