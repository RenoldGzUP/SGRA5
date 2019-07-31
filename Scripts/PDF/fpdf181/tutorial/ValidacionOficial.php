<?php
include_once '../../../classConexionDB.php';
openConnection();
include_once '../../../library_db_sql.php';
session_start();
saveLogs($_SESSION['name'], "Usuario generó Certificacion");
require '../fpdf.php';
//$self = $_SERVER['PHP_SELF']; //Obtenemos la página en la que nos encontramos
//header("refresh:500; url=$self"); //Refrescamos cada 300 segundos
class PDF extends FPDF
{
// Cabecera de página
    public function Header()
    {
        // Logo
        $this->Image('Universidad_SF.png', 33, 15, 15);
        // Arial bold 15
        $this->SetFont('Arial', '', 9);
        // Movernos a la derecha
        $this->Cell(40);
        // Título
        $this->Cell(40, 15, 'UNIVERSIDAD DE PANAMÁ', 0, 1, 'L');
        $this->Cell(40);
        $this->SetFont('Arial', '', 9);
        $this->Cell(40, -5, 'VICERRECTORÍA ACADÉMICA', 0, 1, 'L');
        $this->Cell(40);
        $this->SetFont('Arial', '', 9);
        $this->Cell(40, 15, 'DIRECCIÓN GENERAL DE ADMISIÓN', 0, 1, 'L');
        // Salto de línea
        //DATE
        $dateYear = date("Y");
        $yearMin  = $dateYear - 1;
        $this->Cell(40);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(40, 8, 'VALIDAR PROCESO DE ADMISIÓN ' . $yearMin . ' - ' . $dateYear, 0, 1, 'L');
    }

//emcabezados
    public function PersonalData($ID_INSCRITO)
    {
        //DATA
        $Inscrito     = $ID_INSCRITO;
        $Data         = GetPersonalData($Inscrito);
        $DataPersonal = convert_object_to_array($Data);

        $area     = GetAreaLabels($DataPersonal[0]["areap"]);
        $areaFill = convert_object_to_array($area);

        $sede     = GetSedeLabels($DataPersonal[0]["sede"]);
        $sedeFill = convert_object_to_array($sede);

        $facultad     = GetFacultadLabels($DataPersonal[0]["facultad"]);
        $facultadFill = convert_object_to_array($facultad);

        //echo $DataPersonal[0]["nombrecompleto"];
        //var_dump($TemData);
        //$PersonalData = convert_object_to_array($Data);

        //////////////////////////

        //////////////////////////

        //BODY
        //Número de Inscripción
        $this->Ln(3);
        $this->setX(130);
        $this->SetFont('Arial', '', 8);
        $this->Cell(40, 6, 'NÚMERO DE VALIDACIÓN:', 0, 0, 'L');
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(28, 6, $Inscrito, 0, 0, 'L');

//TABLE A
        $this->Ln(1);
        $this->setX(18);
        $this->SetFont('Arial', '', 8);

        $headerA = array('NOMBRE:', 'SEDE:', 'FACULTAD:', 'COLEGIO DE PROCEDENCIA:');
        $dataA   = array($DataPersonal[0]["nombrecompleto"], strtoupper($sedeFill[0]["nombre_sede"]), strtoupper($facultadFill[0]["nombre_facultad"]), $DataPersonal[0]["col_proc"]);
        $dataB   = array($DataPersonal[0]["cedula"], strtoupper($areaFill[0]["nombre_area"]), $DataPersonal[0]["carrera"], $DataPersonal[0]["nbachiller"]);
        $headerB = array('CÉDULA:', 'ÁREA:', 'CARRERA:', 'BACHILLER:');
        $i       = 0;

        for ($i = 0; $i < 3; $i++) {
            $this->Ln(5);
            $this->setX(18);
            $this->Cell(25, 5, $headerA[$i], 0, 0, 'L');
            $this->Cell(60, 5, $dataA[$i], 0, 0, 'L');
            $this->setX(130);
            $this->Cell(20, 5, $headerB[$i], 0, 0, 'L');
            $this->Cell(50, 5, $dataB[$i], 0, 0, 'L');
        }

        $this->Ln(5);
        $this->setX(18);
        $this->Cell(42, 5, $headerA[3], 0, 0, 'L');
        $this->Cell(70, 5, $dataA[3], 0, 0, 'L');
        $this->setX(130);
        $this->Cell(20, 5, $headerB[3], 0, 0, 'L');
        $this->Cell(50, 5, $dataB[3], 0, 0, 'L');

    }

