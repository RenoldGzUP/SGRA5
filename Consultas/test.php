<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');;

//Capturando ID de SEde
$listaSedes=getSedes();

foreach( $listaSedes as $item){
	echo "<option
	value='.$item->id_sede.'>".$item->codigo_sede."-".$item->nombre_sede."</option> ";
	
}
?>