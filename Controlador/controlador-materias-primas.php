<?php
require_once '../Modelo/materias_primas_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "calculadora";

    $db = new mysqli($db_servername, $db_username, $db_password, $db_name);

    if ($db->connect_error) {
        die('Error en la conexión a la base de datos: ' . $db->connect_error);
    }
    $materiasPrimasModel = new MateriasPrimasModel($db);

    if (isset($_POST['action']) && $_POST['action'] === 'guardar') {
        $cveiden = $_POST['cveiden'];
        $materiaPrima = $_POST['materia_prima'];
        $consumo = $_POST['consumo'];
        $unidad = $_POST['unidad'];    

        $resultado = $materiasPrimasModel->insertarMateriaPrima($materiaPrima, $consumo, $unidad, $cveiden);

        header('Content-Type: application/json');
        echo json_encode($resultado);

        exit();
    }

    if (isset($_POST['action']) && $_POST['action'] === 'obtener') {
        $cveiden = $_POST['cveiden'];
        $materiasPrimas = $materiasPrimasModel->obtenerMateriasPrimas($cveiden);

        header('Content-Type: application/json');
        echo json_encode($materiasPrimas);

        exit();
    }

    $db->close();
}

?>
