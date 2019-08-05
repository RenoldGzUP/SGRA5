<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once 'classConexionDB.php';
openConnection();
include_once 'library_db_sql.php';
session_start();

//DEFINE RANGE X PAGE
$record_per_page = 20;
$ranges_list     = array(20, 50, 100, 500);

//CGET ID'S FROM-END
$form_sede     = $_REQUEST["sedes"];
$form_area     = explode('-', $_REQUEST["areas"]);
$form_facultad = $_REQUEST["facultades"];
$form_escuela  = $_REQUEST["escuelas"];
$form_carrera  = $_REQUEST["carreras"];

////////////////////////////////////////////////////////////////////////////////////////////////
//GET PAGE SET FROM USER SELECT
//SI LA VARIABLES RANGE NO ES VACIA SE GUARDA EL STATE EN UNA VARIABLE DE SESSION
if (isset($_REQUEST['range'])) {
    $_SESSION['ndataI'] = $_REQUEST['range'];
    $record_per_page    = $_SESSION['ndataI'];
}

$pagina = '';
if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];

    if (isset($_SESSION['ndataI'])) {
        $record_per_page = $_SESSION['ndataI'];
    } else {
        $record_per_page = 20;
    }

} else {
    $pagina = 1;
    //$record_per_page = $_SESSION['ndata'];
}

//GET DATA FROM DATABASE
$start_from = ($pagina - 1) * $record_per_page;
////////////////////////////////////////////////////////////////////////////////////////////////
//TABLE

$labelSQL = array("sede", "area_i", "fac_ia", "esc_ia", "car_ia");

if (isset($form_sede)) {

    if ($form_area[0] > 0) {
        //CON DOS CAMPOS
        //IF VAR area is SETTED
        echo "F BCK INICIAL CON  AREA ASIGNADA";
        unset($_SESSION['area']);

        $_SESSION['area'] = $form_area[0];
        // var_dump($_SESSION['area']);
        //IF THE VAR  FORM AREA IS NULL , THE LAST VALUE OF SEDE
        $estResultado = filterByS_A($start_from, $record_per_page, $_SESSION['sede'], $_SESSION['area']);
        $newData      = convert_object_to_array($estResultado);
        $leng         = sizeof($newData);
        printTable($leng, $newData, $start_from);

    } else {
        //CON UN CAMPO
        //IF VAR SEDE IS SETTED
        echo "F BCK INICIAL SIN AREA";
        unset($_SESSION['sede']);
        unset($_SESSION['area']);
        $codeSede         = getCodigoSedes($form_sede);
        $saveCodeSede     = convert_object_to_array($codeSede);
        $_SESSION['sede'] = $saveCodeSede[0]['codigo_sede'];

        //IF THE VAR  FORM SEDE IS NULL , THE LAST VALUE OF SEDE
        $estResultado = filterByS($start_from, $record_per_page, $_SESSION['sede']);
        $newData      = convert_object_to_array($estResultado);
        $leng         = sizeof($newData);
        printTable($leng, $newData, $start_from);

    }
} else {
    //SI LA VARIABLE ES NULL
    echo "F BCK SIN AREA";
    $estResultado = filterByS($start_from, $record_per_page, $_SESSION['sede']);
    $newData      = convert_object_to_array($estResultado);
    $leng         = sizeof($newData);
    printTable($leng, $newData, $start_from);

}

//functions
////////////////////////////////////////////////////////////////////////////////

function sede($SEDE)
{
    //CHECK THAT THE VAR FROM-END AT SET
    if (is_null($SEDE)) {

        ////////////////////////////////////////////////////////////////////////////////////////////////
        $estResultado = showDataFilterInscrito($start_from, $record_per_page, $_SESSION['sede']);
        $newData      = convert_object_to_array($estResultado);
        $leng         = sizeof($newData);

        printTable($leng, $newData, $start_from);

    } else {
        ///////////////////////////////////////////////////////////////////////////////////////////////
        //IF VAR SEDE IS SETTED
        $codeSede         = getCodigoSedes($SEDE);
        $saveCodeSede     = convert_object_to_array($codeSede);
        $_SESSION['sede'] = $saveCodeSede[0]['codigo_sede'];

        //IF THE VAR  FORM SEDE IS NULL , THE LAST VALUE OF SEDE
        $estResultado = showDataFilterInscrito($start_from, $record_per_page, $_SESSION['sede']);
        $newData      = convert_object_to_array($estResultado);
        $leng         = sizeof($newData);

        printTable($leng, $newData, $start_from);

    }

}

