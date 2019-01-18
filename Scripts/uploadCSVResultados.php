<?php
include_once('classConexionDB.php');
openConnection();
include_once('library_db_sql.php');
session_start();

//Logs
//saveLogs($_SESSION['name'],"Administrador cargó  a la base de datos el archivo CSV  Name -> ");
//include_once("../db_connect.php");
   
$fila =1 ;

if(isset($_POST['import_data'])){
// Validate to check uploaded file is a valid csv file
	$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

//Validación de que el button no ha enviado datos vacios	
	if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$file_mimes)){

		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			$csv_file = fopen($_FILES['file']['tmp_name'], 'r');
//fgetcsv($csv_file);

// get data records from csv file
			while(($emp_record = fgetcsv($csv_file)) !== FALSE){
// Check if employee already exists with same emai
				
				//LLAMADO A LA FUNCION CONVERTER UTF8 
				$arrayResultados = utf8_converter($emp_record);
		//	print_r($arrayResultados);
				//echo "<br>"; //* Esto es un salto de linea
				echo "numero de lineas ".$fila;
				echo "<br>"; //* Esto es un salto de linea
				$fila++;
				$resultset = checkRegisterExistResultados($arrayResultados[18]);
// if employee already exist then update details otherwise insert new record
				if(isset($resultset)) {
					echo "Registro ya ha sido insertado, no se actualizará";
				} else{
					insertNewDataResultados($arrayResultados[0],$arrayResultados[1],$arrayResultados[2],$arrayResultados[3],$arrayResultados[4],$arrayResultados[5],$arrayResultados[6],$arrayResultados[7],$arrayResultados[8],$arrayResultados[9],$arrayResultados[10],$arrayResultados[11],$arrayResultados[12],$arrayResultados[13],$arrayResultados[14],$arrayResultados[15],$arrayResultados[16],$arrayResultados[17],$arrayResultados[18],$arrayResultados[19],$arrayResultados[20],$arrayResultados[21],$arrayResultados[22],$arrayResultados[23],$arrayResultados[24],$arrayResultados[25],$arrayResultados[26],$arrayResultados[27],$arrayResultados[28],$arrayResultados[29],$arrayResultados[30],$arrayResultados[31],$arrayResultados[32],$arrayResultados[33],$arrayResultados[34],$arrayResultados[35],$arrayResultados[36],$arrayResultados[37],$arrayResultados[38],$arrayResultados[39],$arrayResultados[40],$arrayResultados[41],$arrayResultados[42],$arrayResultados[43],$arrayResultados[44],$arrayResultados[45],$arrayResultados[46],$arrayResultados[47],$arrayResultados[48],$arrayResultados[49],$arrayResultados[50],$arrayResultados[51],$arrayResultados[52],$arrayResultados[53],$arrayResultados[54],$arrayResultados[55],$arrayResultados[56],$arrayResultados[57],$arrayResultados[58],$arrayResultados[59],$arrayResultados[60],$arrayResultados[61],$arrayResultados[62],$arrayResultados[63],$arrayResultados[64],$arrayResultados[65],$arrayResultados[66],$arrayResultados[67],$arrayResultados[68],$arrayResultados[69],$arrayResultados[70],$arrayResultados[71],$arrayResultados[72],$arrayResultados[73],$arrayResultados[74],$arrayResultados[75],$arrayResultados[76],$arrayResultados[77],$arrayResultados[78],$arrayResultados[79],$arrayResultados[80],$arrayResultados[81],$arrayResultados[82],$arrayResultados[83],$arrayResultados[84],$arrayResultados[85],$arrayResultados[86],$arrayResultados[87],$arrayResultados[88],$arrayResultados[89],$arrayResultados[90],$arrayResultados[91],$arrayResultados[92],$arrayResultados[93],$arrayResultados[94],$arrayResultados[95],$arrayResultados[96],$arrayResultados[97],$arrayResultados[98],$arrayResultados[99],$arrayResultados[100],$arrayResultados[101],$arrayResultados[102],$arrayResultados[103],$arrayResultados[104],$arrayResultados[105],$arrayResultados[106],$arrayResultados[107],$arrayResultados[108],$arrayResultados[109],$arrayResultados[110],$arrayResultados[111],$arrayResultados[112],$arrayResultados[113],$arrayResultados[114],$arrayResultados[115],$arrayResultados[116],$arrayResultados[117],$arrayResultados[118],$arrayResultados[119],$arrayResultados[120],$arrayResultados[121],$arrayResultados[122],$arrayResultados[123],$arrayResultados[124],$arrayResultados[125],$arrayResultados[126],$arrayResultados[127],$arrayResultados[128],$arrayResultados[129],$arrayResultados[130],$arrayResultados[131],$arrayResultados[132],$arrayResultados[133],$arrayResultados[134],$arrayResultados[135],$arrayResultados[136],$arrayResultados[137],$arrayResultados[138],$arrayResultados[139],$arrayResultados[140],$arrayResultados[141],$arrayResultados[142],$arrayResultados[143],$arrayResultados[144]);
				}
			}
			fclose($csv_file);
			//$import_status = '?import_status=success';
			echo '<script language="javascript">alert("Registros cargados");</script>'; 
		} else {
			//$import_status = '?import_status=error';
			echo '<script language="javascript">alert("Ha ocurrido un error"); location.href ="../pagesAdm/datos.php";</script>'; 
		}
	} else {
		//$import_status = '?import_status=invalid_file';
		echo '<script language="javascript">alert("Archivo inválido");</script>'; 
		//header("Location:../pagesAdm/datos.php");

	}
}
//header("Location: index.php".$import_status);



function utf8_converter($array)
{
    array_walk_recursive($array, function(&$item, $key){
        if(!mb_detect_encoding($item, 'utf-8', true)){
                $item = utf8_encode($item);
        }
    });
 
    return $array;
}

?>