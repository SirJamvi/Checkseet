<?= $this->extend('layout/templ-home'); ?>

<?= $this->section('content'); ?>
<main>
<link rel="stylesheet" href="assets/css/jquery-ui.css">
<link rel="stylesheet" href="assets/css/global.css">
<!-- Tambahkan CSS Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="assets/js/jquery-3.7.1.js"></script>
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script src="assets/js/form/test.js"></script>
<!-- Tambahkan JS Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <?= $this->include('layout/navbar'); ?>

  <form name="checksheet" id="form-action" action="/input" method="POST">
  <?= csrf_field(); ?>
  <?php
    $session = \Config\Services::session();
  ?>

    <div class="container-fluid">

      <div class="card shadow mb-5">
        <div class="card-header py-3">
          <h3 class="m-0 font-weight-bold">Input Checksheet</h5>
        </div>
        <input type="hidden" name="cnt-error-input" id="cnt-error-input" value=0>

        <div class="card-body">
          <div class="row">
            
            <div class="col-md-6">
              <!-- Date input automatic -->
              <div class="mb-3 row">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-6">
                  <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d');?>">
                </div>
              </div>
    
              <!-- Device input -->
              <div class="mb-3 row">
                <label for="device-txt" class="col-sm-2 col-form-label">Device</label>
                <div class="col-sm-6">
                  <select class="form-control" id="device-txt" name="device-txt" onchange=updateDevice() required>
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
    
              <!-- DocType -->
              <div class="mb-3 row">
                <label for="process-txt" class="col-sm-2 col-form-label">Doc. Type</label>
                <div class="col-sm-6">
                  <select class="form-control" id="type-process-txt" name="type-process-txt" onchange=updateDevice() required>
                    <option class="dropdown-item" value="-">choose type document</option>
                    <option value="production">Production Control Sheet</option>
                    <option value="startup">Startup Control Sheet</option>
                    <option value="foregoing">Foregoing Control Sheet</option>
                  </select>
                </div>
              </div>
    
              <!-- Process of Device -->
              <div class="mb-3 row">
                <label for="process-txt" class="col-sm-2 col-form-label">Process</label>
                <div class="col-sm-6">
                  <select class="form-control" id="process-txt" name="process-txt" required>
                  </select>
                </div>
              </div>
    
              <!-- Model name -->
              <div class="mb-3 row">
                <label for="model-txt" class="col-sm-2 col-form-label">Model Name</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="model-txt" name="model-txt" onkeyup="this.value = this.value.toUpperCase()" autofocus>
                </div>
              </div>
    
              <!-- Doc No -->
              <div class="mb-3 row">
                <label for="machno" class="col-sm-2 col-form-label">Doc. No</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control-plaintext" id="docno" value="-" readonly>
                </div>
              </div>

              <!-- Button to Open the Modal -->
              <button type="button" class="btn btn-lg btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">
                Catatan
              </button>

              <!-- The Modal -->
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
              <!-- Lot Number -->
              <div class="mb-3 row">
                <label for="lotno-txt" class="col-sm-2 col-form-label">Lot Number</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="lotno-txt" name="lotno-txt" onkeyup="this.value = this.value.toUpperCase()">
                </div>
              </div>
    
              <!-- Machine Number diubah jadi Select2 -->
              <div class="mb-3 row">
                <label for="machno-txt" class="col-sm-2 col-form-label">Machine Number <span style="color:red;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-control" id="machno-txt" name="machno-txt">
                    <option value="">-- Ketik atau Pilih Machine Number --</option>
                  </select>
                </div>
              </div>
    
              <div class="mb-3 row">
                <label for="empid-txt" class="col-sm-2 col-form-label">Operator</label>
                <div class="col-sm-6">
                  <div class="input-group mb-1" id="empid-div1">
                    <span class="input-group-text" id="basic-addon1">Emp. ID :</span>
                    <input type="number" class="form-control" id="empid-txt" value=<?= $session->get('empid') ?> name="empid-txt" onkeyup="empAuto('#empid-txt','#shift-txt','#group-txt','#name-txt','empid-lbl')" onkeydown="return (event.keyCode!=13);" placeholder="Masukkan ID dalam 6 digit" required>           
                  </div>
                  <div class="input-group mb-1">
                    <span class="input-group-text" id="basic-addon3">Name--:</span>
                    <input type="text" class="form-control" id="name-txt" name="name-txt" placeholder="Masukkan nama anda" onkeyup="this.value = this.value.toUpperCase()">
                  </div>
                  <div class="input-group mb-1">
                    <span class="input-group-text" id="basic-addon2">Shift----:</span>
                    <input type="number" class="form-control" id="shift-txt" name="shift-txt" placeholder="1 atau 2 atau 3">
                  </div>
                  <div class="input-group mb-1">
                    <span class="input-group-text" id="basic-addon3">Group--:</span>
                    <input type="text" class="form-control" id="group-txt" name="group-txt" placeholder="Contoh: 1S2GW1" onkeyup="this.value = this.value.toUpperCase()">
                  </div>
                  <input type="hidden" name="name-operator" id="name-operator">
                </div>
              </div>
    
              <div class="form-control alert-success invisible" id="empid-lbl" name="empid-lbl" >
                <span style="color:#dc143c;text-align:justify;">Perhatian!<br>Tidak ditemukan data kehadiran untuk ID karyawan di atas. Mohon ketik dengan benar. Jika jadwal Anda saat ini tidak sesuai, silakan hubungi bagian GA/P atau masukkan shift & group di atas secara manual.</span>
              </div> 
    
            </div>
    
          </div>
          <?php 
            if (session()->getFlashdata('message')){ 
              echo '<p id=msgsuccess class="invisible">' . session()->getFlashdata('message').'</p>'; 
            }else{ 
              echo '<p id=msgsuccess class="invisible">Kosong</p>'; ;}
          ?>
          <div id="form-input" class="">
            
          </div>
          <div class="d-flex justify-content-center">
            <!-- Tombol Submit Diberi Penjaga checkSubmit() -->
            <button type="submit" class="btn btn-lg btn-primary btn-block mx-auto" id="submit" onclick="return checkSubmit();">Submit</button>
          </div>
          
        </div>
      </div>
