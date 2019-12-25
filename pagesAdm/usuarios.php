<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();
saveLogs($_SESSION['name'], "Usuario accedió a página de usuarios");
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

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistema de Gestión de Resultados Académicos</title>
  <!-- Bootstrap Core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript" src="../JS/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="../JS/bootstrap.js"></script>
  <link rel="stylesheet" media="all" href="../Style/jquery.dataTables.min.css">
  <link rel="stylesheet" media="all" href="../Style/UsuariosStyle.css">
  <script  type="text/javascript" src="../JS/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../js/sendId.js"></script>
  <script type="text/javascript" src="../JS/usuarios.js"></script>
  <script >
  $(document).ready(function() {
  $('#datatesterShow').DataTable({
  "iDisplayLength": 15,
  "aLengthMenu": [[15, 50, 100, -1], [15, 50, 100, "Todos"]]
  });
  } );
  $(document).ready(function() {
  $('#dataShow').DataTable({
  "iDisplayLength": 25,
  "aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]]
  });
  } );
  </script>
</head>
<body>
  <div id="wrapper">
    <?php include '../modulos/userControl.php';?>
    <div class="container col-lg-12" style="margin-top: -15px">
      <h2></h2>
      <div class="panel panel-default " >
        <div class="panel-body">
          <div  class="pull-right" style="margin-bottom: 15px">
            <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#registerUser"><span class="glyphicon glyphicon-user"></span> Nuevo Usuario</button>
            <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-list-alt"></span> Ver Registro</button>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="table-responsive" >
                <table id ="datatesterShow" class="table table-bordered table-hover table-striped" >
                  <thead>
                    <tr style="font-size: 11px;text-align:center; color: #ffffff; background-color: #225ddb">
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Usuario</th>
                      <th>Email</th>
                      <th>Tipo de Usuario</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
countRow();
$logs   = showRegistersUsers();
$record = 0;
if ($logs) {
    foreach ($logs as $item) {
        $record += 1;
        echo '<tr style="font-size: 12px;text-align:center;">';
        echo " <td>" . $record . "</td>";
        echo "<td>" . $item->name . "</td>";
        echo "<td>" . $item->lastname . "</td>";
        echo "<td>" . $item->nombre_usuario . "</td>";
        echo "<td>" . $item->email . "</td>";
        if ($item->type == 1) {
            echo "<td>Usuario Regular </td>";
        } elseif ($item->type == 2) {
            echo "<td>Administrador </td>";
        } elseif ($item->type == 3) {
            echo "<td>Usuario Especial </td>";
        } else {
            echo "<td>Sin determinar tipo</td>";
        }
        echo '<td><button type="button" onClick="editUser(\'' . $item->nombre_usuario . '\')"  class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span> </button>';
        echo '   ' . '<button type="button" onClick="openDeleteUserModal(\'' . $item->nombre_usuario . '\')" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span> </button>';
        echo '   ' . '<button type="button" onClick="changePwd(\'' . $item->nombre_usuario . '\')" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-lock"></span> </button>';
        echo '</td>';
        echo "</tr>";
    }
} else {
    echo '<tr ><td colspan="6" class="">No hay datos a mostrar</td></tr>';
}
?>
                </tbody>
              </table>
              </div><!-- /.table-responsive -->
            </div>
          </div>
          </div><!--Panel -->
          </div><!-- Panel Default-->
          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Registro de Actividad</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="table-responsive">
                        <table id ="dataShow" class="table table-bordered table-hover table-striped" style="font-size: 14px;text-align:center;">
                          <thead>
                            <tr style="font-size: 11px;text-align:center; color: #ffffff; background-color: #225ddb">
                              <th>#</th>
                              <th>Usuario</th>
                              <th>Fecha</th>
                              <th>Registro</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
