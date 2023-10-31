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
