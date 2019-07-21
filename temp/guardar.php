<?php
$archivo = $_FILES["archivo"];

//CONTAR EL NUMERO DE ARCHIOS
$files = glob('../temp/*.csv'); //obtenemos todos los nombres de los ficheros
var_dump($files);
foreach ($files as $file) {
    if (is_file($file)) {
        echo "bORRADO " . $file;
        unlink($file);

    }
//elimino el fichero
}

//COMPRUEBA SI EL ARCHIVO EXISTE
$rNumber     = rand();
$newNameFile = explode('.csv', $archivo["name"]);

if (file_exists($archivo["name"])) {
//  echo "El fichero" . $archivo["name"] . " existe";
    //rename($archivo["name"], $newNameFile[0] . $rNumber . ".csv");
    copy($archivo["name"], $newNameFile[0] . $rNumber . ".csv");

    if (move_uploaded_file($archivo["tmp_name"], $archivo["name"])) {
// echo "  Subido con éxito ->" . $archivo["name"];

    } else {
        echo "Error al subir archivo";
    }

//echo "Subido con éxito ->" . $archivo["name"];
} else {
    echo "El fichero" . $archivo["name"] . " no existe";
    if (move_uploaded_file($archivo["tmp_name"], $archivo["name"])) {
        echo "Subido con éxito ->" . $archivo["name"];

    } else {
// echo "Error al subir archivo";
    }

}
