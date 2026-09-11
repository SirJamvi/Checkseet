<div class="table-responsive" id="fl18-s-bi3">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("START UP CHECK SHEET OF BURN IN BOX MACHINE (2)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="2">Start up Checking Item</th>
            <th rowspan="2">Standard</th>
            <th rowspan="2">Box ID</th>
            <th colspan="3">Hasil Start Up Check</th>
        </tr>
        <tr>
            <th >Pin Judge</th>
            <th >Temp Judge</th>
            <th >Remark</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td >* Memeriksa kondisi contact pin filter <br> Checking contact pin filter <br> * Memeriksa kondisi temperatur box pada PC</td>
            <td >Periksa contact posisi pin filter clamp. <br> Apakah ada cacat (bengkok, patah) <br> Periksa kondisi temperatur burn in box, apabila suhu operasi < 60°C stop proses pada box yang bermasalah tersebut</td>
            <td >
                <input class="form-control" type="text" placeholder=""  id="par001" name="par001" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
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

             <td>
                <select class="form-select" id="par003" name="par003">
                <?php if(isset($alldata)){
                    if($alldata[0]["par003"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par003"]=="V"){
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
                <input class="form-control" type="text" placeholder="" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
            </td>
        </tr>

        <tr>
            <td colspan="3">Note</td>
            <td colspan="3">
                <input class="form-control" type="text" placeholder=""  id="par005" name="par005" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
            </td>
        </tr>
    </tbody>
    
    </table>
    
    <div class="note">
        <h3>Ket :</h3>
        <p>
            - * Beri tanda (V) jika kondisi OK / Good dan beri tanda (X) jika hasil pemeriksaan NG
        </p>
        <p>
            - Pengukuran temperatur dilakukan setelah 2 jam dari start burn in atau dengan memeriksa burn in box yang sedang beroperasi.
        </p>
        <p>
            - Pengecekan temperatur menggunakan monitor PC Burn In
        </p>
        <p>
            - Jika ditemukan box burn in yang temperaturnya < 60°C, maka box tersebut NG/tidak boleh digunakan, catat suhu di kolom "Remark" dan segera hubungi penanggung jawab proses.
        </p>
        <p>
            - Kolom "Time" diisikan secara otomatis oleh sistem saat dilakukan submit
        </p>
    </div>
</div>