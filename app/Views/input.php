<?= $this->extend('layout/templ-home'); ?>

<?= $this->section('content'); ?>
<main>
<link rel="stylesheet" href="assets/css/jquery-ui.css">
<link rel="stylesheet" href="assets/css/global.css">
<!-- CSS Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery hanya dimuat SATU kali -->
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script src="<?= base_url('assets/js/form/test.js?v=' . (file_exists(FCPATH . 'assets/js/form/test.js') ? filemtime(FCPATH . 'assets/js/form/test.js') : '20261103')); ?>"></script>
<!-- JS Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <?= $this->include('layout/navbar'); ?>

  <form name="checksheet" id="form-action" action="<?= base_url('input') ?>" method="POST">
  <?= csrf_field(); ?>
  <?php
    $session = \Config\Services::session();
    $nowHour = (int)date('H');
    $isShiftCTime = ($nowHour >= 0 && $nowHour < 7);
    $today = date('Y-m-d');
    $yesterday = date('Y-m-d', strtotime('-1 day'));
    $initialDate = $isShiftCTime ? $yesterday : $today;
  ?>

    <div class="container-fluid">
      <div class="card shadow mb-5">
        <div class="card-header py-3">
          <h3 class="m-0 font-weight-bold">Input Checksheet</h3>
        </div>
        <input type="hidden" name="cnt-error-input" id="cnt-error-input" value=0>

        <div class="card-body">
          
          <div class="alert <?= $isShiftCTime ? 'alert-warning' : 'alert-danger' ?> shadow-sm border-0 mb-4" role="alert" style="border-left: 5px solid <?= $isShiftCTime ? '#ffc107' : '#dc3545' ?>; background-color: <?= $isShiftCTime ? '#fffdf0' : '#fff5f5' ?>;">
            <div class="d-flex align-items-center">
                <i class="fas <?= $isShiftCTime ? 'fa-moon text-warning' : 'fa-exclamation-triangle text-danger' ?> fa-2x me-3"></i>
                <div>
                    <h6 class="alert-heading font-weight-bold mb-1 <?= $isShiftCTime ? 'text-dark' : 'text-danger' ?>">
                        <?= $isShiftCTime ? 'SISTEM SHIFT C AKTIF (00:00 - 06:59 WIB)' : 'PERINGATAN PENTING & ATURAN SHIFT!' ?>
                    </h6>
                    <p class="mb-0 text-dark small">
                        <?php if ($isShiftCTime): ?>
                            Saat ini berada di rentang waktu <b>Shift C (Malam)</b>. Sistem secara <b>otomatis memilih Shift C</b> dan <b>memundurkan Tanggal Input ke tanggal operasional kemarin (<?= date('d/m/Y', strtotime($yesterday)) ?>)</b> serta memvalidasi penginputan agar tidak salah tanggal.
                        <?php else: ?>
                            Harap pastikan isian <b>Tanggal Input</b> dan pilihan <b>Shift Karyawan (A / B / C)</b> sudah benar sebelum submit. Untuk <b>Shift C (Malam)</b> yang melintasi tengah malam (pukul 00:00 - 06:59 WIB), sistem otomatis mengunci Shift C dan memundurkan Tanggal ke H-1.
                        <?php endif; ?>
                    </p>
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3 row">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-6">
                  <input type="date" class="form-control font-weight-bold" id="date" name="date" 
                         value="<?= $initialDate ?>" 
                         min="<?= $yesterday ?>" 
                         max="<?= $today ?>" required>
                  <small id="date-shiftc-hint" class="text-danger font-weight-bold <?= $isShiftCTime ? '' : 'd-none' ?>">
                    * Shift C (00:00 - 06:59 WIB): Tanggal operasional otomatis tanggal kemarin (<?= date('d/m/Y', strtotime($yesterday)) ?>)
                  </small>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="device-txt" class="col-sm-2 col-form-label">Device</label>
                <div class="col-sm-6">
                  <select class="form-control" id="device-txt" name="device-txt" onchange="updateDevice()" required>
                    <option class="dropdown-item" value="-">choose device</option>
                    <?php
                      if($session->get('role')=="sl"){
                        echo '
                          <option value="sl33">Single Laser 3.3</option>
                          <option value="sl38">Single Laser 3.8</option>
                          <option value="sl56">Single Laser 5.6</option>
                          <option value="sl90">Single Laser 9.0</option>
                        ';
                      }
                      else if($session->get('role')=="fl"){
                        echo '
                          <option value="fl18">Frame Laser 1.8</option>
                        ';
                      }
                      else if($session->get('role')=="all"){
                        echo '
                          <option value="sl33">Single Laser 3.3</option>
                          <option value="sl38">Single Laser 3.8</option>
                          <option value="sl56">Single Laser 5.6</option>
                          <option value="sl90">Single Laser 9.0</option>
                          <option value="fl18">Frame Laser 1.8</option>
                        ';
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="process-txt" class="col-sm-2 col-form-label">Doc. Type</label>
                <div class="col-sm-6">
                  <select class="form-control" id="type-process-txt" name="type-process-txt" onchange="updateDevice()" required>
                    <option class="dropdown-item" value="-">choose type document</option>
                    <option value="production">Production Control Sheet</option>
                    <option value="startup">Startup Control Sheet</option>
                    <option value="foregoing">Foregoing Control Sheet</option>
                  </select>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="process-txt" class="col-sm-2 col-form-label">Process</label>
                <div class="col-sm-6">
                  <select class="form-control" id="process-txt" name="process-txt" required>
                  </select>
                </div>
              </div>

              <!-- UPDATE: Tambahkan class text-danger pada span bintang Model Name -->
              <div class="mb-3 row">
                <label for="model-txt" class="col-sm-2 col-form-label">Model Name <span id="req-model" class="text-danger d-none">*</span></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="model-txt" name="model-txt" onkeyup="this.value = this.value.toUpperCase()" autofocus>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="machno" class="col-sm-2 col-form-label">Doc. No</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control-plaintext" id="docno" value="-" readonly>
                </div>
              </div>

              <button type="button" class="btn btn-lg btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">
                Catatan
              </button>

              <div class="modal" id="myModal">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="catatan-modal-header">Catatan</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="catatan-modal-body">
                      Modal body..
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <!-- UPDATE: Tambahkan class text-danger pada span bintang Lot Number -->
              <div class="mb-3 row">
                <label for="lotno-txt" class="col-sm-2 col-form-label">Lot Number <span id="req-lot" class="text-danger d-none">*</span></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="lotno-txt" name="lotno-txt" onkeyup="this.value = this.value.toUpperCase()">
                </div>
              </div>

              <div class="mb-3 row">
                <label for="machno-txt" class="col-sm-2 col-form-label">Machine Number <span style="color:red;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-control" id="machno-txt" name="machno-txt">
                    <option value="">-- Ketik atau Pilih Machine Number --</option>
                  </select>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="revisi-txt" class="col-sm-2 col-form-label">Revisi</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="revisi-txt" name="revisi-txt" readonly>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="empid-txt" class="col-sm-2 col-form-label">Operator</label>
                <div class="col-sm-6">
                  <div class="input-group mb-1" id="empid-div1">
                    <span class="input-group-text" id="basic-addon1">Emp. ID :</span>
                    <input type="number" class="form-control" id="empid-txt" value="<?= $session->get('empid') ?>" name="empid-txt" readonly required>
                  </div>
                  <div class="input-group mb-1">
                    <span class="input-group-text" id="basic-addon3">Name--:</span>
                    <input type="text" class="form-control" id="name-txt" name="name-txt" value="<?= $session->get('name') ?>" readonly>
                  </div>
                  <div class="input-group mb-1">
                    <span class="input-group-text" id="basic-addon-pos">Position:</span>
                    <input type="text" class="form-control" id="position-txt" name="position-txt" value="<?= $session->get('positionid') ?>" readonly>
                  </div>
                  
                  <div class="input-group mb-1 border rounded" style="border-color: #dc3545 !important; border-width: 2px !important;">
                    <span class="input-group-text text-danger font-weight-bold" id="basic-addon2" style="background-color: #fff5f5;">Shift----:</span>
                    <select class="form-control font-weight-bold" id="shift-txt" name="shift-txt" required>
                        <option value="">Pilih Shift (Wajib)</option>
                        <option value="A" <?= $isShiftCTime ? 'disabled' : '' ?>>A (Pagi)</option>
                        <option value="B" <?= $isShiftCTime ? 'disabled' : '' ?>>B (Sore)</option>
                        <option value="C" <?= $isShiftCTime ? 'selected' : '' ?>>C (Malam)</option>
                    </select>
                  </div>

                  <div class="input-group mb-1">
                    <span class="input-group-text" id="basic-addon3">Group--:</span>
                    <input type="text" class="form-control" id="group-txt" name="group-txt" placeholder="Contoh: 1S2GW1" onkeyup="this.value = this.value.toUpperCase()">
                  </div>
                  <input type="hidden" name="name-operator" id="name-operator">
                </div>
              </div>

              <div class="form-control alert-success invisible" id="empid-lbl" name="empid-lbl">
                <span style="color:#dc143c;text-align:justify;">Perhatian!<br>Data shift/group untuk ID karyawan di atas tidak ditemukan atau belum lengkap. Silakan isi shift &amp; group di atas secara manual, atau hubungi bagian GA/P jika jadwal Anda tidak sesuai.</span>
              </div>

            </div>

          </div>
          <?php
            if (session()->getFlashdata('message')){
              echo '<p id=msgsuccess class="invisible">' . session()->getFlashdata('message').'</p>';
            }else{
              echo '<p id=msgsuccess class="invisible">Kosong</p>';
            }
          ?>
          <div id="standby-wrapper" class="card border-warning mb-3 shadow-sm" style="display: none; background: #fffdf5; border-radius: 6px;">
            <div class="card-body py-2 px-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
              <div class="d-flex align-items-center">
                <div class="form-check form-switch me-2 mb-0" style="min-height: auto;">
                  <input class="form-check-input" type="checkbox" id="is-standby" name="is_standby" value="1" style="cursor: pointer; width: 2em; height: 1.1em; margin-top: 0.15em;">
                </div>
                <div>
                  <label for="is-standby" class="form-check-label fw-bold text-dark mb-0 small" style="cursor: pointer;">
                    <i class="fas fa-power-off text-warning me-1"></i> Mesin Stand By
                  </label>
                  <span class="text-muted ms-2 d-none d-sm-inline" style="font-size: 0.78rem;">
                    (Aktifkan jika mesin idle/standby: parameter otomatis "-", Note wajib diisi)
                  </span>
                </div>
              </div>
              <div id="standby-badge" class="badge bg-warning text-dark px-2 py-1 fw-bold shadow-sm" style="display: none; font-size: 0.75rem;">
                <i class="fas fa-pause-circle me-1"></i> STAND BY AKTIF
              </div>
            </div>
          </div>

          <div id="form-input" class="">

          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-lg btn-primary btn-block mx-auto" id="submit" onclick="return checkSubmit();">Submit</button>
          </div>

        </div>
      </div>
</div>
  </form>

</main>
<script>
function isTimeShiftC() {
    var now = new Date();
    var hour = now.getHours();
    return (hour >= 0 && hour < 7);
}

function getYesterdayStr() {
    var d = new Date();
    d.setDate(d.getDate() - 1);
    var month = '' + (d.getMonth() + 1);
    var day = '' + d.getDate();
    var year = d.getFullYear();
    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;
    return [year, month, day].join('-');
}

function applyShiftCRules() {
    if (isTimeShiftC()) {
        var yDate = getYesterdayStr();
        $('#shift-txt').val('C');
        $('#shift-txt option[value="A"]').prop('disabled', true);
        $('#shift-txt option[value="B"]').prop('disabled', true);
        $('#shift-txt option[value="C"]').prop('disabled', false).prop('selected', true);
        $('#date').val(yDate);
        $('#date-shiftc-hint').removeClass('d-none');
    }
}

$(document).ready(function()
{
    $('#machno-txt').select2({
        placeholder: "-- Ketik atau Pilih Machine Number --",
        allowClear: true,
        width: '100%'
    });

    updateDevice();
    $('#submit').hide();
    if($('#msgsuccess').html()!="Kosong"){
        alert($('#msgsuccess').html());
    }

    applyShiftCRules();

    $('#shift-txt').on('change', function() {
        if (isTimeShiftC()) {
            if ($(this).val() !== 'C') {
                alert("PERHATIAN: Pada pukul 00:00 - 06:59 WIB, Shift WAJIB dipilih Shift C (Malam).\nPilihan shift otomatis dikembalikan ke Shift C.");
                $(this).val('C');
            }
            $('#date').val(getYesterdayStr());
        }
    });

    $('#date').on('change', function() {
        if (isTimeShiftC() && $('#shift-txt').val() === 'C') {
            var yDate = getYesterdayStr();
            if ($(this).val() !== yDate) {
                alert("PERHATIAN: Pada pukul 00:00 - 06:59 WIB untuk Shift C (Malam), Tanggal Input WAJIB dimundurkan 1 hari (" + yDate + ") ke tanggal operasional shift kemarin.\nTanggal otomatis dikembalikan.");
                $(this).val(yDate);
            }
        }
    });

    $('#process-txt').change(function()
    {
        updateInput();
        updateDocNo();
        updateMachine();
    });

    $('#type-process-txt').change(function(){
        document.getElementById("form-action").action = "<?= base_url(); ?>" + document.getElementById("type-process-txt").value;
    });

    empAuto('#empid-txt','#shift-txt','#group-txt','#name-txt','empid-lbl');
});

function checkSubmit() {
    var machno = $('#machno-txt').val();
    if (!machno || machno === "") {
        alert("GAGAL: Machine Number WAJIB dipilih atau diisi sebelum Submit!");
        return false;
    }

    if (isTimeShiftC()) {
        var curShift = $('#shift-txt').val();
        if (curShift !== 'C') {
            alert("GAGAL: Pada pukul 00:00 - 06:59 WIB, Shift WAJIB dipilih Shift C (Malam)!");
            $('#shift-txt').val('C').focus();
            return false;
        }
        var yDate = getYesterdayStr();
        var curDate = $('#date').val();
        if (curDate !== yDate) {
            alert("GAGAL: Pada pukul 00:00 - 06:59 WIB untuk Shift C, Tanggal Input WAJIB dimundurkan 1 hari ke tanggal operasional kemarin (" + yDate + ")!");
            $('#date').val(yDate).focus();
            return false;
        }
    }

    // UPDATE: Penjagaan Wajib Isi Model & Lot
    var docType = $('#type-process-txt').val();
    if(docType === 'production' || docType === 'foregoing') {
        if(!$.trim($('#model-txt').val())) {
            alert("GAGAL: Model Name WAJIB diisi untuk tipe dokumen " + (docType === 'production' ? 'Production' : 'Foregoing') + "!");
            $('#model-txt').focus();
            return false;
        }
        if(!$.trim($('#lotno-txt').val())) {
            alert("GAGAL: Lot Number WAJIB diisi untuk tipe dokumen " + (docType === 'production' ? 'Production' : 'Foregoing') + "!");
            $('#lotno-txt').focus();
            return false;
        }
    }

    if ($('#is-standby').is(':checked')) {
        var $noteInput = findNoteInput();
        if ($noteInput && (!$.trim($noteInput.val()) || $.trim($noteInput.val()) === '-')) {
            alert("GAGAL: Mesin dalam status STAND BY.\nKolom Catatan/Note WAJIB diisi keterangan/alasan standby!");
            $noteInput.focus();
            return false;
        }
        applyStandbyMode(true);
    }

    $('input[id$="_val"]').each(function() {
        var baseId = this.id.replace(/_val$/, '');
        if (typeof combineData === 'function') {
            combineData(baseId);
        }
    });

    $('#form-input input[name="machno-txt"]').remove();
    return confirm('Apakah kamu yakin data Shift Karyawan & Tanggal Input sudah BENAR?');
}

function empAuto(empIdTag, shiftTag, groupTag, nameTag, empIdlTag) {
    var empid = $.trim($(empIdTag).val());
    if (!empid) return;

    var warn = $('#' + empIdlTag);

    $.getJSON("<?= base_url('home/ajaxAutofill') ?>", { 'empid-txt': empid })
        .done(function (d) {
            if (d.found) {
                if (isTimeShiftC()) {
                    $(shiftTag).val('C');
                    $('#date').val(getYesterdayStr());
                } else if (d.acc && !$(shiftTag).val()) {
                    var shiftVal = d.acc.toString();
                    if(shiftVal === '1') $(shiftTag).val('A');
                    else if(shiftVal === '2') $(shiftTag).val('B');
                    else if(shiftVal === '3') $(shiftTag).val('C');
                    else $(shiftTag).val(shiftVal);
                }
                if (d.groupid && !$(groupTag).val()) $(groupTag).val(d.groupid);
                if (d.name && (!$(nameTag).val() || $(nameTag).val() === '-')) $(nameTag).val(d.name);
                if (d.acc && d.groupid) {
                    warn.removeClass('visible').addClass('invisible');
                } else {
                    warn.removeClass('invisible').addClass('visible');
                }
            } else {
                warn.removeClass('invisible').addClass('visible');
            }
        })
        .fail(function (xhr) {
            warn.removeClass('invisible').addClass('visible');
        });
}

function updateDevice() {
    var docType = $('#type-process-txt').val();
    var device = $('#device-txt').val();

    if(device === '-' || docType === '-') {
        $('#process-txt').empty().append('<option value="-">choose process</option>');
        return;
    }

    $.ajax({
        url: "<?php echo base_url();?>process/list?device="+device+"&type="+docType,
        dataType: 'JSON',
        success: function(data) {
            populateProcess(data);
        },
        error: function(xhr) {
            if (xhr.responseText) {
                try {
                    var data = JSON.parse(xhr.responseText);
                    if(data) { populateProcess(data); return; }
                } catch(e) {}
            }
        }
    });
}

function populateProcess(data) {
    var processDropdown = $('#process-txt');
    processDropdown.empty();
    if(data && data.length > 0) {
        $.each(data, function(index, item) {
            processDropdown.append(new Option(item.name, item.process_code));
        });
    } else {
        processDropdown.append(new Option("-- Data Kosong --", "-"));
    }
    updateInput();
    updateDocNo();
    updateMachine();
}

function updateMachine() {
    var processCode = document.getElementById("process-txt").value;
    var machineSelect = $('#machno-txt');

    machineSelect.empty().append('<option value="">-- Ketik atau Pilih Machine Number --</option>');

    if(!processCode || processCode === '-' || processCode === 'null'){
        machineSelect.trigger('change');
        return;
    }

    $.ajax({
        url: "<?php echo base_url();?>machine/list?process=" + processCode,
        dataType: 'JSON',
        success: function(data) {
            populateMachine(data, machineSelect);
        },
        error: function(xhr) {
            if(xhr.responseText) {
                try {
                    var data = JSON.parse(xhr.responseText);
                    if(data) { populateMachine(data, machineSelect); return; }
                } catch(e) {}
            }
            machineSelect.empty().append('<option value="">-- Terjadi Kesalahan --</option>');
            machineSelect.trigger('change');
        }
    });
}

function populateMachine(data, machineSelect) {
    if(data && data.length > 0) {
        for (let i = 0; i < data.length; i++) {
            var newOption = new Option(data[i].machine_name, data[i].machine_name, false, false);
            machineSelect.append(newOption);
        }
    } else {
         machineSelect.empty().append('<option value="">-- Mesin Belum Didaftarkan --</option>');
    }
    machineSelect.trigger('change');
}

function updateInput() {
    let typeProcess, device, process;
    process = document.getElementById("process-txt").value;

    if(!process || process === 'null' || process === '-'){
        var form_input = document.getElementById('form-input');
        $('#submit').hide();
        $('#standby-wrapper').hide();
        $('#is-standby').prop('checked', false);
        form_input.innerHTML = "";
        document.getElementById('revisi-txt').value = "";
        
        // Hapus styling bintang wajib jika kosong
        $('#req-model, #req-lot').addClass('d-none');
        document.getElementById('model-txt').required = false;
        document.getElementById('lotno-txt').required = false;
        return;
    }

    device = process.split("-")[0];
    let revField = document.getElementById('revisi-txt');

    // UPDATE: Set dynamic validation untuk prod & fore
    if(process.split("-")[1] == 'p'){
        document.getElementById('model-txt').disabled = false;
        document.getElementById('model-txt').required = true;
        document.getElementById('lotno-txt').disabled = false;
        document.getElementById('lotno-txt').required = true;
        $('#req-model, #req-lot').removeClass('d-none');
        
        typeProcess="production";
        $('#standby-wrapper').hide();
        $('#is-standby').prop('checked', false);
    }
    else if(process.split("-")[1] == 'f'){
        document.getElementById('model-txt').disabled = false;
        document.getElementById('model-txt').required = true;
        document.getElementById('lotno-txt').disabled = false;
        document.getElementById('lotno-txt').required = true;
        $('#req-model, #req-lot').removeClass('d-none');
        
        typeProcess="foregoing";
        $('#standby-wrapper').hide();
        $('#is-standby').prop('checked', false);
    }
    else{
        document.getElementById('model-txt').disabled = true;
        document.getElementById('model-txt').required = false;
        document.getElementById('lotno-txt').disabled = true;
        document.getElementById('lotno-txt').required = false;
        $('#req-model, #req-lot').addClass('d-none');
        
        typeProcess="startup";
        $('#standby-wrapper').slideDown();
    }

    document.getElementById("form-action").action = "<?= base_url(); ?>" + typeProcess;

    let cnt_error = document.getElementById("cnt-error-input");
    let submit_button = document.getElementById("submit");
    submit_button.disabled = false;
    cnt_error.value = 0;

    $.ajax({
        url: "<?php echo base_url();?>process/detail?process_code=" + process, 
        dataType: 'JSON',
        success: function(res) {
            if(res && res.revisi) {
                if (revField) revField.value = res.revisi;
            } else {
                if (revField) revField.value = "-";
            }
        },
        error: function() {
            var processValue = document.getElementById("process-txt");
            if(processValue.selectedIndex >= 0 && processValue.options[processValue.selectedIndex]){
                var text = processValue.options[processValue.selectedIndex].text; 
                var docno = text.split(" ")[0]; 
                var parts = docno.split("-");
                if (parts.length > 1) {
                    var lastPart = parts[parts.length - 1]; 
                    if (revField) revField.value = lastPart;
                } else {
                    if (revField) revField.value = "-";
                }
            }
        }
    });

    updateSetting(process);

    $.ajax({
        url: "<?php echo base_url();?>" + typeProcess + "/form?device=" + encodeURIComponent(device) + "&process=" + encodeURIComponent(process),
        type: "GET",
        success: function(response) {
            if (response && response.trim() !== "") {
                $('#submit').show();
                $('#form-input').html(response);
                var processValue = document.getElementById("process-txt");
                var header_modal = document.getElementById('catatan-modal-header');
                if(processValue && processValue.selectedIndex >= 0 && processValue.options[processValue.selectedIndex]){
                    header_modal.innerHTML = processValue.options[processValue.selectedIndex].text;
                }

                if ($('#is-standby').is(':checked')) {
                    applyStandbyMode(true);
                }
            } else {
                $('#submit').hide();
                $('#form-input').empty();
            }
        },
        error: function() {
            $('#submit').hide();
            $('#form-input').empty();
        }
    });
}

function updateSetting(processCode) {
    if(!processCode || processCode === 'null' || processCode === '-'){
        $('#catatan-modal-body').html("Pilih proses terlebih dahulu.");
        return;
    }
    $.ajax({
        url: "<?php echo base_url();?>input/note-form/" + encodeURIComponent(processCode),
        type: "GET",
        success: function(response) {
            $('#catatan-modal-body').html(response);
        },
        error: function() {
            $('#catatan-modal-body').html("Catatan tidak ditemukan untuk proses ini.");
        }
    });
}

function updateDocNo() {
    var docNo = document.getElementById("docno");
    var processValue = document.getElementById("process-txt");
    if(processValue.selectedIndex >= 0 && processValue.options[processValue.selectedIndex]){
        var text = processValue.options[processValue.selectedIndex].text;
        docNo.value=text.split(" ")[0];
    }
}

function findNoteInput() {
    var $trs = $('#form-input table tbody tr');
    var $targetTr = $trs.filter(function() {
        var labelText = $(this).children('td:not(:last-child)').text().toLowerCase();
        return labelText.indexOf('note') !== -1 || labelText.indexOf('catatan') !== -1;
    }).last();

    if ($targetTr.length) {
        var $inp = $targetTr.find('input[type="text"], textarea');
        if ($inp.length) return $inp;
    }

    var $lastTr = $trs.last();
    var $lastInp = $lastTr.find('input[type="text"], textarea');
    if ($lastInp.length) return $lastInp;

    return $('#form-input input[type="text"]').last();
}

function applyStandbyMode(isActive) {
    var $form = $('#form-input');
    if (!$form.length || !$form.children().length) return;

    var $note = findNoteInput();

    if (isActive) {
        $('#standby-badge').fadeIn();
        $('#standby-wrapper').css('background', 'linear-gradient(135deg, #fff3cd 0%, #ffeeba 100%)');

        $form.find('input, select, textarea').each(function() {
            var $el = $(this);

            if ($el.attr('type') === 'hidden' && (!$el.attr('name') || $el.attr('name').indexOf('par') !== 0)) {
                return;
            }

            if ($note && $el.is($note)) {
                $el.prop('readonly', false);
                $el.prop('required', true);
                if (!$.trim($el.val()) || $.trim($el.val()) === '-') {
                    $el.val('Mesin Stand By');
                }
                $el.css({
                    'border': '2px solid #ffc107',
                    'background-color': '#fffde7'
                });
                return;
            }

            if ($el.is('input[type="number"], input[type="text"], textarea')) {
                if ($el.attr('type') === 'number') {
                    $el.data('orig-type', 'number');
                    $el.attr('type', 'text');
                }
                if ($el.prop('required')) {
                    $el.data('orig-required', true);
                    $el.prop('required', false);
                }
                $el.val('-');
                $el.prop('readonly', true);
                $el.css({
                    'background-color': '#f8f9fa',
                    'color': '#495057'
                });
                this.dataset.hasError = "0";
            } else if ($el.is('select')) {
                if ($el.prop('required')) {
                    $el.data('orig-required', true);
                    $el.prop('required', false);
                }
                if (!$el.find('option[value="-"]').length) {
                    $el.append('<option value="-" class="standby-temp-opt">-</option>');
                }
                $el.val('-');
                $el.css({
                    'pointer-events': 'none',
                    'background-color': '#f8f9fa'
                });
                this.dataset.hasError = "0";
            }
        });

        $('#cnt-error-input').val(0);
        if (typeof changeDisableSubmit === 'function') {
            changeDisableSubmit(false);
        }
        $('#submit').prop('disabled', false);

        if ($note && $note.length) {
            $note.focus();
        }
    } else {
        $('#standby-badge').fadeOut();
        $('#standby-wrapper').css('background', 'linear-gradient(135deg, #fffcf0 0%, #fff3cd 100%)');

        $form.find('input, select, textarea').each(function() {
            var $el = $(this);

            if ($note && $el.is($note)) {
                $el.prop('required', false);
                if ($el.val() === 'Mesin Stand By') {
                    $el.val('');
                }
                $el.css({
                    'border': '',
                    'background-color': ''
                });
                return;
            }

            if ($el.data('orig-type') === 'number') {
                $el.attr('type', 'number');
                $el.removeData('orig-type');
            }
            if ($el.data('orig-required')) {
                $el.prop('required', true);
                $el.removeData('orig-required');
            }
            if ($el.val() === '-') {
                $el.val('');
            }
            $el.prop('readonly', false);
            $el.css({
                'background-color': '',
                'color': ''
            });

            if ($el.is('select')) {
                $el.find('.standby-temp-opt').remove();
                $el.css('pointer-events', '');
                if ($el.val() === '-') {
                    $el.val('');
                }
            }
        });

        if (typeof syncErrorCount === 'function') {
            syncErrorCount();
        }
    }
}

$(document).on('change', '#is-standby', function() {
    applyStandbyMode($(this).is(':checked'));
});
</script>
<?= $this->endSection(); ?>