$(document).ready(function()
{
    // document.getElementById("empid-div2").style.display = "none";

    injectForm()

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
    empAuto('#empid-txt','#shift-txt','#group-txt','#name-txt','empid-lbl')
});

function now1()
{
    if (document.getElementById('flexCheck1').checked == true)
    {
    document.getElementById('inp1').value= Date().slice(16,24);
    }
    else
    {
    document.getElementById('inp1').value= "";
    }
}

function now2()
{
    if (document.getElementById('flexCheck2').checked == true)
    {
    document.getElementById('inp2').value= Date().slice(16,24);
    }
    else
    {
    document.getElementById('inp2').value= "";
    }
}

function now5()
{
    if (document.getElementById('flexCheck5').checked == true)
    {
    document.getElementById('inp5').value= Date().slice(16,24);
    }
    else
    {
    document.getElementById('inp5').value= "";
    }
}

function now6()
{
    if (document.getElementById('flexCheck6').checked == true)
    {
    document.getElementById('inp6').value= Date().slice(16,24);
    }
    else
    {
    document.getElementById('inp6').value= "";
    }
}

function empAuto(empIdTag,shiftTag,groupTag,nameTag,empIdlTag)
// function empAuto()
{
    var empid = $.trim($(empIdTag).val());
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
            $(shiftTag).val(data.acc);
            $(empIdTag).val(data.empid);            
            $(groupTag).val(data.groupid);
            $(nameTag).val(data.name);
            const element = document.getElementById(empIdlTag);  
            element.classList.remove("visible"); 
            element.classList.add("invisible"); 
            console.log("sukses",data)
        },
        error: function(data)
        {
            const element = document.getElementById(empIdlTag);  
            element.classList.remove("invisible"); 
            element.classList.add("visible"); 
            $(shiftTag).val('');            
            $(groupTag).val('');
            console.log("gagal")
        },
    });
    }
    else
    {
    console.log("error 2")
    $(shiftTag).val('');
    $(groupTag).val('');
    // document.getElementById("empid-lbl").style.display = "none";
    }
}

function calc1()
{
    var elm = document.forms["checksheet"];

    console.log("ini inp 7",elm);
    // var inp3=document.getElementBy

    console.log(elm["inp3"].min,parseInt(elm["inp3"].value))
    console.log(elm["inp4"].min,parseInt(elm["inp4"].value),elm["inp4"].max)

    elm["inp4"].max=elm["inp4"].value;



    if (elm["inp3"].value != "" && elm["inp4"].value != "")
    {
        if (elm["inp4"].value > parseInt(elm["inp3"].value))
        {
        elm["inp4"].value = parseInt(elm["inp3"].value);
        }
        else if(elm["inp4"].value < 0)
        {
        elm["inp4"].value = 0;
        }
        elm["inp5"].value = parseInt(elm["inp3"].value) - parseInt(elm["inp4"].value);
    }
}
function injectForm()
{
    // $.ajax({
    //     url: "/form/"+document.getElementById('process-txt').value,
    //     // type:'POST',
    //     dataType:'JSON',
    //     headers: {'X-Requested-With': 'XMLHttpRequest'},
    // }).done(function( response ) {
    //     console.log("berhasil")
    //     console.log(response)
    //     $("#modal").html(response)
    //     $('#submit').show();
    // });
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "/production/edit/form?device="+document.getElementById('device-txt').value+"&process="+document.getElementById('process-txt').value+"&number="+document.getElementById('number-form').value, true);
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