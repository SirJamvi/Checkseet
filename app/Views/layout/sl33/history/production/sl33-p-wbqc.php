<div class="table-responsive mt-3" id="sl33-p-wbqc">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
<input type="hidden" name="cnt-proses" value="1">
  <table class="table table-bordered table-hover" id="table1"
    >
    <thead align="center">
        <tr>
        <th colspan="41" scope="col"><?php echo nl2br("INSPECTION WIRE BONDING CONTROL CHECK SHEET\n (Single Laser 3.3)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="4">No</th>
            <th rowspan="4">Operator Start</th>
            <th rowspan="4">Shift/Group</th>
            <th rowspan="4">Operator Finish</th>
            <th rowspan="4">Shift/Group</th>
            <th rowspan="4" >Mch. No.</th>         
            <th rowspan="4" >Model</th>
            <th rowspan="4" >Lot No.</th> 
            <th rowspan="4" >Date (dd/mm/yyyy)</th>
            <th rowspan="2" colspan="2" scope="col" >Time</th>
            <th rowspan="4">Machine WB</th>
            <th colspan="4" scope="col" >Quantity</th>
            <th colspan="25" scope="col" >Reject Item</th>
        </tr>
        <tr>
            <th rowspan="3" >Input</th>
            <th rowspan="3" >Output</th>
            <th rowspan="3" >Reject</th>
            <th rowspan="3" >Yield</th>
            <th >GD 1st Diff</th>
            <th >GD 2nd Diff</th>
            <th >GD 2nd Miss</th>
            <th >GD Loop NG</th>
            <th >GD No Wire</th>
            <th >G. Ball <br> For 2nd <br> GND Diff</th>
            <th >No Gold <br> Ball For <br> 2nd GND</th>
            <th >LD 1st Diff</th>
            <th >LD 2nd Diff</th>
            <th >LD 1st Miss</th>
            <th >LD 2nd Miss</th>
            <th >LD Loop NG</th>
            <th >G. Ball <br> Pusher <br> Miss</th>
            <th >G. Ball <br> Pusher <br> 1st Diff</th>
            <th >G. Ball <br> Pusher <br> 2nd Diff</th>
            <th >W Det Miss</th>
            <th >LD Lack</th>
            <th >LD Dirt</th>
            <th >SM 1st Diff</th>
            <th >SM 2nd Diff</th>
            <th >SM 2nd Miss</th>
            <th >SM LooS NG</th>
            <th >SM No Wire</th>
            <th >G. Ball <br> For 2nd <br> SM Diff</th>
            <th >No Gold <br> Ball For <br> 2nd SM</th>
        </tr>

        <tr>
            <th rowspan="2" >In</th>
            <th rowspan="2" >Out</th>
            <th rowspan="2">LD Peel</th>
            <th rowspan="2">Sic Peel</th>
            <th rowspan="2">Stem NG</th>
            <th rowspan="2">LD nothing</th>
            <th rowspan="2">Pull Test</th>
            <th rowspan="2">AG Paste NG</th>
            <th rowspan="2">B. Point NG</th>
            <th rowspan="2">Gold Thick</th>
            <th rowspan="2">Pos. Gold</th>
            <th rowspan="2">Tail NG</th>
            <th rowspan="2">PD 1st Diff</th>
            <th rowspan="2">PD 2nd Diff</th>
            <th rowspan="2">PD 2nd Miss</th>
            <th rowspan="2">PD Loop NG</th>
            <th rowspan="2">PD No Wire</th>
            <th rowspan="2">G. Ball <br> For 2nd <br> PD Diff</th>
            <th rowspan="2">No Gold <br> Ball For <br> 2nd PD</th>
            <th colspan="8">Others</th>
        </tr>

        <tr>
            <th >LD Chip Float</th>
            <th >Sic Float</th>
            <th >A Failure</th>
            <th >Diameter gold Ball</th>
            <th >2nd bond position</th>
            <th >2nd stich</th>
            <th >Loop Shape</th>
            <th >Others</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+2) { ?>
            <tr>
                <td rowspan="2" ><?= $i/2+1; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['name'];?></td>
                  <td rowspan="2" ><?= (string)$alldata[$i]['shift'] .' / '. (string)$alldata[$i]['group'];?></td>
                  <td rowspan="2" >
                  <?php
                      if((string)$alldata[$i]['name2']){
                      echo  (string)$alldata[$i]['name2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
                  <td rowspan="2" >
                  <?php
                      if((string)$alldata[$i]['shift2']){
                      echo (string)$alldata[$i]['shift2'] . ' / ' . (string)$alldata[$i]['group2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['machno']; ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['model']; ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['lotno']; ?></td>
                    <td rowspan="2" ><?= date('d/m/Y', strtotime((string)$alldata[$i]['par008'])); ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['par008']; ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['par009']; ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['par002']; ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['par013']; ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['par014']; ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['par015']; ?></td>
                    <td rowspan="2" ><?= (string)$alldata[$i]['par016']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par017']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par018']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par019']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par020']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par021']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par022']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par023']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par024']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par025']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par026']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par027']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par028']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par029']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par030']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par031']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par032']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par033']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par034']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par035']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par036']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par037']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par038']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par039']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par040']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i]['par041']; ?></td>
            </tr>
            <tr>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par017']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par018']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par019']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par020']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par021']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par022']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par023']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par024']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par025']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par026']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par027']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par028']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par029']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par030']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par031']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par032']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par033']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par034']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par035']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par036']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par037']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par038']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par039']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par040']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+1]['par041']; ?></td>
            </tr>
        <?php }; ?>
    </tbody>
    </table>
</div>