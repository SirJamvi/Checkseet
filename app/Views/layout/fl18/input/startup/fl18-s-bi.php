<div class="table-responsive" id="fl18-s-bi">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("START UP CHECK SHEET OF BURN IN BOX MACHINE")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="2">Start up Checking Item</th>
            <th rowspan="2">Standard</th>
            <th rowspan="2">Battery ID</th>
            <th colspan="2">Hasil Start Up Check</th>
            <th rowspan="2">Note</th>
        </tr>
        <tr>
            <th >Result <br> (V)</th>
            <th >J</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td >@ Measure battery Voltage of <br> "Judgement LED Unit" <br> Ukur tegangan batterai untuk <br> "Judgment LED Unit"</td>
            <td >7 ~ 10V</td>
            <td >
                <input class="form-control" type="text" placeholder=""  id="par001" name="par001" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
            </td>

            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par002',7,10)" placeholder="" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
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

            <td >
                <input class="form-control" type="text" placeholder="" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
            </td>
        </tr>
    </tbody>
    
    </table>
    
    <div class="note">
        <h3>Ket :</h3>
        <p>
            - J : Judgment -> Fill judgment with : V = GOOD, X = Not Good (NG)
        </p>
        <p>
            - @ Tulis hasil pemeriksaan sesuai dengan angka yang ditunjukkan
        </p>
    </div>
</div>