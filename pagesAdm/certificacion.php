<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();
saveLogs($_SESSION['name'], "Usuario accedió a página certificaciones");

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
//echo "Su sesion a terminado,<a href='../index.html'>Necesita Hacer Login</a>";
    echo "<script>location.href='../noAccess.html'</script>";
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
    <meta name="Renold Gonzalez" content="">

    <title>Sistema de Gestión de Resultados Académicos</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!--Custom CSS-->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../JS/jquery-3.3.1.min.js"></script>
    <script  type="text/javascript" src="../JS/jquery.dataTables.js"></script>
    <script  type="text/javascript" src="../JS/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="../JS/bootstrap.js"></script>
    <link rel="stylesheet" media="all" href="../Style/jquery.dataTables.min.css">
    <link rel="stylesheet" media="all" href="../Style/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" media="all" href="../Style/ResultadosStyle.css">
    
    <link rel="stylesheet" media="all" href="../Style/jquery.dataTables.min.css">
    
    <script src="../JS/Filtros.js"></script>
    <script src="../JS/tableResultados_old.js"></script>
    <script src="../JS/getCheckedRow.js"></script>
    <script src="../JS/export_register_general.js"></script>
     <script src="../JS/tableEdit.js"></script>
    <!--<script src="../JS/tableEdit.js"></script>-->

</head>

<body>

    <div id="wrapper">

     <?php include '../modulos/userControl.php';?>

<div class="container col-lg-12" style="margin-top: -18px">
  <h2></h2>
  <!--Panel de Filtros-->
      <?php include '../modulos/panelFilter.php';?>
  <!---->
  <div class="col-lg-12 table-responsive">
    <table id="tableresultados" class="table table-bordered table-hover table-fixed select">
      <thead style="font-size: 12px;text-align:center; color: #ffffff; background-color: #225ddb">
       <tr>
        <th> <input type="checkbox"  id="resultados_checkall" ></th>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Cédula </th>
        <th>Inscripción</th>
        <th>Sede</th>
        <th>Fac1A</th>
        <th>Esc1A</th>
        <th>Car1A</th>
        <th>PS</th>
        <th>PCA</th>
        <th>PCG</th>
        <th>GATB</th>
        <th>A.Verbal</th>
        <th>A.Numérica</th>
        <th>Índice</th>
        <th>Acciones</th>
      </tr>
    </thead>
      <tbody >
</tbody>
</table>

    </div>

</div>

<!-- /.modal- para eliminar registro     -->
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          <h4 class="modal-title custom_align" id="Heading">Borrar Registro</h4>
        </div>

        <div class="modal-body">
         <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span>  ¿Desea borrar el registro seleccionado?</div>
       </div>

       <div class="modal-footer ">
        <button type="button" id ="del" class="btn btn-default" ><span class="glyphicon glyphicon-ok-sign"></span> SI</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> NO</button>
      </div>

    </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  </div>
<!-- /.modal. para eliminar registro Fin -->

 <!-- Modal -->
  <div class="modal fade" id="tipoCertificaciones" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tipo de Certificación a generar: </h4>
        </div>
        <div class="modal-body">

        <div id="certType" >
          <center>
             <label  class="checkbox-inline"><input id="signature_type1" type="checkbox" value="1" onclick="checkBoxToSignature()">Coordinador de Admisión </label>
          <label  class="checkbox-inline"><input id="signature_type2" type="checkbox" value="2" onclick="checkBoxToSignature()"  >Director de Admisión</label>
          </center>
        </div>
        </div>
        <div class="modal-footer">
          <button id="sendTypeReport" onclick="startF()" type="button" class="btn btn-default" data-dismiss="modal">Continuar</button>
        </div>
      </div>
    </div>
  </div>

  <?php include '../modulos/modals.php';?>

<!-- /.modal. para eliminar registro Fin -->

</div>
        <!-- /#page-wrapper -->


</body>

</html>
