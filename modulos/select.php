<div >

	<form  class="form-inline"  action="../pagesAdm/certificacion.php" method="post" >
		Mostrar:&nbsp&nbsp&nbsp
		<select name="rango">
		<option value="20">20</option>
		<option value="50">50</option>
		<option value="100">100</option>
		<option value="500">500</option>
	</select>
	registros
	<!--<a type="submit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-refresh"></span> </a>-->
	  <input type="submit" name="operar">
	</form>



	<div class="pull-right">
		<form class="form-inline" action="../pagesAdm/certificacion.php"  style="margin-top: -42px">
			 Buscar : <input id="idSearch" type="text" name="idSearch" size="17" >
		<!-- <a href="#" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-search"></span> </a>-->
		  <input type="submit" name="buscar">
		</form>

	</div>



</div>
