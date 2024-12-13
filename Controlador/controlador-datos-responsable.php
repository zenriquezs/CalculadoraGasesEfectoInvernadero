<?php
session_start();
require_once '../Modelo/datosresponsable_model.php';
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
                    $responsable_tecnico = $_POST['responsable_tecnico'];
                    $elaborado = $_POST['elaborado'];
                    $observaciones = $_POST['observaciones'];
                    $zona = $_POST['zona'];

                    $datosResponsableModel = new DatosResponsableModel($db);
                    $result = $datosResponsableModel->insertarDatosResponsable($cveiden, $responsable_tecnico, $elaborado, $observaciones, $zona);

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = "Datos del responsable de la empresa guardados correctamente.";
                    } else {
                        $response['success'] = false;
                        $response['error'] = "Error al guardar los datos del responsable de la empresa.";
                    }
                } catch (Exception $e) {
                    $response['success'] = false;
                    $response['error'] = "Excepción: " . $e->getMessage();
                }

                echo json_encode($response);
                break;

            case 'obtener':
                try {
                    $datosResponsableModel = new DatosResponsableModel($db);
                    $result = $datosResponsableModel->obtenerDatosResponsables($cveiden);
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
