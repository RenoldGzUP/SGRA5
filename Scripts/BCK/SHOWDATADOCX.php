function getDataIndividual($numeroInscrito)
{
    global $mysqli;
    $query = new Query($mysqli, "SELECT n_ins, CONCAT(nombre,' ',apellido) as  nombre_completo,
        CONCAT(provincia,'-',tomo,'-',folio)AS cedula ,nsede, area_i,
        nfacultad, ncarrera, col_proc, nbachiller,indice, ps ,gatb, pca ,
        SUM(cl_def+cl_propb) as valor_lexico,
        SUM(lect1+lect2) as valor_lectura,
        SUM(r_com_comp+rel_o+r_plan) as valor_redaccion,
        SUM(cl_def+cl_propb+r_com_comp+rel_o+r_plan+lect1+lect2) as subtotalverbal,
        SUM(oper1+oper2)as operatoria, SUM(razon1+razon2) as razonamiento ,
        SUM(oper1+oper2+razon1+razon2) as subtotalnumerico,pca from resultados2017 where n_ins=?");
    $parametros = array("s", &$numeroInscrito);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}