</div>
  </form>  
  
</main>
<script>
$(document).ready(function()
{
    // Aktifkan Select2
    $('#machno-txt').select2({
        placeholder: "-- Ketik atau Pilih Machine Number --",
        allowClear: true,
        width: '100%'
    });

    updateDevice()
    $('#submit').hide();
    if($('#msgsuccess').html()!="Kosong"){
        alert($('#msgsuccess').html());
    }

    $('#type-process-txt, #process-txt').change(function()
    {
        updateInput()
        updateDocNo()
        updateMachine() // Panggil update mesin setiap ganti proses
    })
    $('#type-process-txt').change(function(){
        document.getElementById("form-action").action="/"+document.getElementById("type-process-txt").value
    })
    empAuto('#empid-txt','#shift-txt','#group-txt','#name-txt','empid-lbl')
});

// FUNGSI PENJAGA FORM DAN PEMBUNUH GHOST INPUT
function checkSubmit() {
    var machno = $('#machno-txt').val();
    
    if (!machno || machno === "") {
        alert("GAGAL: Machine Number WAJIB dipilih atau diisi sebelum Submit!");
        return false; 
    }
    
    // Hapus ghost input dari layout lama agar tidak menimpa Select2
    $('#form-input input[name="machno-txt"]').remove();
    
    return confirm('Apakah kamu yakin ingin menyimpan data ini?');
}

// FUNGSI UPDATE LIST MESIN VIA AJAX
function updateMachine()
{
    var processCode = document.getElementById("process-txt").value;
    var machineSelect = $('#machno-txt');
    
    machineSelect.empty().append('<option value="">-- Ketik atau Pilih Machine Number --</option>');

    if(!processCode || processCode == '-' || processCode == 'null'){
        machineSelect.trigger('change');
        return;
    }

    $.ajax({
        url: "<?php echo base_url();?>machine/list?process=" + processCode,
        dataType: 'JSON',
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        success: function(data) {
            for (let i = 0; i < data.length; i++) {
                var newOption = new Option(data[i].machine_name, data[i].machine_name, false, false);
                machineSelect.append(newOption);
            }
            machineSelect.trigger('change');
        },
        error: function(data) {
            console.log("Error mengambil data mesin: ", data);
        }
    });
}

