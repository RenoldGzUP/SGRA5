<?php
include_once('classConexionDB.php');
openConnection();
include_once('library_db_sql.php');
session_start();
 

function insertValidateStudentInscritos($NUMINSCRITO,$CODEVALIDACION){
/*if (is_object(checkRegisterExistInscritos($NUMINSCRITO))) {
	echo "Usuario ya existe en esta tabla";
}*/
//else{
$dataInscrito=getAllDataValidationIns($NUMINSCRITO);
//var_dump($dataInscrito);

foreach ($dataInscrito as $key) {
	//echo "nombre del arreglo  ".$key->nombre;
	insertNewDataInscritos($key->red,$key->nota,$key->apellido,$key->nombre,$key->cedula,$key->cedulatxt,$key->provincia,$key->clave,$key->tomo,$key->folio,$key->pasaporte,$key->nacionalidad,$key->trabaja,$key->ocupacion,$key->tipoc,$key->col_proc,$key->cod_col,$key->est_civil,$key->mes_n,$key->dia_n,$key->ao_n,$key->mes_i,$key->dia_i,$key->ao_i,$key->fac_ia,$key->esc_ia,$key->car_ia,$key->fac_iia,
		$key->esc_iia,$key->car_iia,$key->fac_iiia,$key->esc_iiia,$key->car_iiia,$CODEVALIDACION,$key->bach,$key->nbachiller,$key->ao_grad,$key->ecrop,$key->sexo,$key->pviu,$key->aopviu,$key->sede,
		$key->provi,$key->distrito,$key->corregimiento,$key->ocup_p,$key->ocup_m,$key->grado_p,$key->esc_p,$key->grado_m,$key->esc_m,$key->cfe,$key->ecps,$key->imf,
		$key->npers,$key->mtrasp,$key->thijos,$key->chijos,$key->discap,$key->rpadre,$key->rmadre,$key->rhnos,$key->pgind,$key->rend_esc,$key->telefono,$key->tel_cel,
		$key->tel_ofic,$key->mail,$key->t_comp,$key->t_internet,$key->cod_promed,$key->cod_ext_le,$key->consu_dic,$key->pg_num,$key->area_i,$key->area_ii,$key->area_iii,$key->arch_i,
		$key->grupo,$key->edif,$key->aula,$key->hora_prueb,$key->ao_lect,$key->edad,$key->fecha_inscr,$key->fecha_nac,$key->otro_coleg,$key->nfac_ia,$key->d,$key->cod_prov,$key->nsede,$key->nfacultad,$key->ncarrera,
		$key->matricula,$key->sefaesca,$key->red2,$key->no1,$key->no2);

}


/*foreach ($dataInscrito as $itemInscrito ) {
	echo "some data" . $itemInscrito->red.$itemInscrito->nota.$itemInscrito->apellido;
	insertNewDataInscritos($itemInscrito->red,$itemInscrito->nota,$itemInscrito->apellido,$itemInscrito->nombre,$itemInscrito->cedula,$itemInscrito->cedulatxt,$itemInscrito->provincia,$itemInscrito->clave,$itemInscrito->tomo,$itemInscrito->folio,$itemInscrito->pasaporte,$itemInscrito->nacionalidad,$itemInscrito->trabaja,$itemInscrito->ocupacion,$itemInscrito->tipoc,$itemInscrito->col_proc,$itemInscrito->cod_col,$itemInscrito->est_civil,$itemInscrito->mes_n,$itemInscrito->dia_n,$itemInscrito->ao_n,$itemInscrito->mes_i,$itemInscrito->dia_i,$itemInscrito->ao_i,$itemInscrito->fac_ia,$itemInscrito->esc_ia,$itemInscrito->car_ia,$itemInscrito->fac_iia,
		$itemInscrito->esc_iia,$itemInscrito->car_iia,$itemInscrito->fac_iiia,$itemInscrito->esc_iiia,$itemInscrito->car_iiia,$CODEVALIDACION,$itemInscrito->bach,$itemInscrito->nbachiller,$itemInscrito->ao_grad,$itemInscrito->ecrop,$itemInscrito->sexo,$itemInscrito->pviu,$itemInscrito->aopviu,$itemInscrito->sede,
		$itemInscrito->provi,$itemInscrito->distrito,$itemInscrito->corregimiento,$itemInscrito->ocup_p,$itemInscrito->ocup_m,$itemInscrito->grado_p,$itemInscrito->esc_p,$itemInscrito->grado_m,$itemInscrito->esc_m,$itemInscrito->cfe,$itemInscrito->ecps,$itemInscrito->imf,
		$itemInscrito->npers,$itemInscrito->mtrasp,$itemInscrito->thijos,$itemInscrito->chijos,$itemInscrito->discap,$itemInscrito->rpadre,$itemInscrito->rmadre,$itemInscrito->rhnos,$itemInscrito->pgind,$itemInscrito->rend_esc,$itemInscrito->telefono,$itemInscrito->tel_cel,
		$itemInscrito->tel_ofic,$itemInscrito->mail,$itemInscrito->t_comp,$itemInscrito->t_internet,$itemInscrito->cod_promed,$itemInscrito->cod_ext_le,$itemInscrito->consu_dic,$itemInscrito->pg_num,$itemInscrito->area_i,$itemInscrito->area_ii,$itemInscrito->area_iii,$itemInscrito->arch_i,
		$itemInscrito->grupo,$itemInscrito->edif,$itemInscrito->aula,$itemInscrito->hora_prueb,$itemInscrito->ao_lect,$itemInscrito->edad,$itemInscrito->fecha_inscr,$itemInscrito->fecha_nac,$itemInscrito->otro_coleg,$itemInscrito->nfac_ia,$itemInscrito->d,$itemInscrito->cod_prov,$itemInscrito->nsede,$itemInscrito->nfacultad,$itemInscrito->ncarrera,
		$itemInscrito->matricula,$itemInscrito->sefaesca,$itemInscrito->red2,$itemInscrito->no1,$itemInscrito->no2);
}
	
//}*/

}



