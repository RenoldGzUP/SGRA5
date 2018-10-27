<?php
include_once('../Scripts/ClassConexionDB.php');
openConnection();
include_once('../Scripts/consultas.php');

//Capturando ID de SEde
function getPHPSedes()
{
$listaSedes=getSedes();

return $listaSedes;	
}


/*echo'<select name="sedes" class="form-control" id="lista_sedes" onChange="obtenerSede(this.value);">';
echo"<option >Seleccione Sede</option>";
foreach( $listaSedes as $item){
	echo "<option
	value='.$item->id_sede.'>".$item->codigo_sede."-".$item->nombre_sede."</option> ";
	
}
echo"</select>";*/


?>