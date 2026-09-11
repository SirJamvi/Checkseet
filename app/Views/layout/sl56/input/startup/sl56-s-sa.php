<div class="table-responsive" id="slvi">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("Stem Set & Lead Correction Machine")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col">Start up Check Item</th>
            <th scope="col" >Standard</th>
            <th scope="col" >Data</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td>1</td>
          <td>@Air Pressure</td>
          <td>0.4MPa atau lebih</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par001',0.4,100)" placeholder="" id="par001" name="par001" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td>2</td>
          <td>* Cleaning of stem adsorption pad <br>(Bersihkan stem adsoprtion pad)</td>
          <td>Bersihkan dengan cotton bud yang diberi alkohol</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td>3</td>
          <td>* Cleaning of stem position pad <br>(Bersihkan stem position pad)</td>
          <td>Bersihkan dengan cotton bud yang diberi alkohol</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td>4</td>
          <td>* Cleaning of machine <br>(Membersihkan mesin)</td>
          <td>Bersihkan mesin dari debu atau kotoran dengan lap dan device yang terjatuh</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td colspan="3">Note</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par005" name="par005" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>

    </tbody>
    
    </table>
</div>