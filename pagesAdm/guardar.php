<?php
$archivo = $_FILES["archivo"];

//COMPRUEBA SI EL ARCHIVO EXISTE
$rNumber     = rand();
$newNameFile = explode('.csv', $archivo["name"]);

if (file_exists($archivo["name"])) {
    echo "El fichero" . $archivo["name"] . " existe";
    rename($archivo["name"], $newNameFile[0] . $rNumber . ".csv");

    if (move_uploaded_file($archivo["tmp_name"], $archivo["name"])) {
        echo "Subido con éxito ->" . $archivo["name"];

    } else {
        echo "Error al subir archivo";
    }

    //echo "Subido con éxito ->" . $archivo["name"];
} else {
    echo "El fichero" . $archivo["name"] . " no existe";
    if (move_uploaded_file($archivo["tmp_name"], $archivo["name"])) {
        echo "Subido con éxito ->" . $archivo["name"];

    } else {
        echo "Error al subir archivo";
    }

}
