<div class="table-responsive" id="slvi">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("VISUAL INSPECTION")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col">Start up Check Item</th>
            <th colspan="2" scope="col" >Standard</th>
            <th scope="col" >Data</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td rowspan="4">1</td>
          <td rowspan="4">@Air Pressure</td>
          <td rowspan="4">0.4MPa atau lebih</td>
          <td >Loader</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par001',0.4,100)" placeholder="" id="par001" name="par001" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Mirtec</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par002',0.4,100)" placeholder="" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Pick Up</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par003',0.4,100)" placeholder="" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Unloader</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par004',0.4,100)" placeholder="" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td >2</td>
          <td >@Vacuum pressure for pick up <br> @(Tekanan vakum untuk pick up)</td>
          <td colspan="2">-70kPa atau kurang</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par005',-999999999,-70)" placeholder="" id="par005" name="par005" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td >3</td>
          <td >*Check Belt tension <br> *(memeriksa kondisi belt)</td>
          <td colspan="2">Check kondisi belt</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par006',-999999999,-70)" placeholder="" id="par006" name="par006" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td >4</td>
          <td >*Check the FFU unit<br>*(Memeriksa FFU unit)</td>
          <td colspan="2">Check kondisi FFU sudah dihidupkan</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par007" name="par007" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">5</td>
          <td rowspan="2">*Check of Classification<br>*(Memeriksa Klasifikasi)</td>
          <td colspan="2">Good Product</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par008" name="par008" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="2">NG Product</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par009" name="par009" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="4">Note</td>
          <td>
            <input class="form-control" type="text"  id="par010" name="par010" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          </td>
        </tr>

    </tbody>
    
    </table>
</div>