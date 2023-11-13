<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Pedido de Verdulería</title>
</head>
<body>
<header>

    
    <h1>Pedido de Verdulería</h1>
</header>
<form action="pedido_verduleria.php" method="POST">
    
    <label for="nombre">Colegio:</label>
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
    <label for="acelga">Acelga:</label>
    <input type="text" name="acelga"><br>

    <label for="ajo">Ajo:</label>
    <input type="text" name="ajo"><br>

    <label for="bananas">Bananas:</label>
    <input type="text" name="bananas"><br>

    <label for="calabacin">Calabacin:</label>
    <input type="text" name="calabacin"><br>

    <label for="acelga">acelga:</label>
    <input type="text" name="acelga"><br>

    <label for="espinaca">espinaca:</label>
    <input type="text" name="espinaca"><br>

    <label for="lechuga">lechuga:</label>
    <input type="text" name="lechuga"><br>

    <label for="cebolla">Cebolla:</label>
    <input type="text" name="cebolla"><br>

    <label for="limon">Limón:</label>
    <input type="text" name="limon"><br>

    <label for="mandarinas">Mandarinas:</label>
    <input type="text" name="mandarinas"><br>

    <label for="manzanas">Manzanas:</label>
    <input type="text" name="manzanas"><br>

    <label for="naranjas">Naranjas:</label>
    <input type="text" name="naranjas"><br>

    <label for="papas">Papas:</label>
    <input type="text" name="papas"><br>

    <label for="pimientos">Pimientos:</label>
    <input type="text" name="pimientos"><br>

    <label for="remolachas">Remolachas:</label>
    <input type="text" name="remolachas"><br>

    <label for="tomate">Tomate:</label>
    <input type="text" name="tomate"><br>

    <label for="zanahoria">Zanahoria:</label>
    <input type="text" name="zanahoria"><br>

    <label for="zapallitos">Zapallitos:</label>
    <input type="text" name="zapallitos"><br>

    <label for="zapallos">Zapallos:</label>
    <input type="text" name="zapallos"><br>

    <label for="choclo">choclo:</label>
    <input type="text" name="choclo"><br>

    <label for="berenjena">berenjena:</label>
    <input type="text" name="berenjena"><br>

    <label for="cajon_estacion">Cajón de Estación:</label>
    <input type="text" name="cajon_estacion"><br>

    <label for="otros_productos">Otros Productos Adicionales:</label>
    <textarea name="otros_productos" rows="4" cols="50"></textarea><br>

    <label for="fecha_pedido">Fecha del Pedido:</label>
    <input type="date" name="fecha_pedido"><br>
    

    <input type="submit" value="Guardar pedido">
</form>
</body>
</html>