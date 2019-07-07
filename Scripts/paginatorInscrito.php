<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once 'classConexionDB.php';
openConnection();
include_once 'library_db_sql.php';
session_start();

//PAGINATION SET
$page_result = showDataInscritoW();
$dataQuery   = convert_object_to_array($page_result);
//print_r($newData);
$total_records = sizeof($dataQuery);
$total_pages   = ceil($total_records / $record_per_page);
$start_loop    = $pagina;
$diferencia    = $total_pages - $pagina;
if ($diferencia <= 5) {$start_loop = $total_pages - 5;}

$end_loop = $start_loop + 4;

if ($pagina > 1) {
    echo "<a class='pagina' onclick='sendSelectRange();' href='../pagesAdm/inscritos.php?pagina=1'><span class='glyphicon glyphicon-step-backward'></span></a>   ";
    echo "<a class='pagina' onclick='sendSelectRange();' href='../pagesAdm/inscritos.php?pagina=" . ($pagina - 1) . "'><span class='glyphicon glyphicon-triangle-left'></span></a>   ";}

for ($i = $start_loop; $i <= $end_loop; $i++) {
    if ($i == 1) {
        echo "<a class='pagina' onclick='sendSelectRange();' ><span class='glyphicon glyphicon-step-backward'></span></a>";
        echo "<a class='pagina' onclick='sendSelectRange();' ><span class='glyphicon glyphicon-triangle-left'></span></a>";
    }

    echo "<a class='btn btn-success btn-xs'onclick='sendSelectRange();' href='../pagesAdm/inscritos.php?pagina=" . $i . "'>" . $i . "</a>";}

if ($pagina <= $end_loop) {
    echo "<a class='pagina' onclick='sendSelectRange();' href='../pagesAdm/inscritos.php?pagina=" . ($pagina + 1) . "'><span class='glyphicon glyphicon-triangle-right'></span></a>   ";
    echo "<a class='pagina' onclick='sendSelectRange();' href='../pagesAdm/inscritos.php?pagina=" . $total_pages . "'><span class='glyphicon glyphicon-step-forward'></span></a>     ";}
