<?php
include("../conexion.php");
?>

<h1>Registrar Equipo</h1>

<form method="post">

Cliente:

<select name="id_equipo">

<?php

$clientes = $conexion->query(
    "SELECT * FROM equipos ORDER BY id_equipo"
);

while($equipo = $equipo->fetch_assoc()) {

    echo "<option value='".$equipo['id_cliente']."'>";
    echo $equipo['id_equipo'];
    echo "</option>";
}
?>

</select>

<br><br>

Tipo:
<input type="text" name="tipo">

<br><br>

Marca:
<input type="text" name="marca">

<br><br>

Modelo:
<input type="text" name="modelo">

<br><br>

<input type="submit" value="Guardar Equipo">

</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_equipo = $_POST["id_equipo"];
    $id_cliente = $_POST["id_cliente"];
    $tipo = $_POST["tipo"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];

    $sql = "INSERT INTO equipos
            (id_equipo, id_cliente, tipo, marca, modelo)
            VALUES
            ('$id_equipo', '$id_cliente', '$tipo', '$marca', '$modelo')";

    if($conexion->query($sql)) {

        echo "<br>Equipo registrado correctamente";

    } else {

        echo "<br>Error al registrar";
    }
}
?>

<h2>Equipos Registrados</h2>

<table border="1">

<tr>
    <th>ID_Equipo</th>
    <th>ID_Cliente</th>
    <th>Tipo</th>
    <th>Marca</th>
    <th>Modelo</th>
</tr>

<?php

$sql = "
SELECT e.id_equipo,
       c.nombre,
       e.tipo,
       e.marca,
       e.modelo
FROM equipos e
INNER JOIN clientes c
ON e.id_cliente = c.id_cliente
";

$resultado = $conexion->query($sql);

while($fila = $resultado->fetch_assoc()) {

    echo "<tr>";
    echo "<td>".$fila['id_equipo']."</td>";
    echo "<td>".$fila['nombre']."</td>";
    echo "<td>".$fila['tipo']."</td>";
    echo "<td>".$fila['marca']."</td>";
    echo "<td>".$fila['modelo']."</td>";
    echo "</tr>";
}
?>

</table>