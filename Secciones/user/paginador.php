<?php
 include 'config.php';
 $link = Conectarse(); 
 $CantidadRegistrosMostrar=10;
 
//VALIDACION DE LA VARIABLE GET
    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag'];
	
//CONSULTA PARA OBTNER LA CANTIDAD DE REGISTROS EN LA DB
	$consultaDB1 ="SELECT * FROM dgeneral"; 

	$consulta = mysqli_query($link,$consultaDB1);
	$TotalRegistrosDB= mysqli_num_rows($consulta);
	
//Se divide la cantidad de registro de la BD con la cantidad a mostrar 
	$TotalPaginas  =ceil($TotalRegistrosDB/$CantidadRegistrosMostrar);
//	echo "<b>La cantidad de registro se dividio a: </b>".$TotalPaginas." paginas para mostrar ".$CantidadRegistrosMostrar." de ".$TotalRegistrosDB. " registros<br>"; 

//CONSULTA PARA OBTENER LA DATA CON LOS RANGOS DE LA DB
	$consultavistas ="SELECT indice_bus,nombre,apellido,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia FROM dgeneral ORDER BY indice_bus LIMIT ".(($compag-1)*$CantidadRegistrosMostrar)." , ".$CantidadRegistrosMostrar;
 
//INSTRUCCION PARA OBTENER TODOS LOS REGISTROS DE LA BASE DE DATOS
	/*$sql="SELECT indice_bus,nombre,apellido,CONCAT(provincia,'-',tomo,'-',folio)AS cedula,n_ins,sede,fac_ia,esc_ia,car_ia,fac_iia,esc_iia,car_iia,fac_iiia,esc_iiia,car_iiia FROM dgeneral ORDER BY indice_bus LIMIT ".(($compag-1)*$CantidadRegistrosMostrar)." , ".$CantidadRegistrosMostrar;*/
	
//$result = mysqli_query($sql);

