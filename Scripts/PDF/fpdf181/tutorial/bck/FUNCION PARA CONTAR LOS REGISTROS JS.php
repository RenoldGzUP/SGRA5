//Get Data from JS
//Convert the POST info to array using explode
$numInscrito = explode(",", $_POST["idInscrito"]);
//Files inside Array
$countInscritos = count($numInscrito);

//Replay control CERTIFICATIONS

while ($j < $countInscritos) {
    $pdf->AddPage('', 'Letter');
    $pdf->PersonalData($numInscrito[$j]);
    $pdf->Averages($numInscrito[$j]);
    $pdf->PrintPCA($numInscrito[$j]);
    $pdf->MessaguePCG($numInscrito[$j]);
    $pdf->printPCG($pcgAdmonPublicaTAGS, $numInscrito[$j]);
    $pdf->SelloDGA();
    $j++;
}
