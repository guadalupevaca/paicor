<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAICOR</title>
    <!-- Estilos generales -->
    <style>
        body {
            font-family: 'Arial', sans-serif; /* Fuente principal */
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Asegura que la página ocupe al menos toda la altura de la ventana */
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 60vh; /* Altura mínima del contenido principal */
            flex-grow: 1; /* Hace que el contenido principal ocupe el espacio restante */
        }

        button {
            margin: 20px;
            padding: 15px 30px;
            font-size: 18px;
            cursor: pointer;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-family: 'Roboto', sans-serif; /* Fuente elegante para los botones */
            transition: background-color 0.3s; /* Efecto de transición al pasar el mouse */
        }

        button:hover {
            background-color: #333; /* Cambio de color al pasar el mouse sobre el botón */
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: #fff;
            margin-top: auto; /* Empuja el footer hacia la parte inferior */
        }
    </style>
    <!-- Fuente adicional para los botones -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
</head>
<body>
    <header>
        <h1>Pagina Principal del Paicor</h1>
    </header>

    <main>
        <!-- Botones con enlaces externos -->
        <button onclick="window.location.href='confirmacion.php'">Pagina de Administrador</button>
        <button onclick="window.location.href='confirmacion.php'">Pagina de Colegios</button>
    </main>

    <footer>
        Paicor -  Municipalidad de Monte Cristo
    </footer>
</body>
</html>
