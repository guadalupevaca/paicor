<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Pedidos de Limpieza</title>
</head>
<body>
    <h1>PEDIDO DE LIMPIEZA</h1>

    <?php
    $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

    $query_colegios = "SELECT id_limpieza, nombre FROM pedidos_limpieza";
    $result_colegios = mysqli_query($conexion, $query_colegios);

    if ($result_colegios->num_rows > 0) {
        echo '<form action="" method="post">';
        echo '<label for="pedido">Selecciona un pedido:</label>';
        echo '<select name="pedido" id="pedido">';
        while ($row_pedido = $result_colegios->fetch_assoc()) {
            echo '<option value="' . $row_pedido["nombre"] . '">' . $row_pedido["nombre"] . '</option>';
        }
        echo '</select>';
        echo '<input type="submit" value="Mostrar Detalles del Pedido">';
        echo '</form>';
    } else {
        echo "No se encontraron pedidos de limpieza.";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pedido'])) {
        $pedido_nombre = $_POST['pedido'];

        $query_pedidos = "SELECT * FROM pedidos_limpieza WHERE nombre = '$pedido_nombre'";
        $result_pedidos = mysqli_query($conexion, $query_pedidos);

        if ($result_pedidos->num_rows > 0) {
            echo '<h2>Detalles del Pedido de Limpieza</h2>';
            echo '<table border="1">';
            echo '<tr><th>ID limpieza</th><th>Fecha Pedido</th><th>Bolsas Consorcio</th><th>Lavandina</th><th>Detergente</th><th>Desengrasante</th><th>Desinfectante</th><th>Valerinas</th><th>Alcohol</th><th>Escobillón</th><th>Secador Pisos</th><th>Trapo Piso</th><th>Baldes</th><th>Esponja</th><th>Fósforos</th><th>Otros Productos</th></tr>';

            while ($row_pedido = $result_pedidos->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row_pedido['id_limpieza'] . '</td>';
                echo '<td>' . $row_pedido['fecha_pedido'] . '</td>';
                echo '<td>' . $row_pedido['bolsas_consorcio'] . '</td>';
                echo '<td>' . $row_pedido['lavandina'] . '</td>';
                echo '<td>' . $row_pedido['detergente'] . '</td>';
                echo '<td>' . $row_pedido['desengrasante'] . '</td>';
                echo '<td>' . $row_pedido['desinfectante'] . '</td>';
                echo '<td>' . $row_pedido['valerinas'] . '</td>';
                echo '<td>' . $row_pedido['alcohol'] . '</td>';
                echo '<td>' . $row_pedido['escobillon'] . '</td>';
                echo '<td>' . $row_pedido['secador_pisos'] . '</td>';
                echo '<td>' . $row_pedido['trapo_piso'] . '</td>';
                echo '<td>' . $row_pedido['baldes'] . '</td>';
                echo '<td>' . $row_pedido['esponja'] . '</td>';
                echo '<td>' . $row_pedido['fosforos'] . '</td>';
                echo '<td>' . $row_pedido['otros_productos'] . '</td>';
                echo '<td><a href="editar_limpieza.php?id=' . (isset($row_pedido['id_limpieza']) ? $row_pedido['id_limpieza'] : '') . '">Editar</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No hay detalles de pedidos de limpieza para este pedido.</p>';
        }
    }

    mysqli_close($conexion);
    ?>
</body>
</html>
