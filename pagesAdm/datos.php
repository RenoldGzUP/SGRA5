<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');
session_start();
saveLogs($_SESSION['name'],"Usuario accedió a página de administrtacion de datos");
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
  <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- MetisMenu CSS -->
    <link href="../Style/bootstrap borderless table css.css" rel="stylesheet">
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
        <a  style="width: 145px" class="btn btn-default btn-sm disabled"><span class="glyphicon glyphicon-home"></span> Inicio</a>
        <a href="inscritos.php"  style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm">Inscritos</a>
        <a href="certificacion.php"  style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm">Certificación</a>
        <a href="validacion.php"  style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm">Validación</a>
        <a href="reportes.php"  style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm">Reportes</a>
      </nav>
      <!--   </div>-->



      <div class="container col-lg-6" style="margin-top: -10px">
        <h4>Administrador de registros para las Base de Datos</h4>
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading" style="font-size: 14px;">Importar Registros A Base de Datos - <b>Inscritos</b></div>
            <div class="panel-body">
             <div class="container col-lg-12">   
              <form action="../Scripts/uploadCSV.php" method="post" enctype="multipart/form-data" class="form-horizontal" > 

                <table class="table table-borderless" style="font-size: 13px;" >

                  <tbody>
                    <tr>
                      <td class ="text-left col-sm-3" >Archivo CSV : </td>
                      <td width="100"><input type="file" id="file" name="file"></td>
                    </tr>

                    <tr>
                      <td class ="text-left">Tabla Destino : </td>
                       <td>
                        <select name="listaBD">
                       <?php
                       $listasDB = getTablesList(); 
                       foreach( $listasDB as $item){
                         echo "<option value='$item->Tables_in_sgra'>".$item->Tables_in_sgra."</option> ";}  
                         ?>
                       </select>
                        </td>   
                    </tr>

                    <tr>
                      <td></td>
                        <td width="100">
                        <div class = "pull-right">
                          <button style="width: 130px;"  name="import_data" type="submit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-open"></span>  Importar</button>
                        </div>
                      </td> 
                    </tr>

                  </tbody>
                </table>

              </form>

              <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
    40%
  </div>
</div>

            </div>





          </div>
        </div>

        <h2></h2>
        <div class="panel panel-default">
          <div class="panel-heading" style="font-size: 18px;">Exportar los Registros </div>
          <div class="panel-body">
           <div class="container col-lg-12">   
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" > 

              <table class="table table-bordered">

                <tbody>
                  <tr>
                    <td class ="text-right" width="250">Nombre del Archivo : </td>
                    <td width="380"><input class="form-control" type="text" name="name" value="download" /></td>
                    <td class ="text-right">Tabla Origen : </td>
                    <td>
                      <select name="listaOrigen">
                      <?php
                       $listasDB = getTablesList(); 
                       foreach( $listasDB as $item){
                         echo "<option value='$item->Tables_in_sgra'>".$item->Tables_in_sgra."</option> ";}  
                      ?>
                      </select>
                    </td>
                    <td class ="text-right">Formato : </td>
                    <td><select name="transporte"><option>PDF</option><option>Excel</option><option>SQL</option></select></td>
                    <td width="130">
                      <div class = "pull-right">
                        <button style="width: 130px;"type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-save"></span> Exportar</button>
                      </div>
                    </td>
                  </tr>

                </tbody>
              </table>

            </form>

          </div>



        </div>
      </div>
    </div>
  </div>

        <div class="container col-lg-6" style="margin-top: 20px">
        <h4></h4>
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading" style="font-size: 14px;">Importar Registros  Base de Datos - <b>Resultados</b></div>
            <div class="panel-body">
             <div class="container col-lg-12">   
              <form action="../Scripts/uploadCSV.php" method="post" enctype="multipart/form-data" class="form-horizontal" > 

                        <table class="table table-borderless" style="font-size: 13px;" >

                  <tbody>
                    <tr>
                      <td class ="text-left col-sm-3" >Archivo CSV : </td>
                      <td width="100"><input type="file" id="file" name="file"></td>
                    </tr>

                    <tr>
                      <td class ="text-left">Tabla Destino : </td>
                       <td>
                        <select name="listaBD">
                       <?php
                       $listasDB = getTablesList(); 
                       foreach( $listasDB as $item){
                         echo "<option value='$item->Tables_in_sgra'>".$item->Tables_in_sgra."</option> ";}  
                         ?>
                       </select>
                        </td>   
                    </tr>

                    <tr>
                      <td></td>
                        <td width="100">
                        <div class = "pull-right">
                          <button style="width: 130px;"  name="import_data" type="submit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-open"></span>  Importar</button>
                        </div>
                      </td> 
                    </tr>

                  </tbody>
                </table>

              </form>

              <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
    40%
  </div>
</div>

            </div>





          </div>
        </div>

        <h2></h2>
        <div class="panel panel-default">
          <div class="panel-heading" style="font-size: 18px;">Exportar los Registros</div>
          <div class="panel-body">
           <div class="container col-lg-12">   
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" > 

              <table class="table table-bordered ">

                <tbody>
                  <tr>
                    <td class ="text-right" width="250">Nombre del Archivo : </td>
                    <td width="380"><input class="form-control" type="text" name="name" value="download" /></td>
                    <td class ="text-right">Tabla Origen : </td>
                    <td>
                      <select name="listaOrigen">
                      <?php
                       $listasDB = getTablesList(); 
                       foreach( $listasDB as $item){
                         echo "<option value='$item->Tables_in_sgra'>".$item->Tables_in_sgra."</option> ";}  
                      ?>
                      </select>
                    </td>
                    <td class ="text-right">Formato : </td>
                    <td><select name="transporte"><option>PDF</option><option>Excel</option><option>SQL</option></select></td>
                    <td width="130">
                      <div class = "pull-right">
                        <button style="width: 130px;"type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-save"></span> Exportar</button>
                      </div>
                    </td>
                  </tr>

                </tbody>
              </table>

            </form>

          </div>



        </div>
      </div>
    </div>
  </div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


</body>

</html>
