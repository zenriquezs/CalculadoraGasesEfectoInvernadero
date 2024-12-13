<?php
require_once '../Modelo/empresa_model.php';
require_once '../Modelo/usuarios_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'verificar') {
    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "calculadora";

    $db = new mysqli($db_servername, $db_username, $db_password, $db_name);

    if ($db->connect_error) {
        die(json_encode(array('success' => false, 'message' => 'Error en la conexión a la base de datos: ' . $db->connect_error)));
    }

    $cveiden = $_POST['cveiden'];
    $empresaModel = new EmpresaModel($db);
    $datosEmpresa = $empresaModel->obtenerDatosEmpresa($cveiden);

    $completado = true;
    foreach ($datosEmpresa as $key => $value) {
        if (empty($value)) {
            $completado = false;
            break;
        }
    }

    $db->close();

    echo json_encode(array('success' => true, 'completado' => $completado));
}
?>
