<!DOCTYPE html>
<html>
<head>
<title>Ejemplo de Enlaces</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #enlacesContainer {
            text-align: center;
        }

        p a {
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px 20px;
            display: inline-block;
            margin: 10px;
            border-radius: 5px;
            color: #333;
            font-weight: bold;
            transition: background-color 0.2s;
        }

        p a:hover {
            background-color: #5bc0de;
            color: #fff;
        }

        p a.folder {
            background-color: #d9edf7;
        }

        p a.folder:hover {
            background-color: #5bc0de;
        }

        #agregarEnlace {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        #agregarEnlace {
            background-color: blue;
        }

        #enlacesNuevos {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Alinear los enlaces al centro */
        }
    </style>
</head>
<!DOCTYPE html>
<html>
<head>
    <title>Ejemplo de Enlaces</title>
</head>
<body>
    <p><a href="a.php" data-clave="123">Margarita Vazquez Ludueña de Lazo</a></p>
    <p><a href="#" data-clave="456">25 de Mayo</a></p>
    <p><a href="#" data-clave="789">Maestro Domingo Nogal</a></p>
    <p><a href="#" data-clave="100">IPET N 363</a></p>
    <p><a href="#" data-clave="234">IPETyM N 30</a></p>

    <div id="enlacesNuevos">
        <!-- Aquí se mostrarán los enlaces nuevos -->
    </div>

    <!-- Botón para agregar enlace -->
    <button id="agregarEnlace">Agregar colegio</button>

    <script>
        // Manejar el clic en el botón "Agregar Enlace"
        document.getElementById("agregarEnlace").addEventListener("click", function () {
            // Solicitar al usuario el nombre y la URL del nuevo enlace
            var nombre = prompt("Ingrese el nombre del enlace:");
            var url = prompt("Ingrese la URL del enlace:");

            // Crear un nuevo elemento de párrafo con el enlace
            var nuevoEnlace = document.createElement("p");
            nuevoEnlace.innerHTML = '<a href="' + url + '">' + nombre + '</a>';

            // Crear un botón para eliminar el enlace
            var eliminarBoton = document.createElement("button");
            eliminarBoton.innerHTML = "Eliminar";
            eliminarBoton.addEventListener("click", function () {
                enlacesNuevos.removeChild(nuevoEnlace);
                // Remover el enlace de la lista de enlaces guardados en el almacenamiento local
                var enlacesGuardados = JSON.parse(localStorage.getItem("misEnlaces")) || [];
                var enlaceIndex = enlacesGuardados.findIndex(function (enlace) {
                    return enlace.nombre === nombre && enlace.url === url;
                });
                if (enlaceIndex !== -1) {
                    enlacesGuardados.splice(enlaceIndex, 1);
                    localStorage.setItem("misEnlaces", JSON.stringify(enlacesGuardados));
                }
            });

            // Agregar el botón de eliminar al nuevo enlace
            nuevoEnlace.appendChild(eliminarBoton);

            // Insertar el nuevo enlace antes del botón "Agregar Enlace"
            var enlacesNuevos = document.getElementById("enlacesNuevos");
            enlacesNuevos.insertBefore(nuevoEnlace, enlacesNuevos.firstChild);

            // Guardar el enlace en el almacenamiento local
            var enlacesGuardados = JSON.parse(localStorage.getItem("misEnlaces")) || [];
            enlacesGuardados.push({ nombre: nombre, url: url });
            localStorage.setItem("misEnlaces", JSON.stringify(enlacesGuardados));
        });

        // Cargar y mostrar enlaces guardados en el almacenamiento local
        var enlacesGuardados = JSON.parse(localStorage.getItem("misEnlaces")) || [];
        var enlacesNuevos = document.getElementById("enlacesNuevos");

        enlacesGuardados.forEach(function (enlace) {
            var nuevoEnlace = document.createElement("p");
            nuevoEnlace.innerHTML = '<a href="' + enlace.url + '">' + enlace.nombre + '</a>';
            
            // Crear un botón para eliminar el enlace
            var eliminarBoton = document.createElement("button");
            eliminarBoton.innerHTML = "Eliminar";
            eliminarBoton.addEventListener("click", function () {
                enlacesNuevos.removeChild(nuevoEnlace);
                // Remover el enlace de la lista de enlaces guardados en el almacenamiento local
                var enlaceIndex = enlacesGuardados.findIndex(function (enlaceGuardado) {
                    return enlaceGuardado.nombre === enlace.nombre && enlaceGuardado.url === enlace.url;
                });
                if (enlaceIndex !== -1) {
                    enlacesGuardados.splice(enlaceIndex, 1);
                    localStorage.setItem("misEnlaces", JSON.stringify(enlacesGuardados));
                }
            });

            // Agregar el botón de eliminar al enlace
            nuevoEnlace.appendChild(eliminarBoton);

            // Agregar el enlace a la lista de enlaces nuevos
            enlacesNuevos.insertBefore(nuevoEnlace, enlacesNuevos.firstChild);
        });
    </script>

<script>
    // Función para manejar el clic en los enlaces
    function handleClick(event) {
        event.preventDefault(); // Prevenir la redirección por defecto
        var clave = prompt("Ingresa la clave:"); // Solicitar la clave al usuario
        var enlace = event.target; // El enlace que se hizo clic

        // Verificar si la clave ingresada es igual a la clave en el atributo de datos
        if (clave === enlace.dataset.clave) {
            // Redirigir al usuario al enlace
            window.location.href = enlace.getAttribute("href");
        } else {
            alert("Clave incorrecta. Inténtalo de nuevo.");
        }
    }

    // Agregar un manejador de eventos a todos los enlaces
    var enlaces = document.querySelectorAll("a");
    enlaces.forEach(function(enlace) {
        enlace.addEventListener("click", handleClick);
    });
</script>

</body>
</html>
