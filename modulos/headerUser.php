 <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background: #003366">

            <div class="navbar-header"> 
             <img src="../images/LogoUp.png" align="left" alt="logo" style="width:60px;margin-top: 5px;margin-left: 20px;margin-bottom: 5px">

             <div style="margin-top: 13px;margin-left: 85px">
              <p style="color: #ffffff;font-size: 18px;font-family: Calisto MT">UNIVERSIDAD DE</p>
               <p style="color: #ffffff;font-size:36px;margin: -3.2% 0;font-family: Calisto MT">PANAMÁ</p>
               <p style="color: #ffffff;margin: 0.08% 0;margin-left: 190px;margin-top: -69px">Vicerrectoría Academica</p>
               <p style="color: #ffffff;margin: 0.08% 0;margin-left: 190px;">Dirección General de Admisión</p>
               <p style="color: #ffffff;margin: 0.08% 0;margin-left: 190px;">Sistema de Gestión de Resultados Académicos</p>
             </div> 

             <div id="vertical-bar" style="margin-top:-65px;"></div>

            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right" style="margin-top: 42px">
                 <p style="color: #ffffff;margin-right: 30px;margin-top: 10px" >Bienvenido <?php echo $_SESSION['name']; ?> &nbsp     | &nbsp
                    <?php include 'setTime.php';  ?>
                  &nbsp|&nbsp <b><a href="../logout/logout.php" style="color:#ffff00";>Salir</a></b></p>
            </ul> 


        </nav>


          <!--<div class="container-fluid " >-->
          <nav class="navbar" align="center" style="background: #d6d5d5;min-height: 25px;;margin-top: -1px" >
            <a href="dashboard.php" style="width: 90px" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-home"></span> Inicio</a>
            <a href="inscritos.php"  style="margin-left: 18px;width: 90px" class="btn btn-warning btn-sm">Inscritos</a>
            <a href="certificacion.php"  style="margin-left: 18px;width: 90px" class="btn btn-warning btn-sm">Certificación</a>
            <a href="validacion.php"  style="margin-left: 18px;width: 90px" class="btn btn-warning btn-sm">Validación</a>
            <a href="reportes.php"  style="margin-left: 18px;width: 90px" class="btn btn-warning btn-sm">Reportes</a>
    
          </nav>
          <!--   </div>-->
