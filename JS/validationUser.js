//STEP 1
// CHECK USER EXIST
function sendIDSearch() {
    var idInscrito = $("#idSearch").val();
    var idName = $("#idName").val();
    var idCID = $("#idCID").val();
    var idLastName = $("#idLastName").val();
    var table1 = $("#tablaInscritos").val();
    var table2 = $("#tablaResultados").val();
    //////////////////////////////////////////////////////////////////////////////////
    if (table1 != 0 && table2 != 0) {
        if (idName != '' && idLastName != '' && idInscrito != '' || idName != '' && idLastName != '' && idCID != '') {
            $.ajax({
                data: {
                    "idName": idName,
                    "idLastName": idLastName,
                    "idCID": idCID,
                    "idInscrito": idInscrito,
                    "table1": table1,
                    "table2": table2
                },
                type: "POST",
                dataType: "text",
                url: "../Scripts/validationRegisterExist.php",
            }).done(function(data, textStatus, jqXHR) {
                console.log("data retornada:" + data);
                if (data == 1) {
                    $("#foundRegister").modal();
                    console.log(data);
                } else if (data == 2) {
                    $("#wrongRegister").modal();
                } else if (data == 3) {
                    $("#withoutRegister").modal();
                    getTableDataInscritos(idName, idLastName);
                    getTableDataResultados(idName, idLastName);
                } else {
                    getTableDataInscritos(idName, idLastName);
                    $("#dataRegister").modal();
                    $('#alertRecalcular').show();
                    //document.getElementById("MeasuringBtt").disabled = false;
                    getTableDataResultados(idName, idLastName);
                    // document.getElementById("ValidateBtt").disabled = false;
                    //document.getElementById('taInscritosInscritos').innerHTML = data;
                    //document.getElementById('taInscritosResultado').innerHTML = data;
                }
                // document.getElementById("ValidateBtt").disabled = false;
                //document.getElementById("ValidateBtt").style.display="inline";
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log("La solicitud a fallado: " + textStatus);
            });
        } else {
            console.log("no se ha indicado Campos de busqueda");
            $("#wrongRegister").modal();
        }
    } else {
        console.log("NO HA SELECCIONADO TABLAS");
        $("#wrongRegister").modal();
    }
}
//SECOND STEP
//SAVE NEW DATA IN CASE THAT  FILLS IS NOT COMPLETE
function measuringValidate(idInscrito) {
    //$('#alertValidar').show();
    document.getElementById("ValidateBtt").disabled = true;
    $.ajax({
        data: {
            "idInscrito": idInscrito,
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/measuringStudent.php",
    }).done(function(data, textStatus, jqXHR) {
        $("#measuringModal").modal();
        document.getElementById('measuringTableEdit').innerHTML = data;
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}


function updateRegisterData(){

}


function saveDataTest(idInscrito) {
    document.getElementById("ValidateBtt").disabled = false;
    document.getElementById("ValidateBtt").value = idInscrito;
    document.getElementById("SearchBtt").disabled = true;
    /*  $.ajax({
          data: {
              "idInscrito": idInscrito,
          },
          type: "POST",
          dataType: "text",
          url: "../Scripts/saveStudent.php",
      }).done(function(data, textStatus, jqXHR) {
          $("#measuringModal").modal();
          document.getElementById('measuringTableEdit').innerHTML = data;
      }).fail(function(jqXHR, textStatus, errorThrown) {
          console.log("La solicitud a fallado: " + textStatus);
      });*/
}
////////////////////////////////////////////////////////////////////////
//THIRD STEP
//SAVE NEW DATA IN CASE THAT  FILLS IS NOT COMPLETE
function sendIDValidate() {
    document.getElementById("SearchBtt").disabled = true;
    var idInscrito = $("#ValidateBtt").val();
    console.log(idInscrito);
    var table1 = $("#tablaInscritos").val();
    var table2 = $("#tablaResultados").val();
    if (idInscrito == '') {
        $("#wrongRegister").modal();
        // console.log("Wrong");
    } else {
        document.getElementById("ValidateBtt").disabled = true;
        console.log("aceptado");
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
            if (data == 1) {
                $("#validationRegister").modal();
                $('#alertDocumento').show();
                document.getElementById("TalliesBtt").disabled = false;
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log("La solicitud a fallado: " + textStatus);
        });
    }
}
//QUARTER STEP
//EXPORT DATA FROM LAST TABLE TO NEW TABLE 
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
//FIFTH STEP
//GENERATE THE VALIDATE DOCUMEMT PDF
function generateValidation() {
    document.getElementById("SearchBtt").disabled = true;
    var idInscrito = $("#ValidateBtt").val();
    $.ajax({
        data: {
            "idInscrito": idInscrito,
        },
        type: "POST",
        dataType: "text",
        //////LLAMAR AL PDF
        url: "../Scripts/PDF/fpdf181/tutorial/ValidacionOficial.php",
    }).done(function(data, textStatus, jqXHR) {
        //$("#processModal").modal("hide");
        //$("#doneModal").modal();
        if (data != null) {
            window.open(data);
        }
        console.log("DATA-> " + data);
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}
/////////////////////////////////////////////////////
//GET DATA
function getTableDataInscritos(NAME, LASTNAME) {
    $.ajax({
        data: {
            "idName": NAME,
            "idLastName": LASTNAME,
            "idPost": 1
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/getTBToValidate.php",
    }).done(function(data, textStatus, jqXHR) {
        //console.log("data retornada:" + data);
        document.getElementById('taInscritosInscritos').innerHTML = data;
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}

function getTableDataResultados(NAME, LASTNAME) {
    $.ajax({
        data: {
            "idName": NAME,
            "idLastName": LASTNAME,
            "idPost": 2
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/getTBToValidate.php",
    }).done(function(data, textStatus, jqXHR) {
        //console.log("data retornada:" + data);
        // document.getElementById("ValidateBtt").disabled = false;
        document.getElementById('taInscritosResultado').innerHTML = data;
        // document.getElementById("ValidateBtt").disabled = false;
        //document.getElementById("ValidateBtt").style.display="inline";
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}

function checkBoxStudentI() {
    var nameCheckbox = document.getElementsByName('chkStudentI');
    var counterCheck = 0;
    var i = 0;
    var max = 3;
    var arrayID = [];
    while (i < nameCheckbox.length) {
        if (nameCheckbox[i].checked) {
            var dataCheck = console.log(nameCheckbox[i].value);
            arrayID.push(dataCheck);
            counterCheck++;
        }
        i++;
    }
    if (counterCheck >= max) {
        //alert("Max checkedBox selected");
        console.log("Max checkedBox selected");
        return false;
    }
    var k = 0;
    while (k < arrayID.length) {
        console.log("CHECKS-> " + arrayID[k]);
        k++;
    }
}