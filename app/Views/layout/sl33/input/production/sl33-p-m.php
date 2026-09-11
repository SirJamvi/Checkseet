<div class="table-responsive" id="slpag">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th colspan="29" scope="col"><?php echo nl2br("PRODUCTION PROCESS CONTROL SHEET MARKING")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" colspan="4" scope="col" >Quantity</th>
        <th class="input-form" colspan="3" scope="col" >Marking Item</th>
        <th class="input-form" colspan="6" scope="col" >Foregoing Inspection</th>
      </tr>
      <tr>
        <th class="input-form" rowspan="2" >Input</th>
        <th class="input-form" rowspan="2" >Output</th>
        <th class="input-form" rowspan="2" >Reject</th>
        <th class="input-form" rowspan="2" >Yield (%)</th>
        <th class="input-form" rowspan="2" >ID No by model</th>
        <th class="input-form" rowspan="2" >ID No by user</th>
        <th class="input-form" rowspan="2" >SSI (9)</th>
        <th class="input-form" colspan="3">Visual check 5 pcs/lot</th>
        <th class="input-form" colspan="3">Visual sampling inspection 20 pcs</th>
      </tr>
      <tr>
        <th class="input-form" scope="col">Pecah</th>
        <th class="input-form" scope="col">Tipis dan Pecah</th>
        <th class="input-form" scope="col">Bentuk</th>
        <th class="input-form" scope="col">Pecah</th>
        <th class="input-form" scope="col">Tipis</th>
        <th class="input-form" scope="col">Bentuk</th>
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
        <td >
          <input type="text" step="1" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002']." ";} ?>>
        </td>
        <td >
          <input type="text" step="1" class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
        <td >
          <input type="text" step="1" class="form-control" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004']." ";} ?>>
        </td>
        <td >
          <input type="text" step="1" class="form-control" id="par017" name="par017" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td>
        <td >
          <input type="text" step="1" class="form-control" id="par018" name="par018" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018']." ";} ?>>
        </td>
        <td >
          <input type="text" step="1" class="form-control" id="par019" name="par019" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td>
        <td >
          <input type="text" step="1" class="form-control" id="par020" name="par020" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020']." ";} ?>>
        </td>
        <td >
          <input type="text" step="1" class="form-control" id="par021" name="par021" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
        </td>
        <td >
          <input type="text" step="1" class="form-control" id="par022" name="par022" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
        </td>

    </tbody>
  </table>
</div>