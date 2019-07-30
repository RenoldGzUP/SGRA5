<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();
// Turn off all error reporting
error_reporting(0);
//GET POST TYPE
$idUser = $_POST["idUser"];
$idPOST = $_POST["idType"];
if ($idPOST == 1) {
//$idUser = $_POST["idUser"];
    //VALIDAR QUE TIPO DE USUARIO ES
    $dataResult = getTypeUser($idUser);
    echo $dataResult->type;
} else if ($idPOST == 2) {
    $pages = getAllowPages($idUser);
    echo $pages->acceso2 . "|" . $pages->acceso3 . "|" . $pages->acceso4 . "|" . $pages->acceso5;
} else {
//TRAER TODA LA INFORMACION DEL USUARIO
    $dataUser = getDataUserUniq($idUser);
//MOSTRAR LA INFORMACION DEL USUARIO EN LA TABLA DEL MODAL
    printForm($dataUser->name, $dataUser->lastname, $dataUser->nombre_usuario, $dataUser->email, $dataUser->type, $dataUser->id_usuario);
}
/////////////////////////////////////////////////////////////////////////////////
//FUNTION
function printForm($NAME, $LASTNAME, $USERNAME, $EMAIL, $TYPE, $ID)
{
    echo "<tr>
  <td><label class='control-label'>Nombre</label></td>
  <td><input class='form-control' required  type='text' name='name' value=" . $NAME . " /></td>
</tr>
<tr>
  <td><label class='control-label'>Apellido</label></td>
  <td><input class='form-control' required  type='text' name='lastname' value=" . $LASTNAME . " /></td>
</tr>
<tr>
  <td><label class='control-label'>Nombre Usuario</label></td>
  <td><input class='form-control' required  type='text' name='username'   value=" . $USERNAME . " /></td>
</tr>
<tr>
  <td><label class='control-label'>Email</label></td>
  <td><input class='form-control' type='email' required   name='email'  value=" . $EMAIL . " /></td>
</tr>
<tr style='display: none;'>
  <td><label class='control-label'>***</label></td>
  <td><input type='hidden' class='form-control'   name='id_user'  value=" . $ID . " /></td>
</tr>
<tr>
  <tr>
    <td><label class='control-label'>Tipo de Usuario</label></td>
    <td> <center>
      <label  class='checkbox-inline'><input id='usuarioRegular' required name='chkUser[]' type='checkbox' onclick='clickUsuario()' value='1' >Usuario Regular</label>
      <label  class='checkbox-inline'><input id='usuarioEspecial' required  name='chkUser[]' type='checkbox' onclick='clickUsuarioEspecial()'  value='3' >Usuario Especial</label>
      <label  class='checkbox-inline'><input id='administrador' required  name='chkUser[]'  type='checkbox' onclick='clickAdministrador()' value='2' >Administrador</label>
      </center>
    </td>
  </tr>
  ";
    if ($TYPE == 3) {
        echo "<tr id='permitionUser'>";
    } else {
        echo "<tr id='permitionUser' style='display: none;'>";
    }
    echo "
      <td id='pages'><label class='control-label'>Seleccione Permisos</label></td>
      <td><center id='checkPages'>
        <label  class='checkbox-inline'><input id='page1'  name='chkPage[]'  type='checkbox' onclick='return checkBoxOK()' value='1' >Inscritos</label>
        <label  class='checkbox-inline'><input id='page2'  name='chkPage[]'  type='checkbox' onclick='return checkBoxOK()'  value='2' >Certificacion</label>
        <label  class='checkbox-inline'><input id='page3'  name='chkPage[]'  type='checkbox' onclick='return checkBoxOK()'  value='3' >Validación</label>
        <label  class='checkbox-inline'><input id='page4'  name='chkPage[]' type='checkbox' onclick='return checkBoxOK()'  value='4' >Reportes</label>
        </center>
      </td>
    </tr>";
    echo "<tr>
      <td colspan='2'> <div class='pull-right'> <button type='submit' name='btnsave' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-floppy-disk'></span> Actualizar Datos</button></div>  </td>
    </tr>";
}
