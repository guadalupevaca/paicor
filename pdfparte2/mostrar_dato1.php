<?php
session_start(); // Inicia la sesión

// Verifica si hay datos almacenados en la variable de sesión
$formularioData = isset($_SESSION["formulario_data"]) ? $_SESSION["formulario_data"] : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Agrega tus etiquetas meta y enlaces CSS según sea necesario -->
</head>
<body>
    <header>
        <h1>Datos del Pedido de panaderia</h1>
    </header>
    <?php
    if ($formularioData) {
        // Muestra los datos del formulario
        echo "<ul>";

        if (isset($formularioData["facturas"])) {
            echo "<li>facturas : " . $formularioData["facturas"] . "</li>";
        } else {
            echo "<li>facturas : No se ingresó valor</li>";
        }

        if (isset($formularioData["pan_criollo"])) {
            echo "<li>pan_criollo: " . $formularioData["pan_criollo"] . "</li>";
        } else {
            echo "<li>pan_criollo : No se ingresó valor</li>";
        }

        if (isset($formularioData["pan_de_leche"])) {
            echo "<li>pan_de_leche: " . $formularioData["pan_de_leche"] . "</li>";
        } else {
            echo "<li>pan_de_leche: No se ingresó valor</li>";
        }
         
        if (isset($formularioData["pan_frances"])) {
            echo "<li>pan_frances: " . $formularioData["pan_frances"] . "</li>";
        } else {
            echo "<li>pan_frances: No se ingresó valor</li>";
        }

        if (isset($formularioData["pan_rallado"])) {
            echo "<li>pan_rallado: " . $formularioData["pan_rallado"] . "</li>";
        } else {
            echo "<li>pan_rallado : No se ingresó valor</li>";
        }

        if (isset($formularioData["otros_productos"])) {
            echo "<li>otros_productos: " . $formularioData["otros_productos"] . "</li>";
        } else {
            echo "<li>otros_productos : No se ingresó valor</li>";
        }

        if (isset($formularioData["fecha_pedido"])) {
            echo "<li>fecha_pedido : " . $formularioData["fecha_pedido"] . "</li>";
        } else {
            echo "<li>fecha_pedido : No se ingresó valor</li>";
        }

        // Repite este bloque if para cada campo del formulario

        echo "</ul>";
    } else {
        echo "No se encontraron datos del formulario.";
    }
    ?>
    <a href="generar_pdf1.php">Descargar PDF</a>
</body>
</html>
