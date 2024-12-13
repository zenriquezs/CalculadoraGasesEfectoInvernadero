<?php
session_start();
require_once '../Modelo/chimenea_model.php';
$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "calculadora";

$db = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($db->connect_error) {
    die("Error en la conexión a la base de datos: " . $db->connect_error);
}

$cveiden = $_SESSION['cveiden'];
$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        switch ($action) {
            case 'guardar':
                try {
                    $cvech = $_POST['cvech'];
                    $altura = $_POST['altura'];
                    $diametro = $_POST['diametro'];
                    $velocidad = $_POST['velocidad'];
                    $temperatura = $_POST['temperatura'];

                    $chimeneaModel = new ChimeneaModel($db);
                    $result = $chimeneaModel->insertarChimenea($cveiden, $cvech, $altura, $diametro, $velocidad, $temperatura);

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = "Datos de la chimenea guardados correctamente.";
                    } else {
                        $response['success'] = false;
                        $response['error'] = "Error al guardar los datos de la chimenea.";
                    }
                } catch (Exception $e) {
                    $response['success'] = false;
                    $response['error'] = "Excepción: " . $e->getMessage();
                }

                echo json_encode($response);
                break;

            case 'obtener':
                try {
                    $chimeneaModel = new ChimeneaModel($db);
                    $result = $chimeneaModel->obtenerChimeneas($cveiden);
                    echo json_encode($result);
                } catch (Exception $e) {
                    $response['success'] = false;
                    $response['error'] = "Excepción: " . $e->getMessage();
                    echo json_encode($response);
                }
                break;

            default:
                $response['success'] = false;
                $response['error'] = "Acción no válida.";
                echo json_encode($response);
                break;
        }
    }
}

$db->close();
?>
