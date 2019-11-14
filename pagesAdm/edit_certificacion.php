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
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
                    </script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
                    </script>
                </link>
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
               <p style="color: #ffffff;margin: 0.08% 0;margin-left: 190px;margin-top: -69px">Vicerrectoría Academica</p>
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
        <div class="pull-right">
            <a href="#" class="btn btn-warning "><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</a>
        </div>

        <?php

//GET DATA FROM MAIN TABLE
$cedula_edit = $_GET["cedula"];
echo "<h2>Editar Registro ".$cedula_edit ."</h2>";
?>

 <table class="table table-bordered"> 
    <tbody>
<?php

$ced_to_find = explode("-", $cedula_edit);

//Obtener el id para buscar desde js

$fullDataResultados = showAllDataResultados($ced_to_find[0],$ced_to_find[1],$ced_to_find[2],$ced_to_find[3]);
$fResultados = convert_object_to_array($fullDataResultados);
//
//var_dump($fResultados);
//FILL NEW ARRAY
$fillTable   = showResourceResultados();
$resourcesDb = convert_object_to_array($fillTable);
$newEstData  = array();

//INICIALIZADOR
$j = 0;
while ($j <= 144) {

    array_push($newEstData, $fResultados[0][$resourcesDb[$j]['puredb']]);
    $j++;
}

// <td style='font-size: 10px;text-align:left;color: #000000'>".$newEstData[$i]."</td>
for ($i = 0; $i < 25; $i++) {

    $fillTable = showResourceResultados();
    $resources = convert_object_to_array($fillTable);

    echo '<tr style="font-size: 10px;text-align:left; color: #000000">';
    echo "
                    <td class='success'>" . $resources[$i]['recurso'] . " </td>
                    <td><input type='text' name='FirstName' value=" . $newEstData[$i] . "></td>

                    <td class='success'>" . $resources[$i + 25]['recurso'] . "</td>
                    <td><input type='text' name='FirstName' value=" . $newEstData[$i+25] . "></td>

                    <td class='success'>" . $resources[$i + 45]['recurso'] . "</td>
                    <td><input type='text' name='FirstName' value=" . $newEstData[$i+45] . "></td>

                    <td class='success'>" . $resources[$i + 65]['recurso'] . "</td>
                    <td><input type='text' name='FirstName' value=" . $newEstData[$i+65] . "></td>

                    <td  class='success'>" . $resources[$i + 85]['recurso'] . "</td>
                    <td><input type='text' name='FirstName' value=" . $newEstData[$i+85] . "></td>

                    <td  class='success'>" . $resources[$i + 105]['recurso'] . "</td>
                    <td><input type='text' name='FirstName' value=" . $newEstData[$i+105] . "></td>
                    ";

                    if ($i+125 <= 144) {
                        echo "<td  class='success'>" . $resources[$i + 125]['recurso'] . "</td>
                     <td><input type='text' name='FirstName' value=" . $newEstData[$i+125] . "></td>";
                    }

}


?>      
      </tr>
       
    </tbody>
  </table>
</div>
    </body>
</html>