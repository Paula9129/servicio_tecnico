<?php

session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Servicio Técnico</title>
</head>

<body>

    <div class="contenedor">

        <header>
            <h1>Servicio Técnico</h1>

            <p>
                Bienvenido,
                <?php echo htmlspecialchars($_SESSION['usuario']); ?>
            </p>
        </header>

        <main>

            <h2>Menú principal</h2>

            <div class="menu">

                <a href="clientes/clientes.html" class="boton">
                    Clientes
                </a>

                <a href="#" class="boton">
                    Equipos
                </a>

                <a href="#" class="boton">
                    Reparaciones
                </a>

                <a href="#" class="boton">
                    Presupuestos
                </a>

            </div>

        </main>

        <footer>

            <a href="logout.php" class="logout">
                Cerrar sesión
            </a>

        </footer>

    </div>

</body>
</html>

