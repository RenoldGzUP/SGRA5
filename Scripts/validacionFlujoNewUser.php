<?php
include_once('classConexionDB.php');
openConnection();
include_once('library_db_sql.php');
session_start();

function insertValidateStudentInscritos($NUMINSCRITO){
if (is_object(checkRegisterExistInscritos())) {
	echo "Usuario ya existe en esta tabla";
}
else{
	$dataInscrito=getAllDataValidationIns($NUMINSCRITO);
	insertNewDataInscritos($dataInscrito->red,$dataInscrito->nota,$dataInscrito->apellido,$dataInscrito->nombre,$dataInscrito->cedula,$dataInscrito->cedulatxt,$dataInscrito->provincia,$dataInscrito->clave,$dataInscrito->tomo,$dataInscrito->folio,$dataInscrito->pasaporte,$dataInscrito->nacionalidad,$dataInscrito->trabaja,$dataInscrito->ocupacion,$dataInscrito->tipoc,$dataInscrito->col_proc,$dataInscrito->cod_col,$dataInscrito->est_civil,$dataInscrito->mes_n,$dataInscrito->dia_n,$dataInscrito->ao_n,$dataInscrito->mes_i,$dataInscrito->dia_i,$dataInscrito->ao_i,$dataInscrito->fac_ia,$dataInscrito->esc_ia,$dataInscrito->car_ia,$dataInscrito->fac_iia,
		$dataInscrito->esc_iia,$dataInscrito->car_iia,$dataInscrito->fac_iiia,$dataInscrito->esc_iiia,$dataInscrito->car_iiia,$dataInscrito->n_ins,$dataInscrito->bach,$dataInscrito->nbachiller,$dataInscrito->ao_grad,$dataInscrito->ecrop,$dataInscrito->sexo,$dataInscrito->pviu,$dataInscrito->aopviu,$dataInscrito->sede,
		$dataInscrito->provi,$dataInscrito->distrito,$dataInscrito->corregimiento,$dataInscrito->ocup_p,$dataInscrito->ocup_m,$dataInscrito->grado_p,$dataInscrito->esc_p,$dataInscrito->grado_m,$dataInscrito->esc_m,$dataInscrito->cfe,$dataInscrito->ecps,$dataInscrito->imf,
		$dataInscrito->npers,$dataInscrito->mtrasp,$dataInscrito->thijos,$dataInscrito->chijos,$dataInscrito->discap,$dataInscrito->rpadre,$dataInscrito->rmadre,$dataInscrito->rhnos,$dataInscrito->pgind,$dataInscrito->rend_esc,$dataInscrito->telefono,$dataInscrito->tel_cel,
		$dataInscrito->tel_ofic,$dataInscrito->mail,$dataInscrito->t_comp,$dataInscrito->t_internet,$dataInscrito->cod_promed,$dataInscrito->cod_ext_le,$dataInscrito->consu_dic,$dataInscrito->pg_num,$dataInscrito->area_i,$dataInscrito->area_ii,$dataInscrito->area_iii,$dataInscrito->arch_i,
		$dataInscrito->grupo,$dataInscrito->edif,$dataInscrito->aula,$dataInscrito->hora_prueb,$dataInscrito->ao_lect,$dataInscrito->edad,$dataInscrito->fecha_inscr,$dataInscrito->fecha_nac,$dataInscrito->otro_coleg,$dataInscrito->nfac_ia,$dataInscrito->d,$dataInscrito->cod_prov,$dataInscrito->nsede,$dataInscrito->nfacultad,$dataInscrito->ncarrera,
		$dataInscrito->matricula,$dataInscrito->sefaesca,$dataInscrito->red2,$dataInscrito->no1,$dataInscrito->no2);
}
}


