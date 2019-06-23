<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once('classConexionDB.php');
openConnection();
include_once('library_db_sql.php');

$i = 0;
$counter = 0;

if (isset($_REQUEST['sedes'])) {

$estResultado = getDataReportV1($_REQUEST['sedes']);
$dSedes = convert_object_to_array($estResultado);

	if (isset($dSedes)) {
		$leng = sizeof($dSedes);

	while ( $i < $leng ) {
		$counter = $counter + 1;
		 echo'<tr id="row'.$dSedes[$i]['n_ins'].'" style="font-size: 11px;text-align:center">';
		   echo "<td> ".$counter. " </td>";
		    echo '<td>'.$dSedes[$i]['apellido'].'</td>';
		     echo '<td>'.$dSedes[$i]['nombre'].'</td>';
		      echo '<td>'.$dSedes[$i]['cedula'].'</td>';
		       echo '<td>'.$dSedes[$i]['sede'].'</td>';
		       echo '<td>'.$dSedes[$i]['areap'].'</td>';
		       echo '<td>'.$dSedes[$i]['facultad'].'</td>';
		       echo '<td>'.$dSedes[$i]['ps'].'</td>';
		        echo '<td>'.$dSedes[$i]['gatb'].'</td>';
		         echo '<td>'.$dSedes[$i]['pca'].'</td>';
		          echo '<td>'.$dSedes[$i]['indice'].'</td>';
		           echo '<td>'.$dSedes[$i]['verbal'].'</td>';
		            echo '<td>'.$dSedes[$i]['numer'].'</td>';     
		             echo"</tr>";
		             $i = $i +1 ;
	}

	}else
	{
		echo'<tr><td colspan="17" style="text-align: center;" >No hay datos para Sede '.$_REQUEST['sedes'].'</td></tr>';
	}



}else if (isset($_REQUEST['sedes']) && isset($_REQUEST['areas'])) {
	
	$estResultado = getDataReportV2($_REQUEST['sedes'],$_REQUEST['areas']);
	$dSedes = convert_object_to_array($estResultado);

	if (isset($dSedes)) {
		$leng = sizeof($dSedes);

	while ( $i < $leng ) {
		$counter = $counter + 1;
		 echo'<tr id="row'.$dSedes[$i]['n_ins'].'" style="font-size: 11px;text-align:center">';
		   echo "<td> ".$counter. " </td>";
		    echo '<td>'.$dSedes[$i]['apellido'].'</td>';
		     echo '<td>'.$dSedes[$i]['nombre'].'</td>';
		      echo '<td>'.$dSedes[$i]['cedula'].'</td>';
		       echo '<td>'.$dSedes[$i]['sede'].'</td>';
		       echo '<td>'.$dSedes[$i]['areap'].'</td>';
		       echo '<td>'.$dSedes[$i]['facultad'].'</td>';
		       echo '<td>'.$dSedes[$i]['ps'].'</td>';
		        echo '<td>'.$dSedes[$i]['gatb'].'</td>';
		         echo '<td>'.$dSedes[$i]['pca'].'</td>';
		          echo '<td>'.$dSedes[$i]['indice'].'</td>';
		           echo '<td>'.$dSedes[$i]['verbal'].'</td>';
		            echo '<td>'.$dSedes[$i]['numer'].'</td>';     
		             echo"</tr>";
		             $i = $i +1 ;
	}

	}else
	{
		echo'<tr><td colspan="17" style="text-align: center;" >No hay datos para Sede '.$_REQUEST['sedes'].'</td></tr>';
	}


	
}
else if (isset($_REQUEST['sedes']) && isset($_REQUEST['areas']) && isset($_REQUEST['facultades'])) {

	
}
else
{
	echo'<tr><td colspan="17" style="text-align: center;" > Genere reportes a partir del filtrado de datos</td></tr>';

}


?>