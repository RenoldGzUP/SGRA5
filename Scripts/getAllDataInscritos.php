<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once('classConexionDB.php');
openConnection();
include_once('library_db_sql.php');
session_start();

//Obtener el id para buscar

$idSearchInscrito =  $_POST["idInscrito"];
$fullDataInscrito = showAllDataInscrito($idSearchInscrito);
convert_object_to_array($fullDataInscrito);

for ($i=0; $i < 20 ; $i++) { 

                    $fillTable = showResourceInscrito();
                    $resources = convert_object_to_array($fillTable);
                    
                    echo '<tr style="font-size: 11px;text-align:center; color: #000000">';
                    echo "<td class='success'>".$resources[$i]['recurso']." </td>
                    <td>    </td>
                    <td  class='success'>".$resources[$i+20]['recurso']."</td>
                    <td>    </td>
                    <td  class='success'>".$resources[$i+40]['recurso']."</td>
                    <td>    </td>
                    <td  class='success'>".$resources[$i+60]['recurso']."</td>
                    <td>    </td>
                    <td  class='success'>".$resources[$i+80]['recurso']."</td>
                    <td>    </td>
                    </tr>";
                  }


?>