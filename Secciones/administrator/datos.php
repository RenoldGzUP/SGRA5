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
     <?php
       include '../modulos/header.php';
     ?>
       


      <div class="container col-lg-6" style="margin-top: -10px">
        <h4>Administrador de registros para las Base de Datos</h4>
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading" style="font-size: 14px;">Importar Registros A BD - <b>Inscritos</b></div>
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

                       foreach($listasDB as $item){
                        if (preg_match("/inscritos/",$item->Tables_in_sgra)) {
                           echo "<option value='$item->Tables_in_sgra'>".$item->Tables_in_sgra."</option> ";
                        }
                        
                      }  
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
            </div>





          </div>
        </div>

        <h2></h2>
        <div class="panel panel-default">
          <div class="panel-heading" style="font-size: 14px;">Exportar los Registros de BD <b>Inscritos</b></div>
          <div class="panel-body">
            <div class="container col-lg-12">   
              <form action="../Scripts/uploadCSV.php" method="post" enctype="multipart/form-data" class="form-horizontal" > 

                <table class="table table-borderless" style="font-size: 13px;" >

                  <tbody>
                    <tr>
                      <td class ="text-left col-sm-3" >Nombre del archivo: </td>
                      <td  width="100"><input class="form-control " type="text" name="name" value="download"></td>
                    </tr>

                    <tr>
                      <td class ="text-left">Tabla Origen:</td>
                       <td>
                        <select name="listaBD">
                       <?php
                       $listasDB = getTablesList(); 

                       foreach($listasDB as $item){
                        if (preg_match("/inscritos/",$item->Tables_in_sgra)) {
                           echo "<option value='$item->Tables_in_sgra'>".$item->Tables_in_sgra."</option> ";
                        }
                        
                      }  
                         ?>
                       </select>
                        </td>   
                    </tr>

                     <tr>
                      <td class ="text-left">Formato :</td>
                       <td>
                        <select name="listaBD">
                    <option>PDF</option><option>Excel</option><option>SQL</option>
                       </select>
                        </td>   
                    </tr>

                    <tr>
                      <td></td>
                        <td width="100">
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
            <div class="panel-heading" style="font-size: 14px;">Importar Registros  BD- <b>Resultados</b></div>
            <div class="panel-body">
             <div class="container col-lg-12">   
              <form action="../Scripts/uploadCSVResultados.php" method="post" enctype="multipart/form-data" class="form-horizontal" > 

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
                      
                      foreach($listasDB as $item){
                        if (preg_match("/resultados/",$item->Tables_in_sgra)) {
                           echo "<option value='$item->Tables_in_sgra'>".$item->Tables_in_sgra."</option> ";}
                        }  


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
            </div>





          </div>
        </div>

        <h2></h2>
        <div class="panel panel-default">
          <div class="panel-heading" style="font-size: 14px;">Exportar los Registros de BD <B>Resultados</B></div>
          <div class="panel-body">
           <div class="container col-lg-12">   
              <form action="../Scripts/uploadCSV.php" method="post" enctype="multipart/form-data" class="form-horizontal" > 

                <table class="table table-borderless" style="font-size: 13px;" >

                  <tbody>
                    <tr>
                      <td class ="text-left col-sm-3" >Nombre del archivo: </td>
                      <td  width="100"><input class="form-control " type="text" name="name" value="download"></td>
                    </tr>

                    <tr>
                      <td class ="text-left">Tabla Origen:</td>
                       <td>
                        <select name="listaBD">
                       <?php
                       $listasDB = getTablesList(); 

                       foreach($listasDB as $item){
                        if (preg_match("/resultados/",$item->Tables_in_sgra)) {
                           echo "<option value='$item->Tables_in_sgra'>".$item->Tables_in_sgra."</option> ";
                        }
                        
                      }  
                         ?>
                       </select>
                        </td>   
                    </tr>

                     <tr>
                      <td class ="text-left">Formato :</td>
                       <td>
                        <select name="listaBD">
                    <option>PDF</option><option>Excel</option><option>SQL</option>
                       </select>
                        </td>   
                    </tr>

                    <tr>
                      <td></td>
                        <td width="100">
                        <div class = "pull-right">
                          <button style="width: 130px;" type="button" onClick=" exportDataR()" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-save"></span> Exportar</button>
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
