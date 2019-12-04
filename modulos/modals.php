<!--LOADING MODAL-->
<div class="modal fade" id="loadingModal" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/loading.gif' width="100" height="100" /> </center>
          <center><h2>Cargando...</h2></center>
        </div>
      </div>
    </div>
  </div>
</div>
<!--PROCESS MODAL-->
<div class="modal fade" id="processModal" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/loading.gif' width="100" height="100" /> </center>
          <center><h4>Procesando archivos...</h4></center>
          <center><h5>Este proceso puede durar unos minutos</h5></center>
          <center><h5>El archivo se abrirá en otra ventana</h5></center>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ALERT MODAL ERROR-->
<div class="modal fade" id="errorModal" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/alert1.png' width="100" height="100" /> </center>
          <center><h3>No hay registros seleccionados.</h3></center>
        </div>
      </div>
      <div class="modal-footer">
        <center><button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button></center>
      </div>
    </div>
  </div>
</div>
<!-- DONE -->
<div class="modal fade" id="doneModal" role="dialog" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/checked.png' width="100" height="100" /> </center>
          <center><h4>Certificaciones Generadas</h4></center>
          <center><h5>El archivo se abrirá en otra ventana</h5></center>
        </div>
      </div>
      <div class="modal-footer">
        <center><button type="button" class="btn btn-success" data-dismiss="modal">OK</button></center>
      </div>
    </div>
  </div>
</div>
<!-- DELETE ROW-->
<div class="modal fade" id="deleteModal" role="dialog" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/delete.png' width="200" height="200" /> </center>
          <center><h4>¿Desea borrrar el registro por completo?</h4></center>
        </div>
      </div>
      <div class="modal-footer">
        <center>
        <button type="button" class="btn btn-success" data-dismiss="modal">Volver</button>
        <button id="deleteTaskBtt" onclick="deleteComplete()" type="button" class="btn btn-danger" data-dismiss="modal">Sí, Borrar</button>
        </center>
      </div>
    </div>
  </div>
</div>
<!-- DELETE USER ROW-->
<div class="modal fade" id="deleteUserModal" role="dialog" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/delete.png' width="200" height="200" /> </center>
          <center><h5>¿Seguro desea borrar a <span id="userNameModal"></span>?</h5></center>
        </div>
      </div>
      <div class="modal-footer">
        <center>
        <button type="button" class="btn btn-success" data-dismiss="modal">Volver</button>
        <button id="deleteUserTaskBtt" type="button"  onclick="confirmDeleteUser()" class="btn btn-danger" data-dismiss="modal">Sí, Borrar</button>
        </center>
      </div>
    </div>
  </div>
</div>
<!-- DONE DELETE ROW -->
<div class="modal fade" id="doneDeleteModal" role="dialog" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/checked.png' width="100" height="100" /> </center>
          <center><h5>Registro eliminado</h5></center>
        </div>
      </div>
      <div class="modal-footer">
        <center><button type="button"  class="btn btn-success" data-dismiss="modal">OK</button></center>
      </div>
    </div>
  </div>
</div>
<!-- DONE  -->
<div class="modal fade" id="doneModalUser" role="dialog" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/checked.png' width="100" height="100" /> </center>
          <center><h5>Contraseña restaurada, proporcione al usuario la contraseña de respaldo</h5></center>
        </div>
      </div>
      <div class="modal-footer">
        <center><button type="button"  class="btn btn-success" data-dismiss="modal">OK</button></center>
      </div>
    </div>
  </div>
</div>
<!--EXIST OK -->
<div class="modal fade" id="foundRegister" role="dialog" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src="../images/validacionOK.png" width="150" height="150" /> </center>
          <center><h4>Usuario ya validado!</h4></center>
        </div>
      </div>
      <div class="modal-footer">
        <center><button type="button" class="btn btn-success" data-dismiss="modal">OK</button></center>
      </div>
    </div>
  </div>
</div>
<!-- WRONG OK -->
<div class="modal fade" id="wrongRegister" role="dialog" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/wrong.png' width="150" height="150" /> </center>
          <center><h4>Verifique los valores de selección!</h4></center>
        </div>
      </div>
      <div class="modal-footer">
        <center><button type="button" class="btn btn-success" data-dismiss="modal">OK</button></center>
      </div>
    </div>
  </div>
