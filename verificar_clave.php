<!DOCTYPE html>
<html>
<head>
    <title>Verificar Clave</title>
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

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
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
    <h1>Verificar Clave</h1>

    <?php
    // Verifica si se proporcionó un ID de colegio válido en la URL
    if (isset($_GET['id_colegio'])) {
        $id_colegio = $_GET['id_colegio'];
    } else {
        echo "ID de colegio no válido.";
        die();
    }

    // Verifica si se ha enviado un formulario con la clave
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recupera la clave ingresada en el formulario
        $clave_ingresada = $_POST['clave'];

        // Conexión a la base de datos (reemplaza con tus credenciales)
        $host = "localhost";
        $usuario = "root";
        $contrasena = "";
        $bd = "paicor";
        $conexion = new mysqli($host, $usuario, $contrasena, $bd);

        if ($conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $conexion->connect_error);
        }

        // Consulta para obtener la clave del colegio
        $query = "SELECT clave FROM colegio WHERE id_colegio = $id_colegio";
        $result = $conexion->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $clave = $row["clave"];

            // Verifica la clave
            if ($clave_ingresada == $clave) {
                // Redirecciona al enlace del colegio
                header("Location: a.php");
            } else {
                echo "Clave incorrecta. Inténtalo de nuevo.";
            }
        } else {
            echo "ID de colegio no válido.";
        }

        $conexion->close();
    } else {
        echo "<form method='post'>";
        echo "Clave: <input type='password' name='clave'>";
        echo "<input type='submit' value='Verificar'>";
        echo "</form>";
    }
    ?>

</body>
</html>
