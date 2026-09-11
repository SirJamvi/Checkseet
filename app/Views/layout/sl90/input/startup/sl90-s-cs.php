<div class="table-responsive" id="sl90-s-cs">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("CAP SEAL MACHINE START UP (Daitoh Machine)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col" >Start Up Check Item</th>
            <th scope="col" colspan="2">Standard</th>
            <th scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td rowspan="2">1</td>
            <td rowspan="2">@ Checking of air pressure <br> Memeriksa tekanan air pressure</td>
            <td >Air Pressure (root)</td>
            <td >0.49 ± 0.05 Mpa</td>
            <td >
                <input class="form-control" type="number" step=0.001 id="par001" name="par001" onchange="changeRange('par001',0.44,0.54)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
            </td>
        </tr>

        <tr>
            <td >Super dry air</td>
            <td >0.20 ± 0.05 Mpa</td>
            <td >
                <input class="form-control" type="number" step=0.001 id="par002" name="par002" onchange="changeRange('par002',0.15,0.25)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
            </td>
        </tr>

        <tr>
            <td rowspan="3">2</td>
            <td rowspan="3">@ Confirm of seal condition <br> Konfirmasi kondisi seal</td>
            <td >Pressure</td>
            <td >1100 ~ 1300 N</td>
            <td >
                <input class="form-control" type="number" step=0.001 id="par003" name="par003" onchange="changeRange('par003',1100,1300)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
            </td>
        </tr>

        <tr>
            <td >Current</td>
            <td >8.9 ~ 9.9 kA</td>
            <td >
                <input class="form-control" type="number" step=0.001 id="par004" name="par004" onchange="changeRange('par004',8.9,9.9)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
            </td>
        </tr>

        <tr>
            <td >Welding time</td>
            <td >9.4 ms</td>
            <td >
                <input class="form-control" type="text" id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
            </td>
        </tr>

        <tr>
            <td >3</td>
            <td >@ Confirm dew point condition <br> Konfirmasi kondisi dew point</td>
            <td colspan="2">Kurang dari -36°C</td>
            <td >
                <input class="form-control" type="number" step=0.0001 id="par006" name="par006" onchange="changeRange('par006',-9999999,-36)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
            </td>
        </tr>
        
        <tr>
            <td rowspan="2">4</td>
            <td rowspan="2">@ Checking of electrode use time <br> Memeriksa pemakaian electrode</td>
            <td >Upper electrode</td>
            <td >Max 10000</td>
            <td >
                <input class="form-control" type="number" step=0.0001 id="par007" name="par007" onchange="changeRange('par007',-9999999,10000)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
            </td>
        </tr>

        <tr>
            <td >Middle electrode</td>
            <td >Max 20000</td>
            <td >
                <input class="form-control" type="number" step=0.0001 id="par008" name="par008" onchange="changeRange('par008',-9999999,20000)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
            </td>
        </tr>

        <tr>
            <td rowspan="2">5</td>
            <td rowspan="2">@ Confirm of baking condition (for Stem & Cap) <br> Konfirmasi kondisi baking (Untuk Stem & Cap)</td>
            <td >Temperature</td>
            <td >190°C</td>
            <td >
                <input class="form-control" type="text" id="par009" name="par009" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
            </td>
        </tr>

        <tr>
            <td >Time</td>
            <td >1 ~ 3 hours</td>
            <td >
                <input class="form-control" type="number" step=0.001 id="par010" name="par010" onchange="changeRange('par010',1,3)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
            </td>
        </tr>

        <tr>
            <td >6</td>
            <td >* Cleaning of machine <br> Membersihkan mesin</td>
            <td colspan="2">Bersihkan mesin dari stem atau cap yang terjatuh dan bersihkan dari debu/kotoran</td>
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
          <td colspan="4">Note</td>
          <td >
            <input class="form-control" type="text" id="par012" name="par012" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>