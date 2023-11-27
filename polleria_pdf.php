<?php
require_once('pdf/tcpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pedido'])) {
    $pedido_nombre = $_POST['pedido'];

    $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

    $query_pedidos = "SELECT * FROM pedidos_polleria WHERE nombre = '$pedido_nombre'";
    $result_pedidos = mysqli_query($conexion, $query_pedidos);

    if ($result_pedidos->num_rows > 0) {
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Establece el tamaño de fuente
        $pdf->SetFont('helvetica', '', 16);

        $pdf->SetCreator('PDF Generator');
        $pdf->SetTitle('Detalles del Pedido de Limpieza - ' . $pedido_nombre);
        $pdf->SetHeaderData('', 0, 'Detalles del Pedido de polleria - ' . $pedido_nombre, '');

        $pdf->setHeaderFont(Array('helvetica', '', 12));
        $pdf->setFooterFont(Array('helvetica', '', 10));

        $pdf->AddPage();

        $html = '<h2>Detalles del Pedido de polleria - ' . $pedido_nombre . '</h2>';

        while ($row_pedido = $result_pedidos->fetch_assoc()) {
            $html .= '<p>ID Polleria: ' . $row_pedido['id_polleria'] . '</p>';
            $html .= '<p>milanesa de pollo: ' . $row_pedido['milanesa_pollo'] . '</p>';
            $html .= '<p>fecha entrega milanesa de pollo: ' . $row_pedido['fecha_entrega_milanesa_pollo'] . '</p>';
            $html .= '<p>pollo: ' . $row_pedido['pollo'] . '</p>';
            $html .= '<p>Feecha entrega pollo: ' . $row_pedido['fecha_entrega_pollo'] . '</p>';
            $html .= '<p><a href="editar_pedidopolleria.php?id=' . (isset($row_pedido['id_polleria']) ? $row_pedido['id_polleria'] : '') . '">Editar</a></p>';
        }

        $pdf->writeHTML($html);
        $pdf->Output('Detalles_polleria_' . $pedido_nombre . '.pdf', 'D');

    } else {
        echo '<p>No hay detalles de pedidos de polleria para este pedido.</p>';
    }

    mysqli_close($conexion);
} else {
    $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

    $query_pedidos = "SELECT id_polleria, nombre FROM pedidos_polleria";
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
        echo "No se encontraron pedidos de polleria.";
    }

    mysqli_close($conexion);
}
?>
