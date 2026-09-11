<div class="table-responsive" id="slcs2">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("CAP SEAL START UP (DAITOH MACHINE)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col" >Start Up Check Item</th>
            <th colspan="2" scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up Check</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td rowspan="2">1</td>
          <td rowspan="2">Checking of air pressure <br> (Memeriksa tekanan air pressure)</td>
          <td >Air Pressure (root)</td>
          <td >0.49 ± 0.05 Mpa</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par001',0.45,0.54)" id="par001" name="par001" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Super dry air</td>
          <td >0.20 ± 0.05 Mpa</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par002',0.15,0.25)" id="par002" name="par002" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="3">2</td>
          <td rowspan="3">Checking of seal condition <br> (Konfirmasi kondisi seal)</td>
          <td >Pressure</td>
          <td >750 ~ 850 N</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par003',750,850)" id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Current</td>
          <td >5.5 ~ 6.5 kA</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par004',5.5,6.5)" id="par004" name="par004" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Welding time</td>
          <td >4.5 ms</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par005',4,5)" id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>

        <tr>
          <td >3</td>
          <td >Confirm dew point condition <br> (Konfirmasi kondisi dew point)</td>
          <td colspan="2">Kurang dari -36 °C</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par006',-99999999,-36)" id="par006" name="par006" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">4</td>
          <td rowspan="2">Checking of electrode use time <br> (Memeriksa pemakaian electrode)</td>
          <td >Upper electrode</td>
          <td >Max 10000</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par007',0,10000)" id="par007" name="par007" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Middle electrode</td>
          <td >Max 20000</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par008',0,20000)" id="par008" name="par008" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="3">5</td>
          <td rowspan="3">Confirm of baking condition <br> (for Stem & Cap) <br> Konfirmasi kondisi baking <br> (Untuk Stem & Cap)</td>
          <td rowspan="2">Temperature</td>
          <td >290 °C</td> 
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par009',280,300)" id="par009" name="par009" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
        </tr>

        <tr>
          <td >190 °C (Untuk GH0637AA2G)</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par009',180,200)" id="par010" name="par010" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Time</td>
          <td >1 ~ 3 hours</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par011',1,3)" id="par011" name="par011" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">6</td>
          <td rowspan="2">Peel off & Off Center Confirm of baking condition <br> Peel off & Off Center konfirmasi kondisi baking</td>
          <td colspan="2">* Off Center 2 pcs/head <br> r ≤ 50 μm</td>
          <td >
            <input class="form-control" type="text" id="par012" name="par012" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="2">* Peel Off <br> Mengacu pada peel test criteria</td>
          <td >
            <input class="form-control" type="text" id="par013" name="par013" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="4">Note</td>
          <td>
            <input class="form-control" type="text" id="par014" name="par014" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>