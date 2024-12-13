<?php
class EquivalenciasContaminantesControlModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarEquivalenciaContaminanteControl($cveiden, $cveqpocon, $tipo_de_eq_control, $eficiencia, $metodo_de_estimacion) {
        $stmt = $this->conn->prepare("INSERT INTO EquivalenciasContaminantesControl (CVEIDEN, CVEQPOCON, TIPO_DE_EQ_CONTROL, EFICIENCIA, METODO_DE_ESTIMACION) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $cveiden, $cveqpocon, $tipo_de_eq_control, $eficiencia, $metodo_de_estimacion);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerEquivalenciasContaminantesControl($cveiden) {
        $equivalencias = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, CVEQPOCON, TIPO_DE_EQ_CONTROL, EFICIENCIA, METODO_DE_ESTIMACION FROM EquivalenciasContaminantesControl WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $equivalencias[] = $row;
        }

        return $equivalencias;
    }
}
?>
