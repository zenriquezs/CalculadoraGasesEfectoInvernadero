<?php
class ProduccionCFCsHFCsModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarProduccionCFCsHFCs($cveiden, $actividad, $nombreSustancia, $masaConsumida, $unidadMedida, $masaAdicionada, $cantidad, $unidad, $co2, $ch4, $n2o) {
        $stmt = $this->conn->prepare("INSERT INTO ProduccionCFCsHFCs (CVEIDEN, ACTIVIDAD, NOMBRE_DE_SUSTANCIA, MASA_SUSTANCIA_CONSUMIDA, UNIDAD_MEDIDA, MASA_SUSTANCIA_ADICIONADA, CANTIDAD, UNIDAD, CO2, CH4, N2O) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdssdssdd", $cveiden, $actividad, $nombreSustancia, $masaConsumida, $unidadMedida, $masaAdicionada, $cantidad, $unidad, $co2, $ch4, $n2o);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerProduccionCFCsHFCs($cveiden) {
        $produccionCFCsHFCs = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, ACTIVIDAD, NOMBRE_DE_SUSTANCIA, MASA_SUSTANCIA_CONSUMIDA, UNIDAD_MEDIDA, MASA_SUSTANCIA_ADICIONADA, CANTIDAD, UNIDAD, CO2, CH4, N2O FROM ProduccionCFCsHFCs WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $produccionCFCsHFCs[] = $row;
        }

        return $produccionCFCsHFCs;
    }
}
?>
