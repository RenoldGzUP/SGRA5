<?php
/* include_once 'Sample_Header.php'; */

// New Word Document
//echo date('H:i:s'), ' Create new PhpWord object', EOL;
/* $phpWord = new \PhpOffice\PhpWord\PhpWord(); */
$section = $phpWord->addSection();
$header = array('name' => 'Times New Roman','size' => 8, 'bold' => true);
$titles = array('name' => 'Times New Roman','size' => 12, 'bold' => true);
$subTitles = array('name' => 'Calibri','size' => 9, 'bold' => true);
$subTitles2 = array('name' => 'Calibri','size' => 11, 'bold' => true);
$normalText = array('name' => 'Times New Roman','size' => 12);

//Header
$styleStrike =  array('spacing' => 5);
$phpWord->addFontStyle('BoldText', array('size' => 8,'bold' => true));
$imageStyle = array('positioning'=> 'relative','marginTop'=> -1,'marginLeft'=> 1,'width'=> 60,'height'=> 75,'wrappingStyle' => 'square'); 
// Inline font style

$textrun = $section->addTextRun('pStyle');
$textrun->addImage('resources/LogoUp.png',$imageStyle);
$textrun->addText(htmlspecialchars('Universidad de Panamá'),$titles);
$textrun->addTextBreak();
$textrun->addText(htmlspecialchars('Vicerrectoría Académica'),$normalText);
$textrun->addTextBreak();
$textrun->addText(htmlspecialchars('Dirección General de Admisión'),$normalText);
$textrun->addTextBreak(1.2);
$section->addText(htmlspecialchars('	       Certificación de Resultados de Admisión 2019'),$normalText);


// Table Información General

$styleTable = array('borderSize' => 2, 'borderColor' => '999999' ,'cellMargin' => 10);
$noSpace = array('spaceAfter' => 1,'align' => 'center');
$noSpaceTitle = array('spaceAfter' => 1,'align' => 'left');
$noSpaceTitleBold = array('spaceAfter' => 0,'align' => 'left','name' => 'Times New Roman','size' => 10, 'bold' => true);
$cellRowSpanA = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'FFF2CC');
$cellRowSpanB = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'E2EFD9');
$cellNormalA = array('bgColor' => 'FFF2CC');
$cellNormalB = array('bgColor' => 'E2EFD9');

$cellRowContinue = array('vMerge' => 'continue');
$cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
$cellHCentered = array('align' => 'center');
$cellVCentered = array('valign' => 'center');

$phpWord->addTableStyle('Colspan Rowspan', $styleTable);
$section->addTextBreak();
$table = $section->addTable();

$table->addRow();
$table->addCell(5000)->addText(htmlspecialchars(''),null,$noSpace);;
$table->addCell(5000)->addText(htmlspecialchars('Número de Inscripción:353535'),$normalText,$noSpaceTitle);

$table->addRow();
$table->addCell(5000)->addText(htmlspecialchars('Nombre :'),$normalText,$noSpaceTitle);
$table->addCell(5000)->addText(htmlspecialchars('Cédula'),$normalText,$noSpaceTitle);

$table->addRow();
$table->addCell(5000)->addText(htmlspecialchars('Sede'),$normalText,$noSpaceTitle);
//$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('Sede Here '), null, $cellHCentered);
$table->addCell(1000)->addText(htmlspecialchars('Área : '),$normalText,$noSpaceTitle);
//$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('3'), null, $cellHCentered);

$table->addRow();
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('Facultad '),$normalText,$noSpaceTitle);
//$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('Facultad here'), null, $cellHCentered);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('Carrera'),$normalText,$noSpaceTitle);
//$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('Carrera Here'), null, $cellHCentered);

$table->addRow();
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('Colegio'),$normalText,$noSpaceTitle);
//$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('Colegio Here'), null, $cellHCentered);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('Bachiller '),$normalText,$noSpaceTitle);
//$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('Bachiller Here'), null, $cellHCentered);

//Tabla 2 INDICES
$section->addTextBreak(1);
/* $section->addText(htmlspecialchars('Table with colspan and rowspan'), $header); */
$styleTable = array('borderSize' => 6, 'borderColor' => '999999');
//$cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'FFFF00');
$cellRowContinue = array('vMerge' => 'continue');
$cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
$cellHCenteredBold = array('size' => 8, 'bold' => true, 'align' => 'center');
$cellVCentered = array('valign' => 'center');
$noSpaceTitleT2 = array('spaceAfter' => 120,'align' => 'left');
$phpWord->addTableStyle('Colspan Rowspan', $styleTable);
$table = $section->addTable();
$subTitlesProm = array('name' => 'Calibri','size' => 12);
$subTitlesProm = array('name' => 'Calibri','size' => 12);
$table->addRow();
$table->addCell(4400)->addText(htmlspecialchars('INDICE PREDICTIVO :'),$subTitles2,$noSpaceTitleT2);
$table->addCell(4000)->addText(htmlspecialchars('1.257878'),$subTitles2,$noSpaceTitleT2);

