<!-- FLLC -->
<div class="table-responsive">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
  <table class="table table-striped-columns">
    <thead align="center">
      <tr>
        <th colspan="10" scope="col"><?php echo nl2br("LEAD CUT MACHINE START UP")?></th>
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
            <select class="form-select" id="par035" name="par035">
            <?php if(isset($alldata)){
                if($alldata[0]["par035"]=="-"){
                    echo '
                    <option value="-" selected>-</option>
                    <option value="V">V</option>
                    <option value="X">X</option>
                    ';
                }
                else if($alldata[0]["par035"]=="V"){
                    echo '
                    <option value="-">-</option>
                    <option value="V" selected>V</option>
                    <option value="X">X</option>
                    ';
                }
                else{
                    echo '
                    <option value="-">-</option>
                    <option value="V">V</option>
                    <option value="X" selected>X</option>
                    ';
                }
                }
                else{
                echo '
                    <option value="-">-</option>
                    <option value="V">V</option>
                    <option value="X">X</option>
                ';
            } ?>
          </select>
      </td>
      <td>
            <select class="form-select" id="par036" name="par036">
            <?php if(isset($alldata)){
                if($alldata[0]["par036"]=="-"){
                    echo '
                    <option value="-" selected>-</option>
                    <option value="V">V</option>
                    <option value="X">X</option>
                    ';
                }
                else if($alldata[0]["par036"]=="V"){
                    echo '
                    <option value="-">-</option>
                    <option value="V" selected>V</option>
                    <option value="X">X</option>
                    ';
                }
                else{
                    echo '
                    <option value="-">-</option>
                    <option value="V">V</option>
                    <option value="X" selected>X</option>
                    ';
                }
                }
                else{
                echo '
                    <option value="-">-</option>
                    <option value="V">V</option>
                    <option value="X">X</option>
                ';
            } ?>
          </select>
      </td>
      <td>
          <input class="form-control" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
      </td>
      </tr>

      <tr>
        <th scope="row">B</th>
        <td>
            <select class="form-select" id="par037" name="par037">
            <?php if(isset($alldata)){
                if($alldata[0]["par037"]=="-"){
                    echo '
                    <option value="-" selected>-</option>
                    <option value="V">V</option>
                    <option value="X">X</option>
                    ';
                }
                else if($alldata[0]["par037"]=="V"){
                    echo '
                    <option value="-">-</option>
                    <option value="V" selected>V</option>
                    <option value="X">X</option>
                    ';
                }
                else{
                    echo '
                    <option value="-">-</option>
                    <option value="V">V</option>
                    <option value="X" selected>X</option>
                    ';
                }
                }
                else{
                echo '
                    <option value="-">-</option>
                    <option value="V">V</option>
                    <option value="X">X</option>
                ';
            } ?>
          </select>
      </td>
      <td>
            <select class="form-select" id="par038" name="par038">
            <?php if(isset($alldata)){
                if($alldata[0]["par038"]=="-"){
                    echo '
                    <option value="-" selected>-</option>
                    <option value="V">V</option>
                    <option value="X">X</option>
                    ';
                }
                else if($alldata[0]["par038"]=="V"){
                    echo '
                    <option value="-">-</option>
                    <option value="V" selected>V</option>
                    <option value="X">X</option>
                    ';
                }
                else{
                    echo '
                    <option value="-">-</option>
                    <option value="V">V</option>
                    <option value="X" selected>X</option>
                    ';
                }
                }
                else{
                echo '
                    <option value="-">-</option>
                    <option value="V">V</option>
                    <option value="X">X</option>
                ';
            } ?>
          </select>
      </td>
      <td>
            <input class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
      </td>
      </tr>

      <tr>
        <th scope="row">C</th>
        <td>
            <select class="form-select" id="par039" name="par039">
            <?php if(isset($alldata)){
                if($alldata[0]["par039"]=="-"){
                    echo '
                    <option value="-" selected>-</option>
                    <option value="V">V</option>
                    <option value="X">X</option>
                    ';
                }
                else if($alldata[0]["par039"]=="V"){
                    echo '
                    <option value="-">-</option>
                    <option value="V" selected>V</option>
                    <option value="X">X</option>
                    ';
                }
                else{
                    echo '
                    <option value="-">-</option>
                    <option value="V">V</option>
                    <option value="X" selected>X</option>
                    ';
                }
                }
                else{
                echo '
                    <option value="-">-</option>
                    <option value="V">V</option>
                    <option value="X">X</option>
                ';
            } ?>
          </select>
      </td>
      <td>
            <select class="form-select" id="par040" name="par040">
            <?php if(isset($alldata)){
                if($alldata[0]["par040"]=="-"){
                    echo '
                    <option value="-" selected>-</option>
                    <option value="V">V</option>
                    <option value="X">X</option>
                    ';
                }
                else if($alldata[0]["par040"]=="V"){
                    echo '
                    <option value="-">-</option>
                    <option value="V" selected>V</option>
                    <option value="X">X</option>
                    ';
                }
                else{
                    echo '
                    <option value="-">-</option>
                    <option value="V">V</option>
                    <option value="X" selected>X</option>
                    ';
                }
                }
                else{
                echo '
                    <option value="-">-</option>
                    <option value="V">V</option>
                    <option value="X">X</option>
                ';
            } ?>
          </select>
      </td>
      <td>
            <input class="form-control" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
      </td>
      </tr>
    </tbody>
  </table>
  <div class="note">
    <h3>Note :</h3>
    <p>
        * : Beri tanda (V) jika kondisi OK/Good atau sudah dilakukan dan beri tanda (X) jika No Good pada hasil start up check
    </p>
    <p>
        Isi bagian note (catatan) apabila melakukan penggantian part, melakukan adjusment, atau terjadi kondisi yang tidak sesuai dengan standart
    </p>
    <h3>Contents :</h3>
    <p>
        A. Cleaning Machine And Working Area
        <br>
        Standard : Bersihkan mesin dan sekitar tempat kerja dari debu atau kotoran menggunakan lap dan dari device yang terjatuh
    </p>
    <p>
        B. Pemeriksaan grounding (Baut pengunci di conductive mat, banana plug, koneksi kabel grounding)
        <br>
        Standard : Terpasang bagus/tidak longgar, lepas, putus
    </p>
</div>