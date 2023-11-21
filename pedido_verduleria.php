<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="mensaje.css">
    <title>Resultado del Pedido de Verdulería</title>
</head>
<body>
<?php
$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $fechaPedido = mysqli_real_escape_string($conexion, $_POST['fecha_pedido']);
    $papas = mysqli_real_escape_string($conexion, $_POST['papas']);
    $fecha_papas = mysqli_real_escape_string($conexion, $_POST['fecha_papas']);
    $tomate = mysqli_real_escape_string($conexion, $_POST['tomate']);
    $fecha_tomate = mysqli_real_escape_string($conexion, $_POST['fecha_tomate']);
    $cebolla = mysqli_real_escape_string($conexion, $_POST['cebolla']);
    $fecha_cebolla = mysqli_real_escape_string($conexion, $_POST['fecha_cebolla']);
    $zanahoria = mysqli_real_escape_string($conexion, $_POST['zanahoria']);
    $fecha_zanahoria = mysqli_real_escape_string($conexion, $_POST['fecha_zanahoria']);
    $choclo = mysqli_real_escape_string($conexion, $_POST['choclo']);
    $fecha_choclo = mysqli_real_escape_string($conexion, $_POST['fecha_choclo']);
    $zapallitos = mysqli_real_escape_string($conexion, $_POST['zapallitos']);
    $fecha_zapallitos = mysqli_real_escape_string($conexion, $_POST['fecha_zapallitos']);
    $calabacin = mysqli_real_escape_string($conexion, $_POST['calabacin']);
    $fecha_calabacin = mysqli_real_escape_string($conexion, $_POST['fecha_calabacin']);
    $lechuga = mysqli_real_escape_string($conexion, $_POST['lechuga']);
    $fecha_lechuga = mysqli_real_escape_string($conexion, $_POST['fecha_lechuga']);
    $acelga = mysqli_real_escape_string($conexion, $_POST['acelga']);
    $fecha_acelga = mysqli_real_escape_string($conexion, $_POST['fecha_acelga']);
    $berenjena = mysqli_real_escape_string($conexion, $_POST['berenjena']);
    $fecha_berenjena= mysqli_real_escape_string($conexion, $_POST['fecha_berenjena']);
    $espinaca = mysqli_real_escape_string($conexion, $_POST['espinaca']);
    $fecha_espinaca = mysqli_real_escape_string($conexion, $_POST['fecha_espinaca']);
    $otrosProductos = mysqli_real_escape_string($conexion, $_POST['otros_productos']);

    $sql = "INSERT INTO pedidos_verduras (nombre, fecha_pedido, papas, fecha_papas, tomate, fecha_tomate, cebolla, fecha_cebolla, zanahoria, fecha_zanahoria, choclo, fecha_choclo, zapallitos, fecha_zapallitos, calabacin, fecha_calabacin, lechuga, fecha_lechuga, acelga, fecha_acelga, berenjena, fecha_berenjena, espinaca, fecha_espinaca, otros_productos)
    VALUES ('$nombre', '$fechaPedido', '$papas', '$fecha_papas', '$tomate', '$fecha_tomate', '$cebolla', '$fecha_cebolla', '$zanahoria', '$fecha_zanahoria', '$choclo', '$fecha_choclo', '$zapallitos', '$fecha_zapallitos', '$calabacin', '$fecha_calabacin', '$lechuga', '$fecha_lechuga', '$acelga', '$fecha_acelga', '$berenjena', '$fecha_berenjena', '$espinaca', '$fecha_espinaca', '$otrosProductos')";


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