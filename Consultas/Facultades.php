<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';

//Capturando ID de SEde

$id_area         = $_POST["id_areas"];
$id_sede         = $_POST["id_sede"];
$listaFacultades = getFacultades($id_sede, $id_area);

echo '<select name="Facultad" id="lista_facultad" >';
echo "<option value='' >Seleccione Facultad</option>";
foreach ($listaFacultades as $item) {
    echo "<option
	value='$item->id_facultad'>" . $item->codigo_facultad . "-" . $item->nombre_facultad . "</option> ";

}
echo "</select>";
