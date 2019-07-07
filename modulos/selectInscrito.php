<div >
 <!--LLAMA A LA CLASE TABLAINSCRTIOPS-->
	<form  class="form-inline"  action="../pagesAdm/inscritos.php" method="post" style="margin-top: -10px">
		Mostrar:&nbsp&nbsp&nbsp
		<select id="select_range" name="range">
			 <?php

$ranges_list = array(20, 50, 100, 500);

if (isset($_REQUEST['range'])) {

    for ($i = 0; $i <= 3; $i++) {
        if ($ranges_list[$i] == $_REQUEST['range']) {
            echo "<option value=" . $ranges_list[$i] . " selected>" . $_REQUEST['range'] . "</option>";

        } else {
            echo "<option value=" . $ranges_list[$i] . ">" . $ranges_list[$i] . "</option>";
        }
    }
} 


else if (isset($_SESSION['ndataI'])) 
{
    for ($i = 0; $i <= 3; $i++) {
	        
	        if ($ranges_list[$i] == $_SESSION['ndataI']) {
	        	 echo "<option value=" . $ranges_list[$i] . " selected>" . $_SESSION['ndataI'] . "</option>";	        	
	        }else{
	        	echo "<option value=" . $ranges_list[$i] . ">" . $ranges_list[$i] . "</option>";

	        }
        }
} 



else {
            echo "
    <option value='20'>20</option>
    <option value='50'>50</option>
    <option value='100'>100</option>
    <option value='500'>500</option>
	";
        }

        ?>


	</select>
	registros
	<!--<a type="submit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-refresh"></span> </a>-->
	  <input type="submit" value="Aplicar" name="operar">
	</form>


	<div class="pull-right">
		<form class="form-inline" action="../pagesAdm/inscritos.php"  style="margin-top: -42px">
			 Buscar : <input id="idSearch" onclick='showModalLoading();' type="text" name="idSearch" size="17" >
		<!-- <a href="#" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-search"></span> </a>-->
		  <input type="submit" value="OK"  name="buscar">
		</form>

	</div>



</div>
