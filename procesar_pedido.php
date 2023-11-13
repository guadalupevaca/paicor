<?php
// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los valores del formulario
    $nombre = $_POST["nombre"];
    $fecha_pedido = $_POST["fecha_pedido"];
    $carne_cerdo = $_POST["carne_cerdo"];
    $carne_horno = $_POST["carne_horno"];
    $carne_salsa = $_POST["carne_salsa"];
    $carne_molida = $_POST["carne_molida"];
    $milanesa_vaca = $_POST["milanesa_vaca"];
    $milanesa_pollo = $_POST["milanesa_pollo"];
    $pollo = $_POST["pollo"];

    // ... otros campos del formulario ...

    // Conexión a la base de datos (reemplaza con tus credenciales)
    $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    $id_colegio = $nombre;

    // Inserta el pedido en la tabla de carnicería
    $insert_query = "INSERT INTO pedidos_carniceria (nombre, fecha_pedido, carne_cerdo, carne_horno, carne_salsa, carne_molida, milanesa_vaca, milanesa_pollo, pollo) 
        VALUES ('$nombre', '$fecha_pedido', '$carne_cerdo', '$carne_horno', '$carne_salsa', '$carne_molida', '$milanesa_vaca', '$milanesa_pollo', '$pollo')";

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