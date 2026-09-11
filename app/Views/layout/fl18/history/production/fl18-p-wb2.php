<div class="table-responsive mt-3" id="fl18-p-wb2">
<?= csrf_field(); ?>
<input type="hidden" id="cnt-table" value="1">
<?= csrf_field(); ?>
    <table class="table table-bordered table-hover" id="table1">
        <thead align="center">
            <tr>
                <th colspan="10" scope="col"><?php echo nl2br("INSPECTION WIRE BONDING CONTROL SHEET")?></th>
            </tr>
            <tr>
                <th rowspan="2" >No.</th>
                <th rowspan="2" >Mch. No.</th>         
                <th rowspan="2" >Model</th>
                <th rowspan="2" >Lot No.</th> 
                <th rowspan="2" >Shift</th>
                <th rowspan="2" >Group</th>
                <th scope="col" rowspan="2">WB No.</th>
                <th scope="col" colspan="4">Quantity</th>
                <th scope="col" colspan="32">Reject Item</th>
                <th rowspan="2">Note</th>
            </tr>
            <tr>
                <th scope="col">Input</th>
                <th scope="col">Output</th>
                <th scope="col">NG</th>
                <th scope="col">Yield </th>
                <th scope="col">GD1t Diff</th>
                <th scope="col">GD2d Diff</th>
                <th scope="col">GD2d Miss</th>
                <th scope="col">GD Loop NG</th>
                <th scope="col">GD No Wire</th>
                <th scope="col">GD1t Miss</th>
                <th scope="col">No GL2d GD</th>
                <th scope="col">LD1t Diff</th>
                <th scope="col">LD2d Diff</th>
                <th scope="col">LD1t Miss</th>
                <th scope="col">LD2d Miss</th>
                <th scope="col">LD Loop NG</th>
                <th scope="col">W Det Miss</th>
                <th scope="col">@LD Lack</th>
                <th scope="col">@Ld Dirt</th>
                <th scope="col">LD Peel</th>
                <th scope="col">LD Scratch</th>
                <th scope="col">LD Crack</th>
                <th scope="col">Ag Few</th>
                <th scope="col">Ag Much</th>
                <th scope="col">Ag NG</th>
                <th scope="col">Sic Slant</th>
                <th scope="col">Sic Peel</th>
                <th scope="col">Doublewire</th>
                <th scope="col">Wire Touch</th>
                <th scope="col">Wire Cut</th>
                <th scope="col">A Failure</th>
                <th scope="col">B Point NG</th>
                <th scope="col">Gold Thick</th>
                <th scope="col">Pos.Gold</th>
                <th scope="col">Sic Float</th>
                <th scope="col">Others</th>
            </tr>
        </thead>
        <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+4) { ?>
                <tr>
                <td rowspan="1" ><?= $i/4+1; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['machno']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['model']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['lotno']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['shift']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['group']; ?></td>
                <td rowspan="1" ><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par001']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par002']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par003']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par004']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par005']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par006']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par007']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par008']; ?></td>
                <td >
                  <?php
                    if((string)$alldata[$i]['par009']){
                      echo date('H:i', strtotime((string)$alldata[$i]['par009'])); 
                    }
                    else{
                      echo "";
                    }
                  ?>
                </td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par010']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par011']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par012']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par013']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par014']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par015']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par016']; ?></td>
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
                <td rowspan="1" ><?= (string)$alldata[$i]['par031']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par032']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par033']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par034']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par035']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par036']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par037']; ?></td>
                <td rowspan="1" ><?= (string)$alldata[$i]['par038']; ?></td>
                </tr>
            <?php }; ?>
            </tbody>
        </table>
    </div>
</div>