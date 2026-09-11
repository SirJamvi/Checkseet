<div class="table-responsive" id="sl33-s-db2a">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("LD Die Bonding 2 Manual Machine")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th colspan="2" scope="col">Start up Check Item</th>
            <th scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up Check</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td >1</td>
            <td colspan="2">@ Machine air Presure</td>
            <td >0.05 - 0.25 MPa</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par001',0.05,0.25)" placeholder="" id="par001" name="par001" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
            </td>
        </tr>

        <tr>
            <td >2</td>
            <td colspan="2">@ Vacum Pressure collet</td>
            <td >-90.0 kPa atau kurang</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par002',-99999999,-90)" placeholder="" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
            </td>
        </tr>
        
        <tr>
            <td >3</td>
            <td colspan="2">@ Collet Load</td>
            <td >0.59 ~ 1.17 N</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par003',0.59,1.17)" placeholder="" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
            </td>
        </tr>

        <tr>
            <td >4</td>
            <td colspan="2">@ Needle Push Up Level</td>
            <td >0.2 ~ 0.6 mm</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par004',0.2,0.6)" placeholder="" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
            </td>
        </tr>

        <tr>
            <td >5</td>
            <td colspan="2">* Bersihkan collet dan middle Stage</td>
            <td >Bersihkan dengan Cotton Bud yang dibasahi dengan alkohol</td>
            <td >
                <input class="form-control" type="text" placeholder="" id="par005" name="par005" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
            </td>
        </tr>

        <tr>
            <td >6</td>
            <td colspan="2">* Bersihkan stage tipe L pada die bond unit</td>
            <td >Bersihkan dengan Cotton Bud yang dibasahi dengan alkohol</td>
            <td >
                <input class="form-control" type="text" placeholder="" id="par006" name="par006" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
            </td>
        </tr>

        <tr>
            <td >7</td>
            <td colspan="2">* Cek pergerakan clamp pusher X dan Y</td>
            <td >Pergerakan clamp pusher X dan Y normal atau tidak</td>
            <td >
                <input class="form-control" type="text" placeholder="" id="par007" name="par007" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
            </td>
        </tr>

        <tr>
            <td >8</td>
            <td colspan="2">@ Dispense Air Pressure</td>
            <td >0.01 ~ 0.10 MPa</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par008',0.01,0.1)" placeholder="" id="par008" name="par008" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
            </td>
        </tr>

        <tr>
            <td >9</td>
            <td colspan="2">@ Dispense Time</td>
            <td >5 ~ 25 (0.005 ~ 0.025 s)</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange2('par009',5,25,0.05,0.25)" placeholder="" id="par009" name="par009" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
            </td>
        </tr>

        <tr>
            <td >10</td>
            <td colspan="2">* Direction lonizer Blower</td>
            <td >Arahkan lonizer ke chip sheet dan check apakah lonizer bekerja normal</td>
            <td >
                <input class="form-control" type="text" placeholder="" id="par010" name="par010" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
            </td>
        </tr>

        <tr>
            <td rowspan="3">11</td>
            <td rowspan="3">@ Bonding Offset Parameter</td>
            <td >X</td>
            <td >-20 ~ 20 (65516 ~ 65556)</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange2('par011',-20,20,65516,65556)" placeholder="" id="par011" name="par011" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
            </td>
        </tr>

        <tr>
            <td >Y</td>
            <td >-20 ~ 20 (65516 ~ 65556)</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange2('par012',-20,20,65516,65556)" placeholder="" id="par012" name="par012" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
            </td>
        </tr>

        <tr>
            <td >θ</td>
            <td >-20 ~ 20 (65516 ~ 65556)</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange2('par013',-20,20,65516,65556)" placeholder="" id="par013" name="par013" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
            </td>
        </tr>

        <tr>
            <td colspan="4">Note</td>
            <td >
                <input class="form-control" type="text" placeholder="" id="par014" name="par014" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
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
    </div>
</div>