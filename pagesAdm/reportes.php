<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();
saveLogs($_SESSION['name'], "Usuario accedió a página reportes");

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
//echo "Su sesion a terminado,<a href='../index.html'>Necesita Hacer Login</a>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
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


  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="../JS/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="../JS/bootstrap.js"></script>
  <link rel="stylesheet" media="all" href="../Style/jquery.dataTables.min.css">
  <link rel="stylesheet" media="all" href="../Style/ReportesStyle.css">
  <script  type="text/javascript" src="../JS/jquery.dataTables.js"></script>
  <script src="../JS/Filtros.js"></script>
  <script src="../JS/tableResultadosReportes.js"></script>
  <!--<script src="../JS/getCheckedRow.js"></script>-->


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
    <?php
include '../modulos/userControl.php';
?>

    <div class="container col-lg-12" style="margin-top: -20px">
      <h2></h2>
      <!--Panel de Filtros-->
      <?php include '../modulos/panelFilter.php';?>
  <!---->

       <div  class="col-lg-12" style="margin-top: 15px">
         <table id="tableReportes" class="table table-bordered table-hover table-editable">
          <thead style="text-align:center;width: : 10px;background: #225ddb" >
           <tr style="font-size: 11px;text-align:center; color: #ffffff">
            <th style="text-align: center;">#</th>
            <th>APELLIDO</th>
            <th>NOMBRE</th>
            <th>Cédula</th>
            <th>SEDE</th>
            <th>ÁREA</th>
            <th>P/S</th>
            <th>GATB</th>
            <th>PCA</th>
            <th>ÍNDICE</th>
            <th>VERBAL</th>
            <th>NUMERICA</th>
          </tr>
        </thead>

        <tbody >
          <!--EMBEDED CODE -->
        </tbody>
        </table>
        <div >
          <center style="margin-top: -15px">
            <button id="buttongReportes" type="button" disabled class="btn btn-default btn-lg" data-toggle="modal" data-target="#typereporte"><span class="glyphicon glyphicon-list-alt"   ></span> Generar reporte de resultados</button>
            <a id="downloadFile" href="#" download class="btn btn-default btn-lg" style="display: none;"><span class="glyphicon glyphicon-fullscreen"></span> Ver Documento</a>
            <!--  <button id="downloadFile" href="#" target="_blank" type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-fullscreen"></span> Ver Reporte</button> -->
          </center>
        </div>

      </div>


    </div>

   <!--MODALS FILE PHP-->
   <?php include '../modulos/modals.php';?>
   <!-- -->
  </div><!-- /#wrapper -->
</body>

</html>
