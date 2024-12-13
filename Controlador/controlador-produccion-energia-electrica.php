<?php
session_start();
require_once '../Modelo/produccionenergiaelectrica_model.php';
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
                    $capacidad_instalada = $_POST['capacidad_instalada'];
                    $tipo_de_planta = $_POST['tipo_de_planta'];
                    $generacion_anual_mwh = $_POST['generacion_anual_mwh'];
                    $consumo_combustible = $_POST['consumo_combustible'];
                    $tipo = $_POST['tipo'];
                    $cantidad = $_POST['cantidad'];
                    $unidad = $_POST['unidad'];
                    $co2 = $_POST['co2'];
                    $ch4 = $_POST['ch4'];
                    $n2o = $_POST['n2o'];

                    $produccionEnergiaElectricaModel = new ProduccionEnergiaElectricaModel($db);
                    $result = $produccionEnergiaElectricaModel->insertarProduccionEnergiaElectrica($cveiden, $capacidad_instalada, $tipo_de_planta, $generacion_anual_mwh, $consumo_combustible, $tipo, $cantidad, $unidad, $co2, $ch4, $n2o);

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = "Datos de producción de energía eléctrica guardados correctamente.";
                    } else {
                        $response['success'] = false;
                        $response['error'] = "Error al guardar los datos de producción de energía eléctrica.";
                    }
                } catch (Exception $e) {
                    $response['success'] = false;
                    $response['error'] = "Excepción: " . $e->getMessage();
                }

                echo json_encode($response);
                break;

            case 'obtener':
                try {
                    $produccionEnergiaElectricaModel = new ProduccionEnergiaElectricaModel($db);
                    $result = $produccionEnergiaElectricaModel->obtenerProduccionEnergiaElectrica($cveiden);
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
