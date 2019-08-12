<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';

//Capturando ID de SEde
$id_sede     = $_POST["idSede"];
$id_facultad = $_POST["idFacultad"];

$listaEscuelas = getEscuelas($id_sede, $id_facultad);

if (is_null($listaEscuelas)) {
    echo '<select name="escuela" id="lista_escuelas" >';
    echo "<option >Sin datos</option> ";
    echo "</select>";
} else {
    echo '<select name="escuela" id="lista_escuelas" >';
    echo "<option >Seleccione Escuela</option>";
    foreach ($listaEscuelas as $item) {
        echo "<option value='$item->esc'>" . $item->esc . "</option> ";
    }
    echo "</select>";
}
