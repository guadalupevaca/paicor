<?php
$conexion = mysqli_connect("localhost", "root", "", "pasantias") or die("No se puede conectar a la base de datos.");


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_pedido = $_GET['id'];

    $query_pedido = "SELECT * FROM pedidos_verduras WHERE id_verduleria = $id_pedido";
    $result_pedido = mysqli_query($conexion, $query_pedido);

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
            <input type="text" name="papas" value="<?php echo $row_pedido['papas']; ?>" required>

            <label for="tomate">Tomate:</label>
            <input type="text" name="tomate" value="<?php echo $row_pedido['tomate']; ?>" required>

            <label for="cebolla">Cebolla:</label>
            <input type="text" name="cebolla" value="<?php echo $row_pedido['cebolla']; ?>" required>

            <label for="zanahoria">Zanahoria:</label>
            <input type="text" name="zanahoria" value="<?php echo $row_pedido['zanahoria']; ?>" required>

            <label for="choclo">Choclo:</label>
            <input type="text" name="choclo" value="<?php echo $row_pedido['choclo']; ?>" required>

            <label for="zapallitos">Zapallitos:</label>
            <input type="text" name="zapallitos" value="<?php echo $row_pedido['zapallitos']; ?>" required>

            <label for="calabacin">Calabacín:</label>
            <input type="text" name="calabacin" value="<?php echo $row_pedido['calabacin']; ?>" required>

            <label for="lechuga">Lechuga:</label>
            <input type="text" name="lechuga" value="<?php echo $row_pedido['lechuga']; ?>" required>

            <label for="acelga">Acelga:</label>
            <input type="text" name="acelga" value="<?php echo $row_pedido['acelga']; ?>" required>

            <label for="berenjena">Berenjena:</label>
            <input type="text" name="berenjena" value="<?php echo $row_pedido['berenjena']; ?>" required>

            <label for="espinaca">Espinaca:</label>
            <input type="text" name="espinaca" value="<?php echo $row_pedido['espinaca']; ?>" required>

            <label for="otros_productos">Otros Productos:</label>
            <input type="text" name="otros_productos" value="<?php echo $row_pedido['otros_productos']; ?>" required>

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
