<?php
include_once('../Scripts/ClassConexionDB.php');
openConnection();
include_once('../Scripts/consultas.php');
$username = "admin";
$password = "admin";
//$_POST['password'];

//$sql = "SELECT * FROM $tbl_name WHERE nombre_usuario = '$username'";
$consultaUsuario = getUsers($username);
print_r($consultaUsuario);
?>