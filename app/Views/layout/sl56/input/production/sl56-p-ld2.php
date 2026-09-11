<div class="table-responsive" id="slld2">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="2">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("LD D/B 2 CONTROL")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" colspan="4" scope="col" >Quantity</th>
        <th class="input-form" colspan="13" scope="col" >Reject Item</th>
      </tr>
    
      <tr>
        <th class="input-form"  rowspan="2">Input</th>
        <th class="input-form"  rowspan="2">Output</th>
        <th class="input-form"  rowspan="2">Reject</th>
        <th class="input-form"  rowspan="2">Yield</th>
        <th class="input-form"  >Sic <br> Slant</th>
        <th class="input-form"  >Sic X <br> Diff</th>
        <th class="input-form"  >Sic Y<br> Diff</th>
        <th class="input-form"  >Sic <br> Crack</th>
        <th class="input-form"  >Sic <br> Dirt</th>
        <th class="input-form"  >Sic <br> Nothing</th>
        <th class="input-form"  >LD X <br> Diff</th>
        <th class="input-form"  >LD Y <br> Diff</th>
        <th class="input-form"  >LD TH <br> Slant</th>
        <th class="input-form"  >LD Crack</th>
        <th class="input-form"  >LD Dirt</th>
        <th class="input-form"  >LD Nothing</th>
        <th class="input-form"  >Ag Much</th>
      </tr>
   
    <tr>
        <th class="input-form" scope="col">Ag Few</th>
        <th class="input-form" scope="col">Ag NG</th>
        <th class="input-form" scope="col">Pin NG</th>
        <th class="input-form" scope="col">Stem NG</th>
        <th class="input-form" scope="col">Sic Float</th>
        <th class="input-form" scope="col">Stem Discolour</th>
        <th class="input-form" scope="col">Only Paste</th>
        <th class="input-form" scope="col">No Paste</th>
        <th class="input-form" scope="col">Others</th>
        <th class="input-form" scope="col">Sampling</th>
        <th class="input-form" scope="col"></th>
        <th class="input-form" scope="col"></th>
        <th class="input-form" scope="col"></th>
    </tr>
    </thead>
    <tbody>
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
        </td>
    </tbody>
  </table>
</div>