<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';

//Capturando ID de SEde
$id_sede = $_POST["id_sedes"];
//$id_sede = 4;

$listaAreas = getAreas($id_sede);

echo '<select name="areas" id="lista_areas" onChange="obtenerFacultades(this.value)">';
echo "<option value='' >Seleccione Area</option>";

if (isset($_SESSION['area'])) {

    foreach ($listaAreas as $item) {

        if ($_SESSION['area'] == $item->id_area) {
            echo "<option value='$item->id_area" . "-" . "$item->id_sede' selected>" . $item->id_area . "-" . $item->nombre_area . "</option> ";
        } else {

            echo "<option value='$item->id_area" . "-" . "$item->id_sede'>" . $item->id_area . "-" . $item->nombre_area . "</option> ";
        }

    }

} else {

    foreach ($listaAreas as $item) {
        echo "<option value='$item->id_area" . "-" . "$item->id_sede'>" . $item->id_area . "-" . $item->nombre_area . "</option> ";
    }

}

echo "</select>";
