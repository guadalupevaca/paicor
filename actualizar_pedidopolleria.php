<?php
$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_polleria'])) {
    $id_polleria= $_POST['id_polleria'];
    $milanesa_pollo = $_POST['milanesa_pollo'];
    $fecha_entrega_milanesa_pollo = $_POST['fecha_entrega_milanesa_pollo'];
    $pollo = $_POST['pollo'];
    $fecha_entrega_pollo = $_POST['fecha_entrega_pollo'];
   
    
    
    $update_query = "UPDATE pedidos_polleria SET 
        milanesa_pollo = '$milanesa_pollo',
        fecha_entrega_milanesa_pollo = '$fecha_entrega_milanesa_pollo',
        pollo = '$pollo',
        fecha_entrega_pollo = '$fecha_entrega_pollo'
        WHERE id_polleria = $id_polleria";


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