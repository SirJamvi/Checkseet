<div class="table-responsive" id="fl18-s-bi2">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("START UP CHECK SHEET OF BURN IN BOX MACHINE")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Start up Checking Item</th>
            <th rowspan="2">Standard</th>
            <th rowspan="2">Target</th>
            <th colspan="2">Hasil Start Up Check</th>
        </tr>
        <tr>
            <th >Box ID</th>
            <th >J</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td >1</td>
            <td >Memeriksa kondisi kabel komunikasi <br> Checking communication cable juntcion</td>
            <td >Periksa bahwa indikator NG tidak muncul <br> pada komputer kontrol dibawah BOX ID</td>
            <td >All Box ID</td>
            <td >
                <input class="form-control" type="text" id="par001" name="par001" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
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
        </tr>

        <tr>
            <td >2</td>
            <td >Membersihkan Mesin <br> Cleaning Machine</td>
            <td >Bersihkan mesin dari debu <br> dan device yang terjatuh</td>
            <td >All Box ID</td>
            <td >
                <input class="form-control" type="text" id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
            </td>
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
        </tr>

        <tr>
            <td >3</td>
            <td >Konfirmasi Filter <br> The confirmation of the filter</td>
            <td >Pastikan kondisi filter : <br> Tidak kotor, rusak, lepas</td>
            <td >All Box ID</td>
            <td >
                <input class="form-control" type="text" id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
            </td>
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
            <td >4</td>
            <td >Konfirmasi Perubahan kontak <br> The transformation confirmation of the contact</td>
            <td >Pastikan kondisi kontak tidak berubah bentuk</td>
            <td >All Box ID</td>
            <td >
                <input class="form-control" type="text" id="par007" name="par007" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
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
        </tr>

        <tr>
            <td >5</td>
            <td >Konfirmasi Sekrup <br> Screw confirmation</td>
            <td >- Pastikan sekrup tidak rusak dan hilang <br> - Pastikan clamp sekrup tidak rusak dan hilang</td>
            <td >All Box ID</td>
            <td >
                <input class="form-control" type="text" id="par009" name="par009" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
            </td>
            <td>
                <select class="form-select" id="par010" name="par010">
                <?php if(isset($alldata)){
                    if($alldata[0]["par010"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par010"]=="V"){
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
            <td >Konfirmasi Lampu LED pada judgement board <br> The LED lighting confirmation of the judgment board</td>
            <td >Klik tombol periksa lampu</td>
            <td >All Box ID</td>
            <td >
                <input class="form-control" type="text" id="par011" name="par011" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
            </td>
            <td>
                <select class="form-select" id="par012" name="par012">
                <?php if(isset($alldata)){
                    if($alldata[0]["par012"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par012"]=="V"){
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
            <td >7</td>
            <td >Konfirmasi peltier plate <br> The confirmation of the peltier plate</td>
            <td >Periksa pelat peltier tidak berpindah</td>
            <td >All Box ID</td>
            <td >
                <input class="form-control" type="text" id="par013" name="par013" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
            </td>
            <td>
                <select class="form-select" id="par014" name="par014">
                <?php if(isset($alldata)){
                    if($alldata[0]["par014"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par014"]=="V"){
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
            <td >8</td>
            <td >* Pemeriksaan grounding <br> (Baut pengunci di conductive <br> mat, banana plug, koneksi kabel <br> grounding)</td>
            <td colspan="2">Terpasang bagus/tidak longgar, <br> lepas, putus</td>
            <td colspan="2">
                <select class="form-select" id="par015" name="par015">
                <?php if(isset($alldata)){
                    if($alldata[0]["par015"]=="-"){
                        echo '
                        <option value="-" selected>-</option>
                        <option value="V">V</option>
                        <option value="X">X</option>
                        ';
                    }
                    else if($alldata[0]["par015"]=="V"){
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
            <td colspan="4">Note</td>
            <td colspan="2">
                <input class="form-control" type="text" id="par016" name="par016" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
            </td>
        </tr>
        </tr>
    </tbody>
    
    </table>
    
    <div class="note">
        <h3>Ket :</h3>
        <p>
            - J : Judgment -> Fill judgment with : V = GOOD, X = Not Good (NG)
        </p>
        <p>
            - * Beri tanda (V) jika kondisi OK/Good dan beri tanda (X) jika hasil pemeriksaan NG
        </p>
    </div>
</div>