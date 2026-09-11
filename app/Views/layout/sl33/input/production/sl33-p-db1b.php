<div class="table-responsive text-nowrap" id="sldb1">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="2">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("LD DIE BONDING 1 MACHINE (GH06510F4A, GH06510F4AK & GH07P28F4C) PAGE 1")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" colspan="6" scope="col">Foregoing Result (20 pcs/lot)</th>
        <th class="input-form" colspan="3" scope="col">Quantity</th>
        <th class="input-form" rowspan="3" >Yield (%)</th>
      </tr>
      <tr>
        <th class="input-form" colspan="2">SM Chip</th>
        <th class="input-form" colspan="4">LD Chip</th>
        <th class="input-form" rowspan="2">Input</th>
        <th class="input-form" rowspan="2">Output</th>
        <th class="input-form" rowspan="2">NG</th>
      </tr>
      <tr>      
        <th class="input-form" >Crack</th>
        <th class="input-form" >Chipping</th>
        <th class="input-form" >LD position</th>
        <th class="input-form" >Miss LD Chip</th>
        <th class="input-form" >Crack</th>
        <th class="input-form" >Chipping</th>
      </tr>
    </thead>
    <thead align="center">
    </thead>
    <tbody>
        <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par027" name="par027" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par028" name="par028" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
        </td>
          <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par029" name="par029" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par029'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par030" name="par030" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par030'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par031" name="par031" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par031'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par032" name="par032"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par032'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number"  oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.01" class="form-control" id="par015" name="par015"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.01" class="form-control" id="par016" name="par016"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
        </td>
    </tbody>
  </table>

  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th class="input-form" colspan="10" scope="col">Reject Item</th>
      </tr>
      <tr>
        <th class="input-form" rowspan="2">LD X Diff</th>  
        <th class="input-form" rowspan="2">LD Y Diff</th>
        <th class="input-form" rowspan="2">LD Slant</th>
        <th class="input-form" rowspan="2">LD Crack</th>
        <th class="input-form" rowspan="2">LD Chipping</th>
        <th class="input-form" rowspan="2">LD Scratch</th>
        <th class="input-form" rowspan="2">LD Dirt</th>
        <th class="input-form" rowspan="2">LD Nothing</th>
        <th class="input-form" rowspan="2">AuSn NG</th>
        <th class="input-form" rowspan="2">Others</th>
      </tr>
    </thead>
    <tbody>
        <td rowspan="1" >
          <input type="number"  oninput="" step="1" class="form-control" id="par033" name="par033" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par033'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number"  oninput="" step="1" class="form-control" id="par034" name="par034" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par034'];} ?>>
        </td>
          <td rowspan="1" >
          <input type="number"  oninput="" step="1" class="form-control" id="par035" name="par035" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par035'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number"  oninput="" step="1" class="form-control" id="par036" name="par036" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par036'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number"  oninput="" step="1" class="form-control" id="par037" name="par037" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par037'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number"  oninput="" step="1" class="form-control" id="par038" name="par038"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par038'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number"  oninput="" step="1" class="form-control" id="par039" name="par039"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par039'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number"  oninput="" step="1" class="form-control" id="par040" name="par040"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par040'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number"  oninput="" step="1" class="form-control" id="par041" name="par041"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par041'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number"  oninput="" step="1" class="form-control" id="par042" name="par042"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par042'];} ?>>
        </td>
      </tbody>
  </table>

  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th class="input-form" colspan="3" >Back side <br> standard:80% area good colour</th>
        <th class="input-form" colspan="3" >Die Share</th>
        <th class="input-form" colspan="2" >LD Collet Pick Up Record</th>
        <th class="input-form" rowspan="3" >Remark</th>
      </tr>
      <tr>
        <th class="input-form" rowspan="2">Sample 1</th>
        <th class="input-form" rowspan="2">Sample 2</th>
        <th class="input-form" rowspan="2">Sample 3</th>
        <th class="input-form" rowspan="2">Sample 1</th>
        <th class="input-form" rowspan="2">Sample 2</th>
        <th class="input-form" rowspan="2">Sample 3</th>
        <th class="input-form" rowspan="2">Total Counter</th>
        <th class="input-form" rowspan="2">Total Collet Pick Up</th>
      </tr>
    </thead>
    <tbody>
        <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par017" name="par017" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par018" name="par018" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td>
          <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par019" name="par019" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par020" name="par020" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par021" name="par021" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par022" name="par022"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par023" name="par023"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par024" name="par024"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.0000001" class="form-control" id="par002" name="par002"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
      </tbody>
  </table>
</div>