<?php
include_once('../Scripts/ClassConexionDB.php');
openConnection();
include_once('../Scripts/consultas.php');
require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

use PhpOffice\PhpWord\TemplateProcessor;
$templateWord = new TemplateProcessor('Certificación_Area_Arquitectura.docx');

$numInscrito= $_POST["numeroInscrito"] ;
$consulta=getDataIndividual($numInscrito);

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
        
?>