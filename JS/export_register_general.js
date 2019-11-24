function getIDToExport() {
    var URLactual = document.location + '';
    console.log(URLactual);
    var stateSent = URLactual.split("/");
    console.log(stateSent[5]);
    //////////////////////////
    //SET THE STATE
    if (stateSent[5] == "inscritos.php") {
     var stateToexport = 1;
     console.log(stateToexport);
     var tableExport = "#tableInscritos";

    }else if (stateSent[5] == "certificacion.php") {
     var stateToexport = 2;
    console.log(stateToexport);
    var tableExport = "#tableresultados";

    }

    ////////////////////////
    
    var chkArray = [];
    console.log("Start function getIDToExport() ");
    /* look for all checkboes that have a parent id called 'checkboxlist' attached to it and check if it was checked */
    $(tableExport+" input:checked").each(function() {
        if ($(this).val() != "on") {
            chkArray.push($(this).val());
        }
    });
    /* we join the array separated by the comma */
    var selected;
    selected = chkArray.join(',');
    console.log(selected);
    /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
    if (selected.length > 1) {              
       //function to activte
      sendIdToGenerateExportFile(selected,stateToexport);
       console.log("Send ID from getIDToExport() to generate export File");
    } else {
        $("#errorModal").modal();
    }
}


function sendIdToGenerateExportFile(id,stateSent) {
    var idInscrito = id;
    //state is for reference what is db to do query 
    var state = stateSent;
    $("#processModal").modal();
    $.ajax({
        data: {
            "idInscrito": idInscrito,
            "state":state
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/exportRegisterGeneral.php",
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



