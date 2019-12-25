<?php
class Query
{
    public $mysql;
    private $stmt;
    public function Query($con, $query)
    {
        //echo "HOLA"; print_r($con);
        if ($con == false || !$con) {
            echo "Conexión no es válida";
            die();
        }
        $this->mysql = $con;
        $this->stmt  = $this->mysql->prepare($query);
        if (!$this->stmt) {
            echo "Error Query: " . $this->mysql->error;
        }
    }

    public function getresults($parametros = null)
    {
//Analizador de consultas preparadas
        $stmt       = $this->stmt;
        $parameters = array();
        $results    = array();

        if ($parametros != null and count($parametros) > 0) {
            call_user_func_array(array($stmt, 'bind_param'), $parametros);
        }

        $stmt->execute();
        $meta = $stmt->result_metadata();

        if ($meta) {
            while ($field = $meta->fetch_field()) {
                $parameters[] = &$row[$field->name];
            }
            $meta->free();
            call_user_func_array(array($stmt, 'bind_result'), $parameters);

            while ($stmt->fetch()) {
                $x = array();
                foreach ($row as $key => $val) {
                    $x[$key] = $val;
                }

                $results[] = (object) $x;
            }

            while ($this->mysql->more_results()) {
                //Eliminamos otros resultados
                $this->mysql->next_rlesult();
                $this->mysql->use_result();
            }
            // $stmt->close();
            return $results;
        }
    }

}

//DEFINE MAIN TABLES
$TABLES = get_Table_Name();
//echo $TABLES->tb_resultados_new_year;

foreach ($TABLES as $key) {
   $T_INSCRITOS = $key->tb_inscritos_new_year;
  $T_RESULTADOS = $key->tb_resultados_new_year;
}

//global $T_INSCRITOS = $TABLES->"tb_inscritos_new_year";
//global $T_RESULTADOS = $TABLES->"tb_resultados_new_year";

