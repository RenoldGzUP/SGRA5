<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');

//Capturando IDs
$id_sede=$_POST["idSede"];
$id_facultad=$_POST["idFacultad"];
$id_escuela=$_POST["idEscuela"];

$listaCarreras = getCarreras($id_sede,$id_facultad,$id_escuela);

if (is_null($listaCarreras)) {
	echo'<select name="carrera" id="lista_carreras" >';
	echo "<option >Sin datos</option> ";
	echo"</select>";
}
else{
		echo'<select name="carrera" id="lista_carreras" >';
		echo"<option >Seleccione carrera</option>";
			foreach( $listaCarreras as $item){
			echo "<option value='$item->car'>".$item->car."-".$item->nombre_car."</option>";
			}
		echo"</select>";
	}

?>