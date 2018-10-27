<?php
include_once('../Scripts/ClassConexionDB.php');
openConnection();
include_once('../Scripts/consultas.php');

//Capturando ID de SEde
$id_area=$_POST["id_areas"];
$listaFacultades=getFacultades($id_area);

echo'<select name="Facultad" id="lista_facultad" >';
echo"<option >Seleccione Facultad</option>";
foreach( $listaFacultades as $item){
	echo "<option
	value='$item->id_facultad'>".$item->codigo_facultad."-".$item->nombre_facultad."</option> ";
	
}
echo"</select>";
?>