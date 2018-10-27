<?php
include_once('../Scripts/ClassConexionDB.php');
openConnection();
include_once('../Scripts/consultas.php');

//Capturando ID de SEde
$id_sede= $_POST["id_sedes"] ;
$listaAreas=getAreas($id_sede);

echo'<select name="areas" id="lista_areas" onChange="obtenerFacultades(this.value)">' ;
echo"<option >Seleccione Area</option>";
foreach( $listaAreas as $item){
	echo "<option value='$item->codigo_area'>".$item->codigo_area."-".$item->nombre_area."</option> ";
}
echo"</select>";

?>