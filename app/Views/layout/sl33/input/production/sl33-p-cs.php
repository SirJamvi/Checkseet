<div class="table-responsive" id="sl33-p-cs">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="5">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("CAP SEAL")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
        <th class="input-form" colspan="3" scope="col" style="width:25%;">Quantity</th>
        <th class="input-form" rowspan="3">Cap Lot Number</th>
        <th class="input-form" colspan="8" scope="col" >FOR GOING MICROSCOPIC INSPECTION</th>
        </tr>
    
        <tr> 
        <th class="input-form" rowspan="2">Input</th>
        <th class="input-form" rowspan="2">Output</th>           
        <th class="input-form" rowspan="2">Reject</th>
        <th class="input-form" colspan="8">(20 pcs/Lot)</th>
        </tr>
    
    <tr>         
        <th class="input-form" scope="col">Cap NG</th>
        <th class="input-form" scope="col">Cap Crack</th>
        <th class="input-form" scope="col">Off Center</th>
        <th class="input-form" scope="col">Glass Scratch</th>
        <th class="input-form" scope="col">Stem Scratch</th>
        <th class="input-form" scope="col">Protrution</th>
        <th class="input-form" scope="col">Glass Crack</th>
        <th class="input-form" scope="col">Burry</th>
    </tr>

    </thead>
    <tbody>
        <td rowspan="1" >
            <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup=quantityChange1() onchange=quantityChange1()  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
        </td>
        <td rowspan="1" >
            <input type="number"  oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
        <td rowspan="1" >
            <input type="number"  oninput="" step="1" class="form-control" id="par015" name="par015"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
        </td>
        <td rowspan="1" >
            <input type="text" step="1" class="form-control" id="par002" name="par002"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
        <td>
        <select id="par035" name="par035" class="form-select">
            <?php if(isset($alldata)){
                if($alldata[0]["par035"]=="-"){
                echo '
                    <option value="-" selected>-</option>
                    <option value="GO">GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else if($alldata[0]["par035"]=="GO")
                {
                echo '
                    <option value="-">-</option>
                    <option value="GO" selected>GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else{
                echo '
                    <option value="-">-</option>
                    <option value="GO">GO</option>
                    <option value="NG" selected>NG</option>
                ';
                }
            }
            else{
                echo '<option value="-">-</option>
                <option value="GO">GO</option>
                <option value="NG">NG</option>';
            } ?>
        </select>
        </td>
        <td>
        <select id="par036" name="par036" class="form-select">
            <?php if(isset($alldata)){
                if($alldata[0]["par036"]=="-"){
                echo '
                    <option value="-" selected>-</option>
                    <option value="GO">GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else if($alldata[0]["par036"]=="GO")
                {
                echo '
                    <option value="-">-</option>
                    <option value="GO" selected>GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else{
                echo '
                    <option value="-">-</option>
                    <option value="GO">GO</option>
                    <option value="NG" selected>NG</option>
                ';
                }
            }
            else{
                echo '<option value="-">-</option>
                <option value="GO">GO</option>
                <option value="NG">NG</option>';
            } ?>
        </select>
        </td>
        <td>
        <select id="par037" name="par037" class="form-select">
            <?php if(isset($alldata)){
                if($alldata[0]["par037"]=="-"){
                echo '
                    <option value="-" selected>-</option>
                    <option value="GO">GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else if($alldata[0]["par037"]=="GO")
                {
                echo '
                    <option value="-">-</option>
                    <option value="GO" selected>GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else{
                echo '
                    <option value="-">-</option>
                    <option value="GO">GO</option>
                    <option value="NG" selected>NG</option>
                ';
                }
            }
            else{
                echo '<option value="-">-</option>
                <option value="GO">GO</option>
                <option value="NG">NG</option>';
            } ?>
        </select>
        </td>
        <td>
        <select id="par038" name="par038" class="form-select">
            <?php if(isset($alldata)){
                if($alldata[0]["par038"]=="-"){
                echo '
                    <option value="-" selected>-</option>
                    <option value="GO">GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else if($alldata[0]["par038"]=="GO")
                {
                echo '
                    <option value="-">-</option>
                    <option value="GO" selected>GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else{
                echo '
                    <option value="-">-</option>
                    <option value="GO">GO</option>
                    <option value="NG" selected>NG</option>
                ';
                }
            }
            else{
                echo '<option value="-">-</option>
                <option value="GO">GO</option>
                <option value="NG">NG</option>';
            } ?>
        </select>
        </td>
        <td>
        <select id="par039" name="par039" class="form-select">
            <?php if(isset($alldata)){
                if($alldata[0]["par039"]=="-"){
                echo '
                    <option value="-" selected>-</option>
                    <option value="GO">GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else if($alldata[0]["par039"]=="GO")
                {
                echo '
                    <option value="-">-</option>
                    <option value="GO" selected>GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else{
                echo '
                    <option value="-">-</option>
                    <option value="GO">GO</option>
                    <option value="NG" selected>NG</option>
                ';
                }
            }
            else{
                echo '<option value="-">-</option>
                <option value="GO">GO</option>
                <option value="NG">NG</option>';
            } ?>
        </select>
        </td>
        <td>
        <select id="par040" name="par040" class="form-select">
            <?php if(isset($alldata)){
                if($alldata[0]["par040"]=="-"){
                echo '
                    <option value="-" selected>-</option>
                    <option value="GO">GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else if($alldata[0]["par040"]=="GO")
                {
                echo '
                    <option value="-">-</option>
                    <option value="GO" selected>GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else{
                echo '
                    <option value="-">-</option>
                    <option value="GO">GO</option>
                    <option value="NG" selected>NG</option>
                ';
                }
            }
            else{
                echo '<option value="-">-</option>
                <option value="GO">GO</option>
                <option value="NG">NG</option>';
            } ?>
        </select>
        </td>
        <td>
        <select id="par041" name="par041" class="form-select">
            <?php if(isset($alldata)){
                if($alldata[0]["par041"]=="-"){
                echo '
                    <option value="-" selected>-</option>
                    <option value="GO">GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else if($alldata[0]["par041"]=="GO")
                {
                echo '
                    <option value="-">-</option>
                    <option value="GO" selected>GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else{
                echo '
                    <option value="-">-</option>
                    <option value="GO">GO</option>
                    <option value="NG" selected>NG</option>
                ';
                }
            }
            else{
                echo '<option value="-">-</option>
                <option value="GO">GO</option>
                <option value="NG">NG</option>';
            } ?>
        </select>
        </td>
        <td>
        <select id="par042" name="par042" class="form-select">
            <?php if(isset($alldata)){
                if($alldata[0]["par042"]=="-"){
                echo '
                    <option value="-" selected>-</option>
                    <option value="GO">GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else if($alldata[0]["par042"]=="GO")
                {
                echo '
                    <option value="-">-</option>
                    <option value="GO" selected>GO</option>
                    <option value="NG">NG</option>
                ';
                }
                else{
                echo '
                    <option value="-">-</option>
                    <option value="GO">GO</option>
                    <option value="NG" selected>NG</option>
                ';
                }
            }
            else{
                echo '<option value="-">-</option>
                <option value="GO">GO</option>
                <option value="NG">NG</option>';
            } ?>
        </select>
        </td>
    </tbody>
    </table>

    <table class="table table-striped-columns" 
    >
    <thead align="center">
    </thead>
    <thead align="center">
        <tr>
            <th class="input-form" scope="col" style="width:25%;">Stem Dimension</th>
            <th class="input-form" scope="col">Cap Length</th>
            <th class="input-form" scope="col">Off Center Measurement</th>
            <th class="input-form" scope="col">Peel Off Test</th>
            <th class="input-form" scope="col">Waktu Pemakaian Upper Electrode (24000 kali)</th>
            <th class="input-form" scope="col">Waktu Pemakaian Middle Electrode (2000 kali)</th>
            <th class="input-form" scope="col">Pergantian Electrode</th>
        </tr>
    </thead>
    
    <tbody>
        <td rowspan="1" >
            <input type="text" step="1" class="form-control" id="par003" name="par003"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
        <td rowspan="1" >
            <input type="text" step="1" class="form-control" id="par004" name="par004"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
        </td>
        <td>
            <select id="par005" name="par005" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par005"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="CHECK">CHECK</option>
                        <option value="NOT">NOT</option>
                    ';
                    }
                    else if($alldata[0]["par005"]=="CHECK")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="CHECK" selected>CHECK</option>
                        <option value="NOT">NOT</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="CHECK">CHECK</option>
                        <option value="NOT" selected>NOT</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="CHECK">CHECK</option>
                    <option value="NOT">NOT</option>';
                } ?>
            </select>
        </td>
        <td>
            <select id="par006" name="par006" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par006"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="CHECK">CHECK</option>
                        <option value="NOT">NOT</option>
                    ';
                    }
                    else if($alldata[0]["par006"]=="CHECK")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="CHECK" selected>CHECK</option>
                        <option value="NOT">NOT</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="CHECK">CHECK</option>
                        <option value="NOT" selected>NOT</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="CHECK">CHECK</option>
                    <option value="NOT">NOT</option>';
                } ?>
            </select>
        </td>
        <td rowspan="1" >
            <input type="number" step="0.0001" class="form-control" id="par016" name="par016"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
        </td>
        <td rowspan="1" >
            <input type="number" step="0.0001" class="form-control" id="par017" name="par017"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td>
        <td rowspan="1" >
            <input type="number" step="0.0001" class="form-control" id="par018" name="par018"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td>
    </tbody>
    </table>
</div>