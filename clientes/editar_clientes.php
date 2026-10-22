<?php

include("../conexion.php");

$id = $_GET["id"];

$sql = "SELECT * FROM clientes
        WHERE id_cliente = '$id'";

$resultado = $conexion->query($sql);

$cliente = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="clientes.css">

    <title>Editar Cliente</title>

</head>

<body>

<div class="contenedor">

    <h1>Editar Cliente</h1>

    <form action="actualizar_clientes.php" method="POST">

        <input type="hidden"
               name="id_cliente"
               value="<?php echo $cliente["id_cliente"]; ?>">

        <label for="nombre">Nombre:</label>

        <input type="text"
               id="nombre"
               name="nombre"
               value="<?php echo $cliente["nombre"]; ?>"
               required>


        <label for="apellido">Apellido:</label>

        <input type="text"
               id="apellido"
               name="apellido"
               value="<?php echo $cliente["apellido"]; ?>"
               required>


        <label for="telefono">Teléfono:</label>

        <input type="text"
               id="telefono"
               name="telefono"
               value="<?php echo $cliente["telefono"]; ?>">


        <label for="correo">Correo:</label>

        <input type="email"
               id="correo"
               name="correo"
               value="<?php echo $cliente["correo"]; ?>">


        <input type="submit"
               value="Actualizar Cliente">

    </form>

</div>

</body>

</html>