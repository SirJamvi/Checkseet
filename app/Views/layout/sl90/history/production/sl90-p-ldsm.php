<div class="table-responsive mt-3" id="sl90-p-ldsm">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
    <table class="table table-bordered table-hover"  id="table1">
        <thead align="center">
            <tr>
                <th colspan="24" scope="col"><?php echo nl2br("LDSM MACHINE")?></th>
            </tr>
        </thead>
        <thead align="center">
            <tr>
                <th rowspan="3" >No.</th>
                <th rowspan="3" >Operator Start</th>         
                <th rowspan="3" >Shift/Group </th>
                <th rowspan="3" >Operator Finish</th>         
                <th rowspan="3" >Shift/Group </th>
                <th rowspan="3" >Model Name</th>
                <th rowspan="3" >Mch. No.</th>         
                <th rowspan="3" >Lot No.</th> 
                <th rowspan="3" >Date (dd/mm/yyyy)</th>
                <th colspan="2" scope="col">Time</th>
                <th colspan="2" scope="col">Quantity</th>
                <th rowspan="3">Yield (%)</th>
                <th  colspan="7" scope="col">@Measuring of 2x bonding stage number (Back stage & Front stage)/Lot</th>
                <th  rowspan="3">AuSn #</th>
                <th  rowspan="3">STEM #</th>
                <th  rowspan="3">Remark</th>
            </tr>
            <tr>          
                <th rowspan=2>IN</th>
                <th rowspan=2>OUT</th>
                <th rowspan=2>IN</th>
                <th rowspan=2>OUT</th>
                <th rowspan="2">Sample</th>
                <th colspan="3" scope="col">LD Chip & SM</th>
                <th colspan="3" scope="col">LD Chip (COS) & Stem</th>            
            </tr>
            <tr>
                <th scope="col">Point 6 <br> (Θc)</th>
                <th scope="col">Point 5 <br> (Xc)</th>
                <th scope="col">Point 4 <br> (Zo)</th>
                <th scope="col">Point 1 <br> (X) </th>
                <th scope="col">Point 2 <br> (Y)</th>
                <th scope="col">Point 3 <br> (Z)</th>
            </tr>
        </thead>
        
        <tbody>
            <?php for($i = 0; $i < count($alldata); $i=$i+4) { ?>
            <tr>
                <td rowspan="4" ><?= $i/4+1; ?></td>
                <td rowspan="4" ><?= $alldata[$i]['name'];?></td>
                  <td rowspan="4" ><?= $alldata[$i]['shift'] .' / '. $alldata[$i]['group'];?></td>
                  <td rowspan="4" >
                  <?php
                      if($alldata[$i]['name2']){
                      echo  $alldata[$i]['name2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
                  <td rowspan="4" >
                  <?php
                      if($alldata[$i]['shift2']){
                      echo $alldata[$i]['shift2'] . ' / ' . $alldata[$i]['group2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
                <td rowspan="4" ><?= $alldata[$i]['model']; ?></td>
                <td rowspan="4" ><?= $alldata[$i]['machno']; ?></td>
                <td rowspan="4" ><?= $alldata[$i]['lotno']; ?></td>
                <td rowspan="4" ><?= date('d/m/Y', strtotime($alldata[$i]['created_at'])); ?></td>
                <td rowspan="4" ><?= date('H:i', strtotime($alldata[$i]['par008'])); ?></td>
                <td rowspan="4" >
                    <?php
                    if($alldata[$i]['par009']){
                        echo date('H:i', strtotime($alldata[$i]['par009'])); 
                    }
                    else{
                        echo "";
                    }
                    ?>
                </td>
                <td rowspan="4" ><?= $alldata[$i]['par013']; ?></td>
                <td rowspan="4" ><?= $alldata[$i]['par014']; ?></td>
                <td rowspan="4" ><?= $alldata[$i]['par016']; ?></td>
                <td rowspan="1" ><b>Front 1</b></td>
                <td rowspan="1" ><?= $alldata[$i]['par017']; ?></td>
                <td rowspan="1" ><?= $alldata[$i]['par018']; ?></td>
                <td rowspan="1" ><?= $alldata[$i]['par019']; ?></td>
                <td rowspan="1" ><?= $alldata[$i]['par020']; ?></td>
                <td rowspan="1" ><?= $alldata[$i]['par021']; ?></td>
                <td rowspan="1" ><?= $alldata[$i]['par022']; ?></td>
                <td rowspan="1" ><?= $alldata[$i]['par035']; ?></td>
                <td rowspan="1" ><?= $alldata[$i]['par036']; ?></td>
                <td rowspan="4" ><?= $alldata[$i]['par002']; ?></td>
            </tr>
            <tr>
                <td rowspan="1" ><b>Front 2</b></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par017']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par018']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par019']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par020']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par021']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par022']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par035']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par036']; ?></td>
            </tr>
            <tr>
                <td rowspan="1" ><b>Back 1</b></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par017']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par018']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par019']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par020']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par021']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par022']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par035']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par036']; ?></td>
            </tr>
            <tr>
                <td rowspan="1" ><b>Back 2</b></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par017']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par018']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par019']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par020']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par021']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par022']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par035']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par036']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>