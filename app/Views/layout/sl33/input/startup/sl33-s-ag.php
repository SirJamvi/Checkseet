<div class="table-responsive" id="sl33-s-ag">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("AG PASTE HARDENING OVEN START UP")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col">Start up Check Item</th>
            <th scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td >1</td>
          <td >@ Temperature Setting Oven</td>
          <td >150 ~ 160 °C</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" placeholder="" onchange="changeRange('par001',150,160)"  id="par001" name="par001" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">2</td>
          <td >@ Setting open-close damper</td>
          <td >25% ~ 35%</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" placeholder="" onchange="changeRange('par002',25,35)" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td >@ Hardening time of silver paste</td>
          <td >90 ~ 120 min</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" placeholder="" onchange="changeRange('par003',90,120)" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td >3</td>
          <td >Pintu Oven</td>
          <td >Periksa apakah pintu oven rapat saat ditutup</td>
          <td >
            <input class="form-control" type="text" placeholder="" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td >4</td>
          <td >Membersihkan Oven</td>
          <td >Bersihkan Oven dari debu atau kotoran dengan lap dan NG product yang terjatuh</td>
          <td >
            <input class="form-control" type="text" placeholder="" id="par005" name="par005" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td colspan="3">Note</td>
          <td >
            <input class="form-control" type="text" placeholder="" id="par006" name="par006" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

    </tbody>
    
    </table>
    <div class="note">
        <h3>Catatan</h3>
        <p>
            @: isi kolom dengan nilai (value) di mesin
        </p>
        <p>
            *: Beri tanda V jika OK/Good dan X jika NG
        </p>
        <p>
            #: isi bagian note apabila ada penggantian part    
        </p>
        <p>
            - Standard untuk setting open-close damper sama untuk oven type Ps-222 dan PHH-201    
        </p>
    </div>
</div>