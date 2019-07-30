<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();
saveLogs($_SESSION['name'], "Usuario accedió a página validación");
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
//  echo "Su sesion a terminado,<a href='../index.html'>Necesita Hacer Login</a>";
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
  <link rel="stylesheet" media="all" href="../Style/ValidacionStyle.css">
  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="../JS/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="../JS/bootstrap.js"></script>
  <script type="text/javascript" src="../JS/validationUser.js"></script>
</head>
<body>
  <div id="wrapper">
    <?php
include '../modulos/userControl.php';
?>
    <div class="container col-lg-12">
      <div class="alert alert-info alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Información Importante!</strong> Una vez iniciado el proceso de validación , se habilitarán los botones en orden.
      </div>
      <div id="alertValidar" class="alert alert-success alert-dismissible fade in" style="display:none;">
        <a href="#" class="close"  data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Se han encontrado registros,el botón de Validar se ha habilitado!</strong> .
      </div>
      <div  id="alertDocumento" class="alert alert-info alert-dismissible fade in" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Validación Aceptada!, </strong> Se habilitará el botón para generar la Certificación de Validación
      </div>
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">Validación de Resultados - Año Anterior </div>
          <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" >
              <table class="table" style="font-size: 11px;">
                <tr>
                  <th>
                    <center>
                    Tabla Inscritos: <select  id="tablaInscritos"  name="tableIns" style="width:200px;margin-left:25px">
                      <option  selected value="0">Seleccione Tabla</option>
                      <?php
$listasDB = getTablesList();
foreach ($listasDB as $item) {
    if (preg_match("/inscritos2/", $item->Tables_in_sgra)) {
        echo "<option value='$item->Tables_in_sgra'>" . $item->Tables_in_sgra . "</option> ";
    }
}
?>
                    </select>
                    </center>
                  </th>
                  <th>
                    <center>
                    Tabla Inscritos: <select  id="tablaResultados"  name="tableRes" style="width:200px;margin-left:25px">
                      <option selected value="0">Seleccione Tabla</option>
                      <?php
$listasDB = getTablesList();
foreach ($listasDB as $item) {
    if (preg_match("/resultados2/", $item->Tables_in_sgra)) {
        echo "<option value='$item->Tables_in_sgra'>" . $item->Tables_in_sgra . "</option> ";
    }
}
?>
                    </select>
                    </center>
                  </th>
                  <th>
                    <center>
                    Núm.Inscrito: <input id="idSearch" type="text" name="FirstName" >
                    </center>
                  </th>
                  <th>
                    <center>
                    <button id="SearchBtt" type="button" onClick="sendIDSearch()"  class="btn btn-default btn-sm"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                    <button type="MeasuringBtt" disabled  class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus"></span> Recalcular</button>
                    <button id="ValidateBtt" disabled type="button"  onClick="sendIDValidate()"  class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-ok"></span> Validar</button>
                    <button id="TalliesBtt" disabled type="button" class="btn btn-info btn-sm " ><span class="glyphicon glyphicon-list-alt"></span> Generar Certificación</button>
                    </center>
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
                  <tr ><td colspan="17" class="">No  se ha iniciado ninguna validación</td></tr>
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
                    <th>P.S</th>
                    <th>PCA</th>
                    <th>PCG</th>
                    <th>GATB</th>
                    <th>A.Verbal</th>
                    <th>A.Numerica</th>
                    <th>Ind.Predictivo</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="taInscritosResultado">
                  <tr ><td colspan="17" class="">No  se ha iniciado ninguna validación</td></tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include '../modulos/modals.php';?>
  </div>
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
</body>
</html>