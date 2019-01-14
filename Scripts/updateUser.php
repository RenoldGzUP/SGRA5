 <!-- Modal EDITAR USUARIOS-->
  <div class="modal fade" id="editUser" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar un registro </h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              <form action="../Scripts/insertNewUser.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                <table class="table table-bordered table-responsive" align="center">

                 <?php
                 $idUSER = $_POST["idUser"];
                 $dataResult = getAllDataUser($idUser);

                 ?>

                  <tr>
                    <td><label class="control-label">Nombre</label></td>
                    <td><input class="form-control" type="text" name="name" value="<?php $dataResult->name ?>" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Apellido</label></td>
                    <td><input class="form-control" type="text" name="lastname" value="" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Nombre Usuario</label></td>
                    <td><input class="form-control" type="text" name="username" placeholder="Formato [ nombre.apellido ]" value="" /></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Email</label></td>
                    <td><input class="form-control" type="text" name="email"  value="" /></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Tipo de Usuario</label></td>
                    <td><input class="form-control" type="text" name="rol"  value=""  placeholder="1 Común - 2 Administrador"/></td>
                  </tr>

                  <tr>
                    <td><label class="control-label">Contraseña</label></td>
                    <td><input class="form-control" type="password"  autocomplete="off" name="password"  value="" /></td>
                  </tr>

                  <tr>
                    <td colspan="2"> <div class="pull-right"> <button type="submit" name="btnsave" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span> Actualizar</button></div>  </td>
                </tr>

              </table>

            </form>
          </div>


          <!-- /.col-lg-4 (nested) -->
          <div class="col-lg-8">
            <div id="morris-bar-chart"></div>
          </div>
          <!-- /.col-lg-8 (nested) -->
        </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

