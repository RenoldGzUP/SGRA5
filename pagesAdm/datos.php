<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();
saveLogs($_SESSION['name'], "Usuario accedió a página de administrtacion de datos");
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
  <script type="text/javascript" src="../JS/progressbar.js"></script>
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
    <div class="container-fluid" style="margin-left: 20px;margin-right:20px;background: #c7ced4">
      <h3>Administrador de registros para las Base de Datos</h3>
      <h4>Datos para la tabla Inscritos </h4>
      <div class="row" style="">
        <!--SECCION PARA IMPORTAR REGISTROS  A LA TABLA INSCRITOS-->
        <div class="col-lg-6" >
          <div class="panel panel-primary">
            <div class="panel-heading" style="font-size: 14px;">Importar Registros A BD - <b>Inscritos</b></div>
            <div class="panel-body" style="height:auto">
              <!--ROW PAR IMPORTAR REGISTROS A  TB INSCRTIOS-->
              <div class="row">
                <div class="col-lg-12">
                  <table class="table table-borderless" style="font-size: 12px;" >
                    <tbody>
                      <tr>
                        <td class ="text-left col-sm-3" >Archivo CSV : </td>
                        <td width="100"><input type="file" id="fileImportInscritosBtt" name="file" onchange="return fileValidationInscritos()"></td>
                      </tr>
                      <tr>
                        <td class ="text-left">Tabla Destino : </td>
                        <td>
                          <select name="listaBD">
                            <?php
$listasDB = getTablesList();
foreach ($listasDB as $item) {
    if (preg_match("/inscritos/", $item->Tables_in_sgra)) {
        echo "<option value='$item->Tables_in_sgra'>" . $item->Tables_in_sgra . "</option> ";
    }
}
?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td width="100">
                          <div class = "pull-right" style="margin-top: -20px">
                            <button id="importInscritosBtt"  style="width: 150px;"  name="import_data" type="submit" class="btn btn-default btn-sm" onclick="loadFile()" ><span class="glyphicon glyphicon-floppy-open"></span>  Importar*</button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-lg-12">
                  <div id="wrong" class="alert alert-danger" style="display:none;" >
                    <strong><img src="../images/wrong.png"  style="width:20px;height:20px;"> Error!</strong><span id="messageInscritoWrong"></span>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div id="done" class="alert alert-info" style="display:none;" >
                    <strong><img src="../images/checked.png"  style="width:20px;height:20px;">  Info!</strong> <span id="messageInscrito"></span>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div id="loading" class="alert alert-info" style="display:none;">
                    <strong><img src="../images/loading.gif"  style="width:20px;height:20px;">  Info!</strong> Cargando Registros...
                  </div>
                </div>
                <div class="col-lg-12">
                  <div id="myProgress"  class="progress" style="margin-top: -10px;display:none;">
                    <div id="myBar"  class="progress-bar progress-bar-success" role="progressbar" >0%</div>
                  </div>
                </div>
                </div> <!--FIN ROW INSCRTIOS-->
              </div>
            </div>
          </div>
          <!--SECCION PARA IMPORTAR REGISTROS A LA TABLA RESULTADOS-->
          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading" style="font-size: 14px;">Importar Registros  BD- <b>Resultados</b></div>
              <div class="panel-body" style="height:auto">
                <!-- row interno-->
                <div class="row" >
                  <div class="col-lg-12" >
                    <table class="table table-borderless" style="font-size: 12px;" >
                      <tbody>
                        <tr>
                          <td class ="text-left col-sm-3" >Archivo CSV : </td>
                          <td width="100"><input id="fileImportResultadosBtt" type="file" id="file" name="file" onchange="return fileValidationResultados()"></td>
                        </tr>
                        <tr>
                          <td class ="text-left">Tabla Destino : </td>
                          <td>
                            <select name="listaBD">
                              <?php
$listasDB = getTablesList();?>
                              <div class  = "container col-lg-12" style= "margin-top: -10px" >
                                <?php
