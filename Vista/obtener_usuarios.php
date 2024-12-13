<?php
$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "calculadora";

$conexion = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

$query = "SELECT CVEIDEN FROM USUARIOS WHERE CVEIDEN != 'ADMIN'";
$result = $conexion->query($query);

$usuarios = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row; 
    }
}

header('Content-Type: application/json');
echo json_encode($usuarios);

$conexion->close();
?>
