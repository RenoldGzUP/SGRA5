<?php
include_once ('./Scripts/classConexionDB.php');
openConnection();
include_once ('./Scripts/library_db_sql.php');
session_start();


// Notificar solamente errores de ejecución
error_reporting(E_ERROR | E_WARNING | E_PARSE);

	// data sent from form login.html 
	$user = $_POST['username']; 
	$password = md5($_POST['password']);
	// Query sent to database
	$result = getUser($user,$password);
	//var_dump($result)
	// Variable $hash hold the password hash on database
	$location= $result->type;

	
	/* 
	password_Verify() function verify if the password entered by the user
	match the password hash on the database. If everything is ok the session
	is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
	*/
	if ($result) {	

		if ($location == 1) {
		saveLogs($result->nombre_usuario,"Usuario inicio session"); 
		$_SESSION['loggedin'] = true;
		$_SESSION['name'] = $result->nombre_usuario;
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;						
		header("Location:./pages/dashboard.php");}

		elseif ($location == 2) {
		saveLogs($result->nombre_usuario,"Usuario inicio session"); 
		$_SESSION['loggedin'] = true;
		$_SESSION['name'] = $result->nombre_usuario;
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (100 * 60) ;						
		header("Location:./pagesAdm/dashboard.php");}

	} else {
		echo "<div class='alert alert-danger' role='alert'>Email or Password are incorrects!
		<p><a href='index.html'><strong>Please try again!</strong></a></p></div>";	

		header("Location:error.html");		
	}	
?>