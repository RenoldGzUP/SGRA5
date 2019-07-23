<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();

//GET DATA FROM AJAX JS
$archivo = $_POST["idFile"];

//CONSULTAR SI LOS REGISTROS FUERON EXPORTADOS O NO

//OBTENER TODOS LOS REGISTROS QUE NO HAYAN SIDO EXPORTADOS

//GUARDAR LOS REGISTROS QUE SE VAN A EXPORTAR

//PROCESAR LA INFORMACIÓN
exportData($DB, $NAMEFILE);

//RETORNAR LA RUTA DEL ARCHIVO

//get records from database
$query = $db->query("SELECT * FROM members ORDER BY id DESC");

if ($query->num_rows > 0) {
    $delimiter = ",";
    $filename  = "members_" . date('Y-m-d') . ".csv";

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
exit;
