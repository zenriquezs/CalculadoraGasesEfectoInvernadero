<?php
class CombustiblesModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarCombustible($cveiden, $combustible, $consumo, $unidad) {
        $stmt = $this->conn->prepare("INSERT INTO Combustibles (CVEIDEN, Combustible, Consumo, Unidad) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $cveiden, $combustible, $consumo, $unidad);
        if ($stmt->execute()) {
            return array("success" => true, "message" => "Nuevo registro creado exitosamente");
        } else {
            return array("success" => false, "error" => $stmt->error);
        }
        $stmt->close();
    }

    public function obtenerCombustibles($cveiden) {
        $combustibles = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, Combustible, Consumo, Unidad FROM Combustibles WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $combustibles[] = $row;
        }

        $stmt->close();
        return $combustibles;
    }
}
?>
