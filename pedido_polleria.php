<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Colegios</title>
    <link rel="stylesheet" type="text/css" href="pedidoP.css">

</head>
<body>
    <h1>PEDIDO DE CARNICERIA</h1>

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

        $query_pedidos = "SELECT * FROM pedidos_polleria WHERE nombre = '$colegio_nombre'";
        $result_pedidos = mysqli_query($conexion, $query_pedidos);

        if ($result_pedidos->num_rows > 0) {
            echo '<h2>Pedidos de carniceria para el Colegio</h2>';
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>milanesa de pollo</th><th>entrega milanesa de pollo</th><th>pollo</th><th>entrega de pollo</th></tr>';

            while ($row_pedido = $result_pedidos->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . (isset($row_pedido['id_polleria']) ? $row_pedido['id_polleria'] : '') . '</td>';
                echo '<td>' . $row_pedido['milanesa_pollo'] . '</td>';
                echo '<td>' . $row_pedido['fecha_entrega_milanesa_pollo'] . '</td>';
                echo '<td>' . $row_pedido['pollo'] . '</td>';
                echo '<td>' . $row_pedido['fecha_entrega_pollo'] . '</td>';
                echo '<td><a href="editar_pedidopolleria.php?id=' . (isset($row_pedido['id_polleria']) ? $row_pedido['id_polleria'] : '') . '">Editar</a></td>';
                echo '<td><a href="polleria_pdf.php?id=' . (isset($row_pedido['nombre']) ? $row_pedido['nombre'] : '') . '">pdf</a></td>';
                echo '</tr>';

            }
            echo '</table>';
        } else {
            echo '<p>No hay pedidos de polleria para este colegio.</p>';
        }
    }

    mysqli_close($conexion);
    ?>
</body>
</html>
