///datatable
$(document).ready(function() {
    $('#tableReportes').DataTable();
});
///////////////////////filtro////////////////////////////////////
////////////////////////////////////////////////////////////
function filtrarTabla() {
    $("#loadingModal").modal();
    var sede = $("#lista_sedes").val();
    var area = $("#lista_areas").val();
    var areaSplit = area.split('-');
    var facultad = $("#lista_facultades").val();
    var escuela = $("#lista_escuelas").val();
    var carrera = $("#lista_carreras").val();
    console.log(sede + " - " + areaSplit[0] + " - " + facultad + " - " + escuela + " - " + carrera + " - ");
    var dataFilter = [sede, areaSplit[0], facultad, escuela, carrera];
    //VALIDATE 
    var a = 0;
    var issetData = [];
    while (a < dataFilter.length) {
        if (dataFilter[a] > 0) {
            console.log("IS SET ->" + dataFilter[a]);
            issetData.push(dataFilter[a]);
        }
        a++;
    }
    dump(issetData);
    var filterState = issetData.length;
    //console.log(issetData.length);
    if (getDataAJAX(issetData, filterState)) {
        $("#loadingModal").modal("hide");
        document.getElementById("buttongReportes").disabled = false;
    }
    //send data and return  full table 
}

function getDataAJAX(issetData, filterState) {
    var t = $('#tableReportes').removeAttr('width').DataTable({
        "destroy": true,
        "fixedHeader": {
            "header": true,
        },
        "ajax": {
            "data": {
                "idFilters": issetData,
                "filter": filterState
            },
            "method": "POST",
            "url": "../Scripts/getTableReportes.php",
            "dataSrc": ""
        },
        "columns": [{
            "data": null,
        }, {
            "data": "apellido"
        }, {
            "data": "nombre"
        }, {
            "data": "cedula"
        }, {
            "data": "sede"
        }, {
            "data": "areap"
        }, {
            "data": "ps"
        }, {
            "data": "gatb"
        }, {
            "data": "pca"
        }, {
            "data": "indice"
        }, {
            "data": "verbal"
        }, {
            "data": "numer"
        }],
        'columnDefs': [{
            "className": "dt-center",
            "targets": "_all"
        }],
        "order": [
            [0, 'asc']
        ]
    });
    t.on('order.dt search.dt', function() {
        t.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    return true;
}
//////////////////////////////////////////////////
/*$('#userslist').DataTable({
    "initComplete": function(settings, json) {
        $("#reportDetails").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
    },
});*/
var editar_row = function(tbody, table) {
    $(tbody).on("click", "button.editar", function() {
        var data = table.row($(this).parents("tr")).data();
        if (data != null) {
            console.log(data);
            modal_edit(data.n_ins);
        } else {
            console.log("Null exist");
            //modal_edit(data-);
        }
        //modal_edit(data-);
    });
}
var borrar_row = function(tbody, table) {
    $(tbody).on("click", "button.borrar", function() {
        var data = table.row($(this).parents("tr")).data();
        if (data != null) {
            console.log(data);
            //delete_row(data.n_ins);
            var ins = data.n_ins;
            $("#deleteModal").modal();
            document.getElementById("deleteTaskBtt").onclick = function() {
                // console.log("DELETE ON");
                deleteTask(data.n_ins);
                // deleteComplete(table, ins);
            };
        } else {
            console.log("Null exist");
            //modal_edit(data-);
        }
        //modal_edit(data-);
    });
}

function sendReporte() {
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

function StartReportGenerate() {
    $("#processModal").modal();
    var sede = $("#lista_sedes").val();
    var area = $("#lista_areas").val();
    var areaSplit = area.split('-');
    var facultad = $("#lista_facultades").val();
    var escuela = $("#lista_escuelas").val();
    var carrera = $("#lista_carreras").val();
    console.log(sede + " - " + areaSplit[0] + " - " + facultad + " - " + escuela + " - " + carrera + " - ");
    var dataFilter = [sede, areaSplit[0], facultad, escuela, carrera];
    //VALIDATE 
    var a = 0;
    var issetData = [];
    while (a < dataFilter.length) {
        if (dataFilter[a] > 0) {
            console.log("IS SET ->" + dataFilter[a]);
            issetData.push(dataFilter[a]);
        }
        a++;
    }
    dump(issetData);
    var filterState = issetData.length;
    $.ajax({
        data: {
            "idFilters": issetData,
            "filter": filterState
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/PDF/fpdf181/tutorial/generadorReportes.php",
    }).done(function(data, textStatus, jqXHR) {
        $("#processModal").modal("hide");
        //$("#doneModal").modal();
        if (data != null) {
            window.open(data);
        }
        console.log("DATA-> " + data);
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}