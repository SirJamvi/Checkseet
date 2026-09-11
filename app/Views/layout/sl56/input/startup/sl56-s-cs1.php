<div class="table-responsive" id="slcs1">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("CAP SEAL MACHINE START UP")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col" >Start Up Check Item</th>
            <th scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td>1</td>
          <td >Checking of air source pressure (Memeriksa tekanan air pressure)</td>
          <td >0.49 ± 0.10 Mpa</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par001',0.39,0.59)" id="par001" name="par001" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">2</td>
          <td rowspan="2">Checking of electrode use time (Memeriksa pemakaian electrode)</td>
          <td >Upper electrode (max 24000)</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par002',0,24000)" id="par002" name="par002" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Middle electrode (max 2000)</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par003',0,2000)" id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td >3</td>
          <td >Value of setting welding power suply (Nilai setting welding power suply)</td>
          <td >510 ± 50 KVA</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par004',460,560)" id="par004" name="par004" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">4</td>
          <td rowspan="2">Value of welding checker (Nilai welding checker)</td>
          <td > lp : 5.0 ~ 7.5 KA</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par005',5,7.5)" id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Tp : 3.00 ~ 5.00 ms</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par006',3,5)" id="par006" name="par006" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td >5</td>
          <td >Value of pressure cap seal (Nilai pressure checker)</td>
          <td >70 ± 10 kg</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par005',60,70)" id="par007" name="par007" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>

        <tr>
          <td >6</td>
          <td >Cleaning of machine (Membersihkan mesin)</td>
          <td >Bersihkan mesin dari stem atau cap yang terjatuh dan bersihkan dari debu/kotoran</td>
          <td >
            <input class="form-control" type="text" id="par008" name="par008" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="3">Note</td>
          <td >
            <input class="form-control" type="text" id="par009" name="par009" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>