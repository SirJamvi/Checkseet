<div class="table-responsive" id="sl38-s-wb">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("WIRE BOND MACHINE\n (KAIJO MACHINE FB-910 LDW)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col">Start up Check Item</th>
            <th colspan="3" scope="col" >Standard</th>
            <th colspan="3"scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td >1</td>
          <td >Cleaning of the wire course <br> (Membersihkan rute gold wire)</td>
          <td colspan="3">Lap dan bersihkan wire guide dan ring guide dengan bemcot</td>
          <td colspan="3">
            <input class="form-control" type="text"  id="par001" name="par001" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td >2</td>
          <td >@ Confirm the value of the vacuum pressure gauge <br> (Confirm nilai air pressure)</td>
          <td colspan="3">-40 kPa or less</td>
          <td colspan="3">
            <input class="form-control" type="number" step=0.001 id="par002" name="par002" onchange="changeRange('par002',-9999999,-40)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td >3</td>
          <td >@ Confirm the value of the air pressure gauge <br> (Confirm nilai air pressure)</td>
          <td colspan="3">0.29 ~ 0.59 Mpa</td>
          <td colspan="3">
            <input class="form-control" type="number" step=0.001 id="par003" name="par003" onchange="changeRange('par003',0.29,0.59)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>

        <tr>
          <td >4</td>
          <td >@ Confirm of air tension <br> (Confirm nilai air tension)</td>
          <td colspan="3">3.0 ± 0.5 l/min</td>
          <td colspan="3">
            <input class="form-control" type="number" step=0.001 id="par004" name="par004" onchange="changeRange('par004',2.50,3.50)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        </tr>

        <tr>
          <td >5</td>
          <td >@ Confirm of wireFeed</td>
          <td colspan="3">20.0 ± 0.5 l/min</td>
          <td colspan="3">
            <input class="form-control" type="number" step=0.001 id="par005" name="par005" onchange="changeRange('par005',19.5,20.5)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td >6</td>
          <td >@ Capilary usage count <br> (pemakaian capilary)</td>
          <td colspan="3">100.000 wire/kurang <br> =200.000 point/kurang</td>
          <td colspan="3">
            <input class="form-control" type="text"  id="par006" name="par006" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td >7</td>
          <td >@ Confirm of heater temperature <br> (Confirm nilai heater temperature)</td>
          <td colspan="3">200 ~ 220 °C</td>
          <td colspan="3">
            <input class="form-control" type="number" step=0.001 id="par007" name="par007" onchange="changeRange('par007',200,220)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td rowspan="4">8 </td>
          <td rowspan="4">@ Checking of bonding parameter <br> (Memeriksa parameter bonding)</td>
          <td >LD</td>
          <td >MS</td>
          <td >PD</td>
          <td >LD</td>
          <td >MS</td>
          <td >PD</td>
        </tr>

        <tr>
          <td colspan="3">POWER</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par008" name="par008" onchange="changeRange2('par008',20,30,30,40)" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par009" name="par009" onchange="changeRange2('par009',20,30,30,40)" placeholder=""  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par010" name="par010" onchange="changeRange2('par010',25,35,30,40)" placeholder=""  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="3">TIME</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par011" name="par011" onchange="changeRange2('par011',10,20,15,25)" placeholder=""  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par012" name="par012" onchange="changeRange2('par012',10,20,15,25)" placeholder=""  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par013" name="par013" onchange="changeRange2('par013',10,20,15,25)" placeholder=""  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td colspan="3">PRESS</td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par014" name="par014" onchange="changeRange2('par014',20,35,65,75)" placeholder=""  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par015" name="par015" onchange="changeRange2('par015',20,35,65,75)" placeholder=""  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
          </td>
          <td >
            <input class="form-control" type="number" step=0.001 id="par016" name="par016" onchange="changeRange2('par016',20,35,65,75)" placeholder=""  <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
          </td>
        </tr>
        
        <tr>
          <td colspan="5">Note</td>
          <td colspan="3">
            <input class="form-control" type="text"  id="par017" name="par017" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
          </td>
        </tr>
      </tbody>
    </table>
</div>