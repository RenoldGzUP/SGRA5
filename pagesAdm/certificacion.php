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

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Renold Gonzalez" content="">

    <title>Sistema de gestión de resultados academicos</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet"
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../JS/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../JS/bootstrap.js"></script>
    <link rel="stylesheet" media="all" href="../Style/jquery.dataTables.min.css">
    <link rel="stylesheet" media="all" href="../Style/ResultadosStyle.css">
    <script  type="text/javascript" src="../JS/jquery.dataTables.js"></script>
    <script src="../JS/Filtros.js"></script>
    <script src="../JS/getCheckedRow.js"></script>
    <script src="../JS/tableEdit.js"></script>
   <!--    <script src="../JS/Editable table/custom_table_edit.js"></script>-->

    <style>
    #vertical-bar {
        border-left: 2px solid #ffffff;
        width:2px;
        height:65px;
        margin-left: 265px;

    }

    .th {
  height: 20px;
}

  html,body {
  overflow:hidden;
}

/*body {
  background-color: #FFFFFF;
  font-family: "Trebuchet MS", Tahoma, Verdana;
  font-size: 12px;
  font-weight: normal;
  color: #666666;
  margin: 10px;
  padding: 0;
}*/

.vertical{
            width: 1000px;
            height: 1190px;
            overflow: auto;
            overflow-y: auto;
            margin: 0 auto;
            white-space: nowrap
        }

.fadebox {
  display: none;
  position: absolute;
  top: 0%;
  left: 0%;
  width: 100%;
  height: 100%;
  background-color: black;
  z-index:1001;
  -moz-opacity: 0.8;
  opacity:.30;
  filter: alpha(opacity=50);
}
.overbox {
  display: none;
  position: absolute;
  top: 25%;
  left: 25%;
  width: 50%;
  height: 50%;
  z-index:1002;
  overflow: auto;
}
#content {
  background: #FFFFFF;
  border: solid 3px #CCCCCC;
  padding: 10px;
}




  </style>


</head>

<body>
<div id="loading"  class="overbox" style="display:none;width:300px;height:300px;position:absolute;top:50%;left:50%;padding:2px;"><img src='../images/loading.gif' width="100" height="100" />
<center>Cargando..</center>
  </div>

<div id="fadeing" class="fadebox">&nbsp;</div>

    <div id="wrapper">

     <?php include '../modulos/userControl.php';?>
     <!--overflow-x:hidden;overflow-x:hidden;-->

<div class="container col-lg-12" style="margin-top: -18px;">
  <h2></h2>

  <div class="panel panel-default " >
    <div class="panel-heading" style="height: 70px">Filtro local:
      <?php include '../modulos/filters.php';?>

          <div style="margin-top: -20px">
            <button type="button" id="buttonCertification" class="btn btn-default btn-xs pull-right" style="width: 200px" data-toggle="modal" data-target="#tipoCertificaciones" ><span class="glyphicon glyphicon-list-alt" ></span>  Generar Certificaciones</button>
          </div>

    </div>

  </div>

<!--TABLE CERTIFICATION-->
<div class="col-lg-12">
  <?php include '../modulos/select.php';?>
</div>
  <div class="col-lg-12 table-responsive">
    <table id="tableresultados" class="table table-bordered table-hover table-editable">
     <thead style="text-align:center;width: : 9px;background: #225ddb" >
       <tr style="text-align:center; color: #ffffff">
        <th> <input type="checkbox"  id="checkall" ></th>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th class="cedula"> Cédula  </th>
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
        <th>A.Numerica</th>
        <th>Indice Pre.</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <!-- <div class="col-lg-12" style="width: 1500px; overflow-y: auto;"> -->
      <tbody >
      <?php
if (isset($_REQUEST['idSearch'])) {
    //  echo "res ".$_REQUEST['idSearch'];
    include '../Scripts/searchEST.php';
    echo "</tbody>";
    echo "</table>";
} else {
    include '../Scripts/tableData.php';
    echo "</tbody>";
    echo "</table>";
    echo '<div align="center">';
    include '../Scripts/paginator.php';
    echo "</div>";
}

?>

    </div>

</div>


   <!-- Modal Certificaciones Individuales -->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Administrador de Certificaciones</h4>
        </div>
        <div class="modal-body">
         <div class="panel-group">

    <!--       <div class="panel panel-primary">
            <div class="panel-heading">Modelo de certificaciones</div>
            <div class="panel-body">

              <form></form>

            <select name="Area" id="lista_areas_comunes" onChange='obtenerFacultadesComun(this.value)'>
             <option selected value="0"> Área </option>
             <?php
$listaSedes = getAreasComun();
foreach ($listaSedes as $item) {
    echo "<option value='$item->codigo_area'>" . $item->codigo_area . "-" . $item->nombre_area . "</option> ";
}
?>
           </select>
          <select name="FacultadModal" id="lista_facultades_comunes">
             <option selected value="">Facultad</option>
           </select>

           <button type="button" class="btn btn-warning btn-sm pull-right"><span class="glyphicon glyphicon-list-alt"></span> Aplicar</button>

         </div>
       </div> -->


       <div class="panel panel-primary">
        <div class="panel-heading">Previsualizacion</div>
        <div class="panel-body">

        </div>
      </div>

    </div>
    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-arrow-down"></span> PDF</button>
    <button type="button" class="btn btn-default "><span class="glyphicon glyphicon-arrow-down"></span> Word</button>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>

</div>
</div>  <!-- /#FIN MODAL Indivual de certificaciones-->


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
          <h4 class="modal-title">Tipo de certificación</h4>
        </div>
        <div class="modal-body">

        <div id="certType" >
          <center>
             <label  class="checkbox-inline"><input id="type1" type="checkbox" value="1" onclick="GetCheckedStateCoor();">Coordinador</label>
          <label  class="checkbox-inline"><input id="type2" type="checkbox" value="2" onclick="GetCheckedStateDirector();"  >Director</label>
          </center>
        </div>
        </div>
        <div class="modal-footer">
          <button id="sendTypeReport" onclick="getValueUsingParentTag();" type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

  <?php include '../modulos/modals.php';?>

<!-- /.modal. para eliminar registro Fin -->

</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>

</html>
