<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="procesoeditar.css">

    <title>Editar Pedido</title>
</head>
<body>
<?php
$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pedido_id'])) {
    $pedido_id = $_POST['pedido_id'];

    // Array con los nombres de los productos
    $productos = array(
        'aceite', 'ajo_deshidratado', 'arroz', 'arvejas', 'azucar', 'cacao', 'choclo', 'chocolate','comino',' dulce_de_batata', 'dulce_de_membrillo', 'fecula', 'fideos_guiseros', 'fideos_tallarines', 'flan','harina_de_maiz',' huevos', 'laurel', 'lentejas', 
        'maicena', 'maiz_molido',' malta', 'manteca', 'oregano', 'perejil', 'pimenton', 'porotos', 'provenzal', 'pure_de_tomate','sal_fina', 'sal_gruesa', 'tomate_triturado', 'trigo_burgol',' vinagre', 'leche', 'queso_cremoso',' queso_rallar',  'queso_senda','yogur', 'otro_producto', 'colacion_producto'
    );

    

    // Actualizar los valores de los productos en la base de datos
    $update_query = "UPDATE pedido_almacen SET ";

    foreach ($productos as $producto) {
        if (isset($_POST[$producto])) {
            $cantidad = $_POST[$producto];
            $update_query .= "$producto = '$cantidad', ";
        }
    }

    // Quitar la coma y el espacio extra al final de la consulta
    $update_query = rtrim($update_query, ", ");

    $update_query .= " WHERE id_almacen = '$pedido_id'";

    if (mysqli_query($conexion, $update_query)) {
        echo '<div class="success-message">Se han guardado los cambios exitosamente.</div>';
    } else {
        echo '<div class="error-message">Ocurrió un error al guardar los cambios: ' . mysqli_error($conexion) . '</div>';
    }

    // Agregar el botón para volver a la página verpedidoalmacen.php
    echo '<a href="verpedidoalmacen.php" class="back-button">Volver</a>';
}


mysqli_close($conexion);
?>

</body>
</html>