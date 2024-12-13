<?php
class TipoCombustiblePoderesNetosModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarTipoCombustiblePoderesNetos(
        $cveiden,
        $tipo_combustible,
        $poder_calorifico_neto,
        $unidad_medida_kj_m3,
        $unidad_medida_mj_t,
        $cantidad_consumo,
        $factor_conversion_bep,
        $equivalencia_unidades_bep_m3,
        $equivalencia_unidades_bep_t,
        $co2_t_mj,
        $ch4_kg_mj,
        $n2o_kg_mj
    ) {
        $stmt = $this->conn->prepare("INSERT INTO TipoCombustiblePoderesNetos (CVEIDEN, TIPO_DE_COMBUSTIBLE, PODER_CALORIFICO_NETO, UNIDAD_DE_MEDIDA_KJ_M3, UNIDAD_DE_MEDIDA_MJ_T, CANTIDAD_DE_CONSUMO, FACTOR_DE_CONVERSION_A_BEP, EQUIVALENCIA_DE_UNIDADES_BEP_M3, EQUIVALENCIA_DE_UNIDADES_BEP_T, CO2_T_MJ, CH4_KG_MJ, N2O_KG_MJ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $cveiden, $tipo_combustible, $poder_calorifico_neto, $unidad_medida_kj_m3, $unidad_medida_mj_t, $cantidad_consumo, $factor_conversion_bep, $equivalencia_unidades_bep_m3, $equivalencia_unidades_bep_t, $co2_t_mj, $ch4_kg_mj, $n2o_kg_mj);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function obtenerTipoCombustiblePoderesNetos($cveiden) {
        $tipoCombustiblePoderesNetos = array();
        $stmt = $this->conn->prepare("SELECT CVEIDEN, TIPO_DE_COMBUSTIBLE, PODER_CALORIFICO_NETO, UNIDAD_DE_MEDIDA_KJ_M3, UNIDAD_DE_MEDIDA_MJ_T, CANTIDAD_DE_CONSUMO, FACTOR_DE_CONVERSION_A_BEP, EQUIVALENCIA_DE_UNIDADES_BEP_M3, EQUIVALENCIA_DE_UNIDADES_BEP_T, CO2_T_MJ, CH4_KG_MJ, N2O_KG_MJ FROM TipoCombustiblePoderesNetos WHERE CVEIDEN = ?");
        $stmt->bind_param("s", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $tipoCombustiblePoderesNetos[] = $row;
        }

        return $tipoCombustiblePoderesNetos;
    }
}
?>
