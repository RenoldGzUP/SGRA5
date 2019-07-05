<?php
require('../fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	// Logo
	//$this->Image('Universidad_SF.png',33,15,15);
	// Arial bold 15
	$this->SetFont('Times','',9);
	// Movernos a la derecha
	// Título
	$this->Cell(0,-10,'Universidad de Panamá',0,1,'C');
	$this->SetFont('Times','',9);
	$this->Cell(0,18,'Vicerrectoría Académica',0,1,'C');
	$this->SetFont('Times','',9);
	$this->Cell(0,-11,'Dirección General de Admisión',0,1,'C');
	// Salto de línea

	$this->SetFont('Times','',9);
	$this->Cell(0,25,'Proceso de Admisión, 2019',0,1,'C');
	$this->Cell(1);
	$this->SetFont('Times','',9);
	$this->Cell(0,-18,'Informe de Resultados',0,1,'C');
	$this->SetFont('Times','',9);
	$this->Cell(0,24,'Orden de Apellido',0,1,'C');

 $this->Ln(-18);
$this->Cell(165);
$this->SetFont('Arial','',9);
$this->Cell(30,-5,'Puntuación  Mínima',1,0,'C');
$this->SetFont('Arial','',9);
 $this->Ln(0);
 $this->Cell(165);
$this->Cell(15,4,'VERBAL',1,0,'C');
$this->SetFont('Arial','',8);
$this->Cell(15,4,'NUMER',1,0,'C');
 $this->Ln(4);
 $this->Cell(165);
$this->Cell(15,4,'42',1,0,'C');
$this->SetFont('Arial','',8);
$this->Cell(15,4,'28',1,0,'C');




}

// Pie de página
function Footer()
{
	// Posición: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','',8);
	// Número de página
	$this->Cell(0,10,'PAGINA '.$this->PageNo().'/{nb}',0,0,'R');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//BODY
//Número de Inscripción
$pdf->Ln(8);
$pdf->Cell(110);
$pdf->SetFont('Arial','',11);
$pdf->Cell(45,6,'Número de Inscripción:',0,0,'R');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(50,6,'00018222',0,0,'L');

//CÉDULA



//Nombre
$pdf->Ln(10);
$pdf->Cell(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(18,6,'Nombre:',1,0,'R');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'MANUELA MARTIN FIGUEROA VARGAS',1,0);

$pdf->Cell(67);
$pdf->SetFont('Arial','',11);
$pdf->Cell(18,6,'Cédula:',1,0,'R');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20,6,'8-598-3333',1,0,'L');


$pdf->Ln(8);
$pdf->Cell(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(18,6,'Sede:',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,6,'Campus',0,0,'L');

$pdf->Cell(67);
$pdf->SetFont('Arial','',11);
$pdf->Cell(18,6,'Área',0,0,'R');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20,6,'Humanistica',0,0,'L');

$pdf->Ln(8);
$pdf->Cell(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(18,6,'Sede:',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,6,'Campus',0,0,'L');

$pdf->Cell(50);
$pdf->SetFont('Arial','',11);
$pdf->Cell(18,6,'Área',0,0,'R');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20,6,'Humanistica',0,0,'L');

$pdf->Ln(8);
$pdf->Cell(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(18,6,'Sede:',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,6,'Campus',0,0,'L');

$pdf->Cell(67);
$pdf->SetFont('Arial','',11);
$pdf->Cell(18,6,'Área',0,0,'R');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20,6,'Humanistica',0,0,'L');



//SEDE




//FACULTAD

//COLEGIO
// BACHILLERATO


$pdf->Output();
?>
