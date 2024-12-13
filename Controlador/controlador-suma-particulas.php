<?php
session_start();
require_once '../Modelo/sumaparticulas_model.php'; // Asegúrate de que la ruta sea correcta y el nombre de archivo sea correcto

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
                    $co2_suma_sc = $_POST['co2_suma_sc'];
                    $ch4_suma_sc = $_POST['ch4_suma_sc'];
                    $n2o_suma_sc = $_POST['n2o_suma_sc'];

                    $sumaParticulasModel = new SumaParticulasModel($db);
                    $result = $sumaParticulasModel->insertarSumaParticula($co2_suma_sc, $ch4_suma_sc, $n2o_suma_sc, $cveiden);

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = "Datos de suma de partículas guardados correctamente.";
                    } else {
                        $response['success'] = false;
                        $response['error'] = "Error al guardar los datos de suma de partículas.";
                    }
                } catch (Exception $e) {
                    $response['success'] = false;
                    $response['error'] = "Excepción: " . $e->getMessage();
                }

                echo json_encode($response);
                break;

            case 'obtener':
                try {
                    $sumaParticulasModel = new SumaParticulasModel($db);
                    $result = $sumaParticulasModel->obtenerSumaParticulas($cveiden);
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
