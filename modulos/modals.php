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
                <center><h4>Procesando certificaciones...</h4></center>
                <center><h5>Este proceso puede demorar un poco</h5></center>
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
          <button id="deleteTaskBtt" type="button" class="btn btn-danger" data-dismiss="modal">Sí, Borrar</button>
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
         <center><button type="button" class="btn btn-success" data-dismiss="modal">OK</button></center>
        </div>
      </div>
    </div>
  </div>


    <!-- SEARCH OK -->
<div class="modal fade" id="foundRegister" role="dialog" data-keyboard="false" data-backdrop="static" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
              <center><img src='../images/found.png' width="150" height=150" /> </center>
                <center><h4>Registros encontrados</h4></center>
          </div>
        </div>
        <div class="modal-footer">
         <center><button type="button" class="btn btn-success" data-dismiss="modal">OK</button></center>
        </div>
      </div>
    </div>
  </div>
