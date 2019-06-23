<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');
session_start();

//include "db.php";
	///consultamos a la base
	//$consulta = "SELECT * FROM chat ORDER BY id DESC";
	//$ejecutar = $conexion->query($consulta);
	$chatData= showChat(); 
	$fila = convert_object_to_array($chatData);
	$leng = sizeof($fila);
	$i = 0;

	if ($leng > 0 ) {
		while($i < $leng) :

		echo '<li id="guest" class="left clearfix"><span class="chat-img pull-left">';
		echo '<img src="../images/user.png" width="45" height="45" align="middle" hspace="20" vspace="10" alt="User Avatar" class="img-circle" /> ';
		echo "</span>";
		echo '<div class="chat-body clearfix">';
		echo '<div class="header">';
		echo '<p style ="margin-top: 15px"><b >'.$fila[$i]['nombre'].'</b> </p> <small class="pull-right text-muted" style="margin-right:10px">';
		echo '<span class="glyphicon glyphicon-time"></span>'.$fila[$i]['fecha'].'</small>';
		echo '</div>';
		echo "<p>  ". $fila[$i]['mensaje']."</p>";
		echo "</div>";
		echo "</li>";
		$i = $i +1;
		endwhile;
		
	}


 ?>


