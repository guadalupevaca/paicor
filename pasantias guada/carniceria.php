<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="pedidocarne.css">
    <title>Pedido de Carnicería y Pollería</title>
</head>
<body>
<header>
    <h1>Pedido de Carnicería y Pollería</h1>
</header>
<form action="procesar_pedido.php" method="POST">
    <div class="carniceria">
        <h2>Carnicería</h2>
        <label for="carne_cerdo">Carne de Cerdo:</label>
        <input type="text" name="carne_cerdo"><br>

        <label for="carne_horno">Carne para Horno:</label>
        <input type="text" name="carne_horno"><br>

        <label for="carne_salsa">Carne para Salsa:</label>
        <input type="text" name="carne_salsa"><br>

        <label for="carne_molida">Carne Molida:</label>
        <input type="text" name="carne_molida"><br>

        <label for="milanesa_vaca">Milanesa de Vaca:</label>
        <input type="text" name="milanesa_vaca"><br>
    </div>

    <div class="polleria">
        <h2>Pollería</h2>
        <label for="milanesa_pollo">Milanesa de Pollo:</label>
        <input type="text" name="milanesa_pollo"><br>

        <label for="pollo">Pollo:</label>
        <input type="text" name="pollo"><br>
    </div>

    <label for="otros_productos">Otros Productos Adicionales:</label>
    <textarea name="otros_productos" rows="4" cols="50"></textarea><br>

    <label for="fecha_pedido">Fecha del Pedido:</label>
    <input type="date" name="fecha_pedido"><br>

    <input type="submit" value="Guardar pedido">
</form>
</body>
</html>
