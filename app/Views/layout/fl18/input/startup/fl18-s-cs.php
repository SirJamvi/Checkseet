<div class="table-responsive" id="flcsa">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("CAP SET MACHINE AUTO START UP")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th colspan="3" scope="col">Start up Check Item</th>
            <th scope="col" >Standard</th>
            <th scope="col" >Hasil Start Up Check</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td rowspan="2">1</td>
            <td rowspan="2" colspan="3">* Cleaning Part Feeder</td>
            <td >Hopper</td>
            <td >
                <input class="form-control" type="text" placeholder=""  id="par001" name="par001" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
            </td>
        </tr>
        <tr>
            <td >Part</td>
            <td >
                <input class="form-control" type="text" placeholder="" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
            </td>
        </tr>

        <tr>
            <td rowspan="2">2</td>
            <td rowspan="2" colspan="3">* Cleaning PP Head</td>
            <td >Head A</td>
            <td >
                <input class="form-control" type="text" placeholder="" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
            </td>
        </tr>

        <tr>
            <td >Head B</td>
            <td >
                <input class="form-control" type="text" placeholder="" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
            </td>
        </tr>
        
        <tr>
            <td >3</td>
            <td colspan="3">* Main Air Pressure</td>
            <td >0.38 ~ 0.42 Mpa</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par005',0.38,0.42)" placeholder="" id="par005" name="par005" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
            </td>
        </tr>

        <tr>
            <td rowspan="2">4</td>
            <td rowspan="2" colspan="1">@ Part Feeder Pressure</td>
            <td colspan="1">Head A</td>
            <td colspan="1"></td>
            <td >0.38 ~ 0.42 Mpa</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par006',0.38,0.42)"  placeholder="" id="par006" name="par006" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
            </td>
        </tr>

        <tr>
            <td colspan="1">Head B</td>
            <td colspan="1"></td>
            <td >0.38 ~ 0.42 Mpa</td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par007',0.38,0.42)"  placeholder="" id="par007" name="par007" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
            </td>
        </tr>

        <tr>
            <td rowspan="6">5</td>
            <td rowspan="6">@ Part Feeder Controler</td>
            <td rowspan="3">Head A</td>
            <td >Linear</td>
            <td >70.0 ± 7.0 </td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par008',63,77)"  placeholder="" id="par008" name="par008" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
            </td>
        </tr>

        <tr>
            <td >Part</td>
            <td >23.0 ± 2.3 </td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par009',20.7,25.3)"  placeholder="" id="par009" name="par009" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
            </td>
        </tr>

        <tr>
            <td >Hooper</td>
            <td >4.0 ± 0.4 </td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par010',3.6,4.4)" placeholder="" id="par010" name="par010" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
            </td>
        </tr>

        <tr>
            <td rowspan="3">Head B</td>
            <td >Linear</td>
            <td >70.0 ± 7.0 </td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par011',63,77)"  placeholder="" id="par011" name="par011" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
            </td>
        </tr>

        <tr>
            <td >Part</td>
            <td >23.0 ± 2.3 </td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par012',20.7,25.3)" placeholder="" id="par012" name="par012" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
            </td>
        </tr>

        <tr>
            <td >Hooper</td>
            <td >4.0 ± 0.4 </td>
            <td >
                <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par013',3.6,4.4)" placeholder="" id="par013" name="par013" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
            </td>
        </tr>

        <tr>
            <td rowspan="2">6</td>
            <td rowspan="2" colspan="1">* Ion Blower</td>
            <td colspan="2">SW</td>
            <td > ON</td>
            <td >
                <input class="form-control" type="text" placeholder="" id="par014" name="par014" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
            </td>
        </tr>

        <tr>
            <td colspan="2">Vol</td>
            <td >MIN</td>
            <td >
                <input class="form-control" type="text" placeholder="" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
            </td>
        </tr>

        <tr>
            <td colspan="5">Note</td>
            <td >
                <input class="form-control" type="text" placeholder="" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
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