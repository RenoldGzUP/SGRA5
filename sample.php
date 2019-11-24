<?php

$lista= array("Nombre","Apellido","Animal","Fruto");
$fp = fopen('fichero.csv', 'w');

foreach ($lista as $campos) {
    fputcsv($fp, $campos);
}

fclose($fp);
?>