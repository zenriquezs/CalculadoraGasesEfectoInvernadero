<?php
session_start();
require_once '../Modelo/combustibles_model.php';

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "calculadora";

$db = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($db->connect_error) {
    die("Error en la conexión a la base de datos: " . $db->connect_error);
}

$model = new CombustiblesModel($db);

$action = $_POST['action'] ?? '';

if ($action == 'guardar') {
    $cveiden = $_POST['cveiden'];
    $combustible = $_POST['combustible'];
    $consumo = $_POST['consumo'];
    $unidad = $_POST['unidad'];

    $response = $model->insertarCombustible($cveiden, $combustible, $consumo, $unidad);
    echo json_encode($response);
} elseif ($action == 'obtener') {
    $cveiden = $_POST['cveiden'];
    $combustibles = $model->obtenerCombustibles($cveiden);
    echo json_encode($combustibles);
}

$db->close();
?>
