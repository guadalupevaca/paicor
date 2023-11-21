<?php
session_start();

// Verifica si se envían datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesa y guarda los datos del formulario en una variable de sesión
    $_SESSION["formulario_data_limpieza"] = $_POST;

    // Redirige al usuario a la página de visualización de datos
    header("Location: mostrar_dato_limpieza.php");
    exit();
}

$conexion = mysqli_connect("localhost", "root", "", "pasantias") or die("No se puede conectar a la base de datos.");

// Verifica si hay datos almacenados en la sesión
if (isset($_SESSION["formulario_data_limpieza"])) {
    $datos = $_SESSION["formulario_data_limpieza"];

    // Escapa los valores para evitar inyecciones SQL
    foreach ($datos as $clave => $valor) {
        $datos[$clave] = mysqli_real_escape_string($conexion, $valor);
    }

    $fechaPedido = $datos['fecha_pedido'];
    $bolsasConsorcio = $datos['bolsas_consorcio'];
    $lavandina = $datos['lavandina'];
    $detergente = $datos['detergente'];
    $desengrasante = $datos['desengrasante'];
    $desinfectante = $datos['desinfectante'];
    $valerinas = $datos['valerinas'];
    $alcohol = $datos['alcohol'];
    $escobillon = $datos['escobillon'];
    $secadorPisos = $datos['secador_pisos'];
    $trapoPiso = $datos['trapo_piso'];
    $baldes = $datos['baldes'];
    $esponja = $datos['esponja'];
    $fosforos = $datos['fosforos'];
    $otrosProductos = $datos['otros_productos'];

    $sql = "INSERT INTO pedidos_limpieza (fecha_pedido, bolsas_consorcio, lavandina, detergente, desengrasante, desinfectante, valerinas, alcohol, escobillon, secador_pisos, trapo_piso, baldes, esponja, fosforos, otros_productos)
            VALUES ('$fechaPedido', '$bolsasConsorcio', '$lavandina', '$detergente', '$desengrasante', '$desinfectante', '$valerinas', '$alcohol', '$escobillon', '$secadorPisos', '$trapoPiso', '$baldes', '$esponja', '$fosforos', '$otrosProductos')";

    if (mysqli_query($conexion, $sql)) {
        echo '<div class="success-message">Pedido enviado.</div>';
        echo '<a href="mostrar_dato_limpieza.php" class="btn">Ver detalles del pedido</a>';
    } else {
        echo '<div class="error-message">Error al registrar el pedido: ' . mysqli_error($conexion) . '</div>';
    }
} else {
    echo "No se enviarán datos.";
}

mysqli_close($conexion);
?>
