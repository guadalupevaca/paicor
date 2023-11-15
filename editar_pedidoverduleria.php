<?php
$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_pedido = $_GET['id'];

    // Utilizamos una consulta preparada para evitar problemas de seguridad
    $query_pedido = "SELECT * FROM pedidos_verduras WHERE id_verduleria = ?";
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
        <form action="actualizar_pedidoverduleria.php" method="post">
            <input type="hidden" name="id_pedido" value="<?php echo $row_pedido['id_verduleria']; ?>">

            <label for="fecha_pedido">Fecha del Pedido:</label>
            <input type="text" name="fecha_pedido" value="<?php echo $row_pedido['fecha_pedido']; ?>" required>

            <label for="papas">Papas:</label>
            <input type="text" name="papas" value="<?php echo $row_pedido['papas']; ?>">

            <label for="tomate">Tomate:</label>
            <input type="text" name="tomate" value="<?php echo $row_pedido['tomate']; ?>">

            <label for="cebolla">Cebolla:</label>
            <input type="text" name="cebolla" value="<?php echo $row_pedido['cebolla']; ?>">

            <label for="zanahoria">Zanahoria:</label>
            <input type="text" name="zanahoria" value="<?php echo $row_pedido['zanahoria']; ?>">

            <label for="choclo">Choclo:</label>
            <input type="text" name="choclo" value="<?php echo $row_pedido['choclo']; ?>">

            <label for="zapallitos">Zapallitos:</label>
            <input type="text" name="zapallitos" value="<?php echo $row_pedido['zapallitos']; ?>">

            <label for="calabacin">Calabacín:</label>
            <input type="text" name="calabacin" value="<?php echo $row_pedido['calabacin']; ?>">

            <label for="lechuga">Lechuga:</label>
            <input type="text" name="lechuga" value="<?php echo $row_pedido['lechuga']; ?>">

            <label for="acelga">Acelga:</label>
            <input type="text" name="acelga" value="<?php echo $row_pedido['acelga']; ?>">

            <label for="berenjena">Berenjena:</label>
            <input type="text" name="berenjena" value="<?php echo $row_pedido['berenjena']; ?>">

            <label for="espinaca">Espinaca:</label>
            <input type="text" name="espinaca" value="<?php echo $row_pedido['espinaca']; ?>">

            <label for="otros_productos">Otros Productos:</label>
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