foreach ($listasDB as $item) {
    if (preg_match("/resultados/", $item->Tables_in_sgra)) {
        echo "<option value='$item->Tables_in_sgra'>" . $item->Tables_in_sgra . "</option> ";}
}
?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td></td>
                            <td width="100">
                              <div class = "pull-right" style="margin-top: -20px">
                                <button id="importResultadosBtt" style="width: 150px;"  name="import_data" type="submit" class="btn btn-default btn-sm"  onclick="loadFileImportRes()"><span class="glyphicon glyphicon-floppy-open"></span>  Importar</button>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-12">
                      <div id="doneResultadoI" class="alert alert-info" style="display:none;" >
                        <strong><img src="../images/checked.png"  style="width:20px;height:20px;">  Info!</strong><span id="doneMessageResultadoI"></span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div id="loadingResultadoI" class="alert alert-info" style="display:none;">
                        <strong><img src="../images/loading.gif"  style="width:20px;height:20px;">  Info!</strong> Cargando Registros...##
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div id="wrongResultadoI" class="alert alert-danger" style="display:none;" >
                        <strong><img src="../images/wrong.png"  style="width:20px;height:20px;"> Error!</strong> <span id="messageResultadosWrong"></span>
                      </div>
                    </div>
                    <div class="col-lg-12" >
                      <div id="progressContainerResultadoI" class="progress" style="display:none;" >
                        <div id="progressResultadoI" class="progress-bar progress-bar-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- row fin interno-->
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid" style="margin-left: 20px;margin-right:20px;">
          <div class="row">
            <div class="col-lg-12" style="" >
              <h3></h3>
            </div>
          </div>
        </div>
        <!--SECCION PARA EXPORTAR REGISTROS-->
        <div class="container-fluid" style="margin-left: 20px;margin-right:20px;background: #c7ced4">
          <h4>Exportar Registros </h4>
          <div class="row">
            <div class="col-lg-6">
              <!--SECCION PARA EXPORTAR REGISTROS DESDE LA TABLA INSCRITOS-->
              <div class="panel panel-success">
                <div class="panel-heading" style="font-size: 14px;">Exportar los Registros de BD <b>Inscritos</b></div>
                <div class="panel-body" style="height: 200px">
                  <div class="row">
                    <div class="col-lg-12">
                      <table class="table table-borderless" style="font-size: 13px;" >
                        <tbody>
                          <tr>
                            <td class ="text-left col-sm-3" >Nombre del archivo: </td>
                            <td  width="50"><input class="form-control " type="text" name="name" value="download"></td>
                          </tr>
                          <tr>
                            <td class ="text-left">Tabla Origen:</td>
                            <td>
                              <select name="listaBD">
                                <?php
$listasDB = getTablesList();
foreach ($listasDB as $item) {
    if (preg_match("/inscritos/", $item->Tables_in_sgra)) {
        echo "<option value='$item->Tables_in_sgra'>" . $item->Tables_in_sgra . "</option> ";
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
                              <div class = "pull-right" style="margin-top: -20px">
                                <button style="width: 150px;"type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-save"></span> Exportar  Inscritos</button>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-12">
                      <div id="doneInscritoE" class="alert alert-info" style="display:none;" >
                        <strong><img src="../images/checked.png"  style="width:20px;height:20px;">  Info!</strong> Registros cargados al servidor
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div id="loadingInscritoE" class="alert alert-info" style="display:none;">
                        <strong><img src="../images/loading.gif"  style="width:20px;height:20px;">  Info!</strong> Cargando Registros...
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div id="wrongInscritoE" class="alert alert-danger" style="display:none;" >
                        <strong><img src="../images/wrong.png"  style="width:20px;height:20px;"> Error!</strong> Ocurrio un error en la carga del archivo CSV!.
                      </div>
                    </div>
                    <div class="col-lg-12" >
                      <div class="progress" style="display:none;" >
                        <div id="progressInscritoE" class="progress-bar progress-bar-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--SECCION PARA EXPORTAR REGISTROS DESDE LA TABLA RESULTADOS-->
            <div class="col-lg-6" >
              <div class="panel panel-success">
                <div class="panel-heading" style="font-size: 14px;">Exportar los Registros de BD <B>Resultados</B></div>
                <div class="panel-body" style="height: 200px">

                  <div class="row">
                    <div class="col-lg-12">
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
foreach ($listasDB as $item) {
    if (preg_match("/resultados/", $item->Tables_in_sgra)) {
        echo "<option value='$item->Tables_in_sgra'>" . $item->Tables_in_sgra . "</option> ";
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
                                <option>csv</option><option>TXT</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td></td>
                            <td width="100">
                              <div class = "pull-right" style="margin-top: -20px">
                                <!--onClick=" exportDataR()" -->
                                <button style="width: 150px;" type="button"  class="btn btn-default btn-sm" data-toggle="modal" data-target="#opcionesExport"><span class="glyphicon glyphicon-floppy-save"></span> Exportar resultados</button>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>


                    </div>

                     <div class="col-lg-12">
                      <div id="doneResultadoE" class="alert alert-info" style="display:none;" >
                        <strong><img src="../images/checked.png"  style="width:20px;height:20px;">  Info!</strong> Registros cargados al servidor
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div id="loadingResultadoE" class="alert alert-info" style="display:none;">
                        <strong><img src="../images/loading.gif"  style="width:20px;height:20px;">  Info!</strong> Cargando Registros...
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div id="wrongResultadoE" class="alert alert-danger" style="display:none;" >
                        <strong><img src="../images/wrong.png"  style="width:20px;height:20px;"> Error!</strong> Ocurrio un error en la carga del archivo CSV!.
                      </div>
                    </div>
                    <div class="col-lg-12" >
                      <div class="progress" style="display:none;" >
                        <div id="progressResultadoE" class="progress-bar progress-bar-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                      </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="opcionesExportInscritos" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
                <p>Some text in the modal.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
          </div> <!-- Fin Modal -->
          <!-- Modal -->
          <div class="modal fade" id="opcionesExportResultados" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                  <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
            </div> <!-- Fin Modal -->
          </div>
          <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
      </body>
    </html>