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
{ 
				 $.ajax
				 ({
					type: "POST",
					url: "../Consultas/Facultades.php",
					data:'id_areas='+val,
					success: function(data)
					{
					   $("#lista_facultades").html(data);
					}
				 });
				
}

function obtenerDataInscritos(val) 
{ 
				 $.ajax
				 ({
					type: "POST",
					url: "../Consultas/Facultades.php",
					data:'id_areas='+val,
					success: function(data)
					{
					   $("#lista_facultades").html(data);
					}
				 });
				
}