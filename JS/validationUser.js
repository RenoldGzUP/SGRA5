//STEP 1
// CHECK USER EXIST INTO VALIDATIONS
function sendIDSearch() {
   // var idInscrito = $("#idSearch").val();
   document.getElementById('taInscritosInscritos').innerHTML = "";
   document.getElementById('taInscritosResultado').innerHTML = "";
    var idName = $("#idName").val();
    var idCID = $("#idCID").val();
    var idLastName = $("#idLastName").val();
    var table1 = $("#tablaInscritos").val();
    var table2 = $("#tablaResultados").val();
    //////////////////////////////////////////////////////////////////////////////////
    if (table1 != 0 && table2 != 0) {
        if (idName != '' && idLastName != '' && idCID != '') {
            $.ajax({
                data: {
                    "idName": idName,
                    "idLastName": idLastName,
                    "idCID": idCID,
                    "table1": table1,
                    "table2": table2
                },
                type: "POST",
                dataType: "text",
                url: "../Scripts/validationRegisterExist.php",
            }).done(function(data, textStatus, jqXHR) {
                console.log("data retornada:" + data);
                if (data == 0) {
                    $("#foundRegister").modal();
                } else if(data == 1){
                    $("#dataRegister").modal();
                     getTableDataInscritos(idCID);
                     getTableDataResultados(idCID);
                }else if (data == 2) {
                    $("#wrongRegister").modal();
                } else if (data == 3) {
                    $("#withoutRegister").modal();
                    getTableDataInscritos(idCID);
                     getTableDataResultados(idCID);
                } else {
                    //    getTableDataInscritos(idName, idLastName);
                   // $("#dataRegister").modal();
                    //$('#alertRecalcular').show();
                    //document.getElementById("MeasuringBtt").disabled = false;
                    //    getTableDataResultados(idName, idLastName);
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
function measuringValidate(idCID) {
    //$('#alertValidar').show();
    console.log(idCID);
    document.getElementById("ValidateBtt").disabled = true;
    var table2 = $("#tablaResultados").val();
    $.ajax({
        data: {
            "idCID": idCID,
            "table2": table2
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



function saveDataTest(idCID) {
    console.log(idCID);
    document.getElementById("ValidateBtt").disabled = false;
    document.getElementById("ValidateBtt").value = idCID;
    document.getElementById("SearchBtt").disabled = true;
    //get data test Status
    var sede = $("#sede").val();
    var facultad = $("#facultad").val();
    var escuela = $("#escuela").val();
    var area = $("#area").val();
    var indice_ps = $("#indice_ps").val();
    var indice_pca = $("#indice_pca").val();
    var indice_pcg = $("#indice_pcg").val();
    var indice_gatb = $("#indice_gatb").val();
    var table1 = $("#tablaInscritos").val();
    var table2 = $("#tablaResultados").val();

    console.log("PS"+indice_ps + "  PCA " +indice_pca);

     $.ajax({
          data: {
               "idCID": idCID,
               "sede":sede,
               "facultad":facultad,
               "escuela":escuela,
               "area":area,
              "indice_ps":indice_ps,
              "indice_pca":indice_pca,
              "indice_pcg":indice_pcg,
              "indice_gatb":indice_gatb,
              "table1": table1,
              "table2": table2
          },
          type: "POST",
          dataType: "text",
          url: "../Scripts/saveMeasuringStudent.php",
      }).done(function(data, textStatus, jqXHR) {
          document.getElementById('taInscritosResultado').innerHTML = "";
          document.getElementById('taInscritosResultado').innerHTML = data;
          console.log(data);
      }).fail(function(jqXHR, textStatus, errorThrown) {
          console.log("La solicitud a fallado: " + textStatus);
      });

}

////////////////////////////////////////////////////////////////////////
//THIRD STEP
//SAVE NEW DATA IN CASE THAT  FILLS IS NOT COMPLETE
function sendIDValidate() {
    document.getElementById("SearchBtt").disabled = true;
    var idCID = $("#ValidateBtt").val();
    console.log("IS PARA VALIDAR->   "+idCID);
    var table1 = $("#tablaInscritos").val();
    var table2 = $("#tablaResultados").val();
    if (idCID == '') {
        $("#wrongRegister").modal();
        // console.log("Wrong");
    } else {
        document.getElementById("ValidateBtt").disabled = true;
        console.log("aceptado para validar");
        $.ajax({
            data: {
                "idCID": idCID,
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
    var signature = checkBoxToSignature();
    $.ajax({
        data: {
            "idInscrito": idInscrito,
            "signature":signature

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


function checkBoxToSignature() {
    var input = document.getElementById("signature_type1");
    var input2 = document.getElementById("signature_type2");
    var isChecked = input.checked;
    var isChecked2 = input2.checked;
    var data;
    if (isChecked) {
        data = input.value;
        console.log(data);
        input2.disabled = true;
    } else if (isChecked2) {
        data = input2.value;
        console.log(data);
        input.disabled = true;
    } else {
        input.disabled = false;
        input2.disabled = false;
        console.log("Ok");
    }
    return data;
}

/////////////////////////////////////////////////////
//GET DATA
function getTableDataInscritos(idCID) {
    var table1 = $("#tablaInscritos").val();
    var table2 = $("#tablaResultados").val();
    console.log(table2);
    $.ajax({
        data: {
            "idCID":idCID,
            "idPost": 1,
            "table1": table1,
            "table2": table2
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

function getTableDataResultados(idCID) {
    var table1 = $("#tablaInscritos").val();
    var table2 = $("#tablaResultados").val();
    console.log(table1);
    $.ajax({
        data: {
            "idCID": idCID,
            "idPost": 2,
            "table1": table1,
            "table2": table2
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