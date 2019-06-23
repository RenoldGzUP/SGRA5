 <?php
 include_once('../Scripts/classConexionDB.php');
openConnection();
include_once('../Scripts/library_db_sql.php');

			$listasDB = getTablesList(); 
      
			var_dump($listasDB);
			/* foreach( $listasDB as $item){
			echo "<option value='$item->id_sede'>".$item->codigo_sede."-".$item->nombre_sede."</option> ";
		}  */
		?>