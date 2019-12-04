<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';

$numInscrito = $_POST["idInscrito"];
///////////////////CONSULTA SQL

$testStudent = getTestUSER($numInscrito);

echo " <tr>
                    <td><label class='control-label'>Promedio de Secundaria</label></td>
                    <td><input class='form-control'   type='text' name='ps'  value=" . $testStudent->ps . " /></td>
                  </tr>
                  <tr>
                    <td><label class='control-label'>Prueba de Capacidades Academicas</label></td>
                    <td><input class='form-control'   type='text' name='pca' value=" . $testStudent->pca . " /></td>
                  </tr>
                  <tr>
                    <td><label class='control-label'>Prueba de Conociemientos Generales</label></td>
                    <td><input class='form-control'   type='text' name='pcg'   value=" . $testStudent->pcg . " /></td>
                  </tr>
                  <tr>
                    <td><label class='control-label'>GATB</label></td>
                    <td><input class='form-control' type='email'   name='gatb'  value=" . $testStudent->gatb . " /></td>
                  </tr>
                  <tr>";
echo '
                    <td colspan="2"> <div class="pull-right"> <button data-dismiss="modal" onclick="saveDataTest(\'' . $numInscrito . '\')" type="button" name="btnsave" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span> Actualizar Pruebas</button></div>  </td>
                  </tr>
                  ';
