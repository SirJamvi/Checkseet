<div class="table-responsive" id="sllt">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("LEAK TESTING MACHINE START UP")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th colspan="3"scope="col" >Start Up Check Item</th>
            <th scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td>1</td>
          <td colspan="3">Checking air pressure (Mengecek air pressure)</td>
          <td >0.49MPa ± 0.05MPa</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par001',0.485,0.495)" id="par001" name="par001" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td>2</td>
          <td colspan="3">Checking He gas level (Mengecek He gas level)</td>
          <td >Kurang dari 5.0 x 10 Pa.m/s</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par002',-99999,5)" id="par002" name="par002" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="3">3</td>
          <td rowspan="3">Calibration of Machine (Kalibrasi mesin)</td>
          <td rowspan="2">Fine Leak *</td>
          <td >SLT 01</td>
          <td >3.8 ± 0.5 Pa.m/s</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par003',3.75,3.85)" id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td >SLT 02</td>
          <td >3.6 ± 0.5 Pa.m/s</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par004',3.55,3.65)" id="par004" name="par004" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="2">Gross Leak</td>
          <td >Menggunakan 40 pcs good sample <br> Result: OK</td>
          <td >
            <input class="form-control" type="text" id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>

        <tr>
          <td>4</td>
          <td colspan="3">Judgment accuracy (Akurasi judgment)</td>
          <td >Menggunakan masing-masing 40 pcs OK & NG <br> Result: All OK & All NG</td>
          <td >
            <input class="form-control" type="text" id="par006" name="par006" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">5</td>
          <td rowspan="2">Checking Oil (Pengecekkan Oil)</td>
          <td colspan="2">EDWARDS</td>
          <td >Level oil antara Min dan Max</td>
          <td >
            <input class="form-control" type="text" id="par007" name="par007" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="2">ULVAC</td>
          <td >Level oil antara Min dan Max</td>
          <td >
            <input class="form-control" type="text" id="par008" name="par008" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="5">Note</td>
          <td >
            <input class="form-control" type="text" id="par009" name="par009" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>