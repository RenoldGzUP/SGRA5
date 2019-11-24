<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();
saveLogs($_SESSION['name'], "Administrador exportó  datos de BD Resultados ");

//Get the filename by front-end
$idInscritoToExport   = $_POST["idInscrito"];
$stateExport = $_POST["state"];

//SPLIT OF REGISTER SENT
$idExplode = explode(",", $idInscritoToExport);

//////////////////////////////////////////////////////

if ($stateExport == 1) {
   exportOneInscritos($idExplode);
} elseif ($stateExport == 2) {
	exportOneResultados($idExplode);
} else {
    echo "Algo salio mal";
}


//FUNCTION TO GENERATE NEW FILES
function generateFile($filePath, $data){
	$file = fopen($filePath,"a");
    fwrite($file,implode(",", $data). PHP_EOL);
    fclose($file);
   }

////////////////////////////////////////////////////////////////////////////

function exportOneInscritos($dataSearch){
	$idExplode = $dataSearch;
	$datetime = date("d_m_Y");
	$fileName = $datetime;
	$filePathB ="../Export/export_register_INSCRITOS_".$fileName.".csv";

	for ($i=0; $i <sizeof($idExplode) ; $i++) { 
		$arreglo = exportDataOneInscritos($idExplode[$i]);
		$dataToSave = convert_object_to_array($arreglo);
		$path = generateFile($filePathB,$dataToSave);
	}
    echo $filePathB;
}

function exportOneResultados($dataSearch){
	$idExplode = $dataSearch;
	$datetime = date("d_m_Y");
	$fileName = $datetime;
	$filePathB ="../Export/export_register_RESULTADOS_".$fileName.".csv";

	for ($i=0; $i <sizeof($idExplode) ; $i++) { 
		$arreglo = exportDataOneResultados($idExplode[$i]);
		$dataToSave = convert_object_to_array($arreglo);
		$path = generateFile($filePathB,$dataToSave);
	}
    echo $filePathB;
}
