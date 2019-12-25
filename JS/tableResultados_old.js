///////////////////////filtro////////////////////////////////////
////////////////////////////////////////////////////////////
///datatable
$(document).ready(function() {
    $('#tableresultados').DataTable({
        "columnDefs": [{
            orderable: false,
            targets: [0, 17]
        }],
        "iDisplayLength": 15,
        "aLengthMenu": [
            [25, 50, 100, -1],
            [25, 50, 100, "Todos"]
        ],
    });
});
////////////////////////////////////
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
    $("#loadingModal").modal();
    while (a < dataFilter.length) {
        if (dataFilter[a] > 0) {
            console.log("IS SET ->" + dataFilter[a]);
            issetData.push(dataFilter[a]);
        }
        a++;
    }
    dump(issetData);
    var filterState = issetData.length;
    getDataAJAX(issetData, filterState);
    //send data and return  full table 
}




function getDataAJAX(issetData, filterState) {
    var t = $('#tableresultados').removeAttr('width').DataTable({
        "destroy": true,
        "autoWidth": true,
        "fixedHeader": true,
        "ajax": {
            "data": {
                "idFilters": issetData,
                "filter": filterState
            },
            "method": "POST",
            "url": "../Scripts/getTableResultadosJS.php",
            "dataSrc": function(data) {
                
                 if (data == "error") {
                     $("#loadingModal").modal("hide");
                     console.log("data error");
                     $('td:eq(1)', row).attr('colspan', 3);
                }
                $("#loadingModal").modal("hide");
                return data;
            }
        },
        "columns": [{
            "data": null,
        }, {
            "data": null
        }, {
            "data": "nombre"
        }, {
            "data": "apellido"
        }, {
            "data": "cedula"
        }, {
            "data": "n_ins"
        }, {
            "data": "sede"
        }, {
            "data": "fac_ia"
        }, {
            "data": "esc_ia"
        }, {
            "data": "car_ia"
        }, {
            "data": "ps"
        }, {
            "data": "pca"
        }, {
            "data": "pcg"
        }, {
            "data": "gatb"
        }, {
            "data": "verbal"
        }, {
            "data": "numer"
        }, {
            "data": "indice"
        }, {
            "defaultContent": "<button type='button' title ='Editar' class='editar btn btn-warning btn-xs' ><span class='glyphicon glyphicon-pencil'></span></button>  <button type='button' title ='Borrar'  class='borrar btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash' ></span></button> "
        }],
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false,
            'className': 'dt-body-center',
            'render': function(data, type, full, meta) {
                return '<input type="checkbox"  id="checkboxlist" name="cedula" value="' + $('<div/>').text(data.cedula).html() + '">';
                //return '<input type="checkbox"  id="checkboxlist" name="n_ins" value="' + $('<div/>').text(data.cedula).html() + '">';
            }
        }, {
            "className": "dt-center",
            "targets": "_all"
        }, {
            /* "orderable": false,
             "targets": 16*/
            "orderable": false,
            "targets": [0, 17]
        }],
        'createdRow': function(row, data, index) {
            if (data.red != 0) {
                //$('td', row).eq(5).addClass('row-style');
                $(row).addClass('row-style');
                //console.log("TRUE" + data.red);
            }
        },
        "order": [
            [1, 'asc']
        ]
    });
    editar_row("#tableresultados tbody", t);
    borrar_row("#tableresultados tbody", t);
    t.on('order.dt search.dt', function() {
        t.column(1, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
}//end ajax func


//////////////////////////////////////////////////
$('#userslist').DataTable({
    "initComplete": function(settings, json) {
        $("#reportDetails").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
    },
});

var editar_row = function(tbody, table) {
    $(tbody).on("click", "button.editar", function() {
        var data = table.row($(this).parents("tr")).data();
        if (data.cedula != null) {
            console.log(data.cedula);
            window.open("http://localhost/SGRA/pagesAdm/edit_certificacion.php?cedula="+data.cedula+"&state=0");
           //modal_edit(data.n_ins);
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
        console.log(data.cedula);
        if (data.cedula != null) {
            //console.log(data);
            var ins = data.cedula;
            $("#deleteModal").modal();

            document.getElementById("deleteTaskBtt").onclick = function() {
                console.log("DELETE ON");
                deleteTask(data.cedula);
            };

        } else {
            console.log("Null exist");
           
        }
        
    });
}
