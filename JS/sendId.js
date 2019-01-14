function sendata(id){
		var idSend = id;
	//alert(idSend);
		//console.log(idSe
	$.ajax({
		data: {"idSend": idSend},
		type: "POST",
		dataType: "text",
		url: "../Scripts/deleteUser.php",
	})
	.done(function( data, textStatus, jqXHR ) {
		//console.log("data:"+data);

		swal("Registro Eliminado!","Recargar página ?", "success", {
  buttons: {
    cancel: "OK",
    //defeat: true,
  },
})
.then((value) => {

   location.reload();
});	
		
	})


	.fail(function( jqXHR, textStatus, errorThrown ) {
		console.log( "La solicitud a fallado: " +  textStatus);
	});
} 

function sleep(delay) {
        var start = new Date().getTime();
        while (new Date().getTime() < start + delay);
}


/*function updateUser(id){
	var idUser = id;
	$.ajax({
		data: {"idUser": idUser},
		type: "POST",
		dataType: "text",
		url: "../Scripts/updateUser.php",
	})
	.done(function( data, textStatus, jqXHR ) {
		//console.log("data retornada:"+data);
       // window.location = data;

	})
	.fail(function( jqXHR, textStatus, errorThrown ) {
		console.log( "La solicitud a fallado: " +  textStatus);
	});


}
*/