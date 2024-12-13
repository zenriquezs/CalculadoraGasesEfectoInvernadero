<?php
class InsumoEmpresarialModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarInsumoEmpresarial($cveiden, $nec, $nap, $nch, $necont) {
        $stmt = $this->conn->prepare("INSERT INTO DatosInsumoEmpresarial (CVEIDEN, NEC, NAP, NCH, NECONT) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("siiii", $cveiden, $nec, $nap, $nch, $necont);
        if ($stmt->execute()) {
            return "Nuevo registro creado exitosamente";
        } else {
            return "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    public function obtenerInsumosEmpresariales($cveiden) {
        $insumosEmpresariales = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, NEC, NAP, NCH, NECONT FROM DatosInsumoEmpresarial WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $insumosEmpresariales[] = $row;
        }

        return $insumosEmpresariales;
    }
}
?>
