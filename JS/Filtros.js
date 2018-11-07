function obtenerAreas(val) 
{  
				 $.ajax
				 ({
					type: "POST",
					url: "../Consultas/Areas.php",
					data:'id_sedes='+val,
					success: function(data)
					{
					   $("#lista_areas").html(data);
					}
				 });
				
}

function obtenerFacultades(val) 
{ 	var valores = val.split('-');
			 $.ajax
				 ({
					type: "POST",
					url: "../Consultas/Facultades.php",
					data:'id_areas='+valores[0]+'&id_sede='+valores[1],
					success: function(data)
					{
					   $("#lista_facultades").html(data);
					}
				 });
				
}

