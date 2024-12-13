<?php
class SumaParticulasModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarSumaParticula($co2_suma_sc, $ch4_suma_sc, $n2o_suma_sc, $cveiden) {
        $stmt = $this->conn->prepare("INSERT INTO SumaParticulas (CVEIDEN, CO2_SUMA_SC, CH4_SUMA_SC, N2O_SUMA_SC) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $cveiden, $co2_suma_sc, $ch4_suma_sc, $n2o_suma_sc);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerSumaParticulas($cveiden) {
        $sumaParticulas = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN,CO2_SUMA_SC, CH4_SUMA_SC, N2O_SUMA_SC FROM SumaParticulas WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $sumaParticulas[] = $row;
        }

        return $sumaParticulas;
    }
}
?>
