function edit_row(id)
{
 //var name=document.getElementById("name_val"+id).innerHTML;
 //var age=document.getElementById("age_val"+id).innerHTML;
//get variables
 var name = document.getElementById("name"+id).innerHTML;
 var lastname = document.getElementById("lastname"+id).innerHTML;
 var CID = document.getElementById("CID"+id).innerHTML;
 var n_ins = document.getElementById("n_ins"+id).innerHTML;
 var sede = document.getElementById("sede"+id).innerHTML;
 var fac_ia = document.getElementById("fac_ia"+id).innerHTML;
 var esc_ia = document.getElementById("esc_ia"+id).innerHTML;
 var car_ia = document.getElementById("car_ia"+id).innerHTML;
 var fac_iia = document.getElementById("fac_iia"+id).innerHTML;
 var esc_iia = document.getElementById("esc_iia"+id).innerHTML;
 var car_iia = document.getElementById("car_iia"+id).innerHTML;
 var fac_iiia = document.getElementById("fac_iiia"+id).innerHTML;
 var esc_iiia = document.getElementById("esc_iiia"+id).innerHTML;
 var car_iiia = document.getElementById("car_iiia"+id).innerHTML;


//alert(name);
//replace type cell
 document.getElementById("name"+id).innerHTML="<input  type='text' size='4' id='name_text"+id+"'  value='"+name+"'>";
 document.getElementById("lastname"+id).innerHTML="<input type='text' size='4' id='lastname_text"+id+"' value='"+lastname+"'>";
 //document.getElementById("CID"+id).innerHTML="<input type='text' size='2' id='lastname"+id+"' value='"+lastname+"'>";
 //document.getElementById("n_"+id).innerHTML="<input type='text' id='lastname"+id+"' value='"+lastname+"'>";
 document.getElementById("sede"+id).innerHTML="<input type='text' size='1' id='sede_text"+id+"' value='"+sede+"'>";

 document.getElementById("fac_ia"+id).innerHTML="<input type='text' size='1'  id='fac_ia_text"+id+"' value='"+fac_ia+"'>";
 document.getElementById("esc_ia"+id).innerHTML="<input type='text' size='1' id='esc_ia_text"+id+"' value='"+fac_ia+"'>";
 document.getElementById("car_ia"+id).innerHTML="<input type='text' size='1' id='car_ia_text"+id+"' value='"+fac_ia+"'>";

 document.getElementById("fac_iia"+id).innerHTML="<input type='text' size='1' id='fac_iia_text"+id+"' value='"+fac_iia+"'>";
 document.getElementById("esc_iia"+id).innerHTML="<input type='text' size='1' id='esc_iia_text"+id+"' value='"+fac_iia+"'>";
 document.getElementById("car_iia"+id).innerHTML="<input type='text' size='1'  id='car_iia_text"+id+"' value='"+fac_iia+"'>";

 document.getElementById("fac_iiia"+id).innerHTML="<input type='text' size='1' id='fac_iiia_text"+id+"' value='"+fac_iiia+"'>";
 document.getElementById("esc_iiia"+id).innerHTML="<input type='text' size='1' id='esc_iiia_text"+id+"' value='"+fac_iiia+"'>";
 document.getElementById("car_iiia"+id).innerHTML="<input type='text' size='1' id='car_iiia_text"+id+"' value='"+fac_iiia+"'>";

 document.getElementById("edit_button"+id).style.display="none";
 document.getElementById("save_button"+id).style.display="inline";

}

function save_row(id)
{

 var name = document.getElementById("name_text"+id).value;
 var lastname = document.getElementById("lastname_text"+id).value;
 //var CID = document.getElementById("CID"+id).innerHTML;
// var n_ins = document.getElementById("n_ins"+id).innerHTML;
 var sede = document.getElementById("sede_text"+id).value;
 var fac_ia = document.getElementById("fac_ia_text"+id).value;
 var esc_ia = document.getElementById("esc_ia_text"+id).value;
 var car_ia = document.getElementById("car_ia_text"+id).value;
 var fac_iia = document.getElementById("fac_iia_text"+id).value;
 var esc_iia = document.getElementById("esc_iia_text"+id).value;
 var car_iia = document.getElementById("car_iia_text"+id).value;
 var fac_iiia = document.getElementById("fac_iiia_text"+id).value;
 var esc_iiia = document.getElementById("esc_iiia_text"+id).value;
 var car_iiia = document.getElementById("car_iiia_text"+id).value;

var respSave = confirm("Guardar cambios de "+id+"  ?");

if (respSave == true) {
  $.ajax
 ({
  type:'post',
  url:'../Scripts/adminActionsRow.php',
  data:{
   save_row:'save_row',
   row_id:id,
   name_val:name,
   lastname_val:lastname,
   sede_val:sede,
   fac_ia_val:fac_ia,
   esc_ia_val:esc_ia,
   car_ia_val:car_ia,
   fac_iia_val:fac_iia,
   esc_iia_val:esc_iia,
   car_iia_val:car_iia,
   fac_iiia_val:fac_iiia,
   esc_iiia_val:esc_iiia,
   car_iiia_val:car_iiia
  },
  success:function(response) {
   if(response=="success")
   {
    document.getElementById("name"+id).innerHTML=name;
    document.getElementById("lastname"+id).innerHTML=lastname;
   // document.getElementById("CID"+id).innerHTML;
  //  document.getElementById("n_ins"+id).innerHTML;
    document.getElementById("sede"+id).innerHTML=sede;
    document.getElementById("fac_ia"+id).innerHTML=fac_ia;
    document.getElementById("esc_ia"+id).innerHTML=esc_ia;
    document.getElementById("car_ia"+id).innerHTML=car_ia;
    document.getElementById("fac_iia"+id).innerHTML=fac_iia;
    document.getElementById("esc_iia"+id).innerHTML=esc_iia;
    document.getElementById("car_iia"+id).innerHTML=car_iia;
    document.getElementById("fac_iiia"+id).innerHTML=fac_iiia;
    document.getElementById("esc_iiia"+id).innerHTML=esc_iiia;
    document.getElementById("car_iiia"+id).innerHTML=car_iiia;

    document.getElementById("edit_button"+id).style.display="inline";
    document.getElementById("save_button"+id).style.display="none";
   }
  }
 });

}//fin if
//alert(name+lastname+sede+fac_ia);
 

}

//PARA EDITAR LOS REGISTROS DE LA TABLA
function modal_edit(id){

  var idInscrito = id;

  $.ajax({
   data: {"idInscrito": idInscrito},
   type: "POST",
   dataType: "text",
   url: "../Scripts/getAllDataInscritos.php",
 })
  .done(function( data, textStatus, jqXHR ) {

  console.log("data  :"+data);
  document.getElementById('studentTableEdit').innerHTML = data;
  $("#tipoCertificaciones").modal();
  })

  .fail(function( jqXHR, textStatus, errorThrown ) {
    console.log( "La solicitud a fallado: " +  textStatus);
  });


}




function delete_row(id)
{
  var resp = confirm("Confirme borrado de "+id+"  ?");
  if (resp == true) 
  {
   $.ajax
   ({
    type:'post',
    url:'../Scripts/adminActionsRow.php',
    data:{delete_row:'delete_row',row_id:id,},
    success:function(response) 
    {
     if(response=="success")
     {
      var row = document.getElementById("row"+id);
      row.parentNode.removeChild(row);
    }
  }
});
 }

}

