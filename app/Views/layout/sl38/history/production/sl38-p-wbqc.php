<div class="table-responsive mt-3" id="sl38-p-wbqc">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
          <table class="table table-bordered table-hover"  id="table1"
            >
            <thead align="center">
              <tr>
                <th colspan="35" scope="col"><?php echo nl2br("INSPECTION WIRE BONDING CONTROL CHECK SHEET\n (Single Laser 3.8)")?></th>
              </tr>
            </thead>
            <thead align="center">
              <tr>
                <th rowspan="3" >No.</th>
                <th rowspan="3" >Operator Start</th>         
                <th rowspan="3" >Shift/Group </th>
                <th rowspan="3" >Operator Finish</th>         
                <th rowspan="3" >Shift/Group </th>
                <th rowspan="3" >Mch. No.</th>         
                <th rowspan="3" >Model</th>
                <th rowspan="3" >Lot No.</th> 
                <th rowspan="3" >Date (dd/mm/yyyy)</th>
                <th colspan="4" >Quantity</th>
                <th colspan="20" >Reject Item</th>
                <th rowspan="3" >Remark </th>
              </tr>
              <tr>
                <th rowspan="2" >Input</th>
                <th rowspan="2" >Output</th>
                <th rowspan="2" >Reject</th>
                <th rowspan="2" >Yield</th>
                <th >GD 1st Diff</th>
                <th >GD 2nd Diff</th>
                <th >GD 2nd Miss</th>
                <th >GD Loop NG</th>
                <th >GD No Wire</th>
                <th >LD 1st Diff</th>
                <th >LD 2nd Diff</th>
                <th >LD 1st Miss</th>
                <th >LD 2nd Miss</th>
                <th >LD Loop NG</th>
                <th >PD 2nd Diff</th>
                <th >PD 1st Diff</th>
                <th >PD Lack</th>
                <th >PD Peel</th>
                <th >PD No Wire</th>
                <th >Sic Float</th>
                <th >Diameter G Ball</th>
                <th >2nd Bond Pos</th>
                <th >Loop Shape</th>
                <th >PD Dirt</th>
              </tr>
              <tr>
                <th >W Det Miss</th>
                <th >LD Lack</th>
                <th >LD Dirt</th>
                <th >LD Peel</th>
                <th >Sic Peel</th>
                <th >Stem NG</th>
                <th >Wire Touch</th>
                <th >Pull Test</th>
                <th >A Failure</th>
                <th >B Point NG</th>
                <th >Gold Thick</th>
                <th >Pos. Gold</th>
                <th >Sic Float</th>
                <th >LD No Wire</th>
                <th >Tail NG</th>
                <th >LD Float</th>
                <th >Sic Crack</th>
                <th >PD Loop NG</th>
                <th >GD 1st Miss</th>
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
                  <td rowspan="2" ><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
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
                  <td rowspan="1" ><?= (string)$alldata[$i]['par004']; ?></td>
                  <td rowspan="1" ><?= (string)$alldata[$i]['par005']; ?></td>
                  <td rowspan="2" ><?= (string)$alldata[$i]['par002']; ?></td>
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
                  <td rowspan="1" ><?= (string)$alldata[$i+1]['par004']; ?></td>
                  <td rowspan="1" ><?= (string)$alldata[$i+1]['par005']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>