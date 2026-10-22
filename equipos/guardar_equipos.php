<?php

include("../conexion.php");

$id_equipo = $_POST["id_equipo"];
$id_cliente = $_POST["id_cliente"];
$tipo = $_POST["tipo"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];

$sql = "INSERT INTO equipos
        (id_equipo, id_cliente, tipo, marca, modelo)
        VALUES
        ('$id_equipo', '$id_cliente', '$tipo', '$marca', '$modelo')";

if ($conexion->query($sql)) {

    header("Location: mostrar_equipos.php?guardado=1");
    exit;

} else {

    echo "Error al guardar el equipo: " . $conexion->error;
}

?>