function insertValidateStudentResultados($NUMINSCRITO){
if (is_object( checkRegisterExistResultados())) {
	echo "Usuario ya existe en esta tabla";
}
else{
//recordar que el numero de inscrtio ya no es el mismo y el nuevo empieza con V, ANTES VERIFICADO CON LOS DEMAS

	$dataResultado=getAllDataValidationRes($NUMINSCRITO);
	insertNewDataResultados($dataResultado->red,$dataResultado->red2,$dataResultado->region,$dataResultado->extranjero,$dataResultado->sede,$dataResultado->nsede,$dataResultado->facultad,$dataResultado->nfacultad,$dataResultado->escuela,$dataResultado->carrera,$dataResultado->apellido,$dataResultado->nombre,$dataResultado->cedula,$dataResultado->cedulatxt,$dataResultado->provincia,$dataResultado->clave,$dataResultado->tomo,$dataResultado->folio,$dataResultado->n_ins,$dataResultado->areap,$dataResultado->nota,$dataResultado->ps,$dataResultado->gatb,$dataResultado->pca,$dataResultado->pcg,$dataResultado->ingles,$dataResultado->indice,$dataResultado->indicear,$dataResultado->indiceci,$dataResultado->indiceem,$dataResultado->indicehu,$dataResultado->indicein,$dataResultado->indicepe,$dataResultado->indicepo,$dataResultado->indicede,$dataResultado->indicead,$dataResultado->fecpca,$dataResultado->cl_def,$dataResultado->cl_propb,$dataResultado->lect1,$dataResultado->r_com_comp,$dataResultado->rel_o,$dataResultado->lect2,$dataResultado->r_plan,$dataResultado->verbal,$dataResultado->oper1,$dataResultado->oper2,$dataResultado->razon1,$dataResultado->razon2,$dataResultado->numer,$dataResultado->area1,$dataResultado->area2,$dataResultado->area3,$dataResultado->area4,$dataResultado->area5,$dataResultado->area6,$dataResultado->gram1,$dataResultado->vocab,$dataResultado->gram2,$dataResultado->narchi,$dataResultado->opc,$dataResultado->npag,$dataResultado->fecpcg,$dataResultado->indice00,$dataResultado->indice25,$dataResultado->indice50,$dataResultado->indice75,$dataResultado->registro,$dataResultado->car1,$dataResultado->areap1,$dataResultado->car2,$dataResultado->areap2,$dataResultado->car3,$dataResultado->areap3,$dataResultado->col_proc,$dataResultado->cod_col,$dataResultado->tipoc,$dataResultado->ntipoc,$dataResultado->bach,$dataResultado->bachiller,$dataResultado->nbachiller,$dataResultado->sexo,$dataResultado->nsexo,$dataResultado->mes_n,$dataResultado->dia_n,$dataResultado->ao_n,$dataResultado->fechanaci,$dataResultado->edad,$dataResultado->fac_ia,$dataResultado->esc_ia,$dataResultado->car_ia,$dataResultado->fac_iia,$dataResultado->esc_iia,$dataResultado->car_iia,$dataResultado->fac_iiia,$dataResultado->esc_iiia,$dataResultado->car_iiia,$dataResultado->ao_grad,$dataResultado->provi,$dataResultado->distri,$dataResultado->correg,$dataResultado->telefono,$dataResultado->tel_cel,$dataResultado->tel_ofi,$dataResultado->mail,$dataResultado->sede_i,$dataResultado->area_i,$dataResultado->ao_lect,$dataResultado->cod_prov,$dataResultado->nprovincia,$dataResultado->matricula,$dataResultado->safaesca,$dataResultado->nacionalid,$dataResultado->trabaja,$dataResultado->ocupacion,$dataResultado->est_civil,$dataResultado->ecrop,$dataResultado->pviu,$dataResultado->aopviu,$dataResultado->ocup_p,$dataResultado->ocup_m,$dataResultado->grado_p,$dataResultado->esc_p,$dataResultado->grado_m,$dataResultado->esc_m,$dataResultado->cfe,$dataResultado->ecps,$dataResultado->imf,$dataResultado->npers,$dataResultado->mtrasp,$dataResultado->thijos,$dataResultado->chijos,$dataResultado->discap,$dataResultado->rpadre,$dataResultado->rmadre,$dataResultado->rhnos,$dataResultado->pgind,$dataResultado->rend_esc,$dataResultado->tipo_est,$dataResultado->arch_i,$dataResultado->observacion,$dataResultado->fn,$dataResultado->ncarrera,$dataResultado->d,$dataResultado->no2);

}

	
}

?>