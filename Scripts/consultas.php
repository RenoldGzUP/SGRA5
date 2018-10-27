<?php
class Query{
	public $mysql;
	private $stmt;
	public function Query($con, $query){
		//echo "HOLA"; print_r($con);
			if($con == false || !$con){
					echo "Conexión no es válida";
					die();
			}
			$this->mysql = $con;
			$this->stmt = $this->mysql->prepare($query);
			if(!$this->stmt){
					echo "Error Query: ".$this->mysql->error;
			}
}

public function getresults($parametros = null){//Analizador de consultas preparadas
	$stmt = $this->stmt;
	$parameters = array();
	$results = array();

	if($parametros != null and count($parametros)>0)
		call_user_func_array(array($stmt, 'bind_param'), $parametros);
	
	$stmt->execute();
	$meta = $stmt->result_metadata();

	if($meta){
			while ( $field = $meta->fetch_field() ) {
					$parameters[] = &$row[$field->name];
			}
			$meta->free();
			call_user_func_array(array($stmt, 'bind_result'), $parameters);

			while ( $stmt->fetch() ) {
					$x = array();
					foreach( $row as $key => $val )
						$x[$key] = $val;
					
					$results[] = (object)$x;
			}

			while($this->mysql->more_results()){ //Eliminamos otros resultados
					$this->mysql->next_result();
					$this->mysql->use_result();
			}
			// $stmt->close();
			return $results;
	}
}

}
function getSedes(){
	global $mysqli;
	$query = new Query($mysqli,"SELECT id_sede,codigo_sede,nombre_sede from sedes");
	$parametros = array();
	$data = $query->getresults();

	if(isset($data[0]))
	    return $data;
	else
	    return null;
}

function getAreas($idSedes){
	global $mysqli;
	$query = new Query($mysqli,"SELECT codigo_area,nombre_area FROM areas WHERE codigo_relacion= ?");
	$parametros = array("i",&$idSedes);
	
	$data = $query->getresults($parametros);

	if(isset($data[0]))
	    return $data;
	else
	    return null;	
}
function getFacultades($idAreas){
	global $mysqli;
	$query = new Query($mysqli,"SELECT id_facultad,codigo_facultad,nombre_facultad  from facultades  where codigo_relacion = ?");
	$parametros = array("i",&$idAreas);
	
	$data = $query->getresults($parametros);

	if(isset($data[0]))
	    return $data;
	else
	    return null;	
}

//--------------------------------------------


?>