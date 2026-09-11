<div class="table-responsive w-auto mt-3" id="sl56-p-pc">
<input type="hidden" id="cnt-table" value="1">
<?= csrf_field(); ?>
  <table class="table table-bordered table-hover"  id="table1"
    >
    <thead align="center">
      <tr>
        <th colspan="25" scope="col"><?php echo nl2br("PACKING")?></th>
      </tr>
    </thead>
    <thead align="center">
      <tr>
        <th rowspan="2" >No.</th>
        <th rowspan="2" >Mch. No.</th>         
        <th rowspan="2" >Model</th>
        <th rowspan="2" >Lot No.</th> 
        <th rowspan="2" >Date</th> 
        <th rowspan="2" >Operator</th> 
        <th rowspan="2" >Time</th> 
        <th rowspan="2" >Jumlah(pcs)</th>
        <th rowspan="2" >Packing(pcs)</th>
        <th rowspan="2" >Stock Sisa(pcs)</th>
        <th rowspan="2" >Shipping Qty = 2000pcs</th>
        <th colspan="2" >Pengecekan</th>
        <th rowspan="2" >Shipping Lot No</th>
        <th rowspan="2" >Keterangan</th>
        <th rowspan="2" >Cek (by foreman)</th>
      </tr>
  
      <tr>
        <th class="input-form"  >Kode Marking</th>
        <th class="input-form"  >Label</th>
      </tr>
    
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($alldata); $i=$i+2) { ?>
            <tr>
                <td rowspan="2" ><?= $i/2+1; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['machno']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['model']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['lotno']; ?></td>
                <td rowspan="2" ><?= date('d/m/Y', strtotime((string)$alldata[$i]['par008'])); ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['name']."(".(string)$alldata[$i]['shift'].")"; ?></td>
                <td rowspan="2" ><?= date('H:i', strtotime((string)$alldata[$i]['par008'])); ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par013']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par014']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par015']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par035']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par036']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par037']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par038']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par039']; ?></td>
                <td rowspan="2" ><?= (string)$alldata[$i]['par040']; ?></td>
            </tr>
            <?php } ?>
    </tbody>
  </table>
</div>