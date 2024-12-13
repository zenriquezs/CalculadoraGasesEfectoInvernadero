<?php
class ComponentesParticulasProcesosModel {
    private $db;

    public function __construct($conexion) {
        $this->db = $conexion;
    }

    public function insertarComponentesParticulas($cveiden, $co2_proc_sc, $ch4_proc_sc, $n2o_proc_sc) {
        $stmt = $this->db->prepare("INSERT INTO ComponentesParticulasProcesos (CVEIDEN, CO2_PROC_SC, CH4_PROC_SC, N2O_PROC_SC) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sddd", $cveiden, $co2_proc_sc, $ch4_proc_sc, $n2o_proc_sc);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return "Error al insertar componente de partículas: " . $stmt->error;
        }
        
        $stmt->close();
    }

    public function obtenerComponentesParticulas($cveiden) {
        $componentes = array();
        $stmt = $this->db->prepare("SELECT CVEIDEN,CO2_PROC_SC, CH4_PROC_SC, N2O_PROC_SC FROM ComponentesParticulasProcesos WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $componentes[] = $row;
        }

        return $componentes;
    }
}
?>
