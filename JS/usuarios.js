//START FUNTIONS
$(document).ready(function() {
    // checkBoxToIndex();
});
////////////////////////
function clickUsuario() {
    var input = document.getElementById("usuarioRegular");
    var input2 = document.getElementById("usuarioEspecial");
    var input3 = document.getElementById("administrador");
    var isChecked = input.checked;
    if (isChecked) {
        $('#permitionUser').hide();
        var data = input.value;
        console.log(data);
        input2.disabled = true;
        input3.disabled = true;
    } else {
        $('#permitionUser').hide();
        input2.disabled = false;
        input3.disabled = false;
    }
}

function clickUsuarioEspecial() {
    var input = document.getElementById("usuarioRegular");
    var input2 = document.getElementById("usuarioEspecial");
    var input3 = document.getElementById("administrador");
    var isChecked = input2.checked;
    if (isChecked) {
        var data = input2.value;
        console.log(data);
        input.disabled = true;
        input3.disabled = true;
        $('#permitionUser').show();
        // document.getElementById('permitionUser').style.display = 'block';
        //document.getElementById("element").style.display = "block";
    } else {
        //document.getElementById('permitionUser').style.display = 'none';
        $('#permitionUser').hide();
        console.log("El check de permisos esta OFF");
        input.disabled = false;
        input3.disabled = false;
    }
}

function clickAdministrador() {
    $('#permitionUser').hide();
    var input = document.getElementById("usuarioRegular");
    var input2 = document.getElementById("usuarioEspecial");
    var input3 = document.getElementById("administrador");
    var isChecked = input3.checked;
    if (isChecked) {
        $('#permitionUser').hide();
        var data = input3.value;
        console.log(data);
        input.disabled = true;
        input2.disabled = true;
    } else {
        $('#permitionUser').hide();
        input.disabled = false;
        input2.disabled = false;
    }
}
///////////////////////////////////////////////////////////////////////////////
function checkBoxOK() {
    var nameCheckbox = document.getElementsByName('chkPage[]');
    var counterCheck = 0;
    var i = 0;
    var max = 4;
    while (i < nameCheckbox.length) {
        if (nameCheckbox[i].checked) {
            counterCheck++;
        }
        i++;
    }
    if (counterCheck >= max) {
        //alert("Max checkedBox selected");
        console.log("Max checkedBox selected");
        return false;
    }
}

function editUser(USER) {
    console.log("EDITAR USUARIO ON " + USER);
    $.ajax({
        data: {
            "idUser": USER
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/updateUser.php",
    }).done(function(data, textStatus, jqXHR) {
        //console.log("data retornada:" + data);
        getTYPEState(USER);
        checkPagesAllow(USER);
        document.getElementById('fillUserUpdate').innerHTML = data;
        $("#registerUser").modal();
        document.getElementById('editUpdateUser').action = "../Scripts/updateDataUser.php"; //Will set it
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}
//CHANGE THE CHECKBOX STATE
function getTYPEState(USER) {
    $.ajax({
        data: {
            "idType": 1,
            "idUser": USER
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/updateUser.php",
    }).done(function(data, textStatus, jqXHR) {
        console.log("data retornada:" + data);
        if (data == 1) {
            document.getElementById("usuarioRegular").checked = true;
            clickUsuario();
        } else if (data == 2) {
            document.getElementById("administrador").checked = true;
            clickAdministrador();
        } else if (data == 3) {
            document.getElementById("usuarioEspecial").checked = true;
            clickUsuarioEspecial();
        } else {
            console.log("Algo salió mal");
        }
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}

function checkPagesAllow(USER) {
    var allow = ["page1", "page2", "page3", "page4"];
    var j = 0;
    var pushVALUE = [];
    //GET THE VALUE FROM THE FORM
    while (j < allow.length) {
        var value_by_id = document.getElementById(allow[j]).value;
        pushVALUE.push(value_by_id);
        //console.log(allow[j]);
        j++;
    }
    $.ajax({
        data: {
            "idType": 2,
            "idUser": USER
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/updateUser.php",
    }).done(function(data, textStatus, jqXHR) {
        console.log("Paginas Admitidas :" + data);
        //IS ARRAY
        var userAllow = data.split("|");
        //MATCH WITH TEH DATA FROM SERVER
        var k = 0;
        while (k < allow.length) {
            if (pushVALUE[k] == userAllow[k]) {
                console.log("Se encontró concidencia con -> " + pushVALUE[k] + "  --  " + userAllow[k]);
                document.getElementById(allow[k]).checked = true;
            } else {
                console.log("No se encontro concidencia con -> " + pushVALUE[k] + "  --  " + userAllow[k]);
            }
            k++;
        }
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}
//////////////////////////////////////////////////////////////s////////////777
function checkBoxToUpdate() {
    var nameCheckbox = document.getElementsByName('chkUserUpdate');
    var counterCheck = 0;
    var i = 0;
    var max = 2;
    while (i < nameCheckbox.length) {
        if (nameCheckbox[i].checked) {
            counterCheck++;
        }
        i++;
    }
    if (counterCheck >= max) {
        //alert("Max checkedBox selected");
        console.log("Max checkedBox selected");
        return false;
    }
}

function checkBoxPagesOK() {
    var nameCheckbox = document.getElementsByName('chkPageUpdate[]');
    var counterCheck = 0;
    var i = 0;
    var max = 4;
    while (i < nameCheckbox.length) {
        if (nameCheckbox[i].checked) {
            counterCheck++;
        }
        i++;
    }
    if (counterCheck >= max) {
        //alert("Max checkedBox selected");
        console.log("Max checkedBox selected");
        return false;
    }
}
//////////////////////////////////////////
function openDeleteUserModal(ID_USER) {
    $("#deleteUserModal").modal();
    document.getElementById('userNameModal').innerHTML = ID_USER;
    //IF THE USER CONFIRM DELETE CONTINUE
    document.getElementById("deleteUserTaskBtt").onclick = function() {
        deleteUserRegister(ID_USER)
    };
}
//location.reload();
function deleteUserRegister(USER_NAME) {
    var idSend = USER_NAME;
    $.ajax({
        data: {
            "idSend": idSend
        },
        type: "POST",
        dataType: "text",
        url: "../Scripts/deleteUser.php",
    }).done(function(data, textStatus, jqXHR) {
        $("#doneDeleteModal").modal();
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("La solicitud a fallado: " + textStatus);
    });
}

function changePwd(ID_USER) {
    $("#changePassword").modal();
    console.log(ID_USER);
    document.getElementById("restorePwdBtt").value = ID_USER;
}

function resetPwd() {
    var idSend = $("#restorePwdBtt").val();
    console.log(idSend);
    $.ajax({
        data: {
            "idUsuarioPWD": idSend
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