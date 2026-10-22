<?php

session_start();

include_once "conexion.php";

function verificar_login($user, $password, $conexion)
{
    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND password = ?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $user, $password);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        return $resultado->fetch_object();
    }

    return null;
}


if (isset($_SESSION['userid'])) {
    header("Location: menu.php");
    exit;
}


$error = "";

if (isset($_POST['login'])) {

    $user = $_POST['user'];
    $password = $_POST['password'];

    $resultado = verificar_login($user, $password, $conexion);

    if ($resultado !== null) {

        $_SESSION['userid'] = $resultado->idusuario;
        $_SESSION['usuario'] = $resultado->usuario;

        header("Location: menu.php");
        exit;

    } else {

        $error = "Usuario o contraseña incorrectos.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Iniciar sesión</title>

</head>

<body>

    <div class="login-contenedor">

        <h1>Servicio Técnico: Los Circuitos</h1>

        <h2>Iniciar sesión</h2>

        <?php if ($error != "") { ?>

            <div class="error">
                <?php echo $error; ?>
            </div>

        <?php } ?>

        <form action="login.php" method="POST">

            <div class="campo">

                <label for="user">Usuario</label>

                <input
                    type="text"
                    id="user"
                    name="user"
                    required
                >

            </div>

            <div class="campo">

                <label for="password">Contraseña</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >

            </div>

            <button type="submit" name="login">
                Iniciar sesión
            </button>

        </form>

    </div>

</body>

</html>
