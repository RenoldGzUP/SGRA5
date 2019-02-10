<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');
session_start();
saveLogs($_SESSION['name'],"Administrador exportó  datos de BD Resultados ");

//Get the filename by front-end
$filename = $_POST["filename"];
$pathCSV = exportDataResultados($filename);
echo $pathCSV;
?>