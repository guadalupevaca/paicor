<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="pedidocarne.css">

    <title>Document</title>
</head>
<body>
<header>
        <h1> pedido de carniceria</h1>
</header>
<form action="procesar_pedido.php" method="POST">
        <label for="carne_molida">Carne molida:</label>
        <input type="text" name="carne_molida"><br>

        <label for="carne_picada">Carne picada:</label>
        <input type="text" name="carne_picada"><br>

        <label for="costeletas">Costeletas:</label>
        <input type="text" name="costeletas" ><br>

        <label for="agujas">Agujas:</label>
        <input type="text" name="Agujas" ><br>

        <label for="bifes">Bifes:</label>
        <input type="text" name="Bifes" ><br>

        <label for="pechuga_pollo">Pechuga de pollo:</label>
        <input type="text" name="pechuga_pollo" ><br>

        <label for="alita_pollo">Alitas de pollo:</label>
        <input type="text" name="alita_pollo" ><br>
        
        <input type="submit" value="Guardar pedido">
 </form>
</body>
</html>