<div class="table-responsive">
  <?= csrf_field(); ?>
  <input type="hidden" name="cnt-proses" value="2">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns">
    <thead align="center">
      <tr>
        <th colspan="23" scope="col"><?php echo nl2br("PRODUCTION PROCESS CONTROL DIE BONDING 2")?></th>
      </tr>
      <tr>
        <th class="input-form" rowspan="2" scope="col">WB No</th>
        <th class="input-form" colspan="4" scope="col">Quantity</th>
        <th class="input-form" colspan="31" scope="col">Reject Item</th>
        <th class="input-form" rowspan="2" scope="col">Note</th>
      </tr>
      <tr>
        <th class="input-form">Input</th>
        <th class="input-form">Output</th>
        <th class="input-form">Reject</th>
        <th class="input-form">Yield</th>

        <th class="input-form">GD1t Diff</th>
        <th class="input-form">GD2d Diff</th>
        <th class="input-form">GD2d Miss</th>
        <th class="input-form">GD Loop NG</th>
        <th class="input-form">GD No Wire</th>
        <th class="input-form">GD1t Miss</th>
        <th class="input-form">No GL2d GD</th>
        <th class="input-form">LD1t Diff</th>
        <th class="input-form">LD2d Diff</th>
        <th class="input-form">LD1t Miss</th>
        <th class="input-form">LD2d Miss</th>
        <th class="input-form">LD Loop NG</th>
        <th class="input-form">W Det Miss</th>
        <th class="input-form">@LD Lack</th>
        <th class="input-form">@LD Dirt</th>
        <th class="input-form">LD Peel</th>
        <th class="input-form">LD Scratch</th>
        <th class="input-form">LD Crack</th>
        <th class="input-form">Ag Few</th>
        <th class="input-form">Ag Much</th>
        <th class="input-form">Ag NG</th>
        <th class="input-form">Sic Slant</th>
        <th class="input-form">Sic Peel</th>
        <th class="input-form">Doublewire</th>
        <th class="input-form">Wire Touch</th>
        <th class="input-form">Wire Cut</th>
        <th class="input-form">A Failure</th>
        <th class="input-form">B Point NG</th>
        <th class="input-form">Gold Thick</th>
        <th class="input-form">Pos. Gold</th>
        <th class="input-form">Sic Float</th>
      
    </tr>
    </thead>

    <tbody>
      <tr>
        <td>
          <input type="text" step="1" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par013" name="par013" onchange="quantityChange1()" onkeyup="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
        </td>
        <td>
          <input type="number" step="0.001" class="form-control" id="par014" name="par014" onchange="quantityChange1()" onkeyup="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
        <td>
          <input type="number" step="0.01" class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
        </td>
        <td>
          <input type="number" step="0.01" class="form-control" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
        </td>

        <td>
          <input type="number" step="1" class="form-control" id="par017a" name="par017a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par018a" name="par018a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par019a" name="par019a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par020a" name="par020a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par021a" name="par021a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par022a" name="par022a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par023a" name="par023a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par024a" name="par024a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par025a" name="par025a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par026a" name="par026a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par027a" name="par027a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par028a" name="par028a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par029a" name="par029a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par029'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par030a" name="par030a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par030'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par031a" name="par031a" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par031'];} ?>>
        </td>

        <td>
          <input type="number" step="1" class="form-control" id="par017b" name="par017b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par017'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par018b" name="par018b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par018'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par019b" name="par019b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par019'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par020b" name="par020b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par020'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par021b" name="par021b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par021'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par022b" name="par022b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par022'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par023b" name="par023b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par023'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par024b" name="par024b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par024'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par025b" name="par025b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par025'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par026b" name="par026b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par026'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par027b" name="par027b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par027'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par028b" name="par028b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par028'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par029b" name="par029b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par029'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par030b" name="par030b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par030'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par031b" name="par031b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par031'];} ?>>
        </td>
        <td>
          <input type="number" step="1" class="form-control" id="par032b" name="par032b" <?php if(isset($alldata)){echo 'value='.$alldata[1]['par032'];} ?>>
        </td>
        <td>
          <input type="text" step="1" class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
    </tbody>
  </table>
</div>