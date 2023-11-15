<?php
$conexion = mysqli_connect("localhost", "root", "", "paicor") or die("No se puede conectar a la base de datos.");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_limpieza'])) {
    $id_limpieza = $_POST['id_limpieza'];
    $fecha_pedido = $_POST['fecha_pedido'];
    $bolsas_consorcio = $_POST['bolsas_consorcio'];
    $lavandina = $_POST['lavandina'];
    $detergente = $_POST['detergente'];
    $desengrasante = $_POST['desengrasante'];
    $desinfectante = $_POST['desinfectante'];
    $valerinas = $_POST['valerinas'];
    $alcohol = $_POST['alcohol'];
    $escobillon = $_POST['escobillon'];
    $secador_pisos = $_POST['secador_pisos'];
    $trapo_piso = $_POST['trapo_piso'];
    $baldes = $_POST['baldes'];
    $esponja = $_POST['esponja'];
    $fosforos = $_POST['fosforos'];
    $otros_productos = $_POST['otros_productos'];

    $update_query = "UPDATE pedidos_limpieza SET 
                    fecha_pedido = '$fecha_pedido',
                    bolsas_consorcio = '$bolsas_consorcio',
                    lavandina = '$lavandina',
                    detergente = '$detergente',
                    desengrasante = '$desengrasante',
                    desinfectante = '$desinfectante',
                    valerinas = '$valerinas',
                    alcohol = '$alcohol',
                    escobillon = '$escobillon',
                    secador_pisos = '$secador_pisos',
                    trapo_piso = '$trapo_piso',
                    baldes = '$baldes',
                    esponja = '$esponja',
                    fosforos = '$fosforos',
                    otros_productos = '$otros_productos'
                    WHERE id_limpieza = $id_limpieza";

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
