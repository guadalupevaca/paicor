<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <style>
        body {
            background-color: #f0f7ff; /* Color de fondo celeste */
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #3498db; /* Color celeste para el título */
        }

        form {
            background-color: #fff; /* Fondo blanco para el formulario */
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #333; /* Color de etiquetas de campo */
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc; /* Borde del campo */
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #3498db; /* Color celeste para el botón */
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9; /* Cambiar color al pasar el ratón */
        }
    </style>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="post" action="procesar.php">
        <label for="clave">Contraseña:</label>
        <input type="password" name="clave" required><br>

        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
