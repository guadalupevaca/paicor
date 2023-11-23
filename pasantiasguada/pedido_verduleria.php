<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="detalles.css">
    <title>Resultado del Pedido de Verdulería</title>
</head>
<body>

<div class="container">
        <div class="header">
            <h1>Resultado del Pedido de Verdulería</h1>
        </div>
<?php

$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $fechaPedido = mysqli_real_escape_string($conexion, $_POST['fecha_pedido']);
    $otrosProductos = mysqli_real_escape_string($conexion, $_POST['otros_productos']);

    // Array con los nombres de los productos
    $productos = array(
        'papas', 'tomate', 'cebolla', 'zanahoria', 'choclo', 'zapallitos', 'calabacin', 'lechuga', 'acelga',
        'berenjena', 'espinaca'
    );

    // Filtrar los productos que tienen una cantidad mayor a cero
    $productosPedidos = array_filter($productos, function ($producto) {
        return isset($_POST[$producto]) && $_POST[$producto] > 0;
    });

    // Crear la consulta SQL dinámicamente solo con los productos pedidos
    $sql = "INSERT INTO pedidos_verduras (nombre, fecha_pedido";
    $values = "('$nombre', '$fechaPedido'";

    // Agregar dinámicamente los campos y valores para cada producto
    foreach ($productosPedidos as $producto) {
        $cantidad = $_POST[$producto];
        $fechaProducto = $_POST["fecha_$producto"];
        $sql .= ", $producto, fecha_$producto";
        $values .= ", '$cantidad', '$fechaProducto'";
    }

    // Agregar otros productos si se han especificado
    if (!empty($otrosProductos)) {
        $sql .= ", otros_productos";
        $values .= ", '$otrosProductos'";
    }

    // Finalizar la consulta
    $sql .= ") VALUES $values)";

    if (mysqli_query($conexion, $sql)) {
        echo '<div class="success-message">Pedido enviado.</div>';

        // Mostrar los detalles del pedido
        echo '<h2>Detalles del Pedido:</h2>';
        echo '<ul>';

        // Iterar sobre los productos pedidos
        foreach ($productosPedidos as $producto) {
            $cantidad = $_POST[$producto];
            $fechaProducto = $_POST["fecha_$producto"];
            echo "<li>$producto: $cantidad (Entrega el $fechaProducto)</li>";
        }

        // Mostrar detalles de otros productos si se han especificado
        if (!empty($otrosProductos)) {
            echo "<li>Otros Productos: $otrosProductos</li>";
        }

        echo '</ul>';

    } else {
        echo '<div class="error-message">Error al registrar el pedido: ' . mysqli_error($conexion) . '</div>';
    }
}

mysqli_close($conexion);
?>
    <footer>
     <p>Pedido-Paicor</p>
    </footer>
</div>
</body>
</html>
