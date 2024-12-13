<?php
class ControlContaminantesModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarControlContaminante($cveiden, $contam_control_1, $contam_control_2, $contam_control_3) {
        $stmt = $this->conn->prepare("INSERT INTO ControlContaminantes (CVEIDEN, CONTAM_CONTROL_1, CONTAM_CONTROL_2, CONTAM_CONTROL_3) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $cveiden, $contam_control_1, $contam_control_2, $contam_control_3);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerControlContaminantes($cveiden) {
        $controlContaminantes = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, CONTAM_CONTROL_1, CONTAM_CONTROL_2, CONTAM_CONTROL_3 FROM ControlContaminantes WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $controlContaminantes[] = $row;
        }

        return $controlContaminantes;
    }
}
?>
