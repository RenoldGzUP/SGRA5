<?php
include_once('../Scripts/ClassConexionDB.php');
openConnection();
include_once('../Scripts/consultas.php');

//Capturando ID de SEde
$listaSedes=getSedes();

foreach( $listaSedes as $item){
	echo "<option
	value='.$item->id_sede.'>".$item->codigo_sede."-".$item->nombre_sede."</option> ";
	
}
?>