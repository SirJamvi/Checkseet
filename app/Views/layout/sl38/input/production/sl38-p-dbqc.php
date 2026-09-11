<div class="table-responsive" id="sl38-p-dbqc">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" >
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("INSPECTION PIN D/B CONTROL")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th class="input-form" colspan="4" scope="col" >Quantity</th>
            <th class="input-form" colspan="15" scope="col" >Reject Item</th>
        </tr>
        <tr>
            <th class="input-form" >Input</th>
            <th class="input-form" >Output</th>
            <th class="input-form" >Reject</th>
            <th class="input-form" >Yield</th>
            <th class="input-form" >PD Lack</th>
            <th class="input-form" >PD Dirt</th>
            <th class="input-form" >BadMark</th>
            <th class="input-form" >PD Ag Few</th>
            <th class="input-form" >PD Ag Much</th>
            <th class="input-form" >PD Float</th>
            <th class="input-form" >PD Y Diff</th>
            <th class="input-form" >PD Nothing</th>
            <th class="input-form" >Missing</th>
            <th class="input-form" >PD Slant</th>
            <th class="input-form" >Only Paste</th>
            <th class="input-form" >No Paste</th>
            <th class="input-form" >OTHER</th>
            <th class="input-form" >Lead Bend</th>
            <th class="input-form" >Ag Adhesion</th>
        </tr>
    </thead>
    <tbody>
        <td>
          <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." readonly";} ?>>
        </td>
        <td>
          <input type="number"  oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup="quantityChange1()" onchange="quantityChange1()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
          <td>
          <input type="number" step="1"class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?> readonly>
        </td>
        <td>
          <input type="number" step="0.01" class="form-control" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?> readonly>
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
        <td>
          <input type="number" step="0.00000001"class="form-control" id="par023" name="par023" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
        </td>
        <td>
          <input type="number" step="0.00000001"class="form-control" id="par024" name="par024" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
        </td>
        <td>
          <input type="number" step="0.00000001"class="form-control" id="par025" name="par025" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
        </td>
        <td>
          <input type="number" step="0.00000001"class="form-control" id="par026" name="par026" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
        </td>
        <td>
          <input type="number" step="0.00000001"class="form-control" id="par027" name="par027" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
        </td>
        <td>
          <input type="number" step="0.00000001"class="form-control" id="par028" name="par028" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
        </td>
        <td>
          <input type="number" step="0.00000001"class="form-control" id="par029" name="par029" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par029'];} ?>>
        </td>
        <td>
          <input type="number" step="0.00000001"class="form-control" id="par030" name="par030" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par030'];} ?>>
        </td>
        <td>
          <input type="number" step="0.00000001"class="form-control" id="par031" name="par031" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par031'];} ?>>
        </td>
    </tbody>
    </table>
</div>