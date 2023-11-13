<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="panaderia.css">
    <title>Resultado del Pedido de Panadería</title>
</head>
<body>
<?php
$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $fechaPedido = mysqli_real_escape_string($conexion, $_POST['fecha_pedido']);
    $facturas = mysqli_real_escape_string($conexion, $_POST['facturas']);
    $panCriollo = mysqli_real_escape_string($conexion, $_POST['pan_criollo']);
    $panDeLeche = mysqli_real_escape_string($conexion, $_POST['pan_de_leche']);
    $panFrances = mysqli_real_escape_string($conexion, $_POST['pan_frances']);
    $panRallado = mysqli_real_escape_string($conexion, $_POST['pan_rallado']);
    $otrosProductos = mysqli_real_escape_string($conexion, $_POST['otros_productos']);

    $sql = "INSERT INTO pedidos_panaderia (nombre, fecha_pedido, facturas, pan_criollo, pan_de_leche, pan_frances, pan_rallado, otros_productos)
            VALUES ('$nombre','$fechaPedido', '$facturas', '$panCriollo', '$panDeLeche', '$panFrances', '$panRallado', '$otrosProductos')";

    if (mysqli_query($conexion, $sql)) {
        echo '<div class="success-message">Pedido enviado.</div>';
        echo '<a href="pedidos.php" class="btn">Ir a la página</a>'; // Reemplaza "pedidos.php" con la URL de la página a la que deseas enlazar.
    } else {
        echo '<div class="error-message">Error al registrar el pedido: ' . mysqli_error($conexion) . '</div>';
    }
}

mysqli_close($conexion);
?>
</body>
</html>