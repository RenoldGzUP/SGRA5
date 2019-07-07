<?php 
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');


//Capturando IDs
$id_sede=$_POST["idSede"];
$id_area=$_POST["idArea"];
$id_facultad=$_POST["idFacultad"];
$id_escuela=$_POST["idEscuela"];
$id_carrera=$_POST["idCarrera"];
 
//CONSULTA SQL
$filterDataInscritos = showDataFilterInscrito($START, $RECORD, $id_sede,$id_area,$id_facultad,$id_escuela,$idCarrera);


?>