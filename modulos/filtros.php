<div class="panel-heading" style="height: 70px">   
   <form class="form-inline" method="post" action="reportes.php">

Filtro local:
 

	<select name="sedes"  id="lista_sedes" onChange='obtenerAreas(this.value)'>
	<?php
	include '../Consultas/Sedes.php';
	$listaSedes = getPHPSedes(); 
     foreach( $listaSedes as $item){
	 echo "<option value='$item->codigo_sede'>".$item->codigo_sede."-".$item->nombre_sede."</option> ";
	}	
	?>
	</select>

 donde :
 
    <select name="areas"  id="lista_areas" onChange='obtenerFacultades(this.value)'>
	
	</select>
 en: 
    <select name="facultades" id="lista_facultades" >
	<option >Seleccione Facultad</option>
	
	</select>

<button type="submit button" class="btn btn-default btn-xs pull-right" style="width: 200px" ><span class="glyphicon glyphicon-filter"></span> Aplicar filtros</button>


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
 </form>
</div>