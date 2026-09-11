<div class="table-responsive" id="slbi2">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("BURN IN START UP (DAITOH MACHINE)")?></th>
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
          <td>1</td>
          <td colspan="2">#Checking Safety-Device (Memeriksa perangkat keamanan)</td>
          <td >#Untuk SLB3 <br> Aging 3pcs dengan ACC, buka pintu dengan sengaja dan pastikan power suply berhenti</td>
          <td >
            <input class="form-control" type="text" id="par001" name="par001" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td>2</td>
          <td colspan="2">Checking Temperature of Burn In Chamber (Memeriksa temperatur chamber burn in)</td>
          <td >Temperature setting ± 0.5 ℃</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" id="par002" name="par002" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">3</td>
          <td rowspan="2">Checking Cooling Gas Pressure (Memeriksa tekanan cooling gas)</td>
          <td >High Pressure Side</td>
          <td >1.0 ~ 2.2 Mpa</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par003',1,2.2)" id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Low Pressure Side</td>
          <td >0.3 ~ 0.50 Mpa</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par004',0.3,0.5)" id="par004" name="par004" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="4" rowspan="2">Note</td>
          <td rowspan="2">
            <input class="form-control" type="text" id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>