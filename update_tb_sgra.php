<?php
include_once './Scripts/classConexionDB.php';
openConnection();
include_once './Scripts/library_db_sql.php';
session_start();

date_default_timezone_set("America/Panama"); //ZONA HORARIA PAN
$YEAR  = date("Y");

?>

<!DOCTYPE html>
<html lang="es">
<html>
<head>
<title>Actualización del Sistema</title>
<meta charset="utf-8">
  <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                 <link rel="stylesheet" media="all" href="./Style/ResultadosStyle.css">
                 <script type="text/javascript" src="./JS/jquery-3.3.1.min.js"></script>
                 <script type="text/javascript" src="./JS/bootstrap.js"></script>
</head>
<body>
<center>
   <h1>Bienvenido al actualizador de recursos del</h1>
    <h1>Sistema de Gestión de Resultados Académicos </h1>
<h4>Compruebe los nuevos valores de actualización de las Tablas de Datos Inscritos y Resultados</h4>
</center>

 <center> 
<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-sm-10">
              
<form action="done_update.php" method="POST">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-5 col-form-label">Año de la Tabla Inscritos</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="inscritos" placeholder="Inscritos" value=<?php echo "inscritos".$YEAR;?>
      >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-5 col-form-label">Año de la Tabla Resultados</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="resultados" placeholder="Resultados" value=<?php echo "resultados".$YEAR;?>>
    </div>
  </div>

   <div class="form-group row">
    <label for="inputPassword3" class="col-sm-5 col-form-label">Contraseña de Respaldo</label>
    <div class="col-sm-5">
      <input type="password" autocomplete="off" class="form-control" name="password" placeholder="Contraseña" required >
    </div>
  </div>
  
  <div class="form-group row pull-right">
    <div class="col-lg-12" >
      <button type="submit" class="btn btn-primary">Actualizar</button>
      <a href="index.html" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span>Cancelar</a>
    </div>
  </div>
</form>


        </div>
    </div>
<h4>NOTA: El sistema restablecerá las siguientes Tablas:</h4>
<form>
    <div class="checkbox">
      <label><input type="checkbox" value="" checked disabled>Tabla Validaciones</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="" checked disabled>Tabla inscritostmp</label>
    </div>
    <div class="checkbox disabled">
      <label><input type="checkbox" value="" checked disabled>Tabla resultadostmp</label>
    </div>
  </form>

  <h4>NOTA: El sistema creará las siguientes Tablas:</h4>
<form>
    <div class="checkbox">
      <label><input type="checkbox" value="" checked disabled>Tabla Inscritos <?php echo $YEAR;?></label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="" checked disabled>Tabla Resultados <?php echo $YEAR;?></label>
    </div>
  </form>

</div>

</center>
    



</body>
</html>