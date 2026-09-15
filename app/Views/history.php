<?= $this->extend('layout/templ-home'); ?>

<?= $this->section('content'); ?>
<main>

<?= $this->include('layout/navbar'); ?>

<link rel="stylesheet" href="assets/css/daterangepicker.css">
<link rel="stylesheet" href="assets/css/global.css">

  <div class="container-fluid">

    <div class="card shadow mb-5">

      <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold">History Checksheet</h5>
      </div>

      <div class="card-body">
        <div class="container-fluid collapse show" id="menu">
          <!-- Date input automatic -->
          <div class="mb-3 row">
            <label for="date" class="col-sm-1 col-form-label">Date Range</label>
            <div class="col-sm-3">
              <div id="daterange" class="form-control" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                  <i class="fa fa-calendar"></i>&nbsp;
                  <span></span> <i class="fa fa-caret-down"></i>
              </div>
            </div>
          </div>

          <!-- Device Input -->
          <div class="mb-3 row">
            <label for="device" class="col-sm-1 col-form-label">Device</label>
            <div class="col-sm-3">
              <select class="form-control" id="device" name="device" onchange=changeDevice() required>
              </select>
            </div>
          </div>

          <!-- DocType -->
          <div class="mb-3 row">
            <label for="process" class="col-sm-1 col-form-label">Doc. Type</label>
            <div class="col-sm-3">
              <select class="form-control" id="type-process" name="type-process" onchange=changeDevice() required>
                <option class="dropdown-item" value="">choose type document</option>
                <option value="production">Production Control Sheet</option>
                <option value="startup">Startup  Control Sheet</option>
                <option value="foregoing">Foregoing Control Sheet</option>
              </select>
            </div>
          </div>

          <!-- Process input -->
          <div class="mb-3 row">
            <label for="process" class="col-sm-1 col-form-label">Process</label>
            <div class="col-sm-3">
              <select class="form-control" id="process">

              </select>
            </div>
          </div>

          <!-- Model Name Input -->
          <div class="mb-3 row">
            <label for="lotNo" class="col-sm-1 col-form-label">Model Name</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="ModelName">
            </div>
          </div>

          <!-- Lot Number Input -->
          <div class="mb-3 row">
            <label for="lotNo" class="col-sm-1 col-form-label">Lot Number</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="lotNo">
            </div>
          </div>

          <!-- Machine Number Input -->
          <div class="mb-3 row">
            <label for="machno" class="col-sm-1 col-form-label">Machine Number</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="machno">
            </div>
          </div>

          <!-- Doc No -->
          <div class="mb-3 row">
            <label for="machno" class="col-sm-1 col-form-label">Doc. No</label>
            <div class="col-sm-6">
              <input type="text" class="form-control-plaintext" id="docno" value="-" readonly>
            </div>
          </div>
        </div>

        <div class="container-fluid">
          <button class="btn btn-secondary" id="menu-show" type="button" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="menu">
            <i class="fa-solid fa-square-caret-down"></i>
            Menu Display ON/OFF
          </button>
          <button class="btn btn-success" onclick="download_table_as_excel();">
            <i class="fa-solid fa-file-arrow-down"></i>
            Download Table as excel file
          </button>
          <button class="btn btn-primary" onclick="copy_clipboard();">
            <i class="fa-solid fa-copy"></i>
            Copy to clipboard
          </button>
          
          <!-- Table inject using Javascript -->
          <div id="table" class="table-responsive">
            

          </div>
        </div>


      </div>
    </div>
  </div>
  <script src="assets/js/tableToExcel.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/moment.min.js"></script>
  <script src="assets/js/daterangepicker.min.js"></script>
  <script>
    $(document).ready(function()
    {
      
      var start = moment().subtract(29, 'days');
      var end = moment();
      changeDevice()
      function cb(start, end)
      {
        $('#daterange span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
        updateTable()
      }

      $('#daterange').daterangepicker(
        {
          startDate: start,
          endDate: end,
          ranges:
          {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          }
        }, cb);

      cb(start, end);


      $('#fldb1, #slcs, #submit').hide();

      $('#ModelName,#lotNo,#machno, #process,#type-process').change(function(){
        console.log("chanbge procesafsd")
        updateTable()
        updateDocNo()
      })

    });

        function updateTable()
        {
          let resDate,dateStart,dateEnd,process,model,lotNo,machno,device,typeProcess;

          resDate=convertDate()
          dateStart=resDate.dateStart
          dateEnd=resDate.dateEnd

          process=document.getElementById("process").value
          console.log("process ",process)
          model=$('#ModelName').val()
          lotNo=$('#lotNo').val()
          machno=$('#machno').val()

          device=""

          if(process!=null){
            console.log("ini type process ",process)
            device=process.split("-")[0]
            if(process.split("-")[1] == 'p'){
              typeProcess="production";
            }
            else if(process.split("-")[1] == 'f'){
              typeProcess="foregoing";
            }
            else{
              typeProcess="startup";
            }

          }
          
          console.log(dateStart,dateEnd,process,model,lotNo,machno);
          const xhr = new XMLHttpRequest();
          xhr.open("GET", "<?php echo base_url();?>"+typeProcess+"/data?dateStart="+resDate.dateStart+" 00:00:00"+"&dateEnd="+resDate.dateEnd+" 23:59:59"+"&process="+process+"&model="+model+"&lotno="+lotNo+"&machno="+machno+"&device="+device, true);
          xhr.onload = (e) => {
            if (xhr.readyState === 4) {
              if (xhr.status === 200) {
                console.log("ini tagnya ",document.getElementById('process').value)
                var table = document.getElementById('table')
                $('#submit').show();
                table.innerHTML=xhr.responseText;
              } else {
                var table = document.getElementById('table')
                $('#submit').show();
                table.innerHTML="";
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
            var processValue = document.getElementById("process")
            var text = processValue.options[processValue.selectedIndex].text;
            docNo.value=text.split(" ")[0]
        }

        function convertDate()
        {
          const date = $('#daterange span').html().split(" - ");
          var map = {
            "January":1,
            "February":2,
            "March":3,
            "April":4,
            "May":5,
            "June":6,
            "July":7,
            "August":8,
            "September":9,
            "October":10,
            "November":11,
            "December":12
          }
          const date0=date[0]
          const date1=date[1]

          const splitDate0=date0.split(" ")
          const splitDate1=date1.split(" ")

          const dateStart=splitDate0[2]+"-"+map[splitDate0[1]]+"-"+splitDate0[0]
          const dateEnd=splitDate1[2]+"-"+map[splitDate1[1]]+"-"+splitDate1[0]
          return {dateStart,dateEnd}
        }

    function changeDevice()
    {
        var docType = document.getElementById('type-process').value
        var device = document.getElementById("device").value
        
        console.log("ini doctype device",docType,device)
        
        $.ajax(
            {
                url: "<?php echo base_url();?>process/list?device="+device+"&type="+docType,
                dataType:'JSON',
                headers: {'X-Requested-With': 'XMLHttpRequest'},
                success: function(data)
                {
                    var processValue = document.getElementById("process")
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
                    updateTable()
                    updateDocNo()

                },
                error: function(data)
                {
                    console.log(data)
                },
            }
        );
    }

    function copytable() {
      var urlField = document.getElementById(document.getElementById("process").value)   
      console.log("amanananan")
      console.log(urlField)
      var range = document.createRange()
      range.selectNode(urlField)
      window.getSelection().addRange(range) 
      document.execCommand('copy')
    }

    function copy_clipboard() {
      var table = document.getElementById(document.getElementById("process").value);
      console.log(table)
      var range,selection
      
      if(document.createRange && window.getSelection) {
        range=document.createRange()
        selection = window.getSelection()
        selection.removeAllRanges()

        try {
          range.selectNodeContents(table);
          selection.addRange(range)
        } catch (e) {
          range.selectNode(table)
          selection.addRange(range)
        }

        document.execCommand('copy')
        selection.removeAllRanges()
        alert('Table copied to clipboard.')
      }
      else{
        range=document.body.createTextRange()
        range.moveToElementText(table)
        range.select()
        range.execCommand('copy')
        alert('Table copied to clipboard.')
        
      }
    }

    function download_table_as_excel() {
    let resDate = convertDate();
    let process = document.getElementById("process").value;
    let model = $('#ModelName').val();
    let lotNo = $('#lotNo').val();
    let machno = $('#machno').val();
    let device = "";
    let typeProcess = "";

    if (process != null) {
        device = process.split("-")[0];
        if (process.split("-")[1] == 'p') {
            typeProcess = "production";
        } else if (process.split("-")[1] == 'f') {
            typeProcess = "foregoing";
        } else {
            typeProcess = "startup";
        }
    }

    // Arahkan ke endpoint Controller exportExcel
    let exportUrl = "<?= base_url('history/exportExcel') ?>?typeProcess=" + typeProcess + "&dateStart=" + resDate.dateStart + "&dateEnd=" + resDate.dateEnd + "&process=" + process + "&model=" + model + "&lotno=" + lotNo + "&machno=" + machno + "&device=" + device;

    // Buka tab baru agar browser otomatis mendownload
    window.open(exportUrl, '_blank');
}

    document.getElementById("menu-show").addEventListener("click",function(){
      console.log("menu show clicked");
      if ( document.getElementById("menu").classList.contains('show') ){
        document.getElementById("menu").classList.remove('show');
      }
      else{
        document.getElementById("menu").classList.add('show')
      }
    })
  </script>
  <script src="assets/js/dataTables.js"></script>
  <script src="assets/js/dataTables.bootstrap4.js"></script>
  
  <script>
  $(document).ready(function()
  {
      $.ajax(
          {
              url: "<?php echo base_url();?>device/list",
              dataType:'JSON',
              headers: {'X-Requested-With': 'XMLHttpRequest'},
              success: function(data)
              {
                  console.log(data);
                  var deviceValue = document.getElementById("device")
                  var deviceValueLen = deviceValue.length
                  for(let i=0;i<deviceValueLen;i++){
                      deviceValue.remove(0);
                  }
                  for (let i=0;i<data.length;i++) {
                      var option = document.createElement("option");
                      option.text = data[i].name
                      option.value = data[i].code
                      if(deviceValue.length==0){
                          deviceValue.add(option,deviceValue[0]);
                      }
                      else{
                          deviceValue.add(option, deviceValue[deviceValue.length]);
                      }
                  }
              },
              error: function(data)
              {
                  console.log(data)
              },
          }
      );
  });
  </script>
</main>
<?= $this->endSection(); ?>