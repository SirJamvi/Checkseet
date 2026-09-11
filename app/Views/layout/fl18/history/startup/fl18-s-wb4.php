<div class="table-responsive mt-3" id="fl18-s-wb4">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
        <th colspan="19" scope="col"><?php echo nl2br("WIRE BOND MACHINE")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" >No</th>
            <th scope="col">Start up Check Item</th>
            <th colspan="3" scope="col" >Standard</th>
            <th colspan="3"scope="col" >Hasil Start Up</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td >1</td>
            <td >* Checking of gold wire route <br> (Pemeriksaan rute gold wire)</td>
            <td colspan="3">Lap dan bersihkan wire guide dan ring guide dengan bemcoat beralkohol</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par001']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >2</td>
            <td >@ Checking of Air Pressure <br> (Memeriksa nilai air)</td>
            <td colspan="3">0.35 ~ 0.55 Mpa</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par002']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >3</td>
            <td >@ Cleaning of Machine <br> (Membersihkan Mesin)</td>
            <td colspan="3">0.29 ~ 0.59 Mpa</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par003']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td ></td>
            <td ></td>
            <td colspan="3"></td>
            <td>A</td>
            <td>B</td>
            <td>C</td>
        </tr>

        <tr>
            <td >4</td>
            <td >@ Capilary usage count <br> Pemakaian capilary</td>
            <td colspan="3">600.000 wires</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par004']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+1]['par004']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+2]['par004']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td rowspan="12">5</td>
            <td rowspan="12">@ Checking of bonding parameter <br> (Memeriksa parameter bonding)</td>
            <td rowspan="6">LD</td>
            <td rowspan="2">Us-Pwr</td>
            <td >Pad : 30 ~ 70</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par005']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+1]['par005']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+2]['par005']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >Lead : 40 ~ 80</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par006']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+1]['par006']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+2]['par006']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td rowspan="2">Time</td>
            <td >Pad : 10 ~ 30</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par007']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+1]['par007']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+2]['par007']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >Lead : 10 ~ 30</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par008']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+1]['par008']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+2]['par008']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td rowspan="2">Force</td>
            <td >Pad : 40 ~ 60</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par009']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+1]['par009']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+2]['par009']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >Lead : 60 ~ 80</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par010']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+1]['par010']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+2]['par010']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td rowspan="6">Sic Mount</td>
            <td rowspan="2">Us-Pwr</td>
            <td >Pad : 30 ~ 70</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par011']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+1]['par011']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+2]['par011']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >Lead : 40 ~ 80</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par012']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+1]['par012']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+2]['par012']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td rowspan="2">Time</td>
            <td >Pad : 10 ~ 30</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par013']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+1]['par013']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+2]['par013']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >Lead : 10 ~ 30</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par014']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+1]['par014']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+2]['par014']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td rowspan="2">Force</td>
            <td >Pad : 40 ~ 60</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par015']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+1]['par015']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+2]['par015']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >Lead : 60 ~ 80</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par016']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+1]['par016']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+2]['par016']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >6</td>
            <td >@ Checking of Temperature (PV) </td>
            <td colspan="3">Temperature PV <br>: 175 ~ 185 °C </td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par017']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+1]['par017']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i+2]['par017']; ?></td>
            <?php } ?>
        </tr>
        
        <tr>
            <td >7</td>
            <td ># Pemeriksaan grounding (Baut pengunci di conductive mat, banana plug, koneksi kabel grounding)</td>
            <td colspan="3">Terpasang bagus /tidak longgar, lepas, putus.</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par018']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td colspan="5">Note</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par019']; ?></td>
            <?php } ?>
        </tr>
      </tbody>
    </table>
    <div class="note">
    <h3>Note :</h3>
    <p>
        # : Beri tanda (V) jika kondisi OK/Good dan beri tanda (X) jika hasil pemeriksaan NG
    </p>
</div>