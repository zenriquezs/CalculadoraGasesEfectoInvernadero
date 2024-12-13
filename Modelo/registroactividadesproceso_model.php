<?php
class RegistroActividadesProcesoModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarRegistroActividadProceso($cveiden, $cveactp, $tipactiv_gral, $proceso, $unidad_fe, $hr_ano, $tipo_de_emision, $equipo_de_control, $chimenea) {
        $stmt = $this->conn->prepare("INSERT INTO RegistroActividadesProceso (CVEIDEN, CVEACTP, TIPACTIV_GRAL, PROCESO, UNIDAD_FE, HR_ANO, TIPO_DE_EMISION, EQUIPO_DE_CONTROL, CHIMENEA) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $cveiden, $cveactp, $tipactiv_gral, $proceso, $unidad_fe, $hr_ano, $tipo_de_emision, $equipo_de_control, $chimenea);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerRegistroActividadesProceso($cveiden) {
        $actividadesProceso = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, CVEACTP, TIPACTIV_GRAL, PROCESO, UNIDAD_FE, HR_ANO, TIPO_DE_EMISION, EQUIPO_DE_CONTROL, CHIMENEA FROM RegistroActividadesProceso WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $actividadesProceso[] = $row;
        }

        return $actividadesProceso;
    }
}
?>
