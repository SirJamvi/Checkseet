<div class="table-responsive mt-3" id="fl18-s-ft2">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
        <tr>
            <th colspan="19" scope="col"><?php echo nl2br("PERIODICAL CHECK SHEET OF FINAL TESTING MACHINE")?></th>
        </tr>
    </thead>
    <thead align="center">
        <tr>
            <th scope="col" rowspan="2">No</th>
            <th scope="col" rowspan="2">Periodical Check Item</th>
            <th scope="col" rowspan="2">Standard</th>
            <th scope="col" rowspan="2">Periode
            <th scope="col" colspan=<?= $lenData ?>>Date/Month/Year and Judgment (J)</th>
        </tr>
        <tr>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
            <?php } ?>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td >1</td>
            <td >Mengganti contact probe pin</td>
            <td >Ganti contact probe pin pada <br> setiap bagian pengukuran</td>
            <td >1 bulan</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par001']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par002']; ?></td>
            <?php } ?>
        </tr>

        <tr>
            <td >2</td>
            <td >Membersihkan saringan udara (air filter)</td>
            <td >Bersihkan saringan udara pada <br> bagian PP1 dan PP2 atau ganti <br> bila tidak bisa dibersihkan lagi</td>
            <td >1 bulan</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par003']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par004']; ?></td>
            <?php } ?>
        </tr>
        
        <tr>
            <td >3</td>
            <td>Memeriksa mur utama dan baut</td>
            <td >Kencangkan mur utama dan baut <br> bila longgar</td>
            <td >6 bulan</td>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par005']; ?></td>
            <?php } ?>
            <?php for($i = 0; $i < $lenData; $i=$i+1) { ?>
                <td colspan="col"><?= (string)$alldata[$i]['par006']; ?></td>
            <?php } ?>
        </tr>
    </tbody>
    
    </table>
    
    <div class="note">
        <h3>Catatan</h3>
        <p>
            - Fill judgment with : V = GOOD, A = Adjust, CP = Change Part, WP = Waiting Part
        </p>
    </div>
</div>