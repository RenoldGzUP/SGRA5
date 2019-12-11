<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();

$archivo  = $_POST["idFile"];
$tabla_Resultado = $_POST["tabla_resultado"];
$csv_file = fopen($archivo, 'r');

//SEND LOG
saveLogs($_SESSION['name'], "Usuario cargo al sistema (TB Resultados)  el archivo $archivo");

//fgetcsv($csv_file);
$fila         = 0;
$errorCounter = 0;
$okCounter    = 0;

//CONTEO DE LA PRIMERA LINEA DEL CSV
$linecount1     = count(file($archivo));
$tiempo_inicial = microtime(true);

//VALIDAR EL NUMERO DE LINEAS DEL CSV
$aDatos       = fgetcsv($csv_file);
$fileInscrito = count($aDatos);
//REPOSICIONAR EL PUNTERO DE LECTURA EN LA PRMERA LINEA DEL CSV
fseek($csv_file, 0);

//SI ES CORRECTO CONTINUA EL PROCESO
if ($fileInscrito == 145) {
    // get data records from csv file
    while (($emp_record = fgetcsv($csv_file)) !== false) {
// Check if employee already exists with same emai

//LLAMADO A LA FUNCION CONVERTER UTF8
        $arrayResultados = utf8_converter($emp_record);
        //    print_r($arrayInscritos);
        //echo "<br>"; //* Esto es un salto de linea
        //echo "numero de lineas " . $fila;
        //echo "<br>"; //* Esto es un salto de linea
        //$fila++;

//VERIFICA SI EL REGISTRO EXISTE
        /*  $resultset = checkRegisterExistResultados($arrayResultados[18]);
        // if employee already exist then update details otherwise insert new record
        if (isset($resultset)) {
        $errorCounter++;
        // echo "Registro ya ha sido insertado, no se actualizará";
        } else */
        insertNewDataResultados($tabla_Resultado,$arrayResultados[0], $arrayResultados[1], $arrayResultados[2], $arrayResultados[3], $arrayResultados[4], $arrayResultados[5], $arrayResultados[6], $arrayResultados[7], $arrayResultados[8], $arrayResultados[9], $arrayResultados[10], $arrayResultados[11], $arrayResultados[12], $arrayResultados[13], $arrayResultados[14], $arrayResultados[15], $arrayResultados[16], $arrayResultados[17], $arrayResultados[18], $arrayResultados[19], $arrayResultados[20], $arrayResultados[21], $arrayResultados[22], $arrayResultados[23], $arrayResultados[24], $arrayResultados[25], $arrayResultados[26], $arrayResultados[27], $arrayResultados[28], $arrayResultados[29], $arrayResultados[30], $arrayResultados[31], $arrayResultados[32], $arrayResultados[33], $arrayResultados[34], $arrayResultados[35], $arrayResultados[36], $arrayResultados[37], $arrayResultados[38], $arrayResultados[39], $arrayResultados[40], $arrayResultados[41], $arrayResultados[42], $arrayResultados[43], $arrayResultados[44], $arrayResultados[45], $arrayResultados[46], $arrayResultados[47], $arrayResultados[48], $arrayResultados[49], $arrayResultados[50], $arrayResultados[51], $arrayResultados[52], $arrayResultados[53], $arrayResultados[54], $arrayResultados[55], $arrayResultados[56], $arrayResultados[57], $arrayResultados[58], $arrayResultados[59], $arrayResultados[60], $arrayResultados[61], $arrayResultados[62], $arrayResultados[63], $arrayResultados[64], $arrayResultados[65], $arrayResultados[66], $arrayResultados[67], $arrayResultados[68], $arrayResultados[69], $arrayResultados[70], $arrayResultados[71], $arrayResultados[72], $arrayResultados[73], $arrayResultados[74], $arrayResultados[75], $arrayResultados[76], $arrayResultados[77], $arrayResultados[78], $arrayResultados[79], $arrayResultados[80], $arrayResultados[81], $arrayResultados[82], $arrayResultados[83], $arrayResultados[84], $arrayResultados[85], $arrayResultados[86], $arrayResultados[87], $arrayResultados[88], $arrayResultados[89], $arrayResultados[90], $arrayResultados[91], $arrayResultados[92], $arrayResultados[93], $arrayResultados[94], $arrayResultados[95], $arrayResultados[96], $arrayResultados[97], $arrayResultados[98], $arrayResultados[99], $arrayResultados[100], $arrayResultados[101], $arrayResultados[102], $arrayResultados[103], $arrayResultados[104], $arrayResultados[105], $arrayResultados[106], $arrayResultados[107], $arrayResultados[108], $arrayResultados[109], $arrayResultados[110], $arrayResultados[111], $arrayResultados[112], $arrayResultados[113], $arrayResultados[114], $arrayResultados[115], $arrayResultados[116], $arrayResultados[117], $arrayResultados[118], $arrayResultados[119], $arrayResultados[120], $arrayResultados[121], $arrayResultados[122], $arrayResultados[123], $arrayResultados[124], $arrayResultados[125], $arrayResultados[126], $arrayResultados[127], $arrayResultados[128], $arrayResultados[129], $arrayResultados[130], $arrayResultados[131], $arrayResultados[132], $arrayResultados[133], $arrayResultados[134], $arrayResultados[135], $arrayResultados[136], $arrayResultados[137], $arrayResultados[138], $arrayResultados[139], $arrayResultados[140], $arrayResultados[141], $arrayResultados[142], $arrayResultados[143], $arrayResultados[144]);
        $okCounter++;

    }

    fclose($csv_file);
    $tiempo_final = microtime(true);
    $tiempo       = $tiempo_final - $tiempo_inicial;
    $mSegundos    = $tiempo * 1000;
    sendStatusResFile($errorCounter, $okCounter, $linecount1, $mSegundos, $archivo);

} else {
    echo "error| Formato CSV no valido para la Tabla Resultados";
    saveLogs($_SESSION['name'], "CSV no cuenta con el Formato valido para la Tabla Resultados -> $archivo");

}

function sendStatusResFile($WRONG, $INSERT, $LINEAS, $ms, $ARCHIVO)
{
    echo "$INSERT Registros insertados  de $LINEAS |" . round($ms);
    //echo $WRONG . " Registros repetidos de $LINEAS, $INSERT Registros insertados  de $LINEAS |" . round($ms);
    saveLogs($_SESSION['name'], "Registros cargados al sistema (TB Resultados) : $INSERT  DESDE-> $ARCHIVO");
}

//echo "->Redondeo de registros ->  " . round(100 / $fila);

function utf8_converter($array)
{
    array_walk_recursive($array, function (&$item, $key) {
        if (!mb_detect_encoding($item, 'utf-8', true)) {
            $item = utf8_encode($item);
        }
    });

    return $array;
}
