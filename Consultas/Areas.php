<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');

//Capturando ID de SEde
// $id_sede= $_POST["id_sedes"] ;
$id_sede = 4;
var_dump($id_sede);
$listaAreas=getAreas($id_sede);
var_dump($listaAreas);

echo'<select name="areas" id="lista_areas" onChange="obtenerFacultades(this.value)">' ;
echo"<option >Seleccione Area</option>";
foreach( $listaAreas as $item){
	echo "<option value='$item->id_area"."-"."$item->id_sede'>".$item->id_area."-".$item->nombre_area."</option> ";
}
echo"</select>";

?>