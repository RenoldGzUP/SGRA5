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
echo "Su sesion a terminado,<a href='../index.html'>Necesita Hacer Login</a>";
exit;
}
?>

<?php
    include 'config.php';
	$link = Conectarse(); 
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

    <link href="../vendor/bootstrap/css/styletables.css" rel="stylesheet">

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
    <div class="panel-heading"style="height: 80px">Filtro local:   

<?php
$sqlL1 ="SELECT id_sede,codigo_sede,nombre_sede from sedes";	
$result = mysqli_query($link,$sqlL1);
echo'<select name="Sedes">';
echo"<option >Seleccione</option>";
		while($row = mysqli_fetch_array($result)){
			   echo"<option value='.$row[0].'>".$row[1]."-".$row[2]."</option> ";
		}
echo"</select>";
?>


donde : 
<?php
$sqlL2 ="SELECT id_farea,codigo_farea,descripcion from filtro_area";	
$resultL2 = mysqli_query($link,$sqlL2);
echo'<select name="Areas">';
echo"<option >Seleccione</option>";
		while($row = mysqli_fetch_array($resultL2)){
			   echo"<option value='.$row[0].'>".$row[1]."-".$row[2]."</option> ";
		}
echo"</select>";
?>

en: 
<select name="OS">
   <option selected value="0"> Facultad </option>
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
en:
<select name="OS">
   <option selected value="0">Carrera</option>
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

<button type="button" class="btn btn-default btn-xs pull-right" style="width: 200px" ><span class="glyphicon glyphicon-filter"></span> Aplicar filtros</button>


<div style="margin-top: 20px">
Mostrar:&nbsp&nbsp&nbsp&nbsp  
<select name="OS">
   <option selected value="0"> Área </option>
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
registros



</div>

    </div>

	

<?php
$sql="SELECT indice_bus,nombre,apellido,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia FROM dgeneral";
if($result = mysqli_query($link,$sql)){
	if(mysqli_num_rows($result)>0){
		echo'<div class="panel-body">';         
		echo'<table class="table table-bordered table-hover table-editable">';
		echo'<thead style="text-align:center;width: : 10px;background: #225ddb" >';
		echo'<tr style="font-size: 12px;text-align:center; color: #ffffff">';
			echo'<th style="text-align: center;"><input type="checkbox" class="form-check-input  " id="exampleCheck1" ></th>';
			echo'<th style="text-align: center;">#</th>';
			echo'<th>Nombre</th>';
			echo'<th>Apellido</th>';
			echo'<th>Cédula</th>';
			echo'<th>Inscripción</th>';
			echo'<th>Sede</th>';
			echo'<th>Fac-1A</th>';
			echo'<th>Esc-1A</th>';
			echo'<th>Car-1A</th>';
			echo'<th>Fac-2A</th>';
			echo'<th>Esc-2A</th>';
			echo'<th>Car-2A</th>';
			echo'<th>Fac-3A</th>';
			echo'<th>Esc-3A</th>';
			echo'<th>Car-3A</th>';
			echo'<th>Acciones</th>';
        echo'</tr>';
		echo'</thead>';
	
		echo'<tbody>';
		while ($row = mysqli_fetch_array($result)){   
		 echo'<tr style="font-size: 12px;text-align:center">';
         echo'<th style="text-align: center;"><input type="checkbox" class="form-check-input " id="exampleCheck1" ></th>';
         //<td style="text-align: center;">1</td>
		 echo "<td>".$row[0]."</td>";  
		 echo "<td>".$row[1]."</td>";  
		 echo "<td>".$row[2]."</td>";
		 echo "<td>".$row[3]."</td>";  
         echo "<td>".$row[4]."</td>";  
         echo "<td>".$row[5]."</td>";
		 echo "<td>".$row[6]."</td>";  
		 echo "<td>".$row[7]."</td>";  
		 echo "<td>".$row[8]."</td>";
		 echo "<td>".$row[9]."</td>";  
         echo "<td>".$row[10]."</td>";  
         echo "<td>".$row[11]."</td>";
		 echo "<td>".$row[12]."</td>";  
         echo "<td>".$row[13]."</td>";  
         echo "<td>".$row[14]."</td>";
        echo '<td><a href="#" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span> </a>';
        echo '<a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> </a></td>';
		echo"</tr>";
	  }
		echo"</tbody>"; 
		echo"</table>";
	}else{echo"No hay registros a mostrar";}
}else{echo"Ocurrio un error al ejecutar $sql.".mysql_error($link);
}
?>


  <div class="row">
    <div class="col-lg-6">
     <h5 style="text-align: left;">Mostrando x a y de z registros</h5>
   </div>
   <div class="col-lg-6" style="margin-top: -22px">
    <ul class="pagination pull-right" >
      <li class="disabled"><a href="#">Anterior</a></li>
      <li><a href="">1</a></li>
      <li><a href="">2</a></li>
      <li><a href="">3</a></li>
      <li><a href="">4</a></li>
      <li><a href="">Siguiente</a></li>
    </ul>
  </div>

</div>
  

   
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

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
