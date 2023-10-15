<?php

//Establecer conexión con la base de datos
require_once '../logica/connection.php';

//Prueba a insertar datos
$test_insert = "INSERT INTO medicion (`id`, `temperatura`, `co2`, `latitud`, `longitud`) VALUES ('3','520','1314','0','0')";
if ($conn->query($test_insert) === TRUE) {
    echo "Insertar datos correcto";
} else {
    echo "Insertar datos incorrecto ";
}

//Prueba a eliminar datos
$test_delete = "DELETE FROM medicion WHERE id = '2'";
if ($conn->query($test_delete) === TRUE) {
    echo "Eliminar datos correcto";
} else {
    echo "Eliminar datos incorrecto ";
}
?>
