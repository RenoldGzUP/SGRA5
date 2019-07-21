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
    //IMPORTAR DATOS
    //IMPORTAR DATOS A TB INSCRITOS
    function loadFile() {
        const btnEnviar = document.querySelector("#importInscritosBtt");
        const inputFile = document.querySelector("#fileImportInscritosBtt");
        var elem = document.getElementById("myBar");
        elem.style.width = '0%';
        var filePath = $('#fileImportInscritosBtt').val();
        $('#wrong').hide();
        $('#done').hide();
        if (inputFile.files.length > 0) {
            $('#loading').show();
            document.getElementById("importInscritosBtt").disabled = true;
            document.getElementById("fileImportInscritosBtt").disabled = true;
            let formData = new FormData();
            formData.append("archivo", inputFile.files[0]); // En la posición 0; es decir, el primer elemento
            fetch("../temp/guardar.php", {
                method: 'POST',
                body: formData,
            }).then(respuesta => respuesta.text()).then(decodificado => {
                console.log(decodificado);
                completeProgressBar(filePath);
            });
            //LLAMADA A LA FUNCION PROGRESS PARA QUE COMIENZE  A CARGAR LOS REGISTROS
            // completeProgressBar(filePath);
        } else {
            // El usuario no ha seleccionado archivos
            alert("Selecciona un archivo");
        }
    }
    ////////////////////////////////////////
    function completeProgressBar(FILE) {
        var url = FILE;
        var filename = url.substring(url.lastIndexOf("\\") + 1);
        //console.log("Funcion startAjax OK");
        startAjax(filename);
        //setInterval(startAjax, 3000);
        //linea que hace que se refreseque la pagina cada segundo
        // setInterval(function(){getBarData();}, 1000);
    }

    function startAjax(FILE) {
        var idFile = FILE;
        console.log(idFile);
        //console.log("Llamada al AJAX");
        $.ajax({
            data: {
                "idFile": idFile
            },
            type: "POST",
            url: "../temp/loadFileInscritos.php",
        }).done(function(data, textStatus, jqXHR) {
            var infoLoaderIns = data.split('|');
            console.log("data retornada -> " + data);
            if (infoLoaderIns[0] == "error") {
                $('#wrong').show();
                $('#loading').hide();
                $('#myProgress').hide();
                document.getElementById("importInscritosBtt").disabled = false;
                document.getElementById("fileImportInscritosBtt").disabled = false;
                document.getElementById("messageInscritoWrong").innerHTML = infoLoaderIns[1];
            } else {
                completeBar(infoLoaderIns[0], infoLoaderIns[1]);
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            //console.log("La solicitud a fallado: " + textStatus);
            $('#wrong').show();
        });
    }

    function completeBar(DATA, DATB) {
        $('#myProgress').show();
        var step = DATB;
        if (step < 100) {
            stepIn = step * 70;
        } else if (step > 30000) {} {
            stepIn = step / 10;
        }
        console.log(step);
        var elem = document.getElementById("myBar");
        var width = 0;
        var id = setInterval(frame, stepIn);

        function frame() {
            if (width == 100) {
                clearInterval(id);
                document.getElementById("importInscritosBtt").disabled = false;
                document.getElementById("fileImportInscritosBtt").disabled = false;
                document.getElementById('fileImportInscritosBtt').value = '';
            } else {
                width = width + 5;
                elem.style.width = width + '%';
                elem.innerHTML = width * 1 + '%';
                if (width == 100) {
                    $('#loading').hide();
                    $('#done').show();
                    document.getElementById("messageInscrito").innerHTML = DATA;
                }
            }
        }
    }

    function fileValidationInscritos() {
        var fileInputI = document.getElementById('fileImportInscritosBtt');
        var filePathI = fileInputI.value;
        var allowedExtensions = /(.csv)$/i;
        if (!allowedExtensions.exec(filePathI)) {
            alert('Porfavor seleccione un archivo en formato .CSV');
            fileInputI.value = '';
            return false;
        } else {
            //alert("CSV OK");
        }
    }
    //IMPORTAR REGISTROS A TB RESULTADOS
    function loadFileImportRes() {
        const btnEnviar = document.querySelector("#importResultadosBtt");
        const inputFile = document.querySelector("#fileImportResultadosBtt");
        var elem = document.getElementById("progressResultadoI");
        elem.style.width = '0%';
        var filePath = $('#fileImportResultadosBtt').val();
        $('#wrongResultadoI').hide();
        $('#doneResultadoI').hide();
        if (inputFile.files.length > 0) {
            $('#loadingResultadoI').show();
            document.getElementById("importResultadosBtt").disabled = true;
            document.getElementById("fileImportResultadosBtt").disabled = true;
            let formData = new FormData();
            formData.append("archivo", inputFile.files[0]); // En la posición 0; es decir, el primer elemento
            fetch("../temp/guardar.php", {
                method: 'POST',
                body: formData,
            }).then(respuesta => respuesta.text()).then(decodificado => {
                console.log(decodificado);
                completePBImportRes(filePath);
            });
            //LLAMADA A LA FUNCION PROGRESS PARA QUE COMIENZE  A CARGAR LOS REGISTROS
            // completeProgressBar(filePath);
        } else {
            // El usuario no ha seleccionado archivos
            alert("Selecciona un archivo");
        }
    }
    ////////////////////////////////////////
    function completePBImportRes(FILE) {
        var url = FILE;
        var filename = url.substring(url.lastIndexOf("\\") + 1);
        //console.log("Funcion startAjax OK");
        startAjaxImportRes(filename);
        //setInterval(startAjax, 3000);
        //linea que hace que se refreseque la pagina cada segundo
        // setInterval(function(){getBarData();}, 1000);
    }

    function startAjaxImportRes(FILE) {
        var idFile = FILE;
        console.log(idFile);
        //console.log("Llamada al AJAX");
        $.ajax({
            data: {
                "idFile": idFile
            },
            type: "POST",
            url: "../temp/loadFileResultados.php",
        }).done(function(data, textStatus, jqXHR) {
            var infoLoaderRes = data.split('|');
            console.log("data retornada -> " + data);
            console.log(infoLoaderRes[0]);
            if (infoLoaderRes[0] == "error") {
                $('#loadingResultadoI').hide();
                $('#progressResultadoI').hide();
                $('#wrongResultadoI').show();
                document.getElementById("importResultadosBtt").disabled = false;
                document.getElementById("fileImportResultadosBtt").disabled = false;
                document.getElementById("messageResultadosWrong").innerHTML = infoLoaderRes[1];
            } else {
                //completeBarRes(infoLoaderRes[0], infoLoaderRes[1]);
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            //console.log("La solicitud a fallado: " + textStatus);
            $('#wrongResultadoI').show();
        });
    }

    function completeBarRes(DATA, DATB) {
        $('#progressResultadoI').show();
        var step = DATB;
        if (step < 100) {
            stepIn = step * 70;
        } else if (step > 30000) {} {
            stepIn = step / 10;
        }
        console.log(step);
        var elem = document.getElementById("progressResultadoI");
        var width = 0;
        var id = setInterval(frame, stepIn);

        function frame() {
            if (width == 100) {
                clearInterval(id);
                document.getElementById("importResultadosBtt").disabled = false;
                document.getElementById("fileImportResultadosBtt").disabled = false;
                document.getElementById('fileImportResultadosBtt').value = '';
            } else {
                width = width + 5;
                elem.style.width = width + '%';
                elem.innerHTML = width * 1 + '%';
                if (width == 100) {
                    $('#loadingResultadoI').hide();
                    $('#doneResultadoI').show();
                    document.getElementById("doneMessageResultadoI").innerHTML = DATA;
                }
            }
        }
    }

    function fileValidationResultados() {
        var fileInputR = document.getElementById('fileImportResultadosBtt');
        var filePathR = fileInputR.value;
        var allowedExtensions = /(.csv)$/i;
        if (!allowedExtensions.exec(filePathR)) {
            alert('Porfavor seleccione un archivo en formato .CSV');
            fileInputR.value = '';
            return false;
        } else {
            //alert("CSV OK");
        }
    }
    ///EXPORTAR DATOS
    function timeAjax(FUNC) {
        console.log("Time AJAX OK");
        setInterval(FUNC, 1000);
    }
    // Warning before leaving the page (back button, or outgoinglink)
    window.onbeforeunload = function() {
        return "Do you really want to leave our brilliant application?";
        //if we return nothing here (just calling return;) then there will be no pop-up question at all
        //return;
    };