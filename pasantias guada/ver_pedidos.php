<!DOCTYPE html>
<html>
<head>
    <title>Ver Pedidos de Almacén</title>
</head>
<body>
    <h1>Ver Pedidos de Almacén</h1>

    <?php
    if (isset($_GET['id_colegio'])) {
        $id_colegio = $_GET['id_colegio'];

        
        $conexion = new mysqli($host, $root, $"", $paicor);

        if ($conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $conexion->connect_error);
        }

        // Consulta para obtener los pedidos de almacén del colegio específico
        $query_pedidos = "SELECT * FROM pedido_almacen WHERE id_colegio = $id_colegio";
        $result_pedidos = $conexion->query($query_pedidos);

        if ($result_pedidos->num_rows > 0) {
            echo "<h2>Pedidos de Almacén para el Colegio ID $id_colegio:</h2>";
            echo "<table border='1'>";
            echo "<tr><th>ID Pedido</th><th>Fecha Pedido</th><th>...</th></tr>";

            while ($row_pedidos = $result_pedidos->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_pedidos["id_pedido"] . "</td>";
                echo "<td>" . $row_pedidos["fecha_pedido"] . "</td>";
                // Agrega más columnas según sea necesario
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No hay pedidos de almacén para este colegio.";
        }

        $conexion->close();
    } else {
        echo "ID de colegio no proporcionado.";
    }
    ?>
</body>
</html>
