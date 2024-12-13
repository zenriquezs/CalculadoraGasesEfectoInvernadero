<?php
session_start();
require_once '../Modelo/registroactividadesproceso_model.php';
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
                    $cveactp = $_POST['cveactp'];
                    $tipactiv_gral = $_POST['tipactiv_gral'];
                    $proceso = $_POST['proceso'];
                    $unidad_fe = $_POST['unidad_fe'];
                    $hr_ano = $_POST['hr_ano'];
                    $tipo_de_emision = $_POST['tipo_de_emision'];
                    $equipo_de_control = $_POST['equipo_de_control'];
                    $chimenea = $_POST['chimenea'];

                    $registroActividadesProcesoModel = new RegistroActividadesProcesoModel($db);
                    $result = $registroActividadesProcesoModel->insertarRegistroActividadProceso($cveiden, $cveactp, $tipactiv_gral, $proceso, $unidad_fe, $hr_ano, $tipo_de_emision, $equipo_de_control, $chimenea);

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = "Datos de registro de actividades del proceso guardados correctamente.";
                    } else {
                        $response['success'] = false;
                        $response['error'] = "Error al guardar los datos de registro de actividades del proceso.";
                    }
                } catch (Exception $e) {
                    $response['success'] = false;
                    $response['error'] = "Excepción: " . $e->getMessage();
                }

                echo json_encode($response);
                break;

            case 'obtener':
                try {
                    $registroActividadesProcesoModel = new RegistroActividadesProcesoModel($db);
                    $result = $registroActividadesProcesoModel->obtenerRegistroActividadesProceso($cveiden);
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
