<div class="table-responsive mt-3" id="sl38-p-ht">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
    <table class="table table-bordered table-hover" id="table1"
    >
    <thead align="center">
        <tr>
        <th colspan="26" scope="col"><?php echo nl2br("HOT TEST")?></th>
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
            <th colspan="4" scope="col" >Quantity</th>
            <th colspan="13" scope="col" >Failure Item</th>
        </tr>

        <tr>
        <th rowspan="3" >Input</th>
        <th rowspan="3" >Output</th>
        <th rowspan="3" >Reject</th>
        <th rowspan="3" >Yield (%)</th>
        <th  >LDs.Err (01)</th>
        <th  >LDo.Err (02)</th>
        <th  >lop.Err / Plop.Err (03)</th>
        <th  >Kink.Err (04)</th>
        <th  >SP1.Err / SP2.Err (05)</th>
        <th  >LDlr.Err (06)</th>
        <th  >Tlop.Err (07)</th>
        <th  >TKink.Err (08)</th>
        <th  >TSP1.Err / TSP2.Err (09)</th>
        <th  >lf LD (11)</th>
        <th  >LD.lr (12)</th>
        <th  >RdPo/ Rdl (13)</th>
        <th  >Vop1/Vop2 (14)</th>
        </tr>

    <tr>              
        <th scope="col">lop1/lop2 (15)</th>
        <th scope="col">lth (16)</th>
        <th scope="col">Eta0/1/2 (17)</th>
        <th scope="col">L.Kink1-4 (18)</th>
        <th scope="col">Pmax/ Ppmax (19)</th>
        <th scope="col">Tith (1a)</th>
        <th scope="col">TEta0/1/2 (1B)</th>
        <th scope="col">TLKink1-4 (1C)</th>
        <th scope="col">lmax/ Pimax (20)</th>
        <th scope="col">Tipnt (21)</th>
        <th scope="col">TLp (22)</th>
        <th scope="col">Wop1 (26)</th>
        <th scope="col">Wop2 (27)</th>
    </tr>

    <tr>
        <th scope="col">TWop1 (28)</th>
        <th scope="col">Twop2 (29)</th>
        <th scope="col">Lp (2A)</th>
        <th scope="col">TVop1/ TVop2 (2B)</th>
        <th scope="col">Tlop1/Tlop2 (2C)</th>
        <th scope="col">Tpmax (2D)</th>
        <th scope="col">Tlmax (2E)</th>
        <th scope="col">dLp(P1)_1 (2F)</th>
        <th scope="col">Rank 2</th>
        <th scope="col">Rank 3</th>
        <th scope="col">Other</th>
        <th scope="col"></th>
        <th scope="col"></th>
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
        </tr>
        <?php } ?> 
    </tbody>
    </table>
</div>