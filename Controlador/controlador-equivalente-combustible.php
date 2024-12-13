<?php
session_start();
require_once '../Modelo/equivalentecombustible_model.php';

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
        $cveiden = $_POST['cveiden'];
        $cveqpoc = $_POST['cveqpoc'];
        $tipequia = $_POST['tipequia'];
        $hr_ano = $_POST['hr_ano'];
        $tipo_de_emision = $_POST['tipo_de_emision'];
        $capacidad = $_POST['capacidad'];
        $unidad_capacidad = $_POST['unidad_capacidad'];
        $tipocombust = $_POST['tipocombust'];
        $cantidad = $_POST['cantidad'];
        $unidad_cantidad = $_POST['unidad_cantidad'];
        $chimenea = $_POST['chimenea'];
        $equipo_de_control = $_POST['equipo_de_control'];
        $porc_s = $_POST['porc_s'];

        $modelo = new EquivalenteCombustibleModel($db);

        $resultado = $modelo->insertarEquivalenteCombustible($cveiden, $cveqpoc, $tipequia, $hr_ano, $tipo_de_emision, $capacidad, $unidad_capacidad, $tipocombust, $cantidad, $unidad_cantidad, $chimenea, $equipo_de_control, $porc_s);

        if ($resultado === true) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'error' => $resultado));
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'obtener') {
        $cveiden = $_POST['cveiden'];

        $modelo = new EquivalenteCombustibleModel($db);
        $equivalentes = $modelo->obtenerEquivalentesCombustibles($cveiden);

        echo json_encode($equivalentes);
    }
}

$db->close();
?>
