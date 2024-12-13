<?php
session_start();
require_once '../Modelo/combustiblespoderesnetos_model.php';

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
                    $tipo_combustible = $_POST['tipo_combustible'];
                    $hr_ano = $_POST['hr_ano'];
                    $tipo_emision = $_POST['tipo_emision'];
                    $capacidad = $_POST['capacidad'];
                    $unidad = $_POST['unidad'];

                    $combustiblesPoderesNetosModel = new CombustiblesPoderesNetosModel($db);
                    $result = $combustiblesPoderesNetosModel->insertarCombustiblesPoderesNetos($cveiden, $cvech, $tipo_combustible, $hr_ano, $tipo_emision, $capacidad, $unidad);

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = "Datos de combustibles y poderes netos guardados correctamente.";
                    } else {
                        $response['success'] = false;
                        $response['error'] = "Error al guardar los datos de combustibles y poderes netos.";
                    }
                } catch (Exception $e) {
                    $response['success'] = false;
                    $response['error'] = "Excepción: " . $e->getMessage();
                }

                echo json_encode($response);
                break;

            case 'obtener':
                try {
                    $combustiblesPoderesNetosModel = new CombustiblesPoderesNetosModel($db);
                    $result = $combustiblesPoderesNetosModel->obtenerCombustiblesPoderesNetos($cveiden);
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
