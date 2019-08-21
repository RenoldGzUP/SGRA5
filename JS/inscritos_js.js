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
    //console.log($idInscrito);
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

function setRegister() {
    var range = document.getElementById("select_range").value;
    //submit
    document.getElementById("rangeTableInscrito").submit();
    console.log(range);
}

function getFilter() {
    var sede = document.getElementById("lista_sedes").value;
    var area = document.getElementById("lista_areas").value;
    var facultad = document.getElementById("lista_facultades").value;
    var escuela = document.getElementById("lista_escuelas").value;
    var carrera = document.getElementById("lista_carreras").value;
    console.log(sede);
    //////////////////////////////////////////////////
    //submit
}
///datatable
$(document).ready(function() {
    $('#tableInscritos').DataTable({
        "columnDefs": [{
            orderable: false,
            targets: [0, 16]
        }],
        "iDisplayLength": 15,
        "aLengthMenu": [
            [25, 50, 100, -1],
            [25, 50, 100, "Todos"]
        ],
    });
});

function filtrarTabla() {
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
    getDataAJAX(issetData, filterState);
    //send data and return  full table 
}

function initialData() {
    var t = $('#tableInscritos').DataTable({
        "destroy": true,
        "ajax": {
            "url": "../Scripts/getTableInscritosJS.php",
            "dataSrc": ""
        },
        "columns": [{
            "data": null
        }, {
            "data": null,
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
            "data": "fac_iia"
        }, {
            "data": "esc_iia"
        }, {
            "data": "car_iia"
        }, {
            "data": "fac_iiia"
        }, {
            "data": "esc_iiia"
        }, {
            "data": "car_iiia"
        }, {
            "defaultContent": "<button type='button' title ='Editar'  class='editar btn btn-warning btn-xs' ><span class='glyphicon glyphicon-pencil'></span></button>  <button type='button' title ='Borrar'  class='borrar btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash' ></span></button> "
        }],
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false,
            'className': 'dt-body-center',
            'render': function(data, type, full, meta) {
                return '<input type="checkbox" name="n_ins" value="' + $('<div/>').text(data).html() + '">';
            }
        }, {
            'className': 'dt-body-center',
            'targets': 1,
        }],
        "order": [
            [1, 'asc']
        ]
    });
    t.on('order.dt search.dt', function() {
        t.column(1, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    // Handle click on "Select all" control
    $('#inscritos_checkall').on('click', function() {
        // Get all rows with search applied
        var rows = t.rows({
            'search': 'applied'
        }).nodes();
        // Check/uncheck checkboxes for all rows in the table
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
    });
    // Handle click on checkbox to set state of "Select all" control
    $('#tableInscritos tbody').on('change', 'input[type="checkbox"]', function() {
        // If checkbox is not checked
        if (!this.checked) {
            var el = $('#inscritos_checkall').get(0);
            // If "Select all" control is checked and has 'indeterminate' property
            if (el && el.checked && ('indeterminate' in el)) {
                // Set visual state of "Select all" control
                // as 'indeterminate'
                el.indeterminate = true;
            }
        }
    });
}

function getDataAJAX(issetData, filterState) {
    var t = $('#tableInscritos').removeAttr('width').DataTable({
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
            "url": "../Scripts/getTableInscritosJS.php",
            "dataSrc": ""
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
            "data": "fac_iia"
        }, {
            "data": "esc_iia"
        }, {
            "data": "car_iia"
        }, {
            "data": "fac_iiia"
        }, {
            "data": "esc_iiia"
        }, {
            "data": "car_iiia"
        }, {
            "defaultContent": "<button type='button' title ='Editar'  class='editar btn btn-warning btn-xs' ><span class='glyphicon glyphicon-pencil'></span></button>  <button type='button' title ='Borrar'  class='borrar btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash' ></span></button> "
        }],
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false,
            'className': 'dt-body-center',
            'render': function(data, type, full, meta) {
                return '<input type="checkbox" name="n_ins" value="' + $('<div/>').text(data).html() + '">';
            }
        }, {
            "className": "dt-center",
            "targets": "_all"
        }, {
            width: 10,
            targets: [0, 1, 5]
        }, {
            width: 9,
            targets: 16
        }, {
            width: 18,
            targets: [2, 3, 4]
        }, {
            width: 5,
            targets: [6,
                7,
                8, ,
                9,
                10,
                11,
                12,
                13,
                14,
                15
            ]
        }, {
            /* "orderable": false,
             "targets": 16*/
            "orderable": false,
            "targets": [0, 16]
        }],
        "order": [
            [1, 'asc']
        ]
    });
    editar_row("#tableInscritos tbody", t);
    borrar_row("#tableInscritos tbody", t);
    t.on('order.dt search.dt', function() {
        t.column(1, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    // Handle click on "Select all" control
    $('#inscritos_checkall').on('click', function() {
        // Get all rows with search applied
        var rows = t.rows({
            'search': 'applied'
        }).nodes();
        // Check/uncheck checkboxes for all rows in the table
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
    });
    // Handle click on checkbox to set state of "Select all" control
    $('#tableInscritos tbody').on('change', 'input[type="checkbox"]', function() {
        // If checkbox is not checked
        if (!this.checked) {
            var el = $('#inscritos_checkall').get(0);
            // If "Select all" control is checked and has 'indeterminate' property
            if (el && el.checked && ('indeterminate' in el)) {
                // Set visual state of "Select all" control
                // as 'indeterminate'
                el.indeterminate = true;
            }
        }
    });
}
//////////////////////////////////////////////////
$('#userslist').DataTable({
    "initComplete": function(settings, json) {
        $("#reportDetails").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
    },
});
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
/**function delete_row(id) {
    // var resp = confirm("Confirme borrado de " + id + "  ?");
    $("#deleteModal").modal();
    document.getElementById("deleteTaskBtt").onclick = function() {
        deleteTask(id);
        table.row($(this).parents('tr')).remove().draw(false);
    };
}*/
//////////////////////////////////////////////////////////////