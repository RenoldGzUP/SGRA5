<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once('classConexionDB.php');
openConnection();
include_once('library_db_sql.php');
session_start();

//Obtener el id para buscar desde js

$idSearchInscrito =  $_POST["idInscrito"];

//echo "Recibido! -->".$idSearchInscrito;

$fullDataInscrito = showAllDataInscrito($idSearchInscrito);
$fInscrito = convert_object_to_array($fullDataInscrito);


//FILL NEW ARRAY
$fillTable = showResourceInscrito();
$resourcesDb = convert_object_to_array($fillTable);
$newEstData = array();

//INICIALIZADOR
$j = 0;

while ($j <= 97) {
   
array_push($newEstData,$fInscrito[0][$resourcesDb[$j]['puredb']]);
$j++;

}


for ($i=0; $i < 20 ; $i++) { 

                    $fillTable = showResourceInscrito();
                    $resources = convert_object_to_array($fillTable);
                    
                    echo '<tr style="font-size: 10px;text-align:left; color: #000000">';
                    echo "
                    <td class='success'>".$resources[$i]['recurso']." </td>
                    <td style='font-size: 10px;text-align:left;color: #000000'>".$newEstData[$i]."</td>

                    <td class='success'>".$resources[$i+20]['recurso']."</td>
                    <td style='font-size: 10px;text-align:left;color: #000000'>".$newEstData[$i+20]."</td>

                    <td class='success'>".$resources[$i+40]['recurso']."</td>
                    <td style='font-size: 10px;text-align:left;color: #000000'>".$newEstData[$i+40]."</td>

                    <td  class='success'>".$resources[$i+60]['recurso']."</td>
                    <td style='font-size: 10px;text-align:left;color: #000000'>".$newEstData[$i+60]."</td>

                    <td  class='success'>".$resources[$i+80]['recurso']."</td>
                    <td style='font-size: 10px;text-align:left;color: #000000'>".$newEstData[$i+80]."</td>
                   
                    </tr>";
                  }


?>