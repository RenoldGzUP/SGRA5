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

            <ul class="nav navbar-top-links navbar-right" style="margin-top: 42px">
                 <p style="color: #ffffff;margin-right: 30px;margin-top: 10px" >Bienvenido <?php echo $_SESSION['name']; ?> &nbsp;     | &nbsp;
                    <?php include 'setTime.php';?>
                  &nbsp;|&nbsp; <b><a href="../logout/logout.php" title="Salir del sistema" style="color:#ffff00;">Salir</a></b></p>
            </ul>


        </nav>


          <!--<div class="container-fluid " >-->
          <nav class="navbar" align="center" style="background: #d6d5d5;min-height: 25px;;margin-top: -1px" >
                 <?php
$url = explode("/SGRA/pagesAdm/", $_SERVER["REQUEST_URI"]);
colorButtonAdm($url[1]);
?>
          </nav>
          <!--   </div>-->



<?php

function colorButtonAdm($page)
{
    $url_actual = $page;
    //echo "<b>$url_actual</b>";
    $pagesAccess  = array("dashboard.php", "inscritos.php", "certificacion.php", "validacion.php", "reportes.php", "datos.php", "usuarios.php");
    $labelButton  = array("Inicio", "Inscritos", "Certificación", "Validación", "Reportes", "Datos", "Usuarios");
    $tittleButton = array('Pantalla_Principal', 'Estudiantes_Inscritos', 'Resultado_de_las_pruebas', 'Validar_estudiantes', 'Crear_reportes', 'Data_del_sistema', 'Usuarios_del_sistema');

    for ($i = 0; $i <= 6; $i++) {
        if ($url_actual == $pagesAccess[$i]) {
            echo "<a href=" . $pagesAccess[$i] . " title=" . $tittleButton[$i] . " style='margin-left: 18px;width: 90px' class='btn btn-success btn-sm active'>" . $labelButton[$i] . "</a>";
        } else {
            echo "<a href=" . $pagesAccess[$i] . " title=" . $tittleButton[$i] . " style='margin-left: 18px;width: 90px' class='btn btn-warning btn-sm'>" . $labelButton[$i] . "</a>";
        }

    }

}

?>
