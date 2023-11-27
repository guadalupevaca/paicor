<?php
$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_pedido = $_GET['id'];

    // Utilizamos una consulta preparada para evitar problemas de seguridad
    $query_pedido = "SELECT * FROM pedidos_polleria WHERE id_polleria = ?";
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
    <link rel="stylesheet" type="text/css" href="editar.css">

</head>
<body>
    <h1>Editar Pedido de Verdulería</h1>

    <?php
    if (isset($row_pedido)) {
        ?>
        <form action="actualizar_pedidopolleria.php" method="post">
            <input type="hidden" name="id_polleria" value="<?php echo $row_pedido['id_polleria']; ?>">

            <label for="milanesa_pollo">milanesa de pollo:</label>
            <input type="text" name="milanesa_pollo" value="<?php echo $row_pedido['milanesa_pollo']; ?>">

            <label for="fecha_entrega_milanesa_pollo">entrega milanesa de pollo:</label>
            <input type="text" name="fecha_entrega_milanesa_pollo" value="<?php echo $row_pedido['fecha_entrega_milanesa_pollo']; ?>" required>

            <label for="pollo">pollo:</label>
            <input type="text" name="pollo" value="<?php echo $row_pedido['pollo']; ?>">

           
            <label for="fecha_entrega_pollo">entrega de pollo</label>
            <input type="text" name="fecha_entrega_pollo" value="<?php echo $row_pedido['fecha_entrega_pollo']; ?>" required>
            
           
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
