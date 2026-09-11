<div class="table-responsive" id="slbi4">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("SET RESET BURN IN MACHINE START UP RED GHZ002A4(GH0632BA2GL)")?></th>
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
          <td rowspan="2">Air Pressure <br> Checking the air pressure <br> (Periksa tekanan udara)</td>
          <td >Set </td>
          <td rowspan="2">0.40 ± 0.05 Mpa <br> (0.35 ~ 0.45 Mpa)</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par001',0.35,0.45)" id="par001" name="par001" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Reset </td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par002',0.35,0.45)" id="par002" name="par002" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td >2</td>
          <td >Vacuum pressure for pick up <br> Check vacuum pressure for pick up <br> (Periksa tekanan vacuum untuk pick up)</td>
          <td >Set - Reset</td>
          <td >Less than -80 kPa</td>
          <td >
            <input class="form-control" type="text" id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">3</td>
          <td rowspan="2">Check sensor for safety <br> Check the operation of sensor of safety <br> (Periksa pengoperasian sensor untuk keamanan)</td>
          <td >Set </td>
          <td rowspan="2">OK Condition : ✔</td>
          <td >
            <input class="form-control" type="text" id="par004" name="par004" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Reset </td>
          <td >
            <input class="form-control" type="text" id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">4</td>
          <td rowspan="2">Check Visual Inspection <br> Check 5 pcs for Cap/Stem damage <br> (Cek 5 pcs untuk Cap/Stem damage)</td>
          <td >Set </td>
          <td rowspan="2">Tidak ada Cap/Stem damage/scratch isi dengan "✔"</td>
          <td >
            <input class="form-control" type="text" id="par006" name="par006" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Reset </td>
          <td >
            <input class="form-control" type="text" id="par007" name="par007" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">5</td>
          <td rowspan="2">Cleaning Machine <br> Check machine in loader unloader area <br> (Bersihkan mesin di area laoder unloader)</td>
          <td >Set </td>
          <td rowspan="2">Tidak ada foreign material, dirt, dust. isi dengan "✔"</td>
          <td >
            <input class="form-control" type="text" id="par008" name="par008" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Reset </td>
          <td >
            <input class="form-control" type="text" id="par009" name="par009" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
        </tr>


        <tr>
          <td colspan="4">Note</td>
          <td >
            <input class="form-control" type="text" id="par010" name="par010" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          </td>
        </tr>

    </tbody>   
    </table>
</div>