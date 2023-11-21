<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="verduleria.css">

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
    <input type="date" name="fecha_acelga"><br>

    <label for="ajo">Ajo:</label>
    <input type="text" name="ajo"><br>
    <input type="date" name="fecha_ajo"><br>

    <label for="bananas">Bananas:</label>
    <input type="text" name="bananas"><br>
    <input type="date" name="fecha_bananas"><br>

    <label for="calabacin">Calabacin:</label>
    <input type="text" name="calabacin"><br>
    <input type="date" name="fecha_calabacin"><br>

    <label for="espinaca">espinaca:</label>
    <input type="text" name="espinaca"><br>
    <input type="date" name="fecha_espinaca"><br>

    <label for="lechuga">lechuga:</label>
    <input type="text" name="lechuga"><br>
    <input type="date" name="fecha_lechuga"><br>

    <label for="cebolla">Cebolla:</label>
    <input type="text" name="cebolla"><br>
    <input type="date" name="fecha_cebolla"><br>

    <label for="limon">Limón:</label>
    <input type="text" name="limon"><br>
    <input type="date" name="fecha_limon"><br>

    <label for="mandarinas">Mandarinas:</label>
    <input type="text" name="mandarinas"><br>
    <input type="date" name="fecha_mandarinas"><br>

    <label for="manzanas">Manzanas:</label>
    <input type="text" name="manzanas"><br>
    <input type="date" name="fecha_manzanas"><br>

    <label for="naranjas">Naranjas:</label>
    <input type="text" name="naranjas"><br>
    <input type="date" name="fecha_naranjas"><br>

    <label for="papas">Papas:</label>
    <input type="text" name="papas"><br>
    <input type="date" name="fecha_papas"><br>

    <label for="pimientos">Pimientos:</label>
    <input type="text" name="pimientos"><br>
    <input type="date" name="fecha_pimientos"><br>

    <label for="remolachas">Remolachas:</label>
    <input type="text" name="remolachas"><br>
    <input type="date" name="fecha_remolachas"><br>

    <label for="tomate">Tomate:</label>
    <input type="text" name="tomate"><br>
    <input type="date" name="fecha_tomate"><br>

    <label for="zanahoria">Zanahoria:</label>
    <input type="text" name="zanahoria"><br>
    <input type="date" name="fecha_zanahoria"><br>

    <label for="zapallitos">Zapallitos:</label>
    <input type="text" name="zapallitos"><br>
    <input type="date" name="fecha_zapallitos"><br>

    <label for="zapallos">Zapallos:</label>
    <input type="text" name="zapallos"><br>
    <input type="date" name="fecha_zapallos"><br>

    <label for="choclo">choclo:</label>
    <input type="text" name="choclo"><br>
    <input type="date" name="fecha_choclo"><br>

    <label for="berenjena">berenjena:</label>
    <input type="text" name="berenjena"><br>
    <input type="date" name="fecha_berenjena"><br>

    <label for="cajon_estacion">Cajón de Estación:</label>
    <input type="text" name="cajon_estacion"><br>
    <input type="date" name="fecha_cajon"><br>

    <label for="otros_productos">Otros Productos Adicionales:</label>
    <textarea name="otros_productos" rows="4" cols="50"></textarea><br>

    <label for="fecha_pedido">Fecha del Pedido:</label>
    <input type="date" name="fecha_pedido"><br>
    

    <input type="submit" value="Guardar pedido">
</form>
</body>
</html>