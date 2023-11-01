<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="almacenn.css">
    <title>Document</title>
</head>
<body>
<header>
        <h1> pedido de almacen</h1>
</header>
<form action="procesar_pedidoalmacen.php" method="POST">
        <label for="fideos">fideos:</label>
        <input type="text" name="fideos"><br>

        <label for="aceite">aceite:</label>
        <input type="text" name="aceite"><br>

        <label for="fideos_largos">fideos largos:</label>
        <input type="text" name="fideos_largos" ><br>

        <label for="polenta">polenta:</label>
        <input type="text" name="polenta" ><br>

        <label for="arroz">arroz:</label>
        <input type="text" name="arroz" ><br>

        <label for="leche">Leche:</label>
        <input type="text" name="leche" ><br>

        <label for="huevos">Huevos:</label>
        <input type="text" name="huevos" ><br>

        <label for="arbejas">Arbejas:</label>
        <input type="text" name="arbejas" ><br>

        <label for="lentejas">Lentejas:</label>
        <input type="text" name="lentejas" ><br>

        <label for="pure_de_tomate">pure de tomate:</label>
        <input type="text" name="pure_de_tomate" ><br>
        
        <input type="submit" value="Guardar pedido">

 </form>
</body>
</html>