//CONEXION & CONSULTA A LA BASE DE DATOS
	$result = mysqli_query($link,$consultavistas);  

 //ESTABLECIMIENTO DE LA TABLA DE DATOS
 echo'<div class="panel-body">';         
	echo'<table class="table table-bordered table-hover table-editable">';
	echo'<thead style="text-align:center;width: : 10px;background: #225ddb" >';
	echo'<tr style="font-size: 12px;text-align:center; color: #ffffff">';
      echo'<th style="text-align: center;"><input type="checkbox" class="form-check-input  " id="exampleCheck1" ></th>';
        echo'<th style="text-align: center;">#</th>';
        echo'<th>Nombre</th>';
        echo'<th>Apellido</th>';
        echo'<th>Cédula</th>';
        echo'<th>Inscripción</th>';
		echo'<th>Sede</th>';
        echo'<th>Fac-1A</th>';
        echo'<th>Esc-1A</th>';
        echo'<th>Car-1A</th>';
        echo'<th>Fac-2A</th>';
        echo'<th>Esc-2A</th>';
        echo'<th>Car-2A</th>';
        echo'<th>Fac-3A</th>';
        echo'<th>Esc-3A</th>';
        echo'<th>Car-3A</th>';
        echo'<th>Acciones</th>';
       echo'</tr>';
    echo'</thead>';
	
    echo'<tbody>';
	while ($row = mysqli_fetch_array($result)){   
     echo'<tr style="font-size: 12px;text-align:center">';
         echo'<th style="text-align: center;"><input type="checkbox" class="form-check-input " id="exampleCheck1" ></th>';
         //<td style="text-align: center;">1</td>
		 echo "<td>".$row[0]."</td>";  
		 echo "<td>".$row[1]."</td>";  
		 echo "<td>".$row[2]."</td>";
		 echo "<td>".$row[3]."</td>";  
         echo "<td>".$row[4]."</td>";  
         echo "<td>".$row[5]."</td>";
		 echo "<td>".$row[6]."</td>";  
		 echo "<td>".$row[7]."</td>";  
		 echo "<td>".$row[8]."</td>";
		 echo "<td>".$row[9]."</td>";  
         echo "<td>".$row[10]."</td>";  
         echo "<td>".$row[11]."</td>";
		 echo "<td>".$row[12]."</td>";  
         echo "<td>".$row[13]."</td>";  
         echo "<td>".$row[14]."</td>";
        echo '<td><a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" ><span class="glyphicon glyphicon-pencil"></span> </a>';
        echo '<a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> </a></td>';
	echo"</tr>";
	}
	 
   echo"</tbody>"; 
   echo"</table>";
 //FIN DE LA TABLA DE DATOS
 
 //PAGINADOR
 	
     
    /*Sector de Paginacion 
    
    //Operacion matematica para boton siguiente y atras 
	$IncrimentNum =(($compag +1)<=$TotalPaginas)?($compag +1):1;
  	$DecrementNum =(($compag -1))<1?1:($compag -1);
  
	echo "<ul><li class=\"btn\"><a href=\"?pag=".$DecrementNum."\">◀</a></li>";
    //Se resta y suma con el numero de pag actual con el cantidad de 
    //numeros  a mostrar
     $Desde=$compag-(ceil($CantidadRegistrosMostrar/2)-1);
     $Hasta=$compag+(ceil($CantidadRegistrosMostrar/2)-1);
     
     //Se valida
     $Desde=($Desde<1)?1: $Desde;
     $Hasta=($Hasta<$CantidadRegistrosMostrar)?$CantidadRegistrosMostrar:$Hasta;
     //Se muestra los numeros de paginas
     for($i=$Desde; $i<=$Hasta;$i++){
     	//Se valida la paginacion total
     	//de registros
     	if($i<=$TotalPaginas){
     		//Validamos la pag activo
     	  if($i==$compag){
           echo "<li class=\"active\"><a href=\"?pag=".$i."\">".$i."</a></li>";
     	  }else {
     	  	echo "<li><a href=\"?pag=".$i."\">".$i."</a></li>";
     	  }     		
     	}
     }
	echo "<li class=\"btn\"><a href=\"?pag=".$IncrimentNum."\">▶</a></li></ul>";*/
 //FIN PAGINADOR
 
 //NUEVO PAGINADOR
 //Operacion matematica para boton siguiente y atras 
	$IncrimentNum =(($compag +1)<=$TotalPaginas)?($compag +1):1;
  	$DecrementNum =(($compag -1))<1?1:($compag -1);
	
  echo'<div class="row">';
     echo'<div class="col-lg-6">';
    echo'<h5 style="text-align: left;">Mostrando'.$CantidadRegistrosMostrar.' de '.$TotalRegistrosDB.' registros</h5>';
	 /*echo "<b>La cantidad de registro se dividio a: </b>".$TotalPaginas." paginas para mostrar ".$CantidadRegistrosMostrar." de ".$TotalRegistrosDB. " registros<br>"; */
   echo' </div>';
  
     echo'<div class="col-lg-6" style="margin-top: -22px">';
     echo' <ul class="pagination pull-right" >';
      echo"<li class=\"btn\"><a href=\"?pag=".$DecrementNum.">Anterior</a></li>";
	  
	   //Se resta y suma con el numero de pag actual con el cantidad de 
    //numeros  a mostrar
     $Desde=$compag-(ceil($CantidadRegistrosMostrar/2)-1);
     $Hasta=$compag+(ceil($CantidadRegistrosMostrar/2)-1);
     
     //Se valida
     $Desde=($Desde<1)?1: $Desde;
     $Hasta=($Hasta<$CantidadRegistrosMostrar)?$CantidadRegistrosMostrar:$Hasta;
     //Se muestra los numeros de paginas
     for($i=$Desde; $i<=$Hasta;$i++){
     	//Se valida la paginacion total
     	//de registros
     	if($i<=$TotalPaginas){
     		//Validamos la pag activo
     	  if($i==$compag){
           echo "<li class=\"active\"><a href=\"?pag=".$i."\">".$i."</a></li>";
     	  }else {
     	  	echo "<li><a href=\"?pag=".$i."\">".$i."</a></li>";
     	  }     		
     	}
     }
	  
     echo"<li class=\"btn\"><a href=\"?pag=".$IncrimentNum.">Siguiente</a></li>";
    echo"</ul>";
echo"</div>";
   

   echo'</div>';
  


?>
