
<?php

include("../conexion.php");

$id = $_GET["id"];

$sql = "SELECT * FROM equipos
        WHERE id_equipo = '$id'";

$resultado = $conexion->query($sql);

$cliente = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="equipos.css">

    <title>Editar Equipos</title>

</head>

<body>

<div class="contenedor">

    <h1>Editar Equipos</h1>

    <form action="actualizar_equipos.php" method="POST">

        <input type="hidden"
               name="id_equipo"
               value="<?php echo $cliente["id_cliente"]; ?>">

        <label for="tipo">Tipo:</label>

        <input type="text"
               id="tipo"
               name="tipo"
               value="<?php echo $cliente["equipo"]; ?>"
               required>


        <label for="marca">Marca:</label>

        <input type="text"
               id="marca"
               name="marca"
               value="<?php echo $cliente["marca"]; ?>"
               required>


        <label for="modelo">Modelo:</label>

        <input type="text"
               id="modelo"
               name="modelo"
               value="<?php echo $cliente["modelo"]; ?>">



        <input type="submit"
               value="Actualizar Equipo">

    </form>

</div>

</body>

</html>