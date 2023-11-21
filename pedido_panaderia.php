<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Colegios</title>
    <link rel="stylesheet" type="text/css" href="pedidoP.css">

</head>
<body>
    <h1>PEDIDO DE PANADERIA</h1>

    <?php
    $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

    $query_colegios = "SELECT id_colegio, nombre FROM colegio";
    $result_colegios = mysqli_query($conexion, $query_colegios);

    if ($result_colegios->num_rows > 0) {
        echo '<form action="" method="post">';
        echo '<label for="colegio">Selecciona un colegio:</label>';
        echo '<select name="colegio" id="colegio">';
        while ($row_colegio = $result_colegios->fetch_assoc()) {
            echo '<option value="' . $row_colegio["nombre"] . '">' . $row_colegio["nombre"] . '</option>';
        }
        echo '</select>';
        echo '<input type="submit" value="Mostrar Pedidos">';
        echo '</form>';
    } else {
        echo "No se encontraron colegios.";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['colegio'])) {
        $colegio_nombre = $_POST['colegio'];

        $query_pedidos = "SELECT * FROM pedidos_panaderia WHERE nombre = '$colegio_nombre'";
        $result_pedidos = mysqli_query($conexion, $query_pedidos);

        if ($result_pedidos->num_rows > 0) {
            echo '<h2>Pedidos de panaderia para el Colegio</h2>';
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Fecha Pedido</th><th>facturas</th><th>entrega facturas</th><th>pan criollo</th><th>entrega pan criollo</th><th>pan de leche</th><th>entrega pan de leche</th><th>pan frances</th><th>entrega pan frances</th><th>pan rallado</th><th>entrega pan rallado</th><th>otros productos</th><th>entrega de otros productos</th></tr>';

            while ($row_pedido = $result_pedidos->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . (isset($row_pedido['id_panaderia']) ? $row_pedido['id_panaderia'] : '') . '</td>';
                echo '<td>' . $row_pedido['fecha_pedido'] . '</td>';
                echo '<td>' . $row_pedido['facturas'] . '</td>';
                echo '<td>' . $row_pedido['fecha_entrega_facturas'] . '</td>';
                echo '<td>' . $row_pedido['pan_criollo'] . '</td>';
                echo '<td>' . $row_pedido['fecha_entrega_pan_criollo'] . '</td>';
                echo '<td>' . $row_pedido['pan_de_leche'] . '</td>';
                echo '<td>' . $row_pedido['fecha_entrega_pan_de_leche'] . '</td>';
                echo '<td>' . $row_pedido['pan_frances'] . '</td>';
                echo '<td>' . $row_pedido['fecha_entrega_pan_frances'] . '</td>';
                echo '<td>' . $row_pedido['pan_rallado'] . '</td>';
                echo '<td>' . $row_pedido['fecha_entrega_pan_rallado'] . '</td>';
                echo '<td>' . $row_pedido['otros_productos'] . '</td>';
                echo '<td>' . $row_pedido['fecha_entrega_otros_productos'] . '</td>';
                echo '<td><a href="editar_pedidopanaderia.php?id=' . (isset($row_pedido['id_panaderia']) ? $row_pedido['id_panaderia'] : '') . '">Editar</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No hay pedidos de panaderia para este colegio.</p>';
        }
    }

    mysqli_close($conexion);
    ?>
</body>
</html>
