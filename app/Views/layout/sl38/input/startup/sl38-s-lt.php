<div class="table-responsive" id="sl38-s-lt">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("LEAK TESTING MACHINE START UP\n Fukuda Machine Single Laser 3.8")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th colspan="2"scope="col" >Start Up Check Item</th>
            <th scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td>1</td>
          <td colspan="2">Checking air pressure <br> Mengecek air pressure</td>
          <td >0.49 MPa ± 0.05 MPa</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par001" name="par001" onchange="changeRange('par001',0.44,0.54)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td >2</td>
          <td colspan="2">Checking He gas level <br> Mengecek He gas level</td>
          <td >Kurang dari 5.0 x 10 Pa.m/s</td>
          <td >
            <input class="form-control" type="text" id="par002" name="par002" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">3</td>
          <td rowspan="2">Calibration of Machine <br> Kalibrasi mesin <br> 3.6 ± 0.5</td>
          <td >Fine Leak</td>
          <td >(3.6 ± 0.5) x 10 Pa.m/s</td>
          <td >
            <input class="form-control" type="text" id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Gross Leak</td>
          <td >Menggunakan 40pcs good sample <br> Result: OK</td>
          <td >
            <input class="form-control" type="text" id="par004" name="par004" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td >4</td>
          <td colspan="2">Judgment accuracy <br> Akurasi judgment</td>
          <td >Menggunakan masing-masing 40 pcs OK & NG <br> Result : All OK & All NG</td>
          <td >
            <input class="form-control" type="text" id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td rowspan="2">5</td>
          <td rowspan="2">Checking Oil <br>Pengecekkan Oil</td>
          <td >EDWARDS</td>
          <td >Level oil antara Min dan Max</td>
          <td >
            <input class="form-control" type="text" id="par006" name="par006" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td >ULVAC</td>
          <td >Level oil antara Min dan Max</td>
          <td >
            <input class="form-control" type="text" id="par007" name="par007" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="4" >Note</td>
          <td >
            <input class="form-control" type="text" id="par008" name="par008" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>