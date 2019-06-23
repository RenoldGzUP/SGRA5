<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once('classConexionDB.php');
openConnection();
include_once('library_db_sql.php');
session_start();
//saveLogs($_SESSION['name'],"Administrador eliminó a un usuario");
$state = $_POST['save_row'];

if($state =="save_row")
{
 $n_ins=$_POST['row_id'];
 $name=$_POST['name_val'];
 $lastname=$_POST['lastname_val'];
 $sede = $_POST['sede_val'];
 $fac_ia = $_POST['fac_ia_val'];
 $ess_ia = $_POST['esc_ia_val'];
 $car_ia = $_POST['car_ia_val'];
 $fac_iia = $_POST['fac_iia_val'];
 $ess_iia = $_POST['esc_iia_val'];
 $car_iia = $_POST['car_iia_val'];
 $fac_iiia = $_POST['fac_iiia_val'];
 $ess_iiia = $_POST['esc_iiia_val'];
 $car_iiia = $_POST['car_iiia_val'];
//echo " ".$n_ins." ".$name." ".$lastname;
 //echo "Save in progress..";
 updateRowDB($name,$lastname,$sede,$fac_ia,$esc_ia,$car_ia,$fac_iia,$esc_iia,$car_iia,$fac_iiia,$esc_iiia,$car_iiia,$n_ins);
 echo "success";
 exit();
}



if(isset($_POST['delete_row']))
{
 $n_ins=$_POST['row_id'];
 deleteRowDB($n_ins);
 saveLogs($_SESSION['name'],"Administrador eliminó el registro  ".$n_ins."");
 echo "success";
 exit();
}

?>