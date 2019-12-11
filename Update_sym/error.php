<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Error al iniciar sesión!</title>
        <meta charset="utf-8">
        <link href="login/css/bootstrap.min.css" rel="stylesheet"></link>
        <link href="login/css/bootstrap-theme.min.css" rel="stylesheet"></link>
        <script type="text/javascript" src="./JS/jquery-3.3.1.min.js"></script>
        <script src="./JS/bootstrap.min.js" ></script>
    </head>
    <body>
        <div class="container">
            <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" id="loginbox" style="margin-top:150px;">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Error
                        </div>
                    </div>
                    <div class="panel-body" style="padding-top:30px">
                        <div class="alert alert-danger col-sm-12" id="login-alert" style="display:none">
                        </div>
                        <center>
                            <img height="100" src="images/alert1.png" width="100"/>
                        </center>
                        <center>
                            <h4>
                                No fue posible autenticar la contraseña de respaldo 
                            </h4>
							<h4>Verifique su información.</h4>
                        </center>
                        <div class="form-group" style="margin-top:20px">
                            <div align="center" class="col-sm-12 controls ">
                                <a class="btn btn-success" href="./index.html">
                                    <span class="glyphicon glyphicon-refresh">
                                    </span>
                                    Volver a iniciar sesión
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>