function empAuto(empIdTag,shiftTag,groupTag,nameTag,empIdlTag)
{
    var empid = $.trim($(empIdTag).val());
    if (empid.length > 0)
    {
    $.ajax(
    {
        url: "<?php echo base_url();?>home/ajaxAutofill",
        dataType:'JSON',
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data:"empid-txt=" + empid,
        success: function(data)
        {
            $(shiftTag).val(data.acc);
            $(empIdTag).val(data.empid);            
            $(groupTag).val(data.groupid);
            $(nameTag).val(data.name);
            const element = document.getElementById(empIdlTag);  
            element.classList.remove("visible"); 
            element.classList.add("invisible"); 
        },
        error: function(data)
        {
            const element = document.getElementById(empIdlTag);  
            element.classList.remove("invisible"); 
            element.classList.add("visible"); 
            $(shiftTag).val('');            
            $(groupTag).val('');
            $(nameTag).val('');
        },
    });
    }
    else
    {
        $(shiftTag).val('');
        $(groupTag).val('');
    }
}

function updateInput()
{
    let typeProcess,device,process;
    process=document.getElementById("process-txt").value
    if(process!=null){
        device=process.split("-")[0]
        if(process.split("-")[1] == 'p'){
            document.getElementById('model-txt').disabled = false;
            document.getElementById('lotno-txt').disabled = false;
            typeProcess="production";
        }
        else if(process.split("-")[1] == 'f'){
            document.getElementById('model-txt').disabled = false;
            document.getElementById('lotno-txt').disabled = false;
            typeProcess="foregoing";
        }
        else{
            document.getElementById('model-txt').disabled = true;
            document.getElementById('lotno-txt').disabled = true;
            typeProcess="startup";
        }
        document.getElementById("form-action").action="/"+typeProcess
    }
    let cnt_error = document.getElementById("cnt-error-input")
    let submit_button = document.getElementById("submit")
    submit_button.disabled=false
    cnt_error.value=0
    updateSetting()
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "<?php echo base_url();?>"+typeProcess+"/form?device="+device+"&process="+process, true);
    xhr.onload = (e) => {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var form_input = document.getElementById('form-input')
                $('#submit').show();
                form_input.innerHTML=xhr.responseText;
                
                var processValue = document.getElementById("process-txt")
                var header_modal = document.getElementById('catatan-modal-header')
                if(processValue.selectedIndex >= 0 && processValue.options[processValue.selectedIndex]){
                    header_modal.innerHTML=processValue.options[processValue.selectedIndex].text
                }
            } else {
                var form_input = document.getElementById('form-input')
                $('#submit').hide();
                form_input.innerHTML="";
                console.error(xhr.statusText);
            }
        }
    };
    xhr.onerror = (e) => {
        console.error(xhr.statusText);
    };
    xhr.send(null);
}

function updateDocNo()
{
    var docNo = document.getElementById("docno")
    var processValue = document.getElementById("process-txt")
    if(processValue.selectedIndex >= 0 && processValue.options[processValue.selectedIndex]){
        var text = processValue.options[processValue.selectedIndex].text;
        docNo.value=text.split(" ")[0]
    }
}

function updateDevice()
{
    var docType = document.getElementById('type-process-txt').value
    var device = document.getElementById("device-txt").value
    
    $.ajax(
        {
            url: "<?php echo base_url();?>process/list?device="+device+"&type="+docType,
            dataType:'JSON',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            success: function(data)
            {
                var processValue = document.getElementById("process-txt")
                var processValueLen = processValue.length
                for(let i=0;i<processValueLen;i++){
                    processValue.remove(0);
                }
                for (let i=0;i<data.length;i++) {
                    var option = document.createElement("option");
                    option.text = data[i].name
                    option.value = data[i].process_code
                    if(processValue.length==0){
                        processValue.add(option,processValue[0]);
                    }
                    else{
                        processValue.add(option, processValue[processValue.length]);
                    }
                }
                updateInput()
                updateDocNo()
                updateMachine() // Update mesin ketika device ganti
            },
            error: function(data)
            {
                console.log(data)
            },
        }
    );
}

function updateSetting()
{
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "<?php echo base_url();?>input/note-form/"+$('#process-txt').val(), true);
  xhr.onload = (e) => {
      if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            var modal_body = document.getElementById('catatan-modal-body')
            modal_body.innerHTML = xhr.responseText
          } else {
            var modal_body = document.getElementById('catatan-modal-body')
            modal_body.innerHTML =" "
          }
      }
  };
  xhr.onerror = (e) => {
    var modal_body = document.getElementById('catatan-modal-body')
    modal_body.innerHTML =" "
  };
  xhr.send(null);
}
</script>
<?= $this->endSection(); ?>