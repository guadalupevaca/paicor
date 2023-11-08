<?php
require 'vendor/autoload.php'; // Asegúrate de que el archivo autoload.php apunte a la ubicación correcta

use Dompdf\Dompdf;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Obtén los datos almacenados en la variable de sesión
    session_start();
    $formularioData = isset($_SESSION["formulario_data"]) ? $_SESSION["formulario_data"] : null;

    if ($formularioData) {
        // Crea una instancia de Dompdf
        $dompdf = new Dompdf();

        // Genera el contenido HTML con los datos del formulario
        $content = '<h1>Datos del Pedido de la panaderia</h1>';
        $content .= '<ul>';
        foreach ($formularioData as $key => $value) {
            $content .= "<li>$key: $value</li>";
        }
        $content .= '</ul>';

        // Carga el contenido HTML en Dompdf
        $dompdf->loadHtml($content);

        // Establece opciones de formato
        $dompdf->setPaper('A4', 'portrait');

        // Genera el PDF
        $dompdf->render();

        // Descarga el PDF
        $dompdf->stream('formulario.pdf', array('Attachment' => 0));
    } else {
        echo "No se encontraron datos del formulario.";
    }
} else {
    echo "Método no permitido.";
}
?>