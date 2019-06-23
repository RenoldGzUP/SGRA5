<?php
$start= 0;
$finish = 100;
$percent = 4;

$maxFiles = 10000;

while ( $percent <= 100) {
	//sleep(2);
	$linesDo= ($maxFiles * $percent)/100;

	echo "Lineas Procesadas ->".$linesDo." -- "."Porcentaje ".$percent ;
	echo "<br>";
	$percent = $percent + 2;
}


?>