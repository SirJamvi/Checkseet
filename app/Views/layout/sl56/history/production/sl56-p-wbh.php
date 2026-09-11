<div class="table-responsive w-auto mt-3" id="sl56-p-wbh">
<input type="hidden" id="cnt-table" value="1">
<?= csrf_field(); ?>
    <table class="table table-bordered table-hover" id="table1">
        <thead align="center">
        <tr>
            <th colspan="38" scope="col"><?php echo nl2br("WIRE BONDING HIGH POWER")?></th>
        </tr>
        </thead>
        <thead align="center">
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
                <th colspan="4" rowspan="2" scope="col" >Foregoing Inspection (40pcs/lot)</th>
                <th colspan="17" scope="col" >Lakukan wire pull test 4pcs/shift*</th>
            </tr>

            <tr>
                <th rowspan="3" >Sample</th>
                <th scope="col" colspan="8">LD</th>
                <th scope="col" colspan="8">SM</th>
            </tr>
        
            <tr>
                <th rowspan="2" >Input</th>
                <th rowspan="2" >Output</th>
                <th rowspan="2" >NG</th>
                <th rowspan="2" >Yield</th>
                <th rowspan="2" >In</th>
                <th rowspan="2" >Out</th>
                <th rowspan="2" >Ball Pos.</th>
                <th colspan="2" scope="col" >Ball Size</th>
                <th rowspan="2" >Loop Shape</th>
                <th scope="col" colspan="2">LD1</th>
                <th scope="col" colspan="2">LD2</th>
                <th scope="col" colspan="2">LD3</th>
                <th scope="col" colspan="2">LD4</th>
                <th scope="col" colspan="2">SM1</th>
                <th scope="col" colspan="2">SM2</th>
                <th scope="col" colspan="2">SM3</th>
                <th scope="col" colspan="2">SM4</th>
            </tr>

            <tr>
                <th >X</th>
                <th >Y</th>

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

                <th scope="col">Val</th>
                <th scope="col">Pos</th>

                <th scope="col">Val</th>
                <th scope="col">Pos</th>
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
                <td rowspan="2" ><?= (string)$alldata[$i]['par002']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par003']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par013']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par014']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par015']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par016']; ?></td>
                <td rowspan="2" ><?= date('H:i', strtotime((string)$alldata[$i]['par008'])); ?></td>
                <td rowspan="2" >
                    <?php 
                        if(!(string)$alldata[$i]['par009']) echo "";
                        else echo date('H:i', strtotime((string)$alldata[$i]['par009'])); 
                    ?>
                </td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par004']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par005']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par006']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par007']; ?></td>
                <td rowspan="1" ><b>Sample 1</b></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par017']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par035']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par018']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par036']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par019']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par037']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par020']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par038']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par021']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par039']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par022']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par040']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par023']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par041']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par024']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par042']; ?></td>
            </tr>
            <tr>
                <td rowspan="1" ><b>Sample 2</b></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par017']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par035']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par018']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par036']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par019']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par037']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par020']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par038']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par021']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par039']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par022']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par040']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par023']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par041']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par024']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i+1]['par042']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>