    public function Averages($ID_INSCRITO)
    {
        //DATA

        $DataTest    = GetAverageData($ID_INSCRITO);
        $averageData = convert_object_to_array($DataTest);

        //TABLA B
        $i = 0;

        $averageLabels = array('INDICE PREDICTIVO', 'PRUEBA PSICOLÓGICA',
            'PROMEDIO DE SECUNDARIA', 'PRUEBA DE CAPACIDADES ACADÉMICAS (PCA):', 'PRUEBA DE CONOCIMIENTOS GENERALES (PCG):');
        $dataIndice = array($averageData[0]["indice"], $averageData[0]["gatb"], $averageData[0]["ps"], $averageData[0]["pca"], $averageData[0]["pcg"]);

        $this->Ln(5);
        $this->setX(20);
        for ($i = 0; $i <= 4; $i++) {
            if ($averageLabels[$i] == 'INDICE PREDICTIVO') {
                $this->Ln(5);
                $this->setX(18);
                $this->SetFont('Arial', 'B', 9);
                $this->Cell(80, 5, $averageLabels[$i], 0, 0, 'L');
                $this->Cell(25, 5, $dataIndice[$i], 0, 0, 'R');
            } else {
                $this->Ln(5);
                $this->setX(18);
                $this->SetFont('Arial', '', 9);
                $this->Cell(80, 5, $averageLabels[$i], 0, 0, 'L');
                $this->Cell(25, 5, $dataIndice[$i], 0, 0, 'R');}

        }

        /////////////MENSAJE
        $this->Ln(9);
        $this->setX(30);
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(150, 5, 'DESGLOSE  DE LOS RESULTADOS OBTENIDOS EN LA PRUEBA DE CAPACIDADES ACADÉMICAS', 0, 0, 'C');

    }

