<?php
session_start(); // Inicia la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesa el formulario y almacena los datos en una variable de sesión
    $_SESSION["formulario_data"] = $_POST;

    // Redirige a la página mostrar_datos.php
    header("Location: mostrar_dato1.php");
    exit();
}
?>
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

    <input type="submit" value="guardar pedido">
</form>
</body>
</html>