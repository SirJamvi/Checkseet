<div class="table-responsive mt-3" id="sl33-f-fcs">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="5">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
            <th colspan=<?= 13+$lenData ?> scope="col"><?php echo nl2br("CAP SET MACHINE")?></th>
        </tr>  
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="3">No.</th>
            <th rowspan="3">Date</th>
            <th rowspan="3">Shift</th>
            <th rowspan="10">Alasan Inspeksi</th>
            <th colspan="14" scope="col">Off Center Measurement (2 sample x 12 stage x 4 side = 96 measurement)</th>
        </tr>
            <th colspan="14" scope="col">Peel Off Check (2 sample x 12 stage = 24 test)</th>
        <tr>
            <th colspan="2" scope="col">Object/Sample</th>
            <th >Stg. 1</th>
            <th >Stg. 2</th>
            <th >Stg. 3</th>
            <th >Stg. 4</th>
            <th >Stg. 5</th>
            <th >Stg. 6</th>
            <th >Stg. 7</th>
            <th >Stg. 8</th>
            <th >Stg. 9</th>
            <th >Stg. 10</th>
            <th >Stg. 11</th>
            <th >Stg. 12</th>
           
        </tr>
    </thead>
    <tbody>
    <?php for($i = 0; $i < count($alldata); $i=$i+5) { ?>
        <tr>
            <td rowspan="10"><?= $i+1; ?></td>
            <td rowspan="10"><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
            <td rowspan="10"><?= (string)$alldata[$i]['shift']; ?></td>
            <td rowspan="10"><?= (string)$alldata[$i]['par025']; ?></td>
            <td rowspan="5">Sample 1</td>
            <td >Side 1</td>
            <td><?= (string)$alldata[$i]['par001']; ?></td>
            <td><?= (string)$alldata[$i]['par002']; ?></td>
            <td><?= (string)$alldata[$i]['par003']; ?></td>
            <td><?= (string)$alldata[$i]['par004']; ?></td>
            <td><?= (string)$alldata[$i]['par005']; ?></td>
            <td><?= (string)$alldata[$i]['par006']; ?></td>
            <td><?= (string)$alldata[$i]['par007']; ?></td>
            <td><?= (string)$alldata[$i]['par008']; ?></td>
            <td><?= (string)$alldata[$i]['par009']; ?></td>
            <td><?= (string)$alldata[$i]['par010']; ?></td>
            <td><?= (string)$alldata[$i]['par011']; ?></td>
            <td><?= (string)$alldata[$i]['par012']; ?></td>
        </tr>
        <tr>
            <td >Side 2</td>
            <td><?= (string)$alldata[$i]['par013']; ?></td>
            <td><?= (string)$alldata[$i]['par014']; ?></td>
            <td><?= (string)$alldata[$i]['par015']; ?></td>
            <td><?= (string)$alldata[$i]['par016']; ?></td>
            <td><?= (string)$alldata[$i]['par017']; ?></td>
            <td><?= (string)$alldata[$i]['par018']; ?></td>
            <td><?= (string)$alldata[$i]['par019']; ?></td>
            <td><?= (string)$alldata[$i]['par020']; ?></td>
            <td><?= (string)$alldata[$i]['par021']; ?></td>
            <td><?= (string)$alldata[$i]['par022']; ?></td>
            <td><?= (string)$alldata[$i]['par023']; ?></td>
            <td><?= (string)$alldata[$i]['par024']; ?></td>
        </tr>
        <tr>
            <td >Side 3</td>
            <td><?= (string)$alldata[$i+1]['par001']; ?></td>
            <td><?= (string)$alldata[$i+1]['par002']; ?></td>
            <td><?= (string)$alldata[$i+1]['par003']; ?></td>
            <td><?= (string)$alldata[$i+1]['par004']; ?></td>
            <td><?= (string)$alldata[$i+1]['par005']; ?></td>
            <td><?= (string)$alldata[$i+1]['par006']; ?></td>
            <td><?= (string)$alldata[$i+1]['par007']; ?></td>
            <td><?= (string)$alldata[$i+1]['par008']; ?></td>
            <td><?= (string)$alldata[$i+1]['par009']; ?></td>
            <td><?= (string)$alldata[$i+1]['par010']; ?></td>
            <td><?= (string)$alldata[$i+1]['par011']; ?></td>
            <td><?= (string)$alldata[$i+1]['par012']; ?></td>
        </tr>
        <tr>
            <td >Side 4</td>
            <td><?= (string)$alldata[$i+1]['par013']; ?></td>
            <td><?= (string)$alldata[$i+1]['par014']; ?></td>
            <td><?= (string)$alldata[$i+1]['par015']; ?></td>
            <td><?= (string)$alldata[$i+1]['par016']; ?></td>
            <td><?= (string)$alldata[$i+1]['par017']; ?></td>
            <td><?= (string)$alldata[$i+1]['par018']; ?></td>
            <td><?= (string)$alldata[$i+1]['par019']; ?></td>
            <td><?= (string)$alldata[$i+1]['par020']; ?></td>
            <td><?= (string)$alldata[$i+1]['par021']; ?></td>
            <td><?= (string)$alldata[$i+1]['par022']; ?></td>
            <td><?= (string)$alldata[$i+1]['par023']; ?></td>
            <td><?= (string)$alldata[$i+1]['par024']; ?></td>
        </tr>
        <tr>
            <td >PEEL OFF</td>
            <td><?= (string)$alldata[$i+4]['par001']; ?></td>
            <td><?= (string)$alldata[$i+4]['par002']; ?></td>
            <td><?= (string)$alldata[$i+4]['par003']; ?></td>
            <td><?= (string)$alldata[$i+4]['par004']; ?></td>
            <td><?= (string)$alldata[$i+4]['par005']; ?></td>
            <td><?= (string)$alldata[$i+4]['par006']; ?></td>
            <td><?= (string)$alldata[$i+4]['par007']; ?></td>
            <td><?= (string)$alldata[$i+4]['par008']; ?></td>
            <td><?= (string)$alldata[$i+4]['par009']; ?></td>
            <td><?= (string)$alldata[$i+4]['par010']; ?></td>
            <td><?= (string)$alldata[$i+4]['par011']; ?></td>
            <td><?= (string)$alldata[$i+4]['par012']; ?></td>
        </tr>
        <tr>
            <td rowspan="5">Sample 2</td>
            <td >Side 1</td>
            <td><?= (string)$alldata[$i+2]['par001']; ?></td>
            <td><?= (string)$alldata[$i+2]['par002']; ?></td>
            <td><?= (string)$alldata[$i+2]['par003']; ?></td>
            <td><?= (string)$alldata[$i+2]['par004']; ?></td>
            <td><?= (string)$alldata[$i+2]['par005']; ?></td>
            <td><?= (string)$alldata[$i+2]['par006']; ?></td>
            <td><?= (string)$alldata[$i+2]['par007']; ?></td>
            <td><?= (string)$alldata[$i+2]['par008']; ?></td>
            <td><?= (string)$alldata[$i+2]['par009']; ?></td>
            <td><?= (string)$alldata[$i+2]['par010']; ?></td>
            <td><?= (string)$alldata[$i+2]['par011']; ?></td>
            <td><?= (string)$alldata[$i+2]['par012']; ?></td>
        </tr>
        <tr>
            <td >Side 2</td>
            <td><?= (string)$alldata[$i+2]['par013']; ?></td>
            <td><?= (string)$alldata[$i+2]['par014']; ?></td>
            <td><?= (string)$alldata[$i+2]['par015']; ?></td>
            <td><?= (string)$alldata[$i+2]['par016']; ?></td>
            <td><?= (string)$alldata[$i+2]['par017']; ?></td>
            <td><?= (string)$alldata[$i+2]['par018']; ?></td>
            <td><?= (string)$alldata[$i+2]['par019']; ?></td>
            <td><?= (string)$alldata[$i+2]['par020']; ?></td>
            <td><?= (string)$alldata[$i+2]['par021']; ?></td>
            <td><?= (string)$alldata[$i+2]['par022']; ?></td>
            <td><?= (string)$alldata[$i+2]['par023']; ?></td>
            <td><?= (string)$alldata[$i+2]['par024']; ?></td>
    
        </tr>
        <tr>
            <td >Side 3</td>
            <td><?= (string)$alldata[$i+3]['par001']; ?></td>
            <td><?= (string)$alldata[$i+3]['par002']; ?></td>
            <td><?= (string)$alldata[$i+3]['par003']; ?></td>
            <td><?= (string)$alldata[$i+3]['par004']; ?></td>
            <td><?= (string)$alldata[$i+3]['par005']; ?></td>
            <td><?= (string)$alldata[$i+3]['par006']; ?></td>
            <td><?= (string)$alldata[$i+3]['par007']; ?></td>
            <td><?= (string)$alldata[$i+3]['par008']; ?></td>
            <td><?= (string)$alldata[$i+3]['par009']; ?></td>
            <td><?= (string)$alldata[$i+3]['par010']; ?></td>
            <td><?= (string)$alldata[$i+3]['par011']; ?></td>
            <td><?= (string)$alldata[$i+3]['par012']; ?></td>
      
        </tr>
        <tr>
            <td >Side 4</td>
            <td><?= (string)$alldata[$i+3]['par013']; ?></td>
            <td><?= (string)$alldata[$i+3]['par014']; ?></td>
            <td><?= (string)$alldata[$i+3]['par015']; ?></td>
            <td><?= (string)$alldata[$i+3]['par016']; ?></td>
            <td><?= (string)$alldata[$i+3]['par017']; ?></td>
            <td><?= (string)$alldata[$i+3]['par018']; ?></td>
            <td><?= (string)$alldata[$i+3]['par019']; ?></td>
            <td><?= (string)$alldata[$i+3]['par020']; ?></td>
            <td><?= (string)$alldata[$i+3]['par021']; ?></td>
            <td><?= (string)$alldata[$i+3]['par022']; ?></td>
            <td><?= (string)$alldata[$i+3]['par023']; ?></td>
            <td><?= (string)$alldata[$i+3]['par024']; ?></td>
        </tr>
        <tr>
            <td >PEEL OFF</td>
            <td><?= (string)$alldata[$i+4]['par013']; ?></td>
            <td><?= (string)$alldata[$i+4]['par014']; ?></td>
            <td><?= (string)$alldata[$i+4]['par015']; ?></td>
            <td><?= (string)$alldata[$i+4]['par016']; ?></td>
            <td><?= (string)$alldata[$i+4]['par017']; ?></td>
            <td><?= (string)$alldata[$i+4]['par018']; ?></td>
            <td><?= (string)$alldata[$i+4]['par019']; ?></td>
            <td><?= (string)$alldata[$i+4]['par020']; ?></td>
            <td><?= (string)$alldata[$i+4]['par021']; ?></td>
            <td><?= (string)$alldata[$i+4]['par022']; ?></td>
            <td><?= (string)$alldata[$i+4]['par023']; ?></td>
            <td><?= (string)$alldata[$i+4]['par024']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
</div>