    public function PrintPCA($ID_INSCRITO)
    {
        //DATA
        $dataPCA  = getDataIndividual($ID_INSCRITO);
        $pcaTable = convert_object_to_array($dataPCA);
        //$PCAData = GetPCAData();

        //TABLA C - PCA * TODOS

        $headerTableC   = array('', 'Categorías', 'Puntuación', ' Máxima', 'Mínima', 'Esperada', 'alcanzada', 'por categoría', 'por el estudiante');
        $verticalLabels = array('Léxico', 'Compresión de Lectura', 'Redacción', 'SUBTOTAL', '', 'Operativa', 'Razonamiento', 'SUBTOTAL', '', 'PCA TOTAL');
        $spanLabels     = array('Área', ' Verbal', 'Numérica');

//$pdf->SetFont('Arial', 'B', 7);
        ///////////////////////////////////////////////////////////
        //HEADER
        $this->Ln(7);
        $this->setX(30);
        $this->SetFont('Arial', '', 8);
        $this->Cell(30, 5, '', 'T', 0, 'L');
        $this->Cell(40, 5, '', 'T', 0, 'L');
        $this->Cell(25, 5, $headerTableC[2], 'T', 0, 'C');
        $this->Cell(25, 5, $headerTableC[2], 'T', 0, 'C');
        $this->Cell(25, 5, $headerTableC[2], 'T', 0, 'C');
        $this->Ln(5);
        $this->setX(30);
        $this->SetFont('Arial', '', 8);
        $this->Cell(30, 5, '', 0, 0, 'L');
        $this->Cell(40, 5, $headerTableC[1], 0, 0, 'L');
        $this->Cell(25, 5, $headerTableC[3], 0, 0, 'C');
        $this->Cell(25, 5, $headerTableC[4], 0, 0, 'C');
        $this->Cell(25, 5, $headerTableC[6], 0, 0, 'C');
        $this->Ln(5);
        $this->setX(30);
        $this->SetFont('Arial', '', 8);
        $this->Cell(30, 5, '', 0, 0, 'L');
        $this->Cell(40, 5, '', 0, 0, 'L');
        $this->Cell(25, 5, $headerTableC[7], 0, 0, 'C');
        $this->Cell(25, 5, $headerTableC[5], 0, 0, 'C');
        $this->Cell(25, 5, $headerTableC[8], 0, 0, 'C');
/////////////////////////////////////////////////////
        //BODY

//AREA VERBAL
        $this->SetFont('Arial', '', 8);
        $this->SetFillColor(228, 239, 165);
        $this->Ln(5);
        $this->setX(30);
        $this->Cell(30, 5, '', 'T', 0, 'L', true);
        $this->Cell(40, 5, $verticalLabels[0], 'T', 0, 'L', true);
        $this->Cell(25, 5, '18', 'T', 0, 'C', true);
        $this->Cell(25, 5, '13', 'T', 0, 'C', true);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(25, 5, $pcaTable[0]["valor_lexico"], 'T', 0, 'C', true);
        $this->Ln(5);
        $this->setX(30);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(30, 5, $spanLabels[0], 0, 0, 'C', true);
        $this->SetFont('Arial', '', 8);
        $this->Cell(40, 5, $verticalLabels[1], 0, 0, 'L', true);
        $this->Cell(25, 5, '14', 0, 0, 'C', true);
        $this->Cell(25, 5, '10', 0, 0, 'C', true);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(25, 5, $pcaTable[0]["valor_lectura"], 0, 0, 'C', true);
        $this->Ln(5);
        $this->setX(30);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(30, 5, $spanLabels[1], 0, 0, 'C', true);
        $this->SetFont('Arial', '', 8);
        $this->Cell(40, 5, $verticalLabels[2], 0, 0, 'L', true);
        $this->Cell(25, 5, '28', 0, 0, 'C', true);
        $this->Cell(25, 5, '20', 0, 0, 'C', true);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(25, 5, $pcaTable[0]["valor_redaccion"], 0, 0, 'C', true);
        $this->Ln(5);
        $this->setX(30);
        $this->Cell(30, 5, '', 0, 0, 'L', true);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(40, 5, $verticalLabels[3], 0, 0, 'L', true);
        $this->Cell(25, 5, '60', 0, 0, 'C', true);
        $this->Cell(25, 5, '43', 0, 0, 'C', true);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(25, 5, $pcaTable[0]["subtotalverbal"], 0, 0, 'C', true);
//////////////////////////////////////////////////
        //ESPACIO EN BLANCO
        $this->Ln(5);
        $this->setX(30);
        $this->Cell(20, 3, '', 0, 0, 'L');
        $this->Cell(49, 3, $verticalLabels[4], 0, 0, 'L');
        $this->Cell(25, 3, '', 0, 0, 'L');
        $this->Cell(25, 3, '', 0, 0, 'L');
        $this->Cell(25, 3, '', 0, 0, 'L');
////////////////////////////

//AREA NUMERICA
        $this->SetFillColor(173, 231, 183);
        $this->Ln(2);
        $this->setX(30);
        $this->Cell(30, 5, '', 0, 0, 'C', true);
        $this->SetFont('Arial', '', 8);
        $this->Cell(40, 5, $verticalLabels[5], 0, 0, 'L', true);
        $this->Cell(25, 5, '20', 0, 0, 'C', true);
        $this->Cell(25, 5, '14', 0, 0, 'C', true);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(25, 5, $pcaTable[0]["operatoria"], 0, 0, 'C', true);
        $this->Ln(5);
        $this->setX(30);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(30, 5, $spanLabels[0], 0, 0, 'C', true);
        $this->SetFont('Arial', '', 8);
        $this->Cell(40, 5, $verticalLabels[6], 0, 0, 'L', true);
        $this->Cell(25, 5, '20', 0, 0, 'C', true);
        $this->Cell(25, 5, '14', 0, 0, 'C', true);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(25, 5, $pcaTable[0]["razonamiento"], 0, 0, 'C', true);
        $this->Ln(5);
        $this->setX(30);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(30, 5, $spanLabels[2], 0, 0, 'C', true);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(40, 5, $verticalLabels[7], 0, 0, 'L', true);
        $this->Cell(25, 5, '40', 0, 0, 'C', true);
        $this->Cell(25, 5, '28', 0, 0, 'C', true);
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(25, 5, $pcaTable[0]["subtotalnumerico"], 0, 0, 'C', true);
//////////////////////////////////////////////////
        //ESPACIO EN BLANCO
        $this->Ln(5);
        $this->setX(30);
        $this->Cell(30, 5, '', 0, 0, 'L', true);
        $this->Cell(40, 5, $verticalLabels[8], 0, 0, 'L', true);
        $this->Cell(25, 5, '', 0, 0, 'L', true);
        $this->Cell(25, 5, '', 0, 0, 'L', true);
        $this->Cell(25, 5, '', 0, 0, 'L', true);
/////////////////////////////////////////////////
        //PCA
        $this->SetFillColor(169, 220, 235);
        $this->Ln(7);
        $this->setX(30);
        $this->Cell(30, 5, '', 'B', 0, 'L', true);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(40, 5, $verticalLabels[9], 'B', 0, 'L', true);
        $this->Cell(25, 5, '100', 'B', 0, 'C', true);
        $this->Cell(25, 5, '71', 'B', 0, 'C', true);
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(25, 5, $pcaTable[0]["pca"], 'B', 0, 'C', true);

////////////////////////////////////////////////////////

    }

