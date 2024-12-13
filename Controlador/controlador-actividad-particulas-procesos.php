<?php
session_start();
require_once '../Modelo/actividadparticulasprocesos_model.php';
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
                    $co2_proc_sc = $_POST['co2_proc_sc'];
                    $tip_co2 = $_POST['tip_co2'];
                    $ch4_proc_sc = $_POST['ch4_proc_sc'];
                    $tip_ch4 = $_POST['tip_ch4'];
                    $n2o_proc_sc = $_POST['n2o_proc_sc'];
                    $tip_n2o = $_POST['tip_n2o'];

                    $actividadParticulasProcesosModel = new ActividadParticulasProcesosModel($db);
                    $result = $actividadParticulasProcesosModel->insertarActividadParticulasProceso($cveiden, $co2_proc_sc, $tip_co2, $ch4_proc_sc, $tip_ch4, $n2o_proc_sc, $tip_n2o);

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = "Datos de actividad de partículas de procesos guardados correctamente.";
                    } else {
                        $response['success'] = false;
                        $response['error'] = "Error al guardar los datos de actividad de partículas de procesos.";
                    }
                } catch (Exception $e) {
                    $response['success'] = false;
                    $response['error'] = "Excepción: " . $e->getMessage();
                }

                echo json_encode($response);
                break;

            case 'obtener':
                try {
                    $actividadParticulasProcesosModel = new ActividadParticulasProcesosModel($db);
                    $result = $actividadParticulasProcesosModel->obtenerActividadParticulasProcesos($cveiden);
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
