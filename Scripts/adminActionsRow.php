<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once 'classConexionDB.php';
openConnection();
include_once 'library_db_sql.php';
session_start();
//saveLogs($_SESSION['name'],"Administrador eliminó a un usuario");

//GET TABLE NEW NAMES
        $TABLES = get_Table_Name();
        foreach ($TABLES as $key) {
          $T_INSCRITOS_ACT = $key->tb_inscritos_new_year;
          $T_RESULTADOS_ACT = $key->tb_resultados_new_year;
        }


if (isset($_POST['delete_row'])) {
    $id_CID_delete = explode("-",$_POST['row_id']);
    deleteRowDBResultados($T_RESULTADOS_ACT,$id_CID_delete[0],$id_CID_delete[1],$id_CID_delete[2],$id_CID_delete[3]);
    saveLogs($_SESSION['name'], "Administrador eliminó el registro  " . $_POST['row_id'] . " - DB Resultados");
    echo "success";
    exit();
}

if (isset($_POST['delete_row_inscrito'])) {
    $id_CID_delete = explode("-",$_POST['row_id']);
    deleteRowDBInscritos($T_INSCRITOS_ACT,$id_CID_delete[0],$id_CID_delete[1],$id_CID_delete[2],$id_CID_delete[3]);
    saveLogs($_SESSION['name'], "Administrador eliminó el registro  " . $_POST['row_id'] . " - DB Inscritos");
    echo "success";
    exit();
}
