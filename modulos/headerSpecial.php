 <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background: #003366">

            <div class="navbar-header">
             <img src="../images/LogoUp.png" align="left" alt="logo" style="width:60px;margin-top: 5px;margin-left: 20px;margin-bottom: 5px">

             <div style="margin-top: 13px;margin-left: 85px">
               <p style="color: #ffffff;font-size: 18px;font-family: Calisto MT">UNIVERSIDAD DE</p>
               <p style="color: #ffffff;font-size:36px;margin: -3.2% 0;font-family: Calisto MT">PANAMÁ</p>
               <p style="color: #ffffff;margin: 0.08% 0;margin-left: 190px;margin-top: -69px">Vicerrectoría Academica-USER*</p>
               <p style="color: #ffffff;margin: 0.08% 0;margin-left: 190px;">Dirección General de Admisión</p>
               <p style="color: #ffffff;margin: 0.08% 0;margin-left: 190px;">Sistema de Gestión de Resultados Académicos</p>
             </div>

             <div id="vertical-bar" style="margin-top:-65px;"></div>

            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right" style="margin-top: 42px">
                 <p style="color: #ffffff;margin-right: 30px;margin-top: 10px" >Bienvenido <?php echo $_SESSION['name']; ?> &nbsp     | &nbsp
                    <?php include 'setTime.php';?>
                  &nbsp|&nbsp <b><a href="../logout/logout.php" title="Salir del sistema" style="color:#ffff00";>Salir</a></b></p>
            </ul>


        </nav>


          <!--<div class="container-fluid " >-->
          <nav class="navbar" align="center" style="background: #d6d5d5;min-height: 25px;;margin-top: -1px" >

           <!--  <a href="dashboard.php" title="Pantalla Principal" style="width: 90px" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-home"></span> Inicio</a>
            <a href="inscritos.php" title="Estudiantes Inscritos" style="margin-left: 18px;width: 90px" class="btn btn-warning btn-sm">Inscritos</a>
            <a href="certificacion.php" title="Resultado de las pruebas" style="margin-left: 18px;width: 90px" class="btn btn-warning btn-sm">Certificación</a>
            <a href="validacion.php" title="Validar estudiantes" style="margin-left: 18px;width: 90px" class="btn btn-warning btn-sm">Validación</a>
            <a href="reportes.php" title="Crear reportes" style="margin-left: 18px;width: 90px" class="btn btn-warning btn-sm">Reportes</a> -->

            <?php
$url = explode("/SGRA5/pagesAdm/", $_SERVER["REQUEST_URI"]);
colorButton($url[1]);
//UpdateArray();
?>
          </nav>
          <!--   </div>-->
<?php

function colorButton($PAGE)
{
    //$url_actual = $page;
    //echo "<b>$url_actual</b>";
    $pagesAccess  = array("dashboard.php", "inscritos.php", "certificacion.php", "validacion.php", "reportes.php");
    $labelButton  = array("Inicio", "Inscritos", "Certificación", "Validación", "Reportes");
    $tittleButton = array('Pantalla_Principal', 'Estudiantes_Inscritos', 'Resultado_de_las_pruebas', 'Validar_estudiantes', 'Crear_reportes');

    $indices = UpdateArray();

    $pagesAllow = array();
    $labelAllow = array();
    $titleAllow = array();

    //IDENTIFY WHICH ARE THE LABELS THAT USER ALLOW
    for ($i = 0; $i <= count($pagesAccess); $i++) {
        for ($j = 0; $j < count($indices); $j++) {
            if ($i == $indices[$j]) {
                // echo "<-$i ->igual a -> $indices[$j]";
                array_push($pagesAllow, $pagesAccess[$i]);
                array_push($labelAllow, $labelButton[$i]);
                array_push($titleAllow, $tittleButton[$i]);
            }
        }

    }

    //////////////////////////////////

    array_unshift($pagesAllow, $pagesAccess[0]);
    array_unshift($labelAllow, $labelButton[0]);
    array_unshift($titleAllow, $tittleButton[0]);
    ///////////////////////////////

    printButon($PAGE, $pagesAllow, $labelAllow, $titleAllow);

}

function UpdateArray()
{
    $pagesAccessF = array("dashboard.php", "inscritos.php", "certificacion.php", "validacion.php", "reportes.php");
    $temporal     = getAllowPages($_SESSION['name']);
    $typeAllow    = convert_object_to_array($temporal);
    ///////////////////////////////////////
    $indices = array();

    foreach ($typeAllow as $key) {
        //echo "->  " . $key;
        if ($key != "") {
            array_push($indices, $key);
        }
    }
    return $indices;

}

function printButon($NOWPAGE, $PAGES, $LABELS, $TITLE)
{
    $url_actual = $NOWPAGE;

    for ($i = 0; $i <= count($PAGES); $i++) {
        if ($url_actual == $PAGES[$i]) {
            echo "<a href=" . $PAGES[$i] . " title=" . $TITLE[$i] . " style='margin-left: 18px;width: 90px' class='btn btn-success btn-sm active'>" . $LABELS[$i] . "</a>";
        } else if ($PAGES[$i] != "") {
            echo "<a href=" . $PAGES[$i] . " title=" . $TITLE[$i] . " style='margin-left: 18px;width: 90px' class='btn btn-warning btn-sm'>" . $LABELS[$i] . "</a>";
        }

    }

}

?>