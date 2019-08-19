<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';

//Capturando ID de SEde
$id_area         = $_POST["id_areacomun"];
$listaFacultades = obtenerFacultadesComun($id_area);

echo '<select name="facultad_modal" id="lista_facultades_comunes">';
echo "<option value = '' >Seleccione Area</option>";
foreach ($listaFacultades as $item) {
    echo "<option value='.$item->id_facultad.'>" . $item->codigo_facultad . "-" . $item->nombre_facultad . "</option> ";
}
echo "</select>";
