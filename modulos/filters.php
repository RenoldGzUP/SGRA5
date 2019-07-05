  <select name="sedes"  id="lista_sedes" onChange='obtenerAreas(this.value)'>
     <option >Seleccione Sede</option>
     <?php
       include '../Consultas/Sedes.php';
          $listaSedes = getPHPSedes(); 
         foreach( $listaSedes as $item)
          {
            echo "<option value='$item->id_sede'>".$item->codigo_sede."-".$item->nombre_sede."</option> ";
          }	
      ?>
  </select>

  donde :
  <select name="areas"  id="lista_areas" onChange='obtenerFacultades(this.value)'>
    <option >Seleccione Area</option>
  </select>
  en: 
  <select name="facultades" id="lista_facultades" onChange='obtenerEscuela()' >
   <option >Seleccione Facultad</option>
  </select>

  <button type="button" title="Filtrar registros en base a su selección " class="btn btn-default btn-xs pull-right" style="width: 200px" ><span class="glyphicon glyphicon-filter"></span> Aplicar filtros</button>

  <div style="margin-top: 12px">
      Filtros Academicos:
      <select name="escuela" id="lista_escuelas" onChange='obtenerCarreras()' >
       <option >Seleccione Escuela</option> 
      </select>

       <select name="carreras" id="lista_carreras">
         <option >Seleccione Carrera</option>       
       </select>   
  </div>

