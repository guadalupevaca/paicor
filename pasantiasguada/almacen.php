<!DOCTYPE html>
<html>
<head>
    <title>Página de Pedidos de Almacén</title>
    <link rel="stylesheet" type="text/css" href="almacen.css">
</head>
<body>
    <header>
        <h1>Pedido de Almacén</h1>
        <form action="procesar_pedidoalmacen.php" method="POST">
    <label for="nombre">Nombre del Colegio:</label>
    <select name="nombre" id="nombre" required>
        <?php
            $conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

            $query = "SELECT nombre FROM colegio";
            $result = $conexion->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay colegios disponibles</option>";
            }

            mysqli_close($conexion);
        ?>
           </select>
        <br>
        
        <label for="fecha_pedido">Fecha del Pedido:</label>
        <input type="date" name="fecha_pedido">
         <br>
        <a href="#colaciones" class="aviso-btn">Colaciones</a>
    </header>
    
     <label for="aceite">Aceite:</label>
        <input type="text" name="aceite" placeholder="Cantidad">
        <select name="unidad_aceite">
            <option value="1.5l">1.5 Litros</option>
            <option value="900ml">900 ml</option>
            <option value="5l">5 Litros</option>
        </select>
        <br>

        <label for="ajo_deshidratado">Ajo Deshidratado:</label>
        <input type="text" name="ajo_deshidratado" placeholder="Cantidad">
        <select name="unidad_ajo_deshidratado">
            <option value="suelto">Suelto</option>
            <option value="bolsitas_500gr">Bolsitas de 500 gr</option>
        </select>
        <br>

        <label for="arroz">Arroz:</label>
        <input type="text" name="arroz" placeholder="Cantidad">
        <select name="unidad_arroz">
            <option value="500gr">500 gr</option>
            <option value="1kg">1 kg</option>
        </select>
        <br>

        <label for="arvejas">Arvejas en Lata:</label>
        <input type="text" name="arvejas" placeholder="Cantidad">
        <br>

        <label for="azucar">Azúcar:</label>
        <input type="text" name="azucar" placeholder="Cantidad">
        <br>

        <label for="cacao">Cacao:</label>
        <input type="text" name="cacao" placeholder="Cantidad">
        <select name="unidad_cacao">
            <option value="suelto">Suelto</option>
            <option value="bolsas_350gr">Bolsas de 350 gr</option>
        </select>
        <br>

        <label for="choclo">Choclo en Grano en Lata:</label>
        <input type="text" name="choclo" placeholder="Cantidad">
        <br>

        <label for="chocolate">Chocolate en Barra:</label>
        <input type="text" name="chocolate" placeholder="Cantidad">
        <br>

        <label for="comino">Comino:</label>
        <input type="text" name="comino" placeholder="Cantidad">
        <select name="unidad_comino">
            <option value="suelto">Suelto</option>
           <option value="bolsas_50gr">Bolsas de 50 gr</option>
        </select>
        <br>

        <label for="dulce_de_batata">Dulce de Batata:</label>
        <input type="text" name= "dulce_de_batata" placeholder="Cantidad">
        <br>

        <label for="dulce_de_membrillo">Dulce de Membrillo:</label>
        <input type="text" name="dulce_de_membrillo" placeholder="Cantidad">
        <br>

        <label for="fecula">Fécula:</label>
        <input type="text" name="fecula" placeholder="Cantidad">
        <br>

        <label for="fideos_guiseros">Fideos Guiseros Medianos:</label>
        <input type="text" name="fideos_guiseros" placeholder="Cantidad">
        <br>

        <label for="fideos_tallarines">Fideos Tallarines:</label>
        <input type="text" name="fideos_tallarines" placeholder="Cantidad">
        <br>

        <label for="flan">Flan:</label>
        <input type="text" name="flan" placeholder="Cantidad">
        <select name="unidad_flan">
            <option value="suelto">Suelto</option>
            <option value="bolsitas_130gr">Bolsitas de 130 gr</option>
        </select>
        <br>

        <label for="harina_de_maiz">Harina de Maíz:</label>
        <input type="text" name="harina_de_maiz" placeholder="Cantidad">
        <br>

        <label for="huevos">Huevos:</label>
        <input type="text" name="huevos" placeholder="Cantidad">
        <br>

        <label for="laurel">Laurel:</label>
        <input type="text" name="laurel" placeholder="Cantidad">
        <br>

        <label for="lentejas">Lentejas:</label>
        <input type="text" name="lentejas" placeholder="Cantidad">
        <br>

        <label for="maicena">Maicena:</label>
        <input type="text" name="maicena" placeholder="Cantidad">
        <br>

        <label for="maiz_molido">Maíz Molido:</label>
        <input type="text" name="maiz_molido" placeholder="Cantidad">
        <br>

        <label for="malta">Malta:</label>
        <input type="text" name="malta" placeholder="Cantidad">
        <br>

        <label for="manteca">Manteca:</label>
        <input type="text" name="manteca" placeholder="Cantidad">
        <br>

        <label for="oregano">Orégano:</label>
        <input type="text" name="oregano" placeholder="Cantidad">
        <select name="unidad_oregano">
            <option value="suelto">Suelto</option>
            <option value="bolsas_50gr">Bolsas de 50 gr</option>
        </select>
        <br>

        <label for="perejil">Perejil:</label>
        <input type="text" name="perejil" placeholder="Cantidad">
        <br>

        <label for="pimenton">Pimentón:</label>
        <input type="text" name="pimenton" placeholder="Cantidad">
        <br>

        <label for="porotos">Porotos:</label>
        <input type="text" name="porotos" placeholder="Cantidad">
        <br>

        <label for="provenzal">Provenzal:</label>
        <input type="text" name="provenzal" placeholder="Cantidad">
        <select name="unidad_provenzal">
            <option value="suelto">Suelto</option>
        </select>
        <br>

        <label for="pure_de_tomate">Puré de Tomate en Caja:</label>
        <input type="text" name="pure_de_tomate" placeholder="Cantidad">
        <br>

        <label for="sal_fina">Sal Fina:</label>
        <input type="text" name="sal_fina" placeholder="Cantidad">
        <br>

        <label for="sal_gruesa">Sal Gruesa:</label>
        <input type="text" name="sal_gruesa" placeholder="Cantidad">
        <br>

        <label for="tomate_triturado">Tomate Triturado:</label>
        <input type="text" name="tomate_triturado" placeholder="Cantidad">
        <br>

        <label for="trigo_burgol">Trigo Burgol:</label>
        <input type="text" name="trigo_burgol" placeholder="Cantidad">
        <br>

        <label for="vinagre">Vinagre:</label>
        <input type="text" name="vinagre" placeholder="Cantidad">
        <br>

        <label for="leche">Leche:</label>
        <input type="text" name="leche" placeholder="Cantidad">
        <br>

        <label for="queso_cremoso">Queso Cremoso:</label>
        <input type="text" name="queso_cremoso" placeholder="Cantidad">
        <br>

        <label for="queso_rallar">Queso para Rallar:</label>
        <input type="text" name="queso_rallar" placeholder="Cantidad">
        <br>

        <label for="queso_senda">Queso Tipo Senda:</label>
        <input type="text" name="queso_senda" placeholder="Cantidad">
        <br>

        <label for="yogur">Yogur:</label>
        <input type="text" name="yogur" placeholder="Cantidad"> 

        <br>

        <h2>Productos adicionales</h2>

        <label for="otro_producto">Producto:</label>
        <input type="text" name="otro_producto" placeholder="Especifica el producto">
        <label for="cantidad_otro">Cantidad:</label>
        <input type="text" name="cantidad_otro" placeholder="Cantidad">
        <br>

         <section id="colaciones">
            <h2>Pedidos de Colaciones</h2>
            <p>Realiza aquí tus pedidos de colaciones adicionales.</p>
            <label for="colacion_producto">Producto de Colación:</label>
            <input type="text" name="colacion_producto" placeholder="Especifica el producto">
            <label for="colacion_cantidad">Cantidad de Colación:</label>
            <input type="text" name="colacion_cantidad" placeholder="Cantidad">
            <br>
        </section>

        <input type="submit" value="Realizar Pedidos">
    </form> 
   

</body>
</html>