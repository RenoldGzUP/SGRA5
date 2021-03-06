
function obtenerAreas(val) {
    $.ajax({
        type: "POST",
        url: "../Consultas/Areas.php",
        data: 'id_sedes=' + val,
        success: function(data) {
            $("#lista_areas").html(data);
        }
    });
}

function obtenerFacultades(val) {
    var valores = val.split('-');
    $.ajax({
        type: "POST",
        url: "../Consultas/Facultades.php",
        data: 'id_areas=' + valores[0] + '&id_sede=' + valores[1],
        success: function(data) {
            $("#lista_facultades").html(data);
        }
    });
}

function obtenerEscuela() {
    var sede = $("#lista_sedes").val();
    var facultad = $("#lista_facultades").val();
    var escuela = $("#lista_escuelas").val();
    //alert (sede +" - "+ facultad);
    $.ajax({
        type: "POST",
        url: "../Consultas/Escuelas.php",
        data: {
            "idSede": sede,
            "idFacultad": facultad
        },
        success: function(data) {
            //console.log("Result: " + data);
            $("#lista_escuelas").html(data);
        }
    });
}

function obtenerCarreras() {
    var sede = $("#lista_sedes").val();
    var facultad = $("#lista_facultades").val();
    var escuela = $("#lista_escuelas").val();
    //alert (sede +" - "+ facultad);
    $.ajax({
        type: "POST",
        url: "../Consultas/Carreras.php",
        data: {
            "idSede": sede,
            "idFacultad": facultad,
            "idEscuela": escuela
        },
        success: function(data) {
            //console.log("Result: " + data);
            $("#lista_carreras").html(data);
        }
    });
}

function generarCertificacion(val) {
    $.ajax({
        type: "POST",
        url: "../Consultas/Areas.php",
        data: 'id_sedes=' + val,
        success: function(data) {
            $("#lista_areas").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Algo salio mal");
        }
    });
}

function obtenerAreasCertificacion(val) {
    var opcionArea = document.getElementById('areasCertificacion');
    alert(val);
}

function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }
    console.log(out);
}

function showModalLoading() {
    $("#loadingModal").modal();
}

/*function sendSelectRange() {
    // alert("Hola");
    var range = $("#select_range").val();
    document.cookie = "select=" + range;
    var cookie_range = document.cookie;
    //alert(cookie_range);
    list_range = [20, 50, 100, 500];
    //IF THE COOOKIE IS NOT EMPTY
    location.reload();
    var range_later = accessCookie("select");
    if (range_later != "") {
        console.log("YES " + range_later)
        for (var j = 0; j <= 3; j++) {
            if (list_range[j] == range_later) {
                document.getElementById("select_range").value = range_later;
                // if (== true) {
                console.log("ACTUALIZADO");
                // }
                //alert("last select" + range_later);
            }
        }
    } else console.log("VACIO");
    // $("#loadingModal").modal();
}*/
function accessCookie(cookieName) {
    var range_a = cookieName + "=";
    var allCookieArray = document.cookie.split(';');
    for (var i = 0; i < allCookieArray.length; i++) {
        var temp = allCookieArray[i].trim();
        if (temp.indexOf(range_a) == 0) return temp.substring(range_a.length, temp.length);
    }
    return "";
}

function sendSelectFiltes() {}


function resetSelect(){
    document.getElementById('lista_facultades').reset();

}