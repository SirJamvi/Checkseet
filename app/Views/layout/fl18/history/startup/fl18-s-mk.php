<div class="table-responsive mt-3" id="fl18-s-mk">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
        <th colspan=<?= 6+$lenData ?>  scope="col"><?php echo nl2br("MARKING HARDENING OVEN START UP")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th class="input-form" rowspan="2" >Shift </th>
            <th class="input-form" scope="col" colspan="4" >Start Up Check Item </th>
            <th class="input-form" rowspan="2" >Note </th>
        </tr>
        <tr>
            <th class="input-form" scope="col">A @</th>
            <th class="input-form" scope="col">B @</th>
            <th class="input-form" scope="col">C *</th>
            <th class="input-form" scope="col">D *</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">A</th>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par001']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par002']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par003']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par004']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par005']; ?></td>
            <?php } ?>
        </tr>
        <tr>
            <th scope="row">B</th>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par006']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par007']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par008']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par009']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par010']; ?></td>
            <?php } ?>
        </tr>
        <tr>
            <th scope="row">C</th>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par011']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par012']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par013']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par014']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par015']; ?></td>
            <?php } ?>
        </tr>
        </tbody>
    </table>
    <div class="note">
    <h3>Note :</h3>
    <p>
        @ : Tulis hasil pemeriksaan sesuai dengan angka yang ditunjukan pada masing-masing alat ukur
    </p>
    <p>
        * : Beri tanda (V) jika kondisi OK/Good atau sudah dilakukan dan beri tanda (X) jika No Good pada hasil start up check
    </p>
    <p>
        Isi bagian note (catatan) apabila melakukan penggantian part, melakukan adjusment, atau terjadi kondisi yang tidak sesuai dengan standart
    </p>
    <h3>Contents :</h3>
    <p>
        A. Checking of temperature setting oven 
        <br>
        Standard : 180°C ~ 190°C
    </p>
    <p>
        B. Setting open-close damper 
        <br>
        Standard 25% ~ 35%
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
</div>