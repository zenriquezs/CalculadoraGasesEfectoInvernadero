<?php
class EnergiaElectricaModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarEnergiaElectrica($cveiden, $cvech, $hr_ano, $tipo_emision, $capacidad, $unidad) {
        $stmt = $this->conn->prepare("INSERT INTO EnergiaElectrica (CVEIDEN, CVECH, HR_ANO, TIPO_DE_EMISION, CAPACIDAD, UNIDAD) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $cveiden, $cvech, $hr_ano, $tipo_emision, $capacidad, $unidad);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerEnergiaElectrica($cveiden) {
        $energiaElectrica = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, CVECH, HR_ANO, TIPO_DE_EMISION, CAPACIDAD, UNIDAD FROM EnergiaElectrica WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $energiaElectrica[] = $row;
        }

        return $energiaElectrica;
    }
}
?>
