<div class="table-responsive mt-3" id="sl38-p-wb">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
    <table class="table table-bordered table-hover" id="table1">
        <thead align="center">
            <tr>
                <th colspan="31" scope="col"><?php echo nl2br("WIRE BONDING")?></th>
            </tr>
            <tr>
                <th rowspan="4" >No.</th>
                <th rowspan="4" >Operator Start</th>         
                <th rowspan="4" >Shift/Group </th>
                <th rowspan="4" >Operator Finish</th>         
                <th rowspan="4" >Shift/Group </th>
                <th rowspan="4" >Mch. No.</th>         
                <th rowspan="4" >Model</th>
                <th rowspan="4" >Lot No.</th> 
                <th rowspan="4" >Date (dd/mm/yyyy)</th>
                <th rowspan="4" >Gold Wire Lot No.</th>
                <th rowspan="4" >Assy Lot No.</th>
                <th colspan="4" rowspan="2" scope="col" >Quantity</th>
                <th colspan="2" rowspan="2" scope="col" >Time</th>
                <th colspan="4" rowspan="2" scope="col" >Foregoing Inspection (20pcs/lot)</th>
                <th colspan="12" scope="col" >Lakukan wire pull test 2pcs/shift*</th>
            </tr>

            <tr>
                <th scope="col" colspan="6">Sample 1</th>
                <th scope="col" colspan="6">Sample 2</th>
            </tr>
        
            <tr>
                <th rowspan="2">Input</th>
                <th rowspan="2">Output</th>
                <th rowspan="2">NG</th>
                <th rowspan="2">Yield</th>
                <th rowspan="2">In</th>
                <th rowspan="2">Out</th>
                <th rowspan="2">Ball Pos</th>
                <th colspan="2">Ball Size</th>
                <th rowspan="2">Loop Shape</th>
                <th scope="col" colspan="2">Submount</th>
                <th scope="col" colspan="2">LD</th>
                <th scope="col" colspan="2">PD</th>
                <th scope="col" colspan="2">Submount</th>
                <th scope="col" colspan="2">LD</th>
                <th scope="col" colspan="2">PD</th>
            </tr>
            <tr>
                <th>X</th>
                <th>Y</th>

                <th scope="col">Val</th>
                <th scope="col">Pos</th>

                <th scope="col">Val</th>
                <th scope="col">Pos</th>

                <th scope="col">Val</th>
                <th scope="col">Pos</th>
                
                <th scope="col">Val</th>
                <th scope="col">Pos</th>

                <th scope="col">Val</th>
                <th scope="col">Pos</th>

                <th scope="col">Val</th>
                <th scope="col">Pos</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach($alldata as $c): ?>
            <tr>
            <td rowspan="1" ><?= $i++; ?></td>
            <td rowspan="1" ><?= (string)$c['name'];?></td>
                  <td rowspan="1" ><?= (string)$c['shift'] .' / '. (string)$c['group'];?></td>
                  <td rowspan="1" >
                  <?php
                      if((string)$c['name2']){
                      echo  (string)$c['name2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
                  <td rowspan="1" >
                  <?php
                      if((string)$c['shift2']){
                      echo (string)$c['shift2'] . ' / ' . (string)$c['group2'];
                      }
                      else{
                      echo "";
                      }
                  ?>
                  </td>
            <td rowspan="1" ><?= (string)$c['machno']; ?></td>
            <td rowspan="1" ><?= (string)$c['model']; ?></td>
            <td rowspan="1" ><?= (string)$c['lotno']; ?></td>
            <td rowspan="1" ><?= date('d/m/Y', strtotime((string)$c['created_at'])); ?></td>
            <td rowspan="1" ><?= (string)$c['par002']; ?></td>
            <td rowspan="1" ><?= (string)$c['par003']; ?></td>
            <td rowspan="1" ><?= (string)$c['par013']; ?></td>
            <td rowspan="1" ><?= (string)$c['par014']; ?></td>
            <td rowspan="1" ><?= (string)$c['par015']; ?></td>
            <td rowspan="1" ><?= (string)$c['par016']; ?></td>
            <td rowspan="1" ><?= date('H:i', strtotime((string)$c['par008'])); ?></td>
            <td >
                <?php
                if((string)$c['par009']){
                    echo date('H:i', strtotime((string)$c['par009'])); 
                }
                else{
                    echo "";
                }
                ?>
            </td>
            <td rowspan="1" ><?= (string)$c['par035']; ?></td>
            <td rowspan="1" ><?= (string)$c['par036']; ?></td>
            <td rowspan="1" ><?= (string)$c['par037']; ?></td>
            <td rowspan="1" ><?= (string)$c['par038']; ?></td>
            <td rowspan="1" ><?= (string)$c['par017']; ?></td>
            <td rowspan="1" ><?= (string)$c['par039']; ?></td>
            <td rowspan="1" ><?= (string)$c['par018']; ?></td>
            <td rowspan="1" ><?= (string)$c['par040']; ?></td>
            <td rowspan="1" ><?= (string)$c['par019']; ?></td>
            <td rowspan="1" ><?= (string)$c['par041']; ?></td>
            <td rowspan="1" ><?= (string)$c['par020']; ?></td>
            <td rowspan="1" ><?= (string)$c['par042']; ?></td>
            <td rowspan="1" ><?= (string)$c['par021']; ?></td>
            <td rowspan="1" ><?= (string)$c['par043']; ?></td>
            <td rowspan="1" ><?= (string)$c['par022']; ?></td>
            <td rowspan="1" ><?= (string)$c['par044']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>