    public function MessaguePCG()
    {
        //DATA
        // $AreaData = GetAreaData();
        /////////////MENSAJE
        $this->Ln(8);
        $this->setX(30);
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(150, 5, 'DESGLOSE  DE LOS RESULTADOS OBTENIDOS EN LA PRUEBA DE CONOCIMIENTOS GENERALES ÁREA $$', 0, 0, 'C');

    }

    public function PrintPCG($ARRAYTAGS, $ID_INSCRITO, $MAXIMOS, $MINIMOS)
    {
        //DATA
        //$PCGData = GetPCGData();

        //TABLA
        $i            = 0;
        $pdf          = new PDF();
        $pcgTAGS      = $ARRAYTAGS;
        $size         = sizeof($pcgTAGS);
        $headerTableD = array('', 'Asignaturas', 'Puntuación', ' Máxima', 'Mínima', 'esperada', 'Alcanzada', 'por el estudiante', 'por categoría');

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
    //LOGO UP
    public function SelloDGA()
    {
        $this->Image('selloDGA.png', 169, 200, 35, 35);

    }

    // Pie de página
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
        $this->Cell(150, 5, 'Coordinador (a) de Admisión', 0, 0, 'C');
        // Posición: a 1,5 cm del final
        $this->SetXY(25, -15);
        $this->SetFont('Courier', 'BI', 9);
        $this->Cell(0, 10, 'Fecha : ', 0, 0, 'L');
        // Posición: a 1,5 cm del final
        $this->SetXY(40, -15);
        $this->SetFont('Courier', 'BIU', 9);
        $this->Cell(0, 10, $datetime, 0, 0, 'L');
    }

}
/////////////////////////////////////////////////////////////
//TABLA D
$pcgAdmonPublicaTAGS = array('Contabilidad', 'Ciencias Politicas', 'Administración Pública', 'Matemática', 'Economía', 'PCG TOTAL');
$pcgCientificaTAGS   = array('Biología', 'Física', 'Química', 'Matemática', 'PCG TOTAL');
$pcgDerechoTAGS      = array('Filosofía', 'Historia', 'Geografía', 'Español', 'Gobierno', 'PCG TOTAL');
//$pdf->SetFont('Arial', 'B', 7);
//MINIMOS Y MAXIMOS
//MINIMOS
//ADMMINISTRACION PUBLICA
$pcgMaxAdmon   = array(10, 15, 25, 25, 25, 100);
$pcgMinixAdmon = array(7, 11, 17, 17, 17, 68);
//CIENTIFICA
$pcgMaxCientifica   = array(25, 25, 25, 25, 100);
$pcgMinixCientifica = array(17, 17, 17, 17, 68);
//DERECHO
$pcgMaxDerecho   = array(20, 15, 25, 20, 15, 100);
$pcgMinixDerecho = array(15, 11, 18, 15, 11, 70);
////////////////////////////////////////////////////////////////////////////////////////
//DECLARAR OBJETO DE CALSE PDF
// Creación del objeto de la clase heredada
$pdf = new PDF();
$j   = 0;

