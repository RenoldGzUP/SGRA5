/* if the page has been fully loaded we add two click handlers to the button */
$(document).ready(function () {
	/* Get the checkboxes values based on the class attached to each check box */
	$("#buttonClass").click(function() {
	    getValueUsingClass();
	});
	
	/* Get the checkboxes values based on the parent div id */
	$("#sendTypeReport").click(function() {
	    getValueUsingParentTag();
	});

    $("#sendTypegghgReport").click(function() {
        alert("SEND");
       attachCheckboxHandlers();
    });

    $("#buttonReportes").click(function() {
        //alert("Modo edicion activado");
        sendReporte();
    });

	$("#edit").click(function() {
		
		editRow();
		});
});

$(document).ready(function(){
$("#checkboxlist #checkall").click(function () {
        if ($("#checkboxlist #checkall").is(':checked')) {
            $("#checkboxlist input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#checkboxlist input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
  //  $("[data-toggle=tooltip]").tooltip();
});

// call onload or in script segment below form
function attachCheckboxHandlers() {
    // get reference to element containing toppings checkboxes
    var el = document.getElementById('certType');

    // get reference to input elements in toppings container element
    var tops = el.getElementsByTagName('input');
    
    alert("resp "+tops);
}

 function GetCheckedStateDirector() {

            var input = document.getElementById ("type2");
            var input2 = document.getElementById ("type1");
            var isChecked = input.checked;

            if (isChecked) {
                var data = input.value;
                input2.disabled = true;
                alert ("The checkBox2 is " + data);
            }else{
                 input2.disabled = false;
            }
           
           
        }

 function GetCheckedStateCoor(){
            
            var input2 = document.getElementById ("type1");
            var input = document.getElementById ("type2");
            var isChecked2 = input2.checked;
            
            if (isChecked2) {
                var dataCoor = input2.value;
                input.disabled = true;
               // alert ("The checkBox1 is " + dataCoor);

            }else{
                 input.disabled = false;
            }
           
        }
  
  


function getValueUsingParentTag(){
	var chkArray = [];
	
	/* look for all checkboes that have a parent id called 'checkboxlist' attached to it and check if it was checked */
	$("#checkboxlist input:checked").each(function() {
		if ($(this).val() != "on" ) {
		chkArray.push($(this).val());
		}

		
	});
	
	/* we join the array separated by the comma */
	var selected;
	selected = chkArray.join(',') ;

	/* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
	if(selected.length > 0){
        sendID(selected);
	}else{
		alert("No se ha seleccionado registros aún ! ");	
	}
}

function sendID(id){
    var loading = document.getElementById("loading");
    var fadescreen = document.getElementById("fadeing");
	var idInscrito = id;
        $.ajax({
        data: {"idInscrito": idInscrito},
        type: "POST",
        dataType: "text",
        url: "../Scripts/PHPCertificationsWord/PHPWord-master/samples/procesor.php",
        beforeSend: function(msg){
          
          loading.style.display = "block";
          fadescreen.style.display = "block";
            //sleep(15000);
                 },
    })
    .done(function( data, textStatus, jqXHR ) {
        //console.log("data retornada:"+data);
       loading.style.display = "none";
        fadescreen.style.display = "none";
        window.location = data;

    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        console.log( "La solicitud a fallado: " +  textStatus);
    });

	
}

function sendReporte(){
    var loading = document.getElementById("loading");
    var fadescreen = document.getElementById("fadeing");
   // var idInscrito = id;
    //var optionText = $("#lista_sedes option:selected").text();
     //var text = optionText.split('[A-Z]');
     var e = document.getElementById("lista_sedes");
     var strUser = e.options[e.selectedIndex].value;

     var d = document.getElementById("downloadFile");
     var f = document.getElementById("buttonReportes");
    // var strUser2 = d.options[d.selectedIndex].value;
     //var text = $('#selectorID').val();
    alert("DATOS EPARA ENVIAR EN EL sendReporte"+strUser);
     $.ajax({

        data: {"idSede": strUser},
        type: "POST",
        dataType: "text",
        url: "../Scripts/PDF/fpdf181/tutorial/generadorReportes.php",
        beforeSend: function(msg){
          
         // loading.style.display = "block";
         //fadescreen.style.display = "block";
            //sleep(15000);
                 },
    })
    .done(function( data, textStatus, jqXHR ) {
        console.log("data retornada:  "+data);
        //f.disabled = true;
        d.setAttribute('href', data);
      //  d.style.backgroundColor="#47c080";


       //loading.style.display = "none";
        //fadescreen.style.display = "none";
        //window.location = data;

    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        console.log( "La solicitud a fallado: " +  textStatus);
    });

    
}


function sleep(delay) {
        var start = new Date().getTime();
        while (new Date().getTime() < start + delay);
      }





/*$(function(){
            $("td").click(function(event){
                    if($(this).children("input").length > 0)
                            return false;
                    var tdObj = $(this);
                    var preText = tdObj.html();
                    var inputObj = $("<input type='text' />");
                    tdObj.html("");
                    inputObj.width(tdObj.width())
                            .height(tdObj.height())
                            .css({border:"0px",fontSize:"12px"})
                            .val(preText)
                            .appendTo(tdObj)
                            .trigger("focus")
                            .trigger("select");
                    inputObj.keyup(function(event){
                            if(13 == event.which) { // press ENTER-key
                                    var text = $(this).val();
                                    tdObj.html(text);
                            }
                            else if(27 == event.which) {  // press ESC-key
                                    tdObj.html(preText);
                            }
                  });
                    inputObj.click(function(){
                            return false;
                    });
            });
    });


*/