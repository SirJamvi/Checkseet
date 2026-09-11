<div class="table-responsive" id="sl38-s-m">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("MARKING MACHINE START UP\n Daitoh Machine Single Laser 3.8")?></th>
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
          <td colspan="2">Checking of air pressure for air cylinder work <br> Memeriksa tekanan air pressure untuk air cylinder</td>
          <td >0.49 ± 0.1 Mpa</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par001" name="par001" onchange="changeRange('par001',0.39,0.59)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td >2</td>
          <td colspan="2">Checking of air pressure for vacuum pressure gauge <br> Memeriksa tekanan air pressure untuk vacuum pressure</td>
          <td >0.49 ± 0.1 Mpa</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par002" name="par002" onchange="changeRange('par002',0.39,0.59)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td >3</td>
          <td colspan="2">Confirm laser mark parameters <br> Konfirmasi parameter marking laser</td>
          <td >Pastikan sesuai dengan yang ada di list parameter dan cek kode markingnya</td>
          <td >
            <input class="form-control" type="text" id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="4" >Note</td>
          <td >
            <input class="form-control" type="text" id="par004" name="par004" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>