<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');
session_start();
saveLogs($_SESSION['name'],"Usuario accedió a página certificaciones");

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
     <link rel="stylesheet" media="all" href="../Style/jquery.dataTables.min.css">
     <script  type="text/javascript" src="../JS/jquery.dataTables.js"></script>
    <script src="../JS/Filtros.js"></script>
     <script src="../JS/getCheckedRow.js"></script>

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
$('#checkboxlist').DataTable( {
order: [],
autoWidth: true,
columnDefs: [ { orderable: false, targets: [0,16] },
{"width": "65px", "targets":[16] } ]
});

} );
</script>



</head>

<body>

    <div id="wrapper">

     <?php
  include '../modulos/header.php';
  ?>
        


<div class="container col-lg-12" style="margin-top: -30px">
  <h2></h2>
  <div class="panel panel-default " >
<!--     <div class="panel-heading"><a href="">>>Inicio</a><a href="">>>Certificación</a></div> -->
    <div class="panel-heading"style="height: 70px">Filtro local:   

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

<button type="button" class="btn btn-default btn-xs pull-right" style="width: 150px" ><span class="glyphicon glyphicon-filter"></span> Aplicar filtros</button>


<div style="margin-top: 10px">
<button type="button" id="buttonCertification" class="btn btn-default btn-xs pull-right" style="width: 150px"  ><span class="glyphicon glyphicon-list-alt"></span>  Generar Certificaciones</button>
</div>


    </div>
   <div class="panel panel-default" style="margin-top: 5px">
    <div class="panel-body">       
 <table id="checkboxlist" class="table table-bordered table-hover table-editable">
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
      <tbody>

<?php
         $estResultado = showDataResultado();
         if($estResultado){
          foreach ($estResultado as $item) {
          echo'<tr style="font-size: 11px;text-align:center">';
          echo'<td style="text-align: center;"><input type="checkbox" class="checkthis" value='.$item->n_ins.'></td>';
          echo "<td></td>";
          echo "<td>".$item->nombre."</td>";  
          echo "<td>".$item->apellido."</td>";  
          echo "<td>".$item->cedula."</td>";
          echo "<td>".$item->n_ins."</td>";  
          echo "<td>".$item->sede."</td>";  
          echo "<td>".$item->fac_ia."</td>";
          echo "<td>".$item->esc_ia."</td>";  
          echo "<td>".$item->car_ia."</td>";  
          echo "<td>".$item->fac_iia."</td>";
          echo "<td>".$item->esc_iia."</td>";  
          echo "<td>".$item->car_iia."</td>";  
          echo "<td>".$item->fac_iiia."</td>";
          echo "<td>".$item->esc_iiia."</td>";  
          echo "<td>".$item->car_iiia."</td>";  
          echo '<td><a  id="edit" href="#" class="btn btn-info btn-xs" ><span class="glyphicon glyphicon-pencil"></span> </a>
          <a  id="remove" href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#save"><span class="glyphicon glyphicon-floppy-saved" ></span> </a>

            <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span> </a>

          </td>';

          echo"</tr>";       
          }
         }else { 
             echo'<tr><td colspan="4">No hay datos a mostrar en esta Pantalla</td></tr>';
         }     
?>

      </tbody>
 </table>

    </div>
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
             foreach( $listaSedes as $item){
               echo "<option value='$item->codigo_area'>".$item->codigo_area."-".$item->nombre_area."</option> ";
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

<!-- /.modal- para guardar registro     -->
  <div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          <h4 class="modal-title custom_align" id="Heading">Guardar Registro</h4>
        </div>

        <div class="modal-body">
         <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span>  ¿Desea guardar el registro seleccionado?</div>
       </div>

       <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> SI</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> NO</button>
      </div>

    </div><!-- /.modal-content --> 
   </div><!-- /.modal-dialog --> 
  </div>
<!-- /.modal. para eliminar registro Fin -->

</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   

    

</body>

</html>
