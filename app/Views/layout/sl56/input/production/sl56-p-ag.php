<div class="table-responsive" id="slpag">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th colspan="5" scope="col"><?php echo nl2br("AG PASTE HARDENING")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th class="input-form" colspan="2" scope="col" >Quantity</th>
        <th class="input-form" colspan="2" scope="col" >Operator Name</th>
        <th class="input-form" colspan="3" scope="col" >Temperature</th>
        <!-- <th class="input-form" colspan="1" scope="col" >Time</th> -->
      </tr>
      <tr>
        <th class="input-form" rowspan="2" >Input</th>
        <th class="input-form" rowspan="2" >Output</th>
        <th class="input-form" rowspan="2" >Setting</th>
        <th class="input-form" rowspan="2" >At Input</th>
        <th class="input-form" rowspan="2" >At take Out</th>
        <!-- <th rowspan="2" >Input</th> -->
        <!-- <th colspan="1" scope="col" >At Take Out</th> -->
      </tr>
      <tr>
        <!-- <th scope="col">Plan</th> -->
        <!-- <th scope="col">Actual</th> -->
      </tr>
    </thead>
    <tbody>
        <td rowspan="2" >
          <input type="number" step="1" class="form-control" id="par013" name="par013" onkeyup="quantityChange3()" onchange="quantityChange3()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013']." readonly";} ?>>
        </td>
        <td rowspan="2" >
          <input type="number" step="1" class="form-control" id="par014" name="par014" onkeyup="quantityChange3()" onchange="quantityChange3()" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="number" step="0.00000001" class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="number" step="0.00000001" class="form-control" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
        </td>
        <td rowspan="2" >
          <input type="number" step="0.00000001" class="form-control" id="par017" name="par017" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
        </td>
        <!-- <td rowspan="2" >
          <input type="hidden" id="par010" name="par010" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          <input class="in_put" id="hh_2" type="number"  max="23" placeholder="00" onchange=changeTime() onkeyup=changeTime() <?php if(isset($alldata)){echo 'value='.substr($alldata[0]['par010'],0,2);} ?>> :
          <input class="in_put" id="mm_2" type="number"  max="59" placeholder="00" onchange=changeTime() onkeyup=changeTime() <?php if(isset($alldata)){echo 'value='.substr($alldata[0]['par010'],3,2);} ?>>
        </td> -->
        <!-- <td rowspan="2" >
          <input class="in_put" id="hh_3" type="number"  max="23" placeholder="00" > :
          <input class="in_put" id="mm_3" type="number"  max="59" placeholder="00" >
        </td> -->
    </tbody>
  </table>
</div>