<div class="table-responsive" id="sllt">
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
        <th class="input-form" colspan="3" scope="col" >Quantity</th>
        <th class="input-form" rowspan="2" >Ket.</th>
        </tr>

        <tr>
        <th class="input-form" >Input</th>
        <th class="input-form" >Output</th>
        <th class="input-form" >NG</th>
        </tr>
    </thead>
    <tbody>
        </td>
            <td rowspan="2" >
            <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup="quantityChange4()" onchange="quantityChange4()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." readonly";} ?>>
        </td>
        </td>
            <td rowspan="2" >
            <input type="number"  oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup="quantityChange4()" onchange="quantityChange4()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
        </td>
            <td rowspan="2" >
            <input type="number" step="1" class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
        </td>
        </td>
            <td rowspan="2" >
            <input type="text" step="1" class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
    </tbody>
    </table>
</div>