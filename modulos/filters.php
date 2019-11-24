<!-- <form class="form-inline" action="../pagesAdm/inscritos.php" method="post" style="margin-top: -7px">-->

  <span>Filtro local:</span>
  <select name="sedes"  id="lista_sedes" onChange='obtenerAreas(this.value)'>
   <option >Sede</option>
   <?php
$listaSedes = getSedes();
if (isset($_SESSION['sede'])) {

    foreach ($listaSedes as $item) {

        if ($_SESSION['sede'] == $item->codigo_sede) {
            echo "<option value='$item->id_sede' selected>" . $item->codigo_sede . "-" . $item->nombre_sede . "</option> ";
        } else {
            echo "<option value='$item->id_sede'>" . $item->codigo_sede . "-" . $item->nombre_sede . "</option> ";
        }

    }

} else {
    foreach ($listaSedes as $item) {
        echo "<option value='$item->id_sede'>" . $item->codigo_sede . "-" . $item->nombre_sede . "</option> ";
    }
}

?>
</select>

<span> donde :</span>
<select name="areas"  id="lista_areas" onChange='obtenerFacultades(this.value)'>
  <option value="" >Área</option>
</select>
<span>en:</span>
<select name="facultades" id="lista_facultades" onChange='obtenerEscuela()' >
 <option  value='' >Facultad</option>
</select>

 <span>donde:</span>
  <select  name="escuelas" id="lista_escuelas" onChange='obtenerCarreras()' >
   <option  value=''>Escuela</option>
 </select>

 <span>está: </span>
  <select name="carreras" id="lista_carreras">
   <option value='' >Carrera</option>
 </select>

<!--<button type="button" onclick="filtrarTabla()" title="Filtrar registros en base a su selección " class="btn btn-default btn-xs pull-right" style="width: 100px"  ><span class="glyphicon glyphicon-filter"></span> <span>Filtrar</span> </button>-->
<div class="pull-right">

  <?php

$url = explode("/SGRA/pagesAdm/", $_SERVER["REQUEST_URI"]);
//var_dump($url);
$pagesAccessF = array("dashboard.php", "inscritos.php", "certificacion.php", "validacion.php", "reportes.php");
if ($url[1] == $pagesAccessF[2]) {
    
echo "<button type='button' class='btn btn-info btn-sm' onclick='filtrarTabla()' title='Filtrar registros en base a su selección'>Filtrar</button>
<button type='button' class='btn btn-success btn-sm' onclick='getIDToExport()'> Exportar Registros</button>
<button type='button' class='btn btn-primary btn-sm'  data-toggle='modal' data-target='#tipoCertificaciones' ><span class='glyphicon glyphicon-hourglass'></span> Generar Certificaciones</button>";
}
else if($url[1] == $pagesAccessF[4]){
  echo " <button type='button' class='btn btn-info btn-sm' onclick='filtrarTabla()' title='Filtrar registros en base a su selección'>Filtrar</button>";

}else{
  echo " <button type='button' class='btn btn-info btn-sm' onclick='filtrarTabla()' title='Filtrar registros en base a su selección'>Filtrar</button>

<button type='button' class='btn btn-success btn-sm' onclick='getIDToExport()'> Exportar Registros</button>";
 
}
?>


</div>





<!--
</form>
-->
