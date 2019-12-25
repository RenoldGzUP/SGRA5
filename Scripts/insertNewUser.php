<?php
include_once 'classConexionDB.php';
openConnection();
include_once 'library_db_sql.php';
session_start();
// Turn off all error reporting
error_reporting(0);
saveLogs($_SESSION['name'], "Administrador registro un usuario ");

$NAME      = $_POST["name"];
$LASTNAME  = $_POST["lastname"];
$USERNAME  = $_POST["username"];
$EMAIL     = $_POST["email"];
$CHECKROL  = $_POST["chkUser"];
$CLAVE     = $_POST["password"];
$CHECKPAGE = $_POST["chkPage"];

$Encrypted = md5($CLAVE);

//var_dump($CHECKROL);
//var_dump($CHECKPAGE);

 if (!is_object(selectUserExist($USERNAME))) {

        switch ($CHECKROL[0]) {
            case 1:
                saveLogs($_SESSION['name'], "Administrador registró a " . $NAME . " " . $LASTNAME . " como Usuario común");
                //user exist
                $resultSQL = insertNewRegister($NAME, $LASTNAME, $USERNAME, $EMAIL, '1', $Encrypted);
                break;
            case 2:
                saveLogs($_SESSION['name'], "Administrador registró a " . $NAME . " " . $LASTNAME . " como  Administrador");
                $resultSQL = insertNewRegister($NAME, $LASTNAME, $USERNAME, $EMAIL, '2', $Encrypted);
                break;
            case 3:
                $DATARRAY = addExtraFill($CHECKPAGE);
                saveLogs($_SESSION['name'], "Administrador registró a " . $NAME . " " . $LASTNAME . " como usuario especial");
                $resultSQL = insertNewRegisterSpecial($NAME, $LASTNAME, $USERNAME, $EMAIL, '3', $Encrypted, $DATARRAY[0], $DATARRAY[1], $DATARRAY[2], $DATARRAY[3]);
                break;

            default:
                saveLogs($_SESSION['name'], "No hay campos seleccionados");
                break;
        }

 }else{

    saveLogs($_SESSION['name'], "El usuario ->".$USERNAME." <- ya existe en el sistema");
    //echo "usuario existe";
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

////REFRESH
header("Location:../pagesAdm/usuarios.php");
