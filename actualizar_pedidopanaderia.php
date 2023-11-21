<?php
$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_panaderia'])) {
    $id_panaderia= $_POST['id_panaderia'];
    $fecha_pedido = $_POST['fecha_pedido'];
    $facturas = $_POST['facturas'];
    $pan_criollo = $_POST['pan_criollo'];
    $pan_de_leche = $_POST['pan_de_leche'];
    $pan_frances = $_POST['pan_frances'];
    $pan_rallado = $_POST['pan_rallado'];
    $fecha_entrega_facturas = $_POST['fecha_entrega_facturas'];
    $fecha_entrega_pan_criollo = $_POST['fecha_entrega_pan_criollo'];
    $fecha_entrega_pan_de_leche = $_POST['fecha_entrega_pan_de_leche'];
    $fecha_entrega_pan_frances = $_POST['fecha_entrega_pan_frances'];
    $fecha_entrega_pan_rallado = $_POST['fecha_entrega_pan_rallado'];
    $otros_productos = $_POST['otros_productos'];
    $fecha_entrega_otros_productos = $_POST['fecha_entrega_otros_productos'];
    
    
    $update_query = "UPDATE pedidos_panaderia SET 
        fecha_pedido = '$fecha_pedido',
        facturas = '$facturas',
        pan_criollo = '$pan_criollo',
        pan_de_leche = '$pan_de_leche',
        pan_frances = '$pan_frances',
        pan_rallado = '$pan_rallado',
        fecha_entrega_facturas = '$fecha_entrega_facturas',
        fecha_entrega_pan_criollo = '$fecha_entrega_pan_criollo',
        fecha_entrega_pan_de_leche = '$fecha_entrega_pan_de_leche',
        fecha_entrega_pan_frances = '$fecha_entrega_pan_frances',
        fecha_entrega_pan_rallado = '$fecha_entrega_pan_rallado',
        otros_productos = '$otros_productos', 
        fecha_entrega_otros_productos = '$fecha_entrega_otros_productos'
        WHERE id_panaderia = $id_panaderia";


    if (mysqli_query($conexion, $update_query)) {
        echo "Pedido modificado con éxito.";
    } else {
        echo "Error al modificar el pedido: " . mysqli_error($conexion);
    }
} else {
    echo "Acceso no autorizado.";
}

mysqli_close($conexion);
?>