$table->addRow();
$table->addCell(4400)->addText(htmlspecialchars('Promedio de Secundaria'),$subTitlesProm,$noSpaceTitleT2);
$table->addCell(4000)->addText(htmlspecialchars('4.256586'),null,$noSpaceTitleT2);

$table->addRow();
$table->addCell(4400)->addText(htmlspecialchars('Prueba Psicológica '),$subTitlesProm,$noSpaceTitleT2);
$table->addCell(4000)->addText(htmlspecialchars('123'),null,$noSpaceTitleT2);

$table->addRow();
$table->addCell(4400)->addText(htmlspecialchars('Prueba de Capacidades Académicas (PCA) '),$subTitlesProm,$noSpaceTitleT2);
$table->addCell(4000)->addText(htmlspecialchars('58'),null,$noSpaceTitleT2);

 // 4. Table desglozada

$section->addTextBreak(1);

$styleCellBTLR = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
$styleTable = array('borderSize' => 6, 'borderColor' => '999999');
//$cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'FFFF00');
$cellRowContinue = array('vMerge' => 'continue');
$cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
$cellHCentered = array('align' => 'center');
$cellVCentered = array('valign' => 'center');

$fontStyle = array('bold' => true, 'align' => 'center');
$section->addTextBreak(2);
$section->addText(htmlspecialchars('DESGLOSE DE LOS RESULTADOS OBTENIDOS EN LA PRUEBA DE CAPACIDADES ACADEMICAS'), $subTitles2); 
$phpWord->addTableStyle('Colspan Rowspan', $styleTable);
$table = $section->addTable('Colspan Rowspan');

$table->addRow(10);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars(''), null, $cellHCentered);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('Categorías'), null, $cellHCentered);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('Puntuación Máxima'), null, $cellHCentered);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('Puntuación Mínima esperada'), null, $cellHCentered);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('Puntuación alcanzada'), null, $cellHCenteredBold);

$table->addRow(null,$cellNormalA);

$cell1 = $table->addCell(600,$cellRowSpanA);
$textrun1 = $cell1->addTextRun($cellHCentered);
$textrun1->addText(htmlspecialchars('AREA VERBAL'));

$table->addCell(4000, $cellNormalA)->addText(htmlspecialchars(' Léxico'),null,$noSpaceTitle);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),null,$noSpace);

$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(4000, $cellNormalA)->addText(htmlspecialchars(' Comprensión de Lectura'),null,$noSpaceTitle);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),null,$noSpace);

$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(4000, $cellNormalA)->addText(htmlspecialchars(' Redacción '),null,$noSpaceTitle);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),null,$noSpace);

$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(4000, $cellNormalA)->addText(htmlspecialchars(' SUBTOTAL '),$subTitles,$noSpaceTitle);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),null,$noSpace);

//VACIO
$table->addRow(5);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
//---------------------

$table->addRow(5);
$cell1 = $table->addCell(600, $cellRowSpanB);
$textrun1 = $cell1->addTextRun($cellHCentered);
$textrun1->addText(htmlspecialchars('ÁREA NUMERICA'));

$table->addCell(4000, $cellNormalB)->addText(htmlspecialchars(' Operatoria'),null,$noSpaceTitle);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),null,$noSpace);

$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(4000, $cellNormalB)->addText(htmlspecialchars(' Razonamiento'),null,$noSpaceTitle);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),null,$noSpace);

$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(4000, $cellNormalB)->addText(htmlspecialchars(' SUBTOTAL'),$subTitles,$noSpaceTitle);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),null,$noSpace);

//VACIO
$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(4000, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
//------------------------------

$cellNormalC = array('bgColor' => 'D9E2F3');

$table->addRow(5);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(4000, $cellNormalC)->addText(htmlspecialchars(' PCA TOTAL'),$subTitles,$noSpaceTitle);
$table->addCell(2000, $cellNormalC)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalC)->addText(htmlspecialchars('0'),null,$noSpace);
$table->addCell(2000, $cellNormalC)->addText(htmlspecialchars('0'),null,$noSpace);
$section->addTextBreak(2);

$section->addText(htmlspecialchars(' 			 ______________________________________________'));
$section->addText(htmlspecialchars('				 	Coordinador (a) de Admisión'));
$section->addTextBreak(1);	
$section->addText(htmlspecialchars('Fecha:'));
/* // Save file
echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    include_once 'Sample_Footer.php';
} */
 
?>