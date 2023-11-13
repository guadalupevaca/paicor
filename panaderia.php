<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="panaderia.css">

    <title>Pedido de Panadería</title>
</head>
<body>
<header>
    <h1>Pedido de Panadería</h1>
</header>
<form action="procesar_pedidopanaderia.php" method="POST">
    <label for="nombre">Nombre del Colegio:</label>
    <select name="nombre" id="nombre" required>
        <?php
            $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

            $query = "SELECT nombre FROM colegio";
            $result = $conexion->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay colegios disponibles</option>";
            }

            mysqli_close($conexion);
        ?>
    </select>

    <label for="facturas">Facturas:</label>
    <input type="text" name="facturas"><br>

    <label for="pan_criollo">Pan Criollo:</label>
    <input type="text" name="pan_criollo"><br>

    <label for="pan_de_leche">Pan de Leche:</label>
    <input type="text" name="pan_de_leche"><br>

    <label for="pan_frances">Pan Francés:</label>
    <input type="text" name="pan_frances"><br>

    <label for="pan_rallado">Pan Rallado:</label>
    <input type="text" name="pan_rallado"><br>

    <label for="otros_productos">Otros Productos Adicionales:</label>
    <textarea name="otros_productos" rows="4" cols="50"></textarea><br>

    <label for="fecha_pedido">Fecha del Pedido:</label>
    <input type="date" name="fecha_pedido"><br>

    <input type="submit" value="Guardar pedido">
</form>
</body>
</html>