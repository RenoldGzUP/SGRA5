<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once '../classConexionDB.php';
openConnection();
include_once '../library_db_sql.php';
session_start();

$estResultado = showDataInscrito();
echo json_encode($estResultado);
var_dump($estResultado);
//functions
////////////////////////////////////////////////////////////////////////////////

function filterBySede($start_from, $record_per_page, $SEDE)
{
    $estResultado = filterByS($start_from, $record_per_page, $SEDE);
    $newData      = convert_object_to_array($estResultado);
    $leng         = sizeof($newData);
    printTable($leng, $newData, $start_from);
}

function filterByArea($start_from, $record_per_page, $SEDE, $AREA)
{
    $estResultado = filterByS_A($start_from, $record_per_page, $SEDE, $AREA);
    $newData      = convert_object_to_array($estResultado);
    $leng         = sizeof($newData);
    printTable($leng, $newData, $start_from);

}
function filterByFacultad($start_from, $record_per_page, $SEDE, $AREA, $FACULTAD)
{
    $estResultado = filterByS_A($start_from, $record_per_page, $SEDE, $AREA, $FACULTAD);
    $newData      = convert_object_to_array($estResultado);
    $leng         = sizeof($newData);
    printTable($leng, $newData, $start_from);

}

function filterByEscuela($start_from, $record_per_page, $SEDE, $AREA, $FACULTAD, $ESCUELA)
{
    $estResultado = filterByS_A($start_from, $record_per_page, $SEDE, $AREA, $FACULTAD, $ESCUELA);
    $newData      = convert_object_to_array($estResultado);
    $leng         = sizeof($newData);
    printTable($leng, $newData, $start_from);

}

function filterByCarrera($start_from, $record_per_page, $SEDE, $AREA, $FACULTAD, $ESCUELA, $CARRERA)
{
    $estResultado = filterByS_A($start_from, $record_per_page, $SEDE, $AREA, $FACULTAD, $ESCUELA, $CARRERA);
    $newData      = convert_object_to_array($estResultado);
    $leng         = sizeof($newData);
    printTable($leng, $newData, $start_from);

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
        echo '<tr><td colspan="20" style="text-align: center;" >Verifique los controles de Selección</td></tr>';}

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
