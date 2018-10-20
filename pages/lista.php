<?php
include_once'config.php';
$link = Conectarse(); 
$sqlL1 ="SELECT id_sede,codigo_sede,nombre_sede from sedes";	
$result = mysqli_query($link,$sqlL1);
echo'<select name="Sedes">';
echo"<option >Seleccione</option>";
		while($row = mysqli_fetch_array($result)){
			   echo"<option value='.$row[0].'>".$row[1]."-".$row[2]."</option> ";
		}
echo"</select>";
?>