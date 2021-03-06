<?php
require '../fpdf.php';
$self = $_SERVER['PHP_SELF']; //Obtenemos la p�gina en la que nos encontramos
header("refresh:500; url=$self"); //Refrescamos cada 300 segundos
class PDF extends FPDF
{
// Cabecera de p�gina
    public function Header()
    {
        // Logo
        $this->Image('Universidad_SF.png', 33, 15, 15);
        // Arial bold 15
        $this->SetFont('Arial', '', 9);
        // Movernos a la derecha
        $this->Cell(40);
        // T�tulo
        $this->Cell(40, 15, 'UNIVERSIDAD DE PANAM�', 0, 1, 'L');
        $this->Cell(40);
        $this->SetFont('Arial', '', 9);
        $this->Cell(40, -5, 'VICERRECTOR�A ACAD�MICA', 0, 1, 'L');
        $this->Cell(40);
        $this->SetFont('Arial', '', 9);
        $this->Cell(40, 15, 'DIRECCI�N GENERAL DE ADMISI�N', 0, 1, 'L');
        // Salto de l�nea
        //DATE
        $dateYear = date("Y");
        $this->Cell(40);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(40, 8, 'CERTIFICACION DE RESULTADOS DE ADMISI�N ' . $dateYear, 0, 1, 'L');
    }

// Pie de p�gina
    public function Footer()
    {
        date_default_timezone_set("America/Panama"); //ZONA HORARIA PAN
        $datetime = date("d/m/Y");

        ///SIGNATURE
        $this->Ln(20);
        $this->setX(30);
        $this->Cell(150, 5, '__________________________________________________________', 0, 0, 'C');
        $this->Ln(6);
        $this->setX(30);
        $this->SetFont('Times', 'BI', 9);
        $this->Cell(150, 5, 'Coordinador (a) de Admisi�n', 0, 0, 'C');
        // Posici�n: a 1,5 cm del final
        $this->SetXY(25, -15);
        $this->SetFont('Courier', 'BI', 9);
        $this->Cell(0, 10, 'Fecha : ', 0, 0, 'L');
        // Posici�n: a 1,5 cm del final
        $this->SetXY(40, -15);
        $this->SetFont('Courier', 'BIU', 9);
        $this->Cell(0, 10, $datetime, 0, 0, 'L');
    }

