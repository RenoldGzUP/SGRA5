    function ajax(){
      var req = new XMLHttpRequest();

      req.onreadystatechange = function(){
        if (req.readyState == 4 && req.status == 200) {
          document.getElementById('bar1').innerHTML = req.responseText;
        }
      }

      req.open('GET', '../Scripts/progress1.php', true);
      req.send();
    }


function getBarData(){
    //var idInscrito = $("#idSearch").val();
    //var table1 = $("#tablaInscritos").val();
    //var table2 = $("#tablaResultados").val();
     var elem = document.getElementById("bar1"); 
      var id = setInterval(frame, 600);
    function frame() {
    if (width == 100) {
      clearInterval(id);
    } else {
      width = width + 4; 
      elem.style.width = width + '%'; 
      elem.innerHTML = width * 1  + '%';
    }
  }


  $.ajax({
        url: "../Scripts/progress1.php",
    })
    .done(function( data, textStatus, jqXHR ) {
        console.log("data retornada:"+data);

        if (data ==) {}
        //window.location = data;
          //$("#taInscritosResultado").val(data);
         // document.getElementById('taInscritosInscritos').innerHTML = data;
         // document.getElementById('taInscritosResultado').innerHTML = data;

          if (width == 100) {
            clearInterval(id);
           } else {
                  width = width + 4; 
                  elem.style.width = width + '%'; 
                  elem.innerHTML = width * 1  + '%';
                }

       elem.style.display="inline";
       elem.style.width = width + '%'; 
       elem.innerHTML = width * 1  + '%';

    })

    .fail(function( jqXHR, textStatus, errorThrown ) {
        console.log( "La solicitud a fallado: " +  textStatus);
    });
}




    //linea que hace que se refreseque la pagina cada segundo
    setInterval(function(){getBarData();}, 1000);