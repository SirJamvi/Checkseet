<div class="table-responsive" id="sl33-s-wb">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
            <th colspan="4" scope="col"><?php echo nl2br("WIRE BONDING MACHINE START UP CHECK SHEET (Type HN-942)\n (Single Laser 3.3)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col">Start up Check Item</th>
            <th scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up Check</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td >1</td>
          <td >Memeriksa Rute Gold Wire <br> (Checking of Gold Wire Route)</td>
          <td >Bersihkan/lap wire guide dan ring guide dengan bemcoat dan alkohol</td>
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
        </tr>

        <tr>
          <td rowspan="2">2</td>
          <td rowspan="2">@ Memeriksa Vacuum Tension Pressure <br> (Checking of Vacuum Tension Pressure)</td>
          <td >Head A : 0.04 ~ 0.06 MPa</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" placeholder="" onchange="changeRange('par002',0.04,0.06)" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Head B : 0.04 ~ 0.06 MPa</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" placeholder=""onchange="changeRange('par003',0.04,0.06)" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td >3</td>
          <td >@ Memeriksa Tekanan Udara <br> (Checking of Air Pressure)</td>
          <td >0.34 ~ 0.59 Mpa</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" placeholder=""onchange="changeRange('par004',0.34,0.59)" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td >4</td>
          <td >Memeriksa Batas Pemakaian Cappilary <br> (Checking of Limit Usage Capillary) </td>
          <td >Check pemakaian gold wire</td>
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
        </tr>

        <tr>
          <td >5</td>
          <td >Memeriksa Bonding Parameter <br> (Checking of Bonding Parameter) </td>
          <td >Parameter harus sesuai dengan kondisi <br> setup mesin (pada Work Instruction)</td>
          <td>
            <select class="form-select" id="par006" name="par006">
                <?php if(isset($alldata)){
                    if($alldata[0]["par006"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par006"]=="V"){
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
        </tr>

        <tr>
          <td >6</td>
          <td >Membersihkan Mesin <br> (Cleaning of the Machine) </td>
          <td >Bersihkan mesin dan lingkungan sekitarnya <br> dari debu dan kotoran</td>
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
        </tr>
        
        <tr>
          <td colspan="3">Note</td>
          <td >
            <input class="form-control" type="text" placeholder="" id="par008" name="par008" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
        </tr>
    </tbody>   
    </table>
</div>