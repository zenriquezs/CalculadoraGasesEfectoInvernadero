<?php
session_start();
require_once '../Modelo/empresa_model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "calculadora";

    $db = new mysqli($db_servername, $db_username, $db_password, $db_name);

    if ($db->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Error en la conexión a la base de datos: ' . $db->connect_error]);
        exit;
    }

    $cveiden = $_POST['cveiden'];

    $query = "SELECT * FROM EMPRESA WHERE CVEIDEN = ?";
    $stmt = $db->prepare($query);
    if ($stmt === false) {
        echo json_encode(['success' => false, 'message' => 'Error en la preparación de la consulta: ' . $db->error]);
        exit;
    }

    $stmt->bind_param("s", $cveiden);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
        echo json_encode(['success' => true, 'data' => $data]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No se encontró la empresa.']);
    }

    $stmt->close();
    $db->close();
}
?>
