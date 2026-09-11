<?php require_once(dirname( __FILE__ ). '/'.'../../../fillHistory.php'); ?>
<div class="table-responsive mt-3" id="fl18-s-bi2">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("START UP CHECK SHEET OF BURN IN BOX MACHINE")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th rowspan="3">No</th>
            <th rowspan="3">Start up Checking Item</th>
            <th rowspan="3">Standard</th>
            <th rowspan="3">Target</th>
            <th colspan="2">Hasil Start Up Check</th>
        </tr>

        <tr>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="2"><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
            <?php } ?>
        </tr>
        
        <tr>
            <th >Box ID</th>
            <th >J</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td >1</td>
            <td >Memeriksa kondisi kabel komunikasi <br> Checking communication cable juntcion</td>
            <td >Periksa bahwa indikator NG tidak muncul <br> pada komputer kontrol dibawah BOX ID</td>
            <td >All Box ID</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par001']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par002']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >2</td>
            <td >Membersihkan Mesin <br> Cleaning Machine</td>
            <td >Bersihkan mesin dari debu <br> dan device yang terjatuh</td>
            <td >All Box ID</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par003']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par004']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >3</td>
            <td >Konfirmasi Filter <br> The confirmation of the filter</td>
            <td >Pastikan kondisi filter : <br> Tidak kotor, rusak, lepas</td>
            <td >All Box ID</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par005']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par006']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >4</td>
            <td >Konfirmasi Perubahan kontak <br> The transformation confirmation of the contact</td>
            <td >Pastikan kondisi kontak tidak berubah bentuk</td>
            <td >All Box ID</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par007']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par008']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >5</td>
            <td >Konfirmasi Sekrup <br> Screw confirmation</td>
            <td >- Pastikan sekrup tidak rusak dan hilang <br> - Pastikan clamp sekrup tidak rusak dan hilang</td>
            <td >All Box ID</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par009']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par010']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >6</td>
            <td >Konfirmasi Lampu LED pada judgement board <br> The LED lighting confirmation of the judgment board</td>
            <td >Klik tombol periksa lampu</td>
            <td >All Box ID</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par011']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par012']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >7</td>
            <td >Konfirmasi peltier plate <br> The confirmation of the peltier plate</td>
            <td >Periksa pelat peltier tidak berpindah</td>
            <td >All Box ID</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par013']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par014']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >8</td>
            <td >* Pemeriksaan grounding <br> (Baut pengunci di conductive <br> mat, banana plug, koneksi kabel <br> grounding)</td>
            <td colspan="2">Terpasang bagus/tidak longgar, <br> lepas, putus</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="2"><?= (string)$alldata[$i]['par015']; ?></td>
            <?php } ?>
        </tr>
        
        <tr>
            <td colspan="4">Note</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="2"><?= (string)$alldata[$i]['par016']; ?></td>
            <?php } ?>
        </tr>
        </tr>
    </tbody>
    
    </table>
    
    <div class="note">
        <h3>Ket :</h3>
        <p>
            - J : Judgment -> Fill judgment with : V = GOOD, X = Not Good (NG)
        </p>
        <p>
            - * Beri tanda (V) jika kondisi OK/Good dan beri tanda (X) jika hasil pemeriksaan NG
        </p>
    </div>
</div>