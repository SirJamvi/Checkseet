<div class="table-responsive" id="flcsa">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("PERIODICAL CHECK SHEET OF FINAL TESTING MACHINE")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col">Periodical Check Item</th>
            <th scope="col" >Standard</th>
            <th scope="col" >Periode
            <th scope="col" colspan="2">Date/Month/Year and Judgment (J)</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td >1</td>
            <td >Mengganti contact probe pin</td>
            <td >Ganti contact probe pin pada <br> setiap bagian pengukuran</td>
            <td >1 bulan</td>
            <td >
                <input class="form-control" type="date" placeholder=""  id="par001" name="par001" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
            </td>
            <td>
                <select class="form-select" id="par002" name="par002">
                    <?php if(isset($alldata)){
                        if($alldata[0]["par002"]=="-"){
                            echo '
                            <option value="-" selected>-</option>
                            <option value="V">V</option>
                            <option value="A">A</option>
                            <option value="CP">CP</option>
                            <option value="WP">WP</option>
                            ';
                        }
                        else if($alldata[0]["par002"]=="V"){
                            echo '
                            <option value="-">-</option>
                            <option value="V" selected>V</option>
                            <option value="A">A</option>
                            <option value="CP">CP</option>
                            <option value="WP">WP</option>
                            ';
                        }
                        else if($alldata[0]["par002"]=="A"){
                            echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="A" selected>A</option>
                            <option value="CP">CP</option>
                            <option value="WP">WP</option>
                            ';
                        }
                        else if($alldata[0]["par002"]=="CP"){
                            echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="A">A</option>
                            <option value="CP" selected>CP</option>
                            <option value="WP">WP</option>
                            ';
                        }
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="A">A</option>
                            <option value="CP">CP</option>
                            <option value="WP" selected>WP</option>
                        ';
                    } ?>
                </select>
            </td>
        </tr>

        <tr>
            <td >2</td>
            <td >Membersihkan saringan udara (air filter)</td>
            <td >Bersihkan saringan udara pada <br> bagian PP1 dan PP2 atau ganti <br> bila tidak bisa dibersihkan lagi</td>
            <td >1 bulan</td>
            <td >
                <input class="form-control" type="date" placeholder="" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
            </td>
            <td>
                <select class="form-select" id="par004" name="par004">
                    <?php if(isset($alldata)){
                        if($alldata[0]["par004"]=="-"){
                            echo '
                            <option value="-" selected>-</option>
                            <option value="V">V</option>
                            <option value="A">A</option>
                            <option value="CP">CP</option>
                            <option value="WP">WP</option>
                            ';
                        }
                        else if($alldata[0]["par004"]=="V"){
                            echo '
                            <option value="-">-</option>
                            <option value="V" selected>V</option>
                            <option value="A">A</option>
                            <option value="CP">CP</option>
                            <option value="WP">WP</option>
                            ';
                        }
                        else if($alldata[0]["par004"]=="A"){
                            echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="A" selected>A</option>
                            <option value="CP">CP</option>
                            <option value="WP">WP</option>
                            ';
                        }
                        else if($alldata[0]["par004"]=="CP"){
                            echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="A">A</option>
                            <option value="CP" selected>CP</option>
                            <option value="WP">WP</option>
                            ';
                        }
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="A">A</option>
                            <option value="CP">CP</option>
                            <option value="WP" selected>WP</option>
                        ';
                    } ?>
                </select>
            </td>
        </tr>
        
        <tr>
            <td >3</td>
            <td>Memeriksa mur utama dan baut</td>
            <td >Kencangkan mur utama dan baut <br> bila longgar</td>
            <td >6 bulan</td>
            <td >
                <input class="form-control" type="date" placeholder="" id="par005" name="par005" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
            </td>
            <td>
                <select class="form-select" id="par006" name="par006">
                    <?php if(isset($alldata)){
                        if($alldata[0]["par006"]=="-"){
                            echo '
                            <option value="-" selected>-</option>
                            <option value="V">V</option>
                            <option value="A">A</option>
                            <option value="CP">CP</option>
                            <option value="WP">WP</option>
                            ';
                        }
                        else if($alldata[0]["par006"]=="V"){
                            echo '
                            <option value="-">-</option>
                            <option value="V" selected>V</option>
                            <option value="A">A</option>
                            <option value="CP">CP</option>
                            <option value="WP">WP</option>
                            ';
                        }
                        else if($alldata[0]["par006"]=="A"){
                            echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="A" selected>A</option>
                            <option value="CP">CP</option>
                            <option value="WP">WP</option>
                            ';
                        }
                        else if($alldata[0]["par006"]=="CP"){
                            echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="A">A</option>
                            <option value="CP" selected>CP</option>
                            <option value="WP">WP</option>
                            ';
                        }
                        }
                        else{
                        echo '
                            <option value="-">-</option>
                            <option value="V">V</option>
                            <option value="A">A</option>
                            <option value="CP">CP</option>
                            <option value="WP" selected>WP</option>
                        ';
                    } ?>
                </select>
            </td>
        </tr>
    </tbody>
    
    </table>
    
    <div class="note">
        <h3>Catatan</h3>
        <p>
            - Fill judgment with : V = GOOD, A = Adjust, CP = Change Part, WP = Waiting Part
        </p>
    </div>
</div>