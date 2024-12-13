<?php
class CompuestosChimeneaModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarCompuestosChimenea($cveiden, $cvech, $co2, $tip_co2, $ch4, $tip_ch4, $n2o, $tip_n2o) {
        $stmt = $this->conn->prepare("INSERT INTO CompuestosChimenea (CVEIDEN, CVECH, CO2, TIP_CO2, CH4, TIP_CH4, N2O, TIP_N2O) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $cveiden, $cvech, $co2, $tip_co2, $ch4, $tip_ch4, $n2o, $tip_n2o);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerCompuestosChimenea($cveiden) {
        $compuestosChimenea = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, CVECH, CO2, TIP_CO2, CH4, TIP_CH4, N2O, TIP_N2O FROM CompuestosChimenea WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $compuestosChimenea[] = $row;
        }

        return $compuestosChimenea;
    }
}
?>
