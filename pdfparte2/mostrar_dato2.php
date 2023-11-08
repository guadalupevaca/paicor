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

        if (isset($formularioData["acelga"])) {
            echo "acelga: " . $formularioData["acelga"] . "</li>";
        } else {
            echo "acelga : No se ingresó valor</li>";
        }

        if (isset($formularioData["ajo"])) {
            echo "<li>ajo: " . $formularioData["ajo"] . "</li>";
        } else {
            echo "<li>ajo : No se ingresó valor</li>";
        }

        if (isset($formularioData["bananas"])) {
            echo "<li>bananas: " . $formularioData["bananas"] . "</li>";
        } else {
            echo "<li>bananas : No se ingresó valor</li>";
        }
         
        if (isset($formularioData["calabacin"])) {
            echo "<li>calabacin: " . $formularioData["calabacin"] . "</li>";
        } else {
            echo "<li>calabacin : No se ingresó valor</li>";
        }

        if (isset($formularioData["cebolla"])) {
            echo "<li>cebolla: " . $formularioData["cebolla"] . "</li>";
        } else {
            echo "<li>cebolla : No se ingresó valor</li>";
        }

        if (isset($formularioData["limon"])) {
            echo "<li>limon: " . $formularioData["limon"] . "</li>";
        } else {
            echo "<li>limon : No se ingresó valor</li>";
        }

        if (isset($formularioData["mandarinas"])) {
            echo "<li> mandarinas : " . $formularioData["mandarinas"] . "</li>";
        } else {
            echo "<li> mandarinas : No se ingresó valor</li>";
        }

        if (isset($formularioData["manzanas"])) {
            echo "<li>: manzanas " . $formularioData["manzanas"] . "</li>";
        } else {
            echo "<li> manzanas : No se ingresó valor</li>";
        }

        if (isset($formularioData["naranjas"])) {
            echo "<li>: naranjas " . $formularioData["naranjas"] . "</li>";
        } else {
            echo "<li> naranjas : No se ingresó valor</li>";
        }

        if (isset($formularioData["papas"])) {
            echo "<li>: papas " . $formularioData["papas"] . "</li>";
        } else {
            echo "<li>papas : No se ingresó valor</li>";
        }

        if (isset($formularioData["pimientos"])) {
            echo "<li>: pimientos " . $formularioData["pimientos"] . "</li>";
        } else {
            echo "<li> pimientos : No se ingresó valor</li>";
        }

        if (isset($formularioData["remolochas"])) {
            echo "<li>: remolochas " . $formularioData["remolochas"] . "</li>";
        } else {
            echo "<li>remolochas : No se ingresó valor</li>";
        }

        if (isset($formularioData["tomate"])) {
            echo "<li>: tomate " . $formularioData["tomate"] . "</li>";
        } else {
            echo "<li> tomate : No se ingresó valor</li>";
        }

        if (isset($formularioData["zapallito"])) {
            echo "<li>: zapallito " . $formularioData["zapallito"] . "</li>";
        } else {
            echo "<li> zapallito : No se ingresó valor</li>";
        }

        if (isset($formularioData["zapallos"])) {
            echo "<li>: zapallos " . $formularioData["zapallos"] . "</li>";
        } else {
            echo "<li> zapallos : No se ingresó valor</li>";
        }

        if (isset($formularioData["cajon_estacion"])) {
            echo "<li>: cajon_estacion " . $formularioData["cajon_estacion"] . "</li>";
        } else {
            echo "<li> cajon_estacion : No se ingresó valor</li>";
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
    <a href="generar_pdf2.php">Descargar PDF</a>
</body>
</html>
