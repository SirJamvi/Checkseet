<?= $this->extend('layout/templ-home'); ?>

<?= $this->section('content'); ?>
<main>

<?= $this->include('layout/navbar'); ?>

  <section class="py-2 container">
    <div class="col">
      <h2 class="fw-light">Edit Startup</h2>
      <input type="hidden" id="process-form" name="process-form" value=<?php echo '"'.$alldata[0]["process"].'"' ?>>
      <input type="hidden" id="number-edit" name="number-edit" value=<?php echo '"'.$alldata[0]["number"].'"' ?>>
    </div>
  </section>

  <section class="container-fluid">
    <form name="checksheet" action="<?php echo base_url();?>startup" method="POST">
      <?= csrf_field(); ?>
      <input type="hidden" name="type-input" value="manual">

      <div class="row">
      <div class="col-md-6">
          <!-- Date input automatic -->
          <div class="mb-3 row">
            <label for="date" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-6">
              <input type="text" class="form-control-plaintext" id="date" name="date" value="<?php echo date('Y-m-d');?>" readonly>
              <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
          </div>

          <!-- Device input -->
          <div class="mb-3 row">
            <label for="device-txt" class="col-sm-2 col-form-label">Device</label>
            <div class="col-sm-6">
              <input type="hidden" class="form-control" id="device-txt" name="device-txt" value="<?php echo $alldata[0]["device"] ?>" readonly>
              <input type="text" class="form-control" id="device-txt-name" name="device-txt-name" value="<?php echo $alldata[0]["device"] ?>" readonly>
            </div>
          </div>

          <!-- Process of Device -->
          <div class="mb-3 row">
            <label for="process-txt" class="col-sm-2 col-form-label">Process</label>
            <div class="col-sm-6">
              <input type="hidden" class="form-control" id="process-txt" name="process-txt" value="<?php echo $alldata[0]["process"] ?>" readonly>
              <input type="text" class="form-control" id="process-txt-name" name="process-txt-name" value="<?php echo $alldata[0]["name"] ?>" readonly>
            </div>
          </div>

          <!-- Model name -->
          <div class="mb-3 row">
            <label for="model-txt" class="col-sm-2 col-form-label">Model Name</label>
            <div class="col-sm-6">
              <input type="hidden" class="form-control" id="model-txt" name="model-txt" value="<?php echo $alldata[0]["model"] ?>" >
              <input type="text" class="form-control" id="model-txt-name" name="model-txt-name" value="<?php echo $alldata[0]["model"] ?>" >
            </div>
          </div>

          <!-- Doc No -->
          <div class="mb-3 row">
            <label for="machno" class="col-sm-2 col-form-label">Doc. No</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="docno" value="<?php echo $alldata[0]["docno"] ?>" readonly>
            </div>
          </div>

          
        </div>
        <div class="col-md-6">
          <!-- Lot Number -->
          <div class="mb-3 row">
            <label for="lotno-txt" class="col-sm-2 col-form-label">Lot Number</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="lotno-txt" name="lotno-txt" value="<?php echo $alldata[0]["lotno"] ?>" >
            </div>
          </div>

          <div class="mb-3 row">
            <label for="machno-txt" class="col-sm-2 col-form-label">Machine Number</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="machno-txt" name="machno-txt" value="<?php echo $alldata[0]["machno"] ?>" >
            </div>
          </div>

          <div class="mb-3 row">
            <label for="empid-txt" class="col-sm-2 col-form-label">Operator</label>
            <div class="col-sm-6">
              <div class="input-group mb-1" id="empid-div1">
                <span class="input-group-text" id="basic-addon1">Emp. ID :</span>
                <input type="number" class="form-control" id="empid-txt" name="empid-txt" value="<?= $alldata[0]["empid"]?>" onkeyup="empAuto()" onkeydown="return (event.keyCode!=13);" placeholder="Please type in 6 digit" required>           
              </div>
              <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon2">Shift----:</span>
                <input type="number" class="form-control" id="shift-txt" name="shift-txt" value="<?= $alldata[0]["shift"]?>" placeholder="1 OR 2 OR 3">
              </div>
              <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon3">Group--:</span>
                <input type="text" class="form-control" id="group-txt" name="group-txt" value="<?= $alldata[0]["group"]?>" placeholder="Example: 1S2GW1">
              </div>
            </div>
            <input type="hidden" name="name-operator" id="name-operator">
          </div>

          <div class="form-control alert-success invisible" id="empid-lbl" name="empid-lbl" >
            <span style="color:#dc143c;text-align:justify;">Perhatian!<br>Tidak ditemukan data kehadiran untuk ID karyawan di atas. Mohon ketik dengan benar. Jika jadwal Anda saat ini tidak sesuai, silakan hubungi bagian GA/P atau masukkan shift & group di atas secara manual.</span>
          </div> 

        </div>
        <?php 
          if (session()->getFlashdata('message')){ 
            echo '<p id=msgsuccess class="invisible">' . session()->getFlashdata('message').'</p>'; 
          }else{ 
            echo '<p id=msgsuccess class="invisible">Kosong</p>'; ;}
        ?>

      <!-- Input Form inject using javascript -->
      <div id="modal" class="">
        
      </div>

      </div>
      <button type="submit" class="btn btn-primary" id="submit" onclick="return confirm('Apakah kamu yakin?');">Submit</button>
    </form>
  </section>
  
  <link rel="stylesheet" href="/assets/css/jquery-ui.css">
  <link rel="stylesheet" href="/assets/css/global.css">
  <script src="/assets/js/jquery-3.7.1.js"></script>
  <script src="/assets/js/jquery-3.7.1.min.js"></script>
  <script src="/assets/js/jquery-ui.js"></script>
  <script src="/assets/js/edit-startup.js"></script>
  <script src="/assets/js/form/test.js"></script>
</main>
<?= $this->endSection(); ?>