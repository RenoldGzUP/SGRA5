<?php
include_once 'classConexionDB.php';
openConnection();
include_once 'library_db_sql.php';
session_start();
// Turn off all error reporting
error_reporting(0);
saveLogs($_SESSION['name'], "Administrador registro un usuario ");

$USERNAME = $_POST["idUsuarioPWD"];
$RESTORE  = md5("J{Uj2}F{ty");
$STATE    = 1;
//1 BLOCK
//0 LOGIN
updatePaswordUser($RESTORE, $STATE, $USERNAME);
