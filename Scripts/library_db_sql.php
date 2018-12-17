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

function getUsers($userName){
	global $mysqli;
	$query = new Query($mysqli,"SELECT * FROM usuarios WHERE nombre_usuario = ?");
	$parametros = array("s",&$userName);
	$data = $query->getresults($parametros);

	if(isset($data[0]))
	    return $data;
	else
	    return null;	
	
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
	//$query = new Query($mysqli,"SELECT codigo_area,nombre_area FROM areas WHERE codigo_relacion= ?");
	
	$query = new Query($mysqli,"SELECT DISTINCT(B.nombre_area) AS nombre_area,A.id_area AS id_area, A.id_sede AS id_sede
from `sede-area` A, `area` B
WHERE A.id_sede=?
AND B.id_area=A.id_area
ORDER BY 2,1");
	
	$parametros = array("i",&$idSedes);
	
	$data = $query->getresults($parametros);

	if(isset($data[0]))
	    return $data;
	else
	    return null;	
}
function getFacultades($idSede,$idAreas){
	global $mysqli;
	//$query = new Query($mysqli,"SELECT id_facultad,codigo_facultad,nombre_facultad  from facultades  where codigo_relacion = ?");
	$query = new Query($mysqli,"SELECT A.id_facultad AS id_facultad, A.id_area AS id_area, B.codigo_facultad AS codigo_facultad, B.nombre_facultad AS nombre_facultad
from `sede-area` A, `facultades` B
WHERE A.id_sede=?
AND A.id_area=?
AND B.id_facultad=A.id_facultad
ORDER BY 3");	
	
	$parametros = array("ii",&$idSede,&$idAreas);
	
	$data = $query->getresults($parametros);

	if(isset($data[0]))
	    return $data;
	else
	    return null;	
}

function showDataResultado(){

	global $mysqli;
	$query = new Query($mysqli,"SELECT nombre,apellido,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia
	 FROM resultados where n_ins is not null  and areap = '3' LIMIT 100");
	$parametros = array();
	$data = $query->getresults();

	if(isset($data[0]))
	    return $data;
	else
	    return null;

}

function getAreasComun(){
	global $mysqli;
	$query = new Query($mysqli,"SELECT codigo_area,nombre_area from area");
	$parametros = array();
	$data = $query->getresults();

	if(isset($data[0]))
	    return $data;
	else
	    return null;
}

function getFacultadesComun($idAreas){
	global $mysqli;
	$query = new Query($mysqli,"SELECT id_facultad, codigo_facultad, nombre_facultad from facultades WHERE codigo_relacion = '?'");
	$parametros = array("i", &$idAreas);
	$data = $query->getresults();

	if(isset($data[0]))
	    return $data;
	else
	    return null;
}

function getDataIndividual($numeroInscrito){
	global $mysqli;
	$query = new Query($mysqli,"SELECT n_ins, CONCAT(nombre,' ',apellido) as  nombre_completo,
		CONCAT(provincia,'-',tomo,'-',folio)AS cedula ,nsede, area_i,
		nfacultad, ncarrera, col_proc, nbachiller,indice, ps ,gatb, pca ,
		SUM(cl_def+cl_propb) as valor_lexico,
		SUM(lect1+lect2) as valor_lectura,
		SUM(r_com_comp+rel_o+r_plan) as valor_redaccion,
		SUM(cl_def+cl_propb+r_com_comp+rel_o+r_plan+lect1+lect2) as subtotalverbal,
		SUM(oper1+oper2)as operatoria, SUM(razon1+razon2) as razonamiento ,
		SUM(oper1+oper2+razon1+razon2) as subtotalnumerico,pca from resultados where n_ins=?");
	$parametros = array("s", &$numeroInscrito);
	$data = $query->getresults($parametros);

	if(isset($data[0]))
	    return $data;
	else
	    return null;
}

function areaEstudiante($numInscrito){
	global $mysqli;
	$query = new Query($mysqli,'SELECT area_i, n_ins FROM resultados WHERE n_ins=?');
	$parametros = array("s", &$numInscrito);
	$data = $query->getresults($parametros);

	if(isset($data[0]))
	    return $data;
	else 
	    return null;
}

function updateRowDB($nombre,$apellido,$sede,$fac1a,$esc1a,$car1a,$fac2a,$esc2a,$car2a,$fac3a,$esc3a,$car3a,$numInscrito){
	global $mysqli;
	$query = new Query($mysqli,'UPDATE resultados set nombre=?, apellido=?,sede=?,fac_ia=?,esc_ia=?,car_ia=?,fac_iia=?,esc_iia=?,car_iia=?,fac_iiia=?,esc_iiia=?,car_iiia=?  WHERE n_ins =? ');
	$parametros = array("sssssssssssss",&$nombre,&$apellido,&$sede,&$fac1a,&$esc1a,&$car1a,&$fac2a,&$esc2a,&$car2a,&$fac3a,&$esc3a,&$car3a,&$numInscrito);
	$data = $query->getresults($parametros);

	if(isset($data[0]))
	    return $data;
	else 
	    return null;
}

function deleteRowDB($numInscrito){
	global $mysqli;
	$query = new Query($mysqli,'DELETE from resultados WHERE n_ins=?');
	$parametros = array("s", &$numInscrito);
	$data = $query->getresults($parametros);

	if(isset($data[0]))
	    return $data;
	else 
	    return null;
}

function showLog(){
	global $mysqli;
	$query = new Query($mysqli,"SELECT id_log,username,date_log,log from logs order by id_log desc");
    $parametros = array();
    $data = $query->getresults();
		
	if(isset($data[0]))
	    return $data;
	else
	    return null;
}

function saveLogs($username,$logReport) 
{	global $mysqli;
    date_default_timezone_set("America/Argentina/Buenos_Aires");//ZONA HORARIA ARG
    $datetime = date("d-m-Y h:i:s A");
	$query = new Query($mysqli,"INSERT INTO logs(username,date_log,log) VALUES (?,?,?)");
    $parametros = array("sss",&$username,&$datetime,&$logReport);
	
		$data = $query->getresults($parametros);
		  
		$result = "Registro insertado";  
		return $result;
}


?>