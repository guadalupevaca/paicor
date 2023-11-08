<?php
session_start(); // Inicia la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesa el formulario y almacena los datos en una variable de sesión
    $_SESSION["formulario_data"] = $_POST;

    // Redirige a la página mostrar_datos.php
    header("Location: mostrar_dato.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Agrega tus etiquetas meta y enlaces CSS según sea necesario -->
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



        <input type="submit" value="Enviar">
    </form>
</body>
</html>
