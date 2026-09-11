<!-- FL Tie Bar Cutting -->
<div class="table-responsive">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="2">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns table-responsive">
        <thead align="center">
            <tr>
                <th colspan="10" scope="col"><?php echo nl2br("TIE BAR CUTTING")?></th>
            </tr>
            <tr>
                <th class="input-form" scope="col" colspan="4">Quantity</th>
                <th class="input-form" scope="col" colspan="3">*Foregoing Result (20 pcs / shift)</th>
                <th class="input-form" rowspan="2">Cutter Usage Time</th>
            </tr>
            <tr>
                <th class="input-form" scope="col">Input</th>
                <th class="input-form" scope="col">Output</th>
                <th class="input-form" scope="col">NG</th>
                <th class="input-form" scope="col">Yield %</th>
                <th class="input-form" scope="col">Scratch At Outer Lead</th>
                <th class="input-form" scope="col">Scratch At Resin Part</th>
                <th class="input-form" scope="col">Scratch At Cap NG</th>
            </tr>
        </thead>
        <tbody>
            <td>
                <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" placeholder="Quantity Input" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." readonly";} ?>>
            </td>
            <td>
                <input type="number"  oninput="" step="1" class="form-control" id="par014" name="par014" placeholder="Quantity Output" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
            </td>
            <td>
                <input type="number"  oninput="" step="1" class="form-control" id="par015" name="par015" placeholder="Quantity NG" readonly  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
            </td>
            <td>
                <input type="number"  oninput="" step="0.01" class="form-control" id="par016" name="par016" placeholder="Quantity Yield" readonly  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
            </td>
            <td>
                <select class="form-select" id="par035" name="par035" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par035'];} ?>>
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
                <select class="form-select" id="par036" name="par036" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par036'];} ?>>
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
                <select class="form-select" id="par037" name="par037" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par037'];} ?>>
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
                <input type="number"  oninput="" step="1" class="form-control" id="par017" name="par017" placeholder="Cutter Usage Time" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
            </td>
        </tbody>
        </table>


        <table class="table table-striped-columns table-responsive">
            <thead align="center">
                <tr>
                    <th class="input-form" rowspan="3">Sample</th>
                    <th class="input-form" scope="col" colspan="6">@Foregoing Pengukuran panjang lead & bari <br>(2pcs/hari)</th>
                    <th class="input-form" scope="col" colspan="6">@Pengukuran panjang lead & bari setelah penggantian cutter (2 pcs pada lot saat pergantian)</th>
                </tr>
                <tr>
                    <th class="input-form" scope="col" colspan="3">Panjang Lead FL 1.8t & FL 1.3t Standard : 3.5 - 4.5 mm</th>
                    <th class="input-form" scope="col" colspan="3">Panjang Bari FL 1.8t & FL 1.3t Standard : - 0.08 - 0.08 mm</th>
                    <th class="input-form" scope="col" colspan="3">Panjang Lead FL 1.8t & FL 1.3t Standard : 3.5 - 4.5 mm</th>
                    <th class="input-form" scope="col" colspan="3">Panjang Bari FL 1.8t & FL 1.3t Standard : - 0.08 - 0.08 mm</th>
                </tr>
                <tr>
                    <th class="input-form" scope="col">Lead 1</th>
                    <th class="input-form" scope="col">Lead 2</th>
                    <th class="input-form" scope="col">Lead 3</th>
                    <th class="input-form" scope="col">Bar 1</th>
                    <th class="input-form" scope="col">Bar 2</th>
                    <th class="input-form" scope="col">Bar 3</th>
                    <th class="input-form" scope="col">Lead 1</th>
                    <th class="input-form" scope="col">Lead 2</th>
                    <th class="input-form" scope="col">Lead 3</th>
                    <th class="input-form" scope="col">Bar 1</th>
                    <th class="input-form" scope="col">Bar 2</th>
                    <th class="input-form" scope="col">Bar 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Sample 1</th>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par018a" name="par018a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par019a" name="par019a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par020a" name="par020a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par021a" name="par021a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par022a" name="par022a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par023a" name="par023a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par024a" name="par024a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par025a" name="par025a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par026a" name="par026a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par027a" name="par027a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par028a" name="par028a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par029a" name="par029a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par029'];} ?>>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Sample 2</th>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par018b" name="par018b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par018'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par019b" name="par019b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par019'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par020b" name="par020b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par020'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par021b" name="par021b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par021'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par022b" name="par022b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par022'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par023b" name="par023b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par023'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par024b" name="par024b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par024'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par025b" name="par025b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par025'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par026b" name="par026b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par026'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par027b" name="par027b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par027'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par028b" name="par028b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par028'];} ?>>
                    </td>
                    <td>
                        <input type="number"  oninput="" step="0.00000001" class="form-control" id="par029b" name="par029b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par029'];} ?>>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>