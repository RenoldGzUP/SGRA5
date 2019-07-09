<?php
require '../fpdf.php';
$self = $_SERVER['PHP_SELF']; //Obtenemos la página en la que nos encontramos
header("refresh:500; url=$self"); //Refrescamos cada 300 segundos
class PDF extends FPDF
{
// Cabecera de página
    public function Header()
    {
        // Logo
        $this->Image('Universidad_SF.png', 33, 15, 15);
        // Arial bold 15
        $this->SetFont('Times', 'B', 11);
        // Movernos a la derecha
        $this->Cell(40);
        // Título
        $this->Cell(40, 15, 'Universidad de Panamá', 0, 1, 'L');
        $this->Cell(40);
        $this->SetFont('Times', '', 11);
        $this->Cell(40, -5, 'Vicerrectoría Académica', 0, 1, 'L');
        $this->Cell(40);
        $this->SetFont('Times', '', 11);
        $this->Cell(40, 15, 'Dirección General de Admisión', 0, 1, 'L');
        // Salto de línea

        $this->Cell(40);
        $this->SetFont('Times', '', 11);
        $this->Cell(40, 8, 'Certificación de Resultados de Admisión 2019', 0, 1, 'L');
    }

// Pie de página
    public function Footer()
    {
        date_default_timezone_set("America/Panama"); //ZONA HORARIA PAN
        $datetime = date("d-m-Y");

        ///SIGNATURE
        $this->Ln(13);
        $this->setX(30);
        $this->Cell(150, 5, '__________________________________________________________', 0, 0, 'C');
        $this->Ln(6);
        $this->setX(30);
        $this->SetFont('Times', '', 11);
        $this->Cell(150, 5, 'Coordinador (a) de Admisión', 0, 0, 'C');
        // Posición: a 1,5 cm del final
        $this->SetXY(25, -28);
        $this->SetFont('Times', '', 11);
        $this->Cell(0, 10, 'Fecha : ' . $datetime, 0, 0, 'L');
    }

    public function printPCG($ARRAYTAGS)
    {
        $i            = 0;
        $pdf          = new PDF();
        $pcgTAGS      = $ARRAYTAGS;
        $size         = sizeof($pcgTAGS);
        $headerTableD = array('', 'Asignaturas', 'Puntuación', ' Máxima', 'Mínima', 'esperada', 'Alcanzada');

        //HEADER
        $this->Ln(7);
        $this->setX(33);
        $this->SetFont('Times', '', 9);
        $this->Cell(60, 5, '', 'T', 0, 'L');
        $this->Cell(28, 5, $headerTableD[2], 'T', 0, 'C');
        $this->Cell(28, 5, $headerTableD[2], 'T', 0, 'C');
        $this->SetFont('Times', 'B', 9);
        $this->Cell(28, 5, $headerTableD[2], 'T', 0, 'C');
        $this->Ln(5);
        $this->setX(33);
        $this->SetFont('Times', '', 9);
        $this->Cell(60, 5, $headerTableD[1], 0, 0, 'C');
        $this->Cell(28, 5, $headerTableD[3], 0, 0, 'C');
        $this->Cell(28, 5, $headerTableD[4], 0, 0, 'C');
        $this->SetFont('Times', 'B', 9);
        $this->Cell(28, 5, $headerTableD[6], 0, 0, 'C');
        $this->Ln(5);
        $this->setX(33);
        $this->SetFont('Times', '', 9);
        $this->Cell(60, 5, '', 'B', 0, 'L');
        $this->Cell(28, 5, '', 'B', 0, 'L');
        $this->Cell(28, 5, $headerTableD[5], 'B', 0, 'C');
        $this->Cell(28, 5, '', 'B', 0, 'L');
/////////////////////////////////////////////////////
        //BODY
        for ($i = 0; $i < $size; $i++) {
            if ($pcgTAGS[$i] == "PCG TOTAL") {
                $this->SetFillColor(217, 226, 243);
                $this->Ln(5);
                $this->setX(33);
                $this->SetFont('Times', 'B', 9);
                $this->Cell(60, 5, $pcgTAGS[$i], 'TB', 0, 'L', true);
                $this->Cell(28, 5, '', 'TB', 0, 'L', true);
                $this->Cell(28, 5, '', 'TB', 0, 'L', true);
                $this->Cell(28, 5, '', 'TB', 0, 'L', true);
            } else if ($i % 2 == 0 && $pcgTAGS[$i] != "PCG TOTAL") {
                $this->SetFillColor(255, 242, 204);
                $this->Ln(5);
                $this->setX(33);
                $this->SetFont('Times', '', 9);
                $this->Cell(60, 5, $pcgTAGS[$i], 0, 0, 'L', true);
                $this->Cell(28, 5, '', 0, 0, 'L', true);
                $this->Cell(28, 5, '', 0, 0, 'L', true);
                $this->Cell(28, 5, '', 0, 0, 'L', true);
            } else {
                $this->Ln(5);
                $this->setX(33);
                $this->SetFont('Times', '', 9);
                $this->Cell(60, 5, $pcgTAGS[$i], 0, 0, 'L');
                $this->Cell(28, 5, '', 0, 0, 'L');
                $this->Cell(28, 5, '', 0, 0, 'L');
                $this->Cell(28, 5, '', 0, 0, 'L');
            }

        }
    }

}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('', 'Letter');

