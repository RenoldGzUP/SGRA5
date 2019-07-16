function sendIDSearch(id) {
    var idInscrito = $("#idSearch").val();
    var table1 = $("#tablaInscritos").val();
    var table2 = $("#tablaResultados").val();
    //alert("hola  "+idInscrito+" "+table1+" "+table2);
    $.ajax({
        data: {
            "idInscrito": idInscrito,
            "table1": table1,
            "table2": table2
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/validationRegisterExist.php",
    }).done(function(data, textStatus, jqXHR) {
        // console.log("data retornada:"+data);
        if (data == 1) {
            $("#foundRegister").modal();
        } else if (data == 2) {
            $("#wrongRegister").modal();
        } else if (data == 3) {
            $("#withoutRegister").modal();
        } else {
            $("#dataRegister").modal();
            document.getElementById('taInscritosInscritos').innerHTML = data;
            document.getElementById('taInscritosResultado').innerHTML = data;
        }
        // document.getElementById("ValidateBtt").disabled = false;
        //document.getElementById("ValidateBtt").style.display="inline";
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}

function sendIDValidate() {
    var idInscrito = $("#idSearch").val();
    var table1 = $("#tablaInscritos").val();
    var table2 = $("#tablaResultados").val();
    $.ajax({
        data: {
            "idInscrito": idInscrito,
            "table1": table1,
            "table2": table2
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/saveValidationDB.php",
    }).done(function(data, textStatus, jqXHR) {
        console.log("data retornada:" + data);
        alert("Proceso completado  " + data);
        //window.location = data;
        //$("#taInscritosResultado").val(data);
        // document.getElementById('taInscritosInscritos').innerHTML = data;
        // document.getElementById('taInscritosResultado').innerHTML = data;
        document.getElementById("TalliesBtt").style.display = "inline";
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}

function exportDataR() {
    var idInscrito = $("#idSearch").val();
    var table1 = $("#tablaInscritos").val();
    var table2 = $("#tablaResultados").val();
    alert("hola  " + idInscrito);
    $.ajax({
        data: {
            "idInscrito": idInscrito,
            "table1": table1,
            "table2": table2
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/saveValidationDB.php",
    }).done(function(data, textStatus, jqXHR) {
        console.log("data retornada:" + data);
        alert("Proceso completado" + data);
        //window.location = data;
        //$("#taInscritosResultado").val(data);
        // document.getElementById('taInscritosInscritos').innerHTML = data;
        // document.getElementById('taInscritosResultado').innerHTML = data;
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}

function Cargar() {
    //  $('#taInscritosResultado').load('../Scripts/validationRegisterExist.php');    
}