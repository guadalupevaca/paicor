<!DOCTYPE html>
<html>
<head>
    <title>Confirmación de Pedido</title>
    <link rel="stylesheet" type="text/css" href="confirmacion.css"> <!-- Puedes enlazar tu hoja de estilos personalizada aquí -->
</head>
<body>
    <h1>Confirmación de Pedido</h1>
   <p>Enviar pedidos al proveedor que corresponde</p>

    <ul>
        <!-- Opción para pedidos de carne -->
        <li>
            <a href="https://api.whatsapp.com/send?phone=3513872015&text=Envío del PDF de Pedidos de Carne" target="_blank">Enviar a Carnicería</a>
        </li>

        <!-- Opción para pedidos de almacén -->
        <li>
            <a href="https://api.whatsapp.com/send?phone=3516847538&text=Envío del PDF de Pedidos de Almacén" target="_blank">Enviar a Almacén</a>
        </li>

        <!-- Opción para pedidos de limpieza -->
        <li>
            <a href="https://api.whatsapp.com/send?phone=NUMERO_LIMPIEZA&text=Envío del PDF de Pedidos de Limpieza" target="_blank">Enviar a Limpieza</a>
        </li>
    </ul>

    <p>Haz clic en el enlace correspondiente al departamento al que deseas enviar el PDF.</p>

    <a href="pedidos.php">Volver a la Página Principal</a>

    <footer>
    </footer>
</body>
</html>
