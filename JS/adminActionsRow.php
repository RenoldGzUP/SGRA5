<?php
  
 $oldFileName="../Scripts/classConexionDB.php";
 
  if (!file_exists($oldFileName)) {
echo("EL ARCHIVO ESPCIFICADO EXISTE");

  }

include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('./Scripts/library_db_sql.php');
session_start();
//saveLogs($_SESSION['name'],"Administrador eliminó a un usuario");


if(isset($_POST['save_row']))
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

 //updateRowDB($name,$lastname,$sede,$fac_ia,$esc_ia,$car_ia,$fac_iia,$esc_iia,$car_iia,$fac_iiia,$esc_iiia,$car_iiia,$n_ins);
 //echo "success";
 exit();
}

if(isset($_POST['delete_row']))
{
 $row_no=$_POST['row_id'];
 mysql_query("delete from user_detail where id='$row_no'");
 echo "success";
 exit();
}

if(isset($_POST['insert_row']))
{
 $name=$_POST['name_val'];
 $age=$_POST['age_val'];
 mysql_query("insert into user_detail values('','$name','$age')");
 echo mysql_insert_id();
 exit();
}
?>