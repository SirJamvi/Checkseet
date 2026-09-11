<div class="table-responsive" id="sl33-p-wbqc">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="2">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="25" scope="col"><?php echo nl2br("INSPECTION WIRE BONDING CONTROL CHECK SHEET\n (Single Laser 3.3)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th class="input-form" rowspan="4">Machine WB</th>
            <th class="input-form" colspan="4" scope="col" >Quantity</th>
            <th class="input-form" colspan="25" scope="col" >Reject Item</th>
        </tr>
        <tr>
            <th class="input-form" rowspan="3" >Input</th>
            <th class="input-form" rowspan="3" >Output</th>
            <th class="input-form" rowspan="3" >Reject</th>
            <th class="input-form" rowspan="3" >Yield</th>
            <th class="input-form" >GD 1st Diff</th>
            <th class="input-form" >GD 2nd Diff</th>
            <th class="input-form" >GD 2nd Miss</th>
            <th class="input-form" >GD Loop NG</th>
            <th class="input-form" >GD No Wire</th>
            <th class="input-form" >G. Ball <br> For 2nd <br> GND Diff</th>
            <th class="input-form" >No Gold <br> Ball For <br> 2nd GND</th>
            <th class="input-form" >LD 1st Diff</th>
            <th class="input-form" >LD 2nd Diff</th>
            <th class="input-form" >LD 1st Miss</th>
            <th class="input-form" >LD 2nd Miss</th>
            <th class="input-form" >LD Loop NG</th>
            <th class="input-form" >G. Ball <br> Pusher <br> Miss</th>
            <th class="input-form" >G. Ball <br> Pusher <br> 1st Diff</th>
            <th class="input-form" >G. Ball <br> Pusher <br> 2nd Diff</th>
            <th class="input-form" >W Det Miss</th>
            <th class="input-form" >LD Lack</th>
            <th class="input-form" >LD Dirt</th>
            <th class="input-form" >SM 1st Diff</th>
            <th class="input-form" >SM 2nd Diff</th>
            <th class="input-form" >SM 2nd Miss</th>
            <th class="input-form" >SM LooS NG</th>
            <th class="input-form" >SM No Wire</th>
            <th class="input-form" >G. Ball <br> For 2nd <br> SM Diff</th>
            <th class="input-form" >No Gold <br> Ball For <br> 2nd SM</th>
        </tr>

        <tr>
            <th class="input-form" rowspan="2">LD Peel</th>
            <th class="input-form" rowspan="2">Sic Peel</th>
            <th class="input-form" rowspan="2">Stem NG</th>
            <th class="input-form" rowspan="2">LD nothing</th>
            <th class="input-form" rowspan="2">Pull Test</th>
            <th class="input-form" rowspan="2">AG Paste NG</th>
            <th class="input-form" rowspan="2">B. Point NG</th>
            <th class="input-form" rowspan="2">Gold Thick</th>
            <th class="input-form" rowspan="2">Pos. Gold</th>
            <th class="input-form" rowspan="2">Tail NG</th>
            <th class="input-form" rowspan="2">PD 1st Diff</th>
            <th class="input-form" rowspan="2">PD 2nd Diff</th>
            <th class="input-form" rowspan="2">PD 2nd Miss</th>
            <th class="input-form" rowspan="2">PD Loop NG</th>
            <th class="input-form" rowspan="2">PD No Wire</th>
            <th class="input-form" rowspan="2">G. Ball <br> For 2nd <br> PD Diff</th>
            <th class="input-form" rowspan="2">No Gold <br> Ball For <br> 2nd PD</th>
            <th class="input-form" colspan="8">Others</th>
        </tr>

        <tr>
            <th class="input-form" >LD Chip Float</th>
            <th class="input-form" >Sic Float</th>
            <th class="input-form" >A Failure</th>
            <th class="input-form" >Diameter gold Ball</th>
            <th class="input-form" >2nd bond position</th>
            <th class="input-form" >2nd stich</th>
            <th class="input-form" >Loop Shape</th>
            <th class="input-form" >Others</th>
        </tr>
    </thead>
    <tbody>
        <td rowspan="2" >
            <input type="text" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
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
            <input type="number" step="0.00000001"class="form-control" id="par035a" name="par035a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par035'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par035b" name="par035b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par035'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par036a" name="par036a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par036'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par036b" name="par036b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par036'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par037a" name="par037a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par037'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par037b" name="par037b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par037'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par038a" name="par038a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par038'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par038b" name="par038b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par038'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par039a" name="par039a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par039'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par039b" name="par039b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par039'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par040a" name="par040a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par040'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par040b" name="par040b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par040'];} ?>>
        </td><td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par041a" name="par041a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par041'];} ?>>
        </td<td rowspan="2" >
            <input type="number" step="0.00000001"class="form-control" id="par041b" name="par041b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par041'];} ?>>
        </td>     
    </tbody>
    </table>
</div>