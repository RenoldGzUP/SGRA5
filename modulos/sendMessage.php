<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');
//session_start();

			if (isset($_POST['enviar'])) {
				
				$nombre = $_SESSION['name'];
				$mensaje = $_POST['mensaje'];
				$consulta = saveChat($nombre,$mensaje);
				if ($consulta == true) {
					echo "<embed loop='false' src='../pagesAdm/beep.mp3' hidden='true' autoplay='true'>";
				}

			}

		?>