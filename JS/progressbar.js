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
        $('#myProgress').hide();
        var elem = document.getElementById("myBar");
        elem.style.width = '0%';
        var filePath = $('#fileImportInscritosBtt').val();
        $('#wrong').hide();
        $('#done').hide();
        if (inputFile.files.length > 0) {
            $('#loading').show();
            disableActionButtons();
            //document.getElementById("importInscritosBtt").disabled = true;
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
            console.log("Selecciona un archivo");
            $("#notselectFile").modal();
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
                //document.getElementById("importInscritosBtt").disabled = false;
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
                enableActionButtons();
                //document.getElementById("importInscritosBtt").disabled = false;
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
            console.log("Porfavor seleccione un archivo en formato .CSV");
            $("#csvnotFound").modal();
            fileInputI.value = '';
            return false;
        } else {
            //alert("CSV OK");
        }
    }
    //PROCESAMIENTO DE RESULTADOS
    //IMPORTAR REGISTROS A TB RESULTADOS
    function loadFileImportRes() {
        const btnEnviar = document.querySelector("#importResultadosBtt");
        const inputFile = document.querySelector("#fileImportResultadosBtt");
        $('#progressContainerResultadoI').hide();
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
            console.log("Selecciona un archivo");
            $("#notselectFile").modal();
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
                completeBarRes(infoLoaderRes[0], infoLoaderRes[1]);
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            //console.log("La solicitud a fallado: " + textStatus);
            $('#wrongResultadoI').show();
        });
    }

    function completeBarRes(DATA, DATB) {
        $('#progressContainerResultadoI').show();
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
            // alert('Porfavor seleccione un archivo en formato .CSV');
            $("#csvnotFound").modal();
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
    ///////////////////////////////////////
    //EXPORTAR DATOS
    //EXPORTAR DATOS INSCRITOS
    function disableActionButtons() {
        var idButtons = ["importInscritosBtt", "importResultadosBtt", "exportInscritosBtt", "exportResultadosBtt"];
        var i = 0;
        while (i < 4) {
            document.getElementById(idButtons[i]).disabled = true;
            i++;
        }
    }

    function enableActionButtons() {
        var idButtons = ["importInscritosBtt", "importResultadosBtt", "exportInscritosBtt", "exportResultadosBtt"];
        var i = 0;
        while (i < 4) {
            document.getElementById(idButtons[i]).disabled = false;
            i++;
        }
    }
    //////////////////////////////////////////////////////////////////////////
    function getDataFillsExport(STATE) {
        //ID  APRA IDENFIFICAR DE CUAL EXPORT SE HARA EL GET FILL
        var type = STATE;
        if (type == 1) {
            var dataLabelsInscritos = ["apellido_i", "nombre_i", "provincia_i", "clave_i", "tomo_i", "folio_i", "bachiller_i", "ano_graduacion_i", "sexo_i", "colegio_proc_i", "codigo_colegio_i", "mes_nacimiento_i", "dia_nacimiento_i", "ano_de_nacimiento_i", "tipo_c_i", "provincia_vivienda_i", "distrito_i", "corregimiento_i", "mes_de_inscrito_i", "dia_de_inscrito_i", "ano_de_inscrito_i", "ano_lectivo_i", "sede_i", "facultad_i", "escuela_i", "carrera_i", "carrera_ia_i", "carrera_iia_i", "carrera_iiia_i", "facultad_2_i", "facultad_3_i", "telefono_i", "fecha_de_nacimiento_i", "fecha_inscripcion_i", "num_inscrito_i", "d_i"];
            getFills(dataLabelsInscritos, type);
            //console.log("STATE " + type);
        } else if (type == 2) {
            var dataLabelsResultadosIndice = ["provincia_ind", "clave_ind", "tomo_ind", "folio_ind", "indice_ind", "num_inscrito_ind", "area_ind", "ano_lectivo_ind"];
            getFills(dataLabelsResultadosIndice, type);
            //console.log("STATE " + type);
        } else if (type == 3) {
            var dataLabelsResultados = ["sede_res", "facultad_res", "escuela_res", "carrera_res", "provincia_res", "clave_res", "tomo_res", "folio_res", "apellido_res", "nombre_res", "ano_lectivo_res", "gatb_res", "pca_res", "pcg_res", "indice_res", "area_res", "opc_res", "num_inscrito_res", "d_res"];
            getFills(dataLabelsResultados, type);
            //console.log("STATE " + type);
        } else {
            console.log("Inválido");
        }
    }
    //////////////////////////////////////////////////////////////
    function getFills(ARRAYDATA, TYPE) {
        var dataLabel = ARRAYDATA;
        var len = dataLabel.length;
        var dataArrayModal = [];
        for (var i = 0; i < len; i++) {
            dataArrayModal.push($("#" + dataLabel[i]).val());
            var idNumberLabel = dataArrayModal.join('-');
            //console.log(idNumberLabel);
        }
        sendIDToExport(idNumberLabel, TYPE);
    }

    function sendIDToExport(dataInscritosExp, STATE) {
        if (STATE == 1) {
            var arrayPerformI = ["downloadFileExportInscrito", "loadingInscritoE", "ExportData", "doneInscritoE", "wrongInscritoE"];
            sendAJAXExport(dataInscritosExp, arrayPerformI);
        } else if (STATE == 2) {
            var arrayPerformIn = ["downloadFileExportResultado", "loadingResultadoE", "ExportData", "doneResultadoE", "wrongResultadoE"];
            sendAJAXExport(dataInscritosExp, arrayPerformIn);
        } else if (STATE == 3) {
            var arrayPerformRes = ["downloadFileExportResultado", "loadingResultadoE", "ExportData", "doneResultadoE", "wrongResultadoE"];
            sendAJAXExport(dataInscritosExp, arrayPerformRes);
        } else {
            console.log("Inválido");
        }
    }

    function sendAJAXExport(DATOS, LABELCOMPONENT) {
        var idFile = DATOS;
        var downloadButton = document.getElementById(LABELCOMPONENT[0]);
        $('#' + LABELCOMPONENT[1]).show();
        $.ajax({
            data: {
                "idFrontEnd": idFile
            },
            type: "POST",
            url: "../Export/" + LABELCOMPONENT[2] + ".php",
        }).done(function(data, textStatus, jqXHR) {
            console.log(data);
            enableActionButtons();
            $('#' + LABELCOMPONENT[1]).hide();
            $('#' + LABELCOMPONENT[3]).show();
            $('#' + LABELCOMPONENT[0]).show();
            downloadButton.setAttribute('href', data);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            //console.log("La solicitud a fallado: " + textStatus);
            $('#' + LABELCOMPONENT[4]).show();
        });
    }
    ////////////////////////////////////////////////////////////////////////////////////////////
    function hideMessage(TYPE) {
        if (TYPE == 1) {
            var messagueInscrito = ["downloadFileExportInscrito", "loadingInscritoE", "doneInscritoE", "wrongInscritosE"];
            setHideAtt(messagueInscrito);
        } else if (TYPE == 2) {
            var messagueResultado = ["downloadFileExportResultado", "loadingResultadoE", "doneResultadoE", "wrongResultadoE"];
            setHideAtt(messagueResultado);
        } else {
            console.log("Ocurrió un error al ocultar los messagues");
        }
    }

    function setHideAtt(ARRAY) {
        var i = 0;
        while (i < 4) {
            $('#' + ARRAY[i]).hide();
            i++;
        }
    }
    /////////////////
    //BACK UP DATA BASE
    function exportTableInscritos() {
        console.log("OK INSCRITOS");
        var inputVal = document.getElementById("labelTBInscritosName").value;
        var downloadButton = document.getElementById("downloadFileExportInscrito");
        console.log(inputVal);
        var stateExport = 1;
        $.ajax({
            data: {
                "inputName": inputVal,
                "idStateExport": stateExport
            },
            type: "POST",
            url: "../Scripts/exportDBResultados.php",
        }).done(function(data, textStatus, jqXHR) {
            console.log(data);
            $('#downloadFileExportInscrito').show();
            downloadButton.setAttribute('href', data);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log("La solicitud a fallado: " + textStatus);
        });
    }

    function exportTableResultados() {
        console.log("OK RESULTADOS");
        var inputVal = document.getElementById("labelTBResultadosName").value;
        var downloadButton = document.getElementById("downloadFileExportResultado");
        console.log(inputVal);
        var stateExport = 2;
        $.ajax({
            data: {
                "inputName": inputVal,
                "idStateExport": stateExport
            },
            type: "POST",
            url: "../Scripts/exportDBResultados.php",
        }).done(function(data, textStatus, jqXHR) {
            console.log(data);
            $('#downloadFileExportResultado').show();
            downloadButton.setAttribute('href', data);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log("La solicitud a fallado: " + textStatus);
        });
    }
    //CLOSE PAGE
    // Warning before leaving the page (back button, or outgoinglink)
    window.onbeforeunload = function() {
        return "Do you really want to leave our brilliant application?";
        //if we return nothing here (just calling return;) then there will be no pop-up question at all
        //return;
    };