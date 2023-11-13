<?php
$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_pedido'])) {
    $id_pedido = $_POST['id_pedido'];
    $fecha_pedido = $_POST['fecha_pedido'];
    $papas = $_POST['papas'];
    $tomate = $_POST['tomate'];
    $cebolla = $_POST['cebolla'];
    $zanahoria = $_POST['zanahoria'];
    $choclo = $_POST['choclo'];
    $zapallitos = $_POST['zapallitos'];
    $calabacin = $_POST['calabacin'];
    $lechuga = $_POST['lechuga'];
    $acelga = $_POST['acelga'];
    $berenjena = $_POST['berenjena'];
    $espinaca = $_POST['espinaca'];
    $otros_productos = $_POST['otros_productos'];

    $update_query = "UPDATE pedidos_verduras SET 
                    fecha_pedido = '$fecha_pedido',
                    papas = '$papas',
                    tomate = '$tomate',
                    cebolla = '$cebolla',
                    zanahoria = '$zanahoria',
                    choclo = '$choclo',
                    zapallitos = '$zapallitos',
                    calabacin = '$calabacin',
                    lechuga = '$lechuga',
                    acelga = '$acelga',
                    berenjena = '$berenjena',
                    espinaca = '$espinaca',
                    otros_productos = '$otros_productos'
                    WHERE id_verduleria = $id_pedido";

    if (mysqli_query($conexion, $update_query)) {
        echo "Pedido modificado con éxito.";
    } else {
        echo "Error al modificar el pedido: " . mysqli_error($conexion);
    }
} else {
    echo "Acceso no autorizado.";
}

mysqli_close($conexion);
?>
