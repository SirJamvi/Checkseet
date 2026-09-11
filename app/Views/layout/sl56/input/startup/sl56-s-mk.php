<div class="table-responsive" id="sp56-s-mk">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" id="table1"
    >
    <thead align="center">
      <tr>
        <th colspan="29" scope="col"><?php echo nl2br("Marking")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th colspan="4" scope="col" >Start Up Check Item</th>
        <th rowspan="2">Checked</th>
        <th rowspan="2">Note</th>
      </tr>
      <tr>
        <th class="input-form" rowspan="1" >A </th>
        <th class="input-form" rowspan="1" >B* </th>
        <th class="input-form" rowspan="1" >C* </th>
        <th class="input-form" rowspan="1" >D* </th>
      </tr>
    </thead>
    <tbody>
        <td  >
          <input type="number" step="0.000000001" onchange="changeRange('par001',0.48,0.5)" class="form-control" id="par001" name="par001" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
        </td>
        <td >
          <input type="text"  class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
        </td>
        <td >
          <input type="text"  class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
        </td>
        <td >
          <input type="text"  class="form-control" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
        </td>
        <td >
          <input type="text"  class="form-control" id="par005" name="par005" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
        </td>
        <td >
          <input type="text"  class="form-control" id="par006" name="par006" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
        </td>
    </tbody>
  </table>
  <div class="note">
      <h3>Catatan</h3>
      <p>
          A. Checking of temperature setting oven 
          <br>
          Standard : 0.48 - 0.5 MPa
      </p>
      <p>
          B. Checking of marking condition
          <br>
          - Posisi Marking
          <br>
          - Apakah marking tipis dan pecah
          <br>
          - Apakah bagian karakter marking cacat
      </p>
      <p>
          C. Checking of Message number
          <br>
          - Nama model, tanggal, bulan dan tahun
      </p>
      <p>
          D. Cleaning of machine
          <br>
          Standard : Bersihkan oven dari debu atau kotoran menggunakan lap dan dari device yang terjatuh (isi V jika dibersihkan isi X jika tidak)
      </p>
  </div>
</div>