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

//GETALLDATA TBLE INS
function showAllDataInscrito($ID_SEARCH)
{
    $page = '';
    global $mysqli;
    $query      = new Query($mysqli, "SELECT * FROM inscritos2017 where n_ins = ?");
    $parametros = array('s', &$ID_SEARCH);
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
    $query      = new Query($mysqli, "SELECT * FROM sgra_recursosinscritos");
    $parametros = array();
    $data       = $query->getresults();

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
    $page = '';
    global $mysqli;
    $query = new Query($mysqli, "SELECT nombre,apellido,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia
     FROM resultados2017 where n_ins is not null ");
    $parametros = array();
    $data       = $query->getresults();

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
     FROM resultados2017 where WHERE ( sede = ? AND areap = ?) LIMIT 10");
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
function showDataInscrito($START, $RECORD)
{
    // $record_page = 10;
    $page = '';
    global $mysqli;
    $query = new Query($mysqli, "SELECT nombre,apellido,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia
     FROM inscritos2017 where n_ins is not null LIMIT " . $START . ", " . $RECORD);
    $parametros = array();
    $data       = $query->getresults();

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

//Tabla con Filtros definidos
function showDataFilterInscrito($START, $RECORD, $SEDE)
{
    global $mysqli;
    $query = new Query($mysqli, "SELECT nombre,apellido,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia
     FROM inscritos2017 where sede = ? LIMIT " . $START . ", " . $RECORD);
    $parametros = array('i', &$SEDE);
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

function deleteRowDB($numInscrito)
{
    global $mysqli;
    $query      = new Query($mysqli, 'DELETE from resultados2017 WHERE n_ins=?');
    $parametros = array("s", &$numInscrito);
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

function insertNewRegister($NAME, $LASTNAME, $USERNAME, $EMAIL, $ROL, $PASSWORD)
{
    global $mysqli;
    $query      = new Query($mysqli, "INSERT INTO usuarios(name,lastname,nombre_usuario,email,type,password) VALUES (?,?,?,?,?,?)");
    $parametros = array("ssssss", &$NAME, &$LASTNAME, &$USERNAME, &$EMAIL, &$ROL, &$PASSWORD);
    $data       = $query->getresults($parametros);
    return true;
}

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
    $query      = new Query($mysqli, "SELECT nombre_usuario,password,type FROM usuarios WHERE nombre_usuario=? AND password=?");
    $parametros = array('ss', &$USERNAME, &$PASSWORD);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];
    } else {
        return null;
    }
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

function updateDataUser()
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT nombre_usuario,password,type FROM usuarios WHERE nombre_usuario=?");
    $parametros = array('s', &$USERNAME);
    $data       = $query->getresults($parametros);

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
function exportDataResultados($FILENAME)
{
    global $mysqli;
    $datetime     = date("d-m-Y_h:i:s_A");
    $newFileName  = $FILENAME . "_" . $datetime;
    $pathDocument = "../BD/export/" . $newFileName . ".csv";
    $Query        = new Query($mysqli, "SELECT * FROM resultados2017 INTO OUTFILE 'C:/xampp/htdocs/SGRA/BD/export/" . $newFileName . ".csv' FIELDS TERMINATED BY ',' LINES TERMINATED BY '\r\n'");
    $parametros   = array();
    $data         = $Query->getresults();

    // --- Guardamos el documento
    return $pathDocument;
}

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
    $Query      = new Query($mysqli, "SELECT inscritoanterior,codigovalidacion FROM validaciones WHERE inscritoanterior=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}
}

function checkRegisterExistInscritos($NUMINSCRITO)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT nombre,apellido,n_ins FROM inscritos2017 WHERE n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}
}

function checkRegisterExistResultados($NUMINSCRITO)
{
    global $mysqli;
    $Query      = new Query($mysqli, "SELECT nombre,apellido,n_ins FROM resultados2018 WHERE n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $Query->getresults($parametros);

    if (isset($data[0])) {
        return $data[0];} else {return null;}
}

function checkLastValidationCode()
{
    global $mysqli;
    $Query      = new Query($mysqli, "SELECT n_ins FROM resultados2018 WHERE n_ins LIKE 'V%' ORDER BY n_ins DESC LIMIT 1");
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
function clonTable1toTable2Inscritos($NUMINSCRITO)
{
    global $mysqli;
    $query      = new Query($mysqli, "INSERT INTO inscritostmp SELECT * FROM inscritos2017 WHERE n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $query->getresults($parametros);
    return true;
}

//COPIADO DE LA BASE DE DATOS A LA BASA DE DE DATOS TEMPORAL
function clonTable1toTable2Resultados($NUMINSCRITO)
{
    global $mysqli;
    $query      = new Query($mysqli, "INSERT INTO resultadostmp SELECT * FROM resultados2017 WHERE n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $query->getresults($parametros);
    return true;
}

//CLONADO DE LA INFORMACION DESDE LA BASE DE DATOS TEMPORAL A LA BASA DE DE DATOS INSCRITOS
function clonInscritos($NUMINSCRITO)
{
    global $mysqli;
    $query      = new Query($mysqli, "INSERT INTO inscritos2018 SELECT * FROM inscritostmp WHERE n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $query->getresults($parametros);
    return true;
}

//CLONADO DE LA INFORMACION DESDE LA BASE DE DATOS TEMPORAL A LA BASA DE DE DATOS RESULTADO
function clonResultados($NUMINSCRITO)
{
    global $mysqli;
    $query      = new Query($mysqli, "INSERT INTO resultados2018 SELECT * FROM resultadostmp WHERE n_ins=?");
    $parametros = array('s', &$NUMINSCRITO);
    $data       = $query->getresults($parametros);
    return true;
}

//ACTUALIZAR NUMERO DE INSCRITOS DE LA BASE DE DATOS INSCRITOS TMP
function updateInscritosTMP($NEWCODE, $NUMINSCRITO)
{
    global $mysqli;
    $query      = new Query($mysqli, "UPDATE inscritostmp SET n_ins =? WHERE n_ins=?");
    $parametros = array('ss', &$NEWCODE, &$NUMINSCRITO);
    $data       = $query->getresults($parametros);
    return true;
}

//ACTUALIZAR NUMERO DE INSCRITOS DE LA BASE DE DATOS RESULTADOS TMP
function updateResultadosTMP($NEWCODE, $NUMINSCRITO)
{
    global $mysqli;
    $query      = new Query($mysqli, "UPDATE resultadostmp SET n_ins =? WHERE n_ins=?");
    $parametros = array('ss', &$NEWCODE, &$NUMINSCRITO);
    $data       = $query->getresults($parametros);
    return true;
}

//INSERTAR NUMERO DE VALIDACION ,ANTERIOR  Y NUEVO NUMERO DE VALIDACION
function insertOldID($N_INS, $C_VALIDACION)
{
    global $mysqli;
    $query      = new Query($mysqli, "INSERT INTO validaciones(inscritoanterior,codigovalidacion) VALUES (?,?)");
    $parametros = array("ss", &$N_INS, &$C_VALIDACION);
    $data       = $query->getresults($parametros);
    return true;
}

//////////////////////////////////////////////////////////////////////////////////////
function countRow()
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT COUNT(*) AS countRow FROM logsystem");
    $parametros = array();
    $data       = $query->getresults();

    if (isset($data[0])) {
        foreach ($data as $key) {
            if ($key->countRow > 2000) {
                exportLogs();
                truncateTable();
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

function truncateTable()
{
    global $mysqli;
    $query      = new Query($mysqli, "TRUNCATE TABLE logsystem");
    $parametros = array();
    $data       = $query->getresults();
    return true;
}
/////////////////////EXPORT DATA FROM INSCRITOS AND RESULTADOS
//INDICAR EL NOMBRE DE LA BASE DATOS Y EL NOMBRE DEL ARCHIVO A EXPORTAR

function exportDatosInscritos()
{
    global $mysqli;
    $query = new Query($mysqli, "SELECT apellido,nombre,provincia,clave,tomo,folio,bach,ao_grad,sexo,col_proc,cod_col,mes_n,dia_n,ao_n,tipoc,provi,distri,corregi,mes_i,dia_i,ao_i,ao_lectivo,sede,fac_ia,esc_ia,car_ia,car_ia,car_iia,car_iiia, fac_iia, fac_iiia, telefono, CONCAT(dia_n,'/',DATE_FORMAT(STR_TO_DATE(mes_n,'%b'), '%m') , '/' , DATE_FORMAT(STR_TO_DATE(ao_n,'%Y'), '%Y')) as fecha_n ,CONCAT(dia_i,'/',DATE_FORMAT(STR_TO_DATE(mes_n,'%b'), '%m'),'/',DATE_FORMAT(STR_TO_DATE(ao_i,'%Y'), '%Y')) as fecha_i, n_ins, d from inscritos2017 LIMIT 2000");
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

function insertNewDataInscritos($RED, $NOTA, $APELLIDO, $NOMBRE, $CEDULA, $CEDULATXT, $PROVINCIA, $CLAVE, $TOMO, $FOLIO, $PASAPORTE, $NACIONALIDAD, $TRABAJA, $OCUPACION, $TIPOC, $COL_PROC, $COD_COL, $EST_CIVIL, $MES_N, $DIA_N, $AO_N, $MES_I, $DIA_I, $AO_I, $FAC_IA, $ESC_IA, $CAR_IA, $FAC_IIA,
    $ESC_IIA, $CAR_IIA, $FAC_IIIA, $ESC_IIIA, $CAR_IIIA, $N_INS, $BACH, $NBACHILLER, $AO_GRAD, $ECROP, $SEXO, $PVIU, $AOPVIU, $SEDE,
    $PROVI, $DISTRITO, $CORREGIMIENTO, $OCUP_P, $OCUP_M, $GRADO_P, $ESC_P, $GRADO_M, $ESC_M, $CFE, $ECPS, $IMF,
    $NPERS, $MTRASP, $THIJOS, $CHIJOS, $DISCAP, $RPADRE, $RMADRE, $RHNOS, $PGIND, $REND_ESC, $TELEFONO, $TEL_CEL,
    $TEL_OFIC, $MAIL, $T_COMP, $T_INTERNET, $COD_PROMED, $COD_EXT_LE, $CONSU_DIC, $PG_NUM, $AREA_I, $AREA_II, $AREA_III, $ARCH_I,
    $GRUPO, $EDIF, $AULA, $HORA_PRUEB, $AO_LECT, $EDAD, $FECHA_INSCR, $FECHA_NAC, $OTRO_COLEG, $NFAC_IA, $D, $COD_PROV, $NSEDE, $NFACULTAD, $NCARRERA,
    $MATRICULA, $SEFAESCA, $RED2, $NO1, $NO2) {

    global $mysqli;
    $Query      = new Query($mysqli, "INSERT INTO inscritos2017(red, nota, apellido, nombre, cedula, cedulatxt, provincia, clave, tomo, folio, pasaporte, nacionalidad, trabaja, ocupacion, tipoc, col_proc, cod_col, est_civil, mes_n, dia_n, ao_n, mes_i, dia_i, ao_i, fac_ia, esc_ia, car_ia, fac_iia, esc_iia, car_iia, fac_iiia, esc_iiia, car_iiia, n_ins, bach, nbachiller, ao_grad, ecrop, sexo, pviu, aopviu, sede, provi, distri, corregi, ocup_p, ocup_m, grado_p, esc_p, grado_m, esc_m, cfe, ecps, imf, npers, mtrasp, thijos, chijos, discap, rpadre, rmadre, rhnos, pgind, rend_esc, telefono, tel_cel, tel_ofic, mail, t_comp, t_internet, cod_promed, cod_ext_le, consu_dic, pg_num, area_i, area_ii, area_iii, arch_i, grupo, edif, aula, hora_prueb, ao_lectivo, edad, fecha_inscr, fecha_nac, otro_coleg, nfac_ia, d, cod_prov, nsede, nfacultad, ncarrera, matricula, sefaesca, red2, no1, no2) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
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

function insertNewDataResultados($RED, $RED2, $REGION, $EXTRANJERO, $SEDE, $NSEDE, $FACULTAD, $NFACULTAD, $ESCUELA, $CARRERA, $APELLIDO, $NOMBRE, $CEDULA, $CEDULATXT, $PROVINCIA, $CLAVE, $TOMO, $FOLIO, $N_INS, $AREAP, $NOTA, $PS, $GATB, $PCA, $PCG, $INGLES, $INDICE, $INDICEAR, $INDICECI, $INDICEEM, $INDICEHU, $INDICEIN, $INDICEPE, $INDICEPO, $INDICEDE, $INDICEAD, $FECPCA, $CL_DEF, $CL_PROPB, $LECT1, $R_COM_COMP, $REL_O, $LECT2, $R_PLAN, $VERBAL, $OPER1, $OPER2, $RAZON1, $RAZON2, $NUMER, $AREA1, $AREA2, $AREA3, $AREA4, $AREA5, $AREA6, $GRAM1, $VOCAB, $GRAM2, $NARCHI, $OPC, $NPAG, $FECPCG, $INDICE00, $INDICE25, $INDICE50, $INDICE75, $REGISTRO, $CAR1, $AREAP1, $CAR2, $AREAP2, $CAR3, $AREAP3, $COL_PROC, $COD_COL, $TIPOC, $NTIPOC, $BACH, $BACHILLER, $NBACHILLER, $SEXO, $NSEXO, $MES_N, $DIA_N, $AO_N, $FECHANACI, $EDAD, $FAC_IA, $ESC_IA, $CAR_IA, $FAC_IIA, $ESC_IIA, $CAR_IIA, $FAC_IIIA, $ESC_IIIA, $CAR_IIIA, $AO_GRAD, $PROVI, $DISTRI, $CORREG, $TELEFONO, $TEL_CEL, $TEL_OFI, $MAIL, $SEDE_I, $AREA_I, $AO_LECT, $COD_PROV, $NPROVINCIA, $MATRICULA, $SAFAESCA, $NACIONALID, $TRABAJA, $OCUPACION, $EST_CIVIL, $ECROP, $PVIU, $AOPVIU, $OCUP_P, $OCUP_M, $GRADO_P, $ESC_P, $GRADO_M, $ESC_M, $CFE, $ECPS, $IMF, $NPERS, $MTRASP, $THIJOS, $CHIJOS, $DISCAP, $RPADRE, $RMADRE, $RHNOS, $PGIND, $REND_ESC, $TIPO_EST, $ARCH_I, $OBSERVACION, $FN, $NCARRERA, $D, $NO2)
{
    global $mysqli;
    $Query      = new Query($mysqli, "INSERT INTO resultados2017(red, red2, region, extranjero, sede, nsede, facultad, nfacultad, escuela, carrera, apellido, nombre, cedula, cedulatxt, provincia, clave, tomo, folio, n_ins, areap, nota, ps, gatb, pca, pcg, ingles, indice, indicear, indiceci, indiceem, indicehu, indicein, indicepe, indicepo, indicede, indicead, fecpca, cl_def, cl_propb, lect1, r_com_comp, rel_o, lect2, r_plan, verbal, oper1, oper2, razon1, razon2, numer, area1, area2, area3, area4, area5, area6, gram1, vocab, gram2, narchi, opc, npag, fecpcg, indice00, indice25, indice50, indice75, registro, car1, areap1, car2, areap2, car3, areap3, col_proc, cod_col, tipoc, ntipoc, bach, bachiller, nbachiller, sexo, nsexo, mes_n, dia_n, ao_n, fechanaci, edad, fac_ia, esc_ia, car_ia, fac_iia, esc_iia, car_iia, fac_iiia, esc_iiia, car_iiia, ao_grad, provi, distri, correg, telefono, tel_cel, tel_ofi, mail, sede_i, area_i, ao_lect, cod_prov, nprovincia, matricula, safaesca, nacionalid, trabaja, ocupacion, est_civil, ecrop, pviu, aopviu, ocup_p, ocup_m, grado_p, esc_p, grado_m, esc_m, cfe, ecps, imf, npers, mtrasp, thijos, chijos, discap, rpadre, rmadre, rhnos, pgind, rend_esc, tipo_est, arch_i, observacion, fn, ncarrera, d, no2) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
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
function GetPersonalData($ID_INSCRITO)
{
    global $mysqli;
    $query      = new Query($mysqli, "SELECT CONCAT(nombre,' ',apellido) as nombrecompleto ,sede,facultad,col_proc, CONCAT(provincia,'-',tomo,'-',folio)AS cedula, area1,carrera,nbachiller from resultados2017 WHERE n_ins = '?'");
    $parametros = array("i", &$ID_INSCRITO);
    $data       = $query->getresults($parametros);

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function GetAverageData($ID_INSCRITO)
{
    global $mysqli;
    echo "hola";
    $query      = new Query($mysqli, "SELECT id_facultad, codigo_facultad, nombre_facultad from facultades WHERE codigo_relacion = '?'");
    $parametros = array("i", &$ID_INSCRITO);
    $data       = $query->getresults();

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function GetPCAData($ID_INSCRITO)
{
    global $mysqli;
    echo "hola";
    $query      = new Query($mysqli, "SELECT id_facultad, codigo_facultad, nombre_facultad from facultades WHERE codigo_relacion = '?'");
    $parametros = array("i", &$ID_INSCRITO);
    $data       = $query->getresults();

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function GetAreaData($ID_INSCRITO)
{
    global $mysqli;
    echo "hola";
    $query      = new Query($mysqli, "SELECT id_facultad, codigo_facultad, nombre_facultad from facultades WHERE codigo_relacion = '?'");
    $parametros = array("i", &$ID_INSCRITO);
    $data       = $query->getresults();

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}

function GetPCGData($ID_INSCRITO)
{
    global $mysqli;
    echo "hola";
    $query      = new Query($mysqli, "SELECT id_facultad, codigo_facultad, nombre_facultad from facultades WHERE codigo_relacion = '?'");
    $parametros = array("i", &$ID_INSCRITO);
    $data       = $query->getresults();

    if (isset($data[0])) {
        return $data;
    } else {
        return null;
    }

}
////////////////////////////////////////////////////////
