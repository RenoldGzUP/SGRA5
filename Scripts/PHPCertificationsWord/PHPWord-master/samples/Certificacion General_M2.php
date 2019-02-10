<?php
/* include_once 'Sample_Header.php'; */

// New Word Document
//echo date('H:i:s'), ' Create new PhpWord object', EOL;
/* $phpWord = new \PhpOffice\PhpWord\PhpWord(); */
$section = $phpWord->addSection();
$header = array('name' => 'Arial','size' => 7, 'bold' => true);
$titles = array('name' => 'Arial','size' => 12, 'bold' => true);
$subTitles = array('name' => 'Arial','size' => 10, 'bold' => true);
$tableText = array('name' => 'Arial','size' => 9);

$tableText2 = array('name' => 'Arial','size' => 9);
$tableText3 = array('name' => 'Arial','size' => 8);

$subTitles2 = array('name' => 'Arial','size' => 11, 'bold' => true);
$subTitles3 = array('name' => 'Arial','size' => 8, 'bold' => true);
$normalText = array('name' => 'Arial','size' => 10);

//Header
$styleStrike =  array('spacing' => 5);
$phpWord->addFontStyle('BoldText', array('size' => 8,'bold' => true));
$imageStyle = array('positioning'=> 'relative','marginTop'=> -1,'marginLeft'=> 1,'width'=> 50,'height'=> 65,'wrappingStyle' => 'square'); 
// Inline font style

$textrun = $section->addTextRun('pStyle');
$textrun->addImage('resources/LogoUp.png',$imageStyle);
$textrun->addText(htmlspecialchars('UNIVERSIDAD DE PANAMÁ'),$normalText);
$textrun->addTextBreak();
$textrun->addText(htmlspecialchars('VICERRECTOÍA ACADEMÍCA'),$normalText);
$textrun->addTextBreak();
$textrun->addText(htmlspecialchars('DIRECCIÓN GENERAL DE ADMISIÓN'),$normalText);
$textrun->addTextBreak(1.2);
$section->addText(htmlspecialchars('	       CERTIFICACIÓN DE RESULTADOS DE ADMISIÓN 2019'),$titles);


// Table Información General

$styleTable = array('borderSize' => 2, 'borderColor' => '999999' ,'cellMargin' => 10);
$noSpace = array('spaceAfter' => 1,'align' => 'center');
$noSpaceTitle = array('spaceAfter' =>-1,'align' => 'left');
$noSpaceTitleBold = array('spaceAfter' => 0,'align' => 'left','name' => 'Arial','size' => 10, 'bold' => true);
$cellRowSpanA = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'E4FE7E');
$cellRowSpanB = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => '4AE749');
$cellNormalA = array('bgColor' => 'E4FE7E');
$cellNormalB = array('bgColor' => '4AE749');

$cellRowContinue = array('vMerge' => 'continue');
$cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
$cellHCentered = array('align' => 'center');
$cellVCentered = array('valign' => 'center');

$phpWord->addTableStyle('Colspan Rowspan', $styleTable);
$table = $section->addTable();
$table->addRow();
$table->addCell(5000)->addText(htmlspecialchars(''),null,$noSpace);;
$table->addCell(5000)->addText(htmlspecialchars('NÚMERO DE INSCRIPCIÓN:353535'),$tableText,$noSpaceTitle);
/* $textrun1 = $cell1->addTextRun($cellHCentered);
//$textrun1->addText(htmlspecialchars('Nombre'));
//$textrun1->addFootnote()->addText(htmlspecialchars('Row span'));
$cell2 = $table->addCell(2260);
$textrun2 = $cell2->addTextRun(); */
//$textrun2->
//$textrun2->addFootnote()->addText(htmlspecialchars('Colspan span'));
//$table->addCell(3000)->addText(htmlspecialchars('652152'), null, $cellHCentered);

$table->addRow();
$table->addCell(5000)->addText(htmlspecialchars('NOMBRE:'),$tableText,$noSpaceTitle);
//$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('name heweeterterterterterdfghdfgdfre'), null, $cellHCentered);
$table->addCell(5000)->addText(htmlspecialchars('CÉDULA:'),$tableText,$noSpaceTitle);
//$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('Cédula Here'), null, $cellHCentered);

$table->addRow();
$table->addCell(5000)->addText(htmlspecialchars('SEDE'),$tableText,$noSpaceTitle);
//$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('Sede Here '), null, $cellHCentered);
$table->addCell(1000)->addText(htmlspecialchars('ÁREA: '),$tableText,$noSpaceTitle);
//$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('3'), null, $cellHCentered);

$table->addRow();
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('FACULTAD:'),$tableText,$noSpaceTitle);
//$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('Facultad here'), null, $cellHCentered);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('CARRERA:'),$tableText,$noSpaceTitle);
//$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('Carrera Here'), null, $cellHCentered);

