<?php
// Notificar solamente errores de ejecución
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//USER CONTROL - ROL SELECTION
if ($_SESSION['rol'] == 1) {
    //saveLogs($_SESSION['name'],"Usuario inició Sesión con rol 1");
    include 'headerUser.php';
} else if ($_SESSION['rol'] == 2) {
    //saveLogs($_SESSION['name'],"Usuario inició Sesión con rol 2");
    include 'header.php';
}

//PERMISOS ESPECIALES
