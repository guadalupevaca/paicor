<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Puede ser "localhost" si está en el mismo servidor
$username = "root";
$password = "";
$database = "pasantias";

// Establecer la conexión

session_start(); // Inicia la sesión (asegúrate de iniciarla en ambas páginas)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesa y guarda los datos del formulario en una variable de sesión
    $_SESSION["formulario_data"] = $_POST;

    // Redirige al usuario a la página de visualización de datos
    header("Location: mostrar_dato2.php");
} else {
    echo "No se enviaron datos.";
}
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Recopilar datos del formulario
$acelga = $_POST["acelga"];
$ajo = $_POST["ajo"];
$bananas = $_POST["bananas"];
$calabacin = $_POST["calabacin"];
$cebolla = $_POST["cebolla"];
$limon = $_POST["limon"];
$mandarinas = $_POST["mandarinas"];
$manzanas = $_POST["manzanas"];
$naranjas = $_POST["naranjas"];
$papas = $_POST["papas"];
$pimientos = $_POST["pimientos"];
$remolachas = $_POST["remolachas"];
$tomate = $_POST["tomate"];
$zanahorias = $_POST["zanahorias"];
$zapallito = $_POST["zapallito"];
$zapallos = $_POST["zapallos"];
$cajon_estacion = $_POST["cajon_estacion"];
$otros_productos = $_POST["otros_productos"];
$fecha_pedido = $_POST["fecha_pedido"];

// Preparar la sentencia SQL para insertar los datos en la tabla
$sql = "INSERT INTO pedidos_verduleria (acelga, ajo, bananas, calabacin, cebolla, limon, mandarinas, manzanas, naranjas, papas, pimientos, remolachas, tomate, zanahorias, zapallito, zapallos, cajon_estacion, otros_productos, fecha_pedido) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar una declaración
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Asociar los parámetros con los valores
    $stmt->bind_param("iiiiiiiiiiiiiiiiiss", $acelga, $ajo, $bananas, $calabacin, $cebolla, $limon, $mandarinas, $manzanas, $naranjas, $papas, $pimientos, $remolachas, $tomate, $zanahorias, $zapallito, $zapallos, $cajon_estacion, $otros_productos, $fecha_pedido);

    // Ejecutar la declaración
    if ($stmt->execute()) {
        echo "Pedido guardado en la base de datos.";
    } else {
        echo "Error al guardar el pedido en la base de datos: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    echo "Error en la preparación de la sentencia SQL: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
