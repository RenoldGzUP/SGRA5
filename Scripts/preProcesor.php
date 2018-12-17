<?php
include_once('classConexionDB.php');
openConnection();
include_once('library_db_sql.php');

require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

use PhpOffice\PhpWord\TemplateProcessor;
$templateWord = new TemplateProcessor('Certificacion_Area_Arquitectura.docx');

$numInscrito= $_POST["idInscrito"] ;
echo "Valor PHP  -> ";
var_dump($numInscrito);
$consulta=getDataIndividual($numInscrito);

var_dump($consulta);

foreach( $consulta as $item){
	// --- Asignamos valores a la plantilla
	    $templateWord->setValue('numero_inscrito',$item->n_ins);
		$templateWord->setValue('nombre_completo',$item->nombre_completo);
		$templateWord->setValue('numero_cedula',$item->cedula);
		$templateWord->setValue('nombre_sede',ucwords(strtolower($item->nsede)));
		$templateWord->setValue('nombre_area',$item->area_i);
		$templateWord->setValue('nombre_facultad',ucwords(strtolower($item->nfacultad)));
		$templateWord->setValue('nombre_carrera',ucwords(strtolower($item->ncarrera)));
		$templateWord->setValue('colegio_procedencia',ucwords(strtolower($item->col_proc)));
		$templateWord->setValue('nombre_bachiller',ucwords(strtolower($item->nbachiller)));
		$templateWord->setValue('predictivo',$item->indice);
		$templateWord->setValue('prom_secundaria',$item->ps);
		$templateWord->setValue('gatb',$item->gatb);
		$templateWord->setValue('pca',$item->pca);
		$templateWord->setValue('valor_lexi',$item->valor_lexico);
		$templateWord->setValue('valor_lectura',$item->valor_lectura);
		$templateWord->setValue('valor_redact',$item->valor_redaccion);
		$templateWord->setValue('subtot_verb',$item->subtotalverbal);
		$templateWord->setValue('valor_operacion',$item->operatoria);
		$templateWord->setValue('valor_razon',$item->razonamiento);
		$templateWord->setValue('subtot_num',$item->subtotalnumerico);
		$templateWord->setValue('pca2',$item->pca);
}


// --- Guardamos el documento
$templateWord->saveAs('Documento02.docx');

header("Content-Disposition: attachment; filename=Documento02.docx; charset=iso-8859-1");
echo file_get_contents('Documento02.docx');
        


///////////////

//getDataResult($arrayCheck);

/*//Funcion que pasa los n° de inscritos seleccionados a la función que genera el doc
function getDataResult($dataInit){
	$idActive = explode(',', $dataInit);
	$k= 0; $j = 0 ;

	foreach ($idActive as $key) {
		$Areas = areaEstudiante($key);
		var_dump($Areas);

		foreach ($Areas as $item) {
			if ($item->area_i ==3) {
				$certificacionFILE = documentGenerateArea3($item->n_ins);
				$k = $k + 1;
			}elseif ($item->area_i ==4) {
				$j = $j +1;
			}

			echo "--k".$k."-- j".$j."</br>";
		}

	
		foreach ($Areas as $item) {
			var_dump($Areas)
			switch ($item->area_i) {
				case 1:
				//$certificacionFILE = documentGenerateArea1($item->n_ins);
				//break;
				case 2:
				//$certificacionFILE = documentGenerateArea2($item->n_ins);
				//break;
				case 3:
				$certificacionFILE = "Hello arquitectura";
				//echo "hola3";
					//$certificacionFILE = documentGenerateArea3($itemArea->n_ins);
		
				case 4:
				$certificacionFILE = "Hello Cientifica";
				//echo "hola4";
				//$certificacionFILE = documentGenerateArea4($itemArea->n_ins);
				
				case 5:
				//$certificacionFILE = documentGenerateArea5($item->n_ins);
				//break;
				case 6:
				//$certificacionFILE = documentGenerateArea6($item->n_ins);
				//break;
				case 7:
				//$certificacionFILE = documentGenerateArea7($item->n_ins);
				//break;
				case 8:
				//$certificacionFILE = documentGenerateArea8($item->n_ins);
				//break;
				case 9:
				//$certificacionFILE = documentGenerateArea9($item->n_ins);
				//break;
				default:
				echo "NO HAY DATOS VALIDOS PARA PROCESAR";
				
			} return $certificacionFILE;
		}
	}

	

	}//fin del foreach 1
	*/


?>