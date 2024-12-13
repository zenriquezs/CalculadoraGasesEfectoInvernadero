<?php
session_start();
require_once '../Modelo/tipocombustiblepoderesnetos_model.php';

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
                    $tipo_combustible = $_POST['tipo_combustible'];
                    $poder_calorifico_neto = $_POST['poder_calorifico_neto'];
                    $unidad_medida_kj_m3 = $_POST['unidad_medida_kj_m3'];
                    $unidad_medida_mj_t = $_POST['unidad_medida_mj_t'];
                    $cantidad_consumo = $_POST['cantidad_consumo'];
                    $factor_conversion_bep = $_POST['factor_conversion_bep'];
                    $equivalencia_bep_m3 = $_POST['equivalencia_bep_m3'];
                    $equivalencia_bep_t = $_POST['equivalencia_bep_t'];
                    $co2_t_mj = $_POST['co2_t_mj'];
                    $ch4_kg_mj = $_POST['ch4_kg_mj'];
                    $n2o_kg_mj = $_POST['n2o_kg_mj'];

                    $tipoCombustiblePoderesNetosModel = new TipoCombustiblePoderesNetosModel($db);
                    $result = $tipoCombustiblePoderesNetosModel->insertarTipoCombustiblePoderesNetos(
                        $cveiden,
                        $tipo_combustible,
                        $poder_calorifico_neto,
                        $unidad_medida_kj_m3,
                        $unidad_medida_mj_t,
                        $cantidad_consumo,
                        $factor_conversion_bep,
                        $equivalencia_bep_m3,
                        $equivalencia_bep_t,
                        $co2_t_mj,
                        $ch4_kg_mj,
                        $n2o_kg_mj
                    );

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = "Datos del tipo de combustible poderes netos guardados correctamente.";
                    } else {
                        $response['success'] = false;
                        $response['error'] = "Error al guardar los datos del tipo de combustible poderes netos.";
                    }
                } catch (Exception $e) {
                    $response['success'] = false;
                    $response['error'] = "Excepción: " . $e->getMessage();
                }

                echo json_encode($response);
                break;

            case 'obtener':
                try {
                    $tipoCombustiblePoderesNetosModel = new TipoCombustiblePoderesNetosModel($db);
                    $result = $tipoCombustiblePoderesNetosModel->obtenerTipoCombustiblePoderesNetos($cveiden);
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
