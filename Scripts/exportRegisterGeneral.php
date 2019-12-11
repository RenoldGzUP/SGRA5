<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
saveLogs($_SESSION['name'], "Administrador exportó  datos de BD Resultados ");

//Get the filename by front-end
$idInscritoToExport   = $_POST["idInscrito"];
$stateExport = $_POST["state"];

//SPLIT OF REGISTER SENT
$idExplode = explode(",", $idInscritoToExport);

//GET TABLE NAME RESULTADOS
$TABLES = get_Table_Name();
        foreach ($TABLES as $key) {
          $T_INSCRITOS = $key->tb_inscritos_new_year;
          $T_RESULTADOS = $key->tb_resultados_new_year;
        }

//////////////////////////////////////////////////////

if ($stateExport == 1) {
	exportOneInscritos($idExplode,$T_INSCRITOS);
} elseif ($stateExport == 2) {
	exportOneResultados($idExplode,$T_RESULTADOS);
} else {
	echo "Algo salio mal";
}

//////////////////////////////////////////////
function checkFile($filePathSearch){
	saveLogs($_SESSION['name'],"Verificando duplicidad de archivos csv");
	if (file_exists($filePathSearch)) {
		$fileState = "completed";
		$tmpName = basename($filePathSearch,".csv");
		rename($filePathSearch,"../Export/". $tmpName."_tmp_".rand()."_.csv");
		saveLogs($_SESSION['name'],"Se renombro el archivo csv a tmp");
	}else{
		//echo "No exist";
		saveLogs($_SESSION['name'],"No hay archivos duplicados para exportar");
		$fileState = "completed";
	}
	return $fileState;
	
}

//FUNCTION TO GENERATE NEW FILES
function generateFile($filePath, $data){
	$file = fopen($filePath,"a");
	//fwrite($file,implode(',', $data). PHP_EOL);
	fputcsv($file, $data);
	fclose($file);
}

////////////////////////////////////////////////////////////////////////////

function exportOneInscritos($dataSearch,$TABLA_INSCRITOS){
	$idExplode = $dataSearch;
	$datetime = date("d_m_Y");
	$fileName = $datetime;
	$filePathA ="../Export/export_register_INSCRITOS_".$fileName.".csv";
	
	if (checkFile($filePathA)== "completed") {
		for ($i=0; $i <sizeof($idExplode) ; $i++) { 
			$id_CID_INS = explode("-",$idExplode[$i]);
			$arreglo = exportDataOneInscritos($TABLA_INSCRITOS,$id_CID_INS[0],$id_CID_INS[1],$id_CID_INS[2],$id_CID_INS[3]);
			updateRed($TABLA_INSCRITOS,"EXP00",$id_CID_INS[0],$id_CID_INS[1],$id_CID_INS[2],$id_CID_INS[3]);
			$dataToSave = convert_object_to_array($arreglo);
			generateFile($filePathA,$dataToSave);
		}
		echo $filePathA;
	}

saveLogs($_SESSION['name'],"Generó un archivo exportado de Inscritos");
}

function exportOneResultados($dataSearch,$TABLA_RESULTADOS){
	$idExplode = $dataSearch;
	$datetime = date("d_m_Y");
	$fileName = $datetime;
	$filePathB ="../Export/export_register_RESULTADOS_".$fileName.".csv";
	
	if (checkFile($filePathB)== "completed") {
		for ($i=0; $i <sizeof($idExplode) ; $i++) { 
			$id_CID_RES = explode("-",$idExplode[$i]);
			$arreglo = exportDataOneResultados($TABLA_RESULTADOS,$id_CID_RES[0],$id_CID_RES[1],$id_CID_RES[2],$id_CID_RES[3]);
			updateRed($TABLA_RESULTADOS,"EXP01",$id_CID_RES[0],$id_CID_RES[1],$id_CID_RES[2],$id_CID_RES[3]);
			$dataToSave = convert_object_to_array($arreglo);
			generateFile($filePathB,$dataToSave);
		}
		echo $filePathB;
	}
	saveLogs($_SESSION['name'],"Generó un archivo exportado de Resultados");
}
