<?php
require_once '../Modelo/productos_model.php';

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "calculadora";

$db = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($db->connect_error) {
    die('Error en la conexión a la base de datos: ' . $db->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productosModel = new ProductosModel($db);

    if (isset($_POST['producto']) && isset($_POST['cantidad']) && isset($_POST['unidad']) && isset($_POST['cveiden'])) {
        $producto = $_POST['producto'];
        $cantidad = $_POST['cantidad'];
        $unidad = $_POST['unidad'];
        $cveiden = $_POST['cveiden'];

        $resultado = $productosModel->insertarProducto($producto, $cantidad, $unidad, $cveiden);

        header('Content-Type: application/json');
        echo json_encode(['success' => $resultado]);
    }

    if (isset($_POST['action']) && $_POST['action'] === 'obtener') {
        $cveiden = $_POST['cveiden'];
        $productos = $productosModel->obtenerProductos($cveiden);

        header('Content-Type: application/json');
        echo json_encode($productos);
    }
}

$db->close();
?>
 