function printTable($SIZEARRAY, $ARRAY_Ins, $START_PAGE)
{
    $i          = 0;
    $start_from = $START_PAGE;
    $leng       = $SIZEARRAY;
    $newData    = $ARRAY_Ins;
    global $counterRegister;
    //FULL DATA LOAD INSIDE OF TABLE
    if ($leng != 0) {
        while ($i < $leng) {

            $counter = $start_from + $i + 1;
            echo '<tr id="row' . $newData[$i]['n_ins'] . '" style="font-size: 11px;text-align:center">';
            echo '<td class="checkboxRow" style="text-align: center;"><input type="checkbox" class="checkthis" value=' . $newData[$i]['n_ins'] . '></td>';
            echo '<td class="integerRow" >' . $counter . '</td>';
            echo '<td class="textRow" id="name' . $newData[$i]['n_ins'] . '">' . $newData[$i]['nombre'] . '</td>';
            echo '<td class="textRow" id="lastname' . $newData[$i]['n_ins'] . '">' . $newData[$i]['apellido'] . '</td>';
            echo '<td  class="cidRow" id="CID' . $newData[$i]['n_ins'] . '">' . $newData[$i]['cedula'] . '</td>';
            echo '<td class="longIntegerRow"  id="n_ins' . $newData[$i]['n_ins'] . '">' . $newData[$i]['n_ins'] . '</td>';
            echo '<td class="integerRow"  id="sede' . $newData[$i]['n_ins'] . '">' . $newData[$i]['sede'] . '</td>';
            echo '<td class="integerRow" id="fac_ia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['fac_ia'] . '</td>';
            echo '<td class="integerRow" id="esc_ia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['esc_ia'] . '</td>';
            echo '<td class="integerRow" id="car_ia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['car_ia'] . '</td>';
            echo '<td class="integerRow"  id="fac_iia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['fac_iia'] . '</td>';
            echo '<td class="integerRow"  id="esc_iia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['esc_iia'] . '</td>';
            echo '<td class="integerRow" id="car_iia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['car_iia'] . '</td>';
            echo '<td class="integerRow" id="fac_iiia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['fac_iia'] . '</td>';
            echo '<td class="integerRow" id="esc_iiia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['esc_iia'] . '</td>';
            echo '<td class="integerRow" id="car_iiia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['car_iia'] . '</td>';
            echo '<td class="actionRow">
<button type="button" title ="Editar" id="edit_button' . $newData[$i]['n_ins'] . '" class="btn btn-warning btn-xs" onclick="modal_edit(\'' . $newData[$i]['n_ins'] . '\');" ><span class="glyphicon glyphicon-pencil"></span>    </button>
<button type="button"  id="save_button' . $newData[$i]['n_ins'] . '"  style="display:none;" class="btn btn-success btn-xs"  onclick="save_row(\'' . $newData[$i]['n_ins'] . '\');"><span class="glyphicon glyphicon-floppy-saved"></span> </button>
<button type="button" title ="Borrar" id="delete_button' . $newData[$i]['n_ins'] . '" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" onclick="delete_row(\'' . $newData[$i]['n_ins'] . '\');"></span> </button>

</td>';
            echo "</tr>";
//COUNTER
            $i = $i + 1;
        }
//WHILE END*/
        $counterRegister = $counter;

    } //END IF
    else {
        echo '<tr><td colspan="20" style="text-align: center;" >Algo va mal</td></tr>';}

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////

//check data
/*
if (isset($form_sede)) {
if (isset($form_area)) {
//CON DOS CAMPOS

} else {
//CON UN CAMPO
//IF VAR SEDE IS SETTED
$codeSede         = getCodigoSedes($SEDE);
$saveCodeSede     = convert_object_to_array($codeSede);
$_SESSION['sede'] = $saveCodeSede[0]['codigo_sede'];

//IF THE VAR  FORM SEDE IS NULL , THE LAST VALUE OF SEDE
$estResultado = showDataFilterInscrito($start_from, $record_per_page, $_SESSION['sede']);
$newData      = convert_object_to_array($estResultado);
$leng         = sizeof($newData);

printTable($leng, $newData, $start_from);

}
} else {
//SI LA VARIABLE ES NULL
$estResultado = showDataFilterInscrito($start_from, $record_per_page, $_SESSION['sede']);
$newData      = convert_object_to_array($estResultado);
$leng         = sizeof($newData);

printTable($leng, $newData, $start_from);

}*/