    public function printPCG($ARRAYTAGS)
    {
        $i            = 0;
        $pdf          = new PDF();
        $pcgTAGS      = $ARRAYTAGS;
        $size         = sizeof($pcgTAGS);
        $headerTableD = array('', 'Asignaturas', 'Puntuaci�n', ' M�xima', 'M�nima', 'esperada', 'Alcanzada', 'por el estudiante', 'por categor�a');

        //HEADER
        $this->Ln(7);
        $this->setX(33);
        $this->SetFont('Arial', '', 8);
        $this->Cell(4, 5, '', 'T', 0, 'C');
        $this->Cell(32, 5, '', 'T', 0, 'L');
        $this->Cell(30, 5, $headerTableD[2], 'T', 0, 'C');
        $this->Cell(30, 5, $headerTableD[2], 'T', 0, 'C');
        $this->Cell(25, 5, $headerTableD[2], 'T', 0, 'C');
        $this->Ln(5);
        $this->setX(33);
        $this->SetFont('Arial', '', 8);
        $this->Cell(4, 5, '', 0, 0, 'C');
        $this->Cell(32, 5, $headerTableD[1], 0, 0, 'L{');
        $this->Cell(30, 5, $headerTableD[3], 0, 0, 'C');
        $this->Cell(30, 5, $headerTableD[4], 0, 0, 'C');
        $this->Cell(25, 5, $headerTableD[6], 0, 0, 'C');
        $this->Ln(5);
        $this->setX(33);
        $this->SetFont('Arial', '', 8);
        $this->Cell(4, 5, '', 'B', 0, 'C');
        $this->Cell(32, 5, '', 'B', 0, 'L');
        $this->Cell(30, 5, $headerTableD[8], 'B', 0, 'C');
        $this->Cell(30, 5, $headerTableD[5], 'B', 0, 'C');
        $this->Cell(25, 5, $headerTableD[7], 'B', 0, 'C');
        $this->Ln(1);
////////////////////////////////////////////////////
        //BODY
        for ($i = 0; $i < $size; $i++) {
            if ($pcgTAGS[$i] == "PCG TOTAL") {
                $this->SetFillColor(169, 220, 235);
                $this->Ln(5);
                $this->setX(33);
                $this->SetFont('Arial', 'B', 8);
                $this->Cell(4, 5, '', 'TB', 0, 'C', true);
                $this->Cell(32, 5, $pcgTAGS[$i], 'TB', 0, 'L', true);
                $this->Cell(30, 5, '', 'TB', 0, 'L', true);
                $this->Cell(30, 5, '', 'TB', 0, 'L', true);
                $this->SetFont('Arial', 'B', 8);
                $this->Cell(25, 5, '88', 'TB', 0, 'C', true);
            } else if ($i % 2 == 0 && $pcgTAGS[$i] != "PCG TOTAL") {
                $this->SetFillColor(228, 239, 165);
                $this->Ln(5);
                $this->setX(33);
                $this->SetFont('Arial', '', 9);
                $this->Cell(4, 5, '', 0, 0, 'C', true);
                $this->Cell(32, 5, $pcgTAGS[$i], 0, 0, 'L', true);
                $this->Cell(30, 5, '', 0, 0, 'L', true);
                $this->Cell(30, 5, '', 0, 0, 'L', true);
                $this->Cell(25, 5, '', 0, 0, 'L', true);
            } else {
                $this->Ln(5);
                $this->setX(33);
                $this->SetFont('Arial', '', 9);
                $this->Cell(4, 5, '', 0, 0, 'C');
                $this->Cell(32, 5, $pcgTAGS[$i], 0, 0, 'L');
                $this->Cell(30, 5, '', 0, 0, 'L');
                $this->Cell(30, 5, '', 0, 0, 'L');
                $this->Cell(25, 5, '', 0, 0, 'L');
            }

        }
    }

}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('', 'Letter');

//BODY
//N�mero de Inscripci�n
$pdf->Ln(3);
$pdf->setX(130);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 6, 'N�MERO DE INSCRIPCI�N:', 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(28, 6, '00018222', 0, 0, 'L');

//TABLE A
$pdf->Ln(1);
$pdf->setX(18);
$pdf->SetFont('Arial', '', 8);

$headerA = array('NOMBRE:', 'SEDE:', 'FACULTAD:', 'COLEGIO DE PROCEDENCIA:');
$dataA   = array('MANUELA MARTIN FIGUEROA', 'Campus', 'Farmacia', 'IPT CHIRIQUI GRANDE (BOCAS DEL TORO)');
$dataB   = array('8-598-3333', 'Cientifica', 'Lic.Farmacia', 'Ciencias');
$headerB = array('C�DULA:', '�REA:', 'CARRERA:', 'BACHILLER:');
$i       = 0;

for ($i = 0; $i < 3; $i++) {
    $pdf->Ln(5);
    $pdf->setX(18);
    $pdf->Cell(25, 5, $headerA[$i], 0, 0, 'L');
    $pdf->Cell(60, 5, $dataA[$i], 0, 0, 'L');
    $pdf->setX(130);
    $pdf->Cell(20, 5, $headerB[$i], 0, 0, 'L');
    $pdf->Cell(50, 5, $dataB[$i], 0, 0, 'L');
}

$pdf->Ln(5);
$pdf->setX(18);
$pdf->Cell(42, 5, $headerA[3], 0, 0, 'L');
$pdf->Cell(70, 5, $dataA[3], 0, 0, 'L');
$pdf->setX(130);
$pdf->Cell(20, 5, $headerB[3], 0, 0, 'L');
$pdf->Cell(50, 5, $dataB[3], 0, 0, 'L');

