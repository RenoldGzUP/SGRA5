<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';

$id_cedula = explode("-",$_POST["idCID"]);

///////////////////CONSULTA SQL
$testStudent = getTestUSER($id_cedula[0],$id_cedula[1],$id_cedula[2],$id_cedula[3]);

////////////////////////////////////////////////MODAL//////////////////////////////////////////

echo " <tr>
                    <td><label class='control-label'>Promedio de Secundaria</label></td>
                    <td><input id ='indice_ps' class='form-control'   type='text' name='ps'  value=" . $testStudent->ps . " ></td>
                  </tr>
                  <tr>
                    <td><label class='control-label'>Prueba de Capacidades Academicas</label></td>
                    <td><input id ='indice_pca' class='form-control'   type='text' name='pca' value=" . $testStudent->pca . " readonly ></td>
                  </tr>
                  <tr>
                    <td><label class='control-label'>Prueba de Conocimientos Generales</label></td>
                    <td><input id ='indice_pcg' class='form-control'   type='text' name='pcg'   value=" . $testStudent->pcg . " readonly></td>
                  </tr>
                  <tr>
                    <td><label class='control-label'>GATB</label></td>
                    <td><input id ='indice_gatb' class='form-control' type='text'   name='gatb'  value=" . $testStudent->gatb . " readonly></td>
                  </tr>
                  <tr>";
echo '
                    <td colspan="2"> <div class="pull-right"> <button data-dismiss="modal" onclick="saveDataTest(\'' .$_POST["idCID"]. '\')" type="button" name="btnsave" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span> Actualizar Pruebas</button></div>  </td>
                  </tr>
                  ';
