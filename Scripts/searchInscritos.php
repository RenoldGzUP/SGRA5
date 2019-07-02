<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once('classConexionDB.php');
openConnection();
include_once('library_db_sql.php');
session_start();


$idSearch = $_REQUEST['idSearch'];
$estSearch = searchInscritoI($idSearch);
//var_dump($estSearch);
$newData = convert_object_to_array_one($estSearch);
//print_r($newData);
$leng = sizeof($newData);
$i = 0 ;

//DATA LOAD INSIDE OF TABLE
if (is_array($newData)) {
	//while ($i < $leng) {
		
		//$counter = $start_from + $i + 1;
		 echo'<tr id="row'.$newData[$i]['n_ins'].'" style="font-size: 11px;text-align:center">';
		  echo'<td style="text-align: center;"><input type="checkbox" class="checkthis" value='.$newData[$i]['n_ins'].'></td>';
		   echo "<td> </td>";
		    echo '<td id="name'.$newData[$i]['n_ins'].'">'.$newData[$i]['nombre'].'</td>';
		     echo '<td id="lastname'.$newData[$i]['n_ins'].'">'.$newData[$i]['apellido'].'</td>';
		      echo '<td id="CID'.$newData[$i]['n_ins'].'">'.$newData[$i]['cedula'].'</td>';
		       echo '<td id="n_ins'.$newData[$i]['n_ins'].'">'.$newData[$i]['n_ins'].'</td>';
		        echo '<td id="sede'.$newData[$i]['n_ins'].'"'.$newData[$i]['sede'].'</td>';
		         echo '<td id="fac_ia'.$newData[$i]['n_ins'].'">'.$newData[$i]['fac_ia'].'</td>';
		          echo '<td id="esc_ia'.$newData[$i]['n_ins'].'">'.$newData[$i]['esc_ia'].'</td>';
		           echo '<td id="car_ia'.$newData[$i]['n_ins'].'">'.$newData[$i]['car_ia'].'</td>';
		            echo '<td id="fac_iia'.$newData[$i]['n_ins'].'">'.$newData[$i]['fac_iia'].'</td>';
		          	 echo '<td id="esc_iia'.$newData[$i]['n_ins'].'">'.$newData[$i]['esc_iia'].'</td>';
		              echo '<td id="car_iia'.$newData[$i]['n_ins'].'">'.$newData[$i]['car_iia'].'</td>';
		               echo '<td id="fac_iiia'.$newData[$i]['n_ins'].'">'.$newData[$i]['fac_iia'].'</td>';
		          	    echo '<td id="esc_iiia'.$newData[$i]['n_ins'].'">'.$newData[$i]['esc_iia'].'</td>';
		                 echo '<td id="car_iiia'.$newData[$i]['n_ins'].'">'.$newData[$i]['car_iia'].'</td>';       
		                 echo '<td>
         <button type="button" id="edit_button'.$newData[$i]['n_ins'].'" class="btn btn-warning btn-xs" onclick="modal_edit(\''.$newData[$i]['n_ins'].'\');" ><span class="glyphicon glyphicon-pencil"></span>    </button>
         <button type="button"  id="save_button'.$newData[$i]['n_ins'].'"  style="display:none;" class="btn btn-success btn-xs"  onclick="save_row(\''.$newData[$i]['n_ins'].'\');"><span class="glyphicon glyphicon-floppy-saved"></span> </button>
         <button type="button" id="delete_button'.$newData[$i]['n_ins'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" onclick="delete_row(\''.$newData[$i]['n_ins'].'\');"></span> </button>

          					</td>';

		  echo"</tr>";
		  //COUNTER   
		//  $i = $i +1;
	//}
//WHILE END



}//END IF
else{
	echo'<tr><td colspan="17" style="text-align: center;" >No se encontraron resultados </td></tr>';}





function convert_object_to_array_one($data) {

    if (is_object($data)) {
        $data = get_object_vars($data);
    }

    if (is_array($data)) {
        return array_map(__FUNCTION__, $data);
    }
    else {
        return $data;
    }
}

?>