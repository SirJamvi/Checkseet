<div class="table-responsive" id="sl56-f-fldb2">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
<input type="hidden" id="cnt-proses" name="cnt-proses" value=4>
  <table class="table table-striped-columns" <?php $selected_device = filter_input(INPUT_POST, 'device',	FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY
    ); if ($selected_device === "sl56"){echo "";}else{echo "";}; ?>
    >
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("LD DIE BONDING 2 MACHINE")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <!-- <th rowspan="2" >Alasan Inspeksi</th>
        <th colspan="4" scope="col" >Visual & Peel Test Check *</th> -->
        <th class="input-form" rowspan="3" >Measure Die Bond Pos</th>
        <th class="input-form" colspan="16" >Foregoing Check Sample No. <br> (2 pcs/head/shift)</th>
        <th class="input-form" rowspan="3" >Judge</th>
        <th class="input-form" colspan="6">Change Bonding Offset Parameter</th>
      </tr>
      <tr>
        <th class="input-form" colspan="2">Stage 1</th>
        <th class="input-form" colspan="2">Stage 2</th>
        <th class="input-form" colspan="2">Stage 3</th>
        <th class="input-form" colspan="2">Stage 4</th>
        <th class="input-form" colspan="2">Stage 5</th>
        <th class="input-form" colspan="2">Stage 6</th>
        <th class="input-form" colspan="2">Stage 7</th>
        <th class="input-form" colspan="2">Stage 8</th>
        <th class="input-form" colspan="2">X</th>
        <th class="input-form" colspan="2">Y</th>
        <th class="input-form" colspan="2">θ</th>
      </tr>
      <tr>
        <th class="input-form" >1</th>
        <th class="input-form" >2</th>
        <th class="input-form" >1</th>
        <th class="input-form" >2</th>
        <th class="input-form" >1</th>
        <th class="input-form" >2</th>
        <th class="input-form" >1</th>
        <th class="input-form" >2</th>

        <th class="input-form" >1</th>
        <th class="input-form" >2</th>
        <th class="input-form" >1</th>
        <th class="input-form" >2</th>
        <th class="input-form" >1</th>
        <th class="input-form" >2</th>
        <th class="input-form" >1</th>
        <th class="input-form" >2</th>

        <th class="input-form" >From</th>
        <th class="input-form" >To</th>
        <th class="input-form" >From</th>
        <th class="input-form" >To</th>
        <th class="input-form" >From</th>
        <th class="input-form" >To</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <th scope="row">X</th>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par001a" name="par001a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par002a" name="par002a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par003a" name="par003a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par004a" name="par004a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par005a" name="par005a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par006a" name="par006a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par007a" name="par007a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par008a" name="par008a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par009a" name="par009a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par010a" name="par010a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par011a" name="par011a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par012a" name="par012a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par013a" name="par013a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par014a" name="par014a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par015a" name="par015a" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par016a" name="par016a" >
          </td>

          <td >
            <select class="form-select" id="par017a" name="par017a">
                <option value="-">-</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
            </select>
          </td>
          
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par018a" name="par018a" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par019a" name="par019a" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par020a" name="par020a" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par021a" name="par021a" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par022a" name="par022a" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par023a" name="par023a" >
          </td>
        </tr>
        <tr>
          <th scope="row">Y</th>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par001b" name="par001b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par002b" name="par002b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par003b" name="par003b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par004b" name="par004b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par005b" name="par005b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par006b" name="par006b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par007b" name="par007b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par008b" name="par008b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par009b" name="par009b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par010b" name="par010b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par011b" name="par011b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par012b" name="par012b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par013b" name="par013b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par014b" name="par014b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par015b" name="par015b" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par016b" name="par016b" >
          </td>

          <td >
            <select class="form-select" id="par017b" name="par017b">
                <option value="-">-</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
            </select>
          </td>
         
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par018b" name="par018b" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par019b" name="par019b" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par020b" name="par020b" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par021b" name="par021b" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par022b" name="par022b" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par023b" name="par023b" >
          </td>

        </tr>
        <tr>
          <th scope="row">Z</th>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par001c" name="par001c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par002c" name="par002c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par003c" name="par003c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par004c" name="par004c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par005c" name="par005c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par006c" name="par006c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par007c" name="par007c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par008c" name="par008c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par009c" name="par009c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par010c" name="par010c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par011c" name="par011c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par012c" name="par012c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par013c" name="par013c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par014c" name="par014c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par015c" name="par015c" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par016c" name="par016c" >
          </td>

          <td >
            <select class="form-select" id="par017c" name="par017c">
                <option value="-">-</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
            </select>
          </td>
         
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par018c" name="par018c" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par019c" name="par019c" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par020c" name="par020c" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par021c" name="par021c" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par022c" name="par022c" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par023c" name="par023c" >
          </td>

        </tr>
        <tr>
          <th scope="row">θ</th>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par001d" name="par001d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par002d" name="par002d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par003d" name="par003d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par004d" name="par004d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par005d" name="par005d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par006d" name="par006d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par007d" name="par007d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par008d" name="par008d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par009d" name="par009d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par010d" name="par010d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par011d" name="par011d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par012d" name="par012d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par013d" name="par013d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par014d" name="par014d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par015d" name="par015d" >
          </td>
          <td>
            <input type="number" step="0.00000001" class="form-control" id="par016d" name="par016d" >
          </td>

          <td >
            <select class="form-select" id="par017d" name="par017d">
                <option value="-">-</option>
                <option value="OK">OK</option>
                <option value="NG">NG</option>
            </select>
          </td>
          
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par018d" name="par018d" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par019d" name="par019d" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par020d" name="par020d" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par021d" name="par021d" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par022d" name="par022d" >
          </td>
          <td >
            <input type="number" step="0.00000001" class="form-control" id="par023d" name="par023d" >
          </td>
        </tr>       
    </tbody>
  </table>
</div>