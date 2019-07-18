    function ajax() {
        var req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status == 200) {
                document.getElementById('bar1').innerHTML = req.responseText;
            }
        }
        req.open('GET', '../Scripts/progress1.php', true);
        req.send();
    }
    /*
        function getBarData() {
            //var idInscrito = $("#idSearch").val();
            //var table1 = $("#tablaInscritos").val();
            //var table2 = $("#tablaResultados").val();
            var elem = document.getElementById("bar1");
            var id = setInterval(frame, 600);

            function frame() {
                if (width == 100) {
                    clearInterval(id);
                } else {
                    width = width + 4;
                    elem.style.width = width + '%';
                    elem.innerHTML = width * 1 + '%';
                }
            }
            $.ajax({
                url: "../Scripts/progress1.php",
            }).done(function(data, textStatus, jqXHR) {
                console.log("data retornada:" + data);
                if (data == ) {}
                //window.location = data;
                //$("#taInscritosResultado").val(data);
                // document.getElementById('taInscritosInscritos').innerHTML = data;
                // document.getElementById('taInscritosResultado').innerHTML = data;
                if (width == 100) {
                    clearInterval(id);
                } else {
                    width = width + 4;
                    elem.style.width = width + '%';
                    elem.innerHTML = width * 1 + '%';
                }
                elem.style.display = "inline";
                elem.style.width = width + '%';
                elem.innerHTML = width * 1 + '%';
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.log("La solicitud a fallado: " + textStatus);
            });
        }
    */
    function loadFile() {
        const btnEnviar = document.querySelector("#importInscritosBtt");
        const inputFile = document.querySelector("#fileImportInscritosBtt");
        if (inputFile.files.length > 0) {
            let formData = new FormData();
            formData.append("archivo", inputFile.files[0]); // En la posición 0; es decir, el primer elemento
            fetch("guardar.php", {
                method: 'POST',
                body: formData,
            }).then(respuesta => respuesta.text()).then(decodificado => {
                console.log(decodificado);
            });
            //LLAMADA A LA FUNCION PROGRESS PARA QUE COMIENZE  A CARGAR LOS REGISTROS
            completeProgressBar();
        } else {
            // El usuario no ha seleccionado archivos
            alert("Selecciona un archivo");
        }
    }
    ////////////////////////////////////////
    function completeProgressBar() {
        var idInscrito = $("#idSearch").val();
        $.ajax({
            type: "POST",
            url: "../Scripts/saveValidationDB.php",
        }).done(function(data, textStatus, jqXHR) {
            console.log("data retornada:" + data);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log("La solicitud a fallado: " + textStatus);
        });
    }
    setInterval(completeProgressBar, 1000);
    //linea que hace que se refreseque la pagina cada segundo
    // setInterval(function(){getBarData();}, 1000);