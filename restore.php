<?php
include 'Scripts/restorePWD.php';

?>

<!DOCTYPE html>
<html lang="es">

<html>
	<head>
		<title>Restaurar Contraseña</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="login/css/bootstrap.min.css" >
		<link rel="stylesheet" href="login/css/bootstrap-theme.min.css" >
		<script type="text/javascript" src="./JS/jquery-3.3.1.min.js"></script>
		<script src="./JS/bootstrap.min.js" ></script>

	</head>

	<body>

		<div class="container">

			<div class="row" style="margin-top:75px;">
				<div class="col-sm-12">
<?php

if (is_string($error_msg)) {
    echo '<div class="alert alert-danger alert-dismissable" id="flash-msg">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<h4><i class="icon fa fa-check"></i>' . $error_msg . '</h4>
</div>';
} elseif (is_string($action_msg)) {
    echo '<div class="alert alert-success alert-dismissable" id="flash-msg">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<h4><i class="icon fa fa-check"></i>' . $action_msg . '</h4>
</div>';
} else {

}

?>			</div>
			</div>

</div>


			<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-primary" >
					<div class="panel-heading">
						<div class="panel-title">Cambiar Contraseña</div>
					</div>
					<div style="padding-top:20px" class="panel-body" >
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						<form  class="form-horizontal" action="restore.php" method="POST" >

							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="username" type="text" class="form-control" name="username" value="" placeholder="Nombre de Usuario" required>
							</div>
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
								<input id="password_key" type="password" autocomplete="off" class="form-control" name="password_restore" placeholder="Contraseña de Respaldo" required>
							</div>
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input id="password_a" type="password" autocomplete="off" class="form-control" name="password_a" placeholder="Nueva Contraseña" required>
							</div>
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input id="password_b" type="password" autocomplete="off" class="form-control" name="password_b" placeholder="Repetir Contraseña" required>
							</div>

							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls " align="center">
								<button  name="Submit" type="submit" value="LOGIN"  class="btn btn-success">Actualizar contraseña</a>
							</div>
						  </div>
					   </form>
					   <div class="pull-right">
						<a href="index.html" >Salir</a>
					</div>

				</div>
			</div>
		</div>


	</div>

</body>
</html>
