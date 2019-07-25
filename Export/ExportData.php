<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();

//GET DATA FROM AJAX JS
$labelsInscritos = array("apellido", "nombre", "provincia", "clave", "tomo", "folio", "bach", "ao_grad", "sexo", "col_proc", "cod_col", "mes_n", "dia_n", "ao_n", "tipoc", "provi", "distri", "corregi", "mes_i", "dia_i", "ao_i", "ao_lectivo", "sede", "fac_ia", "esc_ia", "car_ia", "car_ia", "car_iia", "car_iiia", "fac_iia", "fac_iiia", "telefono", "fecha_n", "fecha_i", "n_ins", "d");

$leng = count($labelsInscritos);
//$idInscritosExport = array();

//GET TIME
$tiempo_inicial = microtime(true);

$idFromHTML = explode('-', $_POST["idInscritosExp"]);

/*for ($i = 0; $i < $leng; $i++) {
$idInscritosExport[i] = $_POST["labelsInscritos[$i]"];

}*/

//var_dump($idFromHTML);

//Obtener los valores

$dataExport = exportDatosInscritos();

$arrayDataExport = convert_object_to_array($dataExport);

$lengArrayA = sizeof($arrayDataExport);
$lengArrayB = sizeof($labelsInscritos);

//var_dump($arrayDataExport);

$j = 0;
$k = 0;

//ENVIAR LAS FILAS
while ($j < $lengArrayA) {
    analyserRow($j, $labelsInscritos, $idFromHTML, $arrayDataExport);
    $j++;
}

//CALCULAR TIEMPO DE EJECUCION

$tiempo_final = microtime(true);
$tiempo       = $tiempo_final - $tiempo_inicial;
$mSegundos    = $tiempo * 1000;

//TIEMPO DE EJECUCION | RUTA DE ARCHIVO
echo round($mSegundos) . "|" . "../Export/" . nameFile();

//ENVIAR SOLO UNA
//analyserRow(2, $labelsInscritos, $idFromHTML, $arrayDataExport);

//VERIFICAR LONGITUD DE CADA UNA DE LAS CONSULTAS

//FUNCIONES
//FUNCION PARA CONTAR LOS CARACTERES

function analyserRow($INDICE, $ARRAYLABELCONFIG, $ARRAYHTML, $ARRAYTOANALYZER)
{
    //echo "FUNCION ANALIZAR Y DIVIDIR\n";
    $sizeArray = count($ARRAYLABELCONFIG);
    $a         = 0;
    //echo "RANGO: $sizeArray\n";
    $arrayExport = array();
    while ($a < $sizeArray) {

        //echo $ARRAYLABELCONFIG[$a] . " ---- " . $ARRAYTOANALYZER[$INDICE][$ARRAYLABELCONFIG[$a]] . "\n";
        //echo "\n";
        //PASAMOS EL ARREGLO
        //countString($ARRAYLABEL, $ARRAYTOANALYZER[$INDICE][$ARRAYLABEL[$a]]);
        //$arrayExport = array();
        $A = verifyLabel($a, $ARRAYHTML, $ARRAYLABELCONFIG, $ARRAYLABELCONFIG[$a], $ARRAYTOANALYZER[$INDICE][$ARRAYLABELCONFIG[$a]]);
        array_push($arrayExport, $A);

        $a++;
    }
    //var_dump($arrayExport);
    $xdata = implode("", $arrayExport);
    //echo "$xdata \n\n";
    txtFile($xdata);

}

function verifyLabel($INDICE, $ARRAYFRONTEND, $ARRAYLABELCONFIG, $LABELSROW, $DATAREGISTER)
{

    $patron = "/^[[:digit:]]+$/";
    //$fp          = fopen('inscritos45.txt', 'w');
    if (preg_match($patron, $DATAREGISTER)) {
        //print "La cadena $DATAREGISTER son sólo números\n";
        $result = zero_fill($DATAREGISTER, $ARRAYFRONTEND[$INDICE]);

        //txtFile($export);
        //fwrite($fp, $result . PHP_EOL);
        // print "$ARRAYFRONTEND[$INDICE] -- $ARRAYLABELCONFIG[$INDICE]-- VALOR ESTABLECIDO: -$ARRAYFRONTEND[$INDICE] -ANTERIOR $DATAREGISTER --- NUEVA $result\n";

    } else {
        // print "$ARRAYFRONTEND[$INDICE] -- $ARRAYLABELCONFIG[$INDICE]  -- La cadena $DATAREGISTER no son sólo números\n";
        $result = space_fill($DATAREGISTER, $ARRAYFRONTEND[$INDICE]);
        //txtFile($export);
        //fwrite($fp, $DATAREGISTER . PHP_EOL);
    }
    return $result;
}

//VALORES O STRING , LONGITUD
function zero_fill($valor, $long)
{
    return str_pad($valor, $long, '0', STR_PAD_LEFT);
}

function space_fill($valor, $long)
{
    return str_pad($valor, $long, ' ', STR_PAD_RIGHT);
}

//CONVERTIR LA CADENA A TXT
function txtFile($DATA)
{
    $fp = fopen(nameFile(), "a");
    fwrite($fp, $DATA . PHP_EOL);
    fclose($fp);
}

function nameFile()
{
    date_default_timezone_set("America/Panama"); //ZONA HORARIA PAN
    $datetime  = date("d_m_Y");
    $nameToTxt = "inscritos$datetime.txt";
    return $nameToTxt;
}
