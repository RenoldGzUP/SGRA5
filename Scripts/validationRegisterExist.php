<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');
session_start();
include_once('../Scripts/validacionFlujoNewUser.php');


$idSearch = $_POST["idInscrito"];
$tableInscritos = $_POST["table1"];
$tableResultados = $_POST["table2"];


$minusYear = date("Y") -1;
//Colocar el nombre de la tabla correcta usando la varible
if (preg_match("/2017/",$tableInscritos) && preg_match("/2017/",$tableResultados) ){
	$vInscrito = validationLastYearInscrito($idSearch);
	$vResultado = validationLastYearResultado($idSearch);

	if (is_object($vInscrito) && is_object($vResultado)) {
		echo'<tr style="font-size: 11px;text-align:center">';
		echo'<td style="text-align: center;"><input type="checkbox" class="checkthis" value='.$vResultado->n_ins.'></td>';
		echo "<td></td>";
		echo "<td>".$vResultado->nombre."</td>";  
		echo "<td>".$vResultado->apellido."</td>";  
		echo "<td>".$vResultado->cedula."</td>";
		echo "<td>".$vResultado->n_ins."</td>";  
		echo "<td>".$vResultado->sede."</td>";  
		echo "<td>".$vResultado->fac_ia."</td>";
		echo "<td>".$vResultado->esc_ia."</td>";  
		echo "<td>".$vResultado->car_ia."</td>";  
		echo "<td>".$vResultado->fac_iia."</td>";
		echo "<td>".$vResultado->esc_iia."</td>";  
		echo "<td>".$vResultado->car_iia."</td>";  
		echo "<td>".$vResultado->fac_iiia."</td>";
		echo "<td>".$vResultado->esc_iiia."</td>";  
		echo "<td>".$vResultado->car_iiia."</td>";  
		echo '<td><a  id="edit" href="#" class="btn btn-info btn-xs" ><span class="glyphicon glyphicon-pencil"></span> </a>
		<a  id="remove" href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#save"><span class="glyphicon glyphicon-floppy-saved" ></span> </a>

		<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span> </a>
		</td>';
		echo"</tr>"; 

		//PASAR EL ID DE BUSQEUDAD A LA FUNCION QUE BUSCARA OTRa vez al usuario y pasara todos los datos de consulta
		//a 
			//insertValidateStudentInscritos($idSearch);
			//insertValidateStudentResultados($idSearch);
	}
	else{
		echo'<tr ><td colspan="17" class="">No hay datos a mostrar de '.$idSearch.'</td></tr>';}
	}
	else{
		echo'<tr ><td colspan="17" class="">No hay congruencia con las tablas y el año de Validación</td></tr>';}


		function utf8_converter($array)
		{
			array_walk_recursive($array, function(&$item, $key){
				if(!mb_detect_encoding($item, 'utf-8', true)){
					$item = utf8_encode($item);
				}
			});

			return $array;
		} 

		function cvf_convert_object_to_array($data) {

			if (is_object($data)) {
				$data = get_object_vars($data);
			}

			if (is_array($data)) {
				return array_map(__FUNCTION__, $data);
			}
			else {
				return $data;
			}
		}

		?>