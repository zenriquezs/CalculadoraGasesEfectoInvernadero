<?php
class ProduccionUsoCFCsModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarProduccionUsoCFCs(
        $cveiden,
        $cvech,
        $equivalentes_electricidad,
        $hr_ano,
        $tipo_emision,
        $capacidad,
        $unidad
    ) {
        $stmt = $this->conn->prepare("INSERT INTO ProduccionUsoCFCs (CVEIDEN, CVECH, EQUIVALENTES_DE_ELECTRICIDAD, HR_ANO, TIPO_DE_EMISION, CAPACIDAD, UNIDAD) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdssds", $cveiden, $cvech, $equivalentes_electricidad, $hr_ano, $tipo_emision, $capacidad, $unidad);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerProduccionUsoCFCs($cveiden) {
        $produccionUsoCFCs = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, CVECH, EQUIVALENTES_DE_ELECTRICIDAD, HR_ANO, TIPO_DE_EMISION, CAPACIDAD, UNIDAD FROM ProduccionUsoCFCs WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $produccionUsoCFCs[] = $row;
        }

        return $produccionUsoCFCs;
    }
}
?>
