<?php require_once(dirname( __FILE__ ). '/'.'../../../fillHistory.php'); ?>
<div class="table-responsive mt-3" id="fl18-s-bi3">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("START UP CHECK SHEET OF BURN IN BOX MACHINE (2)")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="3">Start up Checking Item</th>
            <th rowspan="3">Standard</th>
            <th rowspan="3">Box ID</th>
            <th colspan="3">Hasil Start Up Check</th>
        </tr>

        <tr>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
            <?php } ?>
        </tr>
        <tr>

            <th >Pin Judge</th>
            <th >Temp Judge</th>
            <th >Remark</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td >* Memeriksa kondisi contact pin filter <br> Checking contact pin filter <br> * Memeriksa kondisi temperatur box pada PC</td>
            <td >Periksa contact posisi pin filter clamp. <br> Apakah ada cacat (bengkok, patah) <br> Periksa kondisi temperatur burn in box, apabila suhu operasi < 60°C stop proses pada box yang bermasalah tersebut</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par001']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par002']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par003']; ?></td>
            <?php } ?>         
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par004']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td colspan="3">Note</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="3"><?= (string)$alldata[$i]['par005']; ?></td>
            <?php } ?>
        </tr>
    </tbody>
    
    </table>
    
    <div class="note">
        <h3>Ket :</h3>
        <p>
            - * Beri tanda (V) jika kondisi OK / Good dan beri tanda (X) jika hasil pemeriksaan NG
        </p>
        <p>
            - Pengukuran temperatur dilakukan setelah 2 jam dari start burn in atau dengan memeriksa burn in box yang sedang beroperasi.
        </p>
        <p>
            - Pengecekan temperatur menggunakan monitor PC Burn In
        </p>
        <p>
            - Jika ditemukan box burn in yang temperaturnya < 60°C, maka box tersebut NG/tidak boleh digunakan, catat suhu di kolom "Remark" dan segera hubungi penanggung jawab proses.
        </p>
        <p>
            - Kolom "Time" diisikan secara otomatis oleh sistem saat dilakukan submit
        </p>
    </div>
</div>