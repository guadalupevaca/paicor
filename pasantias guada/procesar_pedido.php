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
$conexion = mysqli_connect("localhost", "root", "", "pasantias") or exit("No se puede conectar a la base de datos.");

// Obtener los datos del formulario
$carne_molida = mysqli_real_escape_string($conexion, $_POST['carne_molida']);
$carne_picada = mysqli_real_escape_string($conexion, $_POST['carne_picada']);
$costeletas = mysqli_real_escape_string($conexion, $_POST['costeletas']);
$agujas = mysqli_real_escape_string($conexion, $_POST['Agujas']);
$bifes = mysqli_real_escape_string($conexion, $_POST['Bifes']);
$pechuga_pollo = mysqli_real_escape_string($conexion, $_POST['pechuga_pollo']);
$alita_pollo = mysqli_real_escape_string($conexion, $_POST['alita_pollo']);

// Puedes realizar cualquier procesamiento adicional de los datos aquí, como almacenarlos en una base de datos.

// Crear la consulta SQL para insertar los datos en la tabla de registros de pedidos
$sql = "INSERT INTO pedidos (carne_molida, carne_picada, costeletas, agujas, bifes, pechuga_pollo, alita_pollo) 
        VALUES ('$carne_molida', '$carne_picada', '$costeletas', '$agujas', '$bifes', '$pechuga_pollo', '$alita_pollo')";

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