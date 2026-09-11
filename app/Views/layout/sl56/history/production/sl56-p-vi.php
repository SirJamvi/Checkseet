<div class="table-responsive w-auto mt-3" id="sl56-p-vi">
<input type="hidden" id="cnt-table" value="1">
<?= csrf_field(); ?>
          <table class="table table-bordered table-hover" id="table1"
            >
            <thead align="center">
              <tr>
                <th colspan="24" scope="col"><?php echo nl2br("VISUAL INSPECTION")?></th>
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
                <th colspan="5" scope="col" data-f-bold="true">Quantity</th>
                <th colspan="10" scope="col" data-f-bold="true">Reject Item</th>
              </tr>
            
              <tr>
               
                <th  rowspan="2"data-f-bold="true">Input</th>
                <th  rowspan="2"data-f-bold="true">Output</th>
                <th  rowspan="2"data-f-bold="true">Reject</th>
                <th  rowspan="2"data-f-bold="true">%FR</th>
                <th  rowspan="2"data-f-bold="true">Yield</th>
                <th  data-f-bold="true">Dust</th>
                <th  data-f-bold="true">Glass Dirt</th>
                <th  data-f-bold="true">Cap Crack</th>
                <th  data-f-bold="true">Stem Scratch</th>
                <th  data-f-bold="true">Glass Scratch</th>
                <th  data-f-bold="true">LD Crack/</th>
                <th  data-f-bold="true">LD Scratch</th>
                <th  data-f-bold="true">Gold Wire NG</th>
                <th  data-f-bold="true">Marking NG</th>
                <th  data-f-bold="true">Lead <br> Bend</th>
              </tr>
            <tr>
                <th scope="col" data-f-bold="true">Pin Dirt</th>
                <th scope="col" data-f-bold="true">Pin Slant</th>
                <th scope="col" data-f-bold="true">Pin Lack</th>
                <th scope="col" data-f-bold="true">Cap NG</th>
                <th scope="col" data-f-bold="true">No Glass</th>
                <th scope="col" data-f-bold="true">Cap Mix</th>
                <th scope="col" data-f-bold="true">LD Dirt</th>
                <th scope="col" data-f-bold="true">Ag Paste <br> NG</th>
                <th scope="col" data-f-bold="true">Off Center</th>
                <th scope="col" data-f-bold="true">Others</th>
            </tr>
            </thead>
            <tbody>
                <?php for($i = 0; $i < count($alldata); $i=$i+2) { ?>
                <tr>
                    <td rowspan="2" data-t="n"><?= $i/2+1; ?></td>
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
                    <td rowspan="2" data-t="n" ><?= (string)$alldata[$i]['par013']; ?></td>
                    <td rowspan="2" data-t="n" ><?= (string)$alldata[$i]['par014']; ?></td>
                    <td rowspan="2" data-t="n" ><?= (string)$alldata[$i]['par015']; ?></td>
                    <td rowspan="2" data-t="n" ><?= (string)$alldata[$i]['par016']; ?></td>
                    <td rowspan="2" data-t="n" ><?= (string)$alldata[$i]['par017']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i]['par018']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i]['par019']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i]['par020']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i]['par021']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i]['par022']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i]['par023']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i]['par024']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i]['par025']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i]['par026']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i]['par027']; ?></td>
                </tr>
                <tr>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i+1]['par018']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i+1]['par019']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i+1]['par020']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i+1]['par021']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i+1]['par022']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i+1]['par023']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i+1]['par024']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i+1]['par025']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i+1]['par026']; ?></td>
                    <td rowspan="1" data-t="n" ><?= (string)$alldata[$i+1]['par027']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>