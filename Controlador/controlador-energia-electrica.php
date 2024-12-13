<?php
session_start();
require_once '../Modelo/energiaelectrica_model.php';
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
                    $hr_ano = $_POST['hr_ano'];
                    $tipo_emision = $_POST['tipo_emision'];
                    $capacidad = $_POST['capacidad'];
                    $unidad = $_POST['unidad'];

                    $energiaElectricaModel = new EnergiaElectricaModel($db);
                    $result = $energiaElectricaModel->insertarEnergiaElectrica($cveiden, $cvech, $hr_ano, $tipo_emision, $capacidad, $unidad);

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = "Datos de energía eléctrica guardados correctamente.";
                    } else {
                        $response['success'] = false;
                        $response['error'] = "Error al guardar los datos de energía eléctrica.";
                    }
                } catch (Exception $e) {
                    $response['success'] = false;
                    $response['error'] = "Excepción: " . $e->getMessage();
                }

                echo json_encode($response);
                break;

            case 'obtener':
                try {
                    $energiaElectricaModel = new EnergiaElectricaModel($db);
                    $result = $energiaElectricaModel->obtenerEnergiaElectrica($cveiden);
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
