<div class="table-responsive" id="fl18-s-vi">
<?= csrf_field(); ?>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("VACUUM JIG START UP")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th class="input-form" scope="col" colspan="2" >Start Up Check Item</th>
            <th class="input-form" scope="col" rowspan="2">Note</td>
        </tr>

        <tr>
            <th class="input-form">A</td>
            <th class="input-form">B</td>
        </tr>
    </thead>

    <tbody>
        <td rowspan="1">
            <input class="form-control" type="text" id="par001" name="par001" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
        </td>
        <td rowspan="1">
            <input class="form-control" type="text" id="par002" name="par002" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
        <td rowspan="1">
            <input class="form-control" type="text" id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
    </tbody>   
    </table>
</div>