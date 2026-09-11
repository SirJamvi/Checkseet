<div class="table-responsive" id="sl38-p-ldsm">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns">
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("FOREGOING LDSM MACHINE")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th class="input-form" colspan="6" scope="col">Die Bonding Strength*</th>
            <th class="input-form" colspan="2" scope="col">Wettability area >= 90%</th>
            <th class="input-form"  rowspan="3">Remark</th>
            </tr>
            <tr>
            <th class="input-form"  rowspan="2">Sample</th>
            <th class="input-form"  scope="col" colspan="3">LD Chip & SM</th>

            <th class="input-form"  scope="col" colspan="2">Submount & Stem</th>

            <th class="input-form"  rowspan="2">LD Chip & SM</th>
            <th class="input-form"  rowspan="2">Submount & Stem</th>

        </tr>
        <tr>
            <th class="input-form" scope="col">Result</th>
            <th class="input-form" scope="col">Remain <br> % LD</th>
            <th class="input-form" scope="col">Judge <br> (OK/NG)</th>
            <th class="input-form" scope="col">Result</th>
            <th class="input-form" scope="col">Judge <br> (OK/NG)</th>
        </tr>
    </thead>

    <tbody>
    <tr>
        <th scope="row">Front 1</th>
        <td>
            <input type="number" step="0.00000001" class="form-control" id="par017" name="par017" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td>
        <td>
            <input type="number" step="0.00000001" class="form-control" id="par018" name="par018" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td>
        <td>
            <select id="par035a" name="par035a" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par035"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[0]["par035"]=="OK")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="OK" selected>OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="OK">OK</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>
        <td>
            <input type="number" step="0.00000001" class="form-control" id="par019" name="par019" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td>
        <td>
            <select id="par036a" name="par036a" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par036"]=="-"){
                        echo '
                            <option value="-" selected>-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else if($alldata[0]["par036"]=="OK")
                        {
                        echo '
                            <option value="-">-</option>
                            <option value="OK" selected>OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="OK">OK</option>
                            <option value="NG" selected>NG</option>
                        ';
                        }
                    }
                    else{
                        echo '<option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>';
                    } ?>
            </select>
        </td>
        <td>
            <select id="par037a" name="par037a" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par037"]=="-"){
                    echo '
                        <option value="-" selected>-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else if($alldata[0]["par037"]=="OK")
                    {
                    echo '
                        <option value="-">-</option>
                        <option value="OK" selected>OK</option>
                        <option value="NG">NG</option>
                    ';
                    }
                    else{
                    echo '
                        <option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG" selected>NG</option>
                    ';
                    }
                }
                else{
                    echo '<option value="-">-</option>
                    <option value="OK">OK</option>
                    <option value="NG">NG</option>';
                } ?>
            </select>
        </td>
        <td>
            <select id="par038a" name="par038a" class="form-select">
                <?php if(isset($alldata)){
                    if($alldata[0]["par038"]=="-"){
                        echo '
                            <option value="-" selected>-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else if($alldata[0]["par038"]=="OK")
                        {
                        echo '
                            <option value="-">-</option>
                            <option value="OK" selected>OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="OK">OK</option>
                            <option value="NG" selected>NG</option>
                        ';
                        }
                    }
                    else{
                        echo '<option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>';
                    } ?>
            </select>
        </td>
        <td rowspan="4">
            <input type="text" class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
        </tr>
        <tr>
        <th scope="row">Front 2</th>
            <td>
                <input type="number" step="0.00000001" class="form-control" id="par020" name="par020"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
            </td>
            <td>
                <input type="number" step="0.00000001" class="form-control" id="par021" name="par021"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
            </td>
            <td>
                <select id="par035b" name="par035b" class="form-select">
                    <?php if(isset($alldata)){
                        if($alldata[1]["par035"]=="-"){
                        echo '
                            <option value="-" selected>-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else if($alldata[1]["par035"]=="OK")
                        {
                        echo '
                            <option value="-">-</option>
                            <option value="OK" selected>OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="OK">OK</option>
                            <option value="NG" selected>NG</option>
                        ';
                        }
                    }
                    else{
                        echo '<option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>';
                    } ?>
                </select>
            </td>
            <td>
                <input type="number" step="0.00000001" class="form-control" id="par022" name="par022"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
            </td>
            <td>
                <select id="par036b" name="par036b" class="form-select">
                    <?php if(isset($alldata)){
                        if($alldata[1]["par036"]=="-"){
                            echo '
                            <option value="-" selected>-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else if($alldata[1]["par036"]=="OK")
                        {
                        echo '
                            <option value="-">-</option>
                            <option value="OK" selected>OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="OK">OK</option>
                            <option value="NG" selected>NG</option>
                        ';
                        }
                    }
                    else{
                        echo '<option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>';
                    } ?>
                </select>
            </td>
            <td>
                <select id="par037b" name="par037b" class="form-select">
                    <?php if(isset($alldata)){
                        if($alldata[1]["par037"]=="-"){
                        echo '
                            <option value="-" selected>-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else if($alldata[1]["par037"]=="OK")
                        {
                        echo '
                            <option value="-">-</option>
                            <option value="OK" selected>OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="OK">OK</option>
                            <option value="NG" selected>NG</option>
                        ';
                        }
                    }
                    else{
                        echo '<option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>';
                    } ?>
                </select>
            </td>
            <td>
                <select id="par038b" name="par038b" class="form-select">
                    <?php if(isset($alldata)){
                        if($alldata[1]["par038"]=="-"){
                            echo '
                                <option value="-" selected>-</option>
                                <option value="OK">OK</option>
                                <option value="NG">NG</option>
                            ';
                            }
                            else if($alldata[1]["par038"]=="OK")
                            {
                            echo '
                                <option value="-">-</option>
                                <option value="OK" selected>OK</option>
                                <option value="NG">NG</option>
                            ';
                            }
                            else{
                            echo '
                                <option value="-">-</option>
                                <option value="OK">OK</option>
                                <option value="NG" selected>NG</option>
                            ';
                            }
                        }
                        else{
                            echo '<option value="-">-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>';
                        } ?>
                </select>
            </td>

        </tr>   
        <tr>
        <th scope="row">Back 1</th>
            <td>
                <input type="number" step="0.00000001" class="form-control" id="par023" name="par023"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
            </td>
            <td>
                <input type="number" step="0.00000001" class="form-control" id="par024" name="par024"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
            </td>
            <td>
                <select id="par035c" name="par035c" class="form-select">
                    <?php if(isset($alldata)){
                        if($alldata[2]["par035"]=="-"){
                        echo '
                            <option value="-" selected>-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else if($alldata[2]["par035"]=="OK")
                        {
                        echo '
                            <option value="-">-</option>
                            <option value="OK" selected>OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="OK">OK</option>
                            <option value="NG" selected>NG</option>
                        ';
                        }
                    }
                    else{
                        echo '<option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>';
                    } ?>
                </select>
            </td>
            <td>
                <input type="number" step="0.00000001" class="form-control" id="par025" name="par025" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
            </td>
            <td>
                <select id="par036c" name="par036c" class="form-select">
                    <?php if(isset($alldata)){
                        if($alldata[2]["par036"]=="-"){
                        echo '
                            <option value="-" selected>-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else if($alldata[2]["par036"]=="OK")
                        {
                        echo '
                            <option value="-">-</option>
                            <option value="OK" selected>OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="OK">OK</option>
                            <option value="NG" selected>NG</option>
                        ';
                        }
                    }
                    else{
                        echo '<option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>';
                    } ?>
                </select>
            </td>
            <td>
                <select id="par037c" name="par037c" class="form-select">
                    <?php if(isset($alldata)){
                        if($alldata[2]["par037"]=="-"){
                        echo '
                            <option value="-" selected>-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else if($alldata[2]["par037"]=="OK")
                        {
                        echo '
                            <option value="-">-</option>
                            <option value="OK" selected>OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="OK">OK</option>
                            <option value="NG" selected>NG</option>
                        ';
                        }
                    }
                    else{
                        echo '<option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>';
                    } ?>
                </select>
            </td>
            <td>
                <select id="par038c" name="par038c" class="form-select">
                    <?php if(isset($alldata)){
                        if($alldata[2]["par038"]=="-"){
                        echo '
                            <option value="-" selected>-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else if($alldata[2]["par038"]=="OK")
                        {
                        echo '
                            <option value="-">-</option>
                            <option value="OK" selected>OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="OK">OK</option>
                            <option value="NG" selected>NG</option>
                        ';
                        }
                    }
                    else{
                        echo '<option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>';
                    } ?>
                </select>
            </td>
            
        </tr>
        <tr>
        <th scope="row">Back 2</th>
        <td>
                <input type="number" step="0.00000001" class="form-control" id="par026" name="par026" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
            </td>
            <td>
                <input type="number" step="0.00000001" class="form-control" id="par027" name="par027" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
            </td>
            <td>
                <select id="par035d" name="par035d" class="form-select">
                    <?php if(isset($alldata)){
                        if($alldata[3]["par035"]=="-"){
                        echo '
                            <option value="-" selected>-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else if($alldata[3]["par035"]=="OK")
                        {
                        echo '
                            <option value="-">-</option>
                            <option value="OK" selected>OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="OK">OK</option>
                            <option value="NG" selected>NG</option>
                        ';
                        }
                    }
                    else{
                        echo '<option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>';
                    } ?>
                </select>
            </td>
            <td>
                <input type="number" step="0.00000001" class="form-control" id="par028" name="par028" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
            </td>
            <td>
                <select id="par036d" name="par036d" class="form-select">
                    <?php if(isset($alldata)){
                        if($alldata[3]["par036"]=="-"){
                        echo '
                            <option value="-" selected>-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else if($alldata[3]["par036"]=="OK")
                        {
                        echo '
                            <option value="-">-</option>
                            <option value="OK" selected>OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="OK">OK</option>
                            <option value="NG" selected>NG</option>
                        ';
                        }
                    }
                    else{
                        echo '<option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>';
                    } ?>
                </select>
            </td>
            <td>
                <select id="par037d" name="par037d" class="form-select">
                    <?php if(isset($alldata)){
                        if($alldata[3]["par037"]=="-"){
                        echo '
                            <option value="-" selected>-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else if($alldata[3]["par037"]=="OK")
                        {
                        echo '
                            <option value="-">-</option>
                            <option value="OK" selected>OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="OK">OK</option>
                            <option value="NG" selected>NG</option>
                        ';
                        }
                    }
                    else{
                        echo '<option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>';
                    } ?>
                </select>
            </td>
            <td>
                <select id="par038d" name="par038d" class="form-select">
                    <?php if(isset($alldata)){
                        if($alldata[3]["par038"]=="-"){
                        echo '
                            <option value="-" selected>-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else if($alldata[3]["par038"]=="OK")
                        {
                        echo '
                            <option value="-">-</option>
                            <option value="OK" selected>OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="OK">OK</option>
                            <option value="NG" selected>NG</option>
                        ';
                        }
                    }
                    else{
                        echo '<option value="-">-</option>
                        <option value="OK">OK</option>
                        <option value="NG">NG</option>';
                    } ?>
                </select>
            </td>
        </tr>
    </tbody>
    </table>
</div>