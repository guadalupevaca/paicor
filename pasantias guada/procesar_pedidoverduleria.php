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
</html>
<?php
// Conectar a la base de datos (ajusta los datos de conexión según tu configuración)
$conexion = mysqli_connect("localhost", "root", "", "pasantias") or exit("No se puede conectar a la base de datos.");

// Obtener los datos del formulario para las verduras
$papas = mysqli_real_escape_string($conexion, $_POST['papas']);
$tomate = mysqli_real_escape_string($conexion, $_POST['tomate']);
$cebolla = mysqli_real_escape_string($conexion, $_POST['cebolla']);
$zanahoria = mysqli_real_escape_string($conexion, $_POST['zanahoria']);
$choclo = mysqli_real_escape_string($conexion, $_POST['Choclo']);
$zapallitos = mysqli_real_escape_string($conexion, $_POST['zapallitos']);
$calabacin = mysqli_real_escape_string($conexion, $_POST['Calabacin']);
$lechuga = mysqli_real_escape_string($conexion, $_POST['lechuga']);
$acelga = mysqli_real_escape_string($conexion, $_POST['Acelga']);
$berenjena = mysqli_real_escape_string($conexion, $_POST['Berenjena']);
$espinaca = mysqli_real_escape_string($conexion, $_POST['espinaca']);


// Puedes realizar cualquier procesamiento adicional de los datos aquí, como almacenarlos en una base de datos.

// Crear la consulta SQL para insertar los datos en la tabla de registros de pedidos de verduras
$sql = "INSERT INTO pedidos_verduras (papas, tomate, cebolla, zanahoria, choclo, zapallitos, calabacin, lechuga, acelga, berenjena, espinaca) 
        VALUES ('$papas', '$tomate', '$cebolla', '$zanahoria', '$choclo', '$zapallitos', '$calabacin', '$lechuga', '$acelga', '$berenjena', '$espinaca')";

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
