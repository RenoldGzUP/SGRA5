<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');
session_start();
//include '../Scripts/validacionFlujoNewUser.php';

$idSearch = $_POST["idInscrito"];
$tableInscritos = $_POST["table1"];
$tableResultados = $_POST["table2"];

//Obtenemos el último código de validación
//Generamos el nuevo código de Validación a partir del anterior
$lastValidationCode = checkLastValidationCode();
//print_r($lastValidationCode);

if (is_object($lastValidationCode)){
echo "Ultima Validación registrada  ".$lastValidationCode->n_ins;
$newValidationCode = getNewValidationCode($lastValidationCode->n_ins);
echo "Nueva Validación ...   ".$newValidationCode;
saveLogs($_SESSION['name'],"Administrador validó a ".$idSearch." en BD´s".$year);

//TEMPORAL DB
clonTable1toTable2Inscritos($idSearch);
clonTable1toTable2Resultados($idSearch);

//SAVE N_INSCRITO Y VALIDACION
insertOldID($idSearch, $newValidationCode);

//UPDATE
updateInscritosTMP($newValidationCode,$idSearch);
updateResultadosTMP($newValidationCode,$idSearch);

//NEW DB
clonInscritos($newValidationCode);
clonResultados($newValidationCode);

}
else{
$validationCode = "V00001";
echo "   Validación Inicializada...   ".$validationCode;
$year = date("Y");
 saveLogs($_SESSION['name'],"Administrador inició proceso de Validacion ".$year);

//SAVE DATA AND MOVE THE PARAMETER INTO THE NEW DATABASES
 //TEMPORAL DB
clonTable1toTable2Inscritos($idSearch);
clonTable1toTable2Resultados($idSearch);

//SAVE N_INSCRITO Y VALIDACION
insertOldID($idSearch,$validationCode);

//UPDATE
updateInscritosTMP($validationCode,$idSearch);
updateResultadosTMP($validationCode,$idSearch);

//NEW DB
clonInscritos($validationCode);
clonResultados($validationCode);

}



function getNewValidationCode($code){
	$format = "V";
    $valAnterior = intval(preg_replace('/[^0-9]+/', '', $code), 10);
    //separar resultado y gnerr numero a partir de ese 
    $validador =$valAnterior + 1;
 //Validacion 
if($validador <10){
	$validationCode = $format."0000".$validador;}
	elseif($validador >=10 && $validador <=99){
		$validationCode = $format."000".$validador;}
		elseif($validador>=100 && $validador <=999){
			$validationCode = $format."00".$validador;}
			elseif($validador>=1000 && $validador <=9999){
				$validationCode = $format."0".$validador;}
				else{
					$validationCode = $format.$validador;}
return $validationCode;
}


?>