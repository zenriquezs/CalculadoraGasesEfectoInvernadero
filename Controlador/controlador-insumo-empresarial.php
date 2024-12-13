<?php
session_start();
require_once '../Modelo/insumo_empresarial_model.php';

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "calculadora";

$db = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($db->connect_error) {
    die("Error en la conexión a la base de datos: " . $db->connect_error);
}

$insumoEmpresarialModel = new InsumoEmpresarialModel($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $cveiden = $_SESSION['cveiden'];

    if ($action === 'guardar') {
        $nec = $_POST['nec'];
        $nap = $_POST['nap'];
        $nch = $_POST['nch'];
        $necont = $_POST['necont'];

        $resultado = $insumoEmpresarialModel->insertarInsumoEmpresarial($cveiden, $nec, $nap, $nch, $necont);
        echo json_encode(['success' => true, 'message' => $resultado]);
    } elseif ($action === 'obtener') {
        $insumosEmpresariales = $insumoEmpresarialModel->obtenerInsumosEmpresariales($cveiden);
        echo json_encode($insumosEmpresariales);
    }
}

$db->close();
?>
