<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();

$archivo  = $_POST["idFile"];
$csv_file = fopen($archivo, 'rb');

//SEND LOG
saveLogs($_SESSION['name'], "Usuario cargo al sistema (TB Inscritos) el archivo $archivo");
//echo "DESDE EL LOADER  " . $archivo;

//fgetcsv($csv_file);
$fila         = 0;
$errorCounter = 0;
$okCounter    = 0;

$linecount1 = count(file($archivo));
//GET TIME
$tiempo_inicial = microtime(true);

//CONTEO DE LA PRIMERA LINEA DEL CSV
//VALIDAR EL NUMERO DE LINEAS DEL CSV
$aDatos       = fgetcsv($csv_file);
$fileInscrito = count($aDatos);
//REPOSICIONAR EL PUNTERO DE LECTURA EN LA PRMERA LINEA DEL CSV
fseek($csv_file, 0);

if ($fileInscrito == 98) {
    while (($emp_record = fgetcsv($csv_file)) !== false) {
// Check if employee already exists with same emai

//LLAMADO A LA FUNCION CONVERTER UTF8
        $arrayInscritos = utf8_converter($emp_record);
        //    print_r($arrayInscritos);
        //echo "<br>"; //* Esto es un salto de linea
        //echo "numero de lineas " . $fila;
        //echo "<br>"; //* Esto es un salto de linea
        $fila++;

        $resultset = checkRegisterExistInscritos($arrayInscritos[33]);
        // if employee already exist then update details otherwise insert new record

        if (isset($resultset)) {
            // echo "error";
            $errorCounter++;
            // echo 1;
        } else {

            insertNewDataInscritos($arrayInscritos[0], $arrayInscritos[1], $arrayInscritos[2], $arrayInscritos[3], $arrayInscritos[4], $arrayInscritos[5], $arrayInscritos[6], $arrayInscritos[7], $arrayInscritos[8], $arrayInscritos[9], $arrayInscritos[10], $arrayInscritos[11], $arrayInscritos[12], $arrayInscritos[13], $arrayInscritos[14], $arrayInscritos[15], $arrayInscritos[16], $arrayInscritos[17], $arrayInscritos[18], $arrayInscritos[19], $arrayInscritos[20], $arrayInscritos[21], $arrayInscritos[22], $arrayInscritos[23], $arrayInscritos[24], $arrayInscritos[25], $arrayInscritos[26], $arrayInscritos[27], $arrayInscritos[28], $arrayInscritos[29], $arrayInscritos[30], $arrayInscritos[31], $arrayInscritos[32], $arrayInscritos[33], $arrayInscritos[34], $arrayInscritos[35], $arrayInscritos[36], $arrayInscritos[37], $arrayInscritos[38], $arrayInscritos[39], $arrayInscritos[40], $arrayInscritos[41], $arrayInscritos[42], $arrayInscritos[43], $arrayInscritos[44], $arrayInscritos[45], $arrayInscritos[46], $arrayInscritos[47], $arrayInscritos[48], $arrayInscritos[49], $arrayInscritos[50], $arrayInscritos[51], $arrayInscritos[52], $arrayInscritos[53], $arrayInscritos[54], $arrayInscritos[55], $arrayInscritos[56], $arrayInscritos[57], $arrayInscritos[58], $arrayInscritos[59], $arrayInscritos[60], $arrayInscritos[61], $arrayInscritos[62], $arrayInscritos[63], $arrayInscritos[64], $arrayInscritos[65], $arrayInscritos[66], $arrayInscritos[67], $arrayInscritos[68], $arrayInscritos[69], $arrayInscritos[70], $arrayInscritos[71], $arrayInscritos[72], $arrayInscritos[73], $arrayInscritos[74], $arrayInscritos[75], $arrayInscritos[76], $arrayInscritos[77], $arrayInscritos[78], $arrayInscritos[79], $arrayInscritos[80], $arrayInscritos[81], $arrayInscritos[82], $arrayInscritos[83], $arrayInscritos[84], $arrayInscritos[85], $arrayInscritos[86], $arrayInscritos[87], $arrayInscritos[88], $arrayInscritos[89], $arrayInscritos[90], $arrayInscritos[91], $arrayInscritos[92], $arrayInscritos[93], $arrayInscritos[94], $arrayInscritos[95], $arrayInscritos[96], $arrayInscritos[97]);

            $okCounter++;

        }
    }
    fclose($csv_file);
    $tiempo_final = microtime(true);
    $tiempo       = $tiempo_final - $tiempo_inicial;
    $mSegundos    = $tiempo * 1000;
    sendStatusInsFile($errorCounter, $okCounter, $linecount1, $mSegundos, $archivo);

} else {
    saveLogs($_SESSION['name'], "CSV no cuenta con el Formato valido para la Tabla Inscritos -> $archivo");
    echo "error| Formato CSV no valido para la Tabla Inscritos";
}

function sendStatusInsFile($WRONG, $INSERT, $LINEAS, $ms, $ARCHIVO)
{
    echo $WRONG . " Registros repetidos de $LINEAS, $INSERT Registros insertados  de $LINEAS |" . round($ms);
    saveLogs($_SESSION['name'], "Registros cargados al sistema (TB Inscritos) : $INSERT  DESDE-> $ARCHIVO");
}

function utf8_converter($array)
{
    array_walk_recursive($array, function (&$item, $key) {
        if (!mb_detect_encoding($item, 'utf-8', true)) {
            $item = utf8_encode($item);
        }
    });

    return $array;
}
