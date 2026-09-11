<div class="table-responsive mt-3" id="sl90-p-vi">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
          <table class="table table-bordered table-hover"  id="table1"
            >
            <thead align="center">
              <tr>
                <th colspan="23" scope="col"><?php echo nl2br("VISUAL INSPECTION CONTROL SHEET\n Single Laser 9.0")?></th>
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
                <th colspan="4" scope="col" >Quantity</th>
                <th colspan="13" scope="col" >Reject Item</th>
              </tr>
              <tr>
                <th rowspan="2" >Input</th>
                <th rowspan="2" >Output</th>
                <th rowspan="2" >Reject</th>
                <th rowspan="2" >Yield</th>
                <th >Dust</th>
                <th >Glass Dirt</th>
                <th >Cap Crack</th>
                <th >Sic <br> Crack</th>
                <th >Stem Scratch</th>
                <th >Glass Scratch</th>
                <th >LD Crack</th>
                <th >LD Scratch</th>
                <th >Gold Wire NG</th>
                <th >Marking NG</th>
                
              </tr>
              <tr>
                <th >Pin Dirt</th>
                <th >Pin Slant</th>
                <th >Pin Lack</th>
                <th >Cap NG</th>
                <th >No Glass</th>
                <th >Cap Mix</th>
                <th >LD Dirt</th>
                <th >Ag Paste NG</th>
                <th >Off Center</th>
                <th >Others</th>
              </tr>
            </thead>
            <tbody>

                <?php for($i = 0; $i < count($alldata); $i=$i+2) { ?>
                <tr>
                  <td rowspan="2" ><?= $i/2+1; ?></td>
                  <td rowspan="2" ><?= $alldata[$i]['name'];?></td>
                  <td rowspan="2" ><?= $alldata[$i]['shift'] .' / '. $alldata[$i]['group'];?></td>
                  <td rowspan="2" >
                  <?php
                      if($alldata[$i]['name2']){
                      echo  $alldata[$i]['name2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
                  <td rowspan="2" >
                  <?php
                      if($alldata[$i]['shift2']){
                      echo $alldata[$i]['shift2'] . ' / ' . $alldata[$i]['group2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
                  <td rowspan="2" ><?= $alldata[$i]['machno']; ?></td>
                  <td rowspan="2" ><?= $alldata[$i]['model']; ?></td>
                  <td rowspan="2" ><?= $alldata[$i]['lotno']; ?></td>
                  <td rowspan="2" ><?= date('d/m/Y', strtotime($alldata[$i]['created_at'])); ?></td>
                  <td rowspan="2" ><?= $alldata[$i]['par013']; ?></td>
                  <td rowspan="2" ><?= $alldata[$i]['par014']; ?></td>
                  <td rowspan="2" ><?= $alldata[$i]['par015']; ?></td>
                  <td rowspan="2" ><?= $alldata[$i]['par016']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i]['par017']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i]['par018']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i]['par019']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i]['par020']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i]['par021']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i]['par022']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i]['par023']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i]['par024']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i]['par025']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i]['par026']; ?></td>
                </tr>
                <tr>
                  <td rowspan="1" ><?= $alldata[$i+1]['par017']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i+1]['par018']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i+1]['par019']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i+1]['par020']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i+1]['par021']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i+1]['par022']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i+1]['par023']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i+1]['par024']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i+1]['par025']; ?></td>
                  <td rowspan="1" ><?= $alldata[$i+1]['par026']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>