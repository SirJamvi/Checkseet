<div class="table-responsive" id="fl18-ftbc">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
      <table class="table table-striped-columns" 
        >
        <thead align="center">
          <tr>
            <th colspan="19" scope="col"><?php echo nl2br("Inspection Tie Bar Cutting")?></th>
          </tr>
        </thead>
        <thead align="center">
          <tr>
            <th class="input-form" colspan="4" scope="col" >Quantity</th>
            <th class="input-form" rowspan="1" colspan="6">Item NG</th>
          </tr>
        
          <tr>            
            <th class="input-form">Input</th>
            <th class="input-form" >Output</th>
            <th class="input-form" >Reject</th>
            <th class="input-form">Yield</th>
            <th class="input-form">WIRETOUCH</th>
            <th class="input-form">AG MUCH</th>
            <th class="input-form">DUST</th>
            <th class="input-form">FRAME</th>
            <th class="input-form">RESIN CAP PEEL</th>
            <th class="input-form">OTHERS</th>
            <th class="input-form">Note</th>
          </tr>
        </thead>
        <tbody>
            <td>
              <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." ";} ?>>
            </td>
            <td>
              <input type="number"   oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
            </td>
            <td>
              <input type="number" step="1"class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
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
            <td>
              <input type="number" step="0.01" class="form-control" id="par022" name="par022" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
            </td>

            <td>
              <input type="text" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?> >
            </td>
        </tbody>
    </table>
</div>