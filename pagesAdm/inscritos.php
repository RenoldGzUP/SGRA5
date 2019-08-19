<?php
include_once '../Scripts/classConexionDB.php';
openConnection();
include_once '../Scripts/library_db_sql.php';
session_start();
saveLogs($_SESSION['name'], "Usuario accedió a página inscritos");
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
    header('Location:../index.html');
//  echo "Esta pagina es solo para usuarios registrados.<br>";
    // echo "<br><a href='login.html'>Login</a>";
    //echo "<br><br><a href='index.html'>Registrarme</a>";//
    exit;
}
$now = time();
if ($now > $_SESSION['expire']) {
    session_destroy();
    echo "<script>location.href='../noAccess.html'</script>";
//echo "Sesion  terminada,<a href='../index.html'>Necesita Hacer Login</a>";
    exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Renold Gonzalez">
    <title>Sistema de gestión de resultados academicos</title>
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../JS/jquery-3.3.1.min.js"></script>
    <script  type="text/javascript" src="../JS/jquery.dataTables.js"></script>
    <script  type="text/javascript" src="../JS/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="../JS/bootstrap.js"></script>
    <script src="../JS/sorttable.js" ></script>
    <link rel="stylesheet" media="all" href="../Style/jquery.dataTables.min.css">
    <link rel="stylesheet" media="all" href="../Style/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" media="all" href="../Style/InscritosStyle.css">

    <script src="../JS/Filtros.js"></script>
    <script src="../JS/inscritos_js.js"></script>
    <script src="../JS/tableEdit.js"></script>
    <!--    <script src="../JS/Editable table/custom_table_edit.js"></script>
    -->
  </head>
  <body>
    <div id="wrapper">
      <?php include '../modulos/userControl.php';?>
      <div class="container col-lg-12" style="margin-top: -18px">
        <h2></h2>
        <!--Panel de Filtros-->
         <?php include '../modulos/vars.php';?>
        <?php include '../modulos/panelFilter.php';?>
        <!---->
       <!--  <div class="panel panel-default " style="margin-top: -10px" >
          <div class="panel-heading" style="height: 40px">
            <?php //include '../modulos/selectInscrito.php';?>
          </div>
        </div> -->
        <div class="row">
          <div class="col-sm-12">
         <div  class="table-responsive">
            <table id="tableInscritos" class="table table-bordered table-hover table-fixed select">
              <thead style="font-size: 12px;text-align:center; color: #ffffff; background-color: #225ddb">
                <tr >
                  <th > <input type="checkbox"  id="inscritos_checkall" ></th>
                  <th >#</th>
                  <th >Nombre</th>
                  <th >Apellido</th>
                  <th >Cedula</th>
                  <th >n_ins</th>
                  <th >Sede</th>
                  <th >Fac_ia</th>
                  <th >Esc_ia</th>
                  <th >Car_ia</th>
                  <th >Fac_iia</th>
                  <th >Esc_iia</th>
                  <th >Car_iia</th>
                  <th >Fac_iiia</th>
                  <th >Esc_iiia</th>
                  <th >Car_iiia</th>
                  <th >Acciones</th>
                </tr>
              </thead>
              <tbody id="tbodyInscritos">

               <!--  <?php
$dataInscritos = showDataInscrito();
$newData       = convert_object_to_array($dataInscritos);
$i             = 0;
$counter       = 0;
$leng          = sizeof($newData);
//FULL DATA LOAD INSIDE OF TABLE
while ($i < $leng) {

    echo '<tr id="row' . $newData[$i]['n_ins'] . '" style="font-size: 11px;text-align:center">';
    echo '<td class="checkboxRow" style="text-align: center;"><input type="checkbox" class="checkthis" value=' . $newData[$i]['n_ins'] . '></td>';
    echo '<td class="integerRow" >' . $counter . '</td>';
    echo '<td class="textRow" id="name' . $newData[$i]['n_ins'] . '">' . $newData[$i]['nombre'] . '</td>';
    echo '<td class="textRow" id="lastname' . $newData[$i]['n_ins'] . '">' . $newData[$i]['apellido'] . '</td>';
    echo '<td  class="cidRow" id="CID' . $newData[$i]['n_ins'] . '">' . $newData[$i]['cedula'] . '</td>';
    echo '<td class="longIntegerRow"  id="n_ins' . $newData[$i]['n_ins'] . '">' . $newData[$i]['n_ins'] . '</td>';
    echo '<td class="integerRow"  id="sede' . $newData[$i]['n_ins'] . '">' . $newData[$i]['sede'] . '</td>';
    echo '<td class="integerRow" id="fac_ia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['fac_ia'] . '</td>';
    echo '<td class="integerRow" id="esc_ia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['esc_ia'] . '</td>';
    echo '<td class="integerRow" id="car_ia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['car_ia'] . '</td>';
    echo '<td class="integerRow"  id="fac_iia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['fac_iia'] . '</td>';
    echo '<td class="integerRow"  id="esc_iia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['esc_iia'] . '</td>';
    echo '<td class="integerRow" id="car_iia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['car_iia'] . '</td>';
    echo '<td class="integerRow" id="fac_iiia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['fac_iia'] . '</td>';
    echo '<td class="integerRow" id="esc_iiia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['esc_iia'] . '</td>';
    echo '<td class="integerRow" id="car_iiia' . $newData[$i]['n_ins'] . '">' . $newData[$i]['car_iia'] . '</td>';
    echo '<td class="actionRow">
<button type="button" title ="Editar" id="edit_button' . $newData[$i]['n_ins'] . '" class="btn btn-warning btn-xs" onclick="modal_edit(\'' . $newData[$i]['n_ins'] . '\');" ><span class="glyphicon glyphicon-pencil"></span>    </button>
<button type="button"  id="save_button' . $newData[$i]['n_ins'] . '"  style="display:none;" class="btn btn-success btn-xs"  onclick="save_row(\'' . $newData[$i]['n_ins'] . '\');"><span class="glyphicon glyphicon-floppy-saved"></span> </button>
<button type="button" title ="Borrar" id="delete_button' . $newData[$i]['n_ins'] . '" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" onclick="delete_row(\'' . $newData[$i]['n_ins'] . '\');"></span> </button>

</td>';
    echo "</tr>";
//COUNTER
    $i++;
    $counter++;
}
?> -->

              </tbody>
            </table>

     </div>
    </div>
        </div>



    <!-- MODALS-->
    <!-- Modal para editar Registros-->
    <div class="modal fade" id="tipoCertificaciones" role="dialog" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg" style="width: 1200px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Registro</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <table class="table table-bordered table table-hover">
                  <tbody id="studentTableEdit">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer" >
            <button id="sendTypeReport" type="button"  class="btn btn-default" data-dismiss="modal">Guardar</button>
          </div>
        </div>
      </div>
      </div> <!--fin MODAL-->
      <?php include '../modulos/modals.php';?>
      <!-- FIN  MODALS-->
    </div>
    </div><!-- /#page-wrapper -->
  </body>
</html>