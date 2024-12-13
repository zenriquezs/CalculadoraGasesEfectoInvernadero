<?php
require_once '../Modelo/empresa_model.php';
require_once '../Modelo/usuarios_model.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "calculadora";

    $db = new mysqli($db_servername, $db_username, $db_password, $db_name);

    if ($db->connect_error) {
        echo json_encode(['success' => false, 'error' => "Error en la conexión a la base de datos: " . $db->connect_error]);
        exit;
    }

    $empresaModel = new EmpresaModel($db);

    $datos = array(
        'cveiden' => $_POST['cveiden'],
        'sector' => $_POST['sector'],
        'cam' => $_POST['cam'],
        'nombre_empresa' => $_POST['nombre_empresa'],
        'scian' => $_POST['scian'],
        'ubicacion' => $_POST['ubicacion'],
        'codigo_postal' => $_POST['codigo_postal'],
        'municipio' => $_POST['municipio'],
        'entidad_federativa' => $_POST['entidad_federativa'],
        'latitud' => $_POST['latitud'],
        'longitud' => $_POST['longitud'],
        'telefono' => $_POST['telefono'],
    );

    if ($_POST['action'] === 'guardar') {
        try {
            $empresaModel->crearEmpresa($datos);
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    $db->close();
}
?>
