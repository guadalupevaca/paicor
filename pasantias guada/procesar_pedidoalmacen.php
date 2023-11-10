<?php

$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");


// Obtener los datos del formulario
$aceite = $_POST['aceite'];
$unidad_aceite = $_POST['unidad_aceite'];
$ajo_deshidratado = $_POST['ajo_deshidratado'];
$unidad_ajo_deshidratado = $_POST['unidad_ajo_deshidratado'];
$arroz = $_POST['arroz'];
$unidad_arroz = $_POST['unidad_arroz'];
$arvejas = $_POST['arvejas'];
$azucar = $_POST['azucar'];
$cacao = $_POST['cacao'];
$unidad_cacao = $_POST['unidad_cacao'];
$choclo = $_POST['choclo'];
$chocolate = $_POST['chocolate'];
$comino = $_POST['comino'];
$unidad_comino = $_POST['unidad_comino'];
$dulce_de_batata = $_POST['dulce_de_batata'];
$dulce_de_membrillo = $_POST['dulce_de_membrillo'];
$fecula = $_POST['fecula'];
$fideos_guiseros = $_POST['fideos_guiseros'];
$fideos_tallarines = $_POST['fideos_tallarines'];
$flan = $_POST['flan'];
$unidad_flan = $_POST['unidad_flan'];
$harina_de_maiz = $_POST['harina_de_maiz'];
$huevos = $_POST['huevos'];
$laurel = $_POST['laurel'];
$lentejas = $_POST['lentejas'];
$maicena = $_POST['maicena'];
$maiz_molido = $_POST['maiz_molido'];
$malta = $_POST['malta'];
$manteca = $_POST['manteca'];
$oregano = $_POST['oregano'];
$unidad_oregano = $_POST['unidad_oregano'];
$perejil = $_POST['perejil'];
$pimenton = $_POST['pimenton'];
$porotos = $_POST['porotos'];
$provenzal = $_POST['provenzal'];
$unidad_provenzal = $_POST['unidad_provenzal'];
$pure_de_tomate = $_POST['pure_de_tomate'];
$sal_fina = $_POST['sal_fina'];
$sal_gruesa = $_POST['sal_gruesa'];
$tomate_triturado = $_POST['tomate_triturado'];
$trigo_burgol = $_POST['trigo_burgol'];
$vinagre = $_POST['vinagre'];
$leche = $_POST['leche'];
$queso_cremoso = $_POST['queso_cremoso'];
$queso_rallar = $_POST['queso_rallar'];
$queso_senda = $_POST['queso_senda'];
$yogur = $_POST['yogur'];

$otro_producto = $_POST['otro_producto'];
$cantidad_otro = $_POST['cantidad_otro'];

$fecha_pedido = $_POST['fecha_pedido'];

$colacion_producto = $_POST['colacion_producto'];
$colacion_cantidad = $_POST['colacion_cantidad'];

// Insertar los datos en la tabla
$sql = "INSERT INTO pedido_almacen (aceite, unidad_aceite, ajo_deshidratado, unidad_ajo_deshidratado, arroz, unidad_arroz, arvejas, azucar, cacao, unidad_cacao, choclo, chocolate, comino, unidad_comino, dulce_de_batata, dulce_de_membrillo, fecula, fideos_guiseros, fideos_tallarines, flan, unidad_flan, harina_de_maiz, huevos, laurel, lentejas, maicena, maiz_molido, malta, manteca, oregano, unidad_oregano, perejil, pimenton, porotos, provenzal, unidad_provenzal, pure_de_tomate, sal_fina, sal_gruesa, tomate_triturado, trigo_burgol, vinagre, leche, queso_cremoso, queso_rallar, queso_senda, yogur, otro_producto, cantidad_otro, fecha_pedido, colacion_producto, colacion_cantidad) 
        VALUES ('$aceite', '$unidad_aceite', '$ajo_deshidratado', '$unidad_ajo_deshidratado', '$arroz', '$unidad_arroz', '$arvejas', '$azucar', '$cacao', '$unidad_cacao', '$choclo', '$chocolate', '$comino', '$unidad_comino', '$dulce_de_batata', '$dulce_de_membrillo', '$fecula', '$fideos_guiseros', '$fideos_tallarines', '$flan', '$unidad_flan', '$harina_de_maiz', '$huevos', '$laurel', '$lentejas', '$maicena', '$maiz_molido', '$malta', '$manteca', '$oregano', '$unidad_oregano', '$perejil', '$pimenton', '$porotos', '$provenzal', '$unidad_provenzal', '$pure_de_tomate', '$sal_fina', '$sal_gruesa', '$tomate_triturado', '$trigo_burgol', '$vinagre', '$leche', '$queso_cremoso', '$queso_rallar', '$queso_senda', '$yogur', '$otro_producto', '$cantidad_otro', '$fecha_pedido', '$colacion_producto', '$colacion_cantidad')";

if ($conexion->query($sql) === TRUE) {
    echo "Pedido almacenado correctamente.";
} else {
    echo "Error al almacenar el pedido: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