//////////////////////////////////////////////////////////////////////////
//Get Data from JS
$numInscrito = $_POST["idInscrito"];
//////////////////////////////////////////////////////////////////////
//GENERATE PDF DOCUMENT
//while ($j < $countInscritos) {
$pdf->AddPage('', 'Letter');
$pdf->PersonalData($numInscrito);
$pdf->Averages($numInscrito);
$pdf->PrintPCA($numInscrito);
////////////////////////////////////////////////////////////
$Area     = GetAreaData($numInscrito);
$typeArea = convert_object_to_array($Area);

if ($typeArea[0]["areap"] == 4) {
    $pdf->MessaguePCG();
    $pdf->printPCG($pcgCientificaTAGS, $numInscrito, $pcgMaxCientifica, $pcgMinixCientifica);

} else if ($typeArea[0]["areap"] == 6) {
    $pdf->MessaguePCG();
    $pdf->printPCG($pcgAdmonPublicaTAGS, $numInscrito, $pcgMaxAdmon, $pcgMinixAdmon);
} else if ($typeArea[0]["areap"] == 7) {
    $pdf->MessaguePCG();
    $pdf->printPCG($pcgDerechoTAGS, $numInscrito, $pcgMaxDerecho, $pcgMinixDerecho);
}
///////////////////////////////////////////////////////////
$pdf->SelloDGA();
$j++;
}
/////////////////////////////////////////////////////////////////////////

    date_default_timezone_set("America/Panama"); //ZONA HORARIA PAN
    $datetime = date("d-m-Y_h_i_s_A");
    $pdf->Output('../../../../modulos/Certificaciones_' . $datetime . '.pdf', 'F');
    echo "../modulos/Certificaciones_" . $datetime . ".pdf";

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //FUNCTIONDEPRECATE
    function validatedd_PCG($N_INSCRITO)
{
        //TABLA D
        $pcgAdmonPublicaTAGS = array('Contabilidad', 'Ciencias Politicas', 'Administración Pública', 'Matemática', 'Economía', 'PCG TOTAL');
        $pcgCientificaTAGS   = array('Biología', 'Física', 'Química', 'Matemática', 'PCG TOTAL');
        $pcgDerechoTAGS      = array('Filosofía', 'Historia', 'Geografía', 'Español', 'Gobierno', 'PCG TOTAL');
//$pdf->SetFont('Arial', 'B', 7);
        //MINIMOS Y MAXIMOS
        //MINIMOS
        //ADMMINISTRACION PUBLICA
        $pcgMaxAdmon   = array(10, 15, 25, 25, 25, 100);
        $pcgMinixAdmon = array(7, 11, 17, 17, 17, 68);
//CIENTIFICA
        $pcgMaxCientifica   = array(25, 25, 25, 25, 100);
        $pcgMinixCientifica = array(17, 17, 17, 17, 68);
//DERECHO
        $pcgMaxDerecho   = array(20, 15, 25, 20, 15, 100);
        $pcgMinixDerecho = array(15, 11, 18, 15, 11, 70);
////////////////////////////////////////////////////////////////////////////////////////

        $Area     = GetAreaData($N_INSCRITO);
        $typeArea = convert_object_to_array($Area);
        switch ($typeArea[0]["areap"]) {
            case 4:
                $pdf->MessaguePCG();
                $pdf->printPCG($pcgCientificaTAGS, $N_INSCRITO, $pcgMaxCientifica, $pcgMinixCientifica);
                break;
            case 6:
                $pdf->MessaguePCG();
                $pdf->printPCG($pcgAdmonPublicaTAGS, $N_INSCRITO, $pcgMaxAdmon, $pcgMinixAdmon);
                break;
            case 7:
                $pdf->MessaguePCG();
                $pdf->printPCG($pcgDerechoTAGS, $N_INSCRITO, $pcgMaxDerecho, $pcgMinixDerecho);
                break;
            default:
                break;
        }
    }
