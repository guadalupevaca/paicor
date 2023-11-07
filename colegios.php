<!DOCTYPE html>
<html>
<head>
    <title>Listado de Colegios</title>
    <style>
        .boton-enlace {
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

        .boton-enlace:hover {
            background-color: #2980b9; /* Cambiar color de fondo al pasar el ratón */
        }
    </style>
</head>
<body>
    <h1>Listado de Colegios</h1>

    <?php
    // Arreglo asociativo de URLs para cada colegio
    $urls_colegios = array(
        1 => "colegio_1.php",
        2 => "colegio_2.php",
        3 => "colegio_3.php",
        4 => "colegio_4.php",
        5 => "colegio_5.php",
        6 => "colegio_6.php",
        7 => "colegio_7.php",
        8 => "colegio_8.php",
        9 => "colegio_9.php",
        10 => "colegio_10.php",
        11 => "colegio_11.php"
    );

    // Conexión a la base de datos (reemplaza con tus credenciales)
    $host = "localhost";
    $usuario = "root";
    $contrasena = "";
    $bd = "paicor";
    $conexion = new mysqli($host, $usuario, $contrasena, $bd);

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Consulta para obtener los colegios
    $query = "SELECT id_colegio, nombre FROM colegio";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        $botones = [];
        while ($row = $result->fetch_assoc()) {
            $id_colegio = $row["id_colegio"];
            $nombre = $row["nombre"];

            // Verifica si hay una URL asociada al colegio
            $url = array_key_exists($id_colegio, $urls_colegios) ? $urls_colegios[$id_colegio] : '#';

            $botones[] = "<a class='boton-enlace' href='$url'>$nombre</a>";
        }

        // Imprime los botones en orden inverso (desde el último al primero)
        foreach (array_reverse($botones) as $boton) {
            echo $boton;
        }
    } else {
        echo "No se encontraron colegios.";
    }

    $conexion->close();
    ?>

    <div id="nuevos-enlaces">
        <h2>Agregar nuevo enlace</h2>
        <form id="formulario-enlace">
            <label for="nombre">Nombre del colegio:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="url">URL del enlace externo:</label>
            <input type="text" id="url" name="url" required>
            <button type="button" id="agregar-enlace">Agregar Enlace</button>
        </form>
    </div>

    <!-- ... (código HTML existente) ... -->

    <script>
        document.getElementById("agregar-enlace").addEventListener("click", function() {
            var nombre = document.getElementById("nombre").value;
            var url = document.getElementById("url").value;
            
            if (nombre.trim() !== "" && url.trim() !== "") {
                var nuevoBoton = document.createElement("a");
                nuevoBoton.setAttribute("href", url);
                nuevoBoton.setAttribute("class", "boton-enlace");
                nuevoBoton.innerText = nombre;

                var enlacesDiv = document.getElementById("nuevos-enlaces");
                var primerBoton = enlacesDiv.querySelector(".boton-enlace");
                enlacesDiv.insertBefore(nuevoBoton, primerBoton);

                // Limpia los campos del formulario
                document.getElementById("nombre").value = "";
                document.getElementById("url").value = "";

                // Envía el nombre y la URL al servidor para guardarlos en la base de datos
                guardarEnlaceEnBaseDeDatos(nombre, url);
            }
        });

        function guardarEnlaceEnBaseDeDatos(nombre, url) {
            // Realiza una solicitud al servidor para guardar los datos en la base de datos
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "procesar.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Maneja la respuesta del servidor, si es necesario
                }
            };

            // Envía los datos al servidor
            var data = "nombre=" + encodeURIComponent(nombre) + "&url=" + encodeURIComponent(url);
            xhr.send(data);
        }
    </script>
</body>
</html>

</body>
</html>
