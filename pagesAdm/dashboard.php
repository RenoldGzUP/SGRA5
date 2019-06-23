<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');
session_start();
saveLogs($_SESSION['name'],"Usuario accedió a página principal");
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} 
else {
  header('Location:../index.html');
 //  echo "Esta pagina es solo para usuarios registrados.<br>";
  // echo "<br><a href='login.html'>Login</a>";
   //echo "<br><br><a href='index.html'>Registrarme</a>";//
exit;
}

$now = time();
if($now > $_SESSION['expire']) {
session_destroy();
echo "<script>location.href='../noAccess.html'</script>";
exit;
}


?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de gestión de resultados academicos</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    #vertical-bar {
        border-left: 2px solid #ffffff;
        width:2px;
        height:65px;
        margin-left: 265px;
      
    }
</style>

<script type="text/javascript">
    function ajax(){
      var req = new XMLHttpRequest();

      req.onreadystatechange = function(){
        if (req.readyState == 4 && req.status == 200) {
          document.getElementById('chat').innerHTML = req.responseText;
        }
      }

      req.open('GET', '../modulos/chatDashboard.php', true);
      req.send();
    }

    //linea que hace que se refreseque la pagina cada segundo
    setInterval(function(){ajax();}, 1000);
  </script>



</head>

<body>

    <div id="wrapper">

  <?php
  include '../modulos/header.php';
  ?>
       
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

                        <button type="submit" name="enviar" class="btn btn-primary mb-2">Enviar</button>
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
              <div class="panel-heading">Artículos de Ayuda</div>
              <div class="panel-body">

                <ol>
                  <li><a href="../help/index.html" target="_blank"> Generar Certificaciones</a></li>
                  <li><a href="">Generar Reportes</a></li>
                  <li><a href="">Generar Validación Usuarios</a></li>
                  <li><a href="">Generar Certificacion Director o Coordinador</a></li>
                  <li><a href="">Como editar o eliminar registros?</a></li>
                  <li><a href="">Que ocurre con los registros duplicados</a></li>
                  <li><a href="">Manual General de Ayuda para el Usuario</a></li>

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
                <li>Sistema de Gestión de Resultados Academicos </li>
                <li>Version 1.0.25 ST</li>
                <li>Autor : Renold M . González</li>
                <li>Todos los derechos reservados</li>
                <li>2019-2020</li>

                </ul>  
               

                
              </div>

            </div>
          </div>

        </div>
        <!-- /#page-wrapper -->

      </div>
      <!-- /#wrapper -->


</body>

</html>
