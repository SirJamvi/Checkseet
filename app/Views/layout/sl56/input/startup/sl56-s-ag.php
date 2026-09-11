<div class="table-responsive" id="sp56-s-ag">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns" id="table1"
    >
    <thead align="center">
      <tr>
        <th colspan="29" scope="col"><?php echo nl2br("AG PASTE HARDENING")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th colspan="4" scope="col" >Start Up Check Item</th>
      </tr>
      <tr>
        <th class="input-form" rowspan="1" >A </th>
        <th class="input-form" rowspan="1" >B* </th>
        <th class="input-form" rowspan="1" >C* </th>
        <th class="input-form" rowspan="1" >D* </th>
      </tr>
    </thead>
    <tbody>
        <td rowspan="2" >
          <input type="number" step="0.000000001" onchange="changeRange2('par001',150,160,200,220)" class="form-control" id="par001" name="par001" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
        </td>
        <td rowspan="2">
            <select class="form-select" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
                <option value="-">-</option>
                <option value="V">V</option>
                <option value="X">X</option>
            </select>
        </td>
        <td rowspan="2">
            <select class="form-select" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
                <option value="-">-</option>
                <option value="V">V</option>
                <option value="X">X</option>
            </select>
        </td>
        <td rowspan="2">
            <select class="form-select" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
                <option value="-">-</option>
                <option value="V">V</option>
                <option value="X">X</option>
            </select>
        </td>
    </tbody>
  </table>
  <div class="note">
      <h3>Catatan</h3>
      <p>
          A. Checking of temperature setting oven 
          <br>
          Standard : 150 C - 160 C (All Ag Paste)
          Standard : 200 C - 220 C (All Metal Paste)
      </p>
      <p>
          B. Setting open-close damper 
          <br>
          Standard 25% - 35%
      </p>
      <p>
          C. Checking of oven door
          <br>
          Standard : Periksa apakah pintu oven rapat saat ditutup (isi V jika ditutup isi X jika tidak)
      </p>
      <p>
          D. Cleaning of oven
          <br>
          Standard : Bersihkan oven dari debu atau kotoran menggunakan lap dan dari device yang terjatuh (isi V jika dibersihkan isi X jika tidak)
      </p>
  </div>
</div>