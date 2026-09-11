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
            <select class="form-select" id="par001" name="par001">
                <?php if(isset($alldata)){
                    if($alldata[0]["par001"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par001"]=="V"){
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
            <select class="form-select" id="par002" name="par002">
                <?php if(isset($alldata)){
                    if($alldata[0]["par002"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par002"]=="V"){
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
          <td >
            <input class="form-control" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
      </tr>

      <tr>
        <th scope="row">B</th>
        <td>
            <select class="form-select" id="par004" name="par004">
                <?php if(isset($alldata)){
                    if($alldata[0]["par004"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par004"]=="V"){
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
            <select class="form-select" id="par005" name="par005">
                <?php if(isset($alldata)){
                    if($alldata[0]["par005"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par005"]=="V"){
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
            <input class="form-control" id="par006" name="par006" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
        </td>
      </tr>

      <tr>
        <th scope="row">C</th>
        <td>
            <select class="form-select" id="par007" name="par007">
                <?php if(isset($alldata)){
                    if($alldata[0]["par007"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par007"]=="V"){
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
            <select class="form-select" id="par008" name="par008">
                <?php if(isset($alldata)){
                    if($alldata[0]["par008"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par008"]=="V"){
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
            <input class="form-control" id="par009" name="par009" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
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