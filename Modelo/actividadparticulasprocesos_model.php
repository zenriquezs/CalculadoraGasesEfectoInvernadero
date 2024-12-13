<?php
class ActividadParticulasProcesosModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarActividadParticulasProceso($cveiden, $co2_proc_sc, $tip_co2, $ch4_proc_sc, $tip_ch4, $n2o_proc_sc, $tip_n2o) {
        $stmt = $this->conn->prepare("INSERT INTO ActividadParticulasProcesos (CVEIDEN, CO2_PROC_SC, TIP_CO2, CH4_PROC_SC, TIP_CH4, N2O_PROC_SC, TIP_N2O) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $cveiden, $co2_proc_sc, $tip_co2, $ch4_proc_sc, $tip_ch4, $n2o_proc_sc, $tip_n2o);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerActividadParticulasProcesos($cveiden) {
        $actividadesParticulasProcesos = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, CO2_PROC_SC, TIP_CO2, CH4_PROC_SC, TIP_CH4, N2O_PROC_SC, TIP_N2O FROM ActividadParticulasProcesos WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $actividadesParticulasProcesos[] = $row;
        }

        return $actividadesParticulasProcesos;
    }
}
?>
