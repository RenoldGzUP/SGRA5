<?php  
function Conectarse()  
{  
   
// Información sobre la base de datos
$var_servidor_bd="localhost";  // Servidor de la base de datos, casi siempre localhost
$var_nombre_bd="sgra";  // Nombre de la base de datos
$var_usuario_bd="root";    // Usuario de la base de datos
$var_password_bd="";    // Contraseña de la base de datos


$link = mysqli_connect($var_servidor_bd, $var_usuario_bd, $var_password_bd, $var_nombre_bd);

if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}  
   return $link;  
} 

function ConectarLista()  
{  
   
// Información sobre la base de datos
$var_servidor_bd="localhost";  // Servidor de la base de datos, casi siempre localhost
$var_nombre_bd="sgra";  // Nombre de la base de datos
$var_usuario_bd="root";    // Usuario de la base de datos
$var_password_bd="";    // Contraseña de la base de datos


$link2 = mysqli_connect($var_servidor_bd, $var_usuario_bd, $var_password_bd, $var_nombre_bd);

if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}  
   return $link2;  
}  
?> 