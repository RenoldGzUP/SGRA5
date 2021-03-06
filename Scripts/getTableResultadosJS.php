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

//GET TABLE NAME RESULTADOS
$TABLES = get_Table_Name();
        foreach ($TABLES as $key) {
          $T_RESULTADOS = $key->tb_resultados_new_year;
        }


//SAVE LOGS
 saveLogs($_SESSION['name'], "Realizó busqueda en la base de datos ->".$T_RESULTADOS);

 //CHECK STATE

if ($form_state == 1) {
    filterBySede($form_filter[0],$T_RESULTADOS);
} elseif ($form_state == 2) {
    filterByArea($form_filter[0], $form_filter[1],$T_RESULTADOS);
} elseif ($form_state == 3) {
    filterByFacultad($form_filter[0], $form_filter[1], $form_filter[2],$T_RESULTADOS);
} elseif ($form_state == 4) {
    filterByEscuela($form_filter[0], $form_filter[1], $form_filter[2], $form_filter[3],$T_RESULTADOS);
} elseif ($form_state == 5) {
    filterByCarrera($form_filter[0], $form_filter[1], $form_filter[2], $form_filter[3], $form_filter[4],$T_RESULTADOS);
} else {
    echo "Algo salio mal en el server";
}

///////////////////////////////////////////////////

function filterBySede($SEDE,$T_RESULTADOS)
{
    $estResultado = filter_TR_By_S($SEDE,$T_RESULTADOS);
    if (is_null($estResultado)) {
      echo json_encode("error");
    }else{
      echo json_encode($estResultado);
    }
}

function filterByArea($SEDE, $AREA,$T_RESULTADOS)
{
    $estResultado = filter_TR_By_S_A($SEDE, $AREA,$T_RESULTADOS);
    if (is_null($estResultado)) {
      echo json_encode("error");
    }else{
      echo json_encode($estResultado);
    }
}
function filterByFacultad($SEDE, $AREA, $FACULTAD,$T_RESULTADOS)
{
    $estResultado = filter_TR_By_S_A_F($SEDE, $AREA, $FACULTAD,$T_RESULTADOS);
    if (is_null($estResultado)) {
      echo json_encode("error");
    }else{
      echo json_encode($estResultado);
    }
}

function filterByEscuela($SEDE, $AREA, $FACULTAD, $ESCUELA,$T_RESULTADOS)
{
    $estResultado = filter_TR_By_S_A_F_E($SEDE, $AREA, $FACULTAD, $ESCUELA,$T_RESULTADOS);
   if (is_null($estResultado)) {
      echo json_encode("error");
    }else{
      echo json_encode($estResultado);
    }

}

function filterByCarrera($SEDE, $AREA, $FACULTAD, $ESCUELA, $CARRERA,$T_RESULTADOS)
{
    $estResultado = filter_TR_By_S_A_F_E_C($SEDE, $AREA, $FACULTAD, $ESCUELA, $CARRERA,$T_RESULTADOS);
    if (is_null($estResultado)) {
      echo json_encode("error");
    }else{
      echo json_encode($estResultado);
    }
}

function printTable($SIZEARRAY, $ARRAY_Ins)
{
    $i       = 0;
    $leng    = $SIZEARRAY;
    $newData = $ARRAY_Ins;
    global $counterRegister;
    //FULL DATA LOAD INSIDE OF TABLE
    if ($leng != 0) {
        while ($i < $leng) {
            $counter = $i + 1;
            echo '<tr id="row' . $newData[$i]['n_ins'] . '" style="font-size: 11px;text-align:center">';
            echo '<td class="checkboxRow" style="text-align: center;"><input type="checkbox" class="checkthis" value=' . $newData[$i]['n_ins'] . '></td>';
            echo '<td >' . $counter . '</td>';
            echo '<td  id="name' . $newData[$i]['n_ins'] . '">' . $newData[$i]['nombre'] . '</td>';
            echo '<td  id="lastname' . $newData[$i]['n_ins'] . '">' . $newData[$i]['apellido'] . '</td>';
            echo '<td   id="CID' . $newData[$i]['n_ins'] . '">' . $newData[$i]['cedula'] . '</td>';
            echo '<td  id="n_ins' . $newData[$i]['n_ins'] . '">' . $newData[$i]['n_ins'] . '</td>';
            echo '<td   id="sede' . $newData[$i]['n_ins'] . '">' . $newData[$i]['sede'] . '</td>';
            echo '<td  id="fac_ia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['fac_ia'] . '</td>';
            echo '<td  id="esc_ia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['esc_ia'] . '</td>';
            echo '<td  id="car_ia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['car_ia'] . '</td>';
            echo '<td   id="fac_iia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['fac_iia'] . '</td>';
            echo '<td   id="esc_iia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['esc_iia'] . '</td>';
            echo '<td  id="car_iia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['car_iia'] . '</td>';
            echo '<td  id="fac_iiia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['fac_iia'] . '</td>';
            echo '<td  id="esc_iiia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['esc_iia'] . '</td>';
            echo '<td  id="car_iiia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['car_iia'] . '</td>';
            echo '<td ></td>';
            echo "</tr>";
//COUNTER
            $i++;
        }
//WHILE END*/

    } //END IF
    else {
        echo '<tr><td colspan="20" style="text-align: center;" >Verifique los controles de Selección</td></tr>';}

}

function tableInscrito($SIZEARRAY, $ARRAY_Ins)
{
    echo "<table id='tableInscritos' class='table table-bordered table-hover table-fixed'>
              <thead >
                <tr style='font-size: 11px;text-align:center; color: #ffffff; background-color: #225ddb'>
                  <th class='checkboxRow ' style='text-align: center;'> <input type='checkbox'  id='checkall' ></th>
                  <th  style='text-align: center;'>#</th>
                  <th >Nombre</th>
                  <th  >Apellido</th>
                  <th >Cédula</th>
                  <th >Inscripción</th>
                  <th >Sede</th>
                  <th >Fac1A</th>
                  <th >Esc1A</th>
                  <th >Car1A</th>
                  <th >Fac2A</th>
                  <th >Esc2A</th>
                  <th >Car2A</th>
                  <th >Fac3A</th>
                  <th >Esc3A</th>
                  <th >Car3A</th>
                  <th >Acciones</th>
                </tr>
              </thead>
              <tbody id='tbodyInscritos'>";
    printTable($SIZEARRAY, $ARRAY_Ins);

    echo "string</tbody>
            </table>
";

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////
