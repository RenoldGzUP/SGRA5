<?php

// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once('classConexionDB.php');
openConnection();
include_once('library_db_sql.php');
session_start();



$data = showDataResultado();

$newData= convert_object_to_array($data);

header('Content-type: application/json');
echo json_encode($newData);



function convert_object_to_array($data) {

    if (is_object($data)) {
        $data = get_object_vars($data);
    }

    if (is_array($data)) {
        return array_map(__FUNCTION__, $data);
    }
    else {
        return $data;
    }
}

?>