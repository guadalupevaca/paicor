<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <title>Calendario Semanal de Pedidos</title>
</head>
<body>
<header>
    <h1>Calendario Semanal de Pedidos</h1>
</header>
<form action="procesar_pedidopanaderia.php" method="POST">
        <label for="nombre">Colegio:</label>
        <select name="nombre" id="nombre" required>
            <?php
           $conexion = mysqli_connect("localhost", "root", "", "pasantias") or die("No se puede conectar a la base de datos.");

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


<form action="procesar_pedidopanaderia.php" method="POST">
    <label for="fecha_inicio">Fecha de Inicio:</label>
    <input type="date" name="fecha_inicio" required><br>

    <table>
        <tr>
            <th>Productos</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </tr>

        <tr>
            <td><label for="facturas">Facturas:</label></td>
            <?php for ($i = 0; $i < 5; $i++) { ?>
                <td><input type="text" name="facturas_<?php echo $i; ?>"></td>
            <?php } ?>
        </tr>

        <tr>
            <td><label for="pan_criollo">pan_criollo:</label></td>
            <?php for ($i = 0; $i < 5; $i++) { ?>
                <td><input type="text" name="pan_criollo_<?php echo $i; ?>"></td>
            <?php } ?>
        </tr>

        <tr>
            <td><label for="pan_de_leche">pan_de_leche:</label></td>
            <?php for ($i = 0; $i < 5; $i++) { ?>
                <td><input type="text" name="pandeleche_<?php echo $i; ?>"></td>
            <?php } ?>
        </tr>

        <tr>
            <td><label for="pan_frances">pan_frances:</label></td>
            <?php for ($i = 0; $i < 5; $i++) { ?>
                <td><input type="text" name="pan_frances_<?php echo $i; ?>"></td>
            <?php } ?>
        </tr>

        <tr>
            <td><label for="pan_rallado">pan_rallado:</label></td>
            <?php for ($i = 0; $i < 5; $i++) { ?>
                <td><input type="text" name="pan_rallado_<?php echo $i; ?>"></td>
            <?php } ?>
        </tr>

        <tr>
            <td><label for="otros">otros:</label></td>
            <?php for ($i = 0; $i < 5; $i++) { ?>
                <td><input type="text" name="otros_<?php echo $i; ?>"></td>
            <?php } ?>
        </tr>

        <!-- Repite lo mismo para los demás productos -->

    </table>

    <input type="submit" value="Guardar pedidos">
</form>

</body>
</html>
