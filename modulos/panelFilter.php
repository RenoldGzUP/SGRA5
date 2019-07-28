<div class="panel panel-default " >
    <div class="panel-heading" style="height: 60px">
      <?php include '../modulos/filters.php';?>

<?php

$url = explode("/SGRA5/pagesAdm/", $_SERVER["REQUEST_URI"]);

$pagesAccessF = array("dashboard.php", "inscritos.php", "certificacion.php", "validacion.php", "reportes.php");
if ($url[1] == $pagesAccessF[2]) {
    echo "<div style='margin-top: -32px'>";
    echo "<button type='button' id='buttonCertification' class='btn btn-default btn-xs pull-right' style='width: 200px' data-toggle='modal' data-target='#tipoCertificaciones' ><span class='glyphicon glyphicon-list-alt' ></span>  Generar Certificaciones</button>";
    echo "</div>";
}

?>


    </div>
  </div>