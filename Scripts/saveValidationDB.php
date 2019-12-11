<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();
//include '../Scripts/validacionFlujoNewUser.php';

$id_CID_user = explode("-",$_POST["idCID"]);
$tableInscritos  = $_POST["table1"];
$tableResultados = $_POST["table2"];

//Obtenemos el último código de validación
//Generamos el nuevo código de Validación a partir del anterior
$lastValidationCode = checkLastValidationCode();


/////////////////////////////////////////////////////////////////////////////////////////////
if (!is_null($lastValidationCode)) {
    //ENVIAMOS LA ULTIMA VALIDACION
    saveLogs($_SESSION['name'], "Ultimo código de validación ".$lastValidationCode->codigovalidacion);
    //FUNCTION
    $newValidationCode = getNewValidationCode($lastValidationCode->codigovalidacion);

        //echo "Nueva Validación ...   ".$newValidationCode;
    saveLogs($_SESSION['name'], "Administrador validó a " .$_POST["idCID"]. " en las tablas de datos");
  
    if(validationProcess($tableInscritos,$tableResultados,$newValidationCode,$_POST["idCID"],$id_CID_user[0],$id_CID_user[1],$id_CID_user[2],$id_CID_user[3])){
        echo 1;
    }else{
        echo "Ocurrió un error";
    }


} else {
    $validationCode = "V00001";
    //echo "   Validación Inicializada...   ".$validationCode;
    $year = date("Y");
    saveLogs($_SESSION['name'], "Administrador inició proceso de Validacion " . $year);

    if(validationProcess($tableInscritos,$tableResultados,$validationCode,$_POST["idCID"],$id_CID_user[0],$id_CID_user[1],$id_CID_user[2],$id_CID_user[3])){
        echo 1;
    }else{
        echo "Ocurrió un error";
    }

}

//FUNCION
function getNewValidationCode($code)
{
    $format      = "V";
    $valAnterior = intval(preg_replace('/[^0-9]+/', '', $code), 10);
    //separar resultado y generar numero a partir de ese
    $validador = $valAnterior + 1;
    //Validacion
    if ($validador < 10) {
        $validationCode = $format . "0000" . $validador;} elseif ($validador >= 10 && $validador <= 99) {
        $validationCode = $format . "000" . $validador;} elseif ($validador >= 100 && $validador <= 999) {
        $validationCode = $format . "00" . $validador;} elseif ($validador >= 1000 && $validador <= 9999) {
        $validationCode = $format . "0" . $validador;} else {
        $validationCode = $format . $validador;}

    return $validationCode;
}


function validationProcess($T_INSCRITOS,$T_RESULTADOS,$VALIDATIONCODE,$CID,$PROVINCIA,$CLAVE,$TOMO,$FOLIO){

    saveLogs($_SESSION['name'], "Procesando solicitud de validación...");
    
//PASO 1
    //TEMPORAL DB- pass register to tmp tb , save the data and update data
    saveLogs($_SESSION['name'], "Exportando los registros a las DB temporales");
    clonTable1toTable2Inscritos($T_INSCRITOS,$PROVINCIA,$CLAVE,$TOMO,$FOLIO);
    clonTable1toTable2Resultados($T_RESULTADOS,$PROVINCIA,$CLAVE,$TOMO,$FOLIO);

//PASO 2
    saveLogs($_SESSION['name'], "Regitrando nueva validación");
    //SAVE N_INSCRITO, #VALIDACION,CEDULA
    //get n_ins number
    $N_INS = search_N_ins($T_RESULTADOS,$PROVINCIA,$CLAVE,$TOMO,$FOLIO);
    //insert into
    insertOldID($N_INS->n_ins, $VALIDATIONCODE,$CID);

//PASO 3
    saveLogs($_SESSION['name'], "Actualizando los valores del registro ");
    //UPDATE TB INSCRITOS AND RESULTADOS
    updateInscritosTMP($VALIDATIONCODE,$PROVINCIA,$CLAVE,$TOMO,$FOLIO);
    updateResultadosTMP($VALIDATIONCODE,$PROVINCIA,$CLAVE,$TOMO,$FOLIO);

//PASO 4
    saveLogs($_SESSION['name'], "Clonando registros a las tablas oficiales");
    //CLONE FROM TMP TABLE(2) TO DATE TB (2)

    //GET TABLE NEW NAMES
        $TABLES = get_Table_Name();
        foreach ($TABLES as $key) {
          $T_INSCRITOS_ACT = $key->tb_inscritos_new_year;
          $T_RESULTADOS_ACT = $key->tb_resultados_new_year;
        }

    clonInscritos($T_INSCRITOS_ACT,$PROVINCIA,$CLAVE,$TOMO,$FOLIO);
    //($newValidationCode);
    clonResultados($T_RESULTADOS_ACT,$PROVINCIA,$CLAVE,$TOMO,$FOLIO);

    return true;
}