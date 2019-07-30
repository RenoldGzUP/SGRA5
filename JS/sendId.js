function sendata(id) {
    var idSend = id;
    //alert(idSend);
    //console.log(idSe
    $('deleteModal').modal();
    $.ajax({
        data: {
            "idSend": idSend
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/deleteUser.php",
    }).done(function(data, textStatus, jqXHR) {
        location.reload();
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}