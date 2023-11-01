<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="limpieza.css">
    <title>Document</title>
</head>
<body>
<header>
        <h1> pedido de limpieza</h1>
</header>
<form action="procesar_pedidolimpieza.php" method="POST">
        <label for="escoba">Escoba:</label>
        <input type="text" name="escoba"><br>

        <label for="balde">Balde:</label>
        <input type="text" name="balde"><br>

        <label for="trapo_de_piso">Trapo de piso:</label>
        <input type="text" name="trapo_de_piso" ><br>

        <label for="ciff">Ciff:</label>
        <input type="text" name="ciff" ><br>

        <label for="detergente">Detergente:</label>
        <input type="text" name="detergente" ><br>

        <label for="lavandina">Lavandina:</label>
        <input type="text" name="lavandina" ><br>

        <label for="perfumina">Perfumina:</label>
        <input type="text" name="perfumina" ><br>


        <label for="guantes">Guantes:</label>
        <input type="text" name="guantes" ><br>

        <input type="submit" value="Guardar pedido">

 </form>
</body>
</html>