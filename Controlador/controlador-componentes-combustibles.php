<?php
session_start();
require_once '../Modelo/empresa_model.php';
require_once '../Modelo/componentes_combustibles_model.php';

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "calculadora";

$db = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($db->connect_error) {
    die("Error en la conexión a la base de datos: " . $db->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'guardar') {
        $cveiden = $_SESSION['cveiden'];
        $co2_comb_sc = $_POST['co2_comb_sc'];
        $ch4_comb_sc = $_POST['ch4_comb_sc'];
        $n2o_comb_sc = $_POST['n2o_comb_sc'];

        $modelo = new ComponentesCombustiblesModel($db);

        $resultado = $modelo->insertarComponenteCombustible($cveiden, $co2_comb_sc, $ch4_comb_sc, $n2o_comb_sc);

        if ($resultado === true) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'error' => $resultado));
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'obtener') {
        $cveiden = $_POST['cveiden'];

        $modelo = new ComponentesCombustiblesModel($db);
        $componentes = $modelo->obtenerComponentesCombustibles($cveiden);

        echo json_encode($componentes);
    }
}

$db->close();
?>
