<div class="table-responsive" id="sl38-p-bi">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("LEAK TESTING")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" colspan="3" scope="col">Quantity</th>
        <th class="input-form" rowspan="2" scope="col">Yield (%)</th>
        <th class="input-form" colspan="3" scope="col">Item NG</th>
        <th class="input-form" rowspan="2" scope="col">Remark</th>
      </tr>
    
      <tr>
        <th class="input-form" scope="col">Input</th>
        <th class="input-form" scope="col">Output</th>      
        <th class="input-form" scope="col">NG</th>
        <th class="input-form" scope="col">Gross</th>
        <th class="input-form" scope="col">Leak</th>     
        <th class="input-form" scope="col">Other</th> 
      </tr>
    </thead>
    <tbody>
        <td rowspan="1" >
          <input type="number" step="0.00000001" class="form-control" id="par013" name="par013" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." readonly";} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.00000001" class="form-control" id="par014" name="par014" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
        <td rowspan="1" >
            <input type="number" step="0.01" class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
        </td>
        <td rowspan="1">
          <input type="number" step="0.01" class="form-control" id="par016" name="par016" readonly <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.00001" class="form-control" id="par017" name="par017" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.00000001" class="form-control" id="par018" name="par018" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="number" step="0.00000001" class="form-control" id="par019" name="par019" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td>
        <td rowspan="1" >
          <input type="text" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
    </tbody>
  </table>
</div>