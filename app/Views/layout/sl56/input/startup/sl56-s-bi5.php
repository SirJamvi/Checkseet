<div class="table-responsive" id="sl56-s-bi5">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("BURN IN START UP\n Daitoh Machine (Single Laser 5.6 RED GHZ002A4 (GH0632BA2GL))")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th colspan="2" scope="col" >Start Up Check Item</th>
            <th colspan="2" scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td rowspan="3">1</td>
            <td rowspan="3" colspan="2"><br> See on indicator machine display <br> Memeriksa temperatur chamber Burn In <br> lihat pada indikator display mesin</td>
            <td rowspan="3">Temperature <br> setting</td>
            <td >Setting (write value) </td>
            <td >
                <input class="form-control" type="text" id="par001" name="par001" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
            </td>
        </tr>

        <tr>
            <td >Actual (write value) </td>
            <td >
                <input class="form-control" type="text" id="par002" name="par002" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
            </td>
        </tr>

        <tr>
            <td >(± 0.5°C from setting) <br> (Judge ok or not)</td>
            <td >
                <input class="form-control" type="text" id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
            </td>
        </tr>

        <tr>
            <td rowspan="2">2</td>
            <td rowspan="2">Checking Cooling Gas Pressure</td>
            <td >High Pressure Side</td>
            <td colspan="2">1.0 ~ 2.2 Mpa</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" id="par004" name="par004" onchange="changeRange('par006',1.0,2.2)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
            </td>
        </tr>

        <tr>
            <td >Low Pressure Side</td>
            <td colspan="2">0.35 ~ 0.50 Mpa</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" id="par005" name="par005" onchange="changeRange('par007',0.35,0.50)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
            </td>
        </tr>

        <tr>
          <td rowspan="2">3</td>
          <td rowspan="2">Cleaning Machine <br> Clean machine in loader-unloader area <br> (Bersihkan mesin di area loader-unloader)</td>
          <td >Set</td>
          <td rowspan="2" colspan="2">Tidak ada foreign material, dirt, dust. <br> isi dengan "✔"</td>
          <td >
            <input class="form-control" type="text" id="par006" name="par006" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Reset</td>
          <td >
            <input class="form-control" type="text" id="par007" name="par007" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="5">Note</td>
          <td >
            <input class="form-control" type="text" id="par008" name="par008" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>