//BODY
//Número de Inscripción
$pdf->Ln(3);
$pdf->setX(115);
$pdf->SetFont('Times', '', 11);
$pdf->Cell(45, 6, 'Número de Inscripción:', 0, 0, 'L');
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(28, 6, '00018222', 0, 0, 'L');

//TABLE A
$pdf->Ln(1);
$pdf->setX(20);
$pdf->SetFont('Times', '', 11);

$headerA = array('Nombre:', 'Sede:', 'Facultad:', 'Colegio:');
$dataA   = array('MANUELA MARTIN FIGUEROA', 'Campus', 'Farmacia', 'Escuela Americana');
$dataB   = array('8-598-3333', 'Cientifica', 'Lic.Farmacia', 'Ciencias');
$headerB = array('Cédula:', 'Área:', 'Carrera:', 'Bachillerato:');
$i       = 0;

for ($i = 0; $i <= 3; $i++) {
    $pdf->Ln(5);
    $pdf->setX(25);
    $pdf->Cell(18, 5, $headerA[$i], 0, 0, 'L');
    $pdf->Cell(60, 5, $dataA[$i], 0, 0, 'L');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->setX(115);
    $pdf->Cell(23, 5, $headerB[$i], 0, 0, 'L');
    $pdf->Cell(50, 5, $dataB[$i], 0, 0, 'L');
}
///////////////////////////////////////////////
//TABLA B
$i = 0;

$averageLabels = array('INDICE PREDICTIVO', 'Promedio de Secundaria',
    'Prueba Psicológica', 'Prueba de Capacidades Académicas(PCA)', 'Prueba de Conocimientos Generales (PCG)');
$dataIndice = array('1.902969', '92.333', '4.86', 77, 52);

$pdf->Ln(5);
$pdf->setX(20);
for ($i = 0; $i <= 4; $i++) {
    if ($averageLabels[$i] == 'INDICE PREDICTIVO') {
        $pdf->Ln(5);
        $pdf->setX(25);
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell(75, 5, $averageLabels[$i], 0, 0, 'L');
        $pdf->Cell(25, 5, $dataIndice[$i], 0, 0, 'L');
    } else {
        $pdf->Ln(5);
        $pdf->setX(25);
        $pdf->SetFont('Times', '', 11);
        $pdf->Cell(75, 5, $averageLabels[$i], 0, 0, 'L');
        $pdf->Cell(25, 5, $dataIndice[$i], 0, 0, 'L');}

}
////////////////////////////////////////////
/////////////MENSAJE
$pdf->Ln(9);
$pdf->setX(30);
$pdf->SetFont('Times', 'B', 7);
$pdf->Cell(150, 5, 'DESGLOSE  DE LOS RESULTADOS OBTENIDOS EN LA PRUEBA DE CAPACIDADES ACADÉMICAS', 0, 0, 'C');

////////////////////////////
//TABLA C - PCA * TODOS

$headerTableC   = array('', 'Categorías', 'Puntuación', ' Máxima', 'Mínima', 'esperada', 'Alcanzada');
$verticalLabels = array('Léxico', 'Compresión de Lectura', 'Redacción', 'SUBTOTAL', '', 'Operativa', 'Razonamiento', 'SUBTOTAL', '', 'PCA TOTAL');
$spanLabels     = array('Área', ' Verbal', 'Numérica');

//$pdf->SetFont('Arial', 'B', 7);
///////////////////////////////////////////////////////////
//HEADER
$pdf->Ln(7);
$pdf->setX(33);
$pdf->SetFont('Times', '', 9);
$pdf->Cell(20, 5, '', 'T', 0, 'L');
$pdf->Cell(49, 5, '', 'T', 0, 'L');
$pdf->Cell(25, 5, $headerTableC[2], 'T', 0, 'C');
$pdf->Cell(25, 5, $headerTableC[2], 'T', 0, 'C');
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(25, 5, $headerTableC[2], 'T', 0, 'C');
$pdf->Ln(5);
$pdf->setX(33);
$pdf->SetFont('Times', '', 9);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(49, 5, $headerTableC[1], 0, 0, 'C');
$pdf->Cell(25, 5, $headerTableC[3], 0, 0, 'C');
$pdf->Cell(25, 5, $headerTableC[4], 0, 0, 'C');
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(25, 5, $headerTableC[6], 0, 0, 'C');
$pdf->Ln(5);
$pdf->setX(33);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(49, 5, '', 0, 0, 'L');
$pdf->Cell(25, 5, '', 0, 0, 'L');
$pdf->SetFont('Times', '', 9);
$pdf->Cell(25, 5, $headerTableC[5], 0, 0, 'C');
$pdf->Cell(25, 5, '', 0, 0, 'L');
/////////////////////////////////////////////////////
//BODY

