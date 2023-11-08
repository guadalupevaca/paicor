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
        <h1>Datos del Pedido de Limpieza</h1>
    </header>
    <?php
    if ($formularioData) {
        // Muestra los datos del formulario
        echo "<ul>";

        if (isset($formularioData["bolsas_consorcio"])) {
            echo "<li>Bolsas de Consorcio (90x60): " . $formularioData["bolsas_consorcio"] . "</li>";
        } else {
            echo "<li>Bolsas de Consorcio (90x60) : No se ingresó valor</li>";
        }

        if (isset($formularioData["lavandina"])) {
            echo "<li>Lavandina: " . $formularioData["lavandina"] . "</li>";
        } else {
            echo "<li>Lavandina : No se ingresó valor</li>";
        }

        if (isset($formularioData["detergente"])) {
            echo "<li>Detergente: " . $formularioData["detergente"] . "</li>";
        } else {
            echo "<li>Detergente : No se ingresó valor</li>";
        }
         
        if (isset($formularioData["desengrasante"])) {
            echo "<li>desengrasante: " . $formularioData["desengrasante"] . "</li>";
        } else {
            echo "<li>Desengrasante : No se ingresó valor</li>";
        }

        if (isset($formularioData["desinfectante"])) {
            echo "<li>desinfectante: " . $formularioData["desinfectante"] . "</li>";
        } else {
            echo "<li>desinfectante : No se ingresó valor</li>";
        }

        if (isset($formularioData["valerinas"])) {
            echo "<li>valerinas: " . $formularioData["valerinas"] . "</li>";
        } else {
            echo "<li>valerinas : No se ingresó valor</li>";
        }

        if (isset($formularioData["alcohol"])) {
            echo "<li> alcohol : " . $formularioData["alcohol"] . "</li>";
        } else {
            echo "<li> alcohol : No se ingresó valor</li>";
        }

        if (isset($formularioData["escobillon"])) {
            echo "<li>: escobillon " . $formularioData["escobillon"] . "</li>";
        } else {
            echo "<li> escobillon : No se ingresó valor</li>";
        }

        if (isset($formularioData["secador_piso"])) {
            echo "<li>: secador_piso " . $formularioData["secador_piso"] . "</li>";
        } else {
            echo "<li> secador piso : No se ingresó valor</li>";
        }

        if (isset($formularioData["baldes"])) {
            echo "<li>: baldes " . $formularioData["baldes"] . "</li>";
        } else {
            echo "<li>baldes : No se ingresó valor</li>";
        }

        if (isset($formularioData["esponja"])) {
            echo "<li>: esponja " . $formularioData["esponja"] . "</li>";
        } else {
            echo "<li> esponja : No se ingresó valor</li>";
        }

        if (isset($formularioData["fosforos"])) {
            echo "<li>: fosforos " . $formularioData["fosforos"] . "</li>";
        } else {
            echo "<li>fosforos : No se ingresó valor</li>";
        }

        if (isset($formularioData["otros_productos"])) {
            echo "<li>:otros productos " . $formularioData["otros_productos"] . "</li>";
        } else {
            echo "<li>otros productos : No se ingresó valor</li>";
        }

        if (isset($formularioData["fecha_pedido"])) {
            echo "<li>:fecha pedido " . $formularioData["fecha_pedido"] . "</li>";
        } else {
            echo "<li>fecha pedido : No se ingresó valor</li>";
        }



        // Repite este bloque if para cada campo del formulario

        echo "</ul>";
    } else {
        echo "No se encontraron datos del formulario.";
    }
    ?>
    <a href="generar_pdf.php">Descargar PDF</a>
</body>
</html>
