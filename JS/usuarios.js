function clickUsuario() {
    $('#permitionUser').hide();
    var input = document.getElementById("usuarioRegular");
    var input2 = document.getElementById("usuarioEspecial");
    var input3 = document.getElementById("administrador");
    var isChecked = input.checked;
    if (isChecked) {
        var data = input.value;
        console.log(data);
        input2.disabled = true;
        input3.disabled = true;
    } else {
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
    } else {
        $('#permitionUser').hide();
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
        var data = input3.value;
        console.log(data);
        input.disabled = true;
        input2.disabled = true;
    } else {
        input.disabled = false;
        input2.disabled = false;
    }
}

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