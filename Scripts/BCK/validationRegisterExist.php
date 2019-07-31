<?php
// Notificar todos los errores excepto E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();
include_once '../Scripts/validacionFlujoNewUser.php';

//GET DATA FROM JS
$name            = strtoupper($_POST["idName"]);
$lastName        = strtoupper($_POST["idLastName"]);
$cedula          = $_POST["idCID"];
$idSearch        = $_POST["idInscrito"];
$tableInscritos  = $_POST["table1"];
$tableResultados = $_POST["table2"];

//VALIDATE DATA TO DO THE QUERY
if (isset($cedula)) {
    //consulta sql
    //GENERATE CID PERSONAL AND EQUATE TO THE GET CID FROM JS
    $CIDUSER = getUserCID($name, $lastName
        if (!is_null($CIDUSER)) {

        } else {
            //ERROR
            echo 1;
        }

        validationCIDExist($CID);

    } else if (isset($idSearch)) {
//consulta sql
    }

////////////////////////////////////////////////
    $minusYear = date("Y") - 1;
//Colocar el nombre de la tabla correcta usando la varible

//VALIDACION DE LAS TABLAS
    if (preg_match("/2017/", $tableInscritos) && preg_match("/2017/", $tableResultados)) {
        $vInscrito  = validationLastYearInscrito($idSearch);
        $vResultado = validationLastYearResultado($idSearch);
        $exist      = validationExist($idSearch);
        // SI EL REGISTRO EXISTE EN LA TABLA DE VALIDACIONES
        if (!is_null($exist)) {
            echo 1;} else if (!is_null($vInscrito) && !is_null($vResultado)) {
            echo '<tr style="font-size: 11px;text-align:center">';
            echo '<td style="text-align: center;"><input type="checkbox" class="checkthis" value=' . $vResultado->n_ins . '></td>';
            echo "<td></td>";
            echo "<td>" . $vResultado->nombre . "</td>";
            echo "<td>" . $vResultado->apellido . "</td>";
            echo "<td>" . $vResultado->cedula . "</td>";
            echo "<td>" . $vResultado->n_ins . "</td>";
            echo "<td>" . $vResultado->sede . "</td>";
            echo "<td>" . $vResultado->fac_ia . "</td>";
            echo "<td>" . $vResultado->esc_ia . "</td>";
            echo "<td>" . $vResultado->car_ia . "</td>";
            echo "<td>" . $vResultado->fac_iia . "</td>";
            echo "<td>" . $vResultado->esc_iia . "</td>";
            echo "<td>" . $vResultado->car_iia . "</td>";
            echo "<td>" . $vResultado->fac_iiia . "</td>";
            echo "<td>" . $vResultado->esc_iiia . "</td>";
            echo "<td>" . $vResultado->car_iiia . "</td>";
            echo '<td><a  id="edit" href="#" class="btn btn-info btn-xs" ><span class="glyphicon glyphicon-pencil"></span> </a>
        <a  id="remove" href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#save"><span class="glyphicon glyphicon-floppy-saved" ></span> </a>

        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span> </a>
        </td>';
            echo "</tr>";
            //PASAR EL ID DE BUSQEUDAD A LA FUNCION QUE BUSCARA OTRa vez al usuario y pasara todos los datos de consulta
            //al
            //insertValidateStudentInscritos($idSearch);
            //insertValidateStudentResultados($idSearch);
        } else {

            echo 2;
        }

    } else {
        //SI LOS DATOS DE LAS TABLAS ESTAN CORRECTOS
        echo 2;
        //echo '<tr ><td colspan="17" class="">No hay congruencia con las tablas y el año de Validación</td></tr>';
    }

//FUNCIONES
    function utf8_converter($array)
{
        array_walk_recursive($array, function (&$item, $key) {
            if (!mb_detect_encoding($item, 'utf-8', true)) {
                $item = utf8_encode($item);
            }
        });

        return $array;
    }

    function cvf_convert_object_to_array($data)
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

    function checkName_Lastname()
{

        // Arrays para guardar mensajes y errores:
        $aErrores  = array();
        $aMensajes = array();
        // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
        $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
        // Comprobar si se ha enviado el formulario:
        if (!empty($_POST)) {

            // Comprobar si llegaron los campos requeridos:
            if (isset($_POST['txtNombre']) && isset($_POST['txtApellidos'])) {
                // Nombre:
                if (empty($_POST['txtNombre'])) {
                    $aErrores[] = "Debe especificar el nombre";
                } else {
                    // Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
                    if (preg_match($patron_texto, $_POST['txtNombre'])) {
                        $aMensajes[] = "Nombre: [" . $_POST['txtNombre'] . "]";
                    } else {
                        $aErrores[] = "El nombre sólo puede contener letras y espacios";
                    }

                }
                // Apellidos:
                if (empty($_POST['txtApellidos'])) {
                    $aErrores[] = "Debe especificar los apellidos";
                } else {
                    // Comprobar mediante una expresión regular, que sólo contienen letras y espacios:
                    if (preg_match($patron_texto, $_POST['txtApellidos'])) {
                        $aMensajes[] = "Apellidos: [" . $_POST['txtApellidos'] . "]";
                    } else {
                        $aErrores[] = "Los apellidos sólo pueden contener letras y espacios";
                    }

                }
            }
