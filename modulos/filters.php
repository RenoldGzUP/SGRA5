 <form class="form-inline" action="../pagesAdm/inscritos.php" method="post" style="margin-top: -7px">
  <span>Filtro local:</span>
  <select name="sedes"  id="lista_sedes" onChange='obtenerAreas(this.value)'>
   <option >Seleccione Sede</option>
   <?php
include '../Consultas/Sedes.php';
$listaSedes = getPHPSedes();
foreach ($listaSedes as $item) {
    echo "<option value='$item->id_sede'>" . $item->codigo_sede . "-" . $item->nombre_sede . "</option> ";
}
?>
</select>

<span> donde :</span>
<select name="areas"  id="lista_areas" onChange='obtenerFacultades(this.value)'>
  <option >Seleccione Area</option>
</select>
<span>en:</span>
<select name="facultades" id="lista_facultades" onChange='obtenerEscuela()' >
 <option >Seleccione Facultad</option>
</select>

<button type="button submit" title="Filtrar registros en base a su selección " class="btn btn-default btn-xs pull-right" style="width: 200px"  ><span class="glyphicon glyphicon-filter"></span> <span>Aplicar filtros</span> </button>

<div style="margin-top: 12px">
 <span>Filtros Academicos: </span>
  <select name="escuelas" id="lista_escuelas" onChange='obtenerCarreras()' >
   <option >Seleccione Escuela</option>
 </select>

 <select name="carreras" id="lista_carreras">
   <option >Seleccione Carrera</option>
 </select>
</div>

</form>

