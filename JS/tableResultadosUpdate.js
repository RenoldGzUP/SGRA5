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
    console.log("Start ajax function");
    var t = $('#tableresultados').removeAttr('width').DataTable({
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
            "url": "../Scripts/getTableResultadosJS.php",
            "dataSrc": function(data) {
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
            "defaultContent": "<button type='button' title ='Editar'  class='editar btn btn-warning btn-xs' ><span class='glyphicon glyphicon-pencil'></span></button>  <button type='button' title ='Borrar'  class='borrar btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash' ></span></button> "
        }],
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false,
            'className': 'dt-body-center',
            'render': function(data, type, full, meta) {
                return '<input type="checkbox" name="n_ins" value="' + $('<div/>').text(data.n_ins).html() + '">';
            }
        }, {
            "className": "dt-center",
            "targets": "_all"
        }, {
            "orderable": false,
            "targets": [0, 17]
        }],
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
    // Handle click on "Select all" control
    $('#resultados_checkall').on('click', function() {
        // Get all rows with search applied
        var rows = t.rows({
            'search': 'applied'
        }).nodes();
        // Check/uncheck checkboxes for all rows in the table
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
    });
    // Handle click on checkbox to set state of "Select all" control
    $('#tableresultados tbody').on('change', 'input[type="checkbox"]', function() {
        // If checkbox is not checked
        if (!this.checked) {
            var el = $('#resultados_checkall').get(0);
            // If "Select all" control is checked and has 'indeterminate' property
            if (el && el.checked && ('indeterminate' in el)) {
                // Set visual state of "Select all" control
                // as 'indeterminate'
                el.indeterminate = true;
            }
        }
    });
}
//////////////////////////////////////////////////TABLE JS
$('#userslist').DataTable({
    "initComplete": function(settings, json) {
        $("#reportDetails").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
    },
});

//edit
var editar_row = function(tbody, table) {
    $(tbody).on("click", "button.editar", function() {
        var data = table.row($(this).parents("tr")).data();
        if (data != null) {
            console.log(data);
            //modal_edit(data.n_ins);
            window.open("http://localhost/SGRA/pagesAdm/edit_inscrito.php?cedula="+data.cedula+"&state=0");
        } else {
            console.log("Null exist");
            //modal_edit(data-);
        }
        //modal_edit(data-);
    });
}


//delete
var borrar_row = function(tbody, table) {
    $(tbody).on("click", "button.borrar", function() {
        var data = table.row($(this).parents("tr")).data();
        if (data != null) {
            console.log(data.n_ins);
            var ins = data.n_ins;
            $("#deleteModal").modal();
            document.getElementById("deleteTaskBtt").onclick = function() {
                console.log("DELETE ON");
                deleteTaskInscrito(data.n_ins)
            };
        } else {
            console.log("Null exist");
            //modal_edit(data-);
        }
        //modal_edit(data-);
    });
}
