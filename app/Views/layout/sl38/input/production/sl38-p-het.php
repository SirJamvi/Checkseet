<div class="table-responsive" id="sl38-p-het">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" 
    >
    <thead align="center">
      <tr>
        <th colspan="19" scope="col"><?php echo nl2br("HELIUM TESTING")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th >Input/Set</th>
      </tr> 
      <tr>
        <th >Quantity</th>
      </tr>   
    </thead>
    <tbody>
        <td rowspan="2" >
          <input type="text" step="1" class="form-control" id="par013" name="par013" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
        </td>
    </tbody>
  </table>
</div>