<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');
session_start();
saveLogs($_SESSION['name'],"Usuario accedió a página de usuarios");
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
  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript" src="../JS/jquery-3.3.1.min.js"></script>
   <script type="text/javascript" src="../JS/bootstrap.js"></script>
  <link rel="stylesheet" media="all" href="../Style/jquery.dataTables.min.css">
  <script  type="text/javascript" src="../JS/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../js/sendId.js"></script>


  <style>
  #vertical-bar {
    border-left: 2px solid #ffffff;
    width:2px;
    height:65px;
    margin-left: 265px;

  }
</style>



<script >
  $(document).ready(function() {
    $('#datatesterShow').DataTable({
      "iDisplayLength": 15,
      "aLengthMenu": [[15, 50, 100, -1], [15, 50, 100, "Todos"]]
    });
  } );


   $(document).ready(function() {
    $('#dataShow').DataTable({
      "iDisplayLength": 15,
      "aLengthMenu": [[15, 50, 100, -1], [15, 50, 100, "Todos"]]
    });
  } );
</script>
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
      <a  style="width: 145px" class="btn btn-default btn-sm disabled"><span class="glyphicon glyphicon-home"></span> Inicio</a>
      <a href="inscritos.php"  style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm">Inscritos</a>
      <a href="certificacion.php"  style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm">Certificación</a>
      <a href="validacion.php"  style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm">Validación</a>
      <a href="reportes.php"  style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm">Reportes</a>
    </nav>
    <!--   </div>-->



    <div class="container col-lg-12" style="margin-top: -15px">
      <h2></h2>

      <div class="panel panel-default " >
        <div class="panel-heading"><a href="">>>Inicio</a></div>

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
                    <tr>
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
                    $logs = showRegistersUsers();
                    $record = 0;
                    if($logs){
                      foreach($logs as $item){

                        $record += 1;
                        echo'<tr style="font-size: 12px;" >'; 
                        echo" <td>".$record."</td>";
                        echo"<td>".$item->name."</td>";
                        echo "<td>".$item->lastname."</td>";
                        echo "<td>".$item->nombre_usuario."</td>";
                        echo"<td>".$item->email."</td>";
                        if ($item->type == 1) {
                          echo "<td>Usuario Común </td>";
                        }elseif ($item->type == 2) {
                          echo "<td>Administrador </td>";
                        }else{
                          echo "<td>Sin determinar tipo</td>";
                        }

                        echo '<td><button type="button" onClick="updateUser(\''.$item->nombre_usuario.'\')"  class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span> </button>';

                        echo'<button type="button" onClick="sendata(\''.$item->nombre_usuario.'\')" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span> </button>';
                        echo'</td>';


                        echo"</tr>";
                      }
                    }else{ 
                      echo'<tr ><td colspan="6" class="">No hay datos a mostrar</td></tr>';
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
                    <tr >
                      <th>#</th>
                      <th>Usuario</th>
                      <th>Fecha</th>
                      <th>Registro</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $logs =  showLogsUsers();
                    if($logs){
                      foreach($logs as $item){
                        echo'<tr style="font-size: 12px;text-align:center;">'; 
                        echo" <td>".$item->ID_LOG."</td>";
                        echo "<td>".$item->USERNAME."</td>";
                        echo "<td>".$item->DATE_LOG."</td>";
                        echo "<td>".$item->ACCION."</td>";
                        echo"</tr>";
                      }
                    }else{ 
                      echo'<tr ><td colspan="6" class="">No hay datos a mostrar</td></tr>';
                    }
                    ?>

                  </tbody>
                </table>
              </div><!-- /.table-responsive -->
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="registerUser" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nuevo Usuario</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              <form action="../Scripts/insertNewUser.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                <table class="table table-bordered table-responsive" align="center">

                  <tr>
                    <td><label class="control-label">Nombre</label></td>
                    <td><input class="form-control" type="text" name="name" value="" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Apellido</label></td>
                    <td><input class="form-control" type="text" name="lastname" value="" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Nombre Usuario</label></td>
                    <td><input class="form-control" type="text" name="username"  placeholder="Formato [ nombre.apellido ]" value="" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Email</label></td>
                    <td><input class="form-control" type="text"  name="email"  value="" /></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Tipo de Usuario</label></td>
                    <td><input class="form-control" type="text" name="rol"  value=""  placeholder="1 Común - 2 Administrador"/></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Contraseña</label></td>
                    <td><input class="form-control" type="password"  autocomplete="off" name="password"  value="" /></td>
                  </tr>

                  <tr>
                    <td colspan="2"> <div class="pull-right"> <button type="submit" name="btnsave" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button></div>  </td>
                </tr>



              </table>

            </form>
          </div>


          <!-- /.col-lg-4 (nested) -->
          <div class="col-lg-8">
            <div id="morris-bar-chart"></div>
          </div>
          <!-- /.col-lg-8 (nested) -->
        </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- <!--  <!-- Modal EDITAR USUARIOS-->
  <div class="modal fade" id="editUser" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar un registro </h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              <form action="../Scripts/insertNewUser.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                <table class="table table-bordered table-responsive" align="center">

                 <?php
                 $idUSER = $_POST["idUser"];
                 $dataResult = getAllDataUser($USERNAME);

                 ?>

                  <tr>
                    <td><label class="control-label">Nombre</label></td>
                    <td><input class="form-control" type="text" name="name" value="<?php $dataResult->name ?>" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Apellido</label></td>
                    <td><input class="form-control" type="text" name="lastname" value="" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Nombre Usuario</label></td>
                    <td><input class="form-control" type="text" name="username" placeholder="Formato [ nombre.apellido ]" value="" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Email</label></td>
                    <td><input class="form-control" type="text" name="email"  value="" /></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Tipo de Usuario</label></td>
                    <td><input class="form-control" type="text" name="rol"  value=""  placeholder="1 Común - 2 Administrador"/></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Contraseña</label></td>
                    <td><input class="form-control" type="password"  autocomplete="off" name="password"  value="" /></td>
                  </tr>

                  <tr>
                    <td colspan="2"> <div class="pull-right"> <button type="submit" name="btnsave" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span> Actualizar</button></div>  </td>
                </tr>

              </table>

            </form>
          </div>


          <!-- /.col-lg-4 (nested) -->
          <div class="col-lg-8">
            <div id="morris-bar-chart"></div>
          </div>
          <!-- /.col-lg-8 (nested) -->
        </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 

        </div><!--Container Table -->




     </div><!-- /#wrapper -->
 


</body>

</html>
