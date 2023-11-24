<?php
// Incluir la biblioteca TCPDF
require_once('pdf/tcpdf.php');

// Verificar si se ha enviado el formulario y se ha seleccionado un pedido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pedido'])) {
    // Obtener el nombre del pedido seleccionado
    $pedido_nombre = $_POST['pedido'];

    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

    // Consulta para obtener detalles del pedido seleccionado
    $query_pedido = "SELECT * FROM pedido_almacen WHERE nombre = '$pedido_nombre'";
    $result_pedido = mysqli_query($conexion, $query_pedido);

    // Verificar si hay resultados
    if ($result_pedido->num_rows > 0) {
        // Crear una instancia de TCPDF
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Establecer el tamaño de fuente
        $pdf->SetFont('helvetica', '', 16);

        // Configuración del encabezado
        $pdf->SetCreator('PDF Generator');
        $pdf->SetTitle('Detalles del Pedido de Almacén - ' . $pedido_nombre);
        $pdf->SetHeaderData('', 0, 'Detalles del Pedido de Almacén - ' . $pedido_nombre, '');

        $pdf->setHeaderFont(Array('helvetica', '', 12));
        $pdf->setFooterFont(Array('helvetica', '', 10));

        // Agregar una página al PDF
        $pdf->AddPage();

        // Construir el contenido HTML del PDF
        $html = '<h2>Detalles del Pedido de Almacén - ' . $pedido_nombre . '</h2>';

        // Iterar sobre los resultados de la consulta
        while ($row_pedido = $result_pedido->fetch_assoc()) {
            $html .= '<h3>Nombre del Colegio: ' . $row_pedido['nombre'] . '</h3>';
            $html .= '<h4>ID Pedido: ' . $row_pedido['id_almacen'] . '</h4>';
            $html .= '<h4>Fecha Pedido: ' . $row_pedido['fecha_pedido'] . '</h4>';

            $html .= '<table border="1" style="margin-bottom: 20px;">';
            $html .= '<tr><th>Producto</th><th>Cantidad</th></tr>';

            // Definir una lista de productos
            $productos = array(
                'aceite', 'ajo_deshidratado', 'arroz', 'arvejas', 'azucar', 'cacao', 'choclo', 'chocolate',
                'comino', 'dulce_de_batata', 'dulce_de_membrillo', 'fecula', 'fideos_guiseros', 'fideos_tallarines',
                'flan', 'harina_de_maiz', 'huevos', 'laurel', 'lentejas', 'maicena', 'maiz_molido', 'malta',
                'manteca', 'oregano', 'perejil', 'pimenton', 'porotos', 'provenzal', 'pure_de_tomate', 'sal_fina',
                'sal_gruesa', 'tomate_triturado', 'trigo_burgol', 'vinagre', 'leche', 'queso_cremoso', 'queso_rallar',
                'queso_senda', 'yogur', 'otro_producto', 'colacion_producto'
            );

            // Iterar sobre la lista de productos y cantidades
            foreach ($productos as $producto) {
                $cantidad = $row_pedido[$producto];
                if ($cantidad > 0) {
                    $html .= '<tr><td>' . $producto . '</td><td>' . $cantidad . '</td></tr>';
                }
            }

            $html .= '</table>';
        }

        // Escribir el contenido HTML en el PDF
        $pdf->writeHTML($html);

        // Descargar el PDF con un nombre específico
        $pdf->Output('Detalles_Pedido_Almacen_' . $pedido_nombre . '.pdf', 'D');
    } else {
        // Mostrar mensaje si no hay detalles de pedidos para el pedido seleccionado
        echo '<p>No hay detalles de pedidos de almacén para este pedido.</p>';
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
} else {
    // Mostrar formulario si no se ha enviado el formulario
    $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

    // Consulta para obtener la lista de pedidos de almacén
    $query_pedidos = "SELECT id_almacen, nombre FROM pedido_almacen";
    $result_pedidos = mysqli_query($conexion, $query_pedidos);

    // Verificar si hay resultados
    if ($result_pedidos->num_rows > 0) {
        // Mostrar formulario de selección de pedidos
        echo '<form action="" method="post">';
        echo '<label for="pedido">Selecciona un pedido:</label>';
        echo '<select name="pedido" id="pedido">';

        // Iterar sobre la lista de pedidos y agregar opciones al menú desplegable
        while ($row_pedido = $result_pedidos->fetch_assoc()) {
            echo '<option value="' . $row_pedido["nombre"] . '">' . $row_pedido["nombre"] . '</option>';
        }

        echo '</select>';
        echo '<input type="submit" value="Mostrar Detalles del Pedido">';

        // Enlace para ir a otra página
        echo '<p><a href="confirmacion.php">Ir a Otra Página</a></p>';

        echo '</form>';
    } else {
        // Mostrar mensaje si no se encontraron pedidos de almacén
        echo "No se encontraron pedidos de almacen.";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
