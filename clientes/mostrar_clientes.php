<?php

include("../conexion.php");

$resultado = $conexion->query(
    "SELECT * FROM clientes ORDER BY apellido, nombre"
);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="clientes.css">

    <title>Clientes</title>

</head>

<body>

<div class="contenedor">

    <h1>Clientes registrados</h1>

    <?php

    if (isset($_GET["guardado"])) {

        if ($_GET["guardado"] == 1) {

            echo "<p>Cliente guardado correctamente.</p>";

        }

    }

    ?>

    <table>

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>

        <?php

        while ($fila = $resultado->fetch_assoc()) {

        ?>

        <tr>

            <td>
                <?php echo $fila["id_cliente"]; ?>
            </td>

            <td>
                <?php echo $fila["nombre"]; ?>
            </td>

            <td>
                <?php echo $fila["apellido"]; ?>
            </td>

            <td>
                <?php echo $fila["telefono"]; ?>
            </td>

            <td>
                <?php echo $fila["correo"]; ?>
            </td>

            <td>
                <a href="editar_cliente.php?id=<?php echo $fila["id_cliente"]; ?>">
                    Editar
                </a>
            </td>

        </tr>

        <?php

        }

        ?>

    </table>
        <div class="acciones">
            <a href="../menu.php" class="boton">Volver al Menu Principal</a>
            <a href="alta_alumno.html" class="boton">Ingresar Nuevo Alumno</a>
        </div>
    <br>

    <a href="clientes.html">
        Registrar nuevo cliente
    </a>

</div>

</body>

</html>