<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();

//GET DATA FROM AJAX JS
$labelsInscritos = array("apellido", "nombre", "provincia", "clave", "tomo", "folio", "bach", "ao_grad", "sexo", "col_proc", "cod_col", "mes_n", "dia_n", "ao_n", "tipoc", "provi", "distri", "corregi", "mes_i", "dia_i", "ao_i", "ao_lectivo", "sede", "fac_ia", "esc_ia", "car_ia", "car_ia", "car_iia", "car_iiia", "fac_iia", "fac_iiia", "telefono", "fecha_n", "fecha_i", "n_ins", "d");

$leng = count($labelsInscritos);

//GET TIME
$tiempo_inicial = microtime(true);
//GET ARRAY FROM JS
$idFromHTML = explode('-', $_POST["idFrontEnd"]);
//GET DAT FROM DB - WITH FORMAT OD LABELS UP
$dataExport = exportDatosInscritos();
//CONVERT OBJECT TO ARRAY
$arrayDataExport = convert_object_to_array($dataExport);
//GET SIZE FROM BOTH ARRAYS
$lengArrayA = sizeof($arrayDataExport);
$lengArrayB = sizeof($labelsInscritos);
//INIT VARS
$j = 0;
$k = 0;
//TEST ARRAYS PRINT
/*//ENVIAR LAS FILAS - PRINT
while ($j < 36) {
echo "ETIQUETA ->" . $labelsInscritos[$j] . "  Valor JS ->" . $idFromHTML[$j] . " VALOR MYSQL ->" . $arrayDataExport[2][$labelsInscritos[$j]] . " LONGITUD ->" . strlen($arrayDataExport[2][$labelsInscritos[$j]]) . "\n";
$j++;
}*/

//SET ARRAY WITH NUMBER FILL
while ($j < $lengArrayA) {
    analyserRow($j, $labelsInscritos, $idFromHTML, $arrayDataExport);
    $j++;
}

//MEASURING START TIME
$tiempo_final = microtime(true);
$tiempo       = $tiempo_final - $tiempo_inicial;
$mSegundos    = $tiempo * 1000;

//SEND NAME FILE AND INSERT NEW LOG INTO DATABASE REGISTER
//GET THE NAME FILE
$fName = nameFile();
echo "../Export/$fName";
saveLogs($_SESSION['name'], "Usuario exportó  registros de TB inscritos - Nombre del archivo $fName");

//ENVIAR SOLO UNA
//analyserRow(2, $labelsInscritos, $idFromHTML, $arrayDataExport);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCIONES
//FUNCION PARA CONTAR LOS CARACTERES

//FUNCTION TO SEND ONE BY ONE ID TO  MAKE THE NEW ARRAY
function analyserRow($INDICE, $ARRAYLABELCONFIG, $ARRAYHTML, $ARRAYTOANALYZER)
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
    txtFile($xdata);

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
function txtFile($DATA)
{
    $fileNameTXT = nameFile();
    $fp          = fopen($fileNameTXT, "a");
    fwrite($fp, $DATA . PHP_EOL);
    fclose($fp);

}

function nameFile()
{
    date_default_timezone_set("America/Panama"); //ZONA HORARIA PAN
    $datetime = date("d_m_Y");
    //$randName  = rand();
    $nameToTxt = "inscritos$datetime.txt";
    //return $nameToTxt;

//COMPRUEBA SI EL ARCHIVO EXISTE
    $newNameFile = explode('.txt', $nameToTxt);
    if (file_exists($nameToTxt)) {
//  echo "El fichero" . $archivo["name"] . " existe";
        //rename($archivo["name"], $newNameFile[0] . $rNumber . ".csv");
        copy($nameToTxt, $newNameFile[0] . "tmp.txt");

    }

    return $nameToTxt;
}
