<?php
include_once('./../../../classConexionDB.php');
openConnection();
include_once('./../../../library_db_sql.php');
session_start();
saveLogs($_SESSION['name'],"Usuario generó Certificaciones desde el procesador");

include_once 'Sample_Header.php';
//echo "PROCESADOR DE TEXTO";
$phpWord = new \PhpOffice\PhpWord\PhpWord();

//Get Data from JS 
//Convert the POST info to array using explode  
$numInscrito = explode(",", $_POST["idInscrito"])  ;

//Files inside Array
$countInscritos = count($numInscrito);
//
//print_r($countInscritos);

//Replay control CERTIFICATIONS
for ($i=0; $i < $countInscritos; $i++) { 
	$dataStudentCert=getDataIndividual($numInscrito[$i]);
	//print_r($dataStudentCert);
	//echo "   ---|-|-|-|-||-|-|--|-|-||--|--";
	include 'Certificacion General_M1.php';
}

// Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
?>