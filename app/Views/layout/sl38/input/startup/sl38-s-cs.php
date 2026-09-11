<div class="table-responsive" id="sl38-s-cs">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("CAP SEAL MACHINE START UP\n Daitoh Machine")?></th>
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
          <td colspan="2">Checking of air pressure <br> Memeriksa tekanan air pressure</td>
          <td >0.49 ± 0.05 Mpa</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par001" name="par001" onchange="changeRange('par001',0.44,0.54)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="3">2</td>
          <td rowspan="3">Checking Seal Condition <br> Memeriksa seal condition</td>
          <td >Pressure</td>
          <td >500 ± 50 N</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par002" name="par002" onchange="changeRange('par002',450,550)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Current</td>
          <td >4 ± 0.5 kA</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par003" name="par003" onchange="changeRange('par003',3.5,4.5)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Welding Time</td>
          <td >4.5 ms</td>
          <td >
            <input class="form-control" type="text" id="par004" name="par004" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">3</td>
          <td rowspan="2">Checking of electrode use time</td>
          <td >Upper (2 unit)</td>
          <td >max 10000/ unit</td>
          <td >
            <input class="form-control" type="text" id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Middle (4 unit)</td>
          <td >max 20000/ unit</td>
          <td >
            <input class="form-control" type="text" id="par006" name="par006" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">4</td>
          <td rowspan="2">Checking Baking Condition for Stem & Cap <br> Memeriksa kondisi baking untuk stem & cap</td>
          <td >Temperature</td>
          <td >290 °C</td>
          <td >
            <input class="form-control" type="text" id="par007" name="par007" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Keep Time</td>
          <td >1 ~ 3 hours</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par008" name="par008" onchange="changeRange('par008',1,3)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
        </tr>

        
        <tr>
          <td rowspan="3">5</td>
          <td rowspan="3">Checking Dew Point <br> Memeriksa Dew Point</td>
          <td >Main (Seal Part)</td>
          <td >Kurang dari -36 °C</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par009" name="par009" onchange="changeRange('par009',-99999999,-36)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
        </tr>

        <tr>
          <td >L side (Baking Part)</td>
          <td >Kurang dari -36 °C</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par010" name="par010" onchange="changeRange('par010',-99999999,-36)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          </td>
        </tr>

        <tr>
          <td >R side (Baking Part)</td>
          <td >Kurang dari -36 °C</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par011" name="par011" onchange="changeRange('par011',-99999999,-36)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
          </td>
        </tr>

        <tr>
          <td >6</td>
          <td colspan="2">Cleaning of machine <br> Memeriksa mesin</td>
          <td >Bersihkan mesin dari stem atau cap yang terjatuh dan bersihkan dari debu/kotoran</td>
          <td >
            <input class="form-control" type="text" id="par012" name="par012" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="4" >Note</td>
          <td >
            <input class="form-control" type="text" id="par013" name="par013" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>