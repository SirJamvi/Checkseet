<div class="table-responsive" id="slcsm">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th colspan="30" scope="col"><?php echo nl2br("STEM SET A & LEAD CORRECTION")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" rowspan="3" >Stem Lot No</th>
        <th class="input-form" colspan="4" rowspan="2" scope="col" >Quantity</th>
        <th class="input-form" colspan="2">Foregoing Result</th>
        <th class="input-form" colspan="3" rowspan="2">Stem NG Item</th>
        <th class="input-form" rowspan="3" >Note</th>
      </tr>
    
      <tr>
        <th class="input-form" colspan="2">20 pcs / 2000 pcs</th>
      </tr>
      <tr>
        <th class="input-form">In</th>
        <th class="input-form">Out</th>
        <th class="input-form">NG</th>
        <th class="input-form">Yield</th>
        <th class="input-form">Qty Insp.</th>
        <th class="input-form">Qty NG</th>
        <th class="input-form">Scratch</th>
        <th class="input-form">Dirt</th>
        <th class="input-form">Direction</th>
      </tr>
    </thead>
    <tbody>
        <td>
          <input type="text"  oninput="" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
        <td>
          <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
        </td>
        <td>
          <input type="number"  oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
        </td>
        <td>
          <input type="number" step="0.01" class="form-control" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?> readonly>
        </td>
        <td>
          <input type="number" step="0.01" class="form-control" id="par017" name="par017" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td>
        <td>
          <input type="number" step="0.01" class="form-control" id="par018" name="par018" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td>
        <td>
          <input type="number" step="0.01" class="form-control" id="par019" name="par019" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td>
        <td>
          <input type="number" step="0.01" class="form-control" id="par020" name="par020" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
        </td>
        <td>
          <input type="number" step="0.01" class="form-control" id="par021" name="par021" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" step="1" class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
    </tbody>
  </table>
</div>