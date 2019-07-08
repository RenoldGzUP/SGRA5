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
        $this->SetFont('Times', 'B', 12);
        // Movernos a la derecha
        $this->Cell(40);
        // T�tulo
        $this->Cell(40, 15, 'Universidad de Panam�', 0, 1, 'L');
        $this->Cell(40);
        $this->SetFont('Times', '', 12);
        $this->Cell(40, -5, 'Vicerrector�a Acad�mica', 0, 1, 'L');
        $this->Cell(40);
        $this->SetFont('Times', '', 12);
        $this->Cell(40, 15, 'Direcci�n General de Admisi�n', 0, 1, 'L');
        // Salto de l�nea

        $this->Cell(40);
        $this->SetFont('Times', '', 12);
        $this->Cell(40, 8, 'Certificaci�n de Resultados de Admisi�n 2019', 0, 1, 'L');
    }

// Pie de p�gina
    public function Footer()
    {
        date_default_timezone_set("America/Panama"); //ZONA HORARIA PAN
        $datetime = date("d-m-Y");

        ///SIGNATURE
        $this->Ln(30);
        $this->setX(30);
        $this->Cell(150, 5, '__________________________________________________________', 0, 0, 'C');
        $this->Ln(5);
        $this->setX(30);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(150, 5, 'COORDINADOR(A) DE ADMISI�N', 0, 0, 'C');
        // Posici�n: a 1,5 cm del final
        $this->SetY(-20);
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, 'FECHA : ' . $datetime, 0, 0, 'L');
    }

    public function printPCG($ARRAYTAGS)
    {
        $i            = 0;
        $pdf          = new PDF();
        $pcgTAGS      = $ARRAYTAGS;
        $size         = sizeof($pcgTAGS);
        $headerTableD = array('', 'Asignaturas', 'Puntuaci�n', ' M�xima', 'M�nima', 'esperada', 'Alcanzada');

        //HEADER
        $this->Ln(6);
        $this->setX(35);
        $this->Cell(36, 5, '*', 1, 0, 'L');
        $this->Cell(34, 5, $headerTableD[2], 1, 0, 'C');
        $this->Cell(34, 5, $headerTableD[2], 1, 0, 'C');
        $this->Cell(34, 5, $headerTableD[2], 1, 0, 'C');
        $this->Ln(5);
        $this->setX(35);
        $this->Cell(36, 5, $headerTableD[1], 0, 0, 'C');
        $this->Cell(34, 5, $headerTableD[3], 0, 0, 'C');
        $this->Cell(34, 5, $headerTableD[4], 0, 0, 'C');
        $this->Cell(34, 5, $headerTableD[6], 0, 0, 'C');
        $this->Ln(5);
        $this->setX(35);
        $this->Cell(36, 5, '*', 0, 0, 'L');
        $this->Cell(34, 5, '*', 0, 0, 'L');
        $this->Cell(34, 5, $headerTableD[5], 0, 0, 'C');
        $this->Cell(34, 5, '*', 0, 0, 'L');
/////////////////////////////////////////////////////
        //BODY
        for ($i = 0; $i < $size; $i++) {
            if ($pcgTAGS[$i] == "PCG TOTAL") {
                $this->SetFillColor(217, 226, 243);
                $this->Ln(5);
                $this->setX(35);
                $this->Cell(36, 5, $pcgTAGS[$i], 'TB', 0, 'L', true);
                $this->Cell(34, 5, '', 'TB', 0, 'L', true);
                $this->Cell(34, 5, '', 'TB', 0, 'L', true);
                $this->Cell(34, 5, '', 'TB', 0, 'L', true);
            } else if ($i % 2 == 0 && $pcgTAGS[$i] != "PCG TOTAL") {
                $this->SetFillColor(255, 242, 204);
                $this->Ln(5);
                $this->setX(35);
                $this->Cell(36, 5, $pcgTAGS[$i], 1, 0, 'L', true);
                $this->Cell(34, 5, '', 1, 0, 'L', true);
                $this->Cell(34, 5, '', 1, 0, 'L', true);
                $this->Cell(34, 5, '', 1, 0, 'L', true);
            } else {
                $this->Ln(5);
                $this->setX(35);
                $this->Cell(36, 5, $pcgTAGS[$i], 1, 0, 'L');
                $this->Cell(34, 5, '', 1, 0, 'L');
                $this->Cell(34, 5, '', 1, 0, 'L');
                $this->Cell(34, 5, '', 1, 0, 'L');

            }

        }
    }

}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//BODY
//N�mero de Inscripci�n
$pdf->Ln(5);
$pdf->setX(115);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(45, 6, 'N�mero de Inscripci�n:', 1, 0, 'L');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(28, 6, '00018222', 1, 0, 'L');

