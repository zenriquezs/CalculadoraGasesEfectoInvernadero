<?php
class ChimeneaModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarChimenea($cveiden, $cvech, $altura, $diametro, $velocidad, $temperatura) {
        $stmt = $this->conn->prepare("INSERT INTO Chimenea (CVEIDEN, CVECH, ALTURA, DIAMETRO, VELOCIDAD, TEMPERATURA) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $cveiden, $cvech, $altura, $diametro, $velocidad, $temperatura);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerChimeneas($cveiden) {
        $chimeneas = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, CVECH, ALTURA, DIAMETRO, VELOCIDAD, TEMPERATURA FROM Chimenea WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $chimeneas[] = $row;
        }

        return $chimeneas;
    }
}
?>
