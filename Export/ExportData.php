<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();

/*//GET DATA FROM AJAX JS
$labelsInscritos = array("apellido", "nombre", "provincia", "clave", "tomo", "folio", "bach", "ao_grad", "sexo", "col_proc", "cod_col", "mes_n", "dia_n", "ao_n", "tipoc", "provi", "distri", "corregi", "mes_i", "dia_i", "ao_i", "ao_lectivo", "sede", "fac_ia", "esc_ia", "car_ia", "car_ia", "car_iia", "car_iiia", "fac_iia", "fac_iiia", "telefono", "fecha_n", "fecha_i", "n_ins", "d");

$leng = count($labelsInscritos);*/

//GET TIME
//$tiempo_inicial = microtime(true);
//GET ARRAY FROM JS
$idFromHTML = explode('-', $_POST["idFrontEnd"]);
//var_dump($idFromHTML);

//SORT AT
$longArray = count($idFromHTML);
//print $longArray;

switch ($longArray) {
    case 36:
        //GET DATA FROM AJAX JS
        $labelsInscritos = array("apellido", "nombre", "provincia", "clave", "tomo", "folio", "bach", "ao_grad", "sexo", "col_proc", "cod_col", "mes_n", "dia_n", "ao_n", "tipoc", "provi", "distri", "corregi", "mes_i", "dia_i", "ao_i", "ao_lectivo", "sede", "fac_ia", "esc_ia", "car_ia", "car_ia", "car_iia", "car_iiia", "fac_iia", "fac_iiia", "telefono", "fecha_n", "fecha_i", "n_ins", "d");
        //GET DAT FROM DB - WITH FORMAT OD LABELS UP
        date_default_timezone_set("America/Panama"); //ZONA HORARIA PAN
        $datetime = date("d_m_Y");
        $fName    = "inscritos" . $datetime . ".txt";
        //QUERY
        $dataExport = exportDatosInscritos();
        //VALIDATE THAT THE FILE EXIST AND WAS DELETED
        if (renameFile($fName)) {
            getDataAnalyser($dataExport, $labelsInscritos, $idFromHTML, $fName);
            echo "../Export/" . $fName;
            saveLogs($_SESSION['name'], "El sistema borró el archivo anterior y creó el archivo $fName ,Usuario exportó  registros de TB inscritos - Nombre del archivo $fName");
        } else {
            getDataAnalyser($dataExport, $labelsInscritos, $idFromHTML, $fName);
            echo "../Export/" . $fName;
            saveLogs($_SESSION['name'], "El sistema creó el archivo $fName y  exportó  registros de TB inscritos - Nombre del archivo $fName");
        }
        break;
    case 19:
        //GET DATA FROM AJAX JS
        $labelsResultados = array("sede", "fac_ia", "esc_ia", "car_ia", "provincia", "clave", "tomo", "folio", "apellido", "nombre", "ao_lect", "gatb", "pca", "pcg", "indice", "areap", "opc", "n_ins", "d");

        //GET DAT FROM DB - WITH FORMAT OD LABELS UP
        date_default_timezone_set("America/Panama"); //ZONA HORARIA PAN
        $datetime = date("d_m_Y");
        $fName    = "resultados" . $datetime . ".txt";
        //QUERY
        $dataExport = exportDatosResultados();
        //VALIDATE THAT THE FILE EXIST AND WAS DELETED
        if (renameFile($fName)) {
            getDataAnalyser($dataExport, $labelsResultados, $idFromHTML, $fName);
            echo "../Export/" . $fName;
            saveLogs($_SESSION['name'], "El sistema borró el archivo anterior y creó el archivo $fName ,Usuario exportó  registros de TB resultados- Nombre del archivo $fName");
        } else {
            getDataAnalyser($dataExport, $labelsResultados, $idFromHTML, $fName);
            echo "../Export/" . $fName;
            saveLogs($_SESSION['name'], "El sistema creó el archivo $fName y  exportó  registros de TB resultados - Nombre del archivo $fName");
        }
        break;
    case 8:
        //GET DATA FROM AJAX JS
        $labelsIndices = array("provincia", "clave", "tomo", "folio", "indice", "n_ins", "areap", "ao_lect");
        //GET DAT FROM DB - WITH FORMAT OD LABELS UP
        date_default_timezone_set("America/Panama"); //ZONA HORARIA PAN
        $datetime = date("d_m_Y");
        $fName    = "indices" . $datetime . ".txt";
        //QUERY
        $dataExport = exportDatosIndices();
        //VALIDATE THAT THE FILE EXIST AND WAS DELETED
        if (renameFile($fName)) {
            getDataAnalyser($dataExport, $labelsIndices, $idFromHTML, $fName);
            echo "../Export/" . $fName;
            saveLogs($_SESSION['name'], "El sistema borró el archivo anterior y creó el archivo $fName ,Usuario exportó  registros de TB resultados - Nombre del archivo $fName");
        } else {
            getDataAnalyser($dataExport, $labelsIndices, $idFromHTML, $fName);
            echo "../Export/" . $fName;
            saveLogs($_SESSION['name'], "El sistema creó el archivo $fName y  exportó  registros de TB resultados - Nombre del archivo $fName");
        }
        break;

    default:
        echo "Algo salió mal en la calsificación del tipo de Export";
        break;
}