//TABLE A
$pdf->Ln(1);
$pdf->setX(20);
$pdf->SetFont('Arial', '', 11);

$headerA = array('Nombre:', 'Sede:', 'Facultad:', 'Colegio:');
$headerB = array('C�dula:', '�rea:', 'Carrera:', 'Bachillerato:');
$i       = 0;

for ($i = 0; $i <= 3; $i++) {
    $pdf->Ln(5);
    $pdf->setX(20);
    $pdf->Cell(18, 5, $headerA[$i], 1, 0, 'L');
    $pdf->Cell(58, 5, '', 1, 0, 'L');
    $pdf->Cell(16, 5, '', 1, 0, 'L');
    $pdf->setX(115);
    $pdf->Cell(23, 5, $headerB[$i], 1, 0, 'L');
    $pdf->Cell(50, 5, '', 1, 0, 'L');
}
///////////////////////////////////////////////
//TABLA B
$pdf->Ln(5);
$pdf->setX(20);
$pdf->SetFont('Arial', '', 11);

$averageLabels = array('INDICE PREDICTIVO', 'Promedio de Secundaria',
    'Prueba Psicol�gica', 'Prueba de Capacidades Acad�micas(PCA)', 'Prueba de Conocimientos Generales (PCG)');

$i = 0;

for ($i = 0; $i <= 4; $i++) {
    $pdf->Ln(5);
    $pdf->setX(20);
    $pdf->Cell(85, 5, $averageLabels[$i], 1, 0, 'L');
    $pdf->Cell(25, 5, '', 1, 0, 'L');

}
////////////////////////////////////////////
/////////////MENSAJE
$pdf->Ln(10);
$pdf->setX(30);
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(150, 5, 'DESGLOSE  DE LOS RESULTADOS OBTENIDOS EN LA PRUEBA DE CAPACIDADES ACAD�MICAS', 0, 0, 'C');

////////////////////////////
//TABLA C - PCA * TODOS

$headerTableC   = array('', 'Categor�as', 'Puntuaci�n', ' M�xima', 'M�nima', 'esperada', 'Alcanzada');
$verticalLabels = array('L�xico', 'Compresi�n de Lectura', 'Redacci�n', 'SUBTOTAL', '', 'Operativa', 'Razonamiento', 'SUBTOTAL', '', 'PCA TOTAL');
$spanLabels     = array('�rea', ' Verbal', 'Num�rica');

$pdf->SetFont('Arial', 'B', 7);
///////////////////////////////////////////////////////////
//HEADER
$pdf->Ln(6);
$pdf->setX(35);
$pdf->Cell(27, 5, '*', 'T', 0, 'L');
$pdf->Cell(30, 5, '*', 'T', 0, 'L');
$pdf->Cell(27, 5, $headerTableC[2], 'T', 0, 'C');
$pdf->Cell(27, 5, $headerTableC[2], 'T', 0, 'C');
$pdf->Cell(27, 5, $headerTableC[2], 'T', 0, 'C');
$pdf->Ln(5);
$pdf->setX(35);
$pdf->Cell(27, 5, '*', 0, 0, 'L');
$pdf->Cell(30, 5, $headerTableC[1], 0, 0, 'C');
$pdf->Cell(27, 5, $headerTableC[3], 0, 0, 'C');
$pdf->Cell(27, 5, $headerTableC[4], 0, 0, 'C');
$pdf->Cell(27, 5, $headerTableC[6], 0, 0, 'C');
$pdf->Ln(5);
$pdf->setX(35);
$pdf->Cell(27, 5, '*', 0, 0, 'L');
$pdf->Cell(30, 5, '*', 0, 0, 'L');
$pdf->Cell(27, 5, '*', 0, 0, 'L');
$pdf->Cell(27, 5, $headerTableC[5], 0, 0, 'C');
$pdf->Cell(27, 5, '*', 0, 0, 'L');
/////////////////////////////////////////////////////
//BODY

