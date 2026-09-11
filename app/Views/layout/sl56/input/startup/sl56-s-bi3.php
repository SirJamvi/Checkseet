<div class="table-responsive" id="slbi3">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("SET RESET BURN IN MACHINE START UP (Normal Model)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th colspan="2"scope="col" >Start Up Check Item</th>
            <th scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td rowspan="2">1</td>
          <td rowspan="2"><b>Air Pressure</b> <br> Checking the air pressure <br> (Periksa tekanan udara)</td>
          <td >Set Machine</td>
          <td rowspan="2">0.40 ± 0.05 Mpa <br> (0.35 ~ 0.45 Mpa)</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par001',0.35,0.45)" id="par001" name="par001" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Reset Machine</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par002',0.35,0.45)" id="par002" name="par002" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">2</td>
          <td rowspan="2"><b>Vacuum pressure for pick up</b> <br> Check vacuum pressure for pick up <br> (Periksa tekanan vacuum untuk pick up)</td>
          <td >Set Machine</td>
          <td rowspan="2">-80 kPa</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par003',-9999999999999,-80)" id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Reset Machine</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par004',-9999999999999,-80)" id="par004" name="par004" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">3</td>
          <td rowspan="2"><b>Check sensor for safety </b><br> Check the operation of sensor of safety <br> (Periksa pengoperasian sensor untuk keamanan)</td>
          <td >Set Machine</td>
          <td rowspan="2">Sensor berfungsi dengan baik isi "OK"</td>
          <td >
            <input class="form-control" type="text" id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Reset Machine</td>
          <td >
            <input class="form-control" type="text" id="par006" name="par006" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="4"><b>Note</b></td>
          <td >
            <input class="form-control" type="text" id="par007" name="par007" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>

    </tbody>   
    </table>
</div>