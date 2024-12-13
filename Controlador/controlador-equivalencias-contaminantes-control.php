<?php
session_start();
require_once '../Modelo/equivalenciascontaminantescontrol_model.php';
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
                    $cveqpocon = $_POST['cveqpocon'];
                    $tipo_de_eq_control = $_POST['tipo_de_eq_control'];
                    $eficiencia = $_POST['eficiencia'];
                    $metodo_de_estimacion = $_POST['metodo_de_estimacion'];

                    $equivalenciasModel = new EquivalenciasContaminantesControlModel($db);
                    $result = $equivalenciasModel->insertarEquivalenciaContaminanteControl($cveiden, $cveqpocon, $tipo_de_eq_control, $eficiencia, $metodo_de_estimacion);

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = "Datos de equivalencias contaminantes de control guardados correctamente.";
                    } else {
                        $response['success'] = false;
                        $response['error'] = "Error al guardar los datos de equivalencias contaminantes de control.";
                    }
                } catch (Exception $e) {
                    $response['success'] = false;
                    $response['error'] = "Excepción: " . $e->getMessage();
                }

                echo json_encode($response);
                break;

            case 'obtener':
                try {
                    $equivalenciasModel = new EquivalenciasContaminantesControlModel($db);
                    $result = $equivalenciasModel->obtenerEquivalenciasContaminantesControl($cveiden);
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
