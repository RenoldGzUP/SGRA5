<?php
include_once('classConexionDB.php');
openConnection();
include_once('library_db_sql.php');
session_start();

// include_once 'Sample_Header.php';
// //echo "PROCESADOR DE TEXTO";
// $phpWord = new \PhpOffice\PhpWord\PhpWord();

// //Get Data from JS 
//Convert the POST info to array using explode  
$numInscrito = explode(",", $_POST["idInscrito"])  ;

//Files inside Array
$countInscritos = count($numInscrito);

//Replay control
for ($i=0; $i <$countInscritos; $i++) { 
	//include 'Certificacion General_M2.php';
	//$section->addPageBreak();
	echo "docx".$i;
}

// Save file
//$datetime = date("d-m-Y h:i:s A");
//$pathDocument  = "../Scripts/tmp/Certificacion".$datetime.".docx"; 
//$phpWord->save($pathDocument);
//echo "$pathDocument";


?>