function insertValidateStudentResultados($NUMINSCRITO,$CODEVALIDACION){

if (is_object( checkRegisterExistResultados($NUMINSCRITO))) {
	echo "Usuario ya existe en esta tabla";
}
else{
//recordar que el numero de inscrtio ya no es el mismo y el nuevo empieza con V, ANTES VERIFICADO CON LOS DEMAS
     //ENVIAR A LA NUEVA BASE DE DATOS
	$dataResultado=getAllDataValidationRes($NUMINSCRITO);
	insertNewDataResultados($dataResultado->red,$dataResultado->red2,$dataResultado->region,$dataResultado->extranjero,$dataResultado->sede,$dataResultado->nsede,$dataResultado->facultad,$dataResultado->nfacultad,$dataResultado->escuela,$dataResultado->carrera,$dataResultado->apellido,$dataResultado->nombre,$dataResultado->cedula,$dataResultado->cedulatxt,$dataResultado->provincia,$dataResultado->clave,$dataResultado->tomo,$dataResultado->folio,$CODEVALIDACION,$dataResultado->areap,$dataResultado->nota,$dataResultado->ps,$dataResultado->gatb,$dataResultado->pca,$dataResultado->pcg,$dataResultado->ingles,$dataResultado->indice,$dataResultado->indicear,$dataResultado->indiceci,$dataResultado->indiceem,$dataResultado->indicehu,$dataResultado->indicein,$dataResultado->indicepe,$dataResultado->indicepo,$dataResultado->indicede,$dataResultado->indicead,$dataResultado->fecpca,$dataResultado->cl_def,$dataResultado->cl_propb,$dataResultado->lect1,$dataResultado->r_com_comp,$dataResultado->rel_o,$dataResultado->lect2,$dataResultado->r_plan,$dataResultado->verbal,$dataResultado->oper1,$dataResultado->oper2,$dataResultado->razon1,$dataResultado->razon2,$dataResultado->numer,$dataResultado->area1,$dataResultado->area2,$dataResultado->area3,$dataResultado->area4,$dataResultado->area5,$dataResultado->area6,$dataResultado->gram1,$dataResultado->vocab,$dataResultado->gram2,$dataResultado->narchi,$dataResultado->opc,$dataResultado->npag,$dataResultado->fecpcg,$dataResultado->indice00,$dataResultado->indice25,$dataResultado->indice50,$dataResultado->indice75,$dataResultado->registro,$dataResultado->car1,$dataResultado->areap1,$dataResultado->car2,$dataResultado->areap2,$dataResultado->car3,$dataResultado->areap3,$dataResultado->col_proc,$dataResultado->cod_col,$dataResultado->tipoc,$dataResultado->ntipoc,$dataResultado->bach,$dataResultado->bachiller,$dataResultado->nbachiller,$dataResultado->sexo,$dataResultado->nsexo,$dataResultado->mes_n,$dataResultado->dia_n,$dataResultado->ao_n,$dataResultado->fechanaci,$dataResultado->edad,$dataResultado->fac_ia,$dataResultado->esc_ia,$dataResultado->car_ia,$dataResultado->fac_iia,$dataResultado->esc_iia,$dataResultado->car_iia,$dataResultado->fac_iiia,$dataResultado->esc_iiia,$dataResultado->car_iiia,$dataResultado->ao_grad,$dataResultado->provi,$dataResultado->distri,$dataResultado->correg,$dataResultado->telefono,$dataResultado->tel_cel,$dataResultado->tel_ofi,$dataResultado->mail,$dataResultado->sede_i,$dataResultado->area_i,$dataResultado->ao_lect,$dataResultado->cod_prov,$dataResultado->nprovincia,$dataResultado->matricula,$dataResultado->safaesca,$dataResultado->nacionalid,$dataResultado->trabaja,$dataResultado->ocupacion,$dataResultado->est_civil,$dataResultado->ecrop,$dataResultado->pviu,$dataResultado->aopviu,$dataResultado->ocup_p,$dataResultado->ocup_m,$dataResultado->grado_p,$dataResultado->esc_p,$dataResultado->grado_m,$dataResultado->esc_m,$dataResultado->cfe,$dataResultado->ecps,$dataResultado->imf,$dataResultado->npers,$dataResultado->mtrasp,$dataResultado->thijos,$dataResultado->chijos,$dataResultado->discap,$dataResultado->rpadre,$dataResultado->rmadre,$dataResultado->rhnos,$dataResultado->pgind,$dataResultado->rend_esc,$dataResultado->tipo_est,$dataResultado->arch_i,$dataResultado->observacion,$dataResultado->fn,$dataResultado->ncarrera,$dataResultado->d,$dataResultado->no2);

}

	
}


