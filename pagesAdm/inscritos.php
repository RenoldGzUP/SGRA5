<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');
session_start();
saveLogs($_SESSION['name'],"Usuario accedió a página inscritos");
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
echo "<script>location.href='../noAccess.html'</script>";
//echo "Sesion  terminada,<a href='../index.html'>Necesita Hacer Login</a>";
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
    <script type="text/javascript" src="../JS/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../JS/bootstrap.js"></script>
     <link rel="stylesheet" media="all" href="../Style/jquery.dataTables.min.css">
     <script  type="text/javascript" src="../JS/jquery.dataTables.js"></script>
    <script src="../JS/Filtros.js"></script>
     <script src="../JS/getCheckedRow.js"></script>
    <script src="../JS/tableEdit.js"></script>
   <!--    <script src="../JS/Editable table/custom_table_edit.js"></script>
 -->

	
    <style>
    #vertical-bar {
        border-left: 2px solid #ffffff;
        width:2px;
        height:65px;
        margin-left: 265px;
      
    }
</style>

<!--   <script >
$(document).ready(function() {
$('#inscritosTable').DataTable( {
});

} );
</script> -->

</head>

<body>

    <div id="wrapper">

       <?php
  include '../modulos/header.php';
  ?>
       


<div class="container col-lg-12" style="margin-top: -15px">
  <script src="../JS/Filtros.js"></script>
  <h2></h2>

  <div class="panel panel-default " >

  <div class="panel-heading"style="height: 100px">Filtro local:   
	
	<select name="sedes"  id="lista_sedes" onChange='obtenerAreas(this.value)'>
	<option >Seleccione Sede</option>
	<?php
	include '../Consultas/Sedes.php';
	$listaSedes = getPHPSedes(); 
     foreach( $listaSedes as $item){
	 echo "<option value='$item->id_sede'>".$item->codigo_sede."-".$item->nombre_sede."</option> ";
	}	
	?>
	</select>

 donde :
 
    <select name="areas"  id="lista_areas" onChange='obtenerFacultades(this.value)'>
	<option >Seleccione Area</option>
	
	</select>
 en: 
    <select name="facultades" id="lista_facultades" >
	<option >Seleccione Facultad</option>
	
	</select>

<button type="button" class="btn btn-default btn-xs pull-right" style="width: 200px" ><span class="glyphicon glyphicon-filter"></span> Aplicar filtros</button>

<div style="margin-top: 12px">
Filtros Academicos:
<select name="OS">
   <option selected value="0">Seleccione Escuela</option>
       <optgroup label="Microsoft"> 
       <option value="1">Windows Vista</option> 
       <option value="2">Windows 7</option> 
       <option value="3">Windows XP</option> 
   </optgroup> 
   <optgroup label="Linux"> 
       <option value="10">Fedora</option> 
       <option value="11">Debian</option> 
       <option value="12">Suse</option> 
   </optgroup> 
</select>
 
 <select name="OS">
   <option selected value="0">Seleccione Carrera</option>
       <optgroup label="Microsoft"> 
       <option value="1">Windows Vista</option> 
       <option value="2">Windows 7</option> 
       <option value="3">Windows XP</option> 
   </optgroup> 
   <optgroup label="Linux"> 
       <option value="10">Fedora</option> 
       <option value="11">Debian</option> 
       <option value="12">Suse</option> 
   </optgroup> 
</select>


</div>



    </div> <!--PANEL HEADING-->

	
<!--Llamado a clase paginador de Inscritos -->
   
</div>
                        <!-- /.panel-body -->


<div  class="col-lg-12">
  <?php include '../modulos/selectInscrito.php';?>
 <table id="inscritosTable" class="table table-bordered table-hover table-editable">
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
  <tbody >
        
        <!--EMBEDED CODE -->
        <?php 
      if (isset($_REQUEST['idSearch'])) {
      //  echo "res ".$_REQUEST['idSearch'];
          include '../Scripts/searchInscritos.php';
          echo "</tbody>";
          echo "</table>";
      }
      else
      {
          include '../Scripts/tableDataInscrito.php';
          echo "</tbody>";
          echo "</table>";
          echo '<div align="center">';
          include '../Scripts/paginatorInscrito.php';
          echo "</div>";
      }

     ?>

</div>

  </div>
  
  


  <!-- Modal -->
  <div class="modal fade" id="tipoCertificaciones" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Registro</h4>
        </div>
        <div class="modal-body"> 
          <div class="row">
            <div class="col-lg-12">
              <table class="table table-bordered table table-hover ">

                <tbody>
                  <?php
                   include '../Scripts/getAllDataInscritos.php';

                  ?>
                </tbody>

              </table>
            </div>

          </div>



        </div>
        <div class="modal-footer">
          <button id="sendTypeReport" type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

</div>
        <!-- /#page-wrapper -->	
		
</div>

</body>

</html>
