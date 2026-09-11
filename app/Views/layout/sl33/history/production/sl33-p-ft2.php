<div class="table-responsive mt-3" id="sl33-p-ft2">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
    <table class="table table-bordered table-hover"  id="table1">
        <thead align="center">
            <tr>
            <th colspan="25" scope="col"><?php echo nl2br("FINAL TEST")?></th>
            </tr>
        </thead>
        <thead align="center">
            <tr>
                <th rowspan="4" >No.</th>
                <th rowspan="4" >Operator Start</th>
                <th rowspan="4" >Shift/Group</th>
                <th rowspan="4" >Operator Finish</th>
                <th rowspan="4" >Shift/Group</th>
                <th rowspan="4" >Mch. No.</th>         
                <th rowspan="4" >Model</th>
                <th rowspan="4" >Lot No.</th> 
                <th rowspan="4" >Date (dd/mm/yyyy)</th>
                <th colspan="4" scope="col" >Quantity</th>
                <th colspan="12" scope="col" >Failure Item</th>
            </tr>
        
            <tr>            
                <th  rowspan="3">Input</th>
                <th  rowspan="1" colspan="2">Output</th>
                <th  rowspan="3">Yield (%)</th>
                <th  >LD.lr/ LDlr.Err <br> (00)</th>
                <th  >lop.Err <br> (01)</th>
                <th  >lop/ Plop <br> (02)</th>
                <th  >lth <br> (03)</th>
                <th  >Klnk <br> (04)</th>
                <th  >Vop <br> (05)</th>
                <th  >Open <br> (06)</th>
                <th  >lmop <br> (07)</th>
                <th  >Rph2 <br> (08)</th>
                <th  >Lp <br> (09)</th>
                <th  >Thh <br> (0A)</th>
                <th  >Thv <br> (0B)</th>
            </tr>
            
            <tr>         
                <th scope="col" rowspan="2">GO</th>
                <th scope="col" rowspan="2">NG</th>
                <th scope="col">Phh <br> (0C)</th>
                <th scope="col">Phv <br> (0D)</th>
                <th scope="col">Ripple <br> (0E)</th>
                <th scope="col">LDs.Err <br> (0F)</th>
                <th scope="col">Axis_diff <br> (10)</th>
                <th scope="col">Eta/ PEta <br> (11)</th>
                <th scope="col">Plop. Err <br> (12)</th>
                <th scope="col">Vnr1/Vnr2 <br> (13)</th>
                <th scope="col">lf.LD <br> (14)</th>
                <th scope="col">Vim <br> (15)</th>
                <th scope="col">Pulse <br> (16)</th>
                <th scope="col">Rdl/ RdPo <br> (17)</th>
            </tr>
            <tr>  
                <th scope="col">LD Leak <br> (18)</th>
                <th scope="col">Pol/ PhPl <br> (19)</th>
                <th scope="col">Ub/FPH.Err/ FPV.Err <br> (1A)</th>
                <th scope="col">λ. Err <br> (1B)</th>
                <th scope="col">Pol. Err <br> (1C)</th>
                <th scope="col">Kink3 <br> (1D)</th>
                <th scope="col">mKink/lm.Er/ ldk/Pl.E/ IPD <br> (1E)</th>
                <th scope="col">Pth <br> (1F)</th>
                <th scope="col">Others</th>
                <th scope="col">RANK 2</th>
                <th scope="col">RANK 3</th>
                <th scope="col">Sampling</th>
            </tr>

        </thead>
        <tbody>
            <?php for($i = 0; $i < count($alldata); $i=$i+3) { ?>
                <tr>
                    <td rowspan="3" ><?= $i/3+1; ?></td>
                    <td rowspan="3" ><?= (string)$alldata[$i]['name'];?></td>
                        <td rowspan="3" ><?= (string)$alldata[$i]['shift'] .' / '. (string)$alldata[$i]['group'];?></td>
                        <td rowspan="3" >
                        <?php
                            if((string)$alldata[$i]['name2']){
                            echo  (string)$alldata[$i]['name2'];
                            }
                            else{
                            echo "";
                            }
                        ?>
                        </td>
                        <td rowspan="3" >
                        <?php
                            if((string)$alldata[$i]['shift2']){
                            echo (string)$alldata[$i]['shift2'] . ' / ' . (string)$alldata[$i]['group2'];
                            }
                            else{
                            echo "";
                            }
                        ?>
                        </td>
                    <td rowspan="3" ><?= (string)$alldata[$i]['machno']; ?></td>
                    <td rowspan="3" ><?= (string)$alldata[$i]['model']; ?></td>
                    <td rowspan="3" ><?= (string)$alldata[$i]['lotno']; ?></td>
                    <td rowspan="3" ><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
                    <td rowspan="3" ><?= (string)$alldata[$i]['par013']; ?></td>
                    <td rowspan="3" ><?= (string)$alldata[$i]['par014']; ?></td>
                    <td rowspan="3" ><?= (string)$alldata[$i]['par015']; ?></td>
                    <td rowspan="3" ><?= (string)$alldata[$i]['par016']; ?></td>
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
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>