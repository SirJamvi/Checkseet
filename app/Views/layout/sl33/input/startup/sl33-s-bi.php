<div class="table-responsive" id="sl33-s-bi">
<?= csrf_field(); ?>
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
    <table class="table table-striped-columns" 
    >
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("BURN IN MACHINE START UP")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th colspan="2"scope="col" >Start Up Check Item</th>
            <th colspan="2" scope="col" >Standard</th>
            <th scope="col" >Start Up Check Result</th>
        </tr>
    </thead>

    <tbody>
        <tr>
          <td rowspan="2">1</td>
          <td colspan="2" rowspan="2">@ Memeriksa tekanan udara pada mesin set dan reset <br> @ (Checking of air pressure in set and reset machine)</td>
          <td colspan="2">Set Machine <br> 0.4 ~ 0.6 Mpa</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" id="par001" name="par001" placeholder="" onchange="changeRange('par001',0.4,0.6)" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par001'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="2">Reset Machine <br> 0.4 ~ 0.6 Mpa</td>
          <td >
            <input class="form-control" type="number" step="0.000000001" id="par002" name="par002" placeholder="" onchange="changeRange('par002',0.4,0.6)" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par002'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="17">2</td>
          <td colspan="2" rowspan="17">* Memeriksa temperatur oven <br> * (Checking of oven temperature) <br> Chamber temp : ± 0.3 °C <br> Note : <br> Pemeriksaan ini dilakukan pada saat dalam kondisi paling stabil dalam 1 kali Burn In <br> This checking condition do, when it on most stabil condition at 1 time Burn In</td>
          <td rowspan="2">A</td>
          <td >Display temperature</td>
          <td >
            <input class="form-control" type="text" id="par003" name="par003" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par003'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Setting temperature</td>
          <td >
            <input class="form-control" type="text" id="par004" name="par004" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par004'];} ?>>
          </td>
        <tr>
        
        <tr>
          <td rowspan="2">B</td>
          <td >Display temperature</td>
          <td >
            <input class="form-control" type="text" id="par005" name="par005" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par005'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Setting temperature</td>
          <td >
            <input class="form-control" type="text" id="par006" name="par006" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par006'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">C</td>
          <td >Display temperature</td>
          <td >
            <input class="form-control" type="text" id="par007" name="par007" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par007'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Setting temperature</td>
          <td >
            <input class="form-control" type="text" id="par008" name="par008" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par008'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">D</td>
          <td >Display temperature</td>
          <td >
            <input class="form-control" type="text" id="par009" name="par009" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par009'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Setting temperature</td>
          <td >
            <input class="form-control" type="text" id="par010" name="par010" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par010'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">E</td>
          <td >Display temperature</td>
          <td >
            <input class="form-control" type="text" id="par011" name="par011" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par011'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Setting temperature</td>
          <td >
            <input class="form-control" type="text" id="par012" name="par012" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par012'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">F</td>
          <td >Display temperature</td>
          <td >
            <input class="form-control" type="text" id="par013" name="par013" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Setting temperature</td>
          <td >
            <input class="form-control" type="text" id="par014" name="par014" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">G</td>
          <td >Display temperature</td>
          <td >
            <input class="form-control" type="text" id="par015" name="par015" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Setting temperature</td>
          <td >
            <input class="form-control" type="text" id="par016" name="par016" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par016'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">H</td>
          <td >Display temperature</td>
          <td >
            <input class="form-control" type="text" id="par017" name="par017" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par017'];} ?>>
          </td>
        </tr>
        <tr>
          <td >Setting temperature</td>
          <td >
            <input class="form-control" type="text" id="par018" name="par018" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par018'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="17">3</td>
          <td colspan="2" rowspan="17">* Memeriksa hasil print out lop running graph <br> * (Checking of print out lop running graph)</td>
          <td rowspan="2">A</td>
          <td >Parameter name</td>
          <td >
            <input class="form-control" type="text" id="par019" name="par019" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par019'];} ?>>
          </td>
        </tr>
        <tr>
          <td >lop running graph</td>
          <td >
            <input class="form-control" type="text" id="par020" name="par020" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par020'];} ?>>
          </td>
        <tr>
        
        <tr>
          <td rowspan="2">B</td>
          <td >Parameter name</td>
          <td >
            <input class="form-control" type="text" id="par021" name="par021" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par021'];} ?>>
          </td>
        </tr>
        <tr>
          <td >lop running graph</td>
          <td >
            <input class="form-control" type="text" id="par022" name="par022" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par022'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">C</td>
          <td >Parameter name</td>
          <td >
            <input class="form-control" type="text" id="par023" name="par023" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par023'];} ?>>
          </td>
        </tr>
        <tr>
          <td >lop running graph</td>
          <td >
            <input class="form-control" type="text" id="par024" name="par024" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par024'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">D</td>
          <td >Parameter name</td>
          <td >
            <input class="form-control" type="text" id="par025" name="par025" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par025'];} ?>>
          </td>
        </tr>
        <tr>
          <td >lop running graph</td>
          <td >
            <input class="form-control" type="text" id="par026" name="par026" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par026'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">E</td>
          <td >Parameter name</td>
          <td >
            <input class="form-control" type="text" id="par027" name="par027" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par027'];} ?>>
          </td>
        </tr>
        <tr>
          <td >lop running graph</td>
          <td >
            <input class="form-control" type="text" id="par028" name="par028" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par028'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">F</td>
          <td >Parameter name</td>
          <td >
            <input class="form-control" type="text" id="par029" name="par029" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par029'];} ?>>
          </td>
        </tr>
        <tr>
          <td >lop running graph</td>
          <td >
            <input class="form-control" type="text" id="par030" name="par030" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par030'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">G</td>
          <td >Parameter name</td>
          <td >
            <input class="form-control" type="text" id="par031" name="par031" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par031'];} ?>>
          </td>
        </tr>
        <tr>
          <td >lop running graph</td>
          <td >
            <input class="form-control" type="text" id="par032" name="par032" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par032'];} ?>>
          </td>
        </tr>

        <tr>
          <td rowspan="2">H</td>
          <td >Parameter name</td>
          <td >
            <input class="form-control" type="text" id="par033" name="par033" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par033'];} ?>>
          </td>
        </tr>
        <tr>
          <td >lop running graph</td>
          <td >
            <input class="form-control" type="text" id="par034" name="par034" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par034'];} ?>>
          </td>
        </tr>

        <tr>
          <td>4</td>
          <td colspan="2">* Membersihkan mesin <br> * (Cleaning the machine)</td>
          <td colspan="2">Berihkan mesin setting dan resetting dari debu & device yang terjatuh <br> (Clean setting machine and resetting machine from dust & drop device)
          <td >
            <input class="form-control" type="text" id="par035" name="par035" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par035'];} ?>>
          </td>
        </tr>

        <tr>
          <td colspan="5" >Note</td>
          <td >
            <input class="form-control" type="text" id="par036" name="par036" placeholder="" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par036'];} ?>>
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
        <p>
            - Isi bagian note apabila perlu melakukan penggantian part, melakukan adjustment atau kondii tidak sesuai dengan Standard
        </p>
        <p>
            - SLB01 = 8 Chamber, SLB02 = 8 Chamber, SLB05 = 8 Chamber
        </p>
    </div>
</div>