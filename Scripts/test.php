<?php
include_once 'classConexionDB.php';
openConnection();
include_once 'library_db_sql.php';

$otra_cosa = '009353';

//var_dump($itemKey);
//echo "$itemKey"."</br>";
$Ar = areaEstudiante($otra_cosa);
//$Areas = getDataIndividual($itemKey);
var_dump($Ar);
echo "";
