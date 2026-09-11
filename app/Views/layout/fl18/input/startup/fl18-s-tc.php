<!-- FLTBC -->
<div class="table-responsive">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns">
    <thead align="center">
      <tr>
        <th colspan="10" scope="col"><?php echo nl2br("TIE BAR CUT MACHINE START UP")?></th>
      </tr>
      <tr>
        <th rowspan="2" >Shift</th>
        <th colspan="2" scope="col" >Check item</th>
        <th rowspan="2">Note</th>
      </tr>
      <tr>
        <th scope="col">A*</th>
        <th scope="col">B*</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <th scope="row">A</th>
        <td>
          <input type="text" class="form-control" id="par001" name="par001" >
        </td>
        <td>
          <input type="text" class="form-control" id="par002" name="par002" >
        </td>
        <td>
          <input type="text" class="form-control" id="par003" name="par003" >
        </td>
      </tr>

      <tr>
        <th scope="row">B</th>
        <td>
          <input type="text" class="form-control" id="par004" name="par004" >
        </td>
        <td>
          <input type="text" class="form-control" id="par005" name="par005" >
        </td>
        <td>
          <input type="text" class="form-control" id="par006" name="par006" >
        </td>
      </tr>

      <tr>
        <th scope="row">C</th>
        <td>
          <input type="text" class="form-control" id="par007" name="par007" >
        </td>
        <td>
          <input type="text" class="form-control" id="par008" name="par008" >
        </td>
        <td>
          <input type="text" class="form-control" id="par009" name="par009" >
        </td>
      </tr>
    </tbody>
  </table>
</div>