//AREA VERBAL
$pdf->SetFillColor(255, 242, 204);
$pdf->Ln(5);
$pdf->setX(35);
$pdf->Cell(27, 5, '', 'T', 0, 'L', true);
$pdf->Cell(30, 5, $verticalLabels[0], 'T', 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Ln(5);
$pdf->setX(35);
$pdf->Cell(27, 5, $spanLabels[0], 0, 0, 'C', true);
$pdf->Cell(30, 5, $verticalLabels[1], 0, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Ln(5);
$pdf->setX(35);
$pdf->Cell(27, 5, $spanLabels[1], 0, 0, 'C', true);
$pdf->Cell(30, 5, $verticalLabels[2], 0, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Ln(5);
$pdf->setX(35);
$pdf->Cell(27, 5, '', 0, 0, 'L', true);
$pdf->Cell(30, 5, $verticalLabels[3], 0, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
//////////////////////////////////////////////////
//ESPACIO EN BLANCO
$pdf->Ln(5);
$pdf->setX(35);
$pdf->Cell(27, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, $verticalLabels[4], 0, 0, 'L');
$pdf->Cell(27, 5, '', 0, 0, 'L');
$pdf->Cell(27, 5, '', 0, 0, 'L');
$pdf->Cell(27, 5, '', 0, 0, 'L');
////////////////////////////

//AREA NUMERICA
$pdf->SetFillColor(226, 239, 217);
$pdf->Ln(5);
$pdf->setX(35);
$pdf->Cell(27, 5, $spanLabels[0], 0, 0, 'C', true);
$pdf->Cell(30, 5, $verticalLabels[5], 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Ln(5);
$pdf->setX(35);
$pdf->Cell(27, 5, $spanLabels[2], 0, 0, 'C', true);
$pdf->Cell(30, 5, $verticalLabels[6], 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Ln(5);
$pdf->setX(35);
$pdf->Cell(27, 5, '', 0, 0, 'L', true);
$pdf->Cell(30, 5, $verticalLabels[7], 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
$pdf->Cell(27, 5, '', 1, 0, 'L', true);
//////////////////////////////////////////////////
//ESPACIO EN BLANCO
$pdf->Ln(5);
$pdf->setX(35);
$pdf->Cell(27, 5, '', 0, 0, 'L', true);
$pdf->Cell(30, 5, $verticalLabels[8], 0, 0, 'L');
$pdf->Cell(27, 5, '', 0, 0, 'L');
$pdf->Cell(27, 5, '', 0, 0, 'L');
$pdf->Cell(27, 5, '', 0, 0, 'L');
/////////////////////////////////////////////////
$pdf->SetFillColor(217, 226, 243);
$pdf->Ln(5);
$pdf->setX(35);
$pdf->Cell(27, 5, '', 'B', 0, 'L');
$pdf->Cell(30, 5, $verticalLabels[9], 'B', 0, 'L', true);
$pdf->Cell(27, 5, '', 'B', 0, 'L', true);
$pdf->Cell(27, 5, '', 'B', 0, 'L', true);
$pdf->Cell(27, 5, '', 'B', 0, 'L', true);

////////////////////////////////////////////////////////

/////////////MENSAJE
$pdf->Ln(10);
$pdf->setX(30);
$pdf->SetFont('Arial', 'B', 6);
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

//DATE

//FUNCTION

$pdf->Output();
