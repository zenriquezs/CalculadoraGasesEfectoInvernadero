<?php
session_start();
require_once '../Controlador/controlador.php';
require_once '../Modelo/usuarios_model.php';

$db = new mysqli($db_servername, $db_username, $db_password, $db_name);

if ($db->connect_error) {
    die("Error en la conexión a la base de datos: " . $db->connect_error);
}

$cveiden = $_POST['cveiden'];
$password = $_POST['password'];

$query = "SELECT * FROM usuarios WHERE cveiden='$cveiden' AND password='$password'";
$result = $db->query($query);

if ($result->num_rows > 0) {
    $_SESSION['loggedin'] = true;
    $_SESSION['cveiden'] = $cveiden;

    // Verificar si el usuario es 'ADMIN'
    if ($cveiden === 'ADMIN') {
        // Redirigir al menú de administrador si el usuario es ADMIN
        header("Location: ../Vista/menuAdministrador.html");
    } else {
        // Redirigir a la página de inicio para otros usuarios
        header("Location: ../Vista/inicio.html");
    }
} else {
    echo '<script>alert("Usuario o contraseña incorrectos");</script>';
    header("Location: ../Vista/index.html");
}

$db->close();
?>
