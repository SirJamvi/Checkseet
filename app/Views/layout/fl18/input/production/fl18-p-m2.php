<div class="table-responsive" id="sl38-p-m">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" >
    <thead align="center">
        <tr>
            <th colspan="5" scope="col"><?php echo nl2br("PRODUCTION PROCESS CONTROL SHEET AG PASTE HARDENING")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th class="input-form" colspan="4" scope="col" >Quantity</th>
            <th class="input-form" colspan="2" scope="col" >Marking Item</th>
            <th class="input-form" colspan="6" scope="col" >Foregoing Insepction (OK,NG)</th>
        </tr>
        <tr>
            <th class="input-form" rowspan="2"> Input</th>
            <th class="input-form" rowspan="2">Output</th>
            <th class="input-form" rowspan="2">Reject</th>
            <th class="input-form" rowspan="2">Yield (%)</th>
            <th class="input-form" rowspan="2">Model Code</th>
            <th class="input-form" rowspan="2">Factory (SSI)</th>
            <th class="input-form" colspan="3">Visual check 1 frame/lot</th>
            <th class="input-form" colspan="3">Vic Inspection sampling 1frame/lot</th>
        </tr>
        <tr>
            <th class="input-form" >Pecah</th>
            <th class="input-form" >Tipis & Pecah</th>
            <th class="input-form" >Bentuk</th>
            <th class="input-form" >Pecah</th>
            <th class="input-form" >Tipis & Pecah</th>
            <th class="input-form" >Bentuk</th>
        </tr>
    </thead>
    <tbody>
        <td >
            <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." readonly";} ?>>
        </td>
        <td >
            <input type="number"   oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
        <td >
            <input type="number" step="1"class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
        </td>
        <td >
            <input type="number" step="0.01" class="form-control" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?> readonly>
        </td>
        <td >
            <input type="text" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002']." ";} ?>>
        </td>
        <td >
            <input type="text" class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003']." ";} ?>>
        </td>
        <td>
            <input type="number" step="0.00000001"class="form-control" id="par017" name="par017" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td>
        <td>
            <input type="number" step="0.00000001"class="form-control" id="par018" name="par018" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
        </td>
        <td>
            <input type="number" step="0.00000001"class="form-control" id="par019" name="par019" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
        </td>
        <td>
            <input type="number" step="0.00000001"class="form-control" id="par020" name="par020" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
        </td>
        <td>
            <input type="number" step="0.00000001"class="form-control" id="par021" name="par021" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
        </td>
        <td>
            <input type="number" step="0.00000001"class="form-control" id="par022" name="par022" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
        </td>
    </tbody>
    </table>
</div>