<div class="table-responsive" id="sl90-p-wbqc">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="2">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="26" scope="col"><?php echo nl2br("INSPECTION WIRE BONDING CONTROL CHECK SHEET\n (Single Laser 9.0)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th class="input-form" rowspan="3" >Machine WB</th>
            <th class="input-form" colspan="4" scope="col" >Quantity</th>
            <th class="input-form" colspan="15" scope="col" >Reject Item</th>
            <th class="input-form" colspan="5" scope="col" >Others</th>
            <th class="input-form" rowspan="3" >Note </th>
        </tr>
        <tr>
            <th class="input-form" rowspan="2" >Input</th>
            <th class="input-form" rowspan="2" >Output</th>
            <th class="input-form" rowspan="2" >Reject</th>
            <th class="input-form" rowspan="2" >Yield</th>
            <th class="input-form" >GD 1st Diff</th>
            <th class="input-form" >GD 2nd Diff</th>
            <th class="input-form" >GD 2nd Miss</th>
            <th class="input-form" >GD Loop NG</th>
            <th class="input-form" >GD No Wire</th>
            <th class="input-form" >LD 1st Diff</th>
            <th class="input-form" >LD 2nd Diff</th>
            <th class="input-form" >LD 1st Miss</th>
            <th class="input-form" >LD 2nd Miss</th>
            <th class="input-form" >LD Loop NG</th>
            <th class="input-form" >PD 2nd Diff</th>
            <th class="input-form" >PD 1st Diff</th>
            <th class="input-form" >PD Lack</th>
            <th class="input-form" >PD Peel</th>
            <th class="input-form" >PD No Wire</th>
            <th class="input-form" >Sic Float</th>
            <th class="input-form" >Diameter G Ball</th>
            <th class="input-form" >2nd Bond Pos</th>
            <th class="input-form" >Loop Shape</th>
            <th class="input-form" >PD Dirt</th>
        </tr>
        <tr>
            <th class="input-form" scope="col">W Det Miss</th>
            <th class="input-form" scope="col">LD Lack</th>
            <th class="input-form" scope="col">LD Dirt</th>
            <th class="input-form" scope="col">LD Peel</th>
            <th class="input-form" scope="col">Sic Peel</th>
            <th class="input-form" scope="col">Stem NG</th>
            <th class="input-form" scope="col">Wire Touch</th>
            <th class="input-form" scope="col">Pull Test</th>
            <th class="input-form" scope="col">A Failure</th>
            <th class="input-form" scope="col">B Point NG</th>
            <th class="input-form" scope="col">Gold Thick</th>
            <th class="input-form" scope="col">Pos. Gold</th>
            <th class="input-form" scope="col">Sic Float</th>
            <th class="input-form" scope="col">LD No Wire</th>
            <th class="input-form" scope="col">Tail NG</th>
            <th class="input-form" scope="col">LD Float</th>
            <th class="input-form" scope="col">Sic Crack</th>
            <th class="input-form" scope="col">PD Loop NG</th>
            <th class="input-form" scope="col">GD 1st Miss</th>
            <th class="input-form" scope="col">Others</th>
        </tr>
    </thead>
    <tbody>
        <td rowspan="2" >
            <input type="text" step="1" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
        <td rowspan="2" >
            <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." readonly";} ?>>
        </td>
        <td rowspan="2" >
            <input type="number"  oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
            <td rowspan="2" >
            <input type="number" step="1"class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
        </td>
        <td rowspan="2" >
            <input type="number" step="0.01" class="form-control" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?> readonly>
        </td>
        <td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par017a" name="par017a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par017b" name="par017b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par017'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par018a" name="par018a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par018b" name="par018b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par018'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par019a" name="par019a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par019b" name="par019b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par019'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par020a" name="par020a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par020b" name="par020b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par020'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par021a" name="par021a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par021b" name="par021b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par021'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par022a" name="par022a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par022b" name="par022b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par022'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par023a" name="par023a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par023b" name="par023b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par023'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par024a" name="par024a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par024b" name="par024b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par024'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par025a" name="par025a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par025b" name="par025b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par025'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par026a" name="par026a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par026b" name="par026b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par026'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par027a" name="par027a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par027b" name="par027b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par027'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par028a" name="par028a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par028b" name="par028b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par028'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par029a" name="par029a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par029'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par029b" name="par029b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par029'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par030a" name="par030a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par030'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par030b" name="par030b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par030'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par031a" name="par031a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par031'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par031b" name="par031b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par031'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par032a" name="par032a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par032'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par032b" name="par032b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par032'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par033a" name="par033a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par033'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par033b" name="par033b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par033'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par034a" name="par034a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par034'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par034b" name="par034b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par034'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par004a" name="par004a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par004b" name="par004b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par004'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par005a" name="par005a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par005b" name="par005b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par005'];} ?>>
        </td>
        <td rowspan="2">Total Others:
            <input type="text" class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
    </tbody>
    </table>
</div>