$table->addRow();
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('COLEGIO DE PROCEDENCIA: '),$tableText,$noSpaceTitle);
//$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars('Colegio Here'), null, $cellHCentered);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('BACHILLER: '),$tableText,$noSpaceTitle);
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
$noSpaceTitleT2 = array('spaceAfter' => 1,'align' => 'left');
$phpWord->addTableStyle('Colspan Rowspan', $styleTable);
$table = $section->addTable();
$subTitlesProm = array('name' => 'Calibri','size' => 12);
$subTitlesProm = array('name' => 'Calibri','size' => 12);
$table->addRow();
$table->addCell(4400)->addText(htmlspecialchars('INDICE PREDICTIVO :'),$subTitles3,$noSpaceTitleT2);
$table->addCell(4000)->addText(htmlspecialchars('1.257878'),$subTitles2,$noSpaceTitleT2);

$table->addRow();
$table->addCell(4400)->addText(htmlspecialchars('PROMEDIO DE SECUNDARIA:'),$tableText,$noSpaceTitleT2);
$table->addCell(4000)->addText(htmlspecialchars('4.256586'),null,$noSpaceTitleT2);

$table->addRow();
$table->addCell(4400)->addText(htmlspecialchars('PRUEBA DE CAPACIDADES ACADEMICAS(PCA):'),$tableText,$noSpaceTitleT2);
$table->addCell(4000)->addText(htmlspecialchars('123'),null,$noSpaceTitleT2);

$table->addRow();
$table->addCell(4400)->addText(htmlspecialchars('PRUEBA DE CONOCIMIENTOS GENERALES(PCG) '),$tableText,$noSpaceTitleT2);
$table->addCell(4000)->addText(htmlspecialchars('58'),null,$noSpaceTitleT2);

 // 4. Table desglozada
$styleCellBTLR = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
$styleTable = array('borderSize' => 6, 'borderColor' => '999999');
//$cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'FFFF00');
$cellRowContinue = array('vMerge' => 'continue');
$cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
//$cellHCentered = array('align' => 'center');
//$cellVCentered = array('valign' => 'center');

$fontStyle = array('bold' => true, 'align' => 'center');
$section->addTextBreak();
$section->addText(htmlspecialchars('  DESGLOSE DE LOS RESULTADOS OBTENIDOS EN LA PRUEBA DE CAPACIDADES ACADÉMICAS'), $header); 
$phpWord->addTableStyle('Colspan Rowspan', $styleTable);
$table = $section->addTable('Colspan Rowspan');

$table->addRow(10);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars(''), null, $noSpace);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('Categorías'), $tableText, $noSpace);
$table->addCell(100, $cellVCentered)->addText(htmlspecialchars('Puntuación Máxima por categoría'), $tableText, $noSpace);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('Puntuación Mínima esperada'), $tableText, $noSpace);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('Puntuación alcanzada por el estudiante'), $tableText, $noSpace);

$table->addRow(null,$cellNormalA);

//$cell1 = $table->addCell(2000, $cellRowSpan);
/* $cell1 = $table->addCell(4000,$styleCellBTLR)->addText(htmlspecialchars('AREA VERBAL'), $fontStyle);
$cell1->getStyle()->$cellRowSpan; */
//$define = $table->$cell1($cellRowSpan);
//$textrun1 = $cell1->addTextRun($cellHCentered);
//$textrun1 = $cell1->addCell(null, $styleCellBTLR)->addText(htmlspecialchars('AREA VERBAL'), $fontStyle);

$cell1 = $table->addCell(600,$cellRowSpanA);
$textrun1 = $cell1->addTextRun($cellHCentered);
$textrun1->addText(htmlspecialchars('ÁREA          VERBAL'));

$table->addCell(4000, $cellNormalA)->addText(htmlspecialchars(' Léxico'),$tableText3,$noSpaceTitle);
$table->addCell(500, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);

$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(4000, $cellNormalA)->addText(htmlspecialchars(' Comprensión de Lectura'),$tableText3,$noSpaceTitle);
$table->addCell(500, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);

$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(4000, $cellNormalA)->addText(htmlspecialchars(' Redacción '),$tableText3,$noSpaceTitle);
$table->addCell(500, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);

$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(4000, $cellNormalA)->addText(htmlspecialchars(''),$tableText,$noSpaceTitle);
$table->addCell(500, $cellNormalA)->addText(htmlspecialchars(''),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars(''),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars(''),$tableText,$noSpace);

$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(4000, $cellNormalA)->addText(htmlspecialchars(' SUBTOTAL '),$subTitles3,$noSpaceTitle);
$table->addCell(500, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);

$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(500, $cellNormalA)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars(''),null,$noSpace);

//VACIO
$table->addRow(5);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),$tableText3,$noSpace);
$table->addCell(500, $cellVCentered)->addText(htmlspecialchars(''),$tableText3,$noSpace);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),$tableText3,$noSpace);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),$tableText3,$noSpace);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),$tableText3,$noSpace);
//---------------------

