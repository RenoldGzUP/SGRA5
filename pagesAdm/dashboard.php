<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();
saveLogs($_SESSION['name'], "Usuario accedió a página principal");
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
    header('Location:../index.html');
    //  echo "Esta pagina es solo para usuarios registrados.<br>";
    // echo "<br><a href='login.html'>Login</a>";
    //echo "<br><br><a href='index.html'>Registrarme</a>";//
    exit;
}

$now = time();
if ($now > $_SESSION['expire']) {
    session_destroy();
    echo "<script>location.href='../noAccess.html'</script>";
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Renold González">

    <title>Sistema de Gestión de Resultados Académicos</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href="../Style/chat.css" rel="stylesheet" type="text/css">
     <link href="../Style/dashboard.css" rel="stylesheet" type="text/css">
     <script src="../JS/chatQueryReader.js"></script>
</head>

<body>

    <div id="wrapper">

<!--AQUÍ VA EL MENU DE USUARIO CON PHP-->
 <?php include "../modulos/userControl.php";?>
          <div class="container col-lg-8" style="margin-top: 10px" >
              <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                </div>
                <div class="body-chat" onload="ajax();">
                  <!--Lista de mensajes-->
                    <ul id="chat" class="chat">

                    </ul>
                </div>

                <div class="panel-footer">
                    <div class="input-group">
                      <form class="form-inline" method="post" action="dashboard.php">

                     <div class="form-group mx-sm-3 mb-2">
                      <input type="text"  name="mensaje"  size="110" class="form-control" id="inputPassword2" placeholder="Mensaje a enviar ">
                     </div>

                        <button title="Enviar Mensaje" type="submit" name="enviar" class="btn btn-primary mb-2">Enviar</button>
                     </form>

                      <?php
include '../modulos/sendMessage.php';
?>


                    </div>
                </div>
            </div>

          </div>

          <div class="container col-lg-4" style="margin-top: -10px">
            <h2></h2>
            <div class="panel panel-default " >
              <div class="panel-heading">Ayuda</div>
              <div class="panel-body">

                <ol>
                  <li><a href="../help/indexA.html" target="_blank">¿Cómo generar una Certificación de resultados?</a></li>
                  <li><a href="../help/indexB.html" target="_blank">¿Cómo se crea un reporte académico?</a></li>
                  <li><a href="../help/indexC.html" target="_blank">¿Cómo validar a un estudiante con resultados del año anterior?</a></li>
                  <li><a href="../help/indexD.html" target="_blank"> ¿Cómo generar Certificaciones autorizadas por el Director o Coordinador de Admisión?</a></li>
                  <li><a href="../help/indexE.html" target="_blank">¿Cómo editar o eliminar registros?</a></li>
                  <li><a href="../help/indexF.html" target="_blank">¿Qué ocurre con los registros duplicados?</a></li>
                  <li><a href="../help/user_manual_download.pdf" target="_blank">Descargar Manual Portable de Ayuda para el Usuario</a></li>

                </ol>



              </div>

            </div>
          </div>

           <div class="container col-lg-4" style="margin-top: -15px">
            <h2></h2>
            <div class="panel panel-default " >
              <div class="panel-heading">Sobre el sistema</div>
              <div class="panel-body">

                <ul style="list-style-type:none;">
                <li>Sistema de Gestión de Resultados Académicos </li>
                <li>Versión 1.0.72 PROP</li>
                <li>Autor : Renold M . González</li>
                <li>Año de Administración: 2017-2018</li>

                </ul>



              </div>

            </div>
          </div>

        </div>
        <!-- /#page-wrapper -->

 
</body>
</html>
