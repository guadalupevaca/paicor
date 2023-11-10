<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="limpieza.css">
    <title>Pedido de Limpieza</title>
</head>
<body>
<header>
    <h1>Pedido de Limpieza</h1>
</header>
<form action="procesar_pedidolimpieza.php" method="POST">
    <label for="bolsas_consorcio">Bolsas de Consorcio (90x60):</label>
    <input type="text" name="bolsas_consorcio"><br>

    <label for="lavandina">Lavandina:</label>
    <input type="text" name="lavandina"><br>

    <label for="detergente">Detergente:</label>
    <input type="text" name="detergente"><br>

    <label for="desengrasante">Desengrasante:</label>
    <input type="text" name="desengrasante"><br>

    <label for="desinfectante">Desinfectante para Pisos (Perfumina):</label>
    <input type="text" name="desinfectante"><br>

    <label for="valerinas">Valerinas:</label>
    <input type="text" name="valerinas"><br>

    <label for="alcohol">Alcohol:</label>
    <input type="text" name="alcohol"><br>

    <label for="escobillon">Escobillón:</label>
    <input type="text" name="escobillon"><br>

    <label for="secador_pisos">Secador de Pisos:</label>
    <input type="text" name="secador_pisos"><br>

    <label for="trapo_piso">Trapo de Piso:</label>
    <input type="text" name="trapo_piso"><br>

    <label for="baldes">Baldes:</label>
    <input type="text" name="baldes"><br>

    <label for="esponja">Esponja:</label>
    <input type="text" name="esponja"><br>

    <label for="fosforos">Fósforos:</label>
    <input type="text" name="fosforos"><br>

    <label for="otros_productos">Otros Productos Adicionales:</label>
    <textarea name="otros_productos" rows="4" cols="50"></textarea><br>

    <label for="fecha_pedido">Fecha del Pedido:</label>
    <input type="date" name="fecha_pedido"><br>

    <input type="submit" value="Guardar pedido">
</form>
</body>
</html>
