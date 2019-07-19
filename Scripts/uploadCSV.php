<?php
include_once 'classConexionDB.php';
openConnection();
include_once 'library_db_sql.php';
session_start();

//Logs
//saveLogs($_SESSION['name'],"Administrador cargó  a la base de datos el archivo CSV  Name -> ");
//include_once("../db_connect.php");
/////////////////////////////////////////

if (isset($_POST['import_data'])) {
// Validate to check uploaded file is a valid csv file
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

//Validación de que el button no ha enviado datos vacios
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csv_file = fopen($_FILES['file']['tmp_name'], 'r');
//fgetcsv($csv_file);

// get data records from csv file
            while (($emp_record = fgetcsv($csv_file)) !== false) {
// Check if employee already exists with same emai

                //LLAMADO A LA FUNCION CONVERTER UTF8
                $arrayInscritos = utf8_converter($emp_record);
                //    print_r($arrayInscritos);
                //echo "<br>"; //* Esto es un salto de linea
                echo "numero de lineas " . $fila;
                echo "<br>"; //* Esto es un salto de linea
                $fila++;

                $resultset = checkRegisterExistInscritos($arrayInscritos[33]);
// if employee already exist then update details otherwise insert new record

                if (isset($resultset)) {
                    echo "Registro ya ha sido insertado, no se actualizará";
                } else {

                    insertNewDataInscritos($arrayInscritos[0], $arrayInscritos[1], $arrayInscritos[2], $arrayInscritos[3], $arrayInscritos[4], $arrayInscritos[5], $arrayInscritos[6], $arrayInscritos[7], $arrayInscritos[8], $arrayInscritos[9], $arrayInscritos[10], $arrayInscritos[11], $arrayInscritos[12], $arrayInscritos[13], $arrayInscritos[14], $arrayInscritos[15], $arrayInscritos[16], $arrayInscritos[17], $arrayInscritos[18], $arrayInscritos[19], $arrayInscritos[20], $arrayInscritos[21], $arrayInscritos[22], $arrayInscritos[23], $arrayInscritos[24], $arrayInscritos[25], $arrayInscritos[26], $arrayInscritos[27], $arrayInscritos[28], $arrayInscritos[29], $arrayInscritos[30], $arrayInscritos[31], $arrayInscritos[32], $arrayInscritos[33], $arrayInscritos[34], $arrayInscritos[35], $arrayInscritos[36], $arrayInscritos[37], $arrayInscritos[38], $arrayInscritos[39], $arrayInscritos[40], $arrayInscritos[41], $arrayInscritos[42], $arrayInscritos[43], $arrayInscritos[44], $arrayInscritos[45], $arrayInscritos[46], $arrayInscritos[47], $arrayInscritos[48], $arrayInscritos[49], $arrayInscritos[50], $arrayInscritos[51], $arrayInscritos[52], $arrayInscritos[53], $arrayInscritos[54], $arrayInscritos[55], $arrayInscritos[56], $arrayInscritos[57], $arrayInscritos[58], $arrayInscritos[59], $arrayInscritos[60], $arrayInscritos[61], $arrayInscritos[62], $arrayInscritos[63], $arrayInscritos[64], $arrayInscritos[65], $arrayInscritos[66], $arrayInscritos[67], $arrayInscritos[68], $arrayInscritos[69], $arrayInscritos[70], $arrayInscritos[71], $arrayInscritos[72], $arrayInscritos[73], $arrayInscritos[74], $arrayInscritos[75], $arrayInscritos[76], $arrayInscritos[77], $arrayInscritos[78], $arrayInscritos[79], $arrayInscritos[80], $arrayInscritos[81], $arrayInscritos[82], $arrayInscritos[83], $arrayInscritos[84], $arrayInscritos[85], $arrayInscritos[86], $arrayInscritos[87], $arrayInscritos[88], $arrayInscritos[89], $arrayInscritos[90], $arrayInscritos[91], $arrayInscritos[92], $arrayInscritos[93], $arrayInscritos[94], $arrayInscritos[95], $arrayInscritos[96], $arrayInscritos[97]);

                }
            }
            fclose($csv_file);
            //$import_status = '?import_status=success';
            echo '<script language="javascript">alert("Registros cargados");</script>';
        } else {
            //$import_status = '?import_status=error';
            echo '<script language="javascript">alert("Ha ocurrido un error"); location.href ="../pagesAdm/datos.php";</script>';
        }
    } else {
        //$import_status = '?import_status=invalid_file';
        echo '<script language="javascript">alert("Archivo inválido");</script>';
        header("Location:../pagesAdm/datos.php");

    }
}
//header("Location: index.php".$import_status);

function utf8_converter($array)
{
    array_walk_recursive($array, function (&$item, $key) {
        if (!mb_detect_encoding($item, 'utf-8', true)) {
            $item = utf8_encode($item);
        }
    });

    return $array;
}
