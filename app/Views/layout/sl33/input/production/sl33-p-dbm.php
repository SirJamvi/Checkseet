<div class="table-responsive text-nowrap" id="sl33-p-dbm">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="4">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("PRODUCTION PROCESS CONTROL SHEET LD DIE BONDING 2 AUTO MACHINE")?></th>
      </tr>
    </thead>
    <thead align="center">
        <tr>
            <th class="input-form" colspan="3" scope="col">Quantity</th>
            <th class="input-form" rowspan="3" >Yield (%)</th>
            <th class="input-form" rowspan="3" >Head No.</th>
            <th class="input-form" colspan="6" scope="col">Foregoing Result (5 pcs/head/lot) <br> (OK: V, NG: X)</th>
        </tr>
        <tr>
            <th class="input-form" rowspan="2">Input</th>
            <th class="input-form" rowspan="2">Output</th>
            <th class="input-form" rowspan="2">NG</th>
            <th class="input-form" colspan="2">SM Chip</th>
            <th class="input-form" colspan="4">LD Chip</th>
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
        <tr>
          <td rowspan="8" >
            <input type="number"  oninput="" step="1" class="form-control" id="par013" name="par013" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
          <td rowspan="8" >
            <input type="number"  oninput="" step="1" class="form-control" id="par014" name="par014" onkeyup=quantityChange1() onchange=quantityChange1() <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
          </td>
          <td rowspan="8" >
            <input type="number" step="0.01" class="form-control" id="par015" name="par015"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
          </td>
          <td rowspan="8" >
            <input type="number" step="0.01" class="form-control" id="par016" name="par016"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
          </td>
          <td>1</td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par002" name="par002"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par003" name="par003"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par004" name="par004"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par005" name="par005"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par006" name="par006"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par007" name="par007"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>
        <tr>
          <td >2</td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par035" name="par035"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par035'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par036" name="par036"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par036'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par037" name="par037"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par037'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par038" name="par038"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par038'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par039" name="par039"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par039'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par040" name="par040"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par040'];} ?>>
          </td>
        </tr>
        <tr>
          <td >3</td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par002b" name="par002b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par002'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par003b" name="par003b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par003'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par004b" name="par004b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par004'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par005b" name="par005b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par005'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par006b" name="par006b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par006'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par007b" name="par007b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par007'];} ?>>
          </td>
        </tr>
        <tr>
          <td >4</td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par035b" name="par035b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par035'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par036b" name="par036b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par036'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par037b" name="par037b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par037'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par038b" name="par038b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par038'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par039b" name="par039b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par039'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par040b" name="par040b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par040'];} ?>>
          </td>
        </tr>
        <tr>
          <td >5</td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par002c" name="par002c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par002'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par003c" name="par003c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par003'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par004c" name="par004c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par004'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par005c" name="par005c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par005'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par006c" name="par006c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par006'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par007c" name="par007c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par007'];} ?>>
          </td>
        </tr>
        <tr>
          <td >6</td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par035c" name="par035c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par035'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par036c" name="par036c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par036'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par037c" name="par037c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par037'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par038c" name="par038c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par038'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par039c" name="par039c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par039'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par040c" name="par040c"  <?php if(isset($alldata)){echo 'value='.$alldata[2]['par040'];} ?>>
          </td>
        </tr>
        <tr>
          <td >7</td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par002d" name="par002d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par002'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par003d" name="par003d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par003'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par004d" name="par004d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par004'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par005d" name="par005d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par005'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par006d" name="par006d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par006'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par007d" name="par007d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par007'];} ?>>
          </td>
        </tr>
        <tr>
          <td >8</td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par035d" name="par035d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par035'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par036d" name="par036d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par036'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par037d" name="par037d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par037'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par038d" name="par038d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par038'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par039d" name="par039d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par039'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="text" step="0.01" class="form-control" id="par040d" name="par040d"  <?php if(isset($alldata)){echo 'value='.$alldata[3]['par040'];} ?>>
          </td>
        </tr>
    </tbody>
  </table>
</div>