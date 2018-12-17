<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');

$username = "admin";
$password = "admin";
//$_POST['password'];

//$sql = "SELECT * FROM $tbl_name WHERE nombre_usuario = '$username'";
$consultaUsuario = getUsers($username);
print_r($consultaUsuario);
?>