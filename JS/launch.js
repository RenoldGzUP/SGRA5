function showPWDR() {
    $("#editPWD").modal();
}

function checkPwdState() {
    var idState = 1;
    console.log(idSend);
    $.ajax({
        data: {
            "idStatePWD": idState
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/resetPwd.php",
    }).done(function(data, textStatus, jqXHR) {
        console.log("OK");
        $("#changePassword").modal('hide');
        $("#doneModalUser").modal();
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}