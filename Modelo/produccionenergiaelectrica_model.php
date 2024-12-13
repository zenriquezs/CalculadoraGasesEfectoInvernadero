<?php
class ProduccionEnergiaElectricaModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarProduccionEnergiaElectrica($cveiden, $capacidad_instalada, $tipo_de_planta, $generacion_anual_mwh, $consumo_combustible, $tipo, $cantidad, $unidad, $co2, $ch4, $n2o) {
        $stmt = $this->conn->prepare("INSERT INTO ProduccionEnergiaElectrica (CVEIDEN, CAPACIDAD_INSTALADA, TIPO_DE_PLANTA, GENERACION_ANUAL_MWH, CONSUMO_COMBUSTIBLE, TIPO, CANTIDAD, UNIDAD, CO2, CH4, N2O) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $cveiden, $capacidad_instalada, $tipo_de_planta, $generacion_anual_mwh, $consumo_combustible, $tipo, $cantidad, $unidad, $co2, $ch4, $n2o);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerProduccionEnergiaElectrica($cveiden) {
        $produccionEnergiaElectrica = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, CAPACIDAD_INSTALADA, TIPO_DE_PLANTA, GENERACION_ANUAL_MWH, CONSUMO_COMBUSTIBLE, TIPO, CANTIDAD, UNIDAD, CO2, CH4, N2O FROM ProduccionEnergiaElectrica WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $produccionEnergiaElectrica[] = $row;
        }

        return $produccionEnergiaElectrica;
    }
}
?>
