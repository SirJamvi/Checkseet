<div class="table-responsive" id="slwb2">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("WIRE BONDING START UP (Kaijo Machine)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col" >Start Up Check Item</th>
            <th colspan="3" scope="col" >Standard</th>
            <th colspan="6" scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td>1</td>
          <td >Cleaning of the wire course <br> (Membersihkan rute gold wire)</td>
          <td colspan="3">Lap dan bersihkan wire guide dan ring guide dengan bemcot</td>
          <td colspan="6">
            <input class="form-control" type="text" id="par001" name="par001" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td>2</td>
          <td>@ Confirm the value of the vacuum pressure gauge <br> (Confirm nilai vacuum pressure)</td>
          <td colspan="3">-40kPa or less</td>
          <td colspan="6">
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par002',-999999,-40)" id="par002" name="par002" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td>3</td>
          <td >@ Confirm the value of the air pressure gauge <br> (Confirm nilai air pressure)</td>
          <td colspan="3">0.29 ~ 0.59 Mpa</td>
          <td colspan="6">
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par003',0.29,0.59)" id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td>4</td>
          <td >@ Confirm of air tension <br> (Confirm nilai air tension)</td>
          <td colspan="3">3.0 ± 0.5 l/min</td>
          <td colspan="6">
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par004',2.5,3.5)" id="par004" name="par004" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td>5</td>
          <td >@ Confirm of wireFeed <br> (Confirm nilai wire feed)</td>
          <td colspan="3">20.0 ± 0.5 l/min</td>
          <td colspan="6">
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par005',19.5,20.5)" id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>

        <tr>
          <td>6</td>
          <td >@ Capilary usage count <br> (pemakaian capilary)</td>
          <td colspan="3">100.000 wire <br> = 200.000 point</td>
          <td colspan="6">
            <input class="form-control" type="text" id="par006" name="par006" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td>7</td>
          <td >@ Confirm of heater temperature <br> (Confirm nilai heater temperature)</td>
          <td colspan="3">200 ~ 220 °C</td>
          <td colspan="6">
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par007',200,220)" id="par007" name="par007" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="5">8</td>
          <td rowspan="5">@ Checking of bonding parameter (Memeriksa parameter bonding)</td>
          <td rowspan="2">LD</td>
          <td rowspan="2">MS</td>
          <td rowspan="2">PD</td>
          <td colspan="2" >LD</td>
          <td colspan="2" >MS</td>
          <td colspan="2" >PD</td>
        </tr>

        <tr>
          <td>1 st</td>
          <td>2 nd</td>
          <td>1 st</td>
          <td>2 nd</td>
          <td>1 st</td>
          <td>2 nd</td>
        </tr>

        <tr>
          <td colspan="3">POWER</td>
          <td>
            <input class="form-control" type="text" id="par008" name="par008" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par009" name="par009" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par010" name="par010" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par018" name="par018" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par019" name="par019" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par020" name="par020" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="3">TIME</td>
          <td>
            <input class="form-control" type="text" id="par011" name="par011" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par012" name="par012" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par013" name="par013" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par021" name="par021" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par022" name="par022" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par023" name="par023" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="3">PRESS</td>
          <td>
            <input class="form-control" type="text" id="par014" name="par014" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par015" name="par015" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par016" name="par016" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par024" name="par024" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par025" name="par025" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
          </td>
          <td>
            <input class="form-control" type="text" id="par026" name="par026" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="5">Note</td>
          <td colspan="6">
            <input class="form-control" type="text" id="par017" name="par017" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>