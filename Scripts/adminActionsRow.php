<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once 'classConexionDB.php';
openConnection();
include_once 'library_db_sql.php';
session_start();
//saveLogs($_SESSION['name'],"Administrador eliminó a un usuario");

if (isset($_POST['delete_row'])) {
    $n_ins = $_POST['row_id'];
    deleteRowDBResultados($n_ins);
    saveLogs($_SESSION['name'], "Administrador eliminó el registro  " . $n_ins . " - DB Resultados");
    echo "success";
    exit();
}

if (isset($_POST['delete_row_inscrito'])) {
    $n_ins = $_POST['row_id'];
    deleteRowDBInscritos($n_ins);
    saveLogs($_SESSION['name'], "Administrador eliminó el registro  " . $n_ins . " - DB Inscritos");
    echo "success";
    exit();
}
