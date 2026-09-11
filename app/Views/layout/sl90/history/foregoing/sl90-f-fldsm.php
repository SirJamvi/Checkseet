<div class="table-responsive mt-3" id="sl90-f-fldsm">
<input type="hidden" id="cnt-table" value="1">
    <table class="table table-bordered table-hover" id="table1">
        <thead align="center">
            <tr>
                <th colspan="15" scope="col"><?php echo nl2br("FOREGOING LDSM MACHINE")?></th>
            </tr>
        </thead>
        <thead align="center">
            <tr>
                <th rowspan="3" >No.</th>
                <th rowspan="3" >Model Name</th>
                <th rowspan="3" >Mch. No.</th>         
                <th rowspan="3" >Lot No.</th> 
                <th rowspan="3" >Shift</th>
                <th rowspan="3" >Group</th>
                <th class="input-form" colspan="6" scope="col">@Die Bonding Strength (2x Bonding Stage number (Back stage & Front stage) / Lot)</th>
                <th class="input-form" colspan="2" >@Wettability area > 90%</th>
                <th class="input-form" rowspan="3" >Remark</th>
            </tr>      
            <tr>
                <th class="input-form"  rowspan="2">Sample</th>
                <th class="input-form"  colspan="3" scope="col">LD Chip & SM</th>
                <th class="input-form"  colspan="2" scope="col">Submount & Stem</th>
                <th class="input-form"  rowspan="2" scope="col">LD Chip & SM</th>
                <th class="input-form"  rowspan="2" scope="col">Submount & Stem</th>
            </tr>   
            <tr>
                <th class="input-form" scope="col">Result</th>
                <th class="input-form" scope="col">Remain % LD</th>
                <th class="input-form" scope="col">Judge (OK/NG)</th>
                <th class="input-form" scope="col">Result</th>
                <th class="input-form" scope="col">Judge (OK/NG)</th>
            </tr>
        </thead>

        <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+4) { ?>
            <tr>
                <td rowspan="4" ><?= $i/4+1; ?></td>
                <td rowspan="4" ><?= $alldata[$i]['model']; ?></td>
                <td rowspan="4" ><?= $alldata[$i]['machno']; ?></td>
                <td rowspan="4" ><?= $alldata[$i]['lotno']; ?></td>
                <td rowspan="4" ><?= $alldata[$i]['shift']; ?></td>
                <td rowspan="4" ><?= $alldata[$i]['group']; ?></td>
                <td rowspan="1" ><b>Front 1</b></td>
                <td rowspan="1" ><?= $alldata[$i]['par017']; ?></td>
                <td rowspan="1" ><?= $alldata[$i]['par018']; ?></td>
                <td rowspan="1" ><?= $alldata[$i]['par035']; ?></td>
                <td rowspan="1" ><?= $alldata[$i]['par019']; ?></td>
                <td rowspan="1" ><?= $alldata[$i]['par036']; ?></td>
                <td rowspan="1" ><?= $alldata[$i]['par020']; ?></td>
                <td rowspan="1" ><?= $alldata[$i]['par021']; ?></td>
                <td rowspan="4" ><?= $alldata[$i]['par002']; ?></td>

            </tr>
            <tr>
                <td rowspan="1" ><b>Front 2</b></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par017']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par018']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par035']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par019']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par036']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par020']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+1]['par021']; ?></td>
            </tr>
            <tr>
                <td rowspan="1" ><b>Back 1</b></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par017']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par018']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par035']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par019']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par036']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par020']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+2]['par021']; ?></td>
            </tr>
            <tr>
                <td rowspan="1" ><b>Back 2</b></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par017']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par018']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par035']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par019']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par020']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par036']; ?></td>
                <td rowspan="1" ><?= $alldata[$i+3]['par021']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>