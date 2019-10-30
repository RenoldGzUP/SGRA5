<?php
include_once './Scripts/classConexionDB.php';
openConnection();
include_once './Scripts/library_db_sql.php';
session_start();

// Notificar solamente errores de ejecución
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// data sent from form login.html
$user     = $_POST['username'];
$password = md5($_POST['password']);

if (isset($user)) {
    if (isset($password)) {
        // Query sent to database
        $result       = getUser($user, $password);
        $location     = $result->type;
        $block_action = $result->estado_acceso;

        if (is_object($result)) {

            //GENERAL BLOCK

            //0 login
            //1 block
            if ($block_action == 0) {

                if ($location == 1) {
                    saveLogs($result->nombre_usuario, "Inició sesión como Usuario Regular ");
                    $_SESSION['loggedin'] = true;
                    $_SESSION['name']     = $result->nombre_usuario;
                    $_SESSION['rol']      = $result->type;
                    $_SESSION['start']    = time();
                    $_SESSION['expire']   = $_SESSION['start'] + (100 * 60);
                    header("Location:./pagesAdm/dashboard.php");

                } elseif ($location == 2) {
                    saveLogs($result->nombre_usuario, "Inició sesión como administrador del sistema");
                    $_SESSION['loggedin'] = true;
                    $_SESSION['name']     = $result->nombre_usuario;
                    $_SESSION['start']    = time();
                    $_SESSION['rol']      = $result->type;
                    $_SESSION['expire']   = $_SESSION['start'] + (100 * 60);
                    header("Location:./pagesAdm/dashboard.php");

                } elseif ($location == 3) {
                    saveLogs($result->nombre_usuario, "Inició sesión como Usuario Especial");
                    $_SESSION['loggedin'] = true;
                    $_SESSION['name']     = $result->nombre_usuario;
                    $_SESSION['start']    = time();
                    $_SESSION['rol']      = $result->type;
                    $_SESSION['expire']   = $_SESSION['start'] + (100 * 60);
                    header("Location:./pagesAdm/dashboard.php");
                }

            } else {
                header("Location:block.html");
            }

        } else {
            // echo "<div class='alert alert-danger' role='alert'>Email or Password are incorrects!
            // <p><a href='index.html'><strong>Please try again!</strong></a></p></div>";
            header("Location:error.html");
        }

    }
}
