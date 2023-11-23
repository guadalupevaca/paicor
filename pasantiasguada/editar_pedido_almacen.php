<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido</title>
    <link rel="stylesheet" type="text/css" href="editar.css">
</head>
<body>
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $pedido_id = $_GET['id'];

        $query_pedido = "SELECT * FROM pedido_almacen WHERE id_almacen = '$pedido_id'";
        $result_pedido = mysqli_query($conexion, $query_pedido);

        if ($result_pedido->num_rows > 0) {
            $row_pedido = $result_pedido->fetch_assoc();
            echo '<h2>Editar Pedido - ' . $row_pedido['nombre'] . '</h2>';
            
            echo '<form action="procesar_edicionalmacen.php" method="post">';
            echo '<input type="hidden" name="pedido_id" value="' . $pedido_id . '">';

            // Mostrar solo los productos que tienen una cantidad mayor a cero en el pedido
            $productos = array(
                'aceite', 'ajo_deshidratado', 'arroz', 'arvejas', 'azucar', 'cacao', 'choclo', 'chocolate',
                'comino', 'dulce_de_batata', 'dulce_de_membrillo', 'fecula', 'fideos_guiseros', 'fideos_tallarines',
                'flan', 'harina_de_maiz', 'huevos', 'laurel', 'lentejas', 'maicena', 'maiz_molido', 'malta',
                'manteca', 'oregano', 'perejil', 'pimenton', 'porotos', 'provenzal', 'pure_de_tomate', 'sal_fina',
                'sal_gruesa', 'tomate_triturado', 'trigo_burgol', 'vinagre', 'leche', 'queso_cremoso', 'queso_rallar',
                'queso_senda', 'yogur', 'otro_producto', 'colacion_producto'
            );

            foreach ($productos as $producto) {
                // Verifica si el producto existe en el pedido y tiene cantidad mayor a cero
                if (isset($row_pedido[$producto]) && $row_pedido[$producto] > 0) {
                    echo '<label for="' . $producto . '">' . $producto . ':</label>';
                    echo '<input type="text" id="' . $producto . '" name="' . $producto . '" value="' . $row_pedido[$producto] . '"><br>';
                }
            }

            echo '<input type="submit" value="Guardar cambios">';
            echo '</form>';
        } else {
            echo '<p>No se encontró el pedido.</p>';
        }
    }

    mysqli_close($conexion);
    ?>
</body>
</html>
