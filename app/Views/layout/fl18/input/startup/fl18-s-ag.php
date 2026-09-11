<div class="table-responsive" id="fl18-s-ag">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("AG PASTE HARDENING OVEN")?></th>
        </tr>
        <tr>
            <th class="input-form" scope="col" colspan="4" >Start Up Check Item</th>
            <th class="input-form" scope="col" rowspan="2">Note</td>
        </tr>

        <tr>
            <th class="input-form">A</td>
            <th class="input-form">B</td>
            <th class="input-form">C</td>
            <th class="input-form">D</td>
        </tr>
    </thead>

    <tbody>
        <td rowspan="1">
            <input class="form-control" type="number" step=0.001 id="par001" name="par001" onchange="changeRange('par001',150,160)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
        </td>
        <td rowspan="1">
            <input class="form-control" type="number" step=0.001 id="par002" name="par002" onchange="changeRange('par002',25,35)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
        <td rowspan="1">
            <input class="form-control" type="text" id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
        <td rowspan="1">
            <input class="form-control" type="text" id="par004" name="par004" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
        </td>
        <td rowspan="1">
            <input class="form-control" type="text" id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
        </td>
    </tbody>   
    </table>
    <div class="note">
        <h3>Catatan</h3>
        <p>
            A. Checking of temperature setting oven 
            <br>
            Standard : 150 C - 160 C
        </p>
        <p>
            B. Setting open-close damper 
            <br>
            Standard 25% - 35%
        </p>
        <p>
            C. Checking of oven door
            <br>
            Standard : Periksa apakah pintu oven rapat saat ditutup (isi V jika ditutup isi X jika tidak)
        </p>
        <p>
            D. Cleaning of oven
            <br>
            Standard : Bersihkan oven dari debu atau kotoran menggunakan lap dan dari device yang terjatuh (isi V jika dibersihkan isi X jika tidak)
        </p>
    </div>
</div>
<!-- http://startupman.dev.ssi:8080/assets/js/form/fl18-s-ag.js -->
<script src='<?=base_url().'assets/js/form/fl18-s-ag.js'?>'></script>