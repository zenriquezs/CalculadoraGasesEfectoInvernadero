<?php
session_start();
require_once '../Modelo/controlcontaminantes_model.php';
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
                    $contam_control_1 = $_POST['contam_control_1'];
                    $contam_control_2 = $_POST['contam_control_2'];
                    $contam_control_3 = $_POST['contam_control_3'];

                    $controlContaminantesModel = new ControlContaminantesModel($db);
                    $result = $controlContaminantesModel->insertarControlContaminante($cveiden, $contam_control_1, $contam_control_2, $contam_control_3);

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = "Datos de control de contaminantes guardados correctamente.";
                    } else {
                        $response['success'] = false;
                        $response['error'] = "Error al guardar los datos de control de contaminantes.";
                    }
                } catch (Exception $e) {
                    $response['success'] = false;
                    $response['error'] = "Excepción: " . $e->getMessage();
                }

                echo json_encode($response);
                break;

            case 'obtener':
                try {
                    $controlContaminantesModel = new ControlContaminantesModel($db);
                    $result = $controlContaminantesModel->obtenerControlContaminantes($cveiden);
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
    } else {
        $response['success'] = false;
        $response['error'] = "Acción no definida.";
        echo json_encode($response);
    }
} else {
    $response['success'] = false;
    $response['error'] = "Método de solicitud no válido.";
    echo json_encode($response);
}

$db->close();
?>
