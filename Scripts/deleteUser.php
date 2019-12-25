<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');
session_start();
saveLogs($_SESSION['name'],"Administrador eliminó a un usuario");

$idUSER = $_POST["idSend"];
$resultSQL =  deleteRegister($idUSER);
saveLogs($_SESSION['name'],"Administrador eliminó a [".$idUSER."]");
header("Location:../pagesAdm/usuarios.php");
?>