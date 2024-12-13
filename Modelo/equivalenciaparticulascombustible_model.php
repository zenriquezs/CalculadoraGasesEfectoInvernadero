<?php
class EquivalenciaParticulasCombustibleModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarEquivalenciaParticulasCombustible($cveiden, $co2_comb_sc, $tip_co2, $ch4_comb_sc, $tip_ch4, $n2o_comb_sc, $tip_n2o) {
        $stmt = $this->conn->prepare("INSERT INTO EquivalenciaParticulasCombustible (CVEIDEN, CO2_COMB_SC, TIP_CO2, CH4_COMB_SC, TIP_CH4, N2O_COMB_SC, TIP_N2O) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $cveiden, $co2_comb_sc, $tip_co2, $ch4_comb_sc, $tip_ch4, $n2o_comb_sc, $tip_n2o);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerEquivalenciaParticulasCombustible($cveiden) {
        $equivalenciasParticulasCombustible = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, CO2_COMB_SC, TIP_CO2, CH4_COMB_SC, TIP_CH4, N2O_COMB_SC, TIP_N2O FROM EquivalenciaParticulasCombustible WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $equivalenciasParticulasCombustible[] = $row;
        }

        return $equivalenciasParticulasCombustible;
    }
}
?>
