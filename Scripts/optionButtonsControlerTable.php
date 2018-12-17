<?php
include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');


$input = filter_input_array(INPUT_POST);
var_dump($input);

/*$first_name = mysqli_real_escape_string($connect, $input["first_name"]);
$last_name = mysqli_real_escape_string($connect, $input["last_name"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE tbl_user 
 SET first_name = '".$first_name."', 
 last_name = '".$last_name."' 
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM tbl_user 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);*/




/*
$input = filter_input_array(INPUT_POST);

var_dump($input);

$first_name = mysqli_real_escape_string($connect, $input["first_name"]);
$last_name = mysqli_real_escape_string($connect, $input["last_name"]);

if($input["action"] === 'edit')
{

 updateRowDB($);

}
if($input["action"] === 'delete')
{
 deleteRowDB();
}

echo json_encode($input);
*/

?>