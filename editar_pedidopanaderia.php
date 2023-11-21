<?php
$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_pedido = $_GET['id'];

    // Utilizamos una consulta preparada para evitar problemas de seguridad
    $query_pedido = "SELECT * FROM pedidos_panaderia WHERE id_panaderia = ?";
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
    <link rel="stylesheet" type="text/css" href="editarP.css">

</head>
<body>
    <h1>Editar Pedido de Verdulería</h1>

    <?php
    if (isset($row_pedido)) {
        ?>
        <form action="actualizar_pedidopanaderia.php" method="post">
            <input type="hidden" name="id_panaderia" value="<?php echo $row_pedido['id_panaderia']; ?>">

            <label for="fecha_pedido">Fecha del Pedido:</label>
            <input type="text" name="fecha_pedido" value="<?php echo $row_pedido['fecha_pedido']; ?>" required>

            <label for="facturas">facturas:</label>
            <input type="text" name="facturas" value="<?php echo $row_pedido['facturas']; ?>">

            <label for="fecha_entrega_facturas">entrega de facturas:</label>
            <input type="text" name="fecha_entrega_facturas" value="<?php echo $row_pedido['fecha_entrega_facturas']; ?>" required>

            <label for="pan_criollo">pan criollo:</label>
            <input type="text" name="pan_criollo" value="<?php echo $row_pedido['pan_criollo']; ?>">

            <label for="fecha_entrega_pan_criollo">entrega de pan criollo:</label>
            <input type="text" name="fecha_entrega_pan_criollo" value="<?php echo $row_pedido['fecha_entrega_pan_criollo']; ?>" required>

            <label for="pan_de_leche">pan de leche:</label>
            <input type="text" name="pan_de_leche" value="<?php echo $row_pedido['pan_de_leche']; ?>">

            <label for="fecha_entrega_pan_de_leche">entrega de pan de leche:</label>
            <input type="text" name="fecha_entrega_pan_de_leche" value="<?php echo $row_pedido['fecha_entrega_pan_de_leche']; ?>" required>


            <label for="pan_frances">pan frances:</label>
            <input type="text" name="pan_frances" value="<?php echo $row_pedido['pan_frances']; ?>">

            <label for="fecha_entrega_pan_frances">entrega de pan frances:</label>
            <input type="text" name="fecha_entrega_pan_frances" value="<?php echo $row_pedido['fecha_entrega_pan_frances']; ?>" required>


            <label for="pan_rallado">pan rallado:</label>
            <input type="text" name="pan_rallado" value="<?php echo $row_pedido['pan_rallado']; ?>">

            <label for="fecha_entrega_pan_rallado">entrega de pan rallado:</label>
            <input type="text" name="fecha_entrega_pan_rallado" value="<?php echo $row_pedido['fecha_entrega_pan_rallado']; ?>" required>


            <label for="otros_productos">Otros Productos:</label>
            <input type="text" name="otros_productos" value="<?php echo $row_pedido['otros_productos']; ?>">

           
            <label for="fecha_entrega_otros_productos">entrega de otros productos (opcional)</label>
            <input type="text" name="fecha_entrega_otros_productos" value="<?php echo $row_pedido['fecha_entrega_otros_productos']; ?>">


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
