<?php
class UsuarioModel {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function autenticarUsuario($cveiden, $password) {
        $query = "SELECT * FROM usuarios WHERE cveiden=? AND password=?";
        $stmt = $this->conexion->prepare($query);

        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param("ss", $cveiden, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
    }
}
?>
