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
    $fecha_entrega_facturas = mysqli_real_escape_string($conexion, $_POST['fecha_entrega_facturas']);
    $panCriollo = mysqli_real_escape_string($conexion, $_POST['pan_criollo']);
    $fecha_entrega_pan_criollo = mysqli_real_escape_string($conexion, $_POST['fecha_entrega_pan_criollo']);
    $panDeLeche = mysqli_real_escape_string($conexion, $_POST['pan_de_leche']);
    $fecha_entrega_pan_de_leche = mysqli_real_escape_string($conexion, $_POST['fecha_entrega_pan_de_leche']);
    $panFrances = mysqli_real_escape_string($conexion, $_POST['pan_frances']);
    $fecha_entrega_pan_frances = mysqli_real_escape_string($conexion, $_POST['fecha_entrega_pan_frances']);
    $panRallado = mysqli_real_escape_string($conexion, $_POST['pan_rallado']);
    $fecha_entrega_pan_rallado = mysqli_real_escape_string($conexion, $_POST['fecha_entrega_pan_rallado']);
    $otrosProductos = mysqli_real_escape_string($conexion, $_POST['otros_productos']);

    $sql = "INSERT INTO pedidos_panaderia (nombre, fecha_pedido, facturas, fecha_entrega_facturas, pan_criollo, fecha_entrega_pan_criollo, pan_de_leche, fecha_entrega_pan_de_leche, pan_frances, fecha_entrega_pan_frances, pan_rallado, fecha_entrega_pan_rallado, otros_productos)
            VALUES ('$nombre','$fechaPedido', '$facturas', '$fecha_entrega_facturas', '$panCriollo', '$fecha_entrega_pan_criollo', '$panDeLeche', '$fecha_entrega_pan_de_leche', '$panFrances', '$fecha_entrega_pan_frances', '$panRallado', '$fecha_entrega_pan_rallado', '$otrosProductos')";

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