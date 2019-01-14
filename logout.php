<?php
include_once('./Scripts/classConexionDB.php');
openConnection();
include_once('./Scripts/library_db_sql.php');
session_start();
saveLogs($_SESSION['name'],"Usuario salió del sistema");
unset ($SESSION['name']);
session_destroy();
header('Location:index.html');
?>
