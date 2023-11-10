<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="limpieza.css">
    <title>Resultado del Pedido de Limpieza</title>
</head>
<body>
<?php
$conexion = mysqli_connect("localhost", "root", "", "pasantias") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaPedido = mysqli_real_escape_string($conexion, $_POST['fecha_pedido']);
    $bolsasConsorcio = mysqli_real_escape_string($conexion, $_POST['bolsas_consorcio']);
    $lavandina = mysqli_real_escape_string($conexion, $_POST['lavandina']);
    $detergente = mysqli_real_escape_string($conexion, $_POST['detergente']);
    $desengrasante = mysqli_real_escape_string($conexion, $_POST['desengrasante']);
    $desinfectante = mysqli_real_escape_string($conexion, $_POST['desinfectante']);
    $valerinas = mysqli_real_escape_string($conexion, $_POST['valerinas']);
    $alcohol = mysqli_real_escape_string($conexion, $_POST['alcohol']);
    $escobillon = mysqli_real_escape_string($conexion, $_POST['escobillon']);
    $secadorPisos = mysqli_real_escape_string($conexion, $_POST['secador_pisos']);
    $trapoPiso = mysqli_real_escape_string($conexion, $_POST['trapo_piso']);
    $baldes = mysqli_real_escape_string($conexion, $_POST['baldes']);
    $esponja = mysqli_real_escape_string($conexion, $_POST['esponja']);
    $fosforos = mysqli_real_escape_string($conexion, $_POST['fosforos']);
    $otrosProductos = mysqli_real_escape_string($conexion, $_POST['otros_productos']);

    $sql = "INSERT INTO pedidos_limpieza (fecha_pedido, bolsas_consorcio, lavandina, detergente, desengrasante, desinfectante, valerinas, alcohol, escobillon, secador_pisos, trapo_piso, baldes, esponja, fosforos, otros_productos)
            VALUES ('$fechaPedido', '$bolsasConsorcio', '$lavandina', '$detergente', '$desengrasante', '$desinfectante', '$valerinas', '$alcohol', '$escobillon', '$secadorPisos', '$trapoPiso', '$baldes', '$esponja', '$fosforos', '$otrosProductos')";

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
