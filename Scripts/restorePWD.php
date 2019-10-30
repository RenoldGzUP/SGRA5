<?php
include_once 'classConexionDB.php';
openConnection();
include_once 'library_db_sql.php';
session_start();
// Turn off all error reporting
error_reporting(0);
saveLogs($_SESSION['name'], "Restauro su Contraseña");

$USERNAME    = $_POST["username"];
$PWD_RESTORE = md5($_POST["password_restore"]);
$CLAVE_A     = md5($_POST["password_a"]);
$CLAVE_B     = md5($_POST["password_b"]);

//VARS
$action_msg;
$error_msg;

//CHECK USER PWD
$result   = getUserPWD($USERNAME);
$LAST_PWD = $result->password;

//PRECHECK
if (isset($USERNAME)) {
    if (isset($result)) {
        //VALIDATE MD5
        if (strcmp($LAST_PWD, $PWD_RESTORE) == 0) {
            if (strcmp($CLAVE_A, $CLAVE_B) == 0) {
                $action_msg = "Contraseña Actualizada, será redirigido en 10 segundos";
                updatePaswordUser($CLAVE_A, 0, $USERNAME);
                ////REFRESH
                header("Refresh: 10; url=index.html");

            } else {
                $error_msg = "Las Contraseñas ingresadas no coinciden";
            }
        } else {
            $error_msg = "Contraseña de seguridad inválida";
        }
    } else {
        $error_msg = "El usuario " . $USERNAME . " no se encuentra registrado en el sistema";
    }

}
