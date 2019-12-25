<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once 'classConexionDB.php';
openConnection();
include_once 'library_db_sql.php';
session_start();

//GET ID'S FROM-END
$form_filter = $_POST["idFilters"];
$form_state  = $_POST["filter"];

if ($form_state == 1) {
    filterBySede($form_filter[0]);
} elseif ($form_state == 2) {
    filterByArea($form_filter[0], $form_filter[1]);
} elseif ($form_state == 3) {
    filterByFacultad($form_filter[0], $form_filter[1], $form_filter[2]);
} elseif ($form_state == 4) {
    filterByEscuela($form_filter[0], $form_filter[1], $form_filter[2], $form_filter[3]);
} elseif ($form_state == 5) {
    filterByCarrera($form_filter[0], $form_filter[1], $form_filter[2], $form_filter[3], $form_filter[4]);
} else {
    echo "Algo salio mal en el server";
}

///////////////////////////////////////////////////

function filterBySede($SEDE)
{
    $estResultado = filter_TREPORTE_By_S($SEDE, 1, "", "");
    //var_dump($estResultado);
    if (is_null($estResultado)) {
      echo json_encode("error");
    }else{
      echo json_encode($estResultado);
    }
}

function filterByArea($SEDE, $AREA)
{
    $estResultado = filter_TREPORTE_By_S_A($SEDE, $AREA, 1, "", "");
    if (is_null($estResultado)) {
      echo json_encode("error");
    }else{
      echo json_encode($estResultado);
    }
}
function filterByFacultad($SEDE, $AREA, $FACULTAD)
{
    $estResultado = filter_TREPORTE_By_S_A_F($SEDE, $AREA, $FACULTAD, 1, "", "");
    if (is_null($estResultado)) {
      echo json_encode("error");
    }else{
      echo json_encode($estResultado);
    }
}

function filterByEscuela($SEDE, $AREA, $FACULTAD, $ESCUELA)
{
    $estResultado = filter_TREPORTE_By_S_A_F_E($SEDE, $AREA, $FACULTAD, $ESCUELA, 1, "", "");
    if (is_null($estResultado)) {
      echo json_encode("error");
    }else{
      echo json_encode($estResultado);
    }

}

function filterByCarrera($SEDE, $AREA, $FACULTAD, $ESCUELA, $CARRERA)
{
    $estResultado = filter_TREPORTE_By_S_A_F_E_C($SEDE, $AREA, $FACULTAD, $ESCUELA, $CARRERA, 1, "", "");
    
    if (is_null($estResultado)) {
      echo json_encode("error");
    }else{
      echo json_encode($estResultado);
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////
