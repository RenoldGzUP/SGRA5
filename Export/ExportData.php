<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();

//GET DATA FROM AJAX JS
$labelsInscritos = array("apellido", "nombre", "provincia", "clave", "tomo", "folio", "bach", "ao_grad", "sexo", "col_proc", "cod_col", "mes_n", "dia_n", "ao_n", "tipoc", "provi", "distri", "corregi", "mes_i", "dia_i", "ao_i", "ao_lectivo", "sede", "fac_ia", "esc_ia", "car_ia", "car_ia", "car_iia", "car_iiia", "fac_iia", "fac_iiia", "telefono", "fecha_n", "fecha_i", "n_ins", "d");

$leng = count($labelsInscritos);
//$idInscritosExport = array();

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
/*while ($j < $lengArrayA) {
analyserRow(2, $labelsInscritos, $idFromHTML, $arrayDataExport);
$j++;
}*/

//ENVIAR SOLO UNA
analyserRow(2, $labelsInscritos, $idFromHTML, $arrayDataExport);

//VERIFICAR LONGITUD DE CADA UNA DE LAS CONSULTAS

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
    var_dump($arrayExport);
    txtFile($arrayExport);
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
        $result = $DATAREGISTER;
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

function txtFile($DATA)
{
    $fp = fopen('inscritos455556.txt', 'w');

    $long = sizeof($DATA);
    $j;
    while ($j < $long) {
        fwrite($fp, $DATA[$j] . PHP_EOL);
    }

    fclose($fp);
}

/*
$archivo = $_POST["idFile"];

//CONSULTAR SI LOS REGISTROS FUERON EXPORTADOS O NO

//OBTENER TODOS LOS REGISTROS QUE NO HAYAN SIDO EXPORTADOS

//GUARDAR LOS REGISTROS QUE SE VAN A EXPORTAR

//PROCESAR LA INFORMACIÓN
exportData($DB, $NAMEFILE);

//RETORNAR LA RUTA DEL ARCHIVO

//get records from database
$query = $db->query("SELECT * FROMmembersORDERBYidDESC");

if ($query->num_rows > 0) {
$delimiter = ", ";
$filename  = "members_" . date('Y-m-d') . " . csv";

//create a file pointer
$f = fopen('php://memory', 'w');

//set column headers
$fields = array('ID', 'Name', 'Email', 'Phone', 'Created', 'Status');
fputcsv($f, $fields, $delimiter);

//output each row of the data, format line as csv and write to file pointer
while ($row = $query->fetch_assoc()) {
$status   = ($row['status'] == '1') ? 'Active' : 'Inactive';
$lineData = array($row['id'], $row['name'], $row['email'], $row['phone'], $row['created'], $status);
fputcsv($f, $lineData, $delimiter);
}

//move back to beginning of file
fseek($f, 0);

//set headers to download file rather than displayed
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '";');

//output all remaining data on a file pointer
fpassthru($f);
}
exit;*/
