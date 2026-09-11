<div class="table-responsive" id="sl33-p-vi1">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="2">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
            <th colspan="13" scope="col"><?php echo nl2br("PRODUCTION CONTROL SHEET VISUAL INSPECTION\n (Single Laser 3.3)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th class="input-form" colspan="4" scope="col" >Quantity</th>
            <th class="input-form" colspan="9" scope="col" >Reject Item</th>
        </tr>
        <tr>
            <th class="input-form" rowspan="2">Input</th>
            <th class="input-form" rowspan="2">Output</th>
            <th class="input-form" rowspan="2">Reject</th>
            <th class="input-form" rowspan="2">Yield (%)</th>
            <th class="input-form" >Dust</th>
            <th class="input-form" >Gold Wire</th>
            <th class="input-form" >LD Crack</th>
            <th class="input-form" >LD Dirt</th>
            <th class="input-form" >LD Chipping</th>
            <th class="input-form" >LD Position</th>
            <th class="input-form" >LD Peel Off</th>
            <th class="input-form" >Stem Scratch</th>
            <th class="input-form" >Stem Bari</th>
        </tr>
        <tr>
            <th class="input-form" >Stem NG</th>
            <th class="input-form" >Cap Bari</th>
            <th class="input-form" >Cap Crack</th>
            <th class="input-form" >Cap NG</th>
            <th class="input-form" >Marking NG</th>
            <th class="input-form" >Lead Bend</th>
            <th class="input-form" >Pin NG</th>
            <th class="input-form" >Others</th>
            <th class="input-form" ></th>
        </tr>
    </thead>
    <tbody>
        <td >
          <input type="number" step="1" class="form-control" id="par013" name="par013" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." ";} ?>>
        </td>
        <td >
          <input type="number" step="1" class="form-control" id="par014" name="par014" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
        <td >
          <input type="number" step="0.01" class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015']." ";} ?>>
        </td>
        <td >
          <input type="number" step="0.01" class="form-control" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
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
        </td>
    </tbody>
  </table>
</div>