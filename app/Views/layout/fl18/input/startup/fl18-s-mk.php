<div class="table-responsive">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" >
        <thead align="center">
            <tr>
            <th colspan="19" scope="col"><?php echo nl2br("MARKING HARDENING OVEN START UP")?></th>
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
                <td>
                    <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par001',180,190)" placeholder="" id="par001" name="par001" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
                </td>
                <td>
                    <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par002',25,35)" placeholder="" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
                </td>
                <td>
                    <select class="form-select" id="par003" name="par003">
                    <?php if(isset($alldata)){
                        if($alldata[0]["par003"]=="-"){
                            echo '
                            <option value="-" selected>-</option>
                            <option value="V">V</option>
                            <option value="X">X</option>
                            ';
                        }
                        else if($alldata[0]["par003"]=="V"){
                            echo '
                            <option value="-">-</option>
                            <option value="V" selected>V</option>
                            <option value="X">X</option>
                            ';
                        }
                        else{
                            echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="X" selected>X</option>
                            ';
                        }
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="X">X</option>
                        ';
                    } ?>
                </select>
            </td>
            <td>
                <select class="form-select" id="par004" name="par004">
                <?php if(isset($alldata)){
                    if($alldata[0]["par004"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par004"]=="V"){
                        echo '
                        <option value="-">-</option>
                        <option value="V" selected>V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else{
                        echo '
                        <option value="-">-</option>
                        <option value="V">V</option>
                        <option value="X" selected>X</option>
                        ';
                    }
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                    ';
                } ?>
                </select>
            </td>
            <td >
                <input class="form-control" type="text" id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
            </td>
            </tr>
            <tr>
                <th scope="row">B</th>
                <td>
                    <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par006',180,190)" placeholder="" id="par006" name="par006" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
                </td>
                <td>
                    <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par007',25,35)" placeholder="" id="par007" name="par007" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
                </td>
                <td>
                    <select class="form-select" id="par008" name="par008">
                    <?php if(isset($alldata)){
                        if($alldata[0]["par008"]=="-"){
                            echo '
                            <option value="-" selected>-</option>
                            <option value="V">V</option>
                            <option value="X">X</option>
                            ';
                        }
                        else if($alldata[0]["par008"]=="V"){
                            echo '
                            <option value="-">-</option>
                            <option value="V" selected>V</option>
                            <option value="X">X</option>
                            ';
                        }
                        else{
                            echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="X" selected>X</option>
                            ';
                        }
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="X">X</option>
                        ';
                    } ?>
                    </select>
                </td>
                <td>
                    <select class="form-select" id="par009" name="par009">
                    <?php if(isset($alldata)){
                        if($alldata[0]["par009"]=="-"){
                            echo '
                            <option value="-" selected>-</option>
                            <option value="V">V</option>
                            <option value="X">X</option>
                            ';
                        }
                        else if($alldata[0]["par009"]=="V"){
                            echo '
                            <option value="-">-</option>
                            <option value="V" selected>V</option>
                            <option value="X">X</option>
                            ';
                        }
                        else{
                            echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="X" selected>X</option>
                            ';
                        }
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="X">X</option>
                        ';
                    } ?>
                    </select>
                </td>
                <td >
                    <input class="form-control" type="text" id="par010" name="par010" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
                </td>
            </tr>
            <tr>
                <th scope="row">C</th>
                <td>
                    <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par011',180,190)" placeholder="" id="par011" name="par011" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
                </td>
                <td>
                    <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par012',25,35)" placeholder="" id="par012" name="par012" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
                </td>
                <td>
                    <select class="form-select" id="par013" name="par013">
                    <?php if(isset($alldata)){
                        if($alldata[0]["par013"]=="-"){
                            echo '
                            <option value="-" selected>-</option>
                            <option value="V">V</option>
                            <option value="X">X</option>
                            ';
                        }
                        else if($alldata[0]["par013"]=="V"){
                            echo '
                            <option value="-">-</option>
                            <option value="V" selected>V</option>
                            <option value="X">X</option>
                            ';
                        }
                        else{
                            echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="X" selected>X</option>
                            ';
                        }
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="X">X</option>
                        ';
                    } ?>
                    </select>
                </td>
                <td>
                    <select class="form-select" id="par014" name="par014">
                    <?php if(isset($alldata)){
                        if($alldata[0]["par014"]=="-"){
                            echo '
                            <option value="-" selected>-</option>
                            <option value="V">V</option>
                            <option value="X">X</option>
                            ';
                        }
                        else if($alldata[0]["par014"]=="V"){
                            echo '
                            <option value="-">-</option>
                            <option value="V" selected>V</option>
                            <option value="X">X</option>
                            ';
                        }
                        else{
                            echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="X" selected>X</option>
                            ';
                        }
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="X">X</option>
                        ';
                    } ?>
                    </select>
                </td>
                <td >
                    <input class="form-control" type="text" id="par015" name="par015" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
                </td>
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