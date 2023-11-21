<?php
// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los valores del formulario
    $nombre = $_POST["nombre"];
    $fecha_pedido = $_POST["fecha_pedido"];
    $carne_cerdo = $_POST["carne_cerdo"];
    $fecha_entrega_carne_cerdo =$_POST["fecha_entrega_carne_cerdo"];
    $carne_horno = $_POST["carne_horno"];
    $fecha_entrega_carne_horno =$_POST["fecha_entrega_carne_horno"];
    $carne_salsa = $_POST["carne_salsa"];
    $fecha_entrega_carne_salsa =$_POST["fecha_entrega_carne_salsa"];
    $carne_molida = $_POST["carne_molida"];
    $fecha_entrega_carne_molida =$_POST["fecha_entrega_carne_molida"];
    $milanesa_vaca = $_POST["milanesa_vaca"];
    $fecha_entrega_milanesa_vaca =$_POST["fecha_entrega_milanesa_vaca"];
    $milanesa_pollo = $_POST["milanesa_pollo"];
    $fecha_entrega_milanesa_pollo =$_POST["fecha_entrega_milanesa_pollo"];
    $pollo = $_POST["pollo"];
    $fecha_entrega_pollo =$_POST["fecha_entrega_pollo"];

    

    // Conexión a la base de datos (reemplaza con tus credenciales)
    $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    $id_colegio = $nombre;

    // Inserta el pedido en la tabla de carnicería
    $insert_query = "INSERT INTO pedidos_carniceria (nombre, fecha_pedido, carne_cerdo, fecha_entrega_carne_cerdo, carne_horno, fecha_entrega_carne_horno, carne_salsa, fecha_entrega_carne_salsa, carne_molida, fecha_entrega_carne_molida, milanesa_vaca, fecha_entrega_milanesa_vaca, milanesa_pollo, fecha_entrega_milanesa_pollo, pollo, fecha_entrega_pollo) 
        VALUES ('$nombre', '$fecha_pedido', '$carne_cerdo', '$fecha_entrega_carne_cerdo', '$carne_horno', '$fecha_entrega_carne_horno', '$carne_salsa', '$fecha_entrega_carne_salsa', '$carne_molida', '$fecha_entrega_carne_molida', '$milanesa_vaca', '$fecha_entrega_milanesa_vaca', '$milanesa_pollo', '$fecha_entrega_milanesa_pollo', '$pollo', '$fecha_entrega_pollo')";

    if ($conexion->query($insert_query) === TRUE) {
        echo "Pedido ingresado exitosamente.";
    } else {
        echo "Error al ingresar el pedido: " . $conexion->error;
    }

    $conexion->close();
} else {
    echo "Acceso no autorizado.";
}
?>