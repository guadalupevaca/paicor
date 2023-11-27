<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="carniceria.css">
    <title>Pedido de Carnicería</title>
</head>
<body>
    <header>
        <h1>Pedido de Carnicería </h1>
    </header>

    <form action="procesar_polleria.php" method="POST">
        <label for="nombre">Colegio:</label>
        <select name="nombre" id="nombre" required>
            <?php
           $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

            if ($conexion->connect_error) {
                die("Error de conexión a la base de datos: " . $conexion->connect_error);
            }

            // Consulta para obtener los nombres de los colegios
            $query = "SELECT nombre FROM colegio";
            $result = $conexion->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay colegios disponibles</option>";
            }

            $conexion->close();
            ?>
        </select>

        <div class="polleria">
            

            <label for="clave">Contraseña del Colegio:</label>
            <input type="clave" name="clave" required><br>

            <label for="milanesa_pollo">milanesa de pollo:</label>
            <input type="text" name="milanesa_pollo"><br>
            <input type="date" name="fecha_entrega_milanesa_pollo"><br>

            <label for="´pollo">pollo:</label>
            <input type="text" name="pollo"><br>
            <input type="date" name="fecha_entrega_pollo"><br>

            <label for="fecha_pedido">Fecha del Pedido:</label>
            <input type="date" name="fecha_pedido"><br>

            <input type="submit" value="Guardar pedido">
        </form>
</body>
</html>
