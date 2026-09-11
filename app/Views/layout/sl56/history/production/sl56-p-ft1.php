<div class="table-responsive w-auto mt-3" id="sl56-p-ft1">
<input type="hidden" id="cnt-table" value="1">
    <?= csrf_field(); ?>
    <table class="table table-bordered table-hover"  id="table1">
        <thead align="center">
            <tr>
            <th colspan="27" scope="col"><?php echo nl2br("FINAL TEST \n (Blue Laser/ Green Laser/ Violet/ Cyan Laser)")?></th>
            </tr>
        </thead>
        <thead align="center">
            <tr>
                <th rowspan="5" >No.</th>
                <th rowspan="5" >Operator Start</th>         
                <th rowspan="5" >Shift/Group </th>
                <th rowspan="5" >Operator Finish</th>         
                <th rowspan="5" >Shift/Group </th>
                <th rowspan="5" >Mch. No.</th>         
                <th rowspan="5" >Model</th>
                <th rowspan="5" >Lot No.</th> 
                <th rowspan="5" >Date (dd/mm/yyyy)</th>
                <th colspan="4" scope="col" >Quantity</th>
                <th colspan="14" scope="col" >Failure Item</th>
            </tr>
        
            <tr>            
                <th  rowspan="4">Input</th>
                <th  rowspan="4">Output</th>
                <th  rowspan="4">Reject</th> 
                <th  rowspan="4">Yield</th>
                <th  >lmop <br> (00)</th>
                <th  >lf.LD <br> (01)</th>
                <th  >LD.Ir <br> (02)</th>
                <th  >Vop <br> (03)</th>
                <th  >lop <br> (04)</th>
                <th  >lth <br> (05)</th>
                <th  >Eta <br> (06)</th>
                <th  >L.Kink2 <br> (07)</th>
                <th  >Pmax <br> (08)</th>
                <th  >Imax<br> (09)</th>
                <th  >Pol <br> (0A)</th>
                <th  >PhPI <br> (0B)</th>
                <th  >Thv <br> (0C)</th>
                <th  >Thh <br> (0D)</th>
            </tr>
        
            <tr>                
                <th scope="col">Phv <br> (0E)</th>
                <th scope="col">Phh <br> (0F)</th>
                <th scope="col">Rpv <br> (10)</th>
                <th scope="col">Rph <br> (11)</th>
                <th scope="col">Lp <br> (12)</th>
                <th scope="col">LD Short <br> (13)</th>
                <th scope="col">LD Open <br> (14)</th>
                <th scope="col">lop. Err <br> (15)</th>
                <th scope="col">Kink.Err <br> (16)</th>
                <th scope="col">Pol.Err <br> (17)</th>
                <th scope="col">FFV.Err <br> (18)</th>
                <th scope="col">FFh.Err <br> (19)</th>
                <th scope="col">SP.Err <br> (1A)</th>
                <th scope="col">LDIr.Err <br> (1B)</th>
            </tr>
            <tr>  
                <th scope="col">lm.Err/ Vnr/ ldark/ lfPD/ m.Kink/PDIr.Err <br> (1C)</th>
                <th scope="col">L.Kink3 <br> (1D)</th>
                <th scope="col">L.Kink4 <br> (1E)</th>
                <th scope="col">RdPo <br> (1F)</th>
                <th scope="col">CP(lmax) <br> (20)</th>
                <th scope="col">HPlop1 <br> (21)</th>
                <th scope="col">HPlop 2,3 <br> (22)</th>
                <th scope="col">HPEta <br> (23)</th>
                <th scope="col">L.kink1 <br> (24)</th>
                <th scope="col">HPKink 1,2 <br> (25)</th>
                <th scope="col">HPKink3 <br> (26)</th>
                <th scope="col">*Thv <br> (27)</th>
                <th scope="col">*Thh <br> (28)</th>
                <th scope="col">*Phv <br> (29)</th>
            </tr>

            <tr>  
                <th scope="col">*Phh <br> (2A)</th>
                <th scope="col">Clop. Err <br> (2B)</th>
                <th scope="col">HPlop. Err <br> (2C)</th>
                <th scope="col">Ckink. Err <br> (2D)</th>
                <th scope="col">HHPkink. Err <br> (2E)</th>
                <th scope="col"> </th>
                <th scope="col">Others </th>
                <th scope="col">RANK 2</th>
                <th scope="col">RANK 3</th>
                <th scope="col">RANK 4</th>
                <th scope="col">RANK 5</th>
                <th scope="col"> </th>
                <th scope="col"> </th>
                <th scope="col"> </th>
            </tr>
        </thead>
        <tbody>
            <?php for($i = 0; $i < count($alldata); $i=$i+4) { ?>
                <tr>
                    <td rowspan="4" ><?= $i/4+1; ?></td>
                    <td rowspan="4" ><?= (string)$alldata[$i]['name'];?></td>
                    <td rowspan="4" ><?= (string)$alldata[$i]['shift'] .' / '. (string)$alldata[$i]['group'];?></td>
                    <td rowspan="4" >
                    <?php
                        if((string)$alldata[$i]['name2']){
                        echo  (string)$alldata[$i]['name2'];
                        }
                        else{
                        echo "";
                        }
                    ?>
                    </td>
                    <td rowspan="4" >
                    <?php
                        if((string)$alldata[$i]['shift2']){
                        echo (string)$alldata[$i]['shift2'] . ' / ' . (string)$alldata[$i]['group2'];
                        }
                        else{
                        echo "";
                        }
                    ?>
                    </td>
                    <td rowspan="4" ><?= (string)$alldata[$i]['machno']; ?></td>
                    <td rowspan="4" ><?= (string)$alldata[$i]['model']; ?></td>
                    <td rowspan="4" ><?= (string)$alldata[$i]['lotno']; ?></td>
                    <td rowspan="4" ><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
                    <td rowspan="4" ><?= (string)$alldata[$i]['par013']; ?></td>
                    <td rowspan="4" ><?= (string)$alldata[$i]['par014']; ?></td>
                    <td rowspan="4" ><?= (string)$alldata[$i]['par015']; ?></td>
                    <td rowspan="4" ><?= (string)$alldata[$i]['par016']; ?></td>
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
                </tr>
                <tr>
                    <td rowspan="1" ><?= (string)$alldata[$i+2]['par017']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+2]['par018']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+2]['par019']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+2]['par020']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+2]['par021']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+2]['par022']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+2]['par023']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+2]['par024']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+2]['par025']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+2]['par026']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+2]['par027']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+2]['par028']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+2]['par029']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+2]['par030']; ?></td>
                </tr>
                <tr>
                    <td rowspan="1" ><?= (string)$alldata[$i+3]['par017']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+3]['par018']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+3]['par019']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+3]['par020']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+3]['par021']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+3]['par022']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+3]['par023']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+3]['par024']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+3]['par025']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+3]['par026']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+3]['par027']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+3]['par028']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+3]['par029']; ?></td>
                    <td rowspan="1" ><?= (string)$alldata[$i+3]['par030']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>