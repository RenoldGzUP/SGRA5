<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once 'classConexionDB.php';
openConnection();
include_once 'library_db_sql.php';
session_start();

//OBTENER LOS RECURSOS  DEL FORMULARIO WEB

 $fillTable = showResourceInscrito();
 $resources = convert_object_to_array($fillTable);
//NEW ARRAY DATA
$editDataResultado = array();

//READ DAT FROM FOMR AND ADD TO THE NEW ARRAY
    for ($i=0; $i < count($resources) ; $i++) { 
    	$dataForm = $_POST[$resources[$i]['recurso']];
    	array_push($editDataResultado, $dataForm);
    }
   
  var_dump($editDataResultado);
//echo "NUMERO INCRTIO _______>".$editDataResultado[6]."-".$editDataResultado[7]."-".$editDataResultado[8]."-".$editDataResultado[9];

//GUARDAR LOS DATOS EN SQL UPDATE
updateDataInscritos($editDataResultado[0], $editDataResultado[1], $editDataResultado[2], $editDataResultado[3], $editDataResultado[4], $editDataResultado[5], $editDataResultado[6], $editDataResultado[7], $editDataResultado[8], $editDataResultado[9], $editDataResultado[10], $editDataResultado[11], $editDataResultado[12], $editDataResultado[13], $editDataResultado[14], $editDataResultado[15], $editDataResultado[16], $editDataResultado[17], $editDataResultado[18], $editDataResultado[19], $editDataResultado[20], $editDataResultado[21], $editDataResultado[22], $editDataResultado[23], $editDataResultado[24], $editDataResultado[25], $editDataResultado[26], $editDataResultado[27], $editDataResultado[28], $editDataResultado[29], $editDataResultado[30], $editDataResultado[31], $editDataResultado[32], $editDataResultado[33], $editDataResultado[34], $editDataResultado[35], $editDataResultado[36], $editDataResultado[37], $editDataResultado[38], $editDataResultado[39], $editDataResultado[40], $editDataResultado[41], $editDataResultado[42], $editDataResultado[43], $editDataResultado[44], $editDataResultado[45], $editDataResultado[46], $editDataResultado[47], $editDataResultado[48], $editDataResultado[49], $editDataResultado[50], $editDataResultado[51], $editDataResultado[52], $editDataResultado[53], $editDataResultado[54], $editDataResultado[55], $editDataResultado[56], $editDataResultado[57], $editDataResultado[58], $editDataResultado[59], $editDataResultado[60], $editDataResultado[61], $editDataResultado[62], $editDataResultado[63], $editDataResultado[64], $editDataResultado[65], $editDataResultado[66], $editDataResultado[67], $editDataResultado[68], $editDataResultado[69], $editDataResultado[70], $editDataResultado[71], $editDataResultado[72], $editDataResultado[73], $editDataResultado[74], $editDataResultado[75], $editDataResultado[76], $editDataResultado[77], $editDataResultado[78], $editDataResultado[79], $editDataResultado[80], $editDataResultado[81], $editDataResultado[82], $editDataResultado[83], $editDataResultado[84], $editDataResultado[85], $editDataResultado[86], $editDataResultado[87], $editDataResultado[88], $editDataResultado[89], $editDataResultado[90], $editDataResultado[91], $editDataResultado[92], $editDataResultado[93], $editDataResultado[94], $editDataResultado[95], $editDataResultado[96], $editDataResultado[97], $editDataResultado[6],$editDataResultado[7],$editDataResultado[8],$editDataResultado[9]);

//MENSAJE DE RESPUESTA
////REFRESH
header("Location:../pagesAdm/edit_inscrito.php?cedula=".$editDataResultado[6]."-".$editDataResultado[7]."-".$editDataResultado[8]."-".$editDataResultado[9]."&state=1");