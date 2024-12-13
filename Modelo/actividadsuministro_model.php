<?php
class ActividadSuministroModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarActividadSuministro($actividad, $equipo_combustion, $situacion, $md, $ct, $ci, $cveiden) {
        $stmt = $this->conn->prepare("INSERT INTO ActividadSuministro (CVEIDEN, ACTIVIDAD, EQUIPO_DE_COMBUSTION, SITUACION, MD, CT, CI) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $cveiden, $actividad, $equipo_combustion, $situacion, $md, $ct, $ci);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerActividadesSuministro($cveiden) {
        $actividades = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, ACTIVIDAD, EQUIPO_DE_COMBUSTION, SITUACION, MD, CT, CI FROM ActividadSuministro WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $actividades[] = $row;
        }

        return $actividades;
    }
}
?>
