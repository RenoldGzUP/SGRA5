<?php
// Notificar solamente errores de ejecución
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//USER CONTROL - ROL SELECTION
switch ($_SESSION['rol']) {
    case 1:
        include 'headerUser.php';
        break;

    case 2:
        include 'header.php';
        break;
    case 3:
        //PERMISOS ESPECIALES
        include 'headerSpecial.php';
        break;

    default:
        echo "Ocurrio un error al identificar el tipo de usuario";
        break;
}
