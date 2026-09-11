<div class="table-responsive text-nowrap" id="sl33-p-db1a">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="4">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("LD DIE BONDING 1 MACHINE (GH07P28F4C2) PAGE 1")?></th>
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
          <input type="number" step="0.000001" class="form-control" id="par017" name="par017" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par018" name="par018" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td>
          <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par019" name="par019" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par020" name="par020" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par021" name="par021" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par022" name="par022"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number"  oninput="" class="form-control" id="par013" name="par013" onkeyup=quantityChange1() onchange=quantityChange1()  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number"  oninput="" class="form-control" id="par014" name="par014" onkeyup=quantityChange1() onchange=quantityChange1()  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
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
        <th class="input-form" colspan="2" >LD Collet Pick Up Record</th>
        <th class="input-form" rowspan="2" >Remark</th>
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
        <th class="input-form" rowspan="2">Total Counter</th>
        <th class="input-form" rowspan="2">Total Collet Pick Up</th>
      </tr>
    </thead>
    <tbody>
        <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par023" name="par023" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par024" name="par024" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
        </td>
          <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par025" name="par025" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par026" name="par026" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par027" name="par027" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par028" name="par028"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par029" name="par029"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par029'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par030" name="par030"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par030'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par031" name="par031"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par031'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.000001" class="form-control" id="par032" name="par032"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par032'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" step="1" class="form-control" id="par002" name="par002"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" step="1" class="form-control" id="par003" name="par003"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" step="1" class="form-control" id="par004" name="par004"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
        </td>
      </tbody>
  </table>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th class="input-form" >Sample</th>
        <th class="input-form" >Point 1</th>
        <th class="input-form" >Point 2</th>
        <th class="input-form" >Point 3</th>
      </tr>
    </thead>
    <tbody>
    </tr>
        <td rowspan="1" >
          <input type="text" class="form-control" id="par033a" name="par033a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par033'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" class="form-control" id="par034a" name="par034a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par034'];} ?>>
        </td>
          <td rowspan="1" >
          <input type="text" class="form-control" id="par035a" name="par035a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par035'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" class="form-control" id="par036a" name="par036a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par036'];} ?>>
        </td>
    </tr>

    <tr>
    <td rowspan="1" >
          <input type="text" class="form-control" id="par033b" name="par033b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par033'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" class="form-control" id="par034b" name="par034b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par034'];} ?>>
        </td>
          <td rowspan="1" >
          <input type="text" class="form-control" id="par035b" name="par035b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par035'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" class="form-control" id="par036b" name="par036b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par036'];} ?>>
        </td>
    </tr>

    <tr>
        <td rowspan="1" >
          <input type="text" class="form-control" id="par033c" name="par033c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par033'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" class="form-control" id="par034c" name="par034c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par034'];} ?>>
        </td>
          <td rowspan="1" >
          <input type="text" class="form-control" id="par035c" name="par035c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par035'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" class="form-control" id="par036c" name="par036c" <?php if(isset($alldata)){echo 'value='.$alldata[2]['par036'];} ?>>
        </td>
    </tr>

    <tr>
        <td rowspan="1" >
          <input type="text" class="form-control" id="par033d" name="par033d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par033'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" class="form-control" id="par034d" name="par034d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par034'];} ?>>
        </td>
          <td rowspan="1" >
          <input type="text" class="form-control" id="par035d" name="par035d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par035'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" class="form-control" id="par036d" name="par036d" <?php if(isset($alldata)){echo 'value='.$alldata[3]['par036'];} ?>>
        </td>
    </tr>
      
      </tbody>
  </table>
</div>