<?php
include_once('../../../classConexionDB.php');
openConnection();
include_once('../../../library_db_sql.php');
require('../fpdf.php');


$idrequest = $_POST["idSede"];
$dataReport = dataToReport($idrequest);
$convertData = convert_object_to_array($dataReport);

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	// Logo
	//$this->Image('Universidad_SF.png',33,15,15);
	// Arial bold 15
	$this->SetFont('Courier','',9);
	// Movernos a la derecha
	// Título
	$this->Cell(0,-10,'Universidad de Panamá',0,1,'C');
	$this->SetFont('Courier','',9);
	$this->Cell(0,18,'Vicerrectoría Académica',0,1,'C');
	$this->SetFont('Courier','',9);
	$this->Cell(0,-11,'Dirección General de Admisión',0,1,'C');
	// Salto de línea

	$this->SetFont('Courier','',9);
	$this->Cell(0,25,'Proceso de Admisión, 2019',0,1,'C');
	$this->Cell(1);
	$this->SetFont('Courier','',9);
	$this->Cell(0,-18,'Informe de Resultados',0,1,'C');
	$this->SetFont('Courier','',9);
	$this->Cell(0,24,'Orden de Apellido',0,1,'C');

 $this->Ln(-18);
$this->Cell(160);
$this->SetFont('Courier','',9);
$this->Cell(35,-5,'Puntuación  Mínima',1,0,'C');
$this->SetFont('Courier','',9);
 $this->Ln(0);
 $this->Cell(160);
$this->Cell(18,4,'VERBAL',1,0,'C');
$this->SetFont('Courier','',8);
$this->Cell(17,4,'NUMER',1,0,'C');
 $this->Ln(4);
 $this->Cell(160);
$this->Cell(18,4,'42',1,0,'C');
$this->SetFont('Courier','',8);
$this->Cell(17,4,'28',1,0,'C');

$this->Ln(10);
$this->SetX(12);
$this->SetFont('Courier','',9);
$this->Cell(30,5,'Sede:',0,0,'C');
$this->Ln(4);
$this->SetX(12);
$this->SetFont('Courier','',9);
$this->Cell(30,5,'Área:',0,0,'C');

$this->Ln(6);
$this->SetX(179);
$this->SetFont('Courier','',9);
$this->Cell(26,5,'Asignaturas',1,0,'C');

//tabla
$this->Ln(5);
	$this->SetX(6);
	$header = array('', 'APELLIDO', 'NOMBRE', 'CÉDULA' ,'P/S' , 'GATB' , 'PCA' , 'ÍNDICE','VER.','NUM.');
    // Cabecera
	foreach($header as $col ){
	//$this->Cell(50);
		if($col == '')
			{    $this->Cell(12,5,$col,0,0,'C');}
		else if( $col == 'VER.' || $col == 'NUM.')
			{$this->Cell(13,5,$col,1,0,'C');}
		else {
			$this->Cell(23,5,$col,0,0,'C');}
		}
 	$this->Ln();

}

// Tabla simple
function BasicTable($id)
{
 
	$idR = $id;
	$dataReport = dataToReport($idR);
	$convertData = convert_object_to_array($dataReport);
	$leng = sizeof($convertData);

	//$array = array("1", "JULIO", "MORAN", "8-898-15","45.6", "117.00" , "65" , " 1.373455", "*34", "*27");
	$len = 1;
	$i = 0 ;
	while ($len < $leng) {

			$this->SetX(6);
			$this->Cell(12,5,$len,0,0,'C');
			$this->Cell(23,5,$convertData[$i]['apellido'],0,0,'C');
			$this->Cell(23,5,$convertData[$i]['nombre'],0,0,'C');
			$this->Cell(23,5,$convertData[$i]['cedula'],0,0,'C');
			$this->Cell(23,5,$convertData[$i]['ps'],0,0,'C');
			$this->Cell(23,5,$convertData[$i]['gatb'],0,0,'C');
			$this->Cell(23,5,$convertData[$i]['pca'],0,0,'C');
			$this->Cell(23,5,$convertData[$i]['indice'],0,0,'C');
			$this->Cell(13,5,$convertData[$i]['verbal'],1,0,'C');
			$this->Cell(13,5,$convertData[$i]['numer'],1,0,'C');
			$this->Ln();

	$i = $i + 1;
	$len = $len + 1;
	}

 	
    // Datos
    /* foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    } */
	
	
}

// Pie de página
function Footer()
{
	date_default_timezone_set("America/Panama");//ZONA HORARIA PAN
	$datetime = date("d-m-Y");
	// Posición: a 1,5 cm del final
	$this->SetY(-10);
	// Courier italic 8
	$this->SetFont('Courier','',8);
	// Número de página
	$this->Cell(0,10,'PAGINA:'.$this->PageNo().'/{nb}',0,0,'R');
	// Número de página
	$this->Cell(-180);
	$this->Cell(0,10,'FECHA : '.$datetime,0,0,'L');
	
	$this->Cell(-10);
	$this->SetXY(25,-15);
	$this->SetFont('Courier','BI',9);
	$this->Cell(15,5,'Observación:',0,0,'C');
	
	$this->Cell(-10);
	$this->SetXY(20,-12);
	$this->SetFont('Courier','BI',9);
	$this->Cell(150,5,'Los asterisco indican que el estudiante no alcanzó la puntuación minima',0,0,'L');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
// Títulos de las columnas
//$header = array('', 'APELLIDO', 'NOMBRE', 'CÉDULA' ,'P/S' , 'GATB' , 'PCA' , 'ÍNDICE','VER.','NUM.');
// Carga de datos
//$data = $pdf->LoadData('paises.txt');
$idrequest = $_POST["idSede"];
$pdf->SetFont('Courier','',8);
$pdf->AddPage();
$pdf->BasicTable($idrequest);
$pdf->AliasNbPages();

date_default_timezone_set("America/Panama");//ZONA HORARIA PAN
$datetime = date("d-m-Y_h_i_s_A");
$pdf->Output('../../../../modulos/reportesAcademicos'.$datetime.'.pdf','F');
echo "../modulos/reportesAcademicos".$datetime.".pdf";
//BODY
//$pdf->Output();
?>
