/* if the page has been fully loaded we add two click handlers to the button */
$(document).ready(function () {
	/* Get the checkboxes values based on the class attached to each check box */
	$("#buttonClass").click(function() {
	    getValueUsingClass();
	});
	
	/* Get the checkboxes values based on the parent div id */
	$("#buttonCertification").click(function() {
	    getValueUsingParentTag();
	});

	$("#edit").click(function() {
		alert("Modo edicion activado");
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
    
    $("[data-toggle=tooltip]").tooltip();
});



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
	sendID(selected);
	
	/* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
	/*if(selected.length > 0){
		alert("You have selected " + selected);	
	}else{
		alert("Please at least check one of the checkbox");	
	}*/
}

function sendID(id){
	
	var idInscrito = id;
	$.ajax({
		data: {"idInscrito": idInscrito},
		type: "POST",
		dataType: "text",
		url: "../Scripts/preProcesor.php",
	})
	.done(function( data, textStatus, jqXHR ) {
		console.log("data retornada:"+data);
        window.location = data;

	})
	.fail(function( jqXHR, textStatus, errorThrown ) {
		console.log( "La solicitud a fallado: " +  textStatus);
	});
}

function sleep(delay) {
        var start = new Date().getTime();
        while (new Date().getTime() < start + delay);
      }

function editRow(){
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