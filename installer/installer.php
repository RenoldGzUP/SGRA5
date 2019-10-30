<?php
$enlace = mysql_connect('localhost', 'root', '');
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error());
}

$sql = 'CREATE DATABASE exampleDb';
if (mysql_query($sql, $enlace)) {
    echo "La base de datos mi_bd se creó correctamente\n";
} else {
    echo 'Error al crear la base de datos: ' . mysql_error() . "\n";
}
