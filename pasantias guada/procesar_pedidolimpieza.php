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
$escoba = mysqli_real_escape_string($conexion, $_POST['escoba']);
$balde = mysqli_real_escape_string($conexion, $_POST['balde']);
$trapo_de_piso = mysqli_real_escape_string($conexion, $_POST['trapo_de_piso']);
$ciff = mysqli_real_escape_string($conexion, $_POST['ciff']);
$detergente = mysqli_real_escape_string($conexion, $_POST['detergente']);
$lavandina = mysqli_real_escape_string($conexion, $_POST['lavandina']);
$perfumina = mysqli_real_escape_string($conexion, $_POST['perfumina']);
$guantes = mysqli_real_escape_string($conexion, $_POST['guantes']);

// Puedes realizar cualquier procesamiento adicional de los datos aquí, como almacenarlos en una base de datos.

// Crear la consulta SQL para insertar los datos en la tabla de registros de pedidos
$sql = "INSERT INTO pedidos_limpieza (escoba, balde, trapo_de_piso, ciff, detergente, lavandina, perfumina,  guantes) 
        VALUES ('$escoba', '$balde', '$trapo_de_piso', '$ciff', '$detergente', '$lavandina', '$perfumina', '$guantes')";

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