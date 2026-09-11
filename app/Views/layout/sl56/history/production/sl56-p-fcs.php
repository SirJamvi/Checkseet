<div class="table-responsive mt-3" id="sl56-p-fcs">
<?= csrf_field(); ?>
  <table class="table table-bordered table-hover" <?php $selected_device = filter_input(INPUT_POST, 'device',	FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY
    ); if ($selected_device === "sl56"){echo "";}else{echo "";}; ?>
    id="slfcs">
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("FOREGOING CAP SEAL")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th rowspan="2" >No.</th>
        <th rowspan="2" >Operator Start</th>         
        <th rowspan="2" >Shift/Group </th>
        <th rowspan="2" >Operator Finish</th>         
        <th rowspan="2" >Shift/Group </th>
        <th rowspan="2" >Mch. No.</th>         
        <th rowspan="2" >Model</th>
        <th rowspan="2" >Lot No.</th> 
        <th rowspan="2" >Date (dd/mm/yyyy)</th>
        <th rowspan="2" >Alasan Inspeksi</th>
        <th colspan="4" scope="col" >Visual & Peel Test Check *</th>
        <th colspan="5" scope="col" >Off Center & Stem Check</th>
        <th rowspan="2" >1st Lot Production Use</th>
        <th rowspan="2" >Notes</th>
      </tr>
      <tr>
        <th >ST1</th>
        <th >ST2</th>
        <th >ST3</th>
        <th >ST4</th>
        <th >Tipe</th>
        <th >ST1</th>
        <th >ST2</th>
        <th >ST3</th>
        <th >ST4</th>
      </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
            <?php foreach($alldata as $c): ?>
            <tr>
              <td rowspan="4" ><?= $i+1; ?></td>
              <th rowspan="4" >No.</th>
              <th rowspan="4" >Operator Start</th>         
              <th rowspan="4" >Shift/Group </th>
              <th rowspan="4" >Operator Finish</th>         
              <th rowspan="4" >Shift/Group </th>
              <th rowspan="4" >Mch. No.</th>         
              <th rowspan="4" >Model</th>
              <th rowspan="4" >Lot No.</th> 
              <th rowspan="4" >Date (dd/mm/yyyy)</th>
              <td rowspan="4" ><?= (string)$c['par002']; ?></td>
              <td rowspan="4" ><?= (string)$c['par035']; ?></td>
              <td rowspan="4" ><?= (string)$c['par036']; ?></td>
              <td rowspan="4" ><?= (string)$c['par037']; ?></td>
              <td rowspan="4" ><?= (string)$c['par038']; ?></td>
              <td rowspan="1" ><b>X.</b></td>
              <td rowspan="1" ><?= (string)$c['par013']; ?></td>
              <td rowspan="1" ><?= (string)$c['par017']; ?></td>
              <td rowspan="1" ><?= (string)$c['par021']; ?></td>
              <td rowspan="1" ><?= (string)$c['par025']; ?></td>
              <td rowspan="4" ><?= (string)$c['par003']; ?></td>
              <td rowspan="4" ><?= (string)$c['par004']; ?></td>
            </tr>

            <tr>
              <td rowspan="1" ><b>Y.</b></td>
              <td rowspan="1" ><?= (string)$c['par014']; ?></td>
              <td rowspan="1" ><?= (string)$c['par018']; ?></td>
              <td rowspan="1" ><?= (string)$c['par022']; ?></td>
              <td rowspan="1" ><?= (string)$c['par026']; ?></td>
            </tr>

            <tr>
              <td rowspan="1" ><b>r.</b></td>
              <td rowspan="1" ><?= (string)$c['par015']; ?></td>
              <td rowspan="1" ><?= (string)$c['par019']; ?></td>
              <td rowspan="1" ><?= (string)$c['par023']; ?></td>
              <td rowspan="1" ><?= (string)$c['par027']; ?></td>
            </tr>

            <tr>
              <td rowspan="1" ><b>s.</b></td>
              <td rowspan="1" ><?= (string)$c['par016']; ?></td>
              <td rowspan="1" ><?= (string)$c['par020']; ?></td>
              <td rowspan="1" ><?= (string)$c['par024']; ?></td>
              <td rowspan="1" ><?= (string)$c['par028']; ?></td>
            </tr>
            <?php endforeach; ?>
    </tbody>
  </table>
</div>