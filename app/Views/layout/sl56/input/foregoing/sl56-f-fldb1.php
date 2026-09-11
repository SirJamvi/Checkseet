<div class="table-responsive" id="sl56-f-fldb1">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-proses" name="cnt-proses" value=2>
  <table class="table table-striped-columns" >
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("FOREGOING LD DIE BONDING 1 MACHINE")?></th>
      </tr>
      <tr>
        <th class="input-form" colspan="5" rowspan="6" scope="col" >Measuring of die bonding position (2pcs/lot)</th>
        <th class="input-form">Die Bonding Strength (2pcs/lot)</th>
        <th class="input-form" colspan="2" scope="col">Kondisi Belakang I D chip (2pcs/lot)</th>
      </tr>
      <tr>
        <th class="input-form">Model GH07825/30D2K : ≥ 40g (0.4N)</th>
        <th class="input-form" colspan="2" scope="col">Model GH06P25A1CH 1pcs/lot</th>
      </tr>
      <tr>
        <th class="input-form">Model GH06P25series : ≥ 35g (0.35N)</th>
        <th class="input-form" colspan="2" rowspan="2" scope="col">Standard : 80% area good colour</th>
      </tr>
      <tr>
        <th class="input-form">Model GH0633series, GH06315series, GH06610A2KSeries : ≥ 50g (0.5N)</th>
      </tr>
      <tr>
        <th class="input-form">Model GH03, GH04 & GH05series </th>
        <th class="input-form" colspan="2" rowspan="2" scope="col">2 ch chip : 60% area good colour</th>
      </tr>
      <tr>
        <th class="input-form">Model GH0832BA2K/BA1K/GH3Series & Othors Model: ≥ 150g (1.5N) </th>
      </tr>
      <tr>
        <th class="input-form" >Sample</th>
        <th class="input-form" >Point 1 (0)</th>
        <th class="input-form" >Point 2 (X)</th>
        <th class="input-form" >Point 3 (Y)</th>
        <th class="input-form" >Point 4 </th>
        <th class="input-form" >Result</th>
        <th class="input-form" >Result</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <th scope="row">Sample 1</th>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par021a" name="par021a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par022a" name="par022a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par023a" name="par023a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par024a" name="par024a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par025a" name="par025a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par026a" name="par026a"  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
          </td>
        </tr>
        <tr>
          <th scope="row">Sample 2</th>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par021b" name="par021b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par021'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par022b" name="par022b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par022'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par023b" name="par023b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par023'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par024b" name="par024b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par024'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par025b" name="par025b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par025'];} ?>>
          </td>
          <td rowspan="1" >
            <input type="number" step="0.00000001" class="form-control" id="par026b" name="par026b"  <?php if(isset($alldata)){echo 'value='.$alldata[1]['par026'];} ?>>
          </td>
        </tr>
      </tbody>
  </table>
</div>