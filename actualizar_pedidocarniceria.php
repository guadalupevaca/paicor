<?php
$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_carniceria'])) {
    $id_carniceria= $_POST['id_carniceria'];
    $fecha_pedido = $_POST['fecha_pedido'];
    $carne_cerdo = $_POST['carne_cerdo'];
    $fecha_entrega_carne_cerdo = $_POST['fecha_entrega_carne_cerdo'];
    $carne_horno = $_POST['carne_horno'];
    $fecha_entrega_carne_horno = $_POST['fecha_entrega_carne_horno'];
    $carne_salsa = $_POST['carne_salsa'];
    $fecha_entrega_carne_salsa = $_POST['fecha_entrega_carne_salsa'];
    $carne_molida = $_POST['carne_molida'];
    $fecha_entrega_carne_molida = $_POST['fecha_entrega_carne_molida'];
    $milanesa_vaca = $_POST['milanesa_vaca'];
    $fecha_entrega_milanesa_vaca = $_POST['fecha_entrega_milanesa_vaca'];
    $milanesa_pollo = $_POST['milanesa_pollo'];
    $fecha_entrega_milanesa_pollo = $_POST['fecha_entrega_milanesa_pollo'];
    $pollo = $_POST['pollo'];
    $fecha_entrega_pollo = $_POST['fecha_entrega_pollo'];
   
    
    
    $update_query = "UPDATE pedidos_carniceria SET 
        fecha_pedido = '$fecha_pedido',
        carne_cerdo = '$carne_cerdo',
        fecha_entrega_carne_cerdo = '$fecha_entrega_carne_cerdo',
        carne_horno = '$carne_horno',
        fecha_entrega_carne_horno = '$fecha_entrega_carne_horno',
        carne_salsa = '$carne_salsa',
        fecha_entrega_carne_salsa = '$fecha_entrega_carne_salsa',
        carne_molida = '$carne_molida',
        fecha_entrega_carne_molida = '$fecha_entrega_carne_molida',
        milanesa_vaca = '$milanesa_vaca',
        fecha_entrega_milanesa_vaca = '$fecha_entrega_milanesa_vaca',
        milanesa_pollo = '$milanesa_pollo',
        fecha_entrega_milanesa_pollo = '$fecha_entrega_milanesa_pollo',
        pollo = '$pollo',
        fecha_entrega_pollo = '$fecha_entrega_pollo'
        WHERE id_carniceria = $id_carniceria";


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