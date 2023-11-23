<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="detalles.css">
    <title>Detalles de pedidos de almacen</title>
</head>
<body>

    <div class="container">

   <div class="header">
    <h2>Detalles del Pedido</h2>
</div>

<div class="content">
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

// Obtener los datos del formulario
$aceite = isset($_POST['aceite']) ? $_POST['aceite'] : null;
$unidad_aceite = null;

if (!is_null($aceite)) {
    $unidad_aceite = isset($_POST['unidad_aceite']) ? $_POST['unidad_aceite'] : null;
}

$ajo_deshidratado = isset($_POST['ajo_desidratado']) ? $_POST['ajo_desidratado'] : null;
$unidad_ajo_deshidratado = null;

if (!is_null($ajo_deshidratado)) {
    $unidad_ajo_deshidratado = isset($_POST['unidad_ajo_desidratado']) ? $_POST['unidad_ajo_desidratado'] : null;
}

if (!is_null($arroz)) {
    $unidad_arroz = isset($_POST['unidad_arroz']) ? $_POST['unidad_arroz'] : null;
}

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';

// Insertar los datos en la tabla
$sql = "INSERT INTO pedido_almacen (aceite, unidad_aceite, ajo_deshidratado, unidad_ajo_deshidratado, arroz, unidad_arroz, arvejas, azucar, cacao, unidad_cacao, choclo, chocolate, comino, unidad_comino, dulce_de_batata, dulce_de_membrillo, fecula, fideos_guiseros, fideos_tallarines, flan, unidad_flan, harina_de_maiz, huevos, laurel, lentejas, maicena, maiz_molido, malta, manteca, oregano, unidad_oregano, perejil, pimenton, porotos, provenzal, unidad_provenzal, pure_de_tomate, sal_fina, sal_gruesa, tomate_triturado, trigo_burgol, vinagre, leche, queso_cremoso, queso_rallar, queso_senda, yogur, otro_producto, cantidad_otro, fecha_pedido, colacion_producto, colacion_cantidad, nombre) 
        VALUES ('$aceite', '$unidad_aceite', '$ajo_deshidratado', '$unidad_ajo_deshidratado', '$arroz', '$unidad_arroz', '$arvejas', '$azucar', '$cacao', '$unidad_cacao', '$choclo', '$chocolate', '$comino', '$unidad_comino', '$dulce_de_batata', '$dulce_de_membrillo', '$fecula', '$fideos_guiseros', '$fideos_tallarines', '$flan', '$unidad_flan', '$harina_de_maiz', '$huevos', '$laurel', '$lentejas', '$maicena', '$maiz_molido', '$malta', '$manteca', '$oregano', '$unidad_oregano', '$perejil', '$pimenton', '$porotos', '$provenzal', '$unidad_provenzal', '$pure_de_tomate', '$sal_fina', '$sal_gruesa', '$tomate_triturado', '$trigo_burgol', '$vinagre', '$leche', '$queso_cremoso', '$queso_rallar', '$queso_senda', '$yogur', '$otro_producto', '$cantidad_otro', '$fecha_pedido', '$colacion_producto', '$colacion_cantidad', '$nombre')";

if ($conexion->query($sql) === TRUE) {
    echo '<p class="success-message">Pedido almacenado correctamente.</p>';    // Mostrar los detalles del pedido
 // Definir un array asociativo con los productos y sus unidades
$productos = array(
    
    "aceite" => "Aceite",
    "ajo_deshidratado" => "Ajo Deshidratado",
    'arroz' => 'arroz'  ,
    'arvejas'=>'arvejas',
    'azucar'=>'azucar',
    'cacao' =>'cacao',
    'choclo' => 'choclo',
    'chocolate'  =>'chocolate',
    'comino' =>'comino',
    'dulce_de_batata' =>'dulce_de_batata',
    'dulce_de_membrillo' => 'dulce_de_membrillo',
    'fecula' =>'fecula',
    'fideos_guiseros' => 'fideos_guiseros',
    'fideos_tallarines' =>'fideos_tallarines',
    'flan' => 'flan',
    'harina_de_maiz' =>'harina_de_maiz',
    'huevos' => 'huevos',
    'laurel' =>'laurel',
    'lentejas' => 'lentejas',
    'maicena' =>'maicena',
    'maiz_molido' =>'maiz_molido',
    'malta' => 'malta',
    'manteca' =>'manteca',
    'oregano' => 'oregano',
    'perejil' =>'perejil',
    'pimenton' => 'pimenton',
    'porotos' =>'porotos',
    'provenzal' => 'provenzal',
    'pure_de_tomate' => 'pure_de_tomate',
    'sal_fina' => 'sal_fina',
    'sal_gruesa' =>'sal_gruesa',
    'tomate_triturado' =>'tomate_triturado',
    'trigo_burgol' =>'trigo_burgol',
    'vinagre' =>'vinagre',
    'leche' =>'leche',
    'queso_cremoso' =>'queso_cremoso',
    'queso_rallar' =>'queso_rallar',
    'queso_senda' =>'queso_senda',
    'yogur' => 'yogur'
);
// Mostrar los detalles del pedido
echo '<h2>Detalles del Pedido:</h2>';
echo '<ul>';

foreach ($productos as $producto => $unidad) {
    // Verificar si el producto tiene un valor
    if (!empty($_POST[$producto])) {
        $cantidad = $_POST[$producto];
        $unidad_producto = isset($_POST[$unidad]) ? $_POST[$unidad] : '';
        echo "<li>$producto: $cantidad $unidad_producto</li>";
    }
}

// Mostrar detalles de la colación
if (!empty($colacion_producto) && !empty($colacion_cantidad)) {
    echo "<li>Colación: $colacion_cantidad $colacion_producto</li>";
}

// Mostrar detalles del producto adicional
if (!empty($otro_producto) && !empty($cantidad_otro)) {
    echo "<li>Otro Producto: $cantidad_otro $otro_producto</li>";
}

} else {
    echo "Error al almacenar el pedido: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
</div>

<footer>
    Paicor-Pedidos.
</footer>

</div>
    
</body>
</html>
