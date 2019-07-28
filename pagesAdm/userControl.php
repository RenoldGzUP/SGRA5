<?php
include_once './Scripts/classConexionDB.php';
openConnection();
include_once './Scripts/library_db_sql.php';
session_start();
//saveLogs($_SESSION['name'],"Ocurrio un error al ejecutar el Script de permisos");
// Notificar solamente errores de ejecución
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

//USER CONTROL - ROL SELECTION
if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) {
    // require '../modulos/headerUser.php';
} else if ($_SESSION['rol'] == 2) {
    //include '../modulos/header.php';
} else {
    saveLogs($_SESSION['name'], "Ocurrió un error al iniciar sesión");
}

//PERMISOS ESPECIALES
