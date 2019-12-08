<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
//include_once '../Scripts/validacionFlujoNewUser.php';

//GET DATA FROM JS
$name            = strtoupper($_POST["idName"]);
$lastName        = strtoupper($_POST["idLastName"]);
$cedula          = $_POST["idCID"];
//$idSearch        = $_POST["idInscrito"];
$tableInscritos  = $_POST["table1"];
$tableResultados = $_POST["table2"];

//VALIDATE DATA TO DO THE QUERY

if (compare_table($tableInscritos, $tableResultados)) {
///SI LA CEDULA NO ESTA VACIA
    if (isset($cedula)) {
        //BUSQUEDA DE RESULTADOS X CEDULA
        // validate_user_exist_CID($cedula);
        if (validate_user_exist_CID($cedula, $name, $lastName) == 0) {
            // echo "EL USUARIO YA FUE VALIDADO";
            echo 0;
        } else if (validate_user_exist_CID($cedula, $name, $lastName) == 1) {
            //echo "USUARIO ENCONTRADO SIN VALDIACI+ÓN";
            echo 1;

        }else if (validate_user_exist_CID($cedula, $name, $lastName) == 3) {
            //echo "USUARIO IMCOMPLETO";
            echo 3;

        }else {
            //el usuaio no existe
            echo 2;
        }

    /*} else if (isset($idSearch)) {
        //BUSQUEDA DE RESULTADOS X N_INSCRITOS
        if (validate_user_exist_Ninscrito($idSearch)) {
            echo 3;
        } else {
            //echo "NO existe usuario en las bases de datos";
            echo 3;
        }*/

    } else {
        //echo "Hay campos sin especificar para la busqueda";
        echo 2;}

}else {
    //echo "Usuario no indico Las tablas correspondiente al año anterior";
    echo 2;}

//////////////////////////////////////////////////////////////////
//FUNCIONES
function utf8_converter($array)
{
    array_walk_recursive($array, function (&$item, $key) {
        if (!mb_detect_encoding($item, 'utf-8', true)) {
            $item = utf8_encode($item);
        }
    });

    return $array;
}

function cvf_convert_object_to_array($data)
{
    if (is_object($data)) {
        $data = get_object_vars($data);
    }

    if (is_array($data)) {
        return array_map(__FUNCTION__, $data);
    } else {
        return $data;
    }
}

//COMPROBAR TABLAS
function compare_table($TABLA_A, $TABLA_B)
{
    //TABLA A INSCRITPOS | TABLA B RESULTADOS
    $result_Tabla = "";
//VALIDACION DE LAS TABLAS

    if (preg_match("/2017/", $TABLA_A) && preg_match("/2017/", $TABLA_B)) {
        $result_Tabla = true;
    } else {
        $result_Tabla = false;
    }

    return $result_Tabla;
}




//check isf existe register into validate tb 
function validate_user_exist_CID($CID, $NAME, $LASTNAME)
{
   //1-EXPLODE CID 
    $explodeCID = explode("-", $CID);
    $State_validation_byCID = "";

    //2-CHECK IF EXISTE REGISTER INTO VALIDATE TB
    $CIDExiste              = validationCIDExist($CID);

    //3-IF EXIST DATA , THENS EXIST REGISTER INTO VALIDATE TB
    if (!is_null($CIDExiste)) {
        //echo "YA EXISTE UNA VALIDACION CON ESTA CEDULA";
        echo 0;
    } else {
        //NO EXISTE UNA VALIDACION ANTERIOR,ENTONCES se PUEDE CONTINUAR
        //VERIFICAR QUE EL USUARIO EXISTE EN LAS BASE DE DATOS
        $DataInscritosCID = getUserCIDFromInscritos($explodeCID[0],$explodeCID[1],$explodeCID[2],$explodeCID[3]);
        $DataResultadosCID = getUserCIDFromResultados($explodeCID[0],$explodeCID[1],$explodeCID[2],$explodeCID[3]);

                if (is_object($DataInscritosCID) && is_object($DataResultadosCID)) {
                    //El usuairo existe en las base de datos
                    $State_validation_byCID = 1;

                } else if (is_null($DataInscritosCID) && is_null($DataResultadosCID)) {

                    // echo "El usuario no existe en las TB de datos ";
                    $State_validation_byCID = 2;

                } else {
                    // echo "El usuario existe en una de las dos TB de datos ";
                    $State_validation_byCID = 3;
                }

    }

    return $State_validation_byCID;

}

/*function validate_user_exist_Ninscrito($N_INSCRITO, $NAME, $LASTNAME)
{
    $State_validation_byNInscrito = "";

    $Validation = validationExist($N_INSCRITO);
    //SI SE ENCEUNTRAN DATOS  ENTONCES SI EXISTE UNA VALIADACION ANTERIOR
    if (!is_null($Validation)) {
        // echo "YA EXISTE UNA VALIDACION CON ESTE N_INSCRITO";
    } else {
        $vInscrito  = validationLastYearInscrito($idSearch);
        $vResultado = validationLastYearResultado($idSearch);
        if (!is_null($vInscrito) && !is_null($vResultado)) {
            $State_validation_byNInscrito = true;

        } else {
            $State_validation_byNInscrito = false;
        }

    }
    return $State_validation_byNInscrito;
}
*/