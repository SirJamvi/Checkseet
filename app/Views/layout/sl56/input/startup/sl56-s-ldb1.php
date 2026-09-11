<div class="table-responsive" id="sldb1">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("LD DIE BONDING 1 MACHINE")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th colspan="2" scope="col">Start up Check Item</th>
            <th colspan="7" scope="col" >Standard</th>
            <th scope="col" >Data</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td >1</td>
          <td colspan="2">@Air Pressure 1</td>
          <td colspan="7">0.05 - 0.25 Mpa</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par001',0.05,025)"  id="par001" name="par001" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>
        <tr>
          <td >2</td>
          <td colspan="2">@Air Pressure 2</td>
          <td colspan="7">0.30 - 0.50 Mpa</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par002',0.3,0.5)"  id="par002" name="par002" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>
        <tr>
          <td >3</td>
          <td colspan="2">@LD Collet Vacuum Level</td>
          <td colspan="7">-80.0 kPa atau kurang</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par003',-9999999,-80)"  id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>
        <tr>
          <td rowspan="3">4</td>
          <td rowspan="3">@Vacum Pressure</td>
          <td >SM collet</td>
          <td colspan="7">-80.0 kPa atau kurang</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par004',-9999999,-80)"  id="par004" name="par004" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Middle collet</td>
          <td colspan="7">-80.0 kPa atau kurang</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par004',-9999999,-80)"  id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Die Bonding stage</td>
          <td colspan="7">-80.0 kPa atau kurang</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par005',-9999999,-80)"  id="par006" name="par006" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>
        <tr>
          <td rowspan="4">5</td>
          <td rowspan="4">@Collet Load (N)</td>
          <td >LD</td>
          <td >T5</td>
          <td >T9</td>
          <td >T12</td>
          <td >T13</td>
          <td >T14</td>
          <td >T15</td>
          <td >T16</td>
          <td>
            <input class="form-control" type="text"  id="par007" name="par007" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>
        <tr>
          <td >L < 800 um</td>
          <td rowspan="2">0.20 - 0.30</td>
          <td >0.20 - 0.40</td>
          <td rowspan="2">0.20 - 0.30</td>
          <td rowspan="2">0.20 - 0.30</td>
          <td >0.20-0.40</td>
          <td rowspan="2">0.20-0.30</td>
          <td rowspan="2">0.20-0.30</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange2('par008',0.2,0.3,0.2,0.4)"  id="par008" name="par008" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
        </tr>
        <tr>
          <td >L > 800 um</td>
          <td >0.05 - 0.15</td>
          <td >0.05 - 0.15</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange2('par009',0.05,0.15,0.2,0.4)"  id="par009" name="par009" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
        </tr>
        <tr>
          <td >SM</td>
          <td colspan="7">0.60 - 0.80 N</td>
          <td>
            <input class="form-control" type="number" step="0.000000001" onchange="changeRange('par010',0.6,0.8)"  id="par010" name="par010" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          </td>
        </tr>
        <tr>
          <td >7</td>
          <td colspan="9">* Pengecekan posisi die bonding (Check posisi die bonding pada monitor)</td>
          <td>
            <input class="form-control" type="text"  id="par011" name="par011" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
          </td>
        </tr>
        <tr>
          <td rowspan="3">8</td>
          <td colspan="2" rowspan="3">*Collet Cleaning <br> (Bersihkan dengan cotton bud yang dibasahi alkohol)</td>
          <td colspan="7">Collet A</td>
          <td>
            <input class="form-control" type="text"  id="par012" name="par012" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="7">Collet B</td>
          <td>
            <input class="form-control" type="text"  id="par013" name="par013" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="7">Middle Collet</td>
          <td>
            <input class="form-control" type="text"  id="par014" name="par014" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
          </td>
        </tr>
        <tr>
          <td rowspan="2">9 </td>
          <td colspan="2" rowspan="2">Check arah ion blower fan </td>
          <td colspan="7">Posisi blower </td>
          <td>
            <input class="form-control" type="text"  id="par015" name="par015" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="7">Putaran Blower </td>
          <td>
            <input class="form-control" type="text"  id="par016" name="par016" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
          </td>
        </tr>

        <tr>
          <td >10 </td>
          <td colspan="9">*Pengecekan kondisi collet guide (check apakah collet guide goyang) </td>
          <td>
            <input class="form-control" type="text"  id="par017" name="par017" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td rowspan="11">11 </td>
          <td colspan="2">Setting</td>
          <td >T5</td>
          <td >T9</td>
          <td >T12</td>
          <td >T13</td>
          <td >T14</td>
          <td >T15</td>
          <td >T16</td>
          <td>
            <input class="form-control" type="text"  id="par018" name="par018" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">Temperature Setting</td>
          <td >285-325</td>
          <td >260-300</td>
          <td >295-335</td>
          <td >280-320</td>
          <td >260-300</td>
          <td >310-350</td>
          <td >280-320</td>
          <td>
            <input class="form-control" type="text"  id="par019" name="par019" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">Rise Time, s</td>
          <td >0.3 - 0.7</td>
          <td >0.5</td>
          <td >0.5</td>
          <td >0.5</td>
          <td >0.5</td>
          <td >0.5</td>
          <td >0.5</td>
          <td>
            <input class="form-control" type="text"  id="par020" name="par020" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">Keep Time, s</td>
          <td >0.8 - 1.2</td>
          <td >1</td>
          <td >2</td>
          <td >1</td>
          <td >1</td>
          <td >4</td>
          <td >2</td>
          <td>
            <input class="form-control" type="text"  id="par021" name="par021" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">Temperature Setting</td>
          <td >0</td>
          <td >360-400</td>
          <td >0</td>
          <td >0</td>
          <td >330-370</td>
          <td >0</td>
          <td >0</td>
          <td>
            <input class="form-control" type="text"  id="par022" name="par022" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">Rise Time, s</td>
          <td >0</td>
          <td >0.5</td>
          <td >0</td>
          <td >0</td>
          <td >0.5</td>
          <td >0</td>
          <td >0</td>
          <td>
            <input class="form-control" type="text"  id="par023" name="par023" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">Keep Time, s</td>
          <td >0</td>
          <td >1.5</td>
          <td >0</td>
          <td >0</td>
          <td >1.5</td>
          <td >0</td>
          <td >0</td>
          <td>
            <input class="form-control" type="text"  id="par024" name="par024" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">Temperature Idle</td>
          <td >180-220</td>
          <td >250-290</td>
          <td >180-220</td>
          <td >180-220</td>
          <td >250-290</td>
          <td >180-220</td>
          <td >180-220</td>
          <td>
            <input class="form-control" type="text"  id="par025" name="par025" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">Solid Point</td>
          <td >idle +10</td>
          <td >290-310</td>
          <td >idle +10</td>
          <td >idle +10</td>
          <td >290-310</td>
          <td >idle +10</td>
          <td >idle +10</td>
          <td>
            <input class="form-control" type="text"  id="par026" name="par026" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">Rise Point</td>
          <td >285-325</td>
          <td >260-300</td>
          <td >295-335</td>
          <td >280-320</td>
          <td >260-300</td>
          <td >310-350</td>
          <td >280-320</td>
          <td>
            <input class="form-control" type="text"   id="par027" name="par027" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">Rising Detect, s</td>
          <td >2.5</td>
          <td >2.5</td>
          <td >2.5</td>
          <td >2.5</td>
          <td >2.5</td>
          <td >2.5</td>
          <td >2.5</td>
          <td>
            <input class="form-control" type="text"   id="par028" name="par028" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
          </td>
        </tr>
        <tr>
          <td rowspan="3">12</td>
          <td rowspan="3">* LD Collet Lower Position</td>
          <td >Chip Sheet</td>
          <td colspan="7">0 - 30 µm dari atas permukaan chip</td>
          <td>
            <input class="form-control" type="text"   id="par029" name="par029" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par029'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Middle collet</td>
          <td colspan="7">20- 60 µm dari atas permukaan tengah stage</td>
          <td>
            <input class="form-control" type="text"   id="par030" name="par030" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par030'];} ?>>
          </td>
        </tr>
        <tr>
          <td >D/B Stage</td>
          <td colspan="7">20- 60 µm dari atas permukaan sub chip</td>
          <td>
            <input class="form-control" type="text"   id="par031" name="par031" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par031'];} ?>>
          </td>
        </tr>
        <tr>
          <td rowspan="3">13</td>
          <td rowspan="3">* SM Collet Lower Position</td>
          <td >Chip Sheet</td>
          <td colspan="7">0 - 50 µm di bawah chip</td>
          <td>
            <input class="form-control" type="text"   id="par032" name="par032" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par032'];} ?>>
          </td>
        </tr>
        <tr>
          <td >D/B Stage</td>
          <td colspan="7">50 - 100 µm di bawah chip</td>
          <td>
            <input class="form-control" type="text"  id="par033" name="par033" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par033'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Receipt Part</td>
          <td colspan="7">50 - 100 µm di bawah chip</td>
          <td>
            <input class="form-control" type="text"  id="par034" name="par034" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par034'];} ?>>
          </td>
        </tr>
        <tr>
          <td rowspan="7">14 </td>
          <td colspan="2">Parameter setting value @ :</td>
          <td >T5</td>
          <td >T9</td>
          <td >T12</td>
          <td >T13</td>
          <td >T14</td>
          <td >T15</td>
          <td >T16</td>
          <td>
            <input class="form-control" type="text"  id="par035" name="par035" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par035'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">a. No.42 Lower position time of collet BST part</td>
          <td >0-500</td>
          <td >0-500</td>
          <td >0-450</td>
          <td >0-40</td>
          <td >270-290</td>
          <td >0-40</td>
          <td >000-1040</td>
          <td>
            <input class="form-control" type="text"  id="par036" name="par036" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par036'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">b. No.216 Auto start frequency of LD collet BST low</td>
          <td >300</td>
          <td >600</td>
          <td >300</td>
          <td >300</td>
          <td >600</td>
          <td >1200</td>
          <td >300</td>
          <td>
            <input class="form-control" type="text"  id="par037" name="par037" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par037'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">c. No.217 Maximum frequency of LD collet BST low</td>
          <td >300</td>
          <td >600</td>
          <td >300</td>
          <td >300</td>
          <td >600</td>
          <td >1200</td>
          <td >300</td>
          <td>
            <input class="form-control" type="text"  id="par038" name="par038" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par038'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">d. No.287 Waiting time of BST collet descent</td>
          <td >10</td>
          <td >0</td>
          <td >10</td>
          <td >10</td>
          <td >0</td>
          <td >10</td>
          <td >10</td>
          <td>
            <input class="form-control" type="text"  id="par039" name="par039" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par039'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">e. No.292 Waiting time of take out on take out PP BST</td>
          <td >0</td>
          <td >0-3000</td>
          <td >1000</td>
          <td >0</td>
          <td >0-3000</td>
          <td >0</td>
          <td >0</td>
          <td>
            <input class="form-control" type="text"  id="par040" name="par040" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par040'];} ?>>
          </td>
        </tr>
        <tr>
          <td colspan="2">f. No.293 On timing of heating</td>
          <td >0</td>
          <td >0</td>
          <td >0</td>
          <td >0</td>
          <td >0</td>
          <td >0</td>
          <td >0</td>
          <td>
            <input class="form-control" type="text"  id="par041" name="par041" placeholder="">
          </td>
        </tr>
        <tr>
          <td>15</td>
          <td colspan="9">* Cleaning Machine (Bersihkan mesin dan lingkungan sekitarnya dari debu dan kotoran)
          </td>
          <td>
            <input class="form-control" type="text"  id="par042" name="par042" placeholder="">
          </td>
        </tr>
        <tr>
          <td >16 </td>
          <td colspan="2">@N2 setting, l/m</td>
          <td >5-6</td>
          <td >4-6</td>
          <td >5-6</td>
          <td >5-6</td>
          <td >4-6</td>
          <td >5-6</td>
          <td >5-6</td>
          <td>
            <input class="form-control" type="text"  id="par043" name="par043" placeholder="">
          </td>
        </tr>
        <tr>
          <td colspan="10">Note #</td>
          <td>
            <input class="form-control" type="text"  id="par044" name="par044" placeholder="">
          </td>
        </tr>
      </tbody>
    </table>
</div>