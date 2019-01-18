<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');
session_start();
saveLogs($_SESSION['name'],"Usuario accedió a página validación");

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
  echo "Su sesion a terminado,<a href='../index.html'>Necesita Hacer Login</a>";
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

       <script type="text/javascript" src="../JS/validationUser.js"></script>

      <style>
      #vertical-bar {
        border-left: 2px solid #ffffff;
        width:2px;
        height:65px;
        margin-left: 265px;

      }
    </style>



  </head>

  <body>

    <div id="wrapper">

      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background: #003366">

        <div class="navbar-header"> 
         <img src="../images/LogoUp.png" align="left" alt="logo" style="width:60px;margin-top: 5px;margin-left: 20px;margin-bottom: 5px">

         <div style="margin-top: 13px;margin-left: 85px">
          <p style="color: #ffffff;font-size: 18px;font-family: Calisto MT">UNIVERSIDAD DE</p>
          <p style="color: #ffffff;font-size:36px;margin: -3.2% 0;font-family: Calisto MT">PANAMÁ</p>
          <p style="color: #ffffff;margin: 0.08% 0;margin-left: 190px;margin-top: -69px">Vicerrectoría Academica</p>
          <p style="color: #ffffff;margin: 0.08% 0;margin-left: 190px;">Dirección General de Admisión</p>
          <p style="color: #ffffff;margin: 0.08% 0;margin-left: 190px;">Sistema de gestión de resultados academicos</p>
        </div> 

        <div id="vertical-bar" style="margin-top:-65px;"></div>

      </div>
      <!-- /.navbar-header -->

      <ul class="nav navbar-top-links navbar-right" style="margin-top: 42px">
       <p style="color: #ffffff;margin-right: 30px;margin-top: 10px" >Bienvenido <?php echo $_SESSION['name']; ?> &nbsp     | &nbsp
        <?php echo date('l, F jS, Y'); ?>
        &nbsp|&nbsp <b><a href="../logout/logout.php" style="color:#ffff00";>Salir</a></b></p>
      </ul> 


    </nav>


    <!--<div class="container-fluid " >-->
      <nav class="navbar" align="center" style="background: #d6d5d5;min-height: 25px;;margin-top: -1px" >
        <a href="dashboard.php" style="width: 145px" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-home"></span> Inicio</a>
        <a href="inscritos.php"  style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm">Inscritos</a>
        <a href="certificacion.php"  style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm">Certificación</a>
        <a style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm disabled">Validación</a>
        <a href="reportes.php"  style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm">Reportes</a>
      </nav>
      <!--   </div>-->

      <div class="container col-lg-12">
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">Validación de Resultados - Año Anterior </div>
            <div class="panel-body">

              <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" > 
                <table class="table table-bordered" style="font-size: 11px;">

                  <tr>

                    <th>Tabla Inscritos: <select  id="tablaInscritos"  name="tableIns" style="width:200px;margin-left:25px">
                      <option  selected value="0">Seleccione Tabla</option>
                      <?php
                      $listasDB = getTablesList(); 
                      foreach($listasDB as $item){
                        if (preg_match("/inscritos/",$item->Tables_in_sgra)){
                          echo "<option value='$item->Tables_in_sgra'>".$item->Tables_in_sgra."</option> ";
                        }
                      }  
                      ?> 
                    </select>
                  </th>

                    <th>Tabla Inscritos: <select  id="tablaResultados"  name="tableRes" style="width:200px;margin-left:25px">
                      <option selected value="0">Seleccione Tabla</option>
                      <?php
                      $listasDB = getTablesList(); 
                      foreach($listasDB as $item){
                        if (preg_match("/resultados/",$item->Tables_in_sgra)){
                          echo "<option value='$item->Tables_in_sgra'>".$item->Tables_in_sgra."</option> ";
                        }
                      }  
                      ?> 
                    </select>
                  </th>

                    <th>First name: <input id="idSearch" type="text" name="FirstName" value="Mickey"></th>

                    <th>
                      <button type="button" onClick="sendIDSearch()"  class="btn btn-default btn-sm"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                      <button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok"></span> Validar</button>
                      <button type="button" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-list-alt"></span> Generar Certificación</button>
                    </th>

                    </tr>

                  </table>



                </form>
              </div>
            </div>
            <div class="panel panel-default">

              <div class="panel-body">
                <h5><b>Tabla Inscritos 2018</b></h5>

                <div class="container col-lg-12">     
                  <table class="table table-bordered" style="font-size: 11px;">
                          <thead style="text-align:center;width: : 10px;background: #225ddb" >
  <tr style="font-size: 11px;text-align:center; color: #ffffff">
     <th style="text-align: center;"> <input type="checkbox"  id="checkall" ></th>
        <th style="text-align: center;">#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th style="width:70px;" >Cédula</th>
        <th>Inscripción</th>
        <th>Sede</th>
        <th>Fac1A</th>
        <th>Esc1A</th>
        <th>Car1A</th>
        <th>Fac2A</th>
        <th>Esc2A</th>
        <th>Car2A</th>
        <th>Fac3A</th>
        <th>Esc3A</th>
        <th>Car3A</th>
        <th>Acciones</th>
       </tr>
    </thead>
                    <tbody id="taInscritosInscritos">
                         <tr ><td colspan="17" class="">No  se ha iniciado ninguna validacion</td></tr>
                    </tbody>
                  </table>
                </div>

              </div>
            </div> 
            <div class="panel panel-default">
              <div class="panel-body">
               <h5><b>Tabla Resultados 2018</b></h5>

               <div class="container col-lg-12">     
                <table class="table table-bordered" style="font-size: 11px;">
                <thead style="text-align:center;width: : 10px;background: #225ddb" >
  <tr style="font-size: 11px;text-align:center; color: #ffffff">
     <th style="text-align: center;"> <input type="checkbox"  id="checkall" ></th>
        <th style="text-align: center;">#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th style="width:70px;" >Cédula</th>
        <th>Inscripción</th>
        <th>Sede</th>
        <th>Fac1A</th>
        <th>Esc1A</th>
        <th>Car1A</th>
        <th>Fac2A</th>
        <th>Esc2A</th>
        <th>Car2A</th>
        <th>Fac3A</th>
        <th>Esc3A</th>
        <th>Car3A</th>
        <th>Acciones</th>
       </tr>
    </thead>
                  <tbody id="taInscritosResultado">
                    <tr ><td colspan="17" class="">No  se ha iniciado ninguna validacion</td></tr>
                  </tbody>
                </table>
              </div>


            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true
    });
  });
</script>

</body>

</html>
