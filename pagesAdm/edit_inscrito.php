<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
error_reporting(E_ALL ^ E_NOTICE);
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



<!DOCTYPE html>
<html lang="es">
    <head>
        <title>
            Sistema de Gestión de Resultados Académicos
        </title>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
                 <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                 <link rel="stylesheet" media="all" href="../Style/ResultadosStyle.css">
                 <script type="text/javascript" src="../JS/jquery-3.3.1.min.js"></script>
                 <script type="text/javascript" src="../JS/bootstrap.js"></script>
            </meta>
        </meta>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background: #003366">

            <div class="navbar-header">
             <img src="../images/LogoUp.png" align="left" alt="logo" style="width:70px;margin-top: 5px;margin-left: 20px;margin-bottom: 5px">

             <div style="margin-top: 13px;margin-left: 85px">
              <p style="color: #ffffff;font-size: 18px;font-family: Calisto MT">UNIVERSIDAD DE</p>
               <p style="color: #ffffff;font-size:36px;margin: -3.2% 0;font-family: Calisto MT">PANAMÁ</p>
               <p style="color: #ffffff;margin: 0.08% 0;margin-left: 190px;margin-top: -69px">Vicerrectoría Académica</p>
               <p style="color: #ffffff;margin: 0.08% 0;margin-left: 190px;">Dirección General de Admisión</p>
               <p style="color: #ffffff;margin: 0.08% 0;margin-left: 190px;">Sistema de Gestión de Resultados Académicos</p>
             </div>

             <div id="vertical-bar" style="margin-top:-65px;"></div>

            </div>
            <!-- /.navbar-header -->

            <!-- <ul class="nav navbar-top-links navbar-right" style="margin-top: 42px">
                 <p style="color: #ffffff;margin-right: 30px;margin-top: 10px" >Bienvenido <?php echo $_SESSION['name']; ?> &nbsp     | &nbsp
                    <?php include 'setTime.php';?>
                  &nbsp|&nbsp <b><a href="../logout/logout.php" title="Salir del sistema" style="color:#ffff00";>Salir</a></b></p>
            </ul> -->


        </nav>

       <div class="container-fluid">
        

        <?php

//GET DATA FROM MAIN TABLE
$cedula_edit = $_GET["cedula"];
$state = $_GET["state"];
echo "<h2>Editar Registro ".$cedula_edit ."</h2>";

if ($state == 1) {
   echo "<div class='alert alert-success col-md-3' style='margin-left: 850px;margin-top: -50px' role='alert'>
  <strong>Actualizado!</strong> El registro fue actualizado con exito.
</div>";
}


?>


<form  method="POST" action="../Scripts/saveDataOneInscritos.php"> 
     <div class="pull-right">
           <input type="submit" style="margin-bottom: 15px;margin-top: -50px" class="btn btn-warning btn-lg" value="Guardar">
        </div>
 <table class="table table-bordered"> 
    <tbody>
<?php

$ced_to_find = explode("-", $cedula_edit);
//Obtener el id para buscar desde js
//var_dump($ced_to_find);
//$fullDataResultados = showAllDataResultados($ced_to_find[0],$ced_to_find[1],$ced_to_find[2],$ced_to_find[3]);
$fullDataInscrito = showAllDataInscrito($ced_to_find[0],$ced_to_find[1],$ced_to_find[2],$ced_to_find[3]);
$fInscrito        = convert_object_to_array($fullDataInscrito);
//var_dump($fullDataInscrito);
//
//var_dump($fResultados);
//FILL NEW ARRAY
$fillTable   = showResourceInscrito();
$resourcesDb = convert_object_to_array($fillTable);
$newEstData  = array();

//INICIALIZADOR
$j = 0;
while ($j <= 144) {

     array_push($newEstData, $fInscrito[0][$resourcesDb[$j]['puredb']]);
    $j++;
}

// <td style='font-size: 10px;text-align:left;color: #000000'>".$newEstData[$i]."</td>
for ($i = 0; $i < 20; $i++) {

     $fillTable = showResourceInscrito();
     $resources = convert_object_to_array($fillTable);

    echo '<tr style="font-size: 13px;text-align:left; color: #000000">';
    echo "
                    <td class='success'>" . $resources[$i]['recurso'] . " </td>
                    <td><input type='text' name=". $resources[$i]['recurso'] ." value='".$newEstData[$i]."'></td>

                    <td class='success'>" . $resources[$i + 20]['recurso'] . "</td>
                    <td><input type='text' name=". $resources[$i + 20]['recurso'] ." value='".$newEstData[$i + 20]."'></td>

                    <td class='success'>" . $resources[$i + 40]['recurso'] . "</td>
                    <td><input type='text' name=". $resources[$i + 40]['recurso'] ." value='" . $newEstData[$i+40] . "'></td>

                    <td class='success'>" . $resources[$i + 60]['recurso'] . "</td>
                    <td><input type='text' name=". $resources[$i + 60]['recurso'] ." value='" . $newEstData[$i+60] . "'></td>

                    <td  class='success'>" . $resources[$i + 80]['recurso'] . "</td>
                    <td><input type='text' name=". $resources[$i + 80]['recurso'] ." value='" . $newEstData[$i+80] . "'></td>
                    ";

}


?>      
      </tr>
       
    </tbody>
  </table>



</form>



</div>
    </body>
</html>