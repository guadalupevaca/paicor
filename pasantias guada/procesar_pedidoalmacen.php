<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="mensaje.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html><?php
// Conectar a la base de datos (ajusta los datos de conexión según tu configuración)
$conexion = mysqli_connect("localhost", "root", "", "pasantias") or die("No se puede conectar a la base de datos.");

// Obtener los datos del formulario y asegurarte de que no estén vacíos
$fideos = mysqli_real_escape_string($conexion, $_POST['fideos']);
$aceite = mysqli_real_escape_string($conexion, $_POST['aceite']);
$fideos_largos = mysqli_real_escape_string($conexion, $_POST['fideos_largos']);
$polenta = mysqli_real_escape_string($conexion, $_POST['polenta']);
$arroz = mysqli_real_escape_string($conexion, $_POST['arroz']);
$leche = mysqli_real_escape_string($conexion, $_POST['leche']);
$huevos = mysqli_real_escape_string($conexion, $_POST['huevos']);
$arbejas = mysqli_real_escape_string($conexion, $_POST['arbejas']);
$lentejas = mysqli_real_escape_string($conexion, $_POST['lentejas']);
$pure_de_tomate = mysqli_real_escape_string($conexion, $_POST['pure_de_tomate']);

// Puedes realizar cualquier procesamiento adicional de los datos aquí, como almacenarlos en una base de datos.

// Crear la consulta SQL para insertar los datos en la tabla de registros de pedidos
$sql = "INSERT INTO almacen (fideos, aceite, fideos_largos, polenta, arroz, leche, huevos, arbejas, lentejas, pure_de_tomate) 
        VALUES ('$fideos', '$aceite', '$fideos_largos', '$polenta', '$arroz', '$leche', '$huevos', '$arbejas', '$lentejas', '$pure_de_tomate')";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) 
    if (mysqli_query($conexion, $sql)) {
        echo '<div class="success-message">Pedido enviado.</div>';
        echo '<a href="pedidos.php" class="btn">Ir a la página</a>'; // Reemplaza "tu_pagina.php" con la URL de la página a la que deseas enlazar.
    } else {
        echo '<div class="error-message">Error al registrar el pedido: ' . mysqli_error($conexion) . '</div>';
    }

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
