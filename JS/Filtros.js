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



function obtenerEscuela() 
{  
	var sede = $("#lista_sedes").val();
	var facultad = $("#lista_facultades").val();
	var escuela = $("#lista_escuelas").val();
	
	//alert (sede +" - "+ facultad);
				$.ajax
				 ({
					type: "POST",
					url: "../Consultas/Escuelas.php",
					data: {"idSede": sede,"idFacultad":facultad},
					success: function(data)
					{ console.log( "Result: " +  data);
					   $("#lista_escuelas").html(data);
					}
				 });
				
}

function obtenerCarreras() 
{  
	var sede = $("#lista_sedes").val();
	var facultad = $("#lista_facultades").val();
	var escuela = $("#lista_escuelas").val();
	//alert (sede +" - "+ facultad);
				$.ajax
				 ({
					type: "POST",
					url: "../Consultas/Carreras.php",
					data: {"idSede": sede,"idFacultad":facultad,"idEscuela":escuela},
					success: function(data)
					{ console.log( "Result: " +  data);
					   $("#lista_carreras").html(data);
					}
				 });
}

function filtrarTabla() 
{  
	var sede = $("#lista_sedes").val();
	var area = $("#lista_areas").val();
	var facultad = $("#lista_facultades").val();
	var escuela = $("#lista_escuelas").val();
	var carreras = $("#lista_carreras").val();
	//alert (sede +" - "+ facultad);
				$.ajax
				 ({
					type: "POST",
					url: "../Consultas/dbFilter.php",
					data: {"idSede": sede,"idArea": area,"idFacultad":facultad,"idEscuela":escuela,"idCarrera":carrera},
					success: function(data)
					{ console.log( "Result: " +  data);
					   $("#lista_carreras").html(data);
					}
				 });
}




function generarCertificacion(val)
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

function obtenerAreasCertificacion(val){
	var opcionArea = document.getElementById('areasCertificacion');
	alert(val);
	

}


