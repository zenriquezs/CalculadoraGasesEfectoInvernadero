<?php
if (isset($_POST['CVEIDEN'])) {
    $CVEIDEN = $_POST['CVEIDEN'];

    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "calculadora";

    $conexion = new mysqli($db_servername, $db_username, $db_password, $db_name);

    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }

    $query = "DELETE FROM USUARIOS WHERE CVEIDEN = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $CVEIDEN);

    if ($stmt->execute()) {
        echo "Usuario eliminado exitosamente.";
    } else {
        echo "Error al eliminar el usuario.";
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "No se ha proporcionado un ID de usuario.";
}
?>
