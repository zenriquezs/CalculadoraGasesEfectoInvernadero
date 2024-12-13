<?php
class CombustiblesPoderesNetosModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarCombustiblesPoderesNetos($cveiden, $cvech, $tipo_combustible, $hr_ano, $tipo_emision, $capacidad, $unidad) {
        $stmt = $this->conn->prepare("INSERT INTO CombustiblesPoderesNetos (CVEIDEN, CVECH, TIPO_DE_COMBUSTIBLE, HR_ANO, TIPO_DE_EMISION, CAPACIDAD, UNIDAD) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $cveiden, $cvech, $tipo_combustible, $hr_ano, $tipo_emision, $capacidad, $unidad);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerCombustiblesPoderesNetos($cveiden) {
        $combustiblesPoderesNetos = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, CVECH, TIPO_DE_COMBUSTIBLE, HR_ANO, TIPO_DE_EMISION, CAPACIDAD, UNIDAD FROM CombustiblesPoderesNetos WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $combustiblesPoderesNetos[] = $row;
        }

        return $combustiblesPoderesNetos;
    }
}
?>
