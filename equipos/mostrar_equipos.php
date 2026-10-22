<?php

include("../conexion.php");

$resultado = $conexion->query(
    "SELECT * FROM equipos ORDER BY id_equipo"
);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="equipos.css">

    <title>Equipos</title>

</head>

<body>

<div class="contenedor">

    <h1>Equipos en Reparacion</h1>

    <?php

    if (isset($_GET["guardado"])) {

        if ($_GET["guardado"] == 1) {

            echo "<p>Equipo guardado correctamente.</p>";

        }

    }

    ?>

    <table>

        <tr>
            <th>ID_Equipo</th>
            <th>ID_Cliente</th>
            <th>Tipo</th>
            <th>Marca</th>
            <th>Modelo</th>
        </tr>

        <?php

        while ($fila = $resultado->fetch_assoc()) {

        ?>

        <tr>

            <td>
                <?php echo $fila["id_equipo"]; ?>
            </td>

            <td>
                <?php echo $fila["id_cliente"]; ?>
            </td>

            <td>
                <?php echo $fila["tipo"]; ?>
            </td>

            <td>
                <?php echo $fila["marca"]; ?>
            </td>

            <td>
                <?php echo $fila["modelo"]; ?>
            </td>

            <td>
                <a href="editar_equipos.php?id=<?php echo $fila["id_cliente"]; ?>">
                    Editar
                </a>
            </td>

        </tr>

        <?php

        }

        ?>

    </table>

    <br>

    <a href="../menu.php">
        Volver al Menu Principal
    </a>

</div>

</body>

</html>