<div class="table-responsive" id="sl33-p-vi2">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th colspan="7" scope="col"><?php echo nl2br("PRODUCTION CONTROL SHEET VISUAL INSPECTION 2\n (Khusus GH06510F4A)")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" colspan="4" scope="col" >Quantity</th>
        <th class="input-form" colspan="3" scope="col" >Reject Item</th>
      </tr>
      <tr>
        <th class="input-form" >Input</th>
        <th class="input-form" >Output</th>
        <th class="input-form" >Reject</th>
        <th class="input-form" >Yield (%)</th>
        <th class="input-form" >Glass crack</th>
        <th class="input-form" >Glass Scratch</th>
        <th class="input-form" >Others</th>
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
          <input type="number" step="1" class="form-control" id="par017" name="par017" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td>
        <td >
          <input type="number" step="1" class="form-control" id="par018" name="par018" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td>
        <td >
          <input type="number" step="1" class="form-control" id="par019" name="par019" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td>
    </tbody>
  </table>
</div>