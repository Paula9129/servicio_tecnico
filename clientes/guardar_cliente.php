<?php

include("../conexion.php");

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];

$sql = "INSERT INTO clientes
        (nombre, apellido, telefono, correo)
        VALUES
        ('$nombre', '$apellido', '$telefono', '$correo')";

if ($conexion->query($sql)) {

    header("Location: mostrar_clientes.php?guardado=1");
    exit;

} else {

    echo "Error al guardar el cliente: " . $conexion->error;
}

?>