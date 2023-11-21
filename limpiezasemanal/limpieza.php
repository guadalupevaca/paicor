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
        <h1>Calendario Semanal de Pedidos de Limpieza</h1>
    </header>
    <form action="procesar_pedidolimpieza.php" method="POST">
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

    <form action="procesar_pedidolimpieza.php" method="POST">

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
                <td><label for="bolsas_consorcio">Bolsas de Consorcio (90x60):</label></td>
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td><input type="text" name="bolsas_consorcio_<?php echo $i; ?>"></td>
                <?php } ?>
            </tr>

            <tr>
                <td><label for="lavandina">Lavandina:</label></td>
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td><input type="text" name="lavandina_<?php echo $i; ?>"></td>
                <?php } ?>
            </tr>
            
            <tr>
                <td><label for="detergente">detergente:</label></td>
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td><input type="text" name="detergente_<?php echo $i; ?>"></td>
                <?php } ?>
            </tr>

            
            <tr>
                <td><label for="desengrasante">desengrasante:</label></td>
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td><input type="text" name="desengrasante_<?php echo $i; ?>"></td>
                <?php } ?>
            </tr>
            
            <tr>
                <td><label for="desinfectante">desicfectante para pisos(perfumina):</label></td>
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td><input type="text" name="desinfectante_<?php echo $i; ?>"></td>
                <?php } ?>
            </tr>

            
            <tr>
                <td><label for="valerinas">valerinas:</label></td>
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td><input type="text" name="valerinas_<?php echo $i; ?>"></td>
                <?php } ?>
            </tr>
            
            <tr>
                <td><label for="alcohol">alcohol:</label></td>
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td><input type="text" name="alcohol_<?php echo $i; ?>"></td>
                <?php } ?>
            </tr>

            
            <tr>
                <td><label for="escobillon">escobillon:</label></td>
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td><input type="text" name="escobillon_<?php echo $i; ?>"></td>
                <?php } ?>
            </tr>

            
            <tr>
                <td><label for="secador_pisos">secador de pisos:</label></td>
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td><input type="text" name="secador_pisos_<?php echo $i; ?>"></td>
                <?php } ?>
            </tr>
            <tr>
                <td><label for="trapo_piso">trapo de piso:</label></td>
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td><input type="text" name="trapo_piso_<?php echo $i; ?>"></td>
                <?php } ?>
            </tr>
            <tr>
                <td><label for="baldes">baldes:</label></td>
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td><input type="text" name="baldes_<?php echo $i; ?>"></td>
                <?php } ?>
            </tr>
            <tr>
                <td><label for="esponja">esponja:</label></td>
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td><input type="text" name="esponja_<?php echo $i; ?>"></td>
                <?php } ?>
            </tr>
            <tr>
                <td><label for="fosforos">fosforos:</label></td>
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td><input type="text" name="fosforos_<?php echo $i; ?>"></td>
                <?php } ?>
            </tr>

            <tr>
                <td><label for="otros_productos">otros productos adicionales:</label></td>
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <td><input type="text" name="otros_productos_<?php echo $i; ?>"></td>
                <?php } ?>
            </tr>






            <!-- Repite lo mismo para los demás productos -->

        </table>

        <input type="submit" value="Guardar pedidos">
    </form>
</body>
</html>
