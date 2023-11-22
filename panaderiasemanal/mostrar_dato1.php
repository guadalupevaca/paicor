<?php
session_start(); // Inicia la sesión

// Verifica si hay datos almacenados en la sesión
if (isset($_SESSION["formulario_data_panaderia"])) {
    $datos = $_SESSION["formulario_data_panaderia"];

    $colegio = $datos["nombre"];
    $fechaInicio = $datos["fecha_inicio"];
} else {
    // Si no hay datos, redirige a la página principal o toma otra acción apropiada
    header("Location: index.php"); // Cambia index.php al nombre de tu página principal si es diferente
    exit();
}

// Verifica si se ha enviado una solicitud para generar y descargar el PDF
if (isset($_POST["generar_pdf"])) {
    require 'vendor/autoload.php'; 

    $html = '<table>';
    $html .= '<tr>';
    $html .= '<th>Productos</th>';
    for ($i = 0; $i < 5; $i++) {
        $html .= '<th>' . obtenerNombreDia($i) . '</th>';
    }
    $html .= '</tr>';

    $productos = array(
        'facturas', 'pan_criollo', 'pan_de_leche', 'pan_frances',
        'pan_rallado', 'otros'
    );

    foreach ($productos as $producto) {
        $html .= '<tr>';
        $html .= '<td>' . ucfirst(str_replace('_', ' ', $producto)) . '</td>';
        for ($i = 0; $i < 5; $i++) {
            if (isset($datos[$producto . '_' . $i])) {
                $html .= '<td>' . $datos[$producto . '_' . $i] . '</td>';
            } else {
                $html .= '<td></td>';
            }
        }
        $html .= '</tr>';
    }
    $html .= '<p>Colegio: ' . $colegio . '</p>';
    $html .= '<p>Fecha de Inicio: ' . $fechaInicio . '</p>';
    $html .= '</table>';

    // Crea una instancia de Dompdf
    $dompdf = new Dompdf\Dompdf();

    // Carga el contenido HTML en Dompdf
    $dompdf->loadHtml($html);

    // Establece el tamaño del papel y la orientación
    $dompdf->setPaper('A4', 'landscape');

    // Renderiza el PDF
    $dompdf->render();

    // Salida del PDF al navegador
    $dompdf->stream('datos_panaderia.pdf', array('Attachment' => 0));
    exit;
}

// Función para obtener el nombre del día de la semana en español
function obtenerNombreDia($numeroDia) {
    $diasSemana = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes');
    return $diasSemana[$numeroDia];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <title>Mostrar Datos de panaderia</title>
</head>
<body>
    <header>
        <h1>Mostrar Datos de panaderia</h1>
    </header>

     <!-- Muestra el colegio y la fecha -->
    <p>Colegio: <?php echo $colegio; ?></p>
    <p>Fecha de Inicio: <?php echo $fechaInicio; ?></p>

    <!-- Imprimir los datos en una tabla similar a la del formulario -->
    <table>
        <tr>
            <th>Productos</th>
            <?php for ($i = 0; $i < 5; $i++) { ?>
                <th><?php echo obtenerNombreDia($i); ?></th>
            <?php } ?>
        </tr>

        <?php
        $productos = array(
            'facturas', 'pan_criollo', 'pan_de_leche', 'pan_frances',
            'pan_rallado', 'otros'
        );

        foreach ($productos as $producto) {
            echo '<tr>';
            echo '<td>' . ucfirst(str_replace('_', ' ', $producto)) . '</td>';
            for ($i = 0; $i < 5; $i++) {
                if (isset($datos[$producto . '_' . $i])) {
                    echo '<td>' . $datos[$producto . '_' . $i] . '</td>';
                } else {
                    echo '<td></td>';
                }
            }
            echo '</tr>';
        }
        ?>
    </table>

    <!-- Formulario para generar y descargar el PDF -->
    <?php if (!isset($_POST["generar_pdf"])) { ?>
        <form method="post" action="">
            <button type="submit" name="generar_pdf">Descargar PDF</button>
        </form>
    <?php } ?>
</body>
</html>