///////////////////////////////////////////////
//TABLA B
$i = 0;

$averageLabels = array('INDICE PREDICTIVO', 'PRUEBA PSICOL�GICA',
    'PROMEDIO DE SECUNDARIA', 'PRUEBA DE CAPACIDADES ACAD�MICAS (PCA):', 'PRUEBA DE CONOCIMIENTOS GENERALES (PCG):');
$dataIndice = array('1.902969', '92.333', '4.86', 77, 52);

$pdf->Ln(5);
$pdf->setX(20);
for ($i = 0; $i <= 4; $i++) {
    if ($averageLabels[$i] == 'INDICE PREDICTIVO') {
        $pdf->Ln(5);
        $pdf->setX(18);
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(80, 5, $averageLabels[$i], 0, 0, 'L');
        $pdf->Cell(25, 5, $dataIndice[$i], 0, 0, 'R');
    } else {
        $pdf->Ln(5);
        $pdf->setX(18);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(80, 5, $averageLabels[$i], 0, 0, 'L');
        $pdf->Cell(25, 5, $dataIndice[$i], 0, 0, 'R');}

}
////////////////////////////////////////////
/////////////MENSAJE
$pdf->Ln(9);
$pdf->setX(30);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(150, 5, 'DESGLOSE  DE LOS RESULTADOS OBTENIDOS EN LA PRUEBA DE CAPACIDADES ACAD�MICAS', 0, 0, 'C');

////////////////////////////
//TABLA C - PCA * TODOS

$headerTableC   = array('', 'Categor�as', 'Puntuaci�n', ' M�xima', 'M�nima', 'Esperada', 'alcanzada', 'por categor�a', 'por el estudiante');
$verticalLabels = array('L�xico', 'Compresi�n de Lectura', 'Redacci�n', 'SUBTOTAL', '', 'Operativa', 'Razonamiento', 'SUBTOTAL', '', 'PCA TOTAL');
$spanLabels     = array('�rea', ' Verbal', 'Num�rica');

//$pdf->SetFont('Arial', 'B', 7);
///////////////////////////////////////////////////////////
//HEADER
$pdf->Ln(7);
$pdf->setX(30);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(30, 5, '', 'T', 0, 'L');
$pdf->Cell(40, 5, '', 'T', 0, 'L');
$pdf->Cell(25, 5, $headerTableC[2], 'T', 0, 'C');
$pdf->Cell(25, 5, $headerTableC[2], 'T', 0, 'C');
$pdf->Cell(25, 5, $headerTableC[2], 'T', 0, 'C');
$pdf->Ln(5);
$pdf->setX(30);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(30, 5, '', 0, 0, 'L');
$pdf->Cell(40, 5, $headerTableC[1], 0, 0, 'L');
$pdf->Cell(25, 5, $headerTableC[3], 0, 0, 'C');
$pdf->Cell(25, 5, $headerTableC[4], 0, 0, 'C');
$pdf->Cell(25, 5, $headerTableC[6], 0, 0, 'C');
$pdf->Ln(5);
$pdf->setX(30);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(30, 5, '', 0, 0, 'L');
$pdf->Cell(40, 5, '', 0, 0, 'L');
$pdf->Cell(25, 5, $headerTableC[7], 0, 0, 'C');
$pdf->Cell(25, 5, $headerTableC[5], 0, 0, 'C');
$pdf->Cell(25, 5, $headerTableC[8], 0, 0, 'C');
/////////////////////////////////////////////////////
//BODY

