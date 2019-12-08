<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';

////////////////////////////////////////////////////////////////////////////////////////////////////////
//GET DATA POST
$id_CID_user =  explode("-",$_POST["idCID"]);
$indice_ps = $_POST["indice_ps"];
$indice_pca = $_POST["indice_pca"];
$indice_pcg = $_POST["indice_pcg"];
$indice_gatb = $_POST["indice_gatb"];

///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////SQL QUERY//////////////////////////////////////////////////////////////////////////////

//UPDATE TEST INTO TB RESULTADOS
$testStudent = updateUserTest($indice_ps,$indice_pca,$indice_pcg,$indice_gatb,$id_CID_user[0],$id_CID_user[1],$id_CID_user[2],$id_CID_user[3],$indice_ps,$indice_pca,$indice_pcg,$indice_gatb);

//GET NEW DATA TO MEASURING THE USER
$testStudent = getUserAreaTest($id_CID_user[0],$id_CID_user[1],$id_CID_user[2],$id_CID_user[3]);

//MEASURING THE USER
$indice_to_update = evaluateStd($id_CID_user[1],$testStudent->areap,$testStudent->ps,$testStudent->pca,$testStudent->pcg,$testStudent->gatb);

//UPDATE INDICE
updateIndice($indice_to_update,$id_CID_user[0],$id_CID_user[1],$id_CID_user[2],$id_CID_user[3]);


//UPDATE TABLE DOM
updateTableDOM($id_CID_user[0],$id_CID_user[1],$id_CID_user[2],$id_CID_user[3]);

////////////////////////////////////////////////////////////////////////////////////////////////////////////

//FUNCTION
//AREA CASE
function evaluateStd($CLAVE,$AREA,$PS,$PCA,$PCG,$GATB){
  $indice_actualizado = 0;
//check area1
  if ($AREA == 1) {
    //CASO 1
    //NACIONAL
    if ($CLAVE == "00") {
      $indice_actualizado = ((-1.964322) + (0.667618 * $PS) + (0.017854 * $PCA));
    }else{
      $indice_actualizado = 0.228795 + 0.016919 * $PCA;

    }
}elseif ($AREA == 2) {
  //CASO 2
  //si no es extranjero

  if ($CLAVE == "00") {
    $indice_actualizado = ((- 1.184485) + (0.498652 * $PS) + (0.012726 * $PCA));
  }else{
    $indice_actualizado = (0.519609+0.010180*$PCA);
  }
  
}
elseif ($AREA == 3) {
  //CASO 3
  //si no es extranjero
  if ($CLAVE == "00") {
    $indice_actualizado = (- 0.520958) + (0.319638 * $PS) + (0.003404 * $PCA) + (0.002034 * $GATB);
  }else{
    $indice_actualizado = 0.835459 + 0.004988 * $PCA + (-0.000856 * $GATB);
  }
}
elseif ($AREA == 4) {
  //CASO 4
  //si no es extranjero
  if ($CLAVE == "00") {
    $indice_actualizado = (- 1.141022) + (0.417321 * $PS) + (0.008511 * $PCA)+ (0.006932 * PCG + 1);
  }else{
    $indice_actualizado = 0.275051 + 0.00732 * $PCA + 0.011536 * ($PCG + 1);
  }
}
elseif ($AREA == 5) {
  //CASO 5
  //si no es extranjero
  if ($CLAVE == "00") {
    $indice_actualizado = (- 1.208038) + (0.493603 * $PS) + (0.011607 * $PCA);
  }else{
    $indice_actualizado = 0.593134 + 0.008602 * $PCA ;
  }
 
}
elseif ($AREA == 6) {
  //CASO 6
  //si no es extranjero
  if ($CLAVE == "00") {
    $indice_actualizado = (- 1.63761225) + (0.4400035 * $PS) + (0.006032 * $GATB) + (0.00917525 * $PCA) + (0.00196025 * $PCG);
  }else{
    $indice_actualizado = (- 0.234193) + (0.008075 * $GATB) + (0.008182 * $PCA) + (0.008713 * $PCG);
  }
}
elseif ($AREA == 7) {
  //CASO 7
  //si no es extranjero
  if ($CLAVE == "00") {
    $indice_actualizado = (- 2.905962) + (0.676631 * $PS) + (0.015779 * $PCA)+ (0.016773 * $PCG);
  }else{
    $indice_actualizado = (- 0.887971+ 0.013060 * ($PCA) + 0.027454 * ($PCG));
  }
}
elseif ($AREA == 8) {
  //CASO 8
  //si no es extranjero
  if ($CLAVE == "00") {
    $indice_actualizado = (-1.334447) + (0.495086 * $PS) + (0.014548 * $PCA);
  }else{
    $indice_actualizado = 0.206365 + 0.017993 * $PCA ;
  }
}
elseif ($AREA == 9) {
  //CASO 9
  //si no es extranjero
  if ($CLAVE == "00") {
    $indice_actualizado = (-1.334447) + (0.495086 * $PS) + (0.014548 * $PCA) ;
  }else{
    $indice_actualizado = 0.206365 + 0.017993 * $PCA;
  }
}else{
  echo "Ocurrio un error";

}

return $indice_actualizado;
}


function updateTableDOM($PROVINCIA,$CLAVE,$TOMO,$FOLIO){

  $DataResultadosCID = showDataVAR($PROVINCIA,$CLAVE,$TOMO,$FOLIO);

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
            echo '<td><button type="button" class="btn btn-success btn-sm disabled"><span class="glyphicon glyphicon-ok"></span> CALIFICADO</button></td>';
        }
}

function rowColor($item)
{
    if ($item == "") {
        echo "<td bgcolor='#dbfc79'>" . $item . "</td>";
    } else {
        echo "<td>" . $item . "</td>";
    }
}



