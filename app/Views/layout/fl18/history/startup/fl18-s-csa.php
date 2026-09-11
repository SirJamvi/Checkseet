<?php require_once(dirname( __FILE__ ). '/'.'../../../fillHistory.php'); ?>
<div class="table-responsive mt-3" id="fl18-s-csa">
<?= csrf_field(); ?>
<?php $lenData = count($alldata) ?>
<input type="hidden" id="cnt-table" value="1">
<table class="table table-bordered table-hover" id="table1">
    <thead align="center">
      <tr>
        <th colspan=<?= 8+$lenData ?> scope="col"><?php echo nl2br("TIE BAR CUT MACHINE START UP")?></th>
      </tr>
      <tr>
        <th rowspan="2" >No.</th>
        <th rowspan="2" >Date</th>
        <th rowspan="2" >Operator</th>
        <th rowspan="2" >Shift</th>
        <th colspan="5" scope="col">Start Up Check item</th>
        <th rowspan="2">Note</th>
      </tr>
      <tr>
        <th scope="col">A*</th>
        <th scope="col">B*</th>
        <th scope="col">C*</th>
        <th scope="col">D*</th>
        <th scope="col">E*</th>
      </tr>
    </thead>

    <tbody>
    <?php for($i = 0; $i < count($alldata); $i=$i+1) { ?>
        <tr>
            <td rowspan="3" ><?= $i+1; ?></td>
            <td rowspan="3" ><?= date('d/m/Y', strtotime((string)$alldata[$i]['created_at'])); ?></td>
            <td rowspan="3" ><?= (string)$alldata[$i]['name'];?></td>
            <th scope="row">A</th>
            <td rowspan="1" ><?= (string)$alldata[$i]['par001']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par002']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par003']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par004']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par005']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par006']; ?></td>
        </tr>
        <tr>
            <th scope="row">B</th>
            <td rowspan="1" ><?= (string)$alldata[$i]['par007']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par008']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par009']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par010']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par011']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par012']; ?></td>
        </tr>
        <tr>
            <th scope="row">C</th>
            <td rowspan="1" ><?= (string)$alldata[$i]['par013']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par014']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par015']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par016']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par017']; ?></td>
            <td rowspan="1" ><?= (string)$alldata[$i]['par018']; ?></td>
        </tr>
    <?php } ?>   
    </tbody>
  </table>
  <div class="note">
    <h3>Note :</h3>
    <p>
        * : Beri tanda (V) jika kondisi OK/Good atau sudah dilakukan dan beri tanda (X) jika No Good pada hasil start up check
    </p>
    <p>
        Isi bagian note (catatan) apabila melakukan penggantian part, melakukan adjusment, atau terjadi kondisi yang tidak sesuai dengan standart
    </p>
    <h3>Start up check item :</h3>
    <p>
        A. Cleaning of Cap Set Jigs
        <br>
        Standard : Bersihkan jig Cap Set menggunakan alkohol
    </p>
    <p>
        B. Cleaning of strength measurement machine
        <br>
        Standard : Bersihkan mesin pengukur kekuatan Cap menggunakan alkohol
    </p>
    <p>
        C. Check Ionizer
        <br>
        Standard : Pastikan udara berhembus dari ionizer dan mengarah ke frame yang sedang dikerjakan
    </p>
    <p>
        D. Confirmation of strength measurement machine
        <br>
        Standard : Pastikan mesin bisa dipakai untuk mengukur kekuatan Cap
    </p>
    <p>
        E. Pemeriksaan grounding (Baut pengunci di conductive mat, banana plug, koneksi kabel grounding)
        <br>
        Standard : Terpasang bagus/tidak longgar, lepas, putus.
    </p>
</div>