$logs = showLogsUsers();
if ($logs) {
    foreach ($logs as $item) {
        echo '<tr style="font-size: 12px;text-align:center;">';
        echo " <td>" . $item->id_log . "</td>";
        echo "<td>" . $item->username . "</td>";
        echo "<td>" . $item->datelog . "</td>";
        echo "<td>" . $item->accion . "</td>";
        echo "</tr>";
    }
} else {
    echo '<tr ><td colspan="6" class="">No hay datos a mostrar</td></tr>';
}
?>
                          </tbody>
                        </table>
                        </div><!-- /.table-responsive -->
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal AGREGAR USUARIOS-->
            <div class="modal fade" id="registerUser" role="dialog" data-keyboard="false" data-backdrop="static">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" onClick="history.go(0)" VALUE="Refresh" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Plantilla de Usuario</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <form  id="editUpdateUser" action="../Scripts/insertNewUser.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                          <table class="table table-responsive" align="center">
                            <tbody id="fillUserUpdate">
                              <tr>
                                <td><label class="control-label">Nombre</label></td>
                                <td><input class="form-control" required  type="text" name="name" value="" /></td>
                              </tr>
                              <tr>
                                <td><label class="control-label">Apellido</label></td>
                                <td><input class="form-control" required  type="text" name="lastname" value="" /></td>
                              </tr>
                              <tr>
                                <td><label class="control-label">Nombre Usuario</label></td>
                                <td><input class="form-control" required  type="text" name="username"  placeholder="Formato [ nombre.apellido ] sin los parentesis" value="" /></td>
                              </tr>
                              <tr>
                                <td><label class="control-label">Email</label></td>
                                <td><input class="form-control" type="email" required   name="email"  value="" /></td>
                              </tr>
                              <tr>
                                <td><label class="control-label">Tipo de Usuario</label></td>
                                <td> <center>
                                  <label  class="checkbox-inline"><input id="usuarioRegular" required name="chkUser[]" type="checkbox" onclick="clickUsuario()" value="1" >Usuario Regular</label>
                                  <label  class="checkbox-inline"><input id="usuarioEspecial" required  name="chkUser[]" type="checkbox" onclick="clickUsuarioEspecial()"  value="3" >Usuario Especial</label>
                                  <label  class="checkbox-inline"><input id="administrador" required  name="chkUser[]"  type="checkbox" onclick="clickAdministrador()" value="2" >Administrador</label>
                                  </center>
                                </td>
                              </tr>
                              <tr id="permitionUser"  style="display: none;">
                                <td><label class="control-label">Seleccione Permisos</label></td>
                                <td > <center id="checkPages">
                                  <label  class="checkbox-inline"><input id="page1"  name="chkPage[]"  type="checkbox" onclick="return checkBoxOK()" value="1" >Inscritos</label>
                                  <label  class="checkbox-inline"><input id="page2"  name="chkPage[]"  type="checkbox" onclick="return checkBoxOK()"  value="2" >Certificacion</label>
                                  <label  class="checkbox-inline"><input id="page3"  name="chkPage[]"  type="checkbox" onclick="return checkBoxOK()"  value="3" >Validación</label>
                                  <label  class="checkbox-inline"><input id="page4"  name="chkPage[]" type="checkbox" onclick="return checkBoxOK()"  value="4" >Reportes</label>
                                  </center>
                                </td>
                              </tr>
                              <tr>
                                <td><label class="control-label">Contraseña</label></td>
                                <td><input  required  class="form-control" maxlength="8" size="8" type="password"  autocomplete="off" name="password"  value="" /></td>
                              </tr>
                              <tr>
                                <td colspan="2"> <div class="pull-right"> <button type="submit" name="btnsave" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button></div>  </td>
                              </tr>
                            </tbody>
                          </table>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div><!--MODAL ADD USER-->

            <!-- MODAL EDIT PWD-->
           <!--    <div class="modal fade" id="editPWD" role="dialog" data-keyboard="false" data-backdrop="static">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Cambiar contraseña</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <form  id="editUpdateUser" action="../Scripts/insertNewUser.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                          <table class="table table-responsive" align="center">
                            <tbody id="fillUserUpdate">
                              <tr>
                                <td><label class="control-label">Nueva Contraseña</label></td>
                                <td><input  required  class="form-control" maxlength="8" size="8" type="password"  autocomplete="off" name="password"  value="" /></td>
                              </tr>
                              <tr>
                                <td><label class="control-label">Repetir Contraseña</label></td>
                                <td><input  required  class="form-control" maxlength="8" size="8" type="password"  autocomplete="off" name="password"  value="" /></td>
                              </tr>
                              <tr>
                                <td colspan="2"> <div class="pull-right"> <button type="submit" name="btnsave" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button></div>  </td>
                              </tr>
                            </tbody>
                          </table>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div><!--MODAL ADD USER-->
 -->


              <!---->

              <div class="modal fade" id="changePassword" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Cambiar Contraseña</h4>
                    </div>
                    <div class="modal-body">
                              <center>
                               <button id="restorePwdBtt" value=""  type="button"  class="btn btn-default"  onclick="resetPwd()">Restaurar contraseña</button>
                              </center>
                    </div>
                  </div>
                </div>
              </div>

              <?php include '../modulos/modals.php';?>
              </div><!-- /#wrapper -->
              </div>
            </body>
          </html>