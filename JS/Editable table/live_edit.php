<?php
include_once("config.php");
$input = filter_input_array(INPUT_POST);
//print_r($input);
// if ($input['action'] == 'edit') {
// $update_field='';
// if(isset($input['name'])) {
// $update_field.= "name='".$input['name']."'";
// } else if(isset($input['gender'])) {
// $update_field.= "gender='".$input['gender']."'";
// } else if(isset($input['address'])) {
// $update_field.= "address='".$input['address']."'";
// } else if(isset($input['age'])) {
// $update_field.= "age='".$input['age']."'";
// } else if(isset($input['designation'])) {
// $update_field.= "designation='".$input['designation']."'";
// }
// if($update_field && $input['id']) {
// //$sql_query = "UPDATE developers SET $update_field WHERE id='" . $input['id'] . "'";
// $sql_query =  "UPDATE developers SET name='".$input['name']."' , gender='".$input['gender']."', age= '".$input['age']."' WHERE id ='".$input['id']."'";

// $result = $mysqli->query($sql_query);
// //mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
// }
// } 

if ($input['action'] == 'edit') {
	echo "Ejecutando consulta . . .";
$sql_query =  "UPDATE developers SET name='".$input['name']."' , gender='".$input['gender']."', age= '".$input['age']."' WHERE id ='".$input['id']."'";
$result = $mysqli->query($sql_query);
}

?> 