<div class="table-responsive mt-3" id="sl33-s-wb">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
            <th colspan=<?= 4+$lenData ?> scope="col"><?php echo nl2br("WIRE BONDING MACHINE START UP CHECK SHEET (Type HN-942)\n (Single Laser 3.3)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" rowspan="2">No</th>
            <th scope="col" rowspan="2">Start up Check Item</th>
            <th scope="col" rowspan="2">Standard</th>
            <th scope="col" colspan=<?= $lenData ?>>Hasil Start Up Check</th>
        </tr>

        <tr>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= date('d/m/Y', strtotime($alldata[$i]['created_at'])); ?></td>
            <?php } ?>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td >1</td>
            <td >Memeriksa Rute Gold Wire <br> (Checking of Gold Wire Route)</td>
            <td >Bersihkan/lap wire guide dan ring guide dengan bemcoat dan alkohol</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= $alldata[$i]['par001']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td rowspan="2">2</td>
            <td rowspan="2">@ Memeriksa Vacuum Tension Pressure <br> (Checking of Vacuum Tension Pressure)</td>
            <td >Head A : 0.04 ~ 0.06 MPa</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= $alldata[$i]['par002']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >Head B : 0.04 ~ 0.06 MPa</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= $alldata[$i]['par003']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >3</td>
            <td >@ Memeriksa Tekanan Udara <br> (Checking of Air Pressure)</td>
            <td >0.34 ~ 0.59 Mpa</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= $alldata[$i]['par004']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >4</td>
            <td >Memeriksa Batas Pemakaian Cappilary <br> (Checking of Limit Usage Capillary) </td>
            <td >Check pemakaian gold wire</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= $alldata[$i]['par005']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >5</td>
            <td >Memeriksa Bonding Parameter <br> (Checking of Bonding Parameter) </td>
            <td >Parameter harus sesuai dengan kondisi <br> setup mesin (pada Work Instruction)</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= $alldata[$i]['par006']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >6</td>
            <td >Membersihkan Mesin <br> (Cleaning of the Machine) </td>
            <td >Bersihkan mesin dan lingkungan sekitarnya <br> dari debu dan kotoran</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= $alldata[$i]['par007']; ?></td>
            <?php } ?>
        </tr>
        
        <tr>
            <td colspan="3">Note</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= $alldata[$i]['par008']; ?></td>
            <?php } ?>
        </tr>
    </tbody>   
    </table>
</div>