<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="pedidocarne.css">
    <title>Resultado del Pedido de Carnicería y Pollería</title>
</head>
<body>
<?php
$conexion = mysqli_connect("localhost", "root", "", "pasantias") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaPedido = mysqli_real_escape_string($conexion, $_POST['fecha_pedido']);

    // Datos de la Carnicería
    $carneCerdo = mysqli_real_escape_string($conexion, $_POST['carne_cerdo']);
    $carneHorno = mysqli_real_escape_string($conexion, $_POST['carne_horno']);
    $carneSalsa = mysqli_real_escape_string($conexion, $_POST['carne_salsa']);
    $carneMolida = mysqli_real_escape_string($conexion, $_POST['carne_molida']);
    $milanesaVaca = mysqli_real_escape_string($conexion, $_POST['milanesa_vaca']);

    // Datos de la Pollería
    $milanesaPollo = mysqli_real_escape_string($conexion, $_POST['milanesa_pollo']);
    $pollo = mysqli_real_escape_string($conexion, $_POST['pollo']);

    // Otros Productos Adicionales
    $otrosProductos = mysqli_real_escape_string($conexion, $_POST['otros_productos']);

    $sql = "INSERT INTO pedidos_carniceria (fecha_pedido, carne_cerdo, carne_horno, carne_salsa, carne_molida, milanesa_vaca, milanesa_pollo, pollo, otros_productos)
            VALUES ('$fechaPedido', '$carneCerdo', '$carneHorno', '$carneSalsa', '$carneMolida', '$milanesaVaca', '$milanesaPollo', '$pollo', '$otrosProductos')";

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
