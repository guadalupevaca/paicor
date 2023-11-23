<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="ver.css">

</head>
<body>
    
</body>
</html><?php
$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pedido'])) {
    $pedido_nombre = $_POST['pedido'];

    $query_pedido = "SELECT * FROM pedido_almacen WHERE nombre = '$pedido_nombre'";
    $result_pedido = mysqli_query($conexion, $query_pedido);

    if ($result_pedido->num_rows > 0) {
        echo '<h2>Detalles del Pedido de Almacén - ' . $pedido_nombre . '</h2>';

        while ($row_pedido = $result_pedido->fetch_assoc()) {
            echo '<h3>Nombre del Colegio: ' .$row_pedido['nombre'] .'</h3>';
            echo '<h4>ID Pedido: ' .$row_pedido['id_almacen'] .'</h4>';
            echo '<h4>Fecha Pedido: ' . $row_pedido['fecha_pedido'] . '</h4>';

            echo '<table border="1" style="margin-bottom: 20px;">';
            echo '<tr><th>Producto</th><th>Cantidad</th></tr>';

            // Array de productos
            $productos = array(
                'aceite', 'ajo_deshidratado', 'arroz', 'arvejas', 'azucar', 'cacao', 'choclo', 'chocolate',
                'comino', 'dulce_de_batata', 'dulce_de_membrillo', 'fecula', 'fideos_guiseros', 'fideos_tallarines',
                'flan', 'harina_de_maiz', 'huevos', 'laurel', 'lentejas', 'maicena', 'maiz_molido', 'malta',
                'manteca', 'oregano', 'perejil', 'pimenton', 'porotos', 'provenzal', 'pure_de_tomate', 'sal_fina',
                'sal_gruesa', 'tomate_triturado', 'trigo_burgol', 'vinagre', 'leche', 'queso_cremoso', 'queso_rallar',
                'queso_senda', 'yogur', 'otro_producto', 'colacion_producto'
            );

            // Mostrar solo los productos con cantidades mayores a cero
            foreach ($productos as $producto) {
                $cantidad = $row_pedido[$producto];
                if ($cantidad > 0) {
                    echo '<tr><td>' . $producto . '</td><td>' . $cantidad . '</td></tr>';
                }
            }

            echo '</table>';
            echo '<a href="editar_pedido_almacen.php?id=' . $row_pedido['id_almacen'] . '">Editar este pedido</a>';
            echo '<a href="generar_pdfalmacen.php?pedido=' . $row_pedido["nombre"] . '">Generar PDF</a>';

        }
    } else {
        echo '<p>No hay detalles de pedidos de almacén para este pedido.</p>';
    }
} else {
    $query_pedidos = "SELECT id_almacen, nombre FROM pedido_almacen";
    $result_pedidos = mysqli_query($conexion, $query_pedidos);

    if ($result_pedidos->num_rows > 0) {
        echo '<form action="" method="post">';
        echo '<label for="pedido">Selecciona un pedido:</label>';
        echo '<select name="pedido" id="pedido">';
        while ($row_pedido = $result_pedidos->fetch_assoc()) {
            echo '<option value="' . $row_pedido["nombre"] . '">' . $row_pedido["nombre"] . '</option>';
        }
        echo '</select>';
        echo '<input type="submit" value="Mostrar Detalles del Pedido">';
        echo '</form>';
    } else {
        echo "No se encontraron pedidos de almacen.";
    }
}

mysqli_close($conexion);
?>
