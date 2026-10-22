<?php

$conexion = new mysqli(
    "localhost",
    "root",
    "",
    "servicio_tecnico"
);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


?>