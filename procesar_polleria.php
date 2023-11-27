<?php
// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $password = $_POST["clave"]; // Asumiendo que el campo de contraseña en el formulario se llama 'clave'

    // Conexión a la base de datos (reemplaza con tus credenciales)
    $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Verificar la contraseña asociada al colegio seleccionado
    $query = "SELECT clave FROM colegio WHERE nombre = '$nombre'";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $correctPassword = $row['clave'];

        // Comparar la contraseña ingresada con la contraseña almacenada en la base de datos
        if ($password === $correctPassword) {
            // Contraseña correcta, proceder a insertar el pedido en la tabla de carnicería

    
    $nombre = $_POST["nombre"];
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
    $insert_query = "INSERT INTO pedidos_polleria (nombre, milanesa_pollo, fecha_entrega_milanesa_pollo, pollo, fecha_entrega_pollo) 
        VALUES ('$nombre', '$milanesa_pollo', '$fecha_entrega_milanesa_pollo', '$pollo', '$fecha_entrega_pollo')";

    if ($conexion->query($insert_query) === TRUE) {
        echo "Pedido ingresado exitosamente.";

        
                // Mostrar los detalles del pedido
                echo '<h2>Detalles del Pedido:</h2>';
                echo '<ul>';

                // Verificar y mostrar solo los productos que se han pedido

                if (!empty($milanesa_pollo)) {
                    echo "<li>Milanesa de Pollo: $milanesa_pollo (Entrega el $fecha_entrega_milanesa_pollo)</li>";
                }

                if (!empty($pollo)) {
                    echo "<li>Pollo: $pollo (Entrega el $fecha_entrega_pollo)</li>";
                }

                
                echo '</ul>';
    } else {
        echo "Error al ingresar el pedido: " . $conexion->error;
    }
} else {
    // Contraseña incorrecta
    echo '<div class="error-message">Contraseña incorrecta. Verifica tu selección.</div>';
}
} else {
echo '<div class="error-message">Error al obtener la contraseña del colegio.</div>';
}

    $conexion->close();
} else {
    echo "Acceso no autorizado.";
}
?>