<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="mensaje.css">
    <title>Resultado del Pedido de Verdulería</title>
</head>
<body>
<?php
$conexion = mysqli_connect("localhost", "root", "", "pasantias") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaPedido = mysqli_real_escape_string($conexion, $_POST['fecha_pedido']);
    $papas = mysqli_real_escape_string($conexion, $_POST['papas']);
    $tomate = mysqli_real_escape_string($conexion, $_POST['tomate']);
    $cebolla = mysqli_real_escape_string($conexion, $_POST['cebolla']);
    $zanahoria = mysqli_real_escape_string($conexion, $_POST['zanahoria']);
    $choclo = mysqli_real_escape_string($conexion, $_POST['Choclo']);
    $zapallitos = mysqli_real_escape_string($conexion, $_POST['zapallitos']);
    $calabacin = mysqli_real_escape_string($conexion, $_POST['Calabacin']);
    $lechuga = mysqli_real_escape_string($conexion, $_POST['lechuga']);
    $acelga = mysqli_real_escape_string($conexion, $_POST['Acelga']);
    $berenjena = mysqli_real_escape_string($conexion, $_POST['Berenjena']);
    $espinaca = mysqli_real_escape_string($conexion, $_POST['espinaca']);
    $otrosProductos = mysqli_real_escape_string($conexion, $_POST['otros_productos']);

    $sql = "INSERT INTO pedidos_verduras (fecha_pedido, papas, tomate, cebolla, zanahoria, choclo, zapallitos, calabacin, lechuga, acelga, berenjena, espinaca, otros_productos)
            VALUES ('$fechaPedido', '$papas', '$tomate', '$cebolla', '$zanahoria', '$choclo', '$zapallitos', '$calabacin', '$lechuga', '$acelga', '$berenjena', '$espinaca', '$otrosProductos')";

    if (mysqli_query($conexion, $sql)) {
        echo '<div class="success-message">Pedido enviado.</div>';
        echo '<a href="pedidos.php" class="btn">Ir a la página</a>';
    } else {
        echo '<div class="error-message">Error al registrar el pedido: ' . mysqli_error($conexion) . '</div>';
    }
}

mysqli_close($conexion);
?>
</body>
</html>
