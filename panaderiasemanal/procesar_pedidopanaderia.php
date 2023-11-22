<?php
session_start();

// Verifica si se envían datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesa y guarda los datos del formulario en una variable de sesión
    $_SESSION["formulario_data_panaderia"] = $_POST;

    // Redirige al usuario a la página de visualización de datos
    header("Location: mostrar_dato1.php");
    exit();
}

$conexion = mysqli_connect("localhost", "root", "", "pasantias") or die("No se puede conectar a la base de datos.");

// Verifica si hay datos almacenados en la sesión
if (isset($_SESSION["formulario_data_panaderia"])) {
    $datos = $_SESSION["formulario_data_panadria"];

    // Escapa los valores para evitar inyecciones SQL
    foreach ($datos as $clave => $valor) {
        $datos[$clave] = mysqli_real_escape_string($conexion, $valor);
    }

    $fechaPedido = $datos['fecha_pedido'];
    $facturas = $datos['facturas'];
    $pan_criollo = $datos['pan_criollo'];
    $pan_de_leche = $datos['pan_de_leche'];
    $pan_frances = $datos['pan_france'];
    $pan_rallado = $datos['pan_rallado'];
    $otrosProductos = $datos['otros_productos'];

    $sql = "INSERT INTO pedidos_panaderia (fecha_pedido, facturas, pan_criollo, pan_de_leche, pan_frances, pan_rallado, otros_productos)
            VALUES ('$fechaPedido', '$facturas', '$pan_criollo', '$pan_de_leche', '$pan_frances', '$pan_rallado', '$otrosProductos')";

    if (mysqli_query($conexion, $sql)) {
        echo '<div class="success-message">Pedido enviado.</div>';
        echo '<a href="mostrar_dato1.php" class="btn">Ver detalles del pedido</a>';
    } else {
        echo '<div class="error-message">Error al registrar el pedido: ' . mysqli_error($conexion) . '</div>';
    }
} else {
    echo "No se enviarán datos.";
}

mysqli_close($conexion);
?>
