<div class="table-responsive" id="sl33-s-fcs">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("CAP SET MACHINE START UP DAITOH HCP-2000 (High Speed Without Baking)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col">Start up Check Item</th>
            <th colspan="2" scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up Check</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td >1</td>
            <td >@ Checking of air source pressure <br> Memeriksa tekanan air pressure</td>
            <td colspan="2">0.39 ~ 0.59 MPa</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" placeholder="" onchange="changeRange('par001',0.39,0.59)" id="par001" name="par001" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
            </td>
        </tr>

        <tr>
            <td rowspan="2">2</td>
            <td rowspan="2">@ Checking of electrode use time <br> Memeriksa pemakaian electrode</td>
            <td colspan="2">Upper electrode (max 24000)</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" placeholder="" onchange="changeRange('par002',0,24000)" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
            </td>
        </tr>

        <tr>
            <td colspan="2">Middle electrode (max 2000)</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" placeholder="" onchange="changeRange('par003',0,2000)" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
            </td>
        </tr>
        
        <tr>
            <td >3</td>
            <td >@ Value of setting welding power suply <br> Nilai setting welding power suply</td>
            <td colspan="2">330 - 400 kVA</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" placeholder="" onchange="changeRange('par004',330,400)" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
            </td>
        </tr>

        <tr>
            <td rowspan="2">4</td>
            <td rowspan="2">@ Value of welding checker <br> Nilai welding checker</td>
            <td colspan="2">lp : 3.85 ~ 4.85 kA</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" placeholder="" onchange="changeRange('par005',3.85,4.85)" id="par005" name="par005" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
            </td>
        </tr>

        <tr>
            <td colspan="2">Tp : 3.00 ~ 4.00 ms</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" placeholder="" onchange="changeRange('par006',3,4)" id="par006" name="par006" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
            </td>
        </tr>

        <tr>
            <td >5</td>
            <td >@ Value of pressure cap seal <br> Nilai pressure cap seal</td>
            <td colspan="2">32 -38 kgf</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" placeholder="" onchange="changeRange('par007',32,38)" id="par007" name="par007" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
            </td>
        </tr>

        <tr>
            <td rowspan="2">6</td>
            <td rowspan="2">*Peel Off and Off Center</td>
            <td >Peel Off</td>
            <td >2 pcs / head</td>
            <td >
                <input class="form-control" type="text" placeholder="" id="par008" name="par008" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
            </td>
        </tr>

        <tr>
            <td >Off Center</td>
            <td >2 pcs / head</td>
            <td >
                <input class="form-control" type="text" placeholder="" id="par009" name="par009" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
            </td>
        </tr>

        <tr>
            <td >7</td>
            <td >*Cleaning of machine <br> Membersihkan mesin</td>
            <td colspan="2">Bersihkan mesin dari stem atau cap yang terjatuh dan bersihkan dari debu/kotoran</td>
            <td >
                <select name="par010" id="par010">
                    <option value="-">-</option>
                    <option value="OK">OK</option>
                    <option value="NG">NG</option>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="4">#Note</td>
            <td >
                <input class="form-control" type="text" placeholder="" id="par011" name="par011" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
            </td>
        </tr>
    </tbody>
    
    </table>
    <div class="note">
        <h3>Catatan</h3>
        <p>
            @: isi kolom dengan nilai (value) di mesin
        </p>
        <p>
            *: Beri tanda V jika OK/Good dan X jika NG
        </p>
        <p>
            #: isi bagian note apabila ada penggantian part    
        </p>
    </div>
</div>