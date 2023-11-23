<?php
require_once('pdf/tcpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pedido'])) {
    $pedido_nombre = $_POST['pedido'];

    $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

    $query_pedido = "SELECT * FROM pedido_almacen WHERE nombre = '$pedido_nombre'";
    $result_pedido = mysqli_query($conexion, $query_pedido);

    if ($result_pedido->num_rows > 0) {
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Establece el tamaño de fuente
        $pdf->SetFont('helvetica', '', 16); // 'helvetica' es el tipo de fuente, 16 es el tamaño

        $pdf->SetCreator('PDF Generator');
        $pdf->SetTitle('Detalles del Pedido de Almacén - ' . $pedido_nombre);
        $pdf->SetHeaderData('', 0, 'Detalles del Pedido de Almacén - ' . $pedido_nombre, '');

        $pdf->setHeaderFont(Array('helvetica', '', 12));
        $pdf->setFooterFont(Array('helvetica', '', 10));

        $pdf->AddPage();

        $html = '<h2>Detalles del Pedido de Almacén - ' . $pedido_nombre . '</h2>';

        while ($row_pedido = $result_pedido->fetch_assoc()) {
            $html .= '<h3>Nombre del Colegio: ' .$row_pedido['nombre'] .'</h3>';
            $html .= '<h4>ID Pedido: ' .$row_pedido['id_almacen'] .'</h4>';
            $html .= '<h4>Fecha Pedido: ' . $row_pedido['fecha_pedido'] . '</h4>';

            $html .= '<table border="1" style="margin-bottom: 20px;">';
            $html .= '<tr><th>Producto</th><th>Cantidad</th></tr>';


            $productos = array(
                'aceite', 'ajo_deshidratado', 'arroz', 'arvejas', 'azucar', 'cacao', 'choclo', 'chocolate',
                'comino', 'dulce_de_batata', 'dulce_de_membrillo', 'fecula', 'fideos_guiseros', 'fideos_tallarines',
                'flan', 'harina_de_maiz', 'huevos', 'laurel', 'lentejas', 'maicena', 'maiz_molido', 'malta',
                'manteca', 'oregano', 'perejil', 'pimenton', 'porotos', 'provenzal', 'pure_de_tomate', 'sal_fina',
                'sal_gruesa', 'tomate_triturado', 'trigo_burgol', 'vinagre', 'leche', 'queso_cremoso', 'queso_rallar',
                'queso_senda', 'yogur', 'otro_producto', 'colacion_producto'
            );


            foreach ($productos as $producto) {
                $cantidad = $row_pedido[$producto];
                if ($cantidad > 0) {
                    $html .= '<tr><td>' . $producto . '</td><td>' . $cantidad . '</td></tr>';
                }
            }

            $html .= '</table>';
          
        }
        

        $pdf->writeHTML($html);
        $pdf->Output('Detalles_Pedido_Almacen_' . $pedido_nombre . '.pdf', 'D');
    } else {
        echo '<p>No hay detalles de pedidos de almacén para este pedido.</p>';
    }

    mysqli_close($conexion);
} else {
    $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

    $query_pedidos = "SELECT id_almacen, nombre FROM pedido_almacen";
    $result_pedidos = mysqli_query($conexion, $query_pedidos);

    if ($result_pedidos->num_rows > 0) {
        echo '<form action="" method="post">';
        echo '<label for="pedido">Selecciona un pedido:</label>';
        echo '<select name="pedido" id="pedido">';
        while ($row_pedido = $result_pedidos->fetch_assoc()) {
            echo '<option value="' . $row_pedido["nombre"] . '">' . $row_pedido["nombre"] . '</option>';
        }
        echo '</select>';
        echo '<input type="submit" value="Mostrar Detalles del Pedido">';
        echo '</form>';
    } else {
        echo "No se encontraron pedidos de almacen.";
    }

    
    mysqli_close($conexion);
}
?>
