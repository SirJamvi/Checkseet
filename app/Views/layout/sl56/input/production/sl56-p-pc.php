<div class="table-responsive" id="slht">
<?= csrf_field(); ?>
<input type="hidden" name="cnt-proses" value="1">
<input type="hidden" id="number-edit" name="number-edit" value=<?php if(isset($alldata)){echo $number;} ?>>
          <table class="table table-striped-columns" 
            >
            <thead align="center">
              <tr>
                <th colspan="19" scope="col"><?php echo nl2br("Packing")?></th>
              </tr>
            </thead>
            <thead align="center">
              <tr>
                <th class="input-form" rowspan="2" >Jumlah(pcs)</th>
                <th class="input-form" rowspan="2" >Packing(pcs)</th>
                <th class="input-form" rowspan="2" >Stock Sisa(pcs)</th>
                <th class="input-form" rowspan="2" >Shipping Qty = 2000pcs</th>
                <th class="input-form" colspan="2" >Pengecekan</th>
                <th class="input-form" rowspan="2" >Shipping Lot No</th>
                <th class="input-form" rowspan="2" >Keterangan</th>
                <th class="input-form" rowspan="2" >Cek (by foreman)</th>
              </tr>

              <tr>
                <th class="input-form"  >Kode Marking</th>
                <th class="input-form"  >Label</th>
              </tr>

            </thead>
            <tbody>
                <td>
                  <input type="number" step="0.01" class="form-control" id="par013" name="par013" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par013'];} ?>>
                </td>
                <td>
                  <input type="number" step="0.01" class="form-control" id="par014" name="par014" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par014'];} ?>>
                </td>
                <td>
                  <input type="number" step="0.01" class="form-control" id="par015" name="par015" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par015'];} ?>>
                </td>
                <td>
                  <input type="text" step="0.01" class="form-control" id="par035" name="par035" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par035'];} ?>>
                </td>
                <td>
                  <input type="text" step="0.01" class="form-control" id="par036" name="par036" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par036'];} ?>>
                </td>
                <td>
                  <input type="text" step="0.01" class="form-control" id="par037" name="par037" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par037'];} ?>>
                </td>
                <td>
                  <input type="text" step="0.01" class="form-control" id="par038" name="par038" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par038'];} ?>>
                </td>
                <td>
                  <input type="text" step="0.01" class="form-control" id="par039" name="par039" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par039'];} ?>>
                </td>
                <td>
                  <input type="text" step="0.01" class="form-control" id="par040" name="par040" <?php if(isset($alldata)){echo 'value='.$alldata[0]['par040'];} ?>>
                </td>
            </tbody>
          </table>
        </div>