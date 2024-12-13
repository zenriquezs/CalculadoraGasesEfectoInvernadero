<?php
session_start();
require_once '../Modelo/actividadsuministro_model.php';

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
                    $equipo_combustion = $_POST['equipo_combustion'];
                    $situacion = $_POST['situacion'];
                    $md = $_POST['md'];
                    $ct = $_POST['ct'];
                    $ci = $_POST['ci'];

                    $actividadSuministroModel = new ActividadSuministroModel($db);
                    $result = $actividadSuministroModel->insertarActividadSuministro($actividad, $equipo_combustion, $situacion, $md, $ct, $ci, $cveiden);

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = "Datos de actividad de suministro guardados correctamente.";
                    } else {
                        $response['success'] = false;
                        $response['error'] = "Error al guardar los datos de actividad de suministro.";
                    }
                } catch (Exception $e) {
                    $response['success'] = false;
                    $response['error'] = "Excepción: " . $e->getMessage();
                }

                echo json_encode($response);
                break;

            case 'obtener':
                try {
                    $actividadSuministroModel = new ActividadSuministroModel($db);
                    $result = $actividadSuministroModel->obtenerActividadesSuministro($cveiden);
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