//AREA VERBAL
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(228, 239, 165);
$pdf->Ln(5);
$pdf->setX(30);
$pdf->Cell(30, 5, '', 'T', 0, 'L', true);
$pdf->Cell(40, 5, $verticalLabels[0], 'T', 0, 'L', true);
$pdf->Cell(25, 5, '', 'T', 0, 'L', true);
$pdf->Cell(25, 5, '', 'T', 0, 'L', true);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(25, 5, '6', 'T', 0, 'C', true);
$pdf->Ln(5);
$pdf->setX(30);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(30, 5, $spanLabels[0], 0, 0, 'C', true);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, $verticalLabels[1], 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(25, 5, '5', 0, 0, 'C', true);
$pdf->Ln(5);
$pdf->setX(30);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(30, 5, $spanLabels[1], 0, 0, 'C', true);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, $verticalLabels[2], 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(25, 5, '75', 0, 0, 'C', true);
$pdf->Ln(5);
$pdf->setX(30);
$pdf->Cell(30, 5, '', 0, 0, 'L', true);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, $verticalLabels[3], 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(25, 5, '6', 0, 0, 'C', true);
//////////////////////////////////////////////////
//ESPACIO EN BLANCO
$pdf->Ln(5);
$pdf->setX(30);
$pdf->Cell(20, 3, '', 0, 0, 'L');
$pdf->Cell(49, 3, $verticalLabels[4], 0, 0, 'L');
$pdf->Cell(25, 3, '', 0, 0, 'L');
$pdf->Cell(25, 3, '', 0, 0, 'L');
$pdf->Cell(25, 3, '', 0, 0, 'L');
////////////////////////////

//AREA NUMERICA
$pdf->SetFillColor(173, 231, 183);
$pdf->Ln(2);
$pdf->setX(30);
$pdf->Cell(30, 5, '', 0, 0, 'C', true);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, $verticalLabels[5], 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(25, 5, '7', 0, 0, 'C', true);
$pdf->Ln(5);
$pdf->setX(30);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(30, 5, $spanLabels[0], 0, 0, 'C', true);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, $verticalLabels[6], 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(25, 5, '67', 0, 0, 'C', true);
$pdf->Ln(5);
$pdf->setX(30);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(30, 5, $spanLabels[2], 0, 0, 'C', true);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, $verticalLabels[7], 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(25, 5, '6', 0, 0, 'C', true);
//////////////////////////////////////////////////
//ESPACIO EN BLANCO
$pdf->Ln(5);
$pdf->setX(30);
$pdf->Cell(30, 5, '', 0, 0, 'L', true);
$pdf->Cell(40, 5, $verticalLabels[8], 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
$pdf->Cell(25, 5, '', 0, 0, 'L', true);
/////////////////////////////////////////////////
//PCA
$pdf->SetFillColor(169, 220, 235);
$pdf->Ln(7);
$pdf->setX(30);
$pdf->Cell(30, 5, '', 'B', 0, 'L', true);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 5, $verticalLabels[9], 'B', 0, 'L', true);
$pdf->Cell(25, 5, '', 'B', 0, 'L', true);
$pdf->Cell(25, 5, '', 'B', 0, 'L', true);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(25, 5, '8', 'B', 0, 'C', true);

////////////////////////////////////////////////////////

/////////////MENSAJE
$pdf->Ln(8);
$pdf->setX(30);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(150, 5, 'DESGLOSE  DE LOS RESULTADOS OBTENIDOS EN LA PRUEBA DE CONOCIMIENTOS GENERALES �REA $$', 0, 0, 'C');

//////////////////////////////////
//TABLA D
$pcgAdmonPublicaTAGS = array('Contabilidad', 'Ciencias Politicas', 'Administraci�n P�blica', 'Matem�tica', 'Econom�a', 'PCG TOTAL');
$pcgCientificaTAGS   = array('Biolog�a', 'F�sica', 'Qu�mica', 'Matem�tica', 'PCG TOTAL');
$pcgDerechoTAGS      = array('Filosof�a', 'Historia', 'Geograf�a', 'Espa�ol', 'Gobierno', 'PCG TOTAL');
$pdf->SetFont('Arial', 'B', 7);

//agregar ciclo if
//VALIDAR POR AREA
//PCG
$pdf->printPCG($pcgCientificaTAGS);
$pdf->Image('selloDGA.png', 169, 200, 35, 35);
//DATE

//FUNCTION

$pdf->Output();
