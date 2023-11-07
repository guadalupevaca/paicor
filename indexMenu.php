<!DOCTYPE html>
<html>
<head>
    <title>Listado de Colegios</title>
    <style>
        /* Estilo para los enlaces como botones */
        a {
            display: inline-block;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            background-color: #3498db; /* Color de fondo del botón */
            color: #fff; /* Color del texto del botón */
            border: 1px solid #3498db; /* Borde del botón */
            border-radius: 5px; /* Bordes redondeados */
            margin: 5px; /* Espacio entre botones */
        }

        a:hover {
            background-color: #2980b9; /* Cambiar color de fondo al pasar el ratón */
        }

        
    </style>
    
</head>
<body>
    <h1>Listado de Colegios</h1>

    <?php
    
    $host = "localhost";
    $usuario = "root";
    $contrasena = "";
    $bd = "paicor";
    $conexion = new mysqli($host, $usuario, $contrasena, $bd);

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    
    $query = "SELECT id_colegio, nombre, clave FROM colegio";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_colegio = $row["id_colegio"];
            $nombre = $row["nombre"];
           

            echo "<p><a href='verificar_clave.php?id_colegio=$id_colegio'>$nombre</a></p>";
        }
    } else {
        echo "No se encontraron colegios.";
    }

    $conexion->close();
    ?>

</body>
</html>