</div>
<!-- FOUNDED OK -->
<div class="modal fade" id="dataRegister" role="dialog" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/found.png' width="150" height="150" /> </center>
          <center><h4>Registros encontrados</h4></center>
        </div>
      </div>
      <div class="modal-footer">
        <center><button type="button" class="btn btn-success" data-dismiss="modal">OK</button></center>
      </div>
    </div>
  </div>
</div>
<!-- WITHOUT DATA -->
<div class="modal fade" id="withoutRegister" role="dialog" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/wrongFound.png' width="150" height="150" /> </center>
          <center><h4>Se encontro un registro incompleto </h4></center>
          <center><h5>sólo existe  data en una tabla de datos</h5></center>
        </div>
      </div>
      <div class="modal-footer">
        <center><button type="button" class="btn btn-success" data-dismiss="modal">OK</button></center>
      </div>
    </div>
  </div>
</div>
<!--VALIDATION OK -->
<div class="modal fade" id="validationRegister" role="dialog" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/validacionOK20.png' width="150" height="150" /> </center>
          <center><h4>Usuario Validado con exito!</h4></center>
        </div>
      </div>
      <div class="modal-footer">
        <center><button type="button" class="btn btn-success" data-dismiss="modal">OK</button></center>
      </div>
    </div>
  </div>
</div>
<!--Not CSV  file -->
<div class="modal fade" id="csvnotFound" role="dialog" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/csv.png' width="150" height="150" /> </center>
          <center><h4>El archivo cargado no esta en formato CSV</h4></center>
        </div>
      </div>
      <div class="modal-footer">
        <center><button type="button" class="btn btn-success" data-dismiss="modal">OK</button></center>
      </div>
    </div>
  </div>
</div>
<!--SELECT A FILE -->
<div class="modal fade" id="notselectFile" role="dialog" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/NotFoundCSV.png' width="120" height="150" /> </center>
          <center><h4>No se ha seleccionado ningún archivo CSV </h4></center>
        </div>
      </div>
      <div class="modal-footer">
        <center><button type="button" class="btn btn-success" data-dismiss="modal">OK</button></center>
      </div>
    </div>
  </div>
</div>
<!-- TIPO DE REPORTE DE DATOS -->
<div class="modal fade" id="typereporte" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Propiedades del Reporte</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">Campo para Indexación </div>
              <div class="panel-body">
                <div id="certType" >
                  <center>
                  <label  class="checkbox-inline"><input id="nameSort" name="sortLabel" type="checkbox" value="nombre" onclick="return checkBoxToSort()" >Nombre</label>
                  <label  class="checkbox-inline"><input id="lastnameSort" name="sortLabel"  type="checkbox" value="apellido" onclick="return checkBoxToSort()"  >Apellido </label>
                  <label  class="checkbox-inline"><input id="indiceSort" checked="true" name="sortLabel" type="checkbox" value="indice" onclick="return checkBoxToSort()"  >Indice</label>
                  </center>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">Tipo de Indexación </div>
              <div class="panel-body">
                <div id="certType" >
                  <center>
                  <label  class="checkbox-inline"><input id="ascIndex" name="indexLabel" type="checkbox" value="ASC" onclick="checkBoxToIndex()" >Ascendente</label>
                  <label  class="checkbox-inline"><input id="descIndex" checked="true"  name="indexLabel" type="checkbox" value="DESC" onclick="checkBoxToIndex()" >Descendente</label>
                  </center>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="StartReportGenerate();">Aplicar Cambios</button>
      </div>
    </div>
  </div>
  </div> <!--Fin del MODAL TIPO DE REPORTE-->

  <!--NO DATA TO SHOW-->
<div class="modal fade" id="withoutDataShow" role="dialog" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <center><img src='../images/wrongFound.png' width="150" height="150" /> </center>
          <center><h4>No hay data para mostrar en la tabla</h4></center>
        </div>
      </div>
      <div class="modal-footer">
        <center><button type="button" class="btn btn-success" data-dismiss="modal">OK</button></center>
      </div>
    </div>
  </div>
</div>
