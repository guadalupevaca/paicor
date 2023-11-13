<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Colegios</title>
</head>
<body>
    <h1>PEDIDO DE VERDULERÍA</h1>

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

        $query_pedidos = "SELECT * FROM pedidos_verduras WHERE nombre = '$colegio_nombre'";
        $result_pedidos = mysqli_query($conexion, $query_pedidos);

        if ($result_pedidos->num_rows > 0) {
            echo '<h2>Pedidos de Verdulería para el Colegio</h2>';
            echo '<table border="1">';
            echo '<tr><th>ID Pedido</th><th>Fecha Pedido</th><th>Papas</th><th>Tomate</th><th>Cebolla</th><th>Zanahoria</th><th>Choclo</th><th>Zapallitos</th><th>Calabacin</th><th>Lechuga</th><th>Acelga</th><th>Berenjena</th><th>Espinaca</th><th>Otros Productos</th><th>Acciones</th></tr>';

            while ($row_pedido = $result_pedidos->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row_pedido['id_verduleria'] . '</td>';
                echo '<td>' . $row_pedido['fecha_pedido'] . '</td>';
                echo '<td>' . $row_pedido['papas'] . '</td>';
                echo '<td>' . $row_pedido['tomate'] . '</td>';
                echo '<td>' . $row_pedido['cebolla'] . '</td>';
                echo '<td>' . $row_pedido['zanahoria'] . '</td>';
                echo '<td>' . $row_pedido['choclo'] . '</td>';
                echo '<td>' . $row_pedido['zapallitos'] . '</td>';
                echo '<td>' . $row_pedido['calabacin'] . '</td>';
                echo '<td>' . $row_pedido['lechuga'] . '</td>';
                echo '<td>' . $row_pedido['acelga'] . '</td>';
                echo '<td>' . $row_pedido['berenjena'] . '</td>';
                echo '<td>' . $row_pedido['espinaca'] . '</td>';
                echo '<td>' . $row_pedido['otros_productos'] . '</td>';
                echo '<td><a href="editar_pedidoverduleria.php?id=' . $row_pedido['id_verduleria'] . '">Editar</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No hay pedidos de verdulería para este colegio.</p>';
        }
    }

    mysqli_close($conexion);
    ?>
</body>
</html>
