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


function getTablesListInscritos(){
	global $mysqli;
    $Query = new Query($mysqli, "SHOW TABLES FROM sgrainscritos");
    $parametros = array();
    $data = $Query->getresults();
 if (isset($data)) {
        return $data;}
        else {return null;}
}


function getTablesListResultados(){
	global $mysqli;
    $Query = new Query($mysqli, "SHOW TABLES FROM sgra");
    $parametros = array();
    $data = $Query->getresults();
 if (isset($data)) {
        return $data;}
        else {return null;}
}

function checkRegisterExist($NUMINSCRITO){
	global $mysqli;
    $Query = new Query($mysqli, "SELECT nombre,apellido,n_ins FROM inscritos2017 WHERE n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];}
        else {return null;}
}

function insertNewData($RED,$NOTA,$APELLIDO,$NOMBRE,$CEDULA,$CEDULATXT,$PROVINCIA,$CLAVE,$TOMO,$FOLIO,$PASAPORTE,$NACIONALIDAD,$TRABAJA,$OCUPACION,$TIPOC,$COL_PROC,$COD_COL,$EST_CIVIL,$MES_N,$DIA_N,$AO_N,$MES_I,$DIA_I,$AO_I,$FAC_IA,$ESC_IA,$CAR_IA,$FAC_IIA,
$ESC_IIA,$CAR_IIA,$FAC_IIIA,$ESC_IIIA,$CAR_IIIA,$N_INS,$BACH,$NBACHILLER,$AO_GRAD,$ECROP,$SEXO,$PVIU,$AOPVIU,$SEDE,
$PROVI,$DISTRITO,$CORREGIMIENTO,$OCUP_P,$OCUP_M,$GRADO_P,$ESC_P,$GRADO_M,$ESC_M,$CFE,$ECPS,$IMF,
$NPERS,$MTRASP,$THIJOS,$CHIJOS,$DISCAP,$RPADRE,$RMADRE,$RHNOS,$PGIND,$REND_ESC,$TELEFONO,$TEL_CEL,
$TEL_OFIC,$MAIL,$T_COMP,$T_INTERNET,$COD_PROMED,$COD_EXT_LE,$CONSU_DIC,$PG_NUM,$AREA_I,$AREA_II,$AREA_III,$ARCH_I,
$GRUPO,$EDIF,$AULA,$HORA_PRUEB,$AO_LECT,$EDAD,$FECHA_INSCR,$FECHA_NAC,$OTRO_COLEG,$NFAC_IA,$D,$COD_PROV,$NSEDE,$NFACULTAD,$NCARRERA,
$MATRICULA,$SEFAESCA,$RED2,$NO1,$NO2)
{
    global $mysqli;
    $Query = new Query($mysqli,"INSERT INTO inscritos2017(red, nota, apellido, nombre, cedula, cedulatxt, provincia, clave, tomo, folio, pasaporte, nacionalidad, trabaja, ocupacion, tipoc, col_proc, cod_col, est_civil, mes_n, dia_n, ao_n, mes_i, dia_i, ao_i, fac_ia, esc_ia, car_ia, fac_iia, esc_iia, car_iia, fac_iiia, esc_iiia, car_iiia, n_ins, bach, nbachiller, ao_grad, ecrop, sexo, pviu, aopviu, sede, provi, distrito, corregimiento, ocup_p, ocup_m, grado_p, esc_p, grado_m, esc_m, cfe, ecps, imf, npers, mtrasp, thijos, chijos, discap, rpadre, rmadre, rhnos, pgind, rend_esc, telefono, tel_cel, tel_ofic, mail, t_comp, t_internet, cod_promed, cod_ext_le, consu_dic, pg_num, area_i, area_ii, area_iii, arch_i, grupo, edif, aula, hora_prueb, ao_lect, edad, fecha_inscr, fecha_nac, otro_coleg, nfac_ia, d, cod_prov, nsede, nfacultad, ncarrera, matricula, sefaesca, red2, no1, no2) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $parametros = array("ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss", &$RED,&$NOTA,&$APELLIDO,&$NOMBRE,&$CEDULA,&$CEDULATXT,&$PROVINCIA,&$CLAVE,&$TOMO,&$FOLIO,&$PASAPORTE,&$NACIONALIDAD,&$TRABAJA,&$OCUPACION,
&$TIPOC,&$COL_PROC,&$COD_COL,&$EST_CIVIL,&$MES_N,&$DIA_N,&$AO_N,&$MES_I,&$DIA_I,&$AO_I,&$FAC_IA,&$ESC_IA,&$CAR_IA,&$FAC_IIA,
&$ESC_IIA,&$CAR_IIA,&$FAC_IIIA,&$ESC_IIIA,&$CAR_IIIA,&$N_INS,&$BACH,&$NBACHILLER,&$AO_GRAD,&$ECROP,&$SEXO,&$PVIU,&$AOPVIU,&$SEDE,
&$PROVI,&$DISTRITO,&$CORREGIMIENTO,&$OCUP_P,&$OCUP_M,&$GRADO_P,&$ESC_P,&$GRADO_M,&$ESC_M,&$CFE,&$ECPS,&$IMF,
&$NPERS,&$MTRASP,&$THIJOS,&$CHIJOS,&$DISCAP,&$RPADRE,&$RMADRE,&$RHNOS,&$PGIND,&$REND_ESC,&$TELEFONO,&$TEL_CEL,
&$TEL_OFIC,&$MAIL,&$T_COMP,&$T_INTERNET,&$COD_PROMED,&$COD_EXT_LE,&$CONSU_DIC,&$PG_NUM,&$AREA_I,&$AREA_II,&$AREA_III,&$ARCH_I,
&$GRUPO,&$EDIF,&$AULA,&$HORA_PRUEB,&$AO_LECT,&$EDAD,&$FECHA_INSCR,&$FECHA_NAC,&$OTRO_COLEG,&$NFAC_IA,&$D,&$COD_PROV,&$NSEDE,&$NFACULTAD,&$NCARRERA,&$MATRICULA,&$SEFAESCA,&$RED2,&$NO1,&$NO2);
    $data = $Query->getresults($parametros);
    return true;
}





?>