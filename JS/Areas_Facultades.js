function obtenerFacultades(val) 
{ 
				 $.ajax
				 ({
					type: "POST",
					url: "../Consultas/Facultades.php",
					data:'id_area='+val,
					success: function(data)
					{
					   $("#lista_facultades").html(data);
					}
				 });
				
}