function get_Table_Name(){
    global $mysqli;
    $query      = new Query($mysqli, "SELECT tb_inscritos_new_year,tb_resultados_new_year FROM sgra_config_tb");
    $parametros = array();
    $data       = $query->getresults();
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function getUsers($userName)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT nombre_usuario,password FROM usuarios WHERE nombre_usuario = ?");
    $parametros = array("s", &$userName);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//FILTROS DEL SISTEMA
function getSedes()
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT id_sede,codigo_sede,nombre_sede from sedes");
    $parametros = array();
    $data       = $query->getresults();

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function getCodigoSedes($SEDE)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT codigo_sede from sedes WHERE id_sede = ?");
    $parametros = array('s', &$SEDE);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function getAreas($idSedes)
{
    global $mysqli;
    //$query = new Query($mysqli,"SELECT codigo_area,nombre_area FROM areas WHERE codigo_relacion= ?");

    $query = new Query($mysqli, "SELECT DISTINCT(B.nombre_area) AS nombre_area,A.id_area AS id_area, A.id_sede AS id_sede
from `sede-area` A, `area` B
WHERE A.id_sede=?
AND B.id_area=A.id_area
ORDER BY 2,1");

    $parametros = array("i", &$idSedes);

    $data = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function getFacultades($idSede, $idAreas)
{
    global $mysqli;
    //$query = new Query($mysqli,"SELECT id_facultad,codigo_facultad,nombre_facultad  from facultades  where codigo_relacion = ?");

    $query = new Query($mysqli, "SELECT A.id_facultad AS id_facultad, A.id_area AS id_area, B.codigo_facultad AS codigo_facultad, B.nombre_facultad AS nombre_facultad
        from `sede-area` A, `facultades` B
        WHERE A.id_sede=?
        AND A.id_area=?
        AND B.id_facultad=A.id_facultad
        ORDER BY 3");

    $parametros = array("ii", &$idSede, &$idAreas);

    $data = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function getEscuelas($idSede, $idFacultad)
{
    global $mysqli;
    $query = new Query($mysqli, "SELECT DISTINCT esc from esc WHERE sed = ? AND fac = ?");

    $parametros = array("ss", &$idSede, &$idFacultad);

    $data = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function getCarreras($idSede, $idFacultad, $idEscuela)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT car,nombre_car from esc WHERE sed = ? AND fac = ? AND esc = ?");
    $parametros = array("sss", &$idSede, &$idFacultad, &$idEscuela);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//datachat
function showChat()
{
    $page = '';
    global $mysqli;
    $query      = new Query($mysqli, "SELECT * FROM chat ORDER BY id DESC");
    $parametros = array();
    $data       = $query->getresults();

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//datachat
function saveChat($NAME, $MENSAJE)
{
    global $mysqli;
    $query      = new Query($mysqli, "INSERT into chat(nombre, mensaje) VALUES (?,?)");
    $parametros = array('ss', &$NAME, &$MENSAJE);
    $data       = $query->getresults($parametros);
    return true;

}

//TableEditIns
function showResourceInscrito()
{
    $page = '';
    global $mysqli;
    $query      = new Query($mysqli, "SELECT * FROM sgra_recursosinscritos");
    $parametros = array();
    $data       = $query->getresults();

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//GETALLDATA TABLE INS
function showAllDataInscrito($provincia,$clave,$tomo,$folio)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT * FROM inscritos2017 where provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('ssss', &$provincia,&$clave,&$tomo,&$folio);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function showResourceResultados()
{
    $page = '';
    global $mysqli;
    $query      = new Query($mysqli, "SELECT * FROM sgra_recursosresultados");
    $parametros = array();
    $data       = $query->getresults();

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//DATA RESULTADOS
function showAllDataResultados($provincia,$clave,$tomo,$folio)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT * FROM resultados2017 where provincia = ? and clave = ? and  tomo = ? and  folio = ?");
    $parametros = array('ssss', &$provincia,&$clave,&$tomo,&$folio);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}


//LIMIT 1000
//DATA PARA MOSTRAR EN LA TABLA DE RESULTADOS
//TIENE NUEVOS CAMPOS
function showDataResultado($START, $RECORD)
{
    // $record_page = 10;
    $page = '';
    global $mysqli;
    $query = new Query($mysqli, "SELECT nombre,apellido,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,ps,pca,pcg,gatb,verbal,numer,indice
        FROM resultados2017 where n_ins is not null LIMIT " . $START . ", " . $RECORD);
    $parametros = array();
    $data       = $query->getresults();

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}
//without limit
function showDataResultadoW()
{
    // $record_page = 10;
    $page     = '';
    $NAME     = "JOSE";
    $LASTNAME = "PINTO";
    global $mysqli;
    $query = new Query($mysqli, "SELECT nombre,apellido,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia
     FROM resultados2017 where nombre = ? AND apellido = ? LIMIT 30 ");
    $parametros = array("ss", &$NAME, &$LASTNAME);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//reportes
function getDataReportV1($SEDE)
{

    if ($SEDE < 10) {
        $actSEDE = '0' . $SEDE;
        global $mysqli;
        $query = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,sede,areap,facultad, ps, gatb,pca,indice,verbal,numer
     FROM resultados2017 where sede = ? LIMIT 10");
        $parametros = array('s', &$actSEDE);
        $data       = $query->getresults($parametros);

        if (isset($data[0])) {
            return $data;
        } else {
            return null;
        }

    } else {

        global $mysqli;
        $query = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',tomo,'-',folio)AS cedula, ps, gatb,pca,indice,verbal,numer
     FROM resultados2017 where sede = ? LIMIT 10");
        $parametros = array('s', &$SEDE);
        $data       = $query->getresults($parametros);

        if (isset($data[0])) {
            return $data;
        } else {
            return null;
        }

    }

}

function getDataReportV2($SEDE, $AREAP)
{

    if ($SEDE < 10) {
        $actSEDE = '0' . $SEDE;
        global $mysqli;
        $query = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,sede,areap,facultad, ps, gatb,pca,indice,verbal,numer
     FROM resultados2017 where ( sede = ? AND areap = ?) LIMIT 10");
        $parametros = array('ss', &$actSEDE, &$AREAP);
        $data       = $query->getresults($parametros);

        if (isset($data[0])) {
            return $data;
        } else {
            return null;
        }

    } else {

        global $mysqli;
        $query = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',tomo,'-',folio)AS cedula, ps, gatb,pca,indice,verbal,numer
     FROM resultados2017 where ( sede = ? AND areap = ?) LIMIT 10");
        $parametros = array('ss', &$SEDE, &$AREAP);
        $data       = $query->getresults($parametros);

        if (isset($data[0])) {
            return $data;
        } else {
            return null;
        }

    }

}

function dataToReport($SEDE)
{

    if ($SEDE < 10) {
        saveLogs("Renold", "Aplicando la instruccion A");
        $actSEDE = '0' . $SEDE;
        global $mysqli;
        $query = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',tomo,'-',folio)AS cedula, ps, gatb,pca,indice,verbal,numer
     FROM resultados2017 WHERE sede =?");
        $parametros = array('s', &$actSEDE);
        $data       = $query->getresults($parametros);

        if (isset($data[0])) {
            return $data;
        } else {
            return null;
        }

    } else {
        saveLogs("Renold", "Aplicando la instruccion B");
        global $mysqli;
        $query = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',tomo,'-',folio)AS cedula, ps, gatb,pca,indice,verbal,numer
     FROM resultados2017 WHERE sede =?");
        $parametros = array('s', &$SEDE);
        $data       = $query->getresults($parametros);

        if (isset($data[0])) {
            return $data;
        } else {
            return null;
        }

    }

}

//INSCRITOS
//LIMIT 1000
function showDataInscrito()
{
    // $record_page = 10;
    $page = '';
    global $mysqli;
    $query = new Query($mysqli, "SELECT nombre,apellido,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia
     FROM inscritos2017");
    $parametros = array();
    $data       = $query->getresults();

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//Tabla Inscritos con Filtros definidos
////////////////////////////////////////////////////////////////////////////////////////////////////
//FILTER BY SEDE
function filterByS($SEDE,$TABLE_I)
{
    global $mysqli;
    $TINS        = $TABLE_I;
    $query = new Query($mysqli, "SELECT red,nombre,apellido,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia
     FROM " .$TINS. " where sede = ?");
    $parametros = array('i', &$SEDE);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//FILTER SEDE AREA
function filterByS_A($SEDE, $AREA,$TABLE_I)
{
    global $mysqli;
    $TINS        = $TABLE_I;
    $query = new Query($mysqli, "SELECT red,nombre,apellido,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia
     FROM " .$TINS. " where sede = ? AND area_i = ?");
    $parametros = array("ii", &$SEDE, &$AREA);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//FILTER SEDE AREA FACULTAD
function filterByS_A_F($SEDE, $AREA, $FACULTAD,$TABLE_I)
{
    global $mysqli;
    $TINS        = $TABLE_I;
    $query = new Query($mysqli, "SELECT red,nombre,apellido,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia
     FROM " .$TINS. " where sede = ? AND area_i = ? AND fac_ia = ?");
    $parametros = array("iii", &$SEDE, &$AREA, &$FACULTAD);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//FILTER SEDE AREA FACULTAD ESCUELA
function filterBy_S_A_F_E($SEDE, $AREA, $FACULTAD, $ESCUELA,$TABLE_I)
{
    global $mysqli;
    $TINS        = $TABLE_I;
    $query = new Query($mysqli, "SELECT red,nombre,apellido,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia
     FROM " .$TINS. " where sede = ? AND area_i = ? AND fac_ia = ? AND esc_ia = ? ");
    $parametros = array("iiii", &$SEDE, &$AREA, &$FACULTAD, &$ESCUELA);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//FILTER SEDE AREA FACULTAD ESCUELA CARRERA
function filterBy_S_A_F_E_C($SEDE, $AREA, $FACULTAD, $ESCUELA, $CARRERA,$TABLE_I)
{
    global $mysqli;
    $TINS        = $TABLE_I;
    $query = new Query($mysqli, "SELECT red,nombre,apellido,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia
     FROM " .$TINS. " where sede = ? AND area_i = ? AND fac_ia = ? AND esc_ia = ? AND car_ia = ? ");
    $parametros = array("iiiii", &$SEDE, &$AREA, &$FACULTAD, &$ESCUELA, &$CARRERA);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

////////////////////////////////////////////////////////////////////////////////////////////////////
//TABLA RESULTADOS con Filtros definidos
////////////////////////////////////////////////////////////////////////////////////////////////////

function filter_TR_By_S($SEDE,$TABLE_R)
{
    global $mysqli;
    $TRES         = $TABLE_R;
    $query      = new Query($mysqli, "SELECT red,nombre,apellido,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,ps,pca,pcg,gatb,verbal,numer,indice FROM " .$TRES. " where sede = ?");
    $parametros = array('i', &$SEDE);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//FILTER SEDE AREA
function filter_TR_By_S_A($SEDE, $AREA,$TABLE_R)
{
    global $mysqli;
    $TRES         = $TABLE_R;
    $query      = new Query($mysqli, "SELECT red,nombre,apellido,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,ps,pca,pcg,gatb,verbal,numer,indice FROM " .$TRES. " where sede = ? AND area_i = ?");
    $parametros = array("ii", &$SEDE, &$AREA);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//FILTER SEDE AREA FACULTAD
function filter_TR_By_S_A_F($SEDE, $AREA, $FACULTAD,$TABLE_R)
{
    global $mysqli;
    $TRES         = $TABLE_R;
    $query      = new Query($mysqli, "SELECT red,nombre,apellido,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,ps,pca,pcg,gatb,verbal,numer,indice FROM " .$TRES. " where sede = ? AND area_i = ? AND fac_ia = ?");
    $parametros = array("iii", &$SEDE, &$AREA, &$FACULTAD);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//FILTER SEDE AREA FACULTAD ESCUELA
function filter_TR_By_S_A_F_E($SEDE, $AREA, $FACULTAD, $ESCUELA,$TABLE_R)
{
    global $mysqli;
    $TRES         = $TABLE_R;
    $query      = new Query($mysqli, "SELECT red,nombre,apellido,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,ps,pca,pcg,gatb,verbal,numer,indice FROM " .$TRES. " where sede = ? AND area_i = ? AND fac_ia = ? AND esc_ia = ? ");
    $parametros = array("iiii", &$SEDE, &$AREA, &$FACULTAD, &$ESCUELA);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//FILTER SEDE AREA FACULTAD ESCUELA CARRERA
function filter_TR_By_S_A_F_E_C($SEDE, $AREA, $FACULTAD, $ESCUELA, $CARRERA,$TABLE_R)
{
    global $mysqli;
    $TRES         = $TABLE_R;
    $query      = new Query($mysqli, "SELECT red,nombre,apellido,CONCAT(provincia,'-',clave,'-',tomo,'-',folio))AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,ps,pca,pcg,gatb,verbal,numer,indice FROM " .$TRES. " where sede = ? AND area_i = ? AND fac_ia = ? AND esc_ia = ? AND car_ia = ? ");
    $parametros = array("iiiii", &$SEDE, &$AREA, &$FACULTAD, &$ESCUELA, &$CARRERA);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

///////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
//TABLA REPORTES
///////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

function filter_TREPORTE_By_S($SEDE, $state, $row, $index)
{
    global $mysqli;
    $TR        = "resultados2017";
    $addQuery  = "ORDER BY " . $row . " " . $index;
    $lastQuery = "limit 20";

    //SET QUERY
    //1 to send at main table
    //2 to send at the report
    if ($state == 1) {
        $query      = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,sede,areap,ps,gatb,pca,indice,verbal,numer FROM " . $TR . " where sede = ? limit 20");
        $parametros = array('i', &$SEDE);
        $data       = $query->getresults($parametros);

    } else if ($state == 2) {
        $query      = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,sede,areap,ps,gatb,pca,indice,verbal,numer FROM " . $TR . " where sede = ? " . $addQuery);
        $parametros = array('i', &$SEDE);
        $data       = $query->getresults($parametros);

    } else {
        //error
    }

//return
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//FILTER SEDE AREA
function filter_TREPORTE_By_S_A($SEDE, $AREA, $state, $row, $index)
{
    global $mysqli;
    $TR        = "resultados2017";
    $addQuery  = "ORDER BY " . $row . " " . $index;
    $lastQuery = "limit 20";

    //SET QUERY
    //1 to send at main table
    //2 to send at the report

    if ($state == 1) {
        $query      = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,sede,areap,ps,gatb,pca,indice,verbal,numer FROM " . $TR . " where sede = ? AND areap = ? limit 20");
        $parametros = array("ii", &$SEDE, &$AREA);
        $data       = $query->getresults($parametros);

    } elseif ($state == 2) {
        $query      = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,sede,areap,ps,gatb,pca,indice,verbal,numer FROM " . $TR . " where sede = ? AND areap = ? " . $addQuery);
        $parametros = array("ii", &$SEDE, &$AREA);
        $data       = $query->getresults($parametros);
    } else {
        //error
    }

//return
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//FILTER SEDE AREA FACULTAD
function filter_TREPORTE_By_S_A_F($SEDE, $AREA, $FACULTAD, $state, $row, $index)
{
    global $mysqli;
    $TR        = "resultados2017";
    $addQuery  = "ORDER BY " . $row . " " . $index;
    $lastQuery = "limit 20";

    //SET QUERY
    //1 to send at main table
    //2 to send at the report

    if ($state == 1) {
        $query      = new Query($mysqli, "SELECT apellido,nombre,(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,sede,areap,ps,gatb,pca,indice,verbal,numer FROM " . $TR . " where sede = ? AND area_i = ? AND fac_ia = ? limit 20");
        $parametros = array("iii", &$SEDE, &$AREA, &$FACULTAD);
        $data       = $query->getresults($parametros);

    } elseif ($state == 2) {
        $query      = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,sede,areap,ps,gatb,pca,indice,verbal,numer FROM " . $TR . " where sede = ? AND area_i = ? AND fac_ia = ? " . $addQuery);
        $parametros = array("iii", &$SEDE, &$AREA, &$FACULTAD);
        $data       = $query->getresults($parametros);

    } else {
        //error
    }

//return
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//FILTER SEDE AREA FACULTAD ESCUELA
function filter_TREPORTE_By_S_A_F_E($SEDE, $AREA, $FACULTAD, $ESCUELA, $state, $row, $index)
{
    global $mysqli;
    $TR        = "resultados2017";
    $addQuery  = "ORDER BY " . $row . " " . $index;
    $lastQuery = "limit 20";

    //SET QUERY
    //1 to send at main table
    //2 to send at the report

    if ($state == 1) {
        $query      = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,sede,areap,ps,gatb,pca,indice,verbal,numer FROM " . $TR . " where sede = ? AND area_i = ? AND fac_ia = ? AND esc_ia = ? limit 20 ");
        $parametros = array("iiii", &$SEDE, &$AREA, &$FACULTAD, &$ESCUELA);
        $data       = $query->getresults($parametros);

    } elseif ($state == 2) {
        $query      = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,sede,areap,ps,gatb,pca,indice,verbal,numer FROM " . $TR . " where sede = ? AND area_i = ? AND fac_ia = ? AND esc_ia = ? " . $addQuery);
        $parametros = array("iiii", &$SEDE, &$AREA, &$FACULTAD, &$ESCUELA);
        $data       = $query->getresults($parametros);

    } else {
        //error
    }

//return
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//FILTER SEDE AREA FACULTAD ESCUELA CARRERA
function filter_TREPORTE_By_S_A_F_E_C($SEDE, $AREA, $FACULTAD, $ESCUELA, $CARRERA, $state, $row, $index)
{
    global $mysqli;
    $TR = "resultados2017";

    $addQuery  = "ORDER BY " . $row . " " . $index;
    $lastQuery = "limit 20";

    //SET QUERY
    //1 to send at main table
    //2 to send at the report

    if ($state == 1) {
        $query      = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,sede,areap,ps,gatb,pca,indice,verbal,numer FROM " . $TR . " where sede = ? AND area_i = ? AND fac_ia = ? AND esc_ia = ? AND car_ia = ? limit 20");
        $parametros = array("iiiii", &$SEDE, &$AREA, &$FACULTAD, &$ESCUELA, &$CARRERA);
        $data       = $query->getresults($parametros);

    } elseif ($state == 2) {
        $query      = new Query($mysqli, "SELECT apellido,nombre,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,sede,areap,ps,gatb,pca,indice,verbal,numer FROM " . $TR . " where sede = ? AND area_i = ? AND fac_ia = ? AND esc_ia = ? AND car_ia = ? " . $addQuery);
        $parametros = array("iiiii", &$SEDE, &$AREA, &$FACULTAD, &$ESCUELA, &$CARRERA);
        $data       = $query->getresults($parametros);

    } else {
        //error
    }

//return
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}
///////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
//COUNT BY SEDE
function showDataBySede($SEDE)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT nombre,apellido,sede FROM inscritos2017 where sede = ?");
    $parametros = array("i", &$SEDE);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//COUNT BY SEDE & area
function showDataBySedeArea($SEDE, $AREA)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT nombre,apellido,sede,area_i FROM inscritos2017 where sede = ? and area_i = ? ");
    $parametros = array("ii", &$SEDE, &$AREA);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//without limit
function showDataInscritoW()
{

    global $mysqli;
    $query = new Query($mysqli, "SELECT nombre,apellido,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia
     FROM inscritos2017 where n_ins is not null ");
    $parametros = array();
    $data       = $query->getresults();

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//

function searchInscrito($ID_SEARCH)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT nombre,apellido,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia FROM resultados2017 where n_ins =?");
    $parametros = array('s', &$ID_SEARCH);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function searchInscritoI($ID_SEARCH)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT nombre,apellido,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia FROM inscritos2017 where n_ins =?");
    $parametros = array('s', &$ID_SEARCH);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function getAreasComun()
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT codigo_area,nombre_area from area");
    $parametros = array();
    $data       = $query->getresults();

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function getFacultadesComun($idAreas)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT id_facultad, codigo_facultad, nombre_facultad from facultades WHERE codigo_relacion = '?'");
    $parametros = array("i", &$idAreas);
    $data       = $query->getresults();

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function getDataIndividual($T_RESULTADOS,$PROVINCIA,$CLAVE,$TOMO,$FOLIO)
{
    global $mysqli;
    $TRES = $T_RESULTADOS;
    $query = new Query($mysqli, "SELECT
        SUM(cl_def+cl_propb) as valor_lexico,
        SUM(lect1+lect2) as valor_lectura,
        SUM(r_com_comp+rel_o+r_plan) as valor_redaccion,
        SUM(cl_def+cl_propb+r_com_comp+rel_o+r_plan+lect1+lect2) as subtotalverbal,
        SUM(oper1+oper2)as operatoria, SUM(razon1+razon2) as razonamiento ,
        SUM(oper1+oper2+razon1+razon2) as subtotalnumerico,pca from ".$TRES." where provincia=? and clave=? and tomo=? and folio=?");
   $parametros = array('ssss', &$PROVINCIA,&$CLAVE,&$TOMO,&$FOLIO);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function areaEstudiante($numInscrito)
{
    global $mysqli;
    $query      = new Query($mysqli, 'SELECT area_i, n_ins FROM resultados WHERE n_ins=?');
    $parametros = array("s", &$numInscrito);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function updateRowDB($nombre, $apellido, $sede, $fac1a, $esc1a, $car1a, $fac2a, $esc2a, $car2a, $fac3a, $esc3a, $car3a, $numInscrito)
{
    global $mysqli;
    $query      = new Query($mysqli, 'UPDATE resultados2017 set nombre=?, apellido=?,sede=?,fac_ia=?,esc_ia=?,car_ia=?,fac_iia=?,esc_iia=?,car_iia=?,fac_iiia=?,esc_iiia=?,car_iiia=?  WHERE n_ins =? ');
    $parametros = array("sssssssssssss", &$nombre, &$apellido, &$sede, &$fac1a, &$esc1a, &$car1a, &$fac2a, &$esc2a, &$car2a, &$fac3a, &$esc3a, &$car3a, &$numInscrito);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function deleteRowDBResultados($T_RESULTADOS,$PROVINCIA,$CLAVE,$TOMO,$FOLIO)
{
    global $mysqli;
    $query      = new Query($mysqli, "DELETE from ".$T_RESULTADOS." where provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('ssss', &$PROVINCIA,&$CLAVE,&$TOMO,&$FOLIO);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function deleteRowDBInscritos($T_INSCRITOS,$PROVINCIA,$CLAVE,$TOMO,$FOLIO)
{
    global $mysqli;
    $query      = new Query($mysqli, "DELETE from ".$T_INSCRITOS." where provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('ssss', &$PROVINCIA,&$CLAVE,&$TOMO,&$FOLIO);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function showRegistersUsers()
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT name,lastname,nombre_usuario,email,type from usuarios");
    $parametros = array();
    $data       = $query->getresults();
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function showLogsUsers()
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT * from logsystem ORDER BY ID_LOG DESC");
    $parametros = array();
    $data       = $query->getresults();
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function saveLogs($USERNAME, $LOGREPORT)
{
    global $mysqli;
    date_default_timezone_set("America/Panama"); //ZONA HORARIA PAN
    $datetime   = date("d-m-Y h:i:s A");
    $query      = new Query($mysqli, "INSERT INTO logsystem(username,datelog,accion) VALUES (?,?,?)");
    $parametros = array("sss", &$USERNAME, &$datetime, &$LOGREPORT);
    $data       = $query->getresults($parametros);
    //$result = "Registro insertado";
    //return $result;
}

function selectUserExist($USERNAME)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT * FROM usuarios WHERE nombre_usuario = ?");
    $parametros = array("s",&$USERNAME);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];
    } else {
        return null;
    }
}

function insertNewRegister($NAME, $LASTNAME, $USERNAME, $EMAIL, $ROL, $PASSWORD)
{
    global $mysqli;
    $query      = new Query($mysqli, "INSERT INTO usuarios(name,lastname,nombre_usuario,email,type,password) VALUES (?,?,?,?,?,?)");
    $parametros = array("ssssss", &$NAME, &$LASTNAME, &$USERNAME, &$EMAIL, &$ROL, &$PASSWORD);
    $data       = $query->getresults($parametros);
    return true;
}

//USUARIO ESPECIAL
function insertNewRegisterSpecial($NAME, $LASTNAME, $USERNAME, $EMAIL, $ROL, $PASSWORD, $ACCESS2, $ACCESS3, $ACCESS4, $ACCESS5)
{
    global $mysqli;
    $query      = new Query($mysqli, "INSERT INTO usuarios(name,lastname,nombre_usuario,email,type,password,acceso2,acceso3,acceso4,acceso5) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $parametros = array("ssssssssss", &$NAME, &$LASTNAME, &$USERNAME, &$EMAIL, &$ROL, &$PASSWORD, &$ACCESS2, &$ACCESS3, &$ACCESS4, &$ACCESS5);
    $data       = $query->getresults($parametros);
    return true;
}
function updateUserSpecialData($NAME, $LASTNAME, $USERNAME, $EMAIL, $ROL, $ACCESS2, $ACCESS3, $ACCESS4, $ACCESS5, $USER_ID)
{
    global $mysqli;
    $query      = new Query($mysqli, "UPDATE usuarios SET name=?,lastname=?,nombre_usuario=?,email=?,type=?,acceso2=?, acceso3=?,acceso4=?,acceso5=? WHERE id_usuario=?");
    $parametros = array('ssssssssss', &$NAME, &$LASTNAME, &$USERNAME, &$EMAIL, &$ROL, &$ACCESS2, &$ACCESS3, &$ACCESS4, &$ACCESS5, &$USER_ID);
    $data       = $query->getresults($parametros);
    return true;

}

function updateUserData($NAME, $LASTNAME, $USERNAME, $EMAIL, $ROL, $USER_ID)
{
    global $mysqli;
    $query      = new Query($mysqli, "UPDATE usuarios SET name=?,lastname=?,nombre_usuario=?,email=?,type=? WHERE id_usuario=?");
    $parametros = array('ssssss', &$NAME, &$LASTNAME, &$USERNAME, &$EMAIL, &$ROL, &$USER_ID);
    $data       = $query->getresults($parametros);
    return true;
}

function updatePaswordUser($PWD, $STATE, $USERNAME)
{
    global $mysqli;
    $query      = new Query($mysqli, "UPDATE usuarios SET password=?, estado_acceso=? WHERE nombre_usuario = ?");
    $parametros = array('sss', &$PWD, &$STATE, &$USERNAME);
    $data       = $query->getresults($parametros);
    return true;
}

function checkPwdRestore($PWD, $STATE_PWD, $USERNAME)
{
    global $mysqli;
    $query      = new Query($mysqli, "UPDATE usuarios SET password=?,pwdRestaurar=? WHERE nombre_usuario = ?");
    $parametros = array('sss', &$PWD, &$STATE_PWD, &$USERNAME);
    $data       = $query->getresults($parametros);
    return true;
}
/////////////////////////////////
//GET ID
function getUserID($USERNAME)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT id_usuario FROM usuarios WHERE nombre_usuario=?");
    $parametros = array('s', &$USERNAME);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];
    } else {
        return null;
    }
}

/////////////////////////////////////////
function deleteRegister($USERNAME)
{
    global $mysqli;
    $query      = new Query($mysqli, "DELETE FROM usuarios where nombre_usuario = ?");
    $parametros = array("s", &$USERNAME);
    $data       = $query->getresults($parametros);
    return true;
}

function getUser($USERNAME, $PASSWORD)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT nombre_usuario,password,type,estado_acceso FROM usuarios WHERE nombre_usuario=? AND password=?");
    $parametros = array('ss', &$USERNAME, &$PASSWORD);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];
    } else {
        return null;
    }
}

function getUserPWD($USERNAME)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT nombre_usuario,password FROM usuarios WHERE nombre_usuario=? ");
    $parametros = array('s', &$USERNAME);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];
    } else {
        return null;
    }
}
function getAllowPages($USERNAME)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT acceso2,acceso3,acceso4,acceso5 FROM usuarios WHERE nombre_usuario=?");
    $parametros = array('s', &$USERNAME);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];
    } else {
        return null;
    }
}

function getTypeUser($USERNAME)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT type FROM usuarios WHERE nombre_usuario=?");
    $parametros = array('s', &$USERNAME);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}
}

function getAllDataUser($USERNAME)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT name,lastname,nombre_usuario,email,type FROM usuarios WHERE nombre_usuario=?");
    $parametros = array('s', &$USERNAME);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}
}

function getDataUserUniq($USERNAME)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT name,lastname,nombre_usuario,email,type,id_usuario FROM usuarios WHERE nombre_usuario=?");
    $parametros = array('s', &$USERNAME);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}
}

function getTablesList()
{
    global $mysqli;
    $query      = new Query($mysqli, "SHOW TABLES FROM sgra");
    $parametros = array();
    $data       = $query->getresults();
    if (isset($data)) {
        return $data;} else {return null;}
}

//Cambiar ruta para exportar datos
//EXPORTAR RESULTADOS DE TABLA RESULTADOS
function exportDataResultados($T_RESULTADOS,$FILENAME)
{
    global $mysqli;
    $datetime    = date("d_m_Y_h_i_s_A");
    $newFileName = $FILENAME . "_" . $datetime;
    //$pathDocument = "../Export/" . $newFileName . ".csv";
    $pathDocument = "'C:/xampp/htdocs/SGRA/Export/" . $newFileName . ".csv'";
    $path         = "../Export/" . $newFileName . ".csv";

    $Query      = new Query($mysqli, "SELECT * FROM ".$T_RESULTADOS." INTO OUTFILE " . $pathDocument . " FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n'");
    $parametros = array();
    $data       = $Query->getresults();

    // --- Guardamos el documento
    return $path;
}

//EXPORTAR RESULTADOS DE TABLA INSCRITOS
//Cambiar ruta para exportar datos
function exportDataInscritos($T_INSCRITOS,$FILENAME)
{
    global $mysqli;
    $datetime    = date("d_m_Y_h_i_s_A");
    $newFileName = $FILENAME . "_" . $datetime;
    //$pathDocument = "../Export/" . $newFileName . ".csv";
    $pathDocument = "'C:/xampp/htdocs/SGRA/Export/" . $newFileName . ".csv'";
    $path         = "../Export/" . $newFileName . ".csv";

    $Query      = new Query($mysqli, "SELECT * FROM " . $T_INSCRITOS . " INTO OUTFILE " . $pathDocument . " FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n'");
    $parametros = array();
    $data       = $Query->getresults();

    // --- Guardamos el documento
    return $path;
}
////////////////////////////////////////////

//EXPORTAR RESULTADOS INDIVIDUALES DE LA TABLA RESULTADOS
function exportDataOneResultados($T_RESULTADOS,$PROVINCIA,$CLAVE,$TOMO,$FOLIO)
{
    global $mysqli;
    $TRES = $T_RESULTADOS;
    $Query      = new Query($mysqli, "SELECT * FROM ".$TRES." where provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('ssss', &$PROVINCIA,&$CLAVE,&$TOMO,&$FOLIO);
    $data       = $Query->getresults($parametros);

    // --- Guardamos el documento
   if (isset($data[0])) {
        return $data[0];} else {return null;}
}

//EXPORTAR RESULTADOS INDIVIDUALES DE LA TABLA INSCRITOS
function exportDataOneInscritos($T_INSCRITOS,$PROVINCIA,$CLAVE,$TOMO,$FOLIO)
{
    global $mysqli;
    $TINS = $T_INSCRITOS;
    $Query      = new Query($mysqli, "SELECT * FROM ".$TINS." where provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('ssss', &$PROVINCIA,&$CLAVE,&$TOMO,&$FOLIO);
    $data       = $Query->getresults($parametros);

    // --- Guardamos el documento
   if (isset($data[0])) {
        return $data[0];} else {return null;}
}


function updateRed($TABLA,$EXP,$PROVINCIA,$CLAVE,$TOMO,$FOLIO){
     global $mysqli;
    $Query      = new Query($mysqli, "UPDATE ".$TABLA." SET red= ? WHERE provincia =? and clave=? and tomo =? and  folio =?");
    $parametros = array("sssss",&$EXP,&$PROVINCIA, &$CLAVE, &$TOMO, &$FOLIO);
    $data       = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}

}
////////////////////////////////////////////


//////////////////////////////////////////////

function validationLastYearInscrito($NUMINSCRITO)
{
    global $mysqli;
    $Query      = new Query($mysqli, "SELECT nombre,apellido,n_ins FROM inscritos2017 WHERE n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}
}

function validationLastYearResultado($NUMINSCRITO)
{
    global $mysqli;
    $Query = new Query($mysqli, "SELECT nombre,apellido,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia
     FROM resultados2017 WHERE n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}
}

function validationExist($NUMINSCRITO)
{
    global $mysqli;
    $Query      = new Query($mysqli, "SELECT  inscritoanterior,codigovalidacion FROM validaciones WHERE inscritoanterior=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}
}
////////////////////////////////////////////////////
//POR CID INSCRITOS

function getInscritos()
{
    global $mysqli;
    $Query      = new Query($mysqli, "SELECT name,lastname,nombre_usuario,email,type from usuarios");
    $parametros = array();
    $data       = $Query->getresults();

    if (isset($data[0])) {
        return $data[0];
    } else {
        return null;
    }

}

//POR CID en RESULTADOS

function showDataVAI($PROVINCIA, $CLAVE, $TOMO, $FOLIO,$T_INSCRITOS)
{
    global $mysqli;
    $TINS = $T_INSCRITOS;
    $query      = new Query($mysqli, "SELECT nombre,apellido,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia FROM  ".$TINS." WHERE provincia =? and clave=? and  tomo =? and  folio =?");
    $parametros = array("ssss", &$PROVINCIA, &$CLAVE,&$TOMO, &$FOLIO);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function showDataVAR($PROVINCIA, $CLAVE, $TOMO, $FOLIO,$T_RESULTADOS)
{
    global $mysqli;
    $TRES = $T_RESULTADOS;
    $query      = new Query($mysqli, "SELECT nombre,apellido,CONCAT(provincia,'-',clave,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,ps,pca,pcg,gatb,verbal,numer,indice FROM ".$TRES." WHERE provincia =? and clave=? and  tomo =? and  folio =?");
    $parametros = array("ssss", &$PROVINCIA, &$CLAVE,&$TOMO, &$FOLIO);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function getTestUSER($PROVINCIA, $CLAVE, $TOMO, $FOLIO,$T_RESULTADOS)
{
    global $mysqli;
    $TRES = $T_RESULTADOS;
    $Query      = new Query($mysqli, "SELECT sede,facultad,escuela,areap,ps,pca,pcg,gatb FROM ".$TRES." WHERE provincia =? and clave=? and  tomo =? and  folio =?");
    $parametros = array("ssss", &$PROVINCIA, &$CLAVE,&$TOMO, &$FOLIO);
    $data       = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}

}

function getUserAreaTest($T_RESULTADOS,$PROVINCIA, $CLAVE, $TOMO, $FOLIO)
{
    global $mysqli;
    $TRES = $T_RESULTADOS;
    $Query      = new Query($mysqli, "SELECT areap,ps,pca,pcg,gatb FROM ".$TRES." WHERE provincia =? and clave=? and  tomo =? and  folio =?");
    $parametros = array("ssss", &$PROVINCIA, &$CLAVE,&$TOMO, &$FOLIO);
    $data       = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}

}

function updateIndice($T_RESULTADOS,$INDICE, $PROVINCIA, $CLAVE, $TOMO, $FOLIO)
{
 global $mysqli;
 $TRES = $T_RESULTADOS;
    $Query      = new Query($mysqli, "UPDATE ".$TRES." SET indice = ? WHERE provincia =? and clave=? and tomo =? and  folio =?");
    $parametros = array("sssss",&$INDICE, &$PROVINCIA, &$CLAVE, &$TOMO, &$FOLIO);
    $data       = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}


}


function updateUserTest($T_RESULTADOS,$SEDE,$FACULTAD,$ESCUELA,$AREA,$PS,$PCA,$PCG,$GATB,$PROVINCIA, $CLAVE, $TOMO, $FOLIO)
{
    global $mysqli;
    $TRES = $T_RESULTADOS;
    $Query      = new Query($mysqli, "UPDATE ".$TRES." SET sede =? ,facultad =?, escuela =?, areap =?, ps =?,pca =?,pcg =?,gatb =? WHERE provincia =? and clave=? and tomo =? and  folio =?");
    $parametros = array("ssssssssssss",&$SEDE,&$FACULTAD,&$ESCUELA,&$AREA,&$PS,&$PCA,&$PCG,&$GATB,&$PROVINCIA, &$CLAVE,&$TOMO, &$FOLIO);
    $data       = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}

}


function validationCIDExist($CID)
{
    global $mysqli;
    $Query      = new Query($mysqli, "SELECT * FROM validaciones WHERE cedula=?");
    $parametros = array('s', &$CID);
    $data       = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}
}

///////////////////////
//CID EXIST

function getUserCIDFromInscritos($PROVINCIA,$CLAVE, $TOMO , $FOLIO, $T_INSCRITOS)
{
    global $mysqli;
    $TINS         = $T_INSCRITOS;
    $Query      = new Query($mysqli, "SELECT * FROM " . $TINS . " WHERE provincia =? and clave=? and  tomo =? and  folio =?");
    $parametros = array('ssss', &$PROVINCIA, &$CLAVE , &$TOMO , &$FOLIO);
    $data       = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}

}

function getUserCIDFromResultados($PROVINCIA, $CLAVE, $TOMO , $FOLIO, $T_RESULTADOS)
{
    global $mysqli;
    $TRES         = $T_RESULTADOS;
    $Query      = new Query($mysqli, "SELECT * FROM " . $TRES . " WHERE provincia =? and clave=? and  tomo =? and  folio =?");
    $parametros = array('ssss', &$PROVINCIA, &$CLAVE , &$TOMO , &$FOLIO);
    $data       = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}

}
//////////////////
function checkRegisterExistInscritos($T_INSCRITOS,$NUMINSCRITO)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT nombre,apellido,n_ins FROM ".$T_INSCRITOS." WHERE n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}
}

function checkRegisterExistResultados($T_RESULTADOS,$NUMINSCRITO)
{
    global $mysqli;
    $Query      = new Query($mysqli, "SELECT nombre,apellido,n_ins FROM ".$T_RESULTADOS." WHERE n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}
}

function checkLastValidationCode()
{
    global $mysqli;
    //$Query      = new Query($mysqli, "SELECT n_ins FROM resultados2018 WHERE n_ins LIKE 'V%' ORDER BY n_ins DESC LIMIT 1");
    $Query      = new Query($mysqli, "SELECT codigovalidacion FROM validaciones ORDER BY codigovalidacion DESC LIMIT 1");
    $parametros = array();
    $data       = $Query->getresults();
    if (isset($data[0])) {
        return $data[0];} else {return null;}
}

function getAllDataValidationIns($NUMINSCRITO)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT * from inscritos2017 where n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $query->getresults($parametros);
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function getAllDataValidationRes($NUMINSCRITO)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT * from resultados2017 where n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $query->getresults($parametros);
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//////////////////////////////////////////////////////////////////////////////////////
//COPIADO DE LA BASE DE DATOS A LA BASA DE DE DATOS TEMPORAL
function clonTable1toTable2Inscritos($T_INSCRITOS,$PROVINCIA, $CLAVE, $TOMO, $FOLIO)
{
    global $mysqli;
    $TINS = $T_INSCRITOS;
    $query      = new Query($mysqli, "INSERT INTO inscritostmp SELECT * FROM ".$TINS." WHERE provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('ssss', &$PROVINCIA, &$CLAVE, &$TOMO, &$FOLIO);
    $data       = $query->getresults($parametros);
    return true;
}

//COPIADO DE LA BASE DE DATOS A LA BASA DE DE DATOS TEMPORAL
function clonTable1toTable2Resultados($T_RESULTADOS,$PROVINCIA, $CLAVE, $TOMO, $FOLIO)
{
    global $mysqli;
    $TRES = $T_RESULTADOS;
    $query      = new Query($mysqli, "INSERT INTO resultadostmp SELECT * FROM ".$TRES." WHERE provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('ssss', &$PROVINCIA, &$CLAVE, &$TOMO, &$FOLIO);
    $data       = $query->getresults($parametros);
    return true;
}

//CLONADO DE LA INFORMACION DESDE LA BASE DE DATOS TEMPORAL A LA BASA DE DE DATOS INSCRITOS ACTUALES
function clonInscritos($T_INSCRITOS,$PROVINCIA, $CLAVE, $TOMO, $FOLIO)
{
    global $mysqli;
    $TINS = $T_INSCRITOS;
    $query      = new Query($mysqli, "INSERT INTO ".$TINS." SELECT * FROM inscritostmp WHERE provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('ssss', &$PROVINCIA, &$CLAVE, &$TOMO, &$FOLIO);
    $data       = $query->getresults($parametros);
    return true;
}

//CLONADO DE LA INFORMACION DESDE LA BASE DE DATOS TEMPORAL A LA BASA DE DE DATOS RESULTADO ACTUALES
function clonResultados($T_RESULTADOS,$PROVINCIA, $CLAVE, $TOMO, $FOLIO){

    global $mysqli;
    $TRES = $T_RESULTADOS;
    $query      = new Query($mysqli, "INSERT INTO ".$TRES." SELECT * FROM resultadostmp WHERE provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('ssss', &$PROVINCIA, &$CLAVE, &$TOMO, &$FOLIO);
    $data       = $query->getresults($parametros);
    return true;
}

//ACTUALIZAR NUMERO DE INSCRITOS DE LA BASE DE DATOS INSCRITOS TMP
function updateInscritosTMP($NEWCODE,$PROVINCIA,$CLAVE,$TOMO,$FOLIO)
{
    global $mysqli;
    $query      = new Query($mysqli, "UPDATE inscritostmp SET n_ins =? WHERE provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('sssss', &$NEWCODE, &$PROVINCIA,&$CLAVE,&$TOMO,&$FOLIO);
    $data       = $query->getresults($parametros);
    return true;
}

//ACTUALIZAR NUMERO DE INSCRITOS DE LA BASE DE DATOS RESULTADOS TMP
function updateResultadosTMP($NEWCODE,$PROVINCIA,$CLAVE,$TOMO,$FOLIO)
{
    global $mysqli;
    $query      = new Query($mysqli, "UPDATE resultadostmp SET n_ins =? WHERE provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('sssss', &$NEWCODE,&$PROVINCIA,&$CLAVE,&$TOMO,&$FOLIO);
    $data       = $query->getresults($parametros);
    return true;
}

//INSERTAR NUMERO DE VALIDACION ,ANTERIOR  Y NUEVO NUMERO DE VALIDACION
function insertOldID($N_INS, $C_VALIDACION,$CEDULA)
{
    global $mysqli;
    $query      = new Query($mysqli, "INSERT INTO validaciones(inscritoanterior,codigovalidacion,cedula) VALUES (?,?,?)");
    $parametros = array("sss", &$N_INS, &$C_VALIDACION,&$CEDULA);
    $data       = $query->getresults($parametros);
    return true;
}

function search_N_ins($T_RESULTADOS,$PROVINCIA, $CLAVE, $TOMO, $FOLIO){

    global $mysqli;
    $TRES = $T_RESULTADOS;
    $query      = new Query($mysqli, "SELECT n_ins from ".$TRES." WHERE provincia =? and clave = ? and tomo = ? and folio= ?");
    $parametros = array("ssss", &$PROVINCIA, &$CLAVE, &$TOMO, &$FOLIO);
    $data       = $query->getresults($parametros);
    if (isset($data[0])) {
        return $data[0];} else {return null;}

}

//////////////////////////////////////////////////////////////////////////////////////
function countRow()
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT COUNT(*) AS countRow FROM logsystem");
    $parametros = array();
    $data       = $query->getresults();
    $T_logs = "logsystem";

    if (isset($data[0])) {
        foreach ($data as $key) {
            if ($key->countRow > 2000) {
                exportLogs();
                truncateTable($T_logs);
            }
        }
    } else {return null;}

}

function exportLogs()
{
    global $mysqli;
    date_default_timezone_set("America/Panama"); //ZONA HORARIA PAN
    $datetime   = date("d-m-Y");
    $query      = new Query($mysqli, "SELECT * FROM logsystem INTO OUTFILE 'C:/xampp/htdocs/SGRA/logs/logs" . $datetime . ".txt'");
    $parametros = array();
    $data       = $query->getresults();
}


function truncateTable($TABLE)
{
    global $mysqli;
    $query      = new Query($mysqli, "TRUNCATE TABLE ".$TABLE);
    $parametros = array();
    $data       = $query->getresults();
    return true;
}
/////////////////////EXPORT DATA FROM INSCRITOS AND RESULTADOS
//INDICAR EL NOMBRE DE LA BASE DATOS Y EL NOMBRE DEL ARCHIVO A EXPORTAR

function exportDatosInscritos()
{
    global $mysqli;
    $query = new Query($mysqli, "SELECT apellido,nombre,provincia,clave,tomo,folio,bach,ao_grad,sexo,col_proc,cod_col,mes_n,dia_n,ao_n,tipoc,provi,distri,corregi,mes_i,dia_i,ao_i,ao_lectivo,sede,fac_ia,esc_ia,car_ia,car_ia,car_iia,car_iiia, fac_iia, fac_iiia, telefono, CONCAT(dia_n,'/',DATE_FORMAT(STR_TO_DATE(mes_n,'%b'), '%m') , '/' , DATE_FORMAT(STR_TO_DATE(ao_n,'%Y'), '%Y')) as fecha_n ,CONCAT(dia_i,'/',DATE_FORMAT(STR_TO_DATE(mes_n,'%b'), '%m'),'/',DATE_FORMAT(STR_TO_DATE(ao_i,'%Y'), '%Y')) as fecha_i, n_ins, d from inscritos2017 LIMIT 1000");
    $data  = $query->getresults();
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function exportDatosResultados()
{
    global $mysqli;
    $query = new Query($mysqli, "SELECT sede, fac_ia, esc_ia, car_ia, provincia, clave, tomo, folio, apellido, nombre, ao_lect, gatb, pca, pcg, indice, areap, opc, n_ins, d from resultados2017 LIMIT 1500");
    $data  = $query->getresults();
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function exportDatosIndices()
{
    global $mysqli;
    $query = new Query($mysqli, "SELECT provincia,clave, tomo, folio, indice, n_ins, areap, ao_lect from resultados2017");
    $data  = $query->getresults();
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function exportDatosInscritos2($N_INS)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT apellido,nombre,provincia,clave,tomo, folio,bach,ao_grad,sexo,col_proc,cod_col,mes_n,dia_n,ao_n,tipoc,provi,distri,corregi,mes_i,dia_i,ao_i,ao_lectivo,sede,facultad,escuela,carrera,car_ia,car_iia,car_iiia, facultad2, facultad3, telefono, fecha_n , fecha_i, n_ins, d from resultados2017 where n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $query->getresults($parametros);
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function exportData($DB, $NAMEFILE)
{
    global $mysqli;
    date_default_timezone_set("America/Panama"); //ZONA HORARIA PANs
    $datetime   = date("d-m-Y");
    $query      = new Query($mysqli, "SELECT apellido,nombre,provincia,clave,tomo, folio,bach,ao_grad,sexo,col_proc,cod_col,mes_n,dia_n,ao_n,tipoc,provi,distri,corregi,mes_i,dia_i,ao_i,ao_lectivo,sede,facultad,escuela,carrera,car_ia,car_iia,car_iiia, facultad2, facultad3, telefono, fecha_n , fecha_i, n_ins, d FROM $DB INTO OUTFILE 'C:/xampp/htdocs/SGRA5/Export/$NAMEFILE" . $datetime . ".txt'");
    $parametros = array();
    $data       = $query->getresults();
}
///////////////////////////////

function insertNewDataInscritos($T_INSCRITOS,$RED, $NOTA, $APELLIDO, $NOMBRE, $CEDULA, $CEDULATXT, $PROVINCIA, $CLAVE, $TOMO, $FOLIO, $PASAPORTE, $NACIONALIDAD, $TRABAJA, $OCUPACION, $TIPOC, $COL_PROC, $COD_COL, $EST_CIVIL, $MES_N, $DIA_N, $AO_N, $MES_I, $DIA_I, $AO_I, $FAC_IA, $ESC_IA, $CAR_IA, $FAC_IIA,
    $ESC_IIA, $CAR_IIA, $FAC_IIIA, $ESC_IIIA, $CAR_IIIA, $N_INS, $BACH, $NBACHILLER, $AO_GRAD, $ECROP, $SEXO, $PVIU, $AOPVIU, $SEDE,
    $PROVI, $DISTRITO, $CORREGIMIENTO, $OCUP_P, $OCUP_M, $GRADO_P, $ESC_P, $GRADO_M, $ESC_M, $CFE, $ECPS, $IMF,
    $NPERS, $MTRASP, $THIJOS, $CHIJOS, $DISCAP, $RPADRE, $RMADRE, $RHNOS, $PGIND, $REND_ESC, $TELEFONO, $TEL_CEL,
    $TEL_OFIC, $MAIL, $T_COMP, $T_INTERNET, $COD_PROMED, $COD_EXT_LE, $CONSU_DIC, $PG_NUM, $AREA_I, $AREA_II, $AREA_III, $ARCH_I,
    $GRUPO, $EDIF, $AULA, $HORA_PRUEB, $AO_LECT, $EDAD, $FECHA_INSCR, $FECHA_NAC, $OTRO_COLEG, $NFAC_IA, $D, $COD_PROV, $NSEDE, $NFACULTAD, $NCARRERA,
    $MATRICULA, $SEFAESCA, $RED2, $NO1, $NO2) {

    global $mysqli;
    $Query      = new Query($mysqli, "INSERT INTO ".$T_INSCRITOS."(red, nota, apellido, nombre, cedula, cedulatxt, provincia, clave, tomo, folio, pasaporte, nacionalidad, trabaja, ocupacion, tipoc, col_proc, cod_col, est_civil, mes_n, dia_n, ao_n, mes_i, dia_i, ao_i, fac_ia, esc_ia, car_ia, fac_iia, esc_iia, car_iia, fac_iiia, esc_iiia, car_iiia, n_ins, bach, nbachiller, ao_grad, ecrop, sexo, pviu, aopviu, sede, provi, distri, corregi, ocup_p, ocup_m, grado_p, esc_p, grado_m, esc_m, cfe, ecps, imf, npers, mtrasp, thijos, chijos, discap, rpadre, rmadre, rhnos, pgind, rend_esc, telefono, tel_cel, tel_ofic, mail, t_comp, t_internet, cod_promed, cod_ext_le, consu_dic, pg_num, area_i, area_ii, area_iii, arch_i, grupo, edif, aula, hora_prueb, ao_lectivo, edad, fecha_inscr, fecha_nac, otro_coleg, nfac_ia, d, cod_prov, nsede, nfacultad, ncarrera, matricula, sefaesca, red2, no1, no2) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $parametros = array('ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', &$RED, &$NOTA, &$APELLIDO, &$NOMBRE, &$CEDULA, &$CEDULATXT, &$PROVINCIA, &$CLAVE, &$TOMO, &$FOLIO, &$PASAPORTE, &$NACIONALIDAD, &$TRABAJA, &$OCUPACION,
        &$TIPOC, &$COL_PROC, &$COD_COL, &$EST_CIVIL, &$MES_N, &$DIA_N, &$AO_N, &$MES_I, &$DIA_I, &$AO_I, &$FAC_IA, &$ESC_IA, &$CAR_IA, &$FAC_IIA,
        &$ESC_IIA, &$CAR_IIA, &$FAC_IIIA, &$ESC_IIIA, &$CAR_IIIA, &$N_INS, &$BACH, &$NBACHILLER, &$AO_GRAD, &$ECROP, &$SEXO, &$PVIU, &$AOPVIU, &$SEDE,
        &$PROVI, &$DISTRITO, &$CORREGIMIENTO, &$OCUP_P, &$OCUP_M, &$GRADO_P, &$ESC_P, &$GRADO_M, &$ESC_M, &$CFE, &$ECPS, &$IMF,
        &$NPERS, &$MTRASP, &$THIJOS, &$CHIJOS, &$DISCAP, &$RPADRE, &$RMADRE, &$RHNOS, &$PGIND, &$REND_ESC, &$TELEFONO, &$TEL_CEL,
        &$TEL_OFIC, &$MAIL, &$T_COMP, &$T_INTERNET, &$COD_PROMED, &$COD_EXT_LE, &$CONSU_DIC, &$PG_NUM, &$AREA_I, &$AREA_II, &$AREA_III, &$ARCH_I,
        &$GRUPO, &$EDIF, &$AULA, &$HORA_PRUEB, &$AO_LECT, &$EDAD, &$FECHA_INSCR, &$FECHA_NAC, &$OTRO_COLEG, &$NFAC_IA, &$D, &$COD_PROV, &$NSEDE, &$NFACULTAD, &$NCARRERA, &$MATRICULA, &$SEFAESCA, &$RED2, &$NO1, &$NO2);
    $data = $Query->getresults($parametros);
    return true;
}

function insertNewDataResultados($T_RESULTADOS,$RED, $RED2, $REGION, $EXTRANJERO, $SEDE, $NSEDE, $FACULTAD, $NFACULTAD, $ESCUELA, $CARRERA, $APELLIDO, $NOMBRE, $CEDULA, $CEDULATXT, $PROVINCIA, $CLAVE, $TOMO, $FOLIO, $N_INS, $AREAP, $NOTA, $PS, $GATB, $PCA, $PCG, $INGLES, $INDICE, $INDICEAR, $INDICECI, $INDICEEM, $INDICEHU, $INDICEIN, $INDICEPE, $INDICEPO, $INDICEDE, $INDICEAD, $FECPCA, $CL_DEF, $CL_PROPB, $LECT1, $R_COM_COMP, $REL_O, $LECT2, $R_PLAN, $VERBAL, $OPER1, $OPER2, $RAZON1, $RAZON2, $NUMER, $AREA1, $AREA2, $AREA3, $AREA4, $AREA5, $AREA6, $GRAM1, $VOCAB, $GRAM2, $NARCHI, $OPC, $NPAG, $FECPCG, $INDICE00, $INDICE25, $INDICE50, $INDICE75, $REGISTRO, $CAR1, $AREAP1, $CAR2, $AREAP2, $CAR3, $AREAP3, $COL_PROC, $COD_COL, $TIPOC, $NTIPOC, $BACH, $BACHILLER, $NBACHILLER, $SEXO, $NSEXO, $MES_N, $DIA_N, $AO_N, $FECHANACI, $EDAD, $FAC_IA, $ESC_IA, $CAR_IA, $FAC_IIA, $ESC_IIA, $CAR_IIA, $FAC_IIIA, $ESC_IIIA, $CAR_IIIA, $AO_GRAD, $PROVI, $DISTRI, $CORREG, $TELEFONO, $TEL_CEL, $TEL_OFI, $MAIL, $SEDE_I, $AREA_I, $AO_LECT, $COD_PROV, $NPROVINCIA, $MATRICULA, $SAFAESCA, $NACIONALID, $TRABAJA, $OCUPACION, $EST_CIVIL, $ECROP, $PVIU, $AOPVIU, $OCUP_P, $OCUP_M, $GRADO_P, $ESC_P, $GRADO_M, $ESC_M, $CFE, $ECPS, $IMF, $NPERS, $MTRASP, $THIJOS, $CHIJOS, $DISCAP, $RPADRE, $RMADRE, $RHNOS, $PGIND, $REND_ESC, $TIPO_EST, $ARCH_I, $OBSERVACION, $FN, $NCARRERA, $D, $NO2)
{
    global $mysqli;
    $Query      = new Query($mysqli, "INSERT INTO ".$T_RESULTADOS."(red, red2, region, extranjero, sede, nsede, facultad, nfacultad, escuela, carrera, apellido, nombre, cedula, cedulatxt, provincia, clave, tomo, folio, n_ins, areap, nota, ps, gatb, pca, pcg, ingles, indice, indicear, indiceci, indiceem, indicehu, indicein, indicepe, indicepo, indicede, indicead, fecpca, cl_def, cl_propb, lect1, r_com_comp, rel_o, lect2, r_plan, verbal, oper1, oper2, razon1, razon2, numer, area1, area2, area3, area4, area5, area6, gram1, vocab, gram2, narchi, opc, npag, fecpcg, indice00, indice25, indice50, indice75, registro, car1, areap1, car2, areap2, car3, areap3, col_proc, cod_col, tipoc, ntipoc, bach, bachiller, nbachiller, sexo, nsexo, mes_n, dia_n, ao_n, fechanaci, edad, fac_ia, esc_ia, car_ia, fac_iia, esc_iia, car_iia, fac_iiia, esc_iiia, car_iiia, ao_grad, provi, distri, correg, telefono, tel_cel, tel_ofi, mail, sede_i, area_i, ao_lect, cod_prov, nprovincia, matricula, safaesca, nacionalid, trabaja, ocupacion, est_civil, ecrop, pviu, aopviu, ocup_p, ocup_m, grado_p, esc_p, grado_m, esc_m, cfe, ecps, imf, npers, mtrasp, thijos, chijos, discap, rpadre, rmadre, rhnos, pgind, rend_esc, tipo_est, arch_i, observacion, fn, ncarrera, d, no2) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $parametros = array('sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', &$RED, &$RED2, &$REGION, &$EXTRANJERO, &$SEDE, &$NSEDE, &$FACULTAD, &$NFACULTAD, &$ESCUELA, &$CARRERA, &$APELLIDO, &$NOMBRE, &$CEDULA, &$CEDULATXT, &$PROVINCIA, &$CLAVE, &$TOMO, &$FOLIO, &$N_INS, &$AREAP, &$NOTA, &$PS, &$GATB, &$PCA, &$PCG, &$INGLES, &$INDICE, &$INDICEAR, &$INDICECI, &$INDICEEM, &$INDICEHU, &$INDICEIN, &$INDICEPE, &$INDICEPO, &$INDICEDE, &$INDICEAD, &$FECPCA, &$CL_DEF, &$CL_PROPB, &$LECT1, &$R_COM_COMP, &$REL_O, &$LECT2, &$R_PLAN, &$VERBAL, &$OPER1, &$OPER2, &$RAZON1, &$RAZON2, &$NUMER, &$AREA1, &$AREA2, &$AREA3, &$AREA4, &$AREA5, &$AREA6, &$GRAM1, &$VOCAB, &$GRAM2, &$NARCHI, &$OPC, &$NPAG, &$FECPCG, &$INDICE00, &$INDICE25, &$INDICE50, &$INDICE75, &$REGISTRO, &$CAR1, &$AREAP1, &$CAR2, &$AREAP2, &$CAR3, &$AREAP3, &$COL_PROC, &$COD_COL, &$TIPOC, &$NTIPOC, &$BACH, &$BACHILLER, &$NBACHILLER, &$SEXO, &$NSEXO, &$MES_N, &$DIA_N, &$AO_N, &$FECHANACI, &$EDAD, &$FAC_IA, &$ESC_IA, &$CAR_IA, &$FAC_IIA, &$ESC_IIA, &$CAR_IIA, &$FAC_IIIA, &$ESC_IIIA, &$CAR_IIIA, &$AO_GRAD, &$PROVI, &$DISTRI, &$CORREG, &$TELEFONO, &$TEL_CEL, &$TEL_OFI, &$MAIL, &$SEDE_I, &$AREA_I, &$AO_LECT, &$COD_PROV, &$NPROVINCIA, &$MATRICULA, &$SAFAESCA, &$NACIONALID, &$TRABAJA, &$OCUPACION, &$EST_CIVIL, &$ECROP, &$PVIU, &$AOPVIU, &$OCUP_P, &$OCUP_M, &$GRADO_P, &$ESC_P, &$GRADO_M, &$ESC_M, &$CFE, &$ECPS, &$IMF, &$NPERS, &$MTRASP, &$THIJOS, &$CHIJOS, &$DISCAP, &$RPADRE, &$RMADRE, &$RHNOS, &$PGIND, &$REND_ESC, &$TIPO_EST, &$ARCH_I, &$OBSERVACION, &$FN, &$NCARRERA, &$D, &$NO2);
    $data       = $Query->getresults($parametros);
    return null;

}

function convert_object_to_array($data)
{

    if (is_object($data)) {
        $data = get_object_vars($data);
    }

    if (is_array($data)) {
        return array_map(__FUNCTION__, $data);
    } else {
        return $data;
    }
}

//////////////////////////////////////////////////////
//CERTIFICACIONES
function GetPersonalData($T_RESULTADOS,$PROVINCIA,$CLAVE,$TOMO,$FOLIO)
{
    global $mysqli;
    $TRES = $T_RESULTADOS;
    $query      = new Query($mysqli, "SELECT CONCAT(nombre,' ',apellido) as nombrecompleto ,n_ins,sede,facultad,col_proc, CONCAT(provincia,'-',tomo,'-',folio)AS cedula, areap,carrera,nbachiller from ".$TRES." where provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('ssss', &$PROVINCIA,&$CLAVE,&$TOMO,&$FOLIO);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function GetAverageData($T_RESULTADOS,$PROVINCIA,$CLAVE,$TOMO,$FOLIO)
{
    global $mysqli;
    $TRES = $T_RESULTADOS;
    $query      = new Query($mysqli, "SELECT indice,gatb,ps,pca,pcg from ".$TRES." where provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('ssss', &$PROVINCIA,&$CLAVE,&$TOMO,&$FOLIO);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function GetPCAData($ID_INSCRITO)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT id_facultad, codigo_facultad, nombre_facultad from facultades WHERE codigo_relacion = ?");
    $parametros = array("s", &$ID_INSCRITO);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function GetAreaData($T_RESULTADOS,$PROVINCIA,$CLAVE,$TOMO,$FOLIO)
{
    global $mysqli;
    $TRES = $T_RESULTADOS;
    $query      = new Query($mysqli, "SELECT areap from ".$TRES." where provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('ssss', &$PROVINCIA,&$CLAVE,&$TOMO,&$FOLIO);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

///////////////////////////////////////////
//labels
function GetAreaLabels($AREA)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT nombre_area from area WHERE id_area = ?");
    $parametros = array("i", &$AREA);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function GetSedeLabels($SEDE)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT nombre_sede from sedes WHERE codigo_sede = ?");
    $parametros = array("i", &$SEDE);
    $data       = $query->getresults($parametros);
    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function GetFacultadLabels($FACULTAD)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT nombre_facultad from facultades WHERE codigo_facultad = ?");
    $parametros = array("i", &$FACULTAD);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}
/////////////////////////////////////////////////////////////////
function GetPCGData5($T_RESULTADOS,$PROVINCIA,$CLAVE,$TOMO,$FOLIO)
{
    global $mysqli;
    $TRES = $T_RESULTADOS;
    $query      = new Query($mysqli, "SELECT area1,area2,area3,area4,SUM(area1+area2+area3+area4) as area5 from ".$TRES." where provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('ssss', &$PROVINCIA,&$CLAVE,&$TOMO,&$FOLIO);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function GetPCGData6($T_RESULTADOS,$PROVINCIA,$CLAVE,$TOMO,$FOLIO)
{
    global $mysqli;
    $TRES = $T_RESULTADOS;
    $query      = new Query($mysqli, "SELECT area1,area2,area3,area4,area5, SUM(area1+area2+area3+area4+area5) as area6 from ".$TRES." where provincia=? and clave=? and tomo=? and folio=?");
    $parametros = array('ssss', &$PROVINCIA,&$CLAVE,&$TOMO,&$FOLIO);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}


//////////////////////////////////////////////////////
//UPDATE DATA

function updateDataResultados($RED, $RED2, $REGION, $EXTRANJERO, $SEDE, $NSEDE, $FACULTAD, $NFACULTAD, $ESCUELA, $CARRERA, $APELLIDO, $NOMBRE, $CEDULA, $CEDULATXT, $PROVINCIA, $CLAVE, $TOMO, $FOLIO, $N_INS, $AREAP, $NOTA, $PS, $GATB, $PCA, $PCG, $INGLES, $INDICE, $INDICEAR, $INDICECI, $INDICEEM, $INDICEHU, $INDICEIN, $INDICEPE, $INDICEPO, $INDICEDE, $INDICEAD, $FECPCA, $CL_DEF, $CL_PROPB, $LECT1, $R_COM_COMP, $REL_O, $LECT2, $R_PLAN, $VERBAL, $OPER1, $OPER2, $RAZON1, $RAZON2, $NUMER, $AREA1, $AREA2, $AREA3, $AREA4, $AREA5, $AREA6, $GRAM1, $VOCAB, $GRAM2, $NARCHI, $OPC, $NPAG, $FECPCG, $INDICE00, $INDICE25, $INDICE50, $INDICE75, $REGISTRO, $CAR1, $AREAP1, $CAR2, $AREAP2, $CAR3, $AREAP3, $COL_PROC, $COD_COL, $TIPOC, $NTIPOC, $BACH, $BACHILLER, $NBACHILLER, $SEXO, $NSEXO, $MES_N, $DIA_N, $AO_N, $FECHANACI, $EDAD, $FAC_IA, $ESC_IA, $CAR_IA, $FAC_IIA, $ESC_IIA, $CAR_IIA, $FAC_IIIA, $ESC_IIIA, $CAR_IIIA, $AO_GRAD, $PROVI, $DISTRI, $CORREG, $TELEFONO, $TEL_CEL, $TEL_OFI, $MAIL, $SEDE_I, $AREA_I, $AO_LECT, $COD_PROV, $NPROVINCIA, $MATRICULA, $SAFAESCA, $NACIONALID, $TRABAJA, $OCUPACION, $EST_CIVIL, $ECROP, $PVIU, $AOPVIU, $OCUP_P, $OCUP_M, $GRADO_P, $ESC_P, $GRADO_M, $ESC_M, $CFE, $ECPS, $IMF, $NPERS, $MTRASP, $THIJOS, $CHIJOS, $DISCAP, $RPADRE, $RMADRE, $RHNOS, $PGIND, $REND_ESC, $TIPO_EST, $ARCH_I, $OBSERVACION, $FN, $NCARRERA, $D, $NO2,$BPROV,$BCLAVE,$BTOMO,$BFOLIO)
{
    global $mysqli;
    $Query      = new Query($mysqli, "UPDATE resultados2017 SET red=?, red2=?, region=?, extranjero=?, sede=?, nsede=?, facultad=?, nfacultad=?, escuela=?, carrera=?, apellido=?, nombre=?, cedula=?, cedulatxt=?, provincia=?, clave=?, tomo=?, folio=?, n_ins=?, areap=?, nota=?, ps=?, gatb=?, pca=?, pcg=?, ingles=?, indice=?, indicear=?, indiceci=?, indiceem=?, indicehu=?, indicein=?, indicepe=?, indicepo=?, indicede=?, indicead=?, fecpca=?, cl_def=?, cl_propb=?, lect1=?, r_com_comp=?, rel_o=?, lect2=?, r_plan=?, verbal=?, oper1=?, oper2=?, razon1=?, razon2=?, numer=?, area1=?, area2=?, area3=?, area4=?, area5=?, area6=?, gram1=?, vocab=?, gram2=?, narchi=?, opc=?, npag=?, fecpcg=?, indice00=?, indice25=?, indice50=?, indice75=?, registro=?, car1=?, areap1=?, car2=?, areap2=?, car3=?, areap3=?, col_proc=?, cod_col=?, tipoc=?, ntipoc=?, bach=?, bachiller=?, nbachiller=?, sexo=?, nsexo=?, mes_n=?, dia_n=?, ao_n=?, fechanaci=?, edad=?, fac_ia=?, esc_ia=?, car_ia=?, fac_iia=?, esc_iia=?, car_iia=?, fac_iiia=?, esc_iiia=?, car_iiia=?, ao_grad=?, provi=?, distri=?, correg=?, telefono=?, tel_cel=?, tel_ofi=?, mail=?, sede_i=?, area_i=?, ao_lect=?, cod_prov=?, nprovincia=?, matricula=?, safaesca=?, nacionalid=?, trabaja=?, ocupacion=?, est_civil=?, ecrop=?, pviu=?, aopviu=?, ocup_p=?, ocup_m=?, grado_p=?, esc_p=?, grado_m=?, esc_m=?, cfe=?, ecps=?, imf=?, npers=?, mtrasp=?, thijos=?, chijos=?, discap=?, rpadre=?, rmadre=?, rhnos=?, pgind=?, rend_esc=?, tipo_est=?, arch_i=?, observacion=?, fn=?, ncarrera=?, d=?, no2=? WHERE provincia =? and clave=? and  tomo =? and  folio =?");

    $parametros = array('sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', &$RED, &$RED2, &$REGION, &$EXTRANJERO, &$SEDE, &$NSEDE, &$FACULTAD, &$NFACULTAD, &$ESCUELA, &$CARRERA, &$APELLIDO, &$NOMBRE, &$CEDULA, &$CEDULATXT, &$PROVINCIA, &$CLAVE, &$TOMO, &$FOLIO, &$N_INS, &$AREAP, &$NOTA, &$PS, &$GATB, &$PCA, &$PCG, &$INGLES, &$INDICE, &$INDICEAR, &$INDICECI, &$INDICEEM, &$INDICEHU, &$INDICEIN, &$INDICEPE, &$INDICEPO, &$INDICEDE, &$INDICEAD, &$FECPCA, &$CL_DEF, &$CL_PROPB, &$LECT1, &$R_COM_COMP, &$REL_O, &$LECT2, &$R_PLAN, &$VERBAL, &$OPER1, &$OPER2, &$RAZON1, &$RAZON2, &$NUMER, &$AREA1, &$AREA2, &$AREA3, &$AREA4, &$AREA5, &$AREA6, &$GRAM1, &$VOCAB, &$GRAM2, &$NARCHI, &$OPC, &$NPAG, &$FECPCG, &$INDICE00, &$INDICE25, &$INDICE50, &$INDICE75, &$REGISTRO, &$CAR1, &$AREAP1, &$CAR2, &$AREAP2, &$CAR3, &$AREAP3, &$COL_PROC, &$COD_COL, &$TIPOC, &$NTIPOC, &$BACH, &$BACHILLER, &$NBACHILLER, &$SEXO, &$NSEXO, &$MES_N, &$DIA_N, &$AO_N, &$FECHANACI, &$EDAD, &$FAC_IA, &$ESC_IA, &$CAR_IA, &$FAC_IIA, &$ESC_IIA, &$CAR_IIA, &$FAC_IIIA, &$ESC_IIIA, &$CAR_IIIA, &$AO_GRAD, &$PROVI, &$DISTRI, &$CORREG, &$TELEFONO, &$TEL_CEL, &$TEL_OFI, &$MAIL, &$SEDE_I, &$AREA_I, &$AO_LECT, &$COD_PROV, &$NPROVINCIA, &$MATRICULA, &$SAFAESCA, &$NACIONALID, &$TRABAJA, &$OCUPACION, &$EST_CIVIL, &$ECROP, &$PVIU, &$AOPVIU, &$OCUP_P, &$OCUP_M, &$GRADO_P, &$ESC_P, &$GRADO_M, &$ESC_M, &$CFE, &$ECPS, &$IMF, &$NPERS, &$MTRASP, &$THIJOS, &$CHIJOS, &$DISCAP, &$RPADRE, &$RMADRE, &$RHNOS, &$PGIND, &$REND_ESC, &$TIPO_EST, &$ARCH_I, &$OBSERVACION, &$FN, &$NCARRERA, &$D, &$NO2,&$BPROV,&$BCLAVE,&$BTOMO,&$BFOLIO);
    $data       = $Query->getresults($parametros);
    return null;

}

function updateDataInscritos($RED, $NOTA, $APELLIDO, $NOMBRE, $CEDULA, $CEDULATXT, $PROVINCIA, $CLAVE, $TOMO, $FOLIO, $PASAPORTE, $NACIONALIDAD, $TRABAJA, $OCUPACION, $TIPOC, $COL_PROC, $COD_COL, $EST_CIVIL, $MES_N, $DIA_N, $AO_N, $MES_I, $DIA_I, $AO_I, $FAC_IA, $ESC_IA, $CAR_IA, $FAC_IIA,
    $ESC_IIA, $CAR_IIA, $FAC_IIIA, $ESC_IIIA, $CAR_IIIA, $N_INS, $BACH, $NBACHILLER, $AO_GRAD, $ECROP, $SEXO, $PVIU, $AOPVIU, $SEDE,
    $PROVI, $DISTRITO, $CORREGIMIENTO, $OCUP_P, $OCUP_M, $GRADO_P, $ESC_P, $GRADO_M, $ESC_M, $CFE, $ECPS, $IMF,
    $NPERS, $MTRASP, $THIJOS, $CHIJOS, $DISCAP, $RPADRE, $RMADRE, $RHNOS, $PGIND, $REND_ESC, $TELEFONO, $TEL_CEL,
    $TEL_OFIC, $MAIL, $T_COMP, $T_INTERNET, $COD_PROMED, $COD_EXT_LE, $CONSU_DIC, $PG_NUM, $AREA_I, $AREA_II, $AREA_III, $ARCH_I,
    $GRUPO, $EDIF, $AULA, $HORA_PRUEB, $AO_LECT, $EDAD, $FECHA_INSCR, $FECHA_NAC, $OTRO_COLEG, $NFAC_IA, $D, $COD_PROV, $NSEDE, $NFACULTAD, $NCARRERA,
    $MATRICULA, $SEFAESCA, $RED2, $NO1, $NO2,$APROV,$ACLAVE,$ATOMO,$AFOLIO)
{
    global $mysqli;
    $Query      = new Query($mysqli, "UPDATE inscritos2017 SET red=?,nota=?,apellido=?,nombre=?,cedula=?,cedulatxt=?,provincia=?,clave=?,tomo=?,folio=?,pasaporte=?,nacionalidad=?,trabaja=?,ocupacion=?,tipoc=?,col_proc=?,cod_col=?,est_civil=?,mes_n=?,dia_n=?,ao_n=?,mes_i=?,dia_i=?,ao_i=?,fac_ia=?,esc_ia=?,car_ia=?,fac_iia=?,esc_iia=?,car_iia=?,fac_iiia=?,esc_iiia=?,car_iiia=?,n_ins=?,bach=?,nbachiller=?,ao_grad=?,ecrop=?,sexo=?,pviu=?,aopviu=?,sede=?,provi=?,distri=?,corregi=?,ocup_p=?,ocup_m=?,grado_p=?,esc_p=?,grado_m=?,esc_m=?,cfe=?,ecps=?,imf=?,npers=?,mtrasp=?,thijos=?,chijos=?,discap=?,rpadre=?,rmadre=?,rhnos=?,pgind=?,rend_esc=?,telefono=?,tel_cel=?,tel_ofic=?,mail=?,t_comp=?,t_internet=?,cod_promed=?,cod_ext_le=?,consu_dic=?,pg_num=?,area_i=?,area_ii=?,area_iii=?,arch_i=?,grupo=?,edif=?,aula=?,hora_prueb=?,ao_lectivo=?,edad=?,fecha_inscr=?,fecha_nac=?,otro_coleg=?,nfac_ia=?,d=?,cod_prov=?,nsede=?,nfacultad=?,ncarrera=?,matricula=?,sefaesca=?,red2=?,no1=?,no2=? WHERE provincia =? and clave=? and  tomo =? and  folio =?");

    $parametros = array('ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss',&$RED, &$NOTA, &$APELLIDO, &$NOMBRE, &$CEDULA, &$CEDULATXT, &$PROVINCIA, &$CLAVE, &$TOMO, &$FOLIO, &$PASAPORTE, &$NACIONALIDAD, &$TRABAJA, &$OCUPACION, &$TIPOC, &$COL_PROC, &$COD_COL, &$EST_CIVIL, &$MES_N, &$DIA_N, &$AO_N, &$MES_I, &$DIA_I, &$AO_I, &$FAC_IA, &$ESC_IA, &$CAR_IA, &$FAC_IIA,&$ESC_IIA, &$CAR_IIA, &$FAC_IIIA, &$ESC_IIIA, &$CAR_IIIA, &$N_INS, &$BACH, &$NBACHILLER, &$AO_GRAD, &$ECROP, &$SEXO, &$PVIU, &$AOPVIU, &$SEDE,
&$PROVI, &$DISTRITO, &$CORREGIMIENTO, &$OCUP_P, &$OCUP_M, &$GRADO_P, &$ESC_P, &$GRADO_M, &$ESC_M, &$CFE, &$ECPS, &$IMF,
&$NPERS, &$MTRASP, &$THIJOS, &$CHIJOS, &$DISCAP, &$RPADRE, &$RMADRE, &$RHNOS, &$PGIND, &$REND_ESC, &$TELEFONO, &$TEL_CEL,
&$TEL_OFIC, &$MAIL, &$T_COMP, &$T_INTERNET, &$COD_PROMED, &$COD_EXT_LE, &$CONSU_DIC, &$PG_NUM, &$AREA_I, &$AREA_II, &$AREA_III, &$ARCH_I,
&$GRUPO, &$EDIF, &$AULA, &$HORA_PRUEB, &$AO_LECT, &$EDAD, &$FECHA_INSCR, &$FECHA_NAC, &$OTRO_COLEG, &$NFAC_IA, &$D, &$COD_PROV, &$NSEDE, &$NFACULTAD, &$NCARRERA,
&$MATRICULA, &$SEFAESCA, &$RED2, &$NO1, &$NO2,&$APROV,&$ACLAVE,&$ATOMO,&$AFOLIO);
    $data       = $Query->getresults($parametros);
    return null;

}



function insertNewTable($TABLE_UPDATE_INS,$TABLE_UPDATE_RES){

    global $mysqli;
    $query      = new Query($mysqli, "INSERT INTO sgra_config_tb (tb_inscritos_new_year,tb_resultados_new_year) VALUES (?,?)");
    $parametros = array("ss", &$TABLE_UPDATE_INS, &$TABLE_UPDATE_RES);
    $data       = $query->getresults($parametros);
    return true;

}

/*function createTable_Resultado($TABLE_UPDATE_RES){
    global $mysqli;
    $query      = new Query($mysqli, "CREATE TABLE IF NOT EXISTS ".$TABLE_UPDATE_RES." (
  `id_registroResultado` int(11) NOT NULL,
  `red` varchar(255) DEFAULT NULL,
  `red2` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `extranjero` varchar(255) DEFAULT NULL,
  `sede` varchar(255) DEFAULT NULL,
  `nsede` varchar(255) DEFAULT NULL,
  `facultad` varchar(255) DEFAULT NULL,
  `nfacultad` varchar(255) DEFAULT NULL,
  `escuela` varchar(255) DEFAULT NULL,
  `carrera` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `cedula` varchar(255) DEFAULT NULL,
  `cedulatxt` varchar(255) DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `tomo` varchar(255) DEFAULT NULL,
  `folio` varchar(255) DEFAULT NULL,
  `n_ins` varchar(255) DEFAULT NULL,
  `areap` varchar(255) DEFAULT NULL,
  `nota` int(25) DEFAULT NULL,
  `ps` decimal(3,2) DEFAULT NULL COMMENT '99.999',
  `gatb` decimal(6,3) DEFAULT NULL COMMENT '999.999',
  `pca` int(3) DEFAULT NULL,
  `pcg` int(3) DEFAULT NULL,
  `ingles` int(5) DEFAULT NULL,
  `indice` decimal(6,5) DEFAULT NULL COMMENT '9.99999',
  `indicear` decimal(6,5) DEFAULT NULL COMMENT '9.99999',
  `indiceci` decimal(6,5) DEFAULT NULL COMMENT '9.99999',
  `indiceem` decimal(6,5) DEFAULT NULL COMMENT '9.99999',
  `indicehu` decimal(6,5) DEFAULT NULL COMMENT '9.99999',
  `indicein` decimal(6,5) DEFAULT NULL COMMENT '9.99999',
  `indicepe` decimal(6,5) DEFAULT NULL COMMENT '9.99999',
  `indicepo` decimal(6,5) DEFAULT NULL COMMENT '9.99999',
  `indicede` decimal(6,5) DEFAULT NULL COMMENT '9.99999',
  `indicead` decimal(6,5) DEFAULT NULL COMMENT '9.99999',
  `fecpca` varchar(25) DEFAULT NULL,
  `cl_def` varchar(25) DEFAULT NULL,
  `cl_propb` varchar(25) DEFAULT NULL,
  `lect1` varchar(25) DEFAULT NULL,
  `r_com_comp` varchar(25) DEFAULT NULL,
  `rel_o` int(25) DEFAULT NULL,
  `lect2` int(25) DEFAULT NULL,
  `r_plan` int(25) DEFAULT NULL,
  `verbal` int(25) DEFAULT NULL,
  `oper1` int(25) DEFAULT NULL,
  `oper2` int(25) DEFAULT NULL,
  `razon1` int(25) DEFAULT NULL,
  `razon2` int(25) DEFAULT NULL,
  `numer` int(25) DEFAULT NULL,
  `area1` int(25) DEFAULT NULL,
  `area2` int(25) DEFAULT NULL,
  `area3` int(25) DEFAULT NULL,
  `area4` int(25) DEFAULT NULL,
  `area5` int(25) DEFAULT NULL,
  `area6` int(25) DEFAULT NULL,
  `gram1` int(25) DEFAULT NULL,
  `vocab` int(25) DEFAULT NULL,
  `gram2` varchar(255) DEFAULT NULL,
  `narchi` int(25) DEFAULT NULL,
  `opc` int(25) DEFAULT NULL,
  `npag` varchar(255) DEFAULT NULL,
  `fecpcg` varchar(255) DEFAULT NULL,
  `indice00` decimal(6,5) DEFAULT NULL COMMENT '9.99999',
  `indice25` decimal(6,5) DEFAULT NULL COMMENT '9.99999',
  `indice50` decimal(6,5) DEFAULT NULL COMMENT '9.99999',
  `indice75` decimal(6,5) DEFAULT NULL COMMENT '9.99999',
  `registro` int(25) DEFAULT NULL,
  `car1` varchar(25) DEFAULT NULL,
  `areap1` int(25) DEFAULT NULL,
  `car2` varchar(25) DEFAULT NULL,
  `areap2` int(25) DEFAULT NULL,
  `car3` int(25) DEFAULT NULL,
  `areap3` int(25) DEFAULT NULL,
  `col_proc` varchar(255) DEFAULT NULL,
  `cod_col` varchar(255) DEFAULT NULL,
  `tipoc` int(25) DEFAULT NULL,
  `ntipoc` varchar(25) DEFAULT NULL,
  `bach` int(25) DEFAULT NULL,
  `bachiller` int(25) DEFAULT NULL,
  `nbachiller` varchar(255) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `nsexo` varchar(20) DEFAULT NULL,
  `mes_n` varchar(20) DEFAULT NULL,
  `dia_n` varchar(20) DEFAULT NULL,
  `ao_n` varchar(20) DEFAULT NULL,
  `fechanaci` varchar(20) DEFAULT NULL,
  `edad` int(20) DEFAULT NULL,
  `fac_ia` varchar(20) DEFAULT NULL,
  `esc_ia` varchar(20) DEFAULT NULL,
  `car_ia` varchar(20) DEFAULT NULL,
  `fac_iia` varchar(20) DEFAULT NULL,
  `esc_iia` varchar(20) DEFAULT NULL,
  `car_iia` varchar(20) DEFAULT NULL,
  `fac_iiia` varchar(20) DEFAULT NULL,
  `esc_iiia` varchar(20) DEFAULT NULL,
  `car_iiia` varchar(20) DEFAULT NULL,
  `ao_grad` int(20) DEFAULT NULL,
  `provi` varchar(255) DEFAULT NULL,
  `distri` varchar(255) DEFAULT NULL,
  `correg` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `tel_cel` varchar(255) DEFAULT NULL,
  `tel_ofi` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `sede_i` varchar(255) DEFAULT NULL,
  `area_i` varchar(255) DEFAULT NULL,
  `ao_lect` varchar(255) DEFAULT NULL,
  `cod_prov` varchar(255) DEFAULT NULL,
  `nprovincia` varchar(255) DEFAULT NULL,
  `matricula` varchar(255) DEFAULT NULL,
  `safaesca` varchar(255) DEFAULT NULL,
  `nacionalid` varchar(255) DEFAULT NULL,
  `trabaja` varchar(10) DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `est_civil` varchar(255) DEFAULT NULL,
  `ecrop` varchar(255) DEFAULT NULL,
  `pviu` varchar(255) DEFAULT NULL,
  `aopviu` int(10) DEFAULT NULL,
  `ocup_p` varchar(255) DEFAULT NULL,
  `ocup_m` varchar(255) DEFAULT NULL,
  `grado_p` varchar(10) DEFAULT NULL,
  `esc_p` varchar(255) DEFAULT NULL,
  `grado_m` varchar(20) DEFAULT NULL,
  `esc_m` varchar(20) DEFAULT NULL,
  `cfe` varchar(20) DEFAULT NULL,
  `ecps` varchar(20) DEFAULT NULL,
  `imf` varchar(20) DEFAULT NULL,
  `npers` varchar(20) DEFAULT NULL,
  `mtrasp` varchar(20) DEFAULT NULL,
  `thijos` varchar(20) DEFAULT NULL,
  `chijos` varchar(20) DEFAULT NULL,
  `discap` varchar(20) DEFAULT NULL,
  `rpadre` varchar(20) DEFAULT NULL,
  `rmadre` varchar(20) DEFAULT NULL,
  `rhnos` varchar(20) DEFAULT NULL,
  `pgind` varchar(20) DEFAULT NULL,
  `rend_esc` varchar(20) DEFAULT NULL,
  `tipo_est` varchar(20) DEFAULT NULL,
  `arch_i` varchar(20) DEFAULT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `fn` varchar(25) DEFAULT NULL,
  `ncarrera` varchar(255) DEFAULT NULL,
  `d` varchar(255) DEFAULT NULL,
  `no2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    $parametros = array();
    $data       = $query->getresults();
    return true;

}


function create_Table_Inscritos($TABLE_UPDATE_INS){
    global $mysqli;
    $query      = new Query($mysqli, "CREATE TABLE IF NOT EXISTS ".$TABLE_UPDATE_INS." (
  `id_registroInscrito` int(10) NOT NULL,
  `red` varchar(20) NOT NULL,
  `nota` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `cedulatxt` varchar(100) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `tomo` varchar(100) NOT NULL,
  `folio` varchar(100) NOT NULL,
  `pasaporte` varchar(100) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `trabaja` varchar(100) NOT NULL,
  `ocupacion` varchar(100) NOT NULL,
  `tipoc` varchar(100) NOT NULL,
  `col_proc` varchar(100) NOT NULL,
  `cod_col` varchar(100) NOT NULL,
  `est_civil` varchar(100) NOT NULL,
  `mes_n` varchar(100) NOT NULL,
  `dia_n` varchar(100) NOT NULL,
  `ao_n` varchar(100) NOT NULL,
  `mes_i` varchar(100) NOT NULL,
  `dia_i` varchar(100) NOT NULL,
  `ao_i` varchar(100) NOT NULL,
  `fac_ia` varchar(100) NOT NULL,
  `esc_ia` varchar(100) NOT NULL,
  `car_ia` varchar(100) NOT NULL,
  `fac_iia` varchar(100) NOT NULL,
  `esc_iia` varchar(100) NOT NULL,
  `car_iia` varchar(100) NOT NULL,
  `fac_iiia` varchar(100) NOT NULL,
  `esc_iiia` varchar(100) NOT NULL,
  `car_iiia` varchar(100) NOT NULL,
  `n_ins` varchar(100) NOT NULL,
  `bach` varchar(100) NOT NULL,
  `nbachiller` varchar(100) NOT NULL,
  `ao_grad` varchar(100) NOT NULL,
  `ecrop` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `pviu` varchar(100) NOT NULL,
  `aopviu` varchar(100) NOT NULL,
  `sede` varchar(100) NOT NULL,
  `provi` varchar(100) NOT NULL,
  `distrito` varchar(100) NOT NULL,
  `corregimiento` varchar(100) NOT NULL,
  `ocup_p` varchar(100) NOT NULL,
  `ocup_m` varchar(100) NOT NULL,
  `grado_p` varchar(100) NOT NULL,
  `esc_p` varchar(100) NOT NULL,
  `grado_m` varchar(100) NOT NULL,
  `esc_m` varchar(100) NOT NULL,
  `cfe` varchar(100) NOT NULL,
  `ecps` varchar(100) NOT NULL,
  `imf` varchar(100) NOT NULL,
  `npers` varchar(100) NOT NULL,
  `mtrasp` varchar(100) NOT NULL,
  `thijos` varchar(100) NOT NULL,
  `chijos` varchar(100) NOT NULL,
  `discap` varchar(100) NOT NULL,
  `rpadre` varchar(100) NOT NULL,
  `rmadre` varchar(100) NOT NULL,
  `rhnos` varchar(100) NOT NULL,
  `pgind` varchar(100) NOT NULL,
  `rend_esc` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `tel_cel` varchar(100) NOT NULL,
  `tel_ofic` varchar(100) NOT NULL,
  `mail` varchar(300) NOT NULL,
  `t_comp` varchar(100) NOT NULL,
  `t_internet` varchar(100) NOT NULL,
  `cod_promed` varchar(100) NOT NULL,
  `cod_ext_le` varchar(100) NOT NULL,
  `consu_dic` varchar(100) NOT NULL,
  `pg_num` varchar(100) NOT NULL,
  `area_i` varchar(100) NOT NULL,
  `area_ii` varchar(100) NOT NULL,
  `area_iii` varchar(100) NOT NULL,
  `arch_i` varchar(100) NOT NULL,
  `grupo` varchar(100) NOT NULL,
  `edif` varchar(100) NOT NULL,
  `aula` varchar(100) NOT NULL,
  `hora_prueb` varchar(100) NOT NULL,
  `ao_lect` varchar(100) NOT NULL,
  `edad` varchar(100) NOT NULL,
  `fecha_inscr` varchar(100) NOT NULL,
  `fecha_nac` varchar(100) NOT NULL,
  `otro_coleg` varchar(100) NOT NULL,
  `nfac_ia` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `cod_prov` varchar(100) NOT NULL,
  `nsede` varchar(100) NOT NULL,
  `nfacultad` varchar(100) NOT NULL,
  `ncarrera` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `sefaesca` varchar(100) NOT NULL,
  `red2` varchar(100) NOT NULL,
  `no1` varchar(100) NOT NULL,
  `no2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8");
    $parametros = array();
    $data       = $query->getresults();
    return true;

}*/