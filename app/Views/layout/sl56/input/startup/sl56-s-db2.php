<div class="table-responsive" id="slvi">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("LD Die Bonding 2")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th colspan="2" scope="col">Start up Check Item</th>
            <th scope="col" >Standard</th>
            <th scope="col" >Data</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td rowspan="2">1</td>
          <td rowspan="2" colspan="2">@ Transfer Air Pressure</td>
          <td rowspan="1">A: 340-490 MPa</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par001',340,490)" placeholder="" id="par001" name="par001" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td rowspan="1">B: 0.34-0.49 MPa</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par002',0.34,0.49)" placeholder="" id="par002" name="par002" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="4">2</td>
          <td rowspan="4">@ Chip-clean Air Pressure</td>
          <td rowspan="2">Chip</td>
          <td >A: 60 - 150 MPa</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par003',60,150)" placeholder="" id="par003" name="par003" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td >B: 0.06 - 0.150 MPa</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par004',0.06,0.15)" placeholder="" id="par004" name="par004" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">Stem</td>
          <td >A: 340 - 490 MPa</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par005',340,490)" placeholder="" id="par005" name="par005" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>

        <tr>
          <td >B: 0.340 - 0.490 MPa</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par006',0.340,0.490)" placeholder="" id="par006" name="par006" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="4">3</td>
          <td rowspan="4">@ Vacuum Pressure</td>
          <td rowspan="2">Chip</td>
          <td >A: -80 kPa atau kurang</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par007',-99999999999,-80)" placeholder="" id="par007" name="par007" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>

        <tr>
          <td >B: -80 kPa atau kurang</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par008',-99999999999,-80)" placeholder="" id="par008" name="par008" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">Stem</td>
          <td >A: -70 kPa atau kurang</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par009',-99999999999,-70)" placeholder="" id="par009" name="par009" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
        </tr>

        <tr>
          <td >B: -70 kPa atau kurang</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par010',-99999999999,-70)" placeholder="" id="par010" name="par010" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td rowspan="3">4</td>
          <td rowspan="3" colspan="2">* Collet Cleaning <br> (Bersihkan dengan Cotton Bud yang dibasahi dengan alkohol)</td>
          <td >Collet A</td>
          <td>
            <input class="form-control" type="text"  placeholder="" id="par011" name="par011" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Collet B</td>
          <td>
            <input class="form-control" type="text"  placeholder="" id="par012" name="par012" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Middle Collet</td>
          <td>
            <input class="form-control" type="text"  placeholder="" id="par013" name="par013" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
        </tr>

        <tr>
          <td >5</td>
          <td colspan="3">* Pengecekan kondisi collet guide (Check apakah collet guide goyang)</td>
          <td>
            <input class="form-control" type="text"  placeholder="" id="par014" name="par014" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">6</td>
          <td rowspan="2" colspan="2">@Colled Load</td>
          <td >Collet A : 0.60 - 1.00 N (60-100 gr)</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange2('par015',0.6,1,60,100)" placeholder="" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Collet B : 0.60 - 1.00 N (60-100 gr)</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange2('par016',0.6,1,60,100)" placeholder="" id="par016" name="par016" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
          </td>
        </tr>

        <tr>
          <td >7</td>
          <td colspan="3">* Pengecekan die bonding monitor <br>(Check posisi cursor pada LD chip dengan melihat monitor)</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par017" name="par017" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
          </td>
        </tr>
        </tr>

        <tr>
          <td rowspan="6">8</td>
          <td rowspan="6">@ Dispenser indication</td>
          <td rowspan="2">Air Pressure</td>
          <td >Analog : 0.01-0.10 MPa (10-100 kPa) / 0.10 - 1 kgf/cm^2</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" placeholder="" id="par018" name="par018" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
          </td>
        </tr>

        <tr>
          <td >Digital : 0.005-0.10 MPa (5-100 kPa) / 0.05 - 1 kgf/cm^2</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" placeholder="" id="par019" name="par019" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">Dispense Time</td>
          <td >Analog : 0.01-0.15 sec / 10-150 ms</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange2('par020',0.01,0.15,10,150)" placeholder="" id="par020" name="par020" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td >Digital : 0.005-0.15 sec / 5-150 ms</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange2('par021',0.005,0.15,5,150)" placeholder="" id="par021" name="par021" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">Suction Pressure Force</td>
          <td >Analog : kurang dari 1/6 dari posisi Off</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par022" name="par022" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td >Digital : -0.3 ~ 0.1 kPa / -0.03 ~ -0.01 kgf/cm^2 / -3 ~ -1 mmHg</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par023" name="par023" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">9</td>
          <td rowspan="2" colspan="2">* Check kondisi Ag Paste</td>
          <td >Posisi</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par024" name="par024" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
          </td>
        </tr> 

        <tr>
          <td >Quantity</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par025" name="par025" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
          </td>
        </tr> 

        <tr>
          <td rowspan="2">10</td>
          <td rowspan="2" colspan="2">* Check arah Ion Blower Fan</td>
          <td >Posisi blower</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par026" name="par026" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
          </td>
        </tr> 

        <tr>
          <td >Putaran blower</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par027" name="par027" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
          </td>
        </tr> 

        <tr>
          <td rowspan="1">11</td>
          <td rowspan="1" colspan="2">Cleaning Machine</td>
          <td >Bersihkan mesin dan lingkungan sekitarnya dari debu dan kotoran</td>
          <td>
            <input class="form-control" type="text"  placeholder="" id="par028" name="par028" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
          </td>
        </tr> 

        <tr>
          <td rowspan="1">12</td>
          <td rowspan="1" colspan="2">@ Needle Push Up Level</td>
          <td >0.2 ~ 0.6 mm</td>
          <td>
            <input class="form-control" type="number" step="0.0000001" onchange="changeRange('par029',0.2,0.6)" placeholder="" id="par029" name="par029" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par029'];} ?>>
          </td>
        </tr> 
    

        <tr>
          <td colspan="4">Note</td>
          <td>
            <input class="form-control" type="text" placeholder="" id="par030" name="par030" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par030'];} ?>>
          </td>
        </tr>

      </tbody>   
    </table>
</div>