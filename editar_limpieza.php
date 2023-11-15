<?php
$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_pedido = $_GET['id'];

    // Utilizamos una consulta preparada para evitar problemas de seguridad
    $query_pedido = "SELECT * FROM pedidos_limpieza WHERE id_limpieza = ?";
    $stmt = mysqli_prepare($conexion, $query_pedido);

    // Vinculamos el parámetro
    mysqli_stmt_bind_param($stmt, "i", $id_pedido);

    // Ejecutamos la consulta preparada
    mysqli_stmt_execute($stmt);

    // Obtenemos el resultado
    $result_pedido = mysqli_stmt_get_result($stmt);

    if ($result_pedido->num_rows > 0) {
        $row_pedido = $result_pedido->fetch_assoc();
    } else {
        echo "Pedido no encontrado.";
        exit;
    }
} else {
    echo "ID de pedido no proporcionado.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Pedido</title>
</head>
<body>
    <h1>Editar Pedido de Verdulería</h1>

    <?php
    if (isset($row_pedido)) {
        ?>
        <form action="actualizar_limpieza.php" method="post">
            <input type="hidden" name="id_limpieza" value="<?php echo $row_pedido['id_limpieza']; ?>">

            <label for="fecha_pedido">Fecha del Pedido:</label>
            <input type="text" name="fecha_pedido" value="<?php echo $row_pedido['fecha_pedido']; ?>" required>

            <label for="bolsas_consorcio">Bolsas de Consorcio:</label>
            <input type="text" name="bolsas_consorcio" value="<?php echo $row_pedido['bolsas_consorcio']; ?>">

            <label for="lavandina">Lavandina:</label>
            <input type="text" name="lavandina" value="<?php echo $row_pedido['lavandina']; ?>">

            <label for="detergente">Detergente:</label>
            <input type="text" name="detergente" value="<?php echo $row_pedido['detergente']; ?>">

            <label for="desengrasante">Desengrasante:</label>
            <input type="text" name="desengrasante" value="<?php echo $row_pedido['desengrasante']; ?>">

            <label for="desinfectante">Desinfectante:</label>
            <input type="text" name="desinfectante" value="<?php echo $row_pedido['desinfectante']; ?>">

            <label for="valerinas">valerinas:</label>
            <input type="text" name="valerinas" value="<?php echo $row_pedido['valerinas']; ?>">

            <label for="alcohol">alcohol:</label>
            <input type="text" name="alcohol" value="<?php echo $row_pedido['alcohol']; ?>">

            <label for="escobillon">escobillon:</label>
            <input type="text" name="escobillon" value="<?php echo $row_pedido['escobillon']; ?>">

            <label for="secador_pisos">secador_pisos:</label>
            <input type="text" name="secador_pisos" value="<?php echo $row_pedido['secador_pisos']; ?>">

            <label for="trapo_pisos">trapo_pisos:</label>
            <input type="text" name="trapo_pisos" value="<?php echo $row_pedido['trapo_pisos']; ?>">

            <label for="esponja">esponja:</label>
            <input type="text" name="esponja" value="<?php echo $row_pedido['esponja']; ?>">

            <label for="baldes">baldes:</label>
            <input type="text" name="baldes" value="<?php echo $row_pedido['baldes']; ?>">

            <label for="fosforos">fosforos:</label>
            <input type="text" name="fosforos" value="<?php echo $row_pedido['fosforos']; ?>">

            <label for="otros_productos">otros productos:</label>
            <input type="text" name="otros_productos" value="<?php echo $row_pedido['otros_productos']; ?>">

            <input type="submit" value="Actualizar Pedido">
        </form>
        <?php
    }
    ?>

</body>
</html>

<?php
mysqli_close($conexion);
?>
