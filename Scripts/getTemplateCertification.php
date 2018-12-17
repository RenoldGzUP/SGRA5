<?php
require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();
use PhpOffice\PhpWord\TemplateProcessor;
//Funciones para la carga de los template

//Se carga el template al generador
function getDocumentTemplateArea1(){
$templateWord1 = new TemplateProcessor('Certificación_Area_AdmEmpresas_Contabilidad.docx');
return $templateWord1;
//Nuevo objeto del tipo TemplateProcessor
}

function getDocumentTemplateArea2(){
$templateWord1 = new TemplateProcessor('Certificación_Area_AdmPublica.docx');
return $templateWord1;
//Nuevo objeto del tipo TemplateProcessor
}

function getDocumentTemplateArea3(){
$templateWord1 = new TemplateProcessor('Certificación_Area_Arquitectura.docx');
return $templateWord1;
//Nuevo objeto del tipo TemplateProcessor
}

function getDocumentTemplateArea4(){
$templateWord1 = new TemplateProcessor('Certificación_Area_Cientifica.docx');
return $templateWord1;
//Nuevo objeto del tipo TemplateProcessor
}

function getDocumentTemplateArea5(){
$templateWord1 = new TemplateProcessor('Certificación_Area_Humanistica.docx');
return $templateWord1;
//Nuevo objeto del tipo TemplateProcessor
}

function getDocumentTemplateArea6(){
$templateWord1 = new TemplateProcessor('Certificación_Area_Policia.docx');
return $templateWord1;
//Nuevo objeto del tipo TemplateProcessor
}

function getDocumentTemplateArea7(){
$templateWord1 = new TemplateProcessor('Certificación_Area_Derecho.docx');
return $templateWord1;
//Nuevo objeto del tipo TemplateProcessor
}

function getDocumentTemplateArea8(){
$templateWord1 = new TemplateProcessor('Certificación_Area_Informatica.docx');
return $templateWord1;
//Nuevo objeto del tipo TemplateProcessor
}

function getDocumentTemplateArea9(){
$templateWord1 = new TemplateProcessor('Certificación_Area_AsistenteOdontologico.docx');
return $templateWord1;
//Nuevo objeto del tipo TemplateProcessor
}


?>