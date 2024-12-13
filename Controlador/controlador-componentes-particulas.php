<?php
session_start();
require_once '../Modelo/empresa_model.php';
require_once '../Modelo/componentes_particulas_procesos_model.php';

if (!isset($_SESSION['cveiden'])) {
    die("Acceso denegado.");
}

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "calculadora";

$db = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($db->connect_error) {
    die("Error en la conexión a la base de datos: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'guardar':
            $cveiden = $_SESSION['cveiden'];
            $co2_proc_sc = $_POST['co2_proc_sc'];
            $ch4_proc_sc = $_POST['ch4_proc_sc'];
            $n2o_proc_sc = $_POST['n2o_proc_sc'];

            $model = new ComponentesParticulasProcesosModel($db);
            $resultado = $model->insertarComponentesParticulas($cveiden, $co2_proc_sc, $ch4_proc_sc, $n2o_proc_sc);

            if ($resultado === true) {
                echo json_encode(array('success' => true));
            } else {
                echo json_encode(array('success' => false, 'error' => $resultado));
            }
            break;

        case 'obtener':
            $cveiden = $_POST['cveiden'];

            $model = new ComponentesParticulasProcesosModel($db);
            $componentes = $model->obtenerComponentesParticulas($cveiden);

            echo json_encode($componentes);
            break;

        default:
            echo json_encode(array('success' => false, 'error' => 'Acción no válida.'));
            break;
    }
}

$db->close();
?>
