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
    $Query = new Query($mysqli, "SELECT nombre,apellido,n_ins FROM resultados2017 WHERE n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];}
        else {return null;}
}


function insertNewDataResultados($RED,$RED2,$REGION,$EXTRANJERO,$SEDE,$NSEDE,$FACULTAD,$NFACULTAD,$ESCUELA,$CARRERA,$APELLIDO,$NOMBRE,$CEDULA,$CEDULATXT,$PROVINCIA,$CLAVE,$TOMO,$FOLIO,$N_INS,$AREAP,$NOTA,$PS,$GATB,$PCA,$PCG,$INGLES,$INDICE,$INDICEAR,$INDICECI,$INDICEEM,$INDICEHU,$INDICEIN,$INDICEPE,$INDICEPO,$INDICEDE,$INDICEAD,$FECPCA,$CL_DEF,$CL_PROPB,$LECT1,$R_COM_COMP,$REL_O,$LECT2,$R_PLAN,$VERBAL,$OPER1,$OPER2,$RAZON1,$RAZON2,$NUMER,$AREA1,$AREA2,$AREA3,$AREA4,$AREA5,$AREA6,$GRAM1,$VOCAB,$GRAM2,$NARCHI,$OPC,$NPAG,$FECPCG,$INDICE00,$INDICE25,$INDICE50,$INDICE75,$REGISTRO,$CAR1,$AREAP1,$CAR2,$AREAP2,$CAR3,$AREAP3,$COL_PROC,$COD_COL,$TIPOC,$NTIPOC,$BACH,$BACHILLER,$NBACHILLER,$SEXO,$NSEXO,$MES_N,$DIA_N,$AO_N,$FECHANACI,$EDAD,$FAC_IA,$ESC_IA,$CAR_IA,$FAC_IIA,$ESC_IIA,$CAR_IIA,$FAC_IIIA,$ESC_IIIA,$CAR_IIIA,$AO_GRAD,$PROVI,$DISTRI,$CORREG,$TELEFONO,$TEL_CEL,$TEL_OFI,$MAIL,$SEDE_I,$AREA_I,$AO_LECT,$COD_PROV,$NPROVINCIA,$MATRICULA,$SAFAESCA,$NACIONALID,$TRABAJA,$OCUPACION,$EST_CIVIL,$ECROP,$PVIU,$AOPVIU,$OCUP_P,$OCUP_M,$GRADO_P,$ESC_P,$GRADO_M,$ESC_M,$CFE,$ECPS,$IMF,$NPERS,$MTRASP,$THIJOS,$CHIJOS,$DISCAP,$RPADRE,$RMADRE,$RHNOS,$PGIND,$REND_ESC,$TIPO_EST,$ARCH_I,$OBSERVACION,$FN,$NCARRERA,$D,$NO2)
{
	global $mysqli;
    $Query = new Query($mysqli, "INSERT INTO resultados2017(red, red2, region, extranjero, sede, nsede, facultad, nfacultad, escuela, carrera, apellido, nombre, cedula, cedulatxt, provincia, clave, tomo, folio, n_ins, areap, nota, ps, gatb, pca, pcg, ingles, indice, indicear, indiceci, indiceem, indicehu, indicein, indicepe, indicepo, indicede, indicead, fecpca, cl_def, cl_propb, lect1, r_com_comp, rel_o, lect2, r_plan, verbal, oper1, oper2, razon1, razon2, numer, area1, area2, area3, area4, area5, area6, gram1, vocab, gram2, narchi, opc, npag, fecpcg, indice00, indice25, indice50, indice75, registro, car1, areap1, car2, areap2, car3, areap3, col_proc, cod_col, tipoc, ntipoc, bach, bachiller, nbachiller, sexo, nsexo, mes_n, dia_n, ao_n, fechanaci, edad, fac_ia, esc_ia, car_ia, fac_iia, esc_iia, car_iia, fac_iiia, esc_iiia, car_iiia, ao_grad, provi, distri, correg, telefono, tel_cel, tel_ofi, mail, sede_i, area_i, ao_lect, cod_prov, nprovincia, matricula, safaesca, nacionalid, trabaja, ocupacion, est_civil, ecrop, pviu, aopviu, ocup_p, ocup_m, grado_p, esc_p, grado_m, esc_m, cfe, ecps, imf, npers, mtrasp, thijos, chijos, discap, rpadre, rmadre, rhnos, pgind, rend_esc, tipo_est, arch_i, observacion, fn, ncarrera, d, no2) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $parametros = array('sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss',&$RED,&$RED2,&$REGION,&$EXTRANJERO,&$SEDE,&$NSEDE,&$FACULTAD,&$NFACULTAD,&$ESCUELA,&$CARRERA,&$APELLIDO,&$NOMBRE,&$CEDULA,&$CEDULATXT,&$PROVINCIA,&$CLAVE,&$TOMO,&$FOLIO,&$N_INS,&$AREAP,&$NOTA,&$PS,&$GATB,&$PCA,&$PCG,&$INGLES,&$INDICE,&$INDICEAR,&$INDICECI,&$INDICEEM,&$INDICEHU,&$INDICEIN,&$INDICEPE,&$INDICEPO,&$INDICEDE,&$INDICEAD,&$FECPCA,&$CL_DEF,&$CL_PROPB,&$LECT1,&$R_COM_COMP,&$REL_O,&$LECT2,&$R_PLAN,&$VERBAL,&$OPER1,&$OPER2,&$RAZON1,&$RAZON2,&$NUMER,&$AREA1,&$AREA2,&$AREA3,&$AREA4,&$AREA5,&$AREA6,&$GRAM1,&$VOCAB,&$GRAM2,&$NARCHI,&$OPC,&$NPAG,&$FECPCG,&$INDICE00,&$INDICE25,&$INDICE50,&$INDICE75,&$REGISTRO,&$CAR1,&$AREAP1,&$CAR2,&$AREAP2,&$CAR3,&$AREAP3,&$COL_PROC,&$COD_COL,&$TIPOC,&$NTIPOC,&$BACH,&$BACHILLER,&$NBACHILLER,&$SEXO,&$NSEXO,&$MES_N,&$DIA_N,&$AO_N,&$FECHANACI,&$EDAD,&$FAC_IA,&$ESC_IA,&$CAR_IA,&$FAC_IIA,&$ESC_IIA,&$CAR_IIA,&$FAC_IIIA,&$ESC_IIIA,&$CAR_IIIA,&$AO_GRAD,&$PROVI,&$DISTRI,&$CORREG,&$TELEFONO,&$TEL_CEL,&$TEL_OFI,&$MAIL,&$SEDE_I,&$AREA_I,&$AO_LECT,&$COD_PROV,&$NPROVINCIA,&$MATRICULA,&$SAFAESCA,&$NACIONALID,&$TRABAJA,&$OCUPACION,&$EST_CIVIL,&$ECROP,&$PVIU,&$AOPVIU,&$OCUP_P,&$OCUP_M,&$GRADO_P,&$ESC_P,&$GRADO_M,&$ESC_M,&$CFE,&$ECPS,&$IMF,&$NPERS,&$MTRASP,&$THIJOS,&$CHIJOS,&$DISCAP,&$RPADRE,&$RMADRE,&$RHNOS,&$PGIND,&$REND_ESC,&$TIPO_EST,&$ARCH_I,&$OBSERVACION,&$FN,&$NCARRERA,&$D,&$NO2);
    $data = $Query->getresults($parametros);
    return null;

}


?>