<?php
session_start();
require_once '../Modelo/empresa_model.php';

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

$query_section1 = "SELECT COUNT(*) AS count FROM EMPRESA WHERE CVEIDEN = ?";
$stmt_section1 = $db->prepare($query_section1);
$stmt_section1->bind_param("s", $cveiden);
$stmt_section1->execute();
$result_section1 = $stmt_section1->get_result()->fetch_assoc();
$response['section1'] = $result_section1['count'] > 0;

$query_section2 = "SELECT COUNT(*) AS count FROM MATERIAS_PRIMAS WHERE CVEIDEN = ?";
$stmt_section2 = $db->prepare($query_section2);
$stmt_section2->bind_param("s", $cveiden);
$stmt_section2->execute();
$result_section2 = $stmt_section2->get_result()->fetch_assoc();
$response['section2'] = $result_section2['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM PRODUCTOS WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section3'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM COMBUSTIBLES WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section4'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM DATOSINSUMOEMPRESARIAL WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section5'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM COMPONENTESCOMBUSTIBLES WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section6'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM COMPONENTESPARTICULASPROCESOS WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section7'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM SUMAPARTICULAS WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section8'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM DATOSRESPONSABLEEMPRESA WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section9'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM CHIMENEA WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section10'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM COMPUESTOSCHIMENEA WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section11'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM REGISTROACTIVIDADESPROCESO WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section12'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM ACTIVIDADPARTICULASPROCESOS WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);  
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section13'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM EQUIVALENTECOMBUSTIBLE WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section14'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM EQUIVALENCIAPARTICULASCOMBUSTIBLE WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section15'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM EQUIVALENCIASCONTAMINANTESCONTROL WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute(); 
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section16'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM CONTROLCONTAMINANTES WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section17'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM ACTIVIDADSUMINISTRO WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section18'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM COMBUSTIBLESPODERESNETOS WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section19'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM TIPOCOMBUSTIBLEPODERESNETOS WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section20'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM PRODUCCIONUSOCFCS WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section21'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM PRODUCCIONCFCsHFCS WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section22'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM ENERGIAELECTRICA WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section23'] = $result_section3['count'] > 0;

$query_section3 = "SELECT COUNT(*) AS count FROM ProduccionEnergiaElectrica WHERE CVEIDEN = ?";
$stmt_section3 = $db->prepare($query_section3);
$stmt_section3->bind_param("s", $cveiden);
$stmt_section3->execute();
$result_section3 = $stmt_section3->get_result()->fetch_assoc();
$response['section24'] = $result_section3['count'] > 0;

header('Content-Type: application/json');
echo json_encode($response);

$db->close();
?>