//AREA VERBAL
$pdf->SetFont('Times', '', 9);
$pdf->SetFillColor(255, 242, 204);
$pdf->Ln(5);
$pdf->setX(33);
$pdf->Cell(20, 5, '', 'T', 0, 'L', true);
$pdf->Cell(49, 5, $verticalLabels[0], 'T', 0, 'L', true);
$pdf->Cell(25, 5, '', 'T', 0, 'L', true);
$pdf->Cell(25, 5, '', 'T', 0, 'L', true);
$pdf->Cell(25, 5, '', 'T', 0, 'L', true);
$pdf->Ln(5);
$pdf->setX(33);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(20, 5, $spanLabels[0], 0, 0, 'C', true);
$pdf->SetFont('Times', '', 9);
$pdf->Cell(49, 5, $verticalLabels[1], 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Ln(5);
$pdf->setX(33);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(20, 5, $spanLabels[1], 0, 0, 'C', true);
$pdf->SetFont('Times', '', 9);
$pdf->Cell(49, 5, $verticalLabels[2], 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Ln(5);
$pdf->setX(33);
$pdf->Cell(20, 5, '', 0, 0, 'L', true);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(49, 5, $verticalLabels[3], 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
//////////////////////////////////////////////////
//ESPACIO EN BLANCO
$pdf->Ln(5);
$pdf->setX(33);
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(49, 5, $verticalLabels[4], 0, 0, 'L');
$pdf->Cell(25, 5, '', 0, 0, 'L');
$pdf->Cell(25, 5, '', 0, 0, 'L');
$pdf->Cell(25, 5, '', 0, 0, 'L');
////////////////////////////

//AREA NUMERICA
$pdf->SetFillColor(226, 239, 217);
$pdf->Ln(5);
$pdf->setX(33);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(20, 5, $spanLabels[0], 0, 0, 'C', true);
$pdf->SetFont('Times', '', 9);
$pdf->Cell(49, 5, $verticalLabels[5], 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Ln(5);
$pdf->setX(33);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(20, 5, $spanLabels[2], 0, 0, 'C', true);
$pdf->SetFont('Times', '', 9);
$pdf->Cell(49, 5, $verticalLabels[6], 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Ln(5);
$pdf->setX(33);
$pdf->Cell(20, 5, '', 0, 0, 'L', true);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(49, 5, $verticalLabels[7], 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
//////////////////////////////////////////////////
//ESPACIO EN BLANCO
$pdf->Ln(5);
$pdf->setX(33);
$pdf->Cell(20, 5, '', 0, 0, 'L', true);
$pdf->Cell(49, 5, $verticalLabels[8], 0, 0, 'L');
$pdf->Cell(25, 5, '', 0, 0, 'L');
$pdf->Cell(25, 5, '', 0, 0, 'L');
$pdf->Cell(25, 5, '', 0, 0, 'L');
/////////////////////////////////////////////////
//PCA
$pdf->SetFillColor(217, 226, 243);
$pdf->Ln(5);
$pdf->setX(33);
$pdf->Cell(20, 5, '', 'B', 0, 'L');
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(49, 5, $verticalLabels[9], 'B', 0, 'L', true);
$pdf->Cell(25, 5, '', 'B', 0, 'L', true);
$pdf->Cell(25, 5, '', 'B', 0, 'L', true);
$pdf->Cell(25, 5, '', 'B', 0, 'L', true);

////////////////////////////////////////////////////////

/////////////MENSAJE
$pdf->Ln(8);
$pdf->setX(30);
$pdf->SetFont('Times', 'B', 7);
$pdf->Cell(150, 5, 'DESGLOSE  DE LOS RESULTADOS OBTENIDOS EN LA PRUEBA DE CONOCIMIENTOS GENERALES ÁREA $$', 0, 0, 'C');

//////////////////////////////////
//TABLA D
$pcgAdmonPublicaTAGS = array('Contabilidad', 'Ciencias Politicas', 'Administración Pública', 'Matemática', 'Economía', 'PCG TOTAL');
$pcgCientificaTAGS   = array('Biología', 'Física', 'Química', 'Matemática', 'PCG TOTAL');
$pcgDerechoTAGS      = array('Filosofía', 'Historia', 'Geografía', 'Español', 'Gobierno', 'PCG TOTAL');
$pdf->SetFont('Arial', 'B', 7);

//agregar ciclo if
//VALIDAR POR AREA
//PCG
$pdf->printPCG($pcgAdmonPublicaTAGS);
$pdf->Image('selloDGA.png', 153, 237, 34, 34);
//DATE

//FUNCTION

$pdf->Output();
