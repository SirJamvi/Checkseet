<div class="table-responsive w-auto mt-3" id="sl56-p-ht">
<input type="hidden" id="cnt-table" value="1">
<?= csrf_field(); ?>
    <table class="table table-bordered table-hover"  id="table1"
    >
        <thead align="center">
            <tr>
            <th colspan="27" scope="col"><?php echo nl2br("HOT TEST")?></th>
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
            <th rowspan="3" >HT1/HT2</th>
            <th colspan="4" scope="col" >Quantity</th>
            <th colspan="13" scope="col" >Failure Item</th>
            </tr>

            <tr>
            <th rowspan="2" >Input</th>
            <th rowspan="2" >Output</th>
            <th rowspan="2" >Reject</th>
            <th rowspan="2" >Yield (%)</th>
            <th  >LDs.Err (01)</th>
            <th  >LDo.Err (02)</th>
            <th  >lop.Err (03)</th>
            <th  >Kink.Err (04)</th>
            <th  >SP1.Err (05)</th>
            <th  >LDIr.Err (06)</th>
            <th  >TLop.Err (07)</th>
            <th  >lf LD (11)</th>
            <th  >LD.lr (12)</th>
            <th  >Vop2 (14)</th>
            <th  >lop2 (15)</th>
            <th  >lth (16)</th>
            <th  >Eta2 (17)</th>
            </tr>

        <tr>              
            <th scope="col">LKink2 (18)</th>
            <th scope="col">Pmax (19)</th>
            <th scope="col">lmax (20)</th>
            <th scope="col">Wop2 (27)</th>
            <th scope="col">Lp <br> (2A)</th>
            <th scope="col">TVop2 (2B)</th>
            <th scope="col">Tlop2 (2C)</th>
            <th scope="col">TPmax (2D)</th>
            <th scope="col">Tlmax (2E)</th>
            <th scope="col">Rank <br> 2</th>
            <th scope="col">Rank 3</th>
            <th scope="col">Others</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            <?php for($i = 0; $i < count($alldata); $i=$i+2) { ?>
            <tr>
                <td rowspan="2" ><?= $i/2+2; ?></td>
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
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>