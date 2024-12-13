<?php
class DatosResponsableModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarDatosResponsable($cveiden, $responsable_tecnico, $elaborado, $observaciones, $zona) {
        $stmt = $this->conn->prepare("INSERT INTO DatosResponsableEmpresa (CVEIDEN, RESPONSABLE_TECNICO, ELABORADO, OBSERVACIONES, ZONA) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $cveiden, $responsable_tecnico, $elaborado, $observaciones, $zona);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerDatosResponsables($cveiden) {
        $datosResponsables = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, RESPONSABLE_TECNICO, ELABORADO, OBSERVACIONES, ZONA FROM DatosResponsableEmpresa WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $datosResponsables[] = $row;
        }

        return $datosResponsables;
    }
}
?>
