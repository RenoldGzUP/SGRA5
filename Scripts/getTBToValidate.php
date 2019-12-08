<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();


$id_CID_user = explode("-", $_POST["idCID"]);
$typePost = $_POST["idPost"];

//EXPLODE OF ID AND SEND DATA
$DataInscritosCID  = showDataVAI($id_CID_user[0],$id_CID_user[1],$id_CID_user[2],$id_CID_user[3]);
$DataResultadosCID = showDataVAR($id_CID_user[0],$id_CID_user[1],$id_CID_user[2],$id_CID_user[3]);

////EMPTY ARRAY
////////////////////////////////////////////////////
function getARRAYS($DataInscritos, $DataResultados)
{
    $Inscritos_A  = array();
    $Resultados_B = array();
//////////////////////A
    foreach ($DataInscritos as $item) {
        array_push($Inscritos_A, $item->n_ins);
    }

    //////////////////////B
    foreach ($DataResultados as $itemR) {
        array_push($Resultados_B, $itemR->n_ins);

    }

}

//GET DATA INSCRITOS
if ($typePost == 1) {
    if (is_null($DataInscritosCID)) {
        echo '<tr><td colspan="18" style="text-align: center;" >No hay datos para mostrar de ' . $name . '</td></tr>';
    } else {
        foreach ($DataInscritosCID as $item) {
            echo '<tr style="font-size: 11px;text-align:center">';
            echo '<td style="text-align: center;"><input type="checkbox" name="chkStudentI"  onclick="return checkBoxStudentI()" class="checkthis" value=' . $item->n_ins . '></td>';
            echo "<td></td>";
            rowColor($item->nombre);
            rowColor($item->apellido);
            rowColor($item->cedula);
            rowColor($item->n_ins);
            rowColor($item->sede);
            rowColor($item->fac_ia);
            rowColor($item->esc_ia);
            rowColor($item->car_ia);
            rowColor($item->fac_iia);
            rowColor($item->esc_iia);
            rowColor($item->car_iia);
            rowColor($item->fac_iiia);
            rowColor($item->esc_iiia);
            rowColor($item->car_iiia);
            /*echo '<td><a href="#" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-plus"></span> RECALCULAR</a>
        </td>';*/
        }

    }

} elseif ($typePost == 2) {
    //$DataResultadosCID = getUserCIDFromResultados($name, $lastName);
    // var_dump($DataResultadosCID);

    if (is_null($DataResultadosCID)) {
        echo '<tr><td colspan="18" style="text-align: center;" >No hay datos para  mostrar de ' . $name . '</td></tr>';

    } else {

        foreach ($DataResultadosCID as $itemR) {
            echo '<tr style="font-size: 11px;text-align:center">';
            echo '<td style="text-align: center;"><input type="checkbox" name="chkStudentI" onclick="return checkBoxStudentI()" class="checkthis" value=' . $itemR->n_ins . '></td>';
            echo "<td></td>";
            rowColor($itemR->nombre);
            rowColor($itemR->apellido);
            rowColor($itemR->cedula);
            rowColor($itemR->n_ins);
            rowColor($itemR->sede);
            rowColor($itemR->fac_ia);
            rowColor($itemR->esc_ia);
            rowColor($itemR->car_ia);
            rowColor($itemR->ps);
            rowColor($itemR->pca);
            rowColor($itemR->pcg);
            rowColor($itemR->gatb);
            rowColor($itemR->verbal);
            rowColor($itemR->numer);
            rowColor($itemR->indice);
            echo '<td><a href="#" name="" class="btn btn-warning btn-xs" onclick="measuringValidate(\'' . $itemR->cedula . '\')" ><span class="glyphicon glyphicon-plus"></span> RECALCULAR</a></td>';
        }

    }

} else {
    echo "Algo salió mal";

}

function rowColor($item)
{
    if ($item == "") {
        echo "<td bgcolor='#dbfc79'>" . $item . "</td>";
    } else {
        echo "<td>" . $item . "</td>";
    }
}

function complete_Array($NUM_INSCRITO_A, $NUM_INSCRITO_B)
{
    $match = "";
    //ARRAYS
    //EQUALS SIZE ARRAY
    if (count($NUM_INSCRITO_A) > count($NUM_INSCRITO_B)) {
        array_pad($NUM_INSCRITO_B, count($NUM_INSCRITO_A), 0);
        $match = analyser_N_Ins($NUM_INSCRITO_A, $NUM_INSCRITO_B);

    } else if (count($NUM_INSCRITO_A) < count($NUM_INSCRITO_B)) {
        array_pad($NUM_INSCRITO_A, count($NUM_INSCRITO_B), 0);
        $match = analyser_N_Ins($NUM_INSCRITO_A, $NUM_INSCRITO_B);

    } else {
        $match = analyser_N_Ins($NUM_INSCRITO_A, $NUM_INSCRITO_B);
    }

    return $match;

}

function analyser_N_Ins($ARRAY_A, $ARRAY_B)
{
    $STATE = "";
//IF MATCH ARRAY
    $k         = 0;
    $lengArray = count($ARRAY_A);
    while ($k < $lengArray) {
        if ($ARRAY_A[$k] == $ARRAY_B[$k]) {
            $STATE = true;
        } else {
            $STATE = false;
        }

        $k++;
    }

    return $STATE;

}
