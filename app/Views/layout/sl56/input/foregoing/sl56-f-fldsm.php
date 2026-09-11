<div class="table-responsive" id="sl56-f-ldsm">
<?= csrf_field(); ?>
    <input type="hidden" name="cnt-proses" value="4">
    <input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns">
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
                <input type="number" step="0.00000001" class="form-control" id="par024a" name="par024a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
            </td>
            <td>
                <input type="number" step="0.00000001" class="form-control" id="par025a" name="par025a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
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
                <input type="number" step="0.00000001" class="form-control" id="par026a" name="par026a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
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
            <td>
                <select id="par041a" name="par041a" class="form-select">
                    <?php if(isset($alldata)){
                        if($alldata[0]["par041"]=="-"){
                        echo '
                            <option value="-" selected>-</option>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        ';
                        }
                        else if($alldata[0]["par041"]=="OK")
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
                <select id="par042a" name="par042a" class="form-select">
                    <?php if(isset($alldata)){
                        if($alldata[0]["par042"]=="-"){
                            echo '
                                <option value="-" selected>-</option>
                                <option value="OK">OK</option>
                                <option value="NG">NG</option>
                            ';
                            }
                            else if($alldata[0]["par042"]=="OK")
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
                <input type="text" class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
            </td>
            </tr>
            <tr>
            <th scope="row">Front 2</th>
                <td>
                    <input type="number" step="0.00000001" class="form-control" id="par024b" name="par024b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par024'];} ?>>
                </td>
                <td>
                    <input type="number" step="0.00000001" class="form-control" id="par025b" name="par025b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par025'];} ?>>
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
                    <input type="number" step="0.00000001" class="form-control" id="par026b" name="par026b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par026'];} ?>>
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
                <td>
                    <select id="par041b" name="par041b" class="form-select">
                        <?php if(isset($alldata)){
                            if($alldata[1]["par041"]=="-"){
                            echo '
                                <option value="-" selected>-</option>
                                <option value="OK">OK</option>
                                <option value="NG">NG</option>
                            ';
                            }
                            else if($alldata[1]["par041"]=="OK")
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
                    <select id="par042b" name="par042b" class="form-select">
                        <?php if(isset($alldata)){
                            if($alldata[1]["par042"]=="-"){
                                echo '
                                    <option value="-" selected>-</option>
                                    <option value="OK">OK</option>
                                    <option value="NG">NG</option>
                                ';
                                }
                                else if($alldata[1]["par042"]=="OK")
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
                    <input type="number" step="0.00000001" class="form-control" id="par024c" name="par024c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par024'];} ?>>
                </td>
                <td>
                    <input type="number" step="0.00000001" class="form-control" id="par025c" name="par025c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par025'];} ?>>
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
                    <input type="number" step="0.00000001" class="form-control" id="par026c" name="par026c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par026'];} ?>>
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
                <td>
                    <select id="par041c" name="par041c" class="form-select">
                        <?php if(isset($alldata)){
                            if($alldata[2]["par041"]=="-"){
                            echo '
                                <option value="-" selected>-</option>
                                <option value="OK">OK</option>
                                <option value="NG">NG</option>
                            ';
                            }
                            else if($alldata[2]["par041"]=="OK")
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
                    <select id="par042c" name="par042c" class="form-select">
                        <?php if(isset($alldata)){
                            if($alldata[2]["par042"]=="-"){
                            echo '
                                <option value="-" selected>-</option>
                                <option value="OK">OK</option>
                                <option value="NG">NG</option>
                            ';
                            }
                            else if($alldata[2]["par042"]=="OK")
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
                    <input type="number" step="0.00000001" class="form-control" id="par024d" name="par024d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par024'];} ?>>
                </td>
                <td>
                    <input type="number" step="0.00000001" class="form-control" id="par025d" name="par025d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par025'];} ?>>
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
                    <input type="number" step="0.00000001" class="form-control" id="par026d" name="par026d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par026'];} ?>>
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
                <td>
                    <select id="par041d" name="par041d" class="form-select">
                        <?php if(isset($alldata)){
                            if($alldata[3]["par041"]=="-"){
                            echo '
                                <option value="-" selected>-</option>
                                <option value="OK">OK</option>
                                <option value="NG">NG</option>
                            ';
                            }
                            else if($alldata[3]["par041"]=="OK")
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
                    <select id="par042d" name="par042d" class="form-select">
                        <?php if(isset($alldata)){
                            if($alldata[3]["par042"]=="-"){
                            echo '
                                <option value="-" selected>-</option>
                                <option value="OK">OK</option>
                                <option value="NG">NG</option>
                            ';
                            }
                            else if($alldata[3]["par042"]=="OK")
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