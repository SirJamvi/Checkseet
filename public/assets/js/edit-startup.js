$(document).ready(function()
{

    $('#submit').hide();
    if($('#msgsuccess').html()!="Kosong"){
        alert($('#msgsuccess').html());
    }
    $('#process-txt').change(function(){
        updateDocNo()
    })
    $('#process-txt,#device-txt').change(function()
    {
        updateInput()
        updateDocNo()
    })
});

function empAuto()
{
    var empid = $.trim($("#empid-txt").val());
    if (empid.length > 0)
    {
    $.ajax(
    {
        url: "/Home/ajaxAutofill",
        // type:'POST',
        dataType:'JSON',
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data:"empid-txt=" + empid,
        success: function(data)
        {
            $('#shift-txt').val(data.acc);
            $('#empid-txt').val(data.empid);            
            $('#group-txt').val(data.groupid); 
            $('#name-operator').val(data.name); 
            const element = document.getElementById("empid-lbl");  
            element.classList.remove("visible"); 
            element.classList.add("invisible"); 
            // document.getElementById("empid-lbl").style.visibility = "hidden";
            console.log("sukses")
            // document.getElementById("empid-lbl").style.visibility = "hidden";
        },
        error: function(data)
        {
            const element = document.getElementById("empid-lbl");  
            element.classList.remove("invisible"); 
            element.classList.add("visible"); 
            // document.getElementById("empid-lbl").style.visibility = "visible";
            $('#shift-txt').val('');            
            $('#group-txt').val('');
            console.log("gagal")
            // document.getElementById("empid-lbl").style.display = "flex";
            // document.getElementById("empid-lbl").style.visibility = "visible";
        },
    });
    }
    else
    {
    console.log("error 2")
    $('#shift-txt').val('');
    $('#group-txt').val('');
    // document.getElementById("empid-lbl").style.display = "none";
    }
}

function injectForm()
{
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "/startup/edit/form?number="+document.getElementById('number-edit').value, true);
    xhr.onload = (e) => {
        if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            var modal = document.getElementById('modal')
            $('#submit').show();
            modal.innerHTML=xhr.responseText;
        } else {
            var modal = document.getElementById('modal')
            $('#submit').hide();
            modal.innerHTML="";
            console.error(xhr.statusText);
        }
        }
    };
    xhr.onerror = (e) => {
        console.error(xhr.statusText);
    };
    xhr.send(null);
}