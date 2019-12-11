<?php
include_once './Scripts/classConexionDB.php';
openConnection();
include_once './Scripts/library_db_sql.php';
session_start();

date_default_timezone_set("America/Panama"); //ZONA HORARIA PAN
$YEAR  = date("Y");

//save
$PWD_RESTORE = $_POST["password"];
//$INNER_PWD ="J{Uj2}F{ty";
$INNER_PWD ="123456";

//CHECKL PWD
if (strcmp($PWD_RESTORE, $INNER_PWD) == 0) {

      if (isset($_POST['inscritos']) && isset($_POST['resultados'])) {

        //truncate and isnert new table
        truncateTable("sgra_config_tb");
        insertNewTable($_POST['inscritos'],$_POST['resultados']);

        //create tables
       // create_Table_Inscritos($_POST['inscritos']);
        //createTable_Resultado($_POST['resultados']);
        
        //truncate tables
        truncateTable("validaciones");
        truncateTable("inscritostmp");
        truncateTable("resultadostmp");

         ////REFRESH
        include 'Update_sym/done_page.php';
        header("Refresh: 10; url=index.html");

    }else{
       // echo "Ocurrio un error";
    }
  
} else{
  include 'Update_sym/error.php';
}

?>