/*//GET DAT FROM DB - WITH FORMAT OD LABELS UP
$dataExport = exportDatosInscritos();
//CONVERT OBJECT TO ARRAY
$arrayDataExport = convert_object_to_array($dataExport);
//GET SIZE FROM BOTH ARRAYS
$lengArrayA = sizeof($arrayDataExport);
$lengArrayB = sizeof($labelsInscritos);
//INIT VARS
$j = 0;
$k = 0;*/
//TEST ARRAYS PRINT
/*//ENVIAR LAS FILAS - PRINT
while ($j < 36) {
echo "ETIQUETA ->" . $labelsInscritos[$j] . "  Valor JS ->" . $idFromHTML[$j] . " VALOR MYSQL ->" . $arrayDataExport[2][$labelsInscritos[$j]] . " LONGITUD ->" . strlen($arrayDataExport[2][$labelsInscritos[$j]]) . "\n";
$j++;
}*/

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCIONES

function getDataAnalyser($DATABASE, $LABELSSQL, $LABELSJS, $FILENAME)
{

//CONVERT OBJECT TO ARRAY
    $arrayDataExport = convert_object_to_array($DATABASE);
//GET SIZE FROM BOTH ARRAYS
    $lengArrayA = sizeof($arrayDataExport);
    $lengArrayB = sizeof($LABELSJS);
//INIT VARS
    $j = 0;
    $k = 0;

//SET ARRAY WITH NUMBER FILL
    while ($j < $lengArrayA) {
        analyserRow($j, $LABELSSQL, $LABELSJS, $arrayDataExport, $FILENAME);
        $j++;
    }
}

//FUNCION PARA CONTAR LOS CARACTERES

//FUNCTION TO SEND ONE BY ONE ID TO  MAKE THE NEW ARRAY
function analyserRow($INDICE, $ARRAYLABELCONFIG, $ARRAYHTML, $ARRAYTOANALYZER, $FILENAME)
{
    $sizeArray = count($ARRAYLABELCONFIG);
    $a         = 0;
    //echo "RANGO: $sizeArray\n";
    $arrayExport = array();
    $xdata       = "";
    while ($a < $sizeArray) {
        $A = verifyLabel($a, $ARRAYHTML, $ARRAYLABELCONFIG, $ARRAYLABELCONFIG[$a], $ARRAYTOANALYZER[$INDICE][$ARRAYLABELCONFIG[$a]]);
        array_push($arrayExport, $A);
        $a++;
    }
    //var_dump($arrayExport);
    //DELETE ALL STRANGE CHARACTERS AND  MAKE A IMPLODE TO INSERT ALL DATA INTO THE NEW ARRAY
    $xdata = implode("", $arrayExport);
    //CALL TO THE TXTFILE FUNCTION
    $typefilelong = count($ARRAYHTML);
    switch ($typefilelong) {
        case 36:
            txtFile($xdata, $FILENAME);
            break;
        case 19:
            //renameFile($fName);
            txtFile($xdata, $FILENAME);
            break;
        case 8:
            //renameFile($fName);
            txtFile($xdata, $FILENAME);
            break;
        default:

            break;
    }

}

//VERIFY THAT THE DATA TRANSFER IS  A STRING OR DIGIT
function verifyLabel($INDICE, $ARRAYFRONTEND, $ARRAYLABELCONFIG, $LABELSROW, $DATAREGISTER)
{

    $patron = "/^[[:digit:]]+$/";
    $result = "";
    //IF DATA A DIGIT
    if (preg_match($patron, $DATAREGISTER)) {
        $result = zero_fill($DATAREGISTER, $ARRAYFRONTEND[$INDICE]);
        //print "$ARRAYFRONTEND[$INDICE] -- $ARRAYLABELCONFIG[$INDICE]-- VALOR ESTABLECIDO: -$ARRAYFRONTEND[$INDICE] -ANTERIOR $DATAREGISTER --- NUEVA $result\n";
    } else {
        //print "La cadena $DATAREGISTER Caracteres\n";
        $result = space_fill($DATAREGISTER, $ARRAYFRONTEND[$INDICE]);
        //print "$ARRAYFRONTEND[$INDICE] -- $ARRAYLABELCONFIG[$INDICE]-- VALOR ESTABLECIDO: -$ARRAYFRONTEND[$INDICE] -ANTERIOR $DATAREGISTER --- NUEVA $result\n";

    }
    return $result;
}

//ADD ZERO TO DATA IF NOT HAVE THE CORRECT SIZE USING THE JS DATA SIZE SETTED
//VALORES O STRING , LONGITUD
function zero_fill($valor, $long)
{
    return str_pad($valor, $long, "0", STR_PAD_LEFT);
}

//ADD A SPACE TO DATA IS NOT HAVE THE CORRECT SIZE THE JS DATA SIZE
function space_fill($valor, $long)
{
    return str_pad($valor, $long, " ", STR_PAD_RIGHT);
}

//CONVERTIR LA CADENA A TXT
function txtFile($DATA, $FILENAME)
{
    $fp = fopen($FILENAME, "a");
    fwrite($fp, $DATA . PHP_EOL);
    fclose($fp);

}

function renameFile($FILENAME)
{
//COMPRUEBA SI EL ARCHIVO EXISTE
    $newNameFile = explode('.txt', $FILENAME);
    $randFile    = rand();
    if (file_exists($FILENAME)) {
        rename($FILENAME, $newNameFile[0] . $randFile . "tmp.txt");
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}
