<?php
class EquivalenteCombustibleModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarEquivalenteCombustible($cveiden, $cveqpoc, $tipequia, $hr_ano, $tipo_de_emision, $capacidad, $unidad_capacidad, $tipocombust, $cantidad, $unidad_cantidad, $chimenea, $equipo_de_control, $porc_s) {
        $stmt = $this->conn->prepare("INSERT INTO EquivalenteCombustible (CVEIDEN, CVEQPOC, TIPEQUIA, HR_ANO, TIPO_DE_EMISION, CAPACIDAD, UNIDAD_CAPACIDAD, TIPOCOMBUST, CANTIDAD, UNIDAD_CANTIDAD, CHIMENEA, EQUIPO_DE_CONTROL, PORC_S) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdssdssdsds", $cveiden, $cveqpoc, $tipequia, $hr_ano, $tipo_de_emision, $capacidad, $unidad_capacidad, $tipocombust, $cantidad, $unidad_cantidad, $chimenea, $equipo_de_control, $porc_s);

        if ($stmt->execute()) {
            return true;
        } else {
            return $stmt->error;
        }
        $stmt->close();
    }

    public function obtenerEquivalentesCombustibles($cveiden) {
        $equivalentes = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, CVEQPOC, TIPEQUIA, HR_ANO, TIPO_DE_EMISION, CAPACIDAD, UNIDAD_CAPACIDAD, TIPOCOMBUST, CANTIDAD, UNIDAD_CANTIDAD, CHIMENEA, EQUIPO_DE_CONTROL, PORC_S FROM EquivalenteCombustible WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $equivalentes[] = $row;
        }

        return $equivalentes;
    }
}
?>
