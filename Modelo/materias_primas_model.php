<?php
class MateriasPrimasModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarMateriaPrima($materiaPrima, $consumo, $unidad, $cveiden) {
        // Verificar si el CVEIDEN existe en la tabla Empresa
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM Empresa WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count == 0) {
            return ['success' => false, 'error' => 'El CVEIDEN no existe en la tabla Empresa.'];
        }

        $stmt = $this->conn->prepare("INSERT INTO MATERIAS_PRIMAS (CVEIDEN, MATERIAPRIMA, CONSUMO, UNIDAD) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $cveiden, $materiaPrima, $consumo, $unidad);

        $result = $stmt->execute();
        $stmt->close();

        return ['success' => $result];
    }

    public function obtenerMateriasPrimas($cveiden) {
        $stmt = $this->conn->prepare("SELECT CVEIDEN, MATERIAPRIMA, CONSUMO, UNIDAD FROM MATERIAS_PRIMAS WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        $materiasPrimas = array();
        while ($row = $result->fetch_assoc()) {
            $materiasPrimas[] = $row; 
        }

        $stmt->close();
        return $materiasPrimas;
    } 
}

?>
