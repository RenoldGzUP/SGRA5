<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';

//GET DATA FROM-END

$id_cedula = explode("-",$_POST["idCID"]);
$tableResultados = $_POST["table2"];

///////////////////CONSULTA SQL
$testStudent = getTestUSER($id_cedula[0],$id_cedula[1],$id_cedula[2],$id_cedula[3],$tableResultados);

////////////////////////////////////////////////MODAL//////////////////////////////////////////

echo " 
                  <tr>
                    <td><label class='control-label'>Sede</label></td>
                    <td><input id ='sede' class='form-control'   type='text' name='ps'  value=" . $testStudent->sede . " ></td>
                  </tr>

                  <tr>
                    <td><label class='control-label'>Facultad</label></td>
                    <td><input id ='facultad' class='form-control'   type='text' name='ps'  value=" . $testStudent->facultad. " ></td>
                  </tr>

                  <tr>
                    <td><label class='control-label'>Escuela</label></td>
                    <td><input id ='escuela' class='form-control'   type='text' name='ps'  value=" . $testStudent->escuela. " ></td>
                  </tr>

                  <tr>
                    <td><label class='control-label'>Área</label></td>
                    <td><input id ='area' class='form-control'   type='text' name='ps'  value=" . $testStudent->areap . " ></td>
                  </tr>

                  <tr>
                    <td><label class='control-label'>Promedio de Secundaria</label></td>
                    <td><input id ='indice_ps' class='form-control'   type='text' name='ps'  value=" . $testStudent->ps . " ></td>
                  </tr>
                  <tr>
                    <td><label class='control-label'>Prueba de Capacidades Académicas</label></td>
                    <td><input id ='indice_pca' class='form-control'   type='text' name='pca' value=" . $testStudent->pca . " ></td>
                  </tr>
                  <tr>
                    <td><label class='control-label'>Prueba de Conocimientos Generales</label></td>
                    <td><input id ='indice_pcg' class='form-control'   type='text' name='pcg'   value=" . $testStudent->pcg . " ></td>
                  </tr>
                  <tr>
                    <td><label class='control-label'>GATB</label></td>
                    <td><input id ='indice_gatb' class='form-control' type='text'   name='gatb'  value=" . $testStudent->gatb . " ></td>
                  </tr>
                  <tr>";
echo '
                    <td colspan="2"> <div class="pull-right"> <button data-dismiss="modal" onclick="saveDataTest(\'' .$_POST["idCID"]. '\')" type="button" name="btnsave" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span> Actualizar Datos</button></div>  </td>
                  </tr>
                  ';
