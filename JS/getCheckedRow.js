/* if the page has been fully loaded we add two click handlers to the button */
$(document).ready(function() {
    /* Get the checkboxes values based on the class attached to each check box */
    $("#buttonClass").click(function() {
        getValueUsingClass();
    });
    /* Get the checkboxes values based on the parent div id */
    /*$("#sendTypeReport").click(function() {
        getValueUsingParentTag();
    });*/
    $("#sendTypegghgReport").click(function() {
        alert("SEND");
        attachCheckboxHandlers();
    });
    $("#buttonReportes").click(function() {
        //alert("Modo edicion activado");
        sendReporte();
    });
    $("#edit").click(function() {
        editRow();
    });
});
$(document).ready(function() {
    $("#tableresultados #checkall").click(function() {
        if ($("#tableresultados #checkall").is(':checked')) {
            $("#tableresultados input[type=checkbox]").each(function() {
                $(this).prop("checked", true);
            });
        } else {
            $("#tableresultados input[type=checkbox]").each(function() {
                $(this).prop("checked", false);
            });
        }
    });
    //  $("[data-toggle=tooltip]").tooltip();
});
// call onload or in script segment below form
function attachCheckboxHandlers() {
    // get reference to element containing toppings checkboxes
    var el = document.getElementById('certType');
    // get reference to input elements in toppings container element
    var tops = el.getElementsByTagName('input');
    alert("resp " + tops);
}

function GetCheckedStateDirector() {
    var input = document.getElementById("type2");
    var input2 = document.getElementById("type1");
    var isChecked = input.checked;
    if (isChecked) {
        var data = input.value;
        input2.disabled = true;
        alert("The checkBox2 is " + data);
    } else {
        input2.disabled = false;
    }
}

function GetCheckedStateCoor() {
    var input2 = document.getElementById("type1");
    var input = document.getElementById("type2");
    var isChecked2 = input2.checked;
    if (isChecked2) {
        var dataCoor = input2.value;
        input.disabled = true;
        // alert ("The checkBox1 is " + dataCoor);
    } else {
        input.disabled = false;
    }
}

function getValueUsingParentTag() {
    var chkArray = [];
    console.log("Start getValueUsingParentTag function");
    /* look for all checkboes that have a parent id called 'checkboxlist' attached to it and check if it was checked */
    $("#tableresultados input:checked").each(function() {
        if ($(this).val() != "on") {
            chkArray.push($(this).val());
        }
    });
    /* we join the array separated by the comma */
    var selected;
    selected = chkArray.join(',');
    /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
    if (selected.length > 1) {
        //sendID(selected);
        console.log("True");
        // generateTallies(selected);
        //enviar id 
    } else {
        $("#errorModal").modal();
    }
}

function startF() {
    var chkArray = [];
    console.log("Start function OK");
    /* look for all checkboes that have a parent id called 'checkboxlist' attached to it and check if it was checked */
    $("#tableresultados input:checked").each(function() {
        if ($(this).val() != "on") {
            chkArray.push($(this).val());
        }
    });
    /* we join the array separated by the comma */
    var selected;
    selected = chkArray.join(',');
    /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
    if (selected.length > 1) {
        sendID(selected);
        console.log("Send ID to Tallies File");
        //generateTallies(selected);
        //enviar id 
    } else {
        $("#errorModal").modal();
    }
}

function sendID(id) {
    var idInscrito = id;
    $("#processModal").modal();
    $.ajax({
        data: {
            "idInscrito": idInscrito
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/PDF/fpdf181/tutorial/CertificacionOficial.php",
    }).done(function(data, textStatus, jqXHR) {
        $("#processModal").modal("hide");
        $("#doneModal").modal();
        if (data != null) {
            window.open(data);
        }
        console.log("DATA-> " + data);
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}

function sendReporte() {
    var loading = document.getElementById("loading");
    var fadescreen = document.getElementById("fadeing");
    // var idInscrito = id;
    //var optionText = $("#lista_sedes option:selected").text();
    //var text = optionText.split('[A-Z]');
    var e = document.getElementById("lista_sedes");
    var strUser = e.options[e.selectedIndex].value;
    var d = document.getElementById("downloadFile");
    var f = document.getElementById("buttonReportes");
    // var strUser2 = d.options[d.selectedIndex].value;
    //var text = $('#selectorID').val();
    alert("DATOS EPARA ENVIAR EN EL sendReporte" + strUser);
    $.ajax({
        data: {
            "idSede": strUser
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/PDF/fpdf181/tutorial/generadorReportes.php",
        beforeSend: function(msg) {
            // loading.style.display = "block";
            //fadescreen.style.display = "block";
            //sleep(15000);
        },
    }).done(function(data, textStatus, jqXHR) {
        console.log("data retornada:  " + data);
        //f.disabled = true;
        d.setAttribute('href', data);
        //  d.style.backgroundColor="#47c080";
        //loading.style.display = "none";
        //fadescreen.style.display = "none";
        //window.location = data;
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}

function sleep(milliseconds) {
    alert("Dude");
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
            break;
        }
    }
}

function generateTallies(id) {
    var idInscrito = id;
    $("#processModal").modal();
    $.ajax({
        data: {
            "idInscrito": idInscrito,
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/cert.php",
    }).done(function(data, textStatus, jqXHR) {
        $("#processModal").modal("hide");
        console.log("data retornada:" + data);
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}
/*$(function(){
            $("td").click(function(event){
                    if($(this).children("input").length > 0)
                            return false;
                    var tdObj = $(this);
                    var preText = tdObj.html();
                    var inputObj = $("<input type='text' />");
                    tdObj.html("");
                    inputObj.width(tdObj.width())
                            .height(tdObj.height())
                            .css({border:"0px",fontSize:"12px"})
                            .val(preText)
                            .appendTo(tdObj)
                            .trigger("focus")
                            .trigger("select");
                    inputObj.keyup(function(event){
                            if(13 == event.which) { // press ENTER-key
                                    var text = $(this).val();
                                    tdObj.html(text);
                            }
                            else if(27 == event.which) {  // press ESC-key
                                    tdObj.html(preText);
                            }
                  });
                    inputObj.click(function(){
                            return false;
                    });
            });
    });


*/