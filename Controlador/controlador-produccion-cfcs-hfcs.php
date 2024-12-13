<?php
session_start();
require_once '../Modelo/produccioncfchfcs_model.php';

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
                    $actividad = $_POST['actividad'];
                    $nombreSustancia = $_POST['nombre_sustancia'];
                    $masaConsumida = $_POST['masa_consumida'];
                    $unidadMedida = $_POST['unidad_medida'];
                    $masaAdicionada = $_POST['masa_adicionada'];
                    $cantidad = $_POST['cantidad'];
                    $unidad = $_POST['unidad'];
                    $co2 = $_POST['co2'];
                    $ch4 = $_POST['ch4'];
                    $n2o = $_POST['n2o'];

                    $produccionCFCsHFCsModel = new ProduccionCFCsHFCsModel($db);
                    $result = $produccionCFCsHFCsModel->insertarProduccionCFCsHFCs($cveiden, $actividad, $nombreSustancia, $masaConsumida, $unidadMedida, $masaAdicionada, $cantidad, $unidad, $co2, $ch4, $n2o);

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = "Datos de producción CFCs/HFCs guardados correctamente.";
                    } else {
                        $response['success'] = false;
                        $response['error'] = "Error al guardar los datos de producción CFCs/HFCs.";
                    }
                } catch (Exception $e) {
                    $response['success'] = false;
                    $response['error'] = "Excepción: " . $e->getMessage();
                }

                echo json_encode($response);
                break;

            case 'obtener':
                try {
                    $produccionCFCsHFCsModel = new ProduccionCFCsHFCsModel($db);
                    $result = $produccionCFCsHFCsModel->obtenerProduccionCFCsHFCs($cveiden);
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
