<?php
session_start();
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
echo "Sesion  terminada,<a href='../index.html'>Necesita Hacer Login</a>";
exit;
}
?>

<?php
    include'config.php';
	$link = Conectarse(); 
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de gestión de resultados academicos</title>

    <!-- Bootstrap Core CSS  <link href="../vendor/bootstrap/css/styletables.css" rel="stylesheet">-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../jquery/jquery-2.1.4.js"></script>
	<script src="../JS/Filtros.js"></script>
	
	

   
	
	
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
                 <p style="color: #ffffff;margin-right: 30px;margin-top: 10px" >Bienvenido <?php echo $_SESSION['username']; ?> &nbsp     | &nbsp
                    <?php echo date('l, F jS, Y'); ?>
                  &nbsp|&nbsp <b><a href="../logout/logout.php" style="color:#ffff00";>Salir</a></b></p>
            </ul> 


        </nav>


<!--<div class="container-fluid " >-->
  <nav class="navbar" align="center" style="background: #d6d5d5;min-height: 25px;;margin-top: -1px" >
    <a href="dashboard.php" style="width: 145px" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-home"></span> Inicio</a>
    <a   style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm disabled">Inscritos</a>
    <a href="certificacion.php"  style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm">Certificación</a>
    <a href="validacion.php"  style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm">Validación</a>
    <a href="reportes.php"  style="margin-left: 18px;width: 145px" class="btn btn-warning btn-sm">Reportes</a>
</nav>
 <!--   </div>-->
        


<div class="container col-lg-12" style="margin-top: -15px">
  <h2></h2>
  <div class="panel panel-default " >
    <div class="panel-heading"><a href="">>>Inicio</a><a href="">>>Inscritos</a></div>
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
	<option >Seleccione Area</option>
	
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

<div style="margin-top: 12px">

<form>
Mostrar:&nbsp&nbsp&nbsp&nbsp  
<select name="sCantidadRegistros" onchange="cantidadRegistros(this.value)">
       <option value="1">20</option> 
       <option value="2">50</option> 
       <option value="3">100</option> 
	   <option value="4">300</option>
	   <option value="5">500</option>
</select>
 registros
 </form> 
</div>


    </div>

	
<!--Llamado a clase paginador de Inscritos -->
<?php
include'TablaDatosInscritos.php';
?>


   
</div>
                        <!-- /.panel-body -->


  </div>
  
  
</div>
        <!-- /#page-wrapper -->
		
		
</div>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    
	

</body>

</html>
