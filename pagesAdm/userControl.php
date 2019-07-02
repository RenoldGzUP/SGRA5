<?php
include_once ('./Scripts/classConexionDB.php');
openConnection();
include_once ('./Scripts/library_db_sql.php');
session_start();
//saveLogs($_SESSION['name'],"Ocurrio un error al ejecutar el Script de permisos");
// Notificar solamente errores de ejecución
error_reporting(E_ERROR | E_WARNING | E_PARSE);


//USER CONTROL - ROL SELECTION 
if ($_SESSION['rol'] == 1) {
	saveLogs($_SESSION['name'],"Usuario inició Sesión con rol 1");
	include '../modulos/headerUser.php';
}
else if ($_SESSION['rol'] == 2) {
	saveLogs($_SESSION['name'],"Usuario inició Sesión con rol 2");
	include '../modulos/header.php';
}

//PERMISOS ESPECIALES
?>
       