$table->addRow(5);
$cell1 = $table->addCell(600, $cellRowSpanB);
$textrun1 = $cell1->addTextRun($cellHCentered);
$textrun1->addText(htmlspecialchars('ÁREA NUMERICA'));

$table->addCell(4000, $cellNormalB)->addText(htmlspecialchars(' Operatoria'),$tableText3,$noSpaceTitle);
$table->addCell(500, $cellNormalB)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),$tableText,$noSpace);

$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(4000, $cellNormalB)->addText(htmlspecialchars(' Razonamiento'),$tableText3,$noSpaceTitle);
$table->addCell(500, $cellNormalB)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),$tableText,$noSpace);

//VACIO
$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars(''),$tableText,$noSpace);
$table->addCell(500, $cellNormalB)->addText(htmlspecialchars(''),$tableText,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars(''),$tableText,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars(''),$tableText,$noSpace);
//---------------------

$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(4000, $cellNormalB)->addText(htmlspecialchars(' SUBTOTAL'),$subTitles3,$noSpaceTitle);
$table->addCell(500, $cellNormalB)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars('0'),$tableText,$noSpace);

$table->addRow(5);
$table->addCell(null, $cellRowContinue);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(500, $cellNormalB)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellNormalB)->addText(htmlspecialchars(''),null,$noSpace);

//VACIO
$table->addRow(5);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(500, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellVCentered)->addText(htmlspecialchars(''),null,$noSpace);
//------------------------------

$cellNormalC = array('bgColor' => '1584C0');
$table->addRow(5);
$table->addCell(2000, $cellNormalC)->addText(htmlspecialchars(''),null,$noSpace);
$table->addCell(2000, $cellNormalC)->addText(htmlspecialchars(' PCA TOTAL'),$subTitles3,$noSpaceTitle);
$table->addCell(500, $cellNormalC)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalC)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalC)->addText(htmlspecialchars('0'),$tableText,$noSpace);

//TBLE DEGLOSE DE PRUEB CIENTIFICA

$styleCellBTLR = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
$styleTable = array('borderSize' => 6, 'borderColor' => '999999');
//$cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'FFFF00');
$cellRowContinue = array('vMerge' => 'continue');
$cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
$cellHCentered = array('align' => 'center');
$cellVCentered = array('valign' => 'center');

$fontStyle = array('bold' => true, 'align' => 'center');
$section->addTextBreak();
$section->addText(htmlspecialchars('   DESGLOSE DE LOS RESULTADOS OBTENIDOS EN LA PRUEBA DE CONOCIMIENTOS GENERALES-ÁREA HUMANÍSTICA'), $header); 
$phpWord->addTableStyle('Colspan Rowspan', $styleTable);
$table = $section->addTable('Colspan Rowspan');

$table->addRow(5);
$table->addCell(7300, $cellVCentered)->addText(htmlspecialchars('Asignaturas'),$tableText, $noSpace);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('Puntuación Máxima por categoría'),$tableText, $noSpace);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('Puntuación Mínima esperada'),$tableText, $noSpace);
$table->addCell(1000, $cellVCentered)->addText(htmlspecialchars('Puntuación alcanzada por el estudiante'),$tableText, $noSpace);


$table->addRow(5);
$table->addCell(7300, $cellNormalA)->addText(htmlspecialchars(' 	Biología'),$tableText3,$noSpaceTitle);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);

$table->addRow(5);
$table->addCell(7300, $cellNormalA)->addText(htmlspecialchars(' 	Física '),$tableText3,$noSpaceTitle);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);

$table->addRow(5);

$table->addCell(7300, $cellNormalA)->addText(htmlspecialchars(' 	Química '),$tableText3,$noSpaceTitle);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);

$table->addRow(5);
$table->addCell(7300, $cellNormalA)->addText(htmlspecialchars(' 	Matemática '),$tableText3,$noSpaceTitle);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalA)->addText(htmlspecialchars('0'),$tableText,$noSpace);

$cellNormalC = array('bgColor' => '1584C0');

$table->addRow(5);
$table->addCell(2000, $cellNormalC)->addText(htmlspecialchars(' 	PCG TOTAL'),$subTitles3,$noSpaceTitle);
$table->addCell(2000, $cellNormalC)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalC)->addText(htmlspecialchars('0'),$tableText,$noSpace);
$table->addCell(2000, $cellNormalC)->addText(htmlspecialchars('0'),$tableText,$noSpace);


$section->addTextBreak(2);
$section->addText(htmlspecialchars(' 			 ______________________________________________'));
$section->addText(htmlspecialchars('				 	Coordinador (a) de Admisión'));
$section->addText(htmlspecialchars('Fecha:'));


// Save file
/* echo write($phpWord, basename(__FILE__, '.php'), $writers);
if (!CLI) {
    include_once 'Sample_Footer.php';
} */
 
?>