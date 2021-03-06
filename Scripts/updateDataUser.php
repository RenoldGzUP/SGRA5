<?php
include_once 'classConexionDB.php';
openConnection();
include_once 'library_db_sql.php';
session_start();
// Turn off all error reporting
error_reporting(0);
//saveLogs($_SESSION['name'],"Administrador registro un usuario ");

$NAME      = $_POST["name"];
$LASTNAME  = $_POST["lastname"];
$USERNAME  = $_POST["username"];
$EMAIL     = $_POST["email"];
$CHECKROL  = $_POST["chkUser"];
$CLAVE     = $_POST["password"];
$CHECKPAGE = $_POST["chkPage"];
$userID    = $_POST["id_user"];
//$Encrypted = md5($CLAVE);

//var_dump($userID);

switch ($CHECKROL[0]) {
    case 1:
        saveLogs($_SESSION['name'], "Administrador actualizó a " . $NAME . " " . $LASTNAME . " como Usuario común");
        updateUserData($NAME, $LASTNAME, $USERNAME, $EMAIL, '1', $userID);
        break;
    case 2:
        saveLogs($_SESSION['name'], "Administrador actualizó  a " . $NAME . " " . $LASTNAME . " como  Administrador");
        updateUserData($NAME, $LASTNAME, $USERNAME, $EMAIL, '2', $userID);

        break;
    case 3:
        $DATARRAY = addExtraFill($CHECKPAGE);
        // var_dump($DATARRAY);
        saveLogs($_SESSION['name'], "Administrador actualizó  a " . $NAME . " " . $LASTNAME . " como usuario especial");
        updateUserSpecialData($NAME, $LASTNAME, $USERNAME, $EMAIL, '3', $DATARRAY[0], $DATARRAY[1], $DATARRAY[2], $DATARRAY[3], $userID);
        break;

    default:
        saveLogs($_SESSION['name'], "No hay campos seleccionados para actualizar");
        break;
}

//INSERT EXTRA ARRAY

function addExtraFill($ARRAY)
{
    $label = array('1', '2', '3', '4');
    $state = 0;
    var_dump($label);
    if (is_array($ARRAY)) {
        $difference = array_diff($label, $ARRAY);
        $j=0;
        while ($j <= sizeof($label)) {
            if($difference[$j] != 0){
                //ARRAY + POSTION +NO ITIAL STATE + CONTENT
                array_splice($ARRAY, $j, 0, "0");
            }
            $j++;
        }
        //$position = key($difference);
        //echo "Nuevo array";
        //var_dump($ARRAY);
    } else {
        $state = false;
        // echo "NO";
    }

    return $ARRAY;
}
//REFRESH WHEN COMPLETE ALL
header("Location:../pagesAdm/usuarios.php");
