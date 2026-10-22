<?php

include("../conexion.php");

$id_cliente = $_POST["id_cliente"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];

$sql = "UPDATE clientes SET

        nombre = '$nombre',
        apellido = '$apellido',
        telefono = '$telefono',
        correo = '$correo'

        WHERE id_cliente = '$id_cliente'";

if ($conexion->query($sql)) {

    header("Location: listar_clientes.php?actualizado=1");
    exit;

} else {

    echo "Error al actualizar: " . $conexion->error;
}

?>