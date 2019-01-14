<?php
include_once('classConexionDB.php');
openConnection();
include_once('library_db_sql.php');
session_start();
//saveLogs($_SESSION['name'],"Administrador registro un usuario ");

$NAME = $_POST["name"];
$LASTNAME = $_POST["lastname"];
$USERNAME = $_POST["username"];
$EMAIL = $_POST["email"];
$ROL = $_POST["rol"];
$CLAVE = $_POST["password"];
$Encrypted = md5($CLAVE);

if ($ROL == 1) {
	saveLogs($_SESSION['name'],"Administrador registró a ".$NAME." ".$LASTNAME." como Usuario común");
}
elseif ($ROL == 2) {
	saveLogs($_SESSION['name'],"Administrador registró a ".$NAME." ".$LASTNAME." como  Administrador");
}
else{ 
	saveLogs($_SESSION['name'],"Administrador registró a ".$NAME." ".$LASTNAME." como usuario Sin acceso");}

$resultSQL =  insertNewRegister($NAME,$LASTNAME,$USERNAME,$EMAIL,$ROL,$Encrypted);
header("Location:../pagesAdm/usuarios.php");





?>