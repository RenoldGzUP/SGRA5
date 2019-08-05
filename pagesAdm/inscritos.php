<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();
saveLogs($_SESSION['name'], "Usuario accedió a página inscritos");
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
//echo "Sesion  terminada,<a href='../index.html'>Necesita Hacer Login</a>";
    exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Renold Gonzalez">
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
    <script src="../JS/sorttable.js" ></script>
    <link rel="stylesheet" media="all" href="../Style/jquery.dataTables.min.css">
    <link rel="stylesheet" media="all" href="../Style/InscritosStyle.css">
    <script  type="text/javascript" src="../JS/jquery.dataTables.js"></script>
    <script src="../JS/Filtros.js"></script>
    <script src="../JS/inscritos_js.js"></script>
    <script src="../JS/tableEdit.js"></script>
    <!--    <script src="../JS/Editable table/custom_table_edit.js"></script>
    -->
  </head>
  <body>
    <div id="wrapper">
      <?php include '../modulos/userControl.php';?>
      <div class="container col-lg-12" style="margin-top: -18px">
        <h2></h2>
        <!--Panel de Filtros-->
         <?php include '../modulos/vars.php';?>
        <?php include '../modulos/panelFilter.php';?>
        <!---->
        <div class="panel panel-default " style="margin-top: -10px" >
          <div class="panel-heading" style="height: 40px">
            <?php include '../modulos/selectInscrito.php';?>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-fixed sortable">
              <thead >
                <tr style="font-size: 11px;text-align:center; color: #ffffff; background-color: #225ddb">
                  <th class="sorttable_nosort checkboxRow "  style="text-align: center;"> <input type="checkbox"  id="checkall" ></th>
                  <th class="integerRow" style="text-align: center;">#</th>
                  <th class="textRow" >Nombre</th>
                  <th class="textRow" >Apellido</th>
                  <th class="cidRow" >Cédula</th>
                  <th class="longIntegerRow" >Inscripción</th>
                  <th class="integerRow">Sede</th>
                  <th class="integerRow">Fac1A</th>
                  <th class="integerRow">Esc1A</th>
                  <th class="integerRow">Car1A</th>
                  <th class="integerRow">Fac2A</th>
                  <th class="integerRow">Esc2A</th>
                  <th class="integerRow">Car2A</th>
                  <th class="integerRow">Fac3A</th>
                  <th class="integerRow">Esc3A</th>
                  <th class="integerRow">Car3A</th>
                  <th class="sorttable_nosort actionRow">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <!--PHP
                <!--EMBEDED CODE -->
                <?php
if (isset($_REQUEST['idSearch'])) {
    //  echo "res ".$_REQUEST['idSearch'];
    include '../Scripts/searchInscritos.php';
    echo "</tbody>";
    echo "</table>";
} else if (!empty($_REQUEST['idSearch'])) {
    header('Location:inscritos.php');
} else {
    include '../Scripts/tableDataInscrito.php';
    include '../Scripts/paginatorInscrito.php';

}
?>
      </div>
    </div>
    <!-- MODALS-->
    <!-- Modal para editar Registros-->
    <div class="modal fade" id="tipoCertificaciones" role="dialog" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg" style="width: 1200px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Registro</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <table class="table table-bordered table table-hover">
                  <tbody id="studentTableEdit">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer" >
            <button id="sendTypeReport" type="button"  class="btn btn-default" data-dismiss="modal">Guardar</button>
          </div>
        </div>
      </div>
      </div> <!--fin MODAL-->
      <?php include '../modulos/modals.php';?>
      <!-- FIN  MODALS-->
    </div>
    </div><!-- /#page-wrapper -->
  </body>
</html>