/*function getDataTest($dato1,$dato2,$dato3,$dato4,$dato5,$dato6,$dato7,$dato8,$dato9,$dato10,$dato11,$dato12,$dato13,$dato14,$dato15,$dato16,$dato17,$dato18,$dato19,$dato20,$dato21,$dato22,$dato23,$dato24,$dato25,$dato26,$dato27,$dato28,$dato29,$dato30,$dato31,$dato32,$dato33,$dato34,$dato35,$dato36,$dato37,$dato38,$dato39,$dato40,$dato41,$dato42,$dato43,$dato44,$dato45,$dato46,$dato47,$dato48,$dato49,$dato50,$dato51,$dato52,$dato53,$dato54,$dato55,$dato56,$dato57,$dato58,$dato59,$dato60,$dato61,$dato62,$dato63,$dato64,$dato65,$dato66,$dato67,$dato68,$dato69,$dato70,$dato71,$dato72,$dato73,$dato74,$dato75,$dato76,$dato77,$dato78,$dato79,$dato80,$dato81,$dato82,$dato83,$dato84,$dato85,$dato86,$dato87,$dato88,$dato89,$dato90,$dato91,$dato92,$dato93,$dato94,$dato95,$dato96,$dato97,$dato98){

echo "resultado ".$dato1.$dato2.$dato3.$dato4.$dato5.$dato6.$dato7.$dato8.$dato9.$dato10.$dato11.$dato12.$dato13.$dato14.$dato15.$dato16.$dato17.$dato18.$dato19.$dato20.$dato21.$dato22.$dato23.$dato24.$dato25.$dato26.$dato27.$dato28.$dato29.$dato30.$dato31.$dato32.$dato33.$dato34.$dato35.$dato36.$dato37.$dato38.$dato39.$dato40.$dato41.$dato42.$dato43.$dato44.$dato45.$dato46.$dato47.$dato48.$dato49.$dato50.$dato51.$dato52.$dato53.$dato54.$dato55.$dato56.$dato57.$dato58.$dato59.$dato60.$dato61.$dato62.$dato63.$dato64.$dato65.$dato66.$dato67.$dato68.$dato69.$dato70.$dato71.$dato72.$dato73.$dato74.$dato75.$dato76.$dato77.$dato78.$dato79.$dato80.$dato81.$dato82.$dato83.$dato84.$dato85.$dato86.$dato87.$dato88.$dato89.$dato90.$dato91.$dato92.$dato93.$dato94.$dato95.$dato96.$dato97.$dato98;

	
}*/


function convert_objectarray($data) {

    if (is_object($data)) {
        $data = get_object_vars($data);
    }

    if (is_array($data)) {
        return array_map(__FUNCTION__, $data);
    }
    else {
        return $data;
    }
}

?>