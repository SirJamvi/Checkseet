<div class="table-responsive" id="sl33-s-fcs">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="5">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
<table class="table table-striped-columns" 
    >
    <thead align="center">
    </thead>
    <thead align="center">
        <tr>
            <th class="input-form" rowspan="3"scope="col">Alasan Inspeksi</th>
            <th class="input-form" colspan="14" scope="col">Off Center Measurement (2 sample x 12 stage x 4 side = 96 measurement)</th>
        </tr>
            <th class="input-form" colspan="14" scope="col">Peel Off Check (2 sample x 12 stage = 24 test)</th>
        <tr>
            <th class="input-form" colspan="2" scope="col">Object/Sample</th>
            <th class="input-form" >Stg. 1</th>
            <th class="input-form" >Stg. 2</th>
            <th class="input-form" >Stg. 3</th>
            <th class="input-form" >Stg. 4</th>
            <th class="input-form" >Stg. 5</th>
            <th class="input-form" >Stg. 6</th>
            <th class="input-form" >Stg. 7</th>
            <th class="input-form" >Stg. 8</th>
            <th class="input-form" >Stg. 9</th>
            <th class="input-form" >Stg. 10</th>
            <th class="input-form" >Stg. 11</th>
            <th class="input-form" >Stg. 12</th>
           
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="10" >
                <textarea class="form-control" id="par025" name="par025" rows="10" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>></textarea>
            </td>
            <td rowspan="5">Sample 1</td>
            <td >Side 1</td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par001a" name="par001a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par002a" name="par002a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par003a" name="par003a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par004a" name="par004a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par005a" name="par005a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par006a" name="par006a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par007a" name="par007a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par008a" name="par008a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par009a" name="par009a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par010a" name="par010a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par011a" name="par011a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par012a" name="par012a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
            </td>
        </tr>
        <tr>
            <td >Side 2</td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par013a" name="par013a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par014a" name="par014a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par015a" name="par015a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par016a" name="par016a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par017a" name="par017a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par018a" name="par018a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par019a" name="par019a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par020a" name="par020a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par021a" name="par021a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par022a" name="par022a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par023a" name="par023a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par024a" name="par024a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
            </td>
            
        </tr>
        <tr>
            <td >Side 3</td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par001b" name="par001b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par001'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par002b" name="par002b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par002'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par003b" name="par003b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par003'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par004b" name="par004b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par004'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par005b" name="par005b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par005'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par006b" name="par006b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par006'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par007b" name="par007b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par007'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par008b" name="par008b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par008'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par009b" name="par009b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par009'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par010b" name="par010b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par010'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par011b" name="par011b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par011'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par012b" name="par012b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par012'];} ?>>
            </td>
             
        </tr>
        <tr>
            <td >Side 4</td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par013b" name="par013b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par013'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par014b" name="par014b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par014'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par015b" name="par015b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par015'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par016b" name="par016b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par016'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par017b" name="par017b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par017'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par018b" name="par018b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par018'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par019b" name="par019b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par019'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par020b" name="par020b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par020'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par021b" name="par021b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par021'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par022b" name="par022b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par022'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par023b" name="par023b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par023'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par024b" name="par024b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par024'];} ?>>
            </td>
           
        </tr>
        <tr>
            <td >PEEL OFF</td>
            <td>
            <select id="par001e" name="par001e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par001"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par001"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
            <td>
            <select id="par002e" name="par002e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par002"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par002"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par003e" name="par003e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par003"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par003"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par004e" name="par004e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par004"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par004"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par005e" name="par005e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par005"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par005"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par006e" name="par006e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par006"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par006"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par007e" name="par007e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par007"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par007"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par008e" name="par008e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par008"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par008"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par009e" name="par009e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par009"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par009"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par010e" name="par010e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par010"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par010"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par011e" name="par011e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par011"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par011"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par012e" name="par012e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par012"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par012"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
          
        </tr>
        <tr>
            <td rowspan="5">Sample 2</td>
            <td >Side 1</td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par001c" name="par001c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par001'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par002c" name="par002c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par002'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par003c" name="par003c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par003'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par004c" name="par004c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par004'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par005c" name="par005c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par005'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par006c" name="par006c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par006'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par007c" name="par007c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par007'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par008c" name="par008c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par008'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par009c" name="par009c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par009'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par010c" name="par010c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par010'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par011c" name="par011c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par011'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par012c" name="par012c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par012'];} ?>>
            </td>
        </tr>
        <tr>
            <td >Side 2</td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par013c" name="par013c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par013'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par014c" name="par014c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par014'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par015c" name="par015c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par015'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par016c" name="par016c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par016'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par017c" name="par017c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par017'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par018c" name="par018c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par018'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par019c" name="par019c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par019'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par020c" name="par020c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par020'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par021c" name="par021c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par021'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par022c" name="par022c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par022'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par023c" name="par023c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par023'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par024c" name="par024c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par024'];} ?>>
            </td>
    
        </tr>
        <tr>
            <td >Side 3</td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par001d" name="par001d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par001'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par002d" name="par002d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par002'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par003d" name="par003d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par003'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par004d" name="par004d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par004'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par005d" name="par005d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par005'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par006d" name="par006d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par006'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par007d" name="par007d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par007'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par008d" name="par008d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par008'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par009d" name="par009d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par009'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par010d" name="par010d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par010'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par011d" name="par011d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par011'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par012d" name="par012d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par012'];} ?>>
            </td>
      
        </tr>
        <tr>
            <td >Side 4</td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par013d" name="par013d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par013'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par014d" name="par014d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par014'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par015d" name="par015d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par015'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par016d" name="par016d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par016'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par017d" name="par017d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par017'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par018d" name="par018d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par018'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par019d" name="par019d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par019'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par020d" name="par020d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par020'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par021d" name="par021d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par021'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par022d" name="par022d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par022'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par023d" name="par023d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par023'];} ?>>
            </td>
            <td rowspan="1" >
                <input type="text" step="1" class="form-control" id="par024d" name="par024d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par024'];} ?>>
            </td>
           
        </tr>
        <tr>
            <td >PEEL OFF</td>
            <td>
            <select id="par013e" name="par013e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par013"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par013"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par014e" name="par014e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par014"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par014"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par015e" name="par015e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par015"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par015"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par016e" name="par016e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par016"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par016"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par017e" name="par017e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par017"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par017"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par018e" name="par018e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par018"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par018"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par019e" name="par019e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par019"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par019"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par020e" name="par020e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par020"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par020"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par021e" name="par021e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par021"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par021"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par022e" name="par022e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par022"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par022"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
            <td>
            <select id="par023e" name="par023e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par023"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par023"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        <td>
            <select id="par024e" name="par024e" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[4]["par024"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[4]["par024"]=="PASS")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="PASS" selected>PASS</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="PASS">PASS</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="PASS">PASS</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>        
        </tr>
    </tbody>
    </table>
</div>