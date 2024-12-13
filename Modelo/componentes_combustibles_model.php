<?php
class ComponentesCombustiblesModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarComponenteCombustible($cveiden, $co2_comb_sc, $ch4_comb_sc, $n2o_comb_sc) {
        $stmt = $this->conn->prepare("INSERT INTO ComponentesCombustibles (CVEIDEN, CO2_COMB_SC, CH4_COMB_SC, N2O_COMB_SC) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sddd", $cveiden, $co2_comb_sc, $ch4_comb_sc, $n2o_comb_sc);

        if ($stmt->execute()) {
            return true;
        } else {
            return "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    public function obtenerComponentesCombustibles($cveiden) {
        $componentes = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, CO2_COMB_SC, CH4_COMB_SC, N2O_COMB_SC FROM ComponentesCombustibles WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $componentes[] = $row;
        }

        return $componentes;
    }
}
?>
