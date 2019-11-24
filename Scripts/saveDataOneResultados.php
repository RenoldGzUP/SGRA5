<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once 'classConexionDB.php';
openConnection();
include_once 'library_db_sql.php';
session_start();

//OBTENER LOS RECURSOS  DEL FORMULARIO WEB

 $fillTable = showResourceResultados();
 $resources = convert_object_to_array($fillTable);

//NEW ARRAY DATA
$editDataResultado = array();

//READ DAT FROM FOMR AND ADD TO THE NEW ARRAY
    for ($i=0; $i < count($resources) ; $i++) { 
    	$dataForm = $_POST[$resources[$i]['recurso']];
    	array_push($editDataResultado, $dataForm);
    }
   
   
    echo "NUMERO INCRTIO _______>".$editDataResultado[14]."-".$editDataResultado[15];

//GUARDAR LOS DATOS EN SQL UPDATE
updateDataResultados($editDataResultado[0], $editDataResultado[1], $editDataResultado[2], $editDataResultado[3], $editDataResultado[4], $editDataResultado[5], $editDataResultado[6], $editDataResultado[7], $editDataResultado[8], $editDataResultado[9], $editDataResultado[10], $editDataResultado[11], $editDataResultado[12], $editDataResultado[13], $editDataResultado[14], $editDataResultado[15], $editDataResultado[16], $editDataResultado[17], $editDataResultado[18], $editDataResultado[19], $editDataResultado[20], $editDataResultado[21], $editDataResultado[22], $editDataResultado[23], $editDataResultado[24], $editDataResultado[25], $editDataResultado[26], $editDataResultado[27], $editDataResultado[28], $editDataResultado[29], $editDataResultado[30], $editDataResultado[31], $editDataResultado[32], $editDataResultado[33], $editDataResultado[34], $editDataResultado[35], $editDataResultado[36], $editDataResultado[37], $editDataResultado[38], $editDataResultado[39], $editDataResultado[40], $editDataResultado[41], $editDataResultado[42], $editDataResultado[43], $editDataResultado[44], $editDataResultado[45], $editDataResultado[46], $editDataResultado[47], $editDataResultado[48], $editDataResultado[49], $editDataResultado[50], $editDataResultado[51], $editDataResultado[52], $editDataResultado[53], $editDataResultado[54], $editDataResultado[55], $editDataResultado[56], $editDataResultado[57], $editDataResultado[58], $editDataResultado[59], $editDataResultado[60], $editDataResultado[61], $editDataResultado[62], $editDataResultado[63], $editDataResultado[64], $editDataResultado[65], $editDataResultado[66], $editDataResultado[67], $editDataResultado[68], $editDataResultado[69], $editDataResultado[70], $editDataResultado[71], $editDataResultado[72], $editDataResultado[73], $editDataResultado[74], $editDataResultado[75], $editDataResultado[76], $editDataResultado[77], $editDataResultado[78], $editDataResultado[79], $editDataResultado[80], $editDataResultado[81], $editDataResultado[82], $editDataResultado[83], $editDataResultado[84], $editDataResultado[85], $editDataResultado[86], $editDataResultado[87], $editDataResultado[88], $editDataResultado[89], $editDataResultado[90], $editDataResultado[91], $editDataResultado[92], $editDataResultado[93], $editDataResultado[94], $editDataResultado[95], $editDataResultado[96], $editDataResultado[97], $editDataResultado[98], $editDataResultado[99], $editDataResultado[100], $editDataResultado[101], $editDataResultado[102], $editDataResultado[103], $editDataResultado[104], $editDataResultado[105], $editDataResultado[106], $editDataResultado[107], $editDataResultado[108], $editDataResultado[109], $editDataResultado[110], $editDataResultado[111], $editDataResultado[112], $editDataResultado[113], $editDataResultado[114], $editDataResultado[115], $editDataResultado[116], $editDataResultado[117], $editDataResultado[118], $editDataResultado[119], $editDataResultado[120], $editDataResultado[121], $editDataResultado[122], $editDataResultado[123], $editDataResultado[124], $editDataResultado[125], $editDataResultado[126], $editDataResultado[127], $editDataResultado[128], $editDataResultado[129], $editDataResultado[130], $editDataResultado[131], $editDataResultado[132], $editDataResultado[133], $editDataResultado[134], $editDataResultado[135], $editDataResultado[136], $editDataResultado[137], $editDataResultado[138], $editDataResultado[139], $editDataResultado[140], $editDataResultado[141], $editDataResultado[142], $editDataResultado[143], $editDataResultado[144], $editDataResultado[14],$editDataResultado[15],$editDataResultado[16],$editDataResultado[17]);




//MENSAJE DE RESPUESTA
////REFRESH
header("Location:../pagesAdm/edit_certificacion.php?cedula=".$editDataResultado[14]."-".$editDataResultado[15]."-".$editDataResultado[16]."-".$editDataResultado[17]."&state=1");