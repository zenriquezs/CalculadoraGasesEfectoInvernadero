<?php
require('fpdf/fpdf.php');

class PDF_UTF8 extends FPDF 
{
    function Cell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '') {
        $txt = iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $txt);
        parent::Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);
    }

    function Header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Reporte de la Empresa', 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
    function FancyTable($header, $data, $w)
    {
        $this->SetFillColor(79, 129, 189);
        $this->SetTextColor(255);
        $this->SetDrawColor(50, 50, 100);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();
        
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        
        $fill = false;
        foreach ($data as $row) {
            for ($i = 0; $i < count($row); $i++) {
                $this->Cell($w[$i], 6, $row[$i], 'LR', 0, 'L', $fill);
            }
            $this->Ln();
            $fill = !$fill;
        }
        
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}


if (isset($_GET['CVEIDEN'])) {
    $CVEIDEN = $_GET['CVEIDEN'];

    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "calculadora";

    $conexion = new mysqli($db_servername, $db_username, $db_password, $db_name);

    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }
    function MultiCellJustify($pdf, $w, $h, $text, $border = 0, $align = 'J', $fill = false)
    {        
        $pdf->MultiCell($w, $h, $text, $border, $align, $fill);
    }
   $pdf = new PDF_UTF8();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 8);
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', 10);
    $text = "Este reporte proporciona una visión general de las principales actividades y datos operativos de la empresa seleccionada. Incluye un resumen de la información básica de la empresa, como su nombre, ubicación y sector de actividad, así como detalles clave sobre los recursos utilizados y los productos generados.Además, se presenta un análisis de los consumos de materias primas y combustibles, junto con las emisiones relacionadas y las medidas adoptadas para el control de contaminantes. Las tablas incluidas ofrecen un desglose preciso de los datos operativos y medioambientales de la empresa, facilitando así una comprensión clara de su desempeño y cumplimiento en cuanto a los recursos energéticos y las emisiones.Este informe está diseñado para ofrecer una visión integral de la gestión y el uso de insumos, combustibles y la producción en la empresa, proporcionando información valiosa tanto para el análisis interno como para la toma de decisiones estratégicas.";
    MultiCellJustify($pdf, 0, 5, $text);
    $pdf->Ln(10);

    $query_empresa = "SELECT * FROM Empresa WHERE CVEIDEN = ?";
    $stmt_empresa = $conexion->prepare($query_empresa);
    $stmt_empresa->bind_param("s", $CVEIDEN);
    $stmt_empresa->execute();
    $result_empresa = $stmt_empresa->get_result();

    if ($result_empresa->num_rows > 0) {
        $empresa = $result_empresa->fetch_assoc();

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 10, 'Informacion de la Empresa', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 8);

        $header = array('Nombre', 'Sector', 'Ubicacion', 'Municipio', 'Entidad Federativa');
        $data = array(
            array($empresa['NombreEmpresa'], $empresa['SECTOR'], $empresa['UBICACION'], $empresa['MUNICIPIO'], $empresa['ENTIDADFEDERATIVA'])
        );
        $w = array(40, 30, 30, 30, 30); 
        $pdf->FancyTable($header, $data, $w);
    }
    $pdf->Ln(5); 

    // Materias Primas
    $query_materias = "SELECT * FROM MATERIAS_PRIMAS WHERE CVEIDEN = ?";
    $stmt_materias = $conexion->prepare($query_materias);
    $stmt_materias->bind_param("s", $CVEIDEN);
    $stmt_materias->execute();
    $result_materias = $stmt_materias->get_result();

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 10, 'Materias Primas', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 8);
    if ($result_materias->num_rows > 0) {
        $header = array('Materia Prima', 'Consumo', 'Unidad');
        $data = array();
        while ($row = $result_materias->fetch_assoc()) {
            $data[] = array($row['MATERIAPRIMA'], $row['CONSUMO'], $row['UNIDAD']);
        }
        $w = array(70, 40, 40); 
        $pdf->FancyTable($header, $data, $w);
    } else {
        $pdf->Cell(0, 10, 'No hay materias primas registradas.', 0, 1);
    }
    $pdf->Ln(5); 

    // Productos
    $query_productos = "SELECT * FROM PRODUCTOS WHERE CVEIDEN = ?";
    $stmt_productos = $conexion->prepare($query_productos);
    $stmt_productos->bind_param("s", $CVEIDEN);
    $stmt_productos->execute();
    $result_productos = $stmt_productos->get_result();

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 10, 'Productos', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 8);
    if ($result_productos->num_rows > 0) {
        $header = array('Producto', 'Cantidad', 'Unidad');
        $data = array();
        while ($row = $result_productos->fetch_assoc()) {
            $data[] = array($row['Producto'], $row['Cantidad'], $row['Unidad']);
        }
        $w = array(70, 40, 40);
        $pdf->FancyTable($header, $data, $w);
    } else {
        $pdf->Cell(0, 10, 'No hay productos registrados.', 0, 1);
    }
    $pdf->Ln(5);

    // Combustibles
    $query_combustibles = "SELECT * FROM Combustibles WHERE CVEIDEN = ?";
    $stmt_combustibles = $conexion->prepare($query_combustibles);
    $stmt_combustibles->bind_param("s", $CVEIDEN);
    $stmt_combustibles->execute();
    $result_combustibles = $stmt_combustibles->get_result();

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 10, 'Combustibles', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 8);
    if ($result_combustibles->num_rows > 0) {
        $header = array('Combustible', 'Consumo', 'Unidad');
        $data = array();
        while ($row = $result_combustibles->fetch_assoc()) {
            $data[] = array($row['Combustible'], $row['Consumo'], $row['Unidad']);
        }
        $w = array(70, 40, 40);
        $pdf->FancyTable($header, $data, $w);
    } else {
        $pdf->Cell(0, 10, 'No hay combustibles registrados.', 0, 1);
    }
    
    // DatosInsumoEmpresarial
$query_datosInsumo = "SELECT * FROM DatosInsumoEmpresarial WHERE CVEIDEN = ?";
$stmt_datosInsumo = $conexion->prepare($query_datosInsumo);
$stmt_datosInsumo->bind_param("s", $CVEIDEN);
$stmt_datosInsumo->execute();
$result_datosInsumo = $stmt_datosInsumo->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Ln(12);
$pdf->Cell(0, 10, 'Datos de Insumo Empresarial', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_datosInsumo->num_rows > 0) {
    $header = array('NEC', 'NAP', 'NCH', 'NECONT');
    $data = array();
    while ($row = $result_datosInsumo->fetch_assoc()) {
        $data[] = array($row['NEC'], $row['NAP'], $row['NCH'], $row['NECONT']);
    }
    $w = array(40, 40, 40, 40); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay datos de insumo empresarial registrados.', 0, 1);
}
$pdf->Ln(5);

// ComponentesCombustibles
$query_componentesCombustibles = "SELECT * FROM ComponentesCombustibles WHERE CVEIDEN = ?";
$stmt_componentesCombustibles = $conexion->prepare($query_componentesCombustibles);
$stmt_componentesCombustibles->bind_param("s", $CVEIDEN);
$stmt_componentesCombustibles->execute();
$result_componentesCombustibles = $stmt_componentesCombustibles->get_result();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Ln(12);
$pdf->Cell(0, 10, 'Componentes de Combustibles', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_componentesCombustibles->num_rows > 0) {
    $header = array('CO2', 'CH4', 'N2O');
    $data = array();
    while ($row = $result_componentesCombustibles->fetch_assoc()) {
        $data[] = array($row['CO2_COMB_SC'], $row['CH4_COMB_SC'], $row['N2O_COMB_SC']);
    }
    $w = array(40, 40, 40); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay componentes de combustibles registrados.', 0, 1);
}
$pdf->Ln(5);

// ComponentesParticulasProcesos
$query_componentesParticulas = "SELECT * FROM ComponentesParticulasProcesos WHERE CVEIDEN = ?";
$stmt_componentesParticulas = $conexion->prepare($query_componentesParticulas);
$stmt_componentesParticulas->bind_param("s", $CVEIDEN);
$stmt_componentesParticulas->execute();
$result_componentesParticulas = $stmt_componentesParticulas->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Componentes de Partículas en Procesos', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_componentesParticulas->num_rows > 0) {
    $header = array('CO2', 'CH4', 'N2O');
    $data = array();
    while ($row = $result_componentesParticulas->fetch_assoc()) {
        $data[] = array($row['CO2_PROC_SC'], $row['CH4_PROC_SC'], $row['N2O_PROC_SC']);
    }
    $w = array(40, 40, 40); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay componentes de partículas registrados.', 0, 1);
}
$pdf->Ln(5);

// ComponentesParticulasProcesos
$query_componentesParticulas = "SELECT * FROM ComponentesParticulasProcesos WHERE CVEIDEN = ?";
$stmt_componentesParticulas = $conexion->prepare($query_componentesParticulas);
$stmt_componentesParticulas->bind_param("s", $CVEIDEN);
$stmt_componentesParticulas->execute();
$result_componentesParticulas = $stmt_componentesParticulas->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Componentes de Partículas en Procesos', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_componentesParticulas->num_rows > 0) {
    $header = array('CO2', 'CH4', 'N2O');
    $data = array();
    while ($row = $result_componentesParticulas->fetch_assoc()) {
        $data[] = array($row['CO2_PROC_SC'], $row['CH4_PROC_SC'], $row['N2O_PROC_SC']);
    }
    $w = array(40, 40, 40); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay componentes de partículas registrados.', 0, 1);
}
$pdf->Ln(5);

// DatosResponsableEmpresa
$query_responsableEmpresa = "SELECT * FROM DatosResponsableEmpresa WHERE CVEIDEN = ?";
$stmt_responsableEmpresa = $conexion->prepare($query_responsableEmpresa);
$stmt_responsableEmpresa->bind_param("s", $CVEIDEN);
$stmt_responsableEmpresa->execute();
$result_responsableEmpresa = $stmt_responsableEmpresa->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Datos del Responsable de la Empresa', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_responsableEmpresa->num_rows > 0) {
    $header = array('Responsable Tecnico', 'Elaborado', 'Observaciones', 'Zona');
    $data = array();
    while ($row = $result_responsableEmpresa->fetch_assoc()) {
        $data[] = array($row['RESPONSABLE_TECNICO'], $row['ELABORADO'], $row['OBSERVACIONES'], $row['ZONA']);
    }
    $w = array(50, 30, 50, 30);
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay datos del responsable de la empresa registrados.', 0, 1);
}
$pdf->Ln(5);

// ControlContaminantes
$query_controlContaminantes = "SELECT * FROM ControlContaminantes WHERE CVEIDEN = ?";
$stmt_controlContaminantes = $conexion->prepare($query_controlContaminantes);
$stmt_controlContaminantes->bind_param("s", $CVEIDEN);
$stmt_controlContaminantes->execute();
$result_controlContaminantes = $stmt_controlContaminantes->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Control de Contaminantes', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_controlContaminantes->num_rows > 0) {
    $header = array('Contaminante Control 1', 'Contaminante Control 2', 'Contaminante Control 3');
    $data = array();
    while ($row = $result_controlContaminantes->fetch_assoc()) {
        $data[] = array($row['CONTAM_CONTROL_1'], $row['CONTAM_CONTROL_2'], $row['CONTAM_CONTROL_3']);
    }
    $w = array(60, 60, 60);
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay controles de contaminantes registrados.', 0, 1);
}
$pdf->Ln(5);

// ActividadSuministro
$query_actividadSuministro = "SELECT * FROM ActividadSuministro WHERE CVEIDEN = ?";
$stmt_actividadSuministro = $conexion->prepare($query_actividadSuministro);
$stmt_actividadSuministro->bind_param("s", $CVEIDEN);
$stmt_actividadSuministro->execute();
$result_actividadSuministro = $stmt_actividadSuministro->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Actividad de Suministro', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_actividadSuministro->num_rows > 0) {
    $header = array('Actividad', 'Equipo de Combustion', 'Situacion', 'MD', 'CT', 'CI');
    $data = array();
    while ($row = $result_actividadSuministro->fetch_assoc()) {
        $data[] = array($row['ACTIVIDAD'], $row['EQUIPO_DE_COMBUSTION'], $row['SITUACION'], $row['MD'], $row['CT'], $row['CI']);
    }
    $w = array(40, 40, 40, 20, 20, 20); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay actividades de suministro registradas.', 0, 1);
}
$pdf->Ln(5);


// CombustiblesPoderesNetos
$query_combustiblesPoderesNetos = "SELECT * FROM CombustiblesPoderesNetos WHERE CVEIDEN = ?";
$stmt_combustiblesPoderesNetos = $conexion->prepare($query_combustiblesPoderesNetos);
$stmt_combustiblesPoderesNetos->bind_param("s", $CVEIDEN);
$stmt_combustiblesPoderesNetos->execute();
$result_combustiblesPoderesNetos = $stmt_combustiblesPoderesNetos->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Combustibles - Poderes Netos', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_combustiblesPoderesNetos->num_rows > 0) {
    $header = array('Tipo de Combustible', 'Horas al Año', 'Capacidad', 'Unidad');
    $data = array();
    while ($row = $result_combustiblesPoderesNetos->fetch_assoc()) {
        $data[] = array($row['TIPO_DE_COMBUSTIBLE'], $row['HR_ANO'], $row['CAPACIDAD'], $row['UNIDAD']);
    }
    $w = array(40, 30, 40, 40); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay combustibles con poderes netos registrados.', 0, 1);
}
$pdf->Ln(5);

// TipoCombustiblePoderesNetos
$query_tipoCombustiblePoderesNetos = "SELECT * FROM TipoCombustiblePoderesNetos WHERE CVEIDEN = ?";
$stmt_tipoCombustiblePoderesNetos = $conexion->prepare($query_tipoCombustiblePoderesNetos);
$stmt_tipoCombustiblePoderesNetos->bind_param("s", $CVEIDEN);
$stmt_tipoCombustiblePoderesNetos->execute();
$result_tipoCombustiblePoderesNetos = $stmt_tipoCombustiblePoderesNetos->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Tipo de Combustible - Poderes Netos', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_tipoCombustiblePoderesNetos->num_rows > 0) {
    $header = array('Tipo de Combustible', 'Poder Calorífico Neto', 'Unidad de Medida (KJ/M3)');
    $data = array();
    while ($row = $result_tipoCombustiblePoderesNetos->fetch_assoc()) {
        $data[] = array($row['TIPO_DE_COMBUSTIBLE'], $row['PODER_CALORIFICO_NETO'], $row['UNIDAD_DE_MEDIDA_KJ_M3']);
    }
    $w = array(60, 40, 40);
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay tipos de combustible registrados.', 0, 1);
}
$pdf->Ln(5);

// ProduccionUsoCFCs
$query_usoCFCs = "SELECT * FROM ProduccionUsoCFCs WHERE CVEIDEN = ?";
$stmt_usoCFCs = $conexion->prepare($query_usoCFCs);
$stmt_usoCFCs->bind_param("s", $CVEIDEN);
$stmt_usoCFCs->execute();
$result_usoCFCs = $stmt_usoCFCs->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Producción y Uso de CFCs', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_usoCFCs->num_rows > 0) {
    $header = array('Clave Chimenea', 'Equivalentes de Electricidad', 'Horas al Año', 'Tipo de Emisión');
    $data = array();
    while ($row = $result_usoCFCs->fetch_assoc()) {
        $data[] = array($row['CVECH'], $row['EQUIVALENTES_DE_ELECTRICIDAD'], $row['HR_ANO'], $row['TIPO_DE_EMISION']);
    }
    $w = array(30, 50, 30, 30); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay información de producción y uso de CFCs.', 0, 1);
}
$pdf->Ln(5);

// ProduccionCFCsHFCs
$query_produccionCFCs = "SELECT * FROM ProduccionCFCsHFCs WHERE CVEIDEN = ?";
$stmt_produccionCFCs = $conexion->prepare($query_produccionCFCs);
$stmt_produccionCFCs->bind_param("s", $CVEIDEN);
$stmt_produccionCFCs->execute();
$result_produccionCFCs = $stmt_produccionCFCs->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Producción de CFCs y HFCs', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_produccionCFCs->num_rows > 0) {
    $header = array('Actividad', 'Nombre de Sustancia', 'Masa Sustancia Consumida', 'Unidad de Medida');
    $data = array();
    while ($row = $result_produccionCFCs->fetch_assoc()) {
        $data[] = array($row['ACTIVIDAD'], $row['NOMBRE_DE_SUSTANCIA'], $row['MASA_SUSTANCIA_CONSUMIDA'], $row['UNIDAD_MEDIDA']);
    }
    $w = array(40, 40, 40, 30);
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay información de producción de CFCs y HFCs registrada.', 0, 1);
}
$pdf->Ln(5);

// EnergiaElectrica
$query_energiaElectrica = "SELECT * FROM EnergiaElectrica WHERE CVEIDEN = ?";
$stmt_energiaElectrica = $conexion->prepare($query_energiaElectrica);
$stmt_energiaElectrica->bind_param("s", $CVEIDEN);
$stmt_energiaElectrica->execute();
$result_energiaElectrica = $stmt_energiaElectrica->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Energía Eléctrica', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_energiaElectrica->num_rows > 0) {
    $header = array('Clave Chimenea', 'Horas al Año', 'Tipo de Emisión', 'Capacidad');
    $data = array();
    while ($row = $result_energiaElectrica->fetch_assoc()) {
        $data[] = array($row['CVECH'], $row['HR_ANO'], $row['TIPO_DE_EMISION'], $row['CAPACIDAD']);
    }
    $w = array(30, 40, 40, 40);
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay registros de energía eléctrica.', 0, 1);
}
$pdf->Ln(5);

// ProduccionEnergiaElectrica
$query_produccionEnergia = "SELECT * FROM ProduccionEnergiaElectrica WHERE CVEIDEN = ?";
$stmt_produccionEnergia = $conexion->prepare($query_produccionEnergia);
$stmt_produccionEnergia->bind_param("s", $CVEIDEN);
$stmt_produccionEnergia->execute();
$result_produccionEnergia = $stmt_produccionEnergia->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Producción de Energía Eléctrica', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_produccionEnergia->num_rows > 0) {
    $header = array('Capacidad Instalada', 'Tipo de Planta', 'Generación Anual (MWh)', 'Consumo de Combustible');
    $data = array();
    while ($row = $result_produccionEnergia->fetch_assoc()) {
        $data[] = array($row['CAPACIDAD_INSTALADA'], $row['TIPO_DE_PLANTA'], $row['GENERACION_ANUAL_MWH'], $row['CONSUMO_COMBUSTIBLE']);
    }
    $w = array(40, 40, 40, 40); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay producción de energía eléctrica registrada.', 0, 1);
}
$pdf->Ln(5);

// ProduccionEnergiaElectrica
$query_produccionEnergia = "SELECT * FROM ProduccionEnergiaElectrica WHERE CVEIDEN = ?";
$stmt_produccionEnergia = $conexion->prepare($query_produccionEnergia);
$stmt_produccionEnergia->bind_param("s", $CVEIDEN);
$stmt_produccionEnergia->execute();
$result_produccionEnergia = $stmt_produccionEnergia->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Producción de Energía Eléctrica', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_produccionEnergia->num_rows > 0) {
    $header = array('Capacidad Instalada', 'Tipo de Planta', 'Generación Anual (MWh)', 'Consumo de Combustible');
    $data = array();
    while ($row = $result_produccionEnergia->fetch_assoc()) {
        $data[] = array($row['CAPACIDAD_INSTALADA'], $row['TIPO_DE_PLANTA'], $row['GENERACION_ANUAL_MWH'], $row['CONSUMO_COMBUSTIBLE']);
    }
    $w = array(40, 40, 40, 40); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay producción de energía eléctrica registrada.', 0, 1);
}
$pdf->Ln(5);

// CompuestosChimenea
$query_compuestosChimenea = "SELECT * FROM CompuestosChimenea WHERE CVEIDEN = ?";
$stmt_compuestosChimenea = $conexion->prepare($query_compuestosChimenea);
$stmt_compuestosChimenea->bind_param("s", $CVEIDEN);
$stmt_compuestosChimenea->execute();
$result_compuestosChimenea = $stmt_compuestosChimenea->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Compuestos de Chimenea', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_compuestosChimenea->num_rows > 0) {
    $header = array('Clave Chimenea', 'CO2', 'CH4', 'N2O');
    $data = array();
    while ($row = $result_compuestosChimenea->fetch_assoc()) {
        $data[] = array($row['CVECH'], $row['CO2'], $row['CH4'], $row['N2O']);
    }
    $w = array(30, 30, 30, 30); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay compuestos de chimenea registrados.', 0, 1);
}
$pdf->Ln(5);

// RegistroActividadesProceso
$query_registroProceso = "SELECT * FROM RegistroActividadesProceso WHERE CVEIDEN = ?";
$stmt_registroProceso = $conexion->prepare($query_registroProceso);
$stmt_registroProceso->bind_param("s", $CVEIDEN);
$stmt_registroProceso->execute();
$result_registroProceso = $stmt_registroProceso->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Registro de Actividades en Proceso', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_registroProceso->num_rows > 0) {
    $header = array('Actividad', 'Proceso', 'Unidad de FE', 'Horas al Año', 'Tipo de Emisión');
    $data = array();
    while ($row = $result_registroProceso->fetch_assoc()) {
        $data[] = array($row['TIPACTIV_GRAL'], $row['PROCESO'], $row['UNIDAD_FE'], $row['HR_ANO'], $row['TIPO_DE_EMISION']);
    }
    $w = array(40, 40, 40, 30, 30); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay actividades en proceso registradas.', 0, 1);
}
$pdf->Ln(5);

// ActividadParticulasProcesos
$query_actividadParticulas = "SELECT * FROM ActividadParticulasProcesos WHERE CVEIDEN = ?";
$stmt_actividadParticulas = $conexion->prepare($query_actividadParticulas);
$stmt_actividadParticulas->bind_param("s", $CVEIDEN);
$stmt_actividadParticulas->execute();
$result_actividadParticulas = $stmt_actividadParticulas->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Actividad de Partículas en Procesos', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_actividadParticulas->num_rows > 0) {
    $header = array('CO2', 'CH4', 'N2O');
    $data = array();
    while ($row = $result_actividadParticulas->fetch_assoc()) {
        $data[] = array($row['CO2_PROC_SC'], $row['CH4_PROC_SC'], $row['N2O_PROC_SC']);
    }
    $w = array(40, 40, 40); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay actividad de partículas en procesos registrada.', 0, 1);
}
$pdf->Ln(5);

// EquivalenteCombustible
$query_equivalenteCombustible = "SELECT * FROM EquivalenteCombustible WHERE CVEIDEN = ?";
$stmt_equivalenteCombustible = $conexion->prepare($query_equivalenteCombustible);
$stmt_equivalenteCombustible->bind_param("s", $CVEIDEN);
$stmt_equivalenteCombustible->execute();
$result_equivalenteCombustible = $stmt_equivalenteCombustible->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Equivalente de Combustible', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_equivalenteCombustible->num_rows > 0) {
    $header = array('Tipo de Emisión', 'Capacidad', 'Unidad', 'Cantidad', 'Unidad de Cantidad');
    $data = array();
    while ($row = $result_equivalenteCombustible->fetch_assoc()) {
        $data[] = array($row['TIPO_DE_EMISION'], $row['CAPACIDAD'], $row['UNIDAD_CAPACIDAD'], $row['CANTIDAD'], $row['UNIDAD_CANTIDAD']);
    }
    $w = array(40, 30, 30, 30, 30); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay equivalentes de combustible registrados.', 0, 1);
}
$pdf->Ln(5);


// EquivalenciaParticulasCombustible
$query_equivalenciaParticulas = "SELECT * FROM EquivalenciaParticulasCombustible WHERE CVEIDEN = ?";
$stmt_equivalenciaParticulas = $conexion->prepare($query_equivalenciaParticulas);
$stmt_equivalenciaParticulas->bind_param("s", $CVEIDEN);
$stmt_equivalenciaParticulas->execute();
$result_equivalenciaParticulas = $stmt_equivalenciaParticulas->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Equivalencia de Partículas en Combustible', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_equivalenciaParticulas->num_rows > 0) {
    $header = array('CO2', 'CH4', 'N2O');
    $data = array();
    while ($row = $result_equivalenciaParticulas->fetch_assoc()) {
        $data[] = array($row['CO2_COMB_SC'], $row['CH4_COMB_SC'], $row['N2O_COMB_SC']);
    }
    $w = array(40, 40, 40); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay equivalencias de partículas en combustible registradas.', 0, 1);
}
$pdf->Ln(5);

// Control de Contaminantes
$query_contaminantesControl = "SELECT * FROM EquivalenciasContaminantesControl WHERE CVEIDEN = ?";
$stmt_contaminantesControl = $conexion->prepare($query_contaminantesControl);
$stmt_contaminantesControl->bind_param("s", $CVEIDEN);
$stmt_contaminantesControl->execute();
$result_contaminantesControl = $stmt_contaminantesControl->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Control de Contaminantes', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_contaminantesControl->num_rows > 0) {
    $header = array('Tipo de Control', 'Eficiencia', 'Método de Estimación');
    $data = array();
    while ($row = $result_contaminantesControl->fetch_assoc()) {
        $data[] = array($row['TIPO_DE_EQ_CONTROL'], $row['EFICIENCIA'], $row['METODO_DE_ESTIMACION']);
    }
    $w = array(40, 40, 40); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay control de contaminantes registrados.', 0, 1);
}
$pdf->Ln(5);

// Actividad de Suministro
$query_actividadSuministro = "SELECT * FROM ActividadSuministro WHERE CVEIDEN = ?";
$stmt_actividadSuministro = $conexion->prepare($query_actividadSuministro);
$stmt_actividadSuministro->bind_param("s", $CVEIDEN);
$stmt_actividadSuministro->execute();
$result_actividadSuministro = $stmt_actividadSuministro->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Actividad de Suministro', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_actividadSuministro->num_rows > 0) {
    $header = array('Actividad', 'Equipo de Combustión', 'Situación', 'MD', 'CT', 'CI');
    $data = array();
    while ($row = $result_actividadSuministro->fetch_assoc()) {
        $data[] = array($row['ACTIVIDAD'], $row['EQUIPO_DE_COMBUSTION'], $row['SITUACION'], $row['MD'], $row['CT'], $row['CI']);
    }
    $w = array(30, 30, 30, 30, 30, 30); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay actividades de suministro registradas.', 0, 1);
}
$pdf->Ln(5);


// CombustiblesPoderesNetos
$query_combustiblesPoderesNetos = "SELECT * FROM CombustiblesPoderesNetos WHERE CVEIDEN = ?";
$stmt_combustiblesPoderesNetos = $conexion->prepare($query_combustiblesPoderesNetos);
$stmt_combustiblesPoderesNetos->bind_param("s", $CVEIDEN);
$stmt_combustiblesPoderesNetos->execute();
$result_combustiblesPoderesNetos = $stmt_combustiblesPoderesNetos->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Combustibles - Poderes Netos', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_combustiblesPoderesNetos->num_rows > 0) {
    $header = array('Tipo de Combustible', 'Horas al Año', 'Capacidad', 'Unidad');
    $data = array();
    while ($row = $result_combustiblesPoderesNetos->fetch_assoc()) {
        $data[] = array($row['TIPO_DE_COMBUSTIBLE'], $row['HR_ANO'], $row['CAPACIDAD'], $row['UNIDAD']);
    }
    $w = array(40, 40, 40, 40); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay combustibles con poderes netos registrados.', 0, 1);
}
$pdf->Ln(5);


// TipoCombustiblePoderesNetos
$query_tipoCombustiblePoderesNetos = "SELECT * FROM TipoCombustiblePoderesNetos WHERE CVEIDEN = ?";
$stmt_tipoCombustiblePoderesNetos = $conexion->prepare($query_tipoCombustiblePoderesNetos);
$stmt_tipoCombustiblePoderesNetos->bind_param("s", $CVEIDEN);
$stmt_tipoCombustiblePoderesNetos->execute();
$result_tipoCombustiblePoderesNetos = $stmt_tipoCombustiblePoderesNetos->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Tipo de Combustible - Poderes Netos', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_tipoCombustiblePoderesNetos->num_rows > 0) {
    $header = array('Tipo de Combustible', 'Poder Calorífico Neto', 'Unidad');
    $data = array();
    while ($row = $result_tipoCombustiblePoderesNetos->fetch_assoc()) {
        $data[] = array($row['TIPO_DE_COMBUSTIBLE'], $row['PODER_CALORIFICO_NETO'], $row['UNIDAD_DE_MEDIDA_KJ_M3']);
    }
    $w = array(50, 50, 40); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay tipos de combustible registrados.', 0, 1);
}
$pdf->Ln(5);


// Producción y Uso de CFCs
$query_usoCFCs = "SELECT * FROM ProduccionUsoCFCs WHERE CVEIDEN = ?";
$stmt_usoCFCs = $conexion->prepare($query_usoCFCs);
$stmt_usoCFCs->bind_param("s", $CVEIDEN);
$stmt_usoCFCs->execute();
$result_usoCFCs = $stmt_usoCFCs->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Producción y Uso de CFCs', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_usoCFCs->num_rows > 0) {
    $header = array('Clave Chimenea', 'Equivalentes de Electricidad', 'Horas al Año', 'Tipo de Emisión');
    $data = array();
    while ($row = $result_usoCFCs->fetch_assoc()) {
        $data[] = array($row['CVECH'], $row['EQUIVALENTES_DE_ELECTRICIDAD'], $row['HR_ANO'], $row['TIPO_DE_EMISION']);
    }
    $w = array(40, 50, 40, 40);
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay información de producción y uso de CFCs registrada.', 0, 1);
}
$pdf->Ln(5);

// Producción de CFCs y HFCs
$query_produccionCFCs = "SELECT * FROM ProduccionCFCsHFCs WHERE CVEIDEN = ?";
$stmt_produccionCFCs = $conexion->prepare($query_produccionCFCs);
$stmt_produccionCFCs->bind_param("s", $CVEIDEN);
$stmt_produccionCFCs->execute();
$result_produccionCFCs = $stmt_produccionCFCs->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Producción de CFCs y HFCs', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_produccionCFCs->num_rows > 0) {
    $header = array('Actividad', 'Nombre de Sustancia', 'Masa Sustancia Consumida', 'Unidad de Medida');
    $data = array();
    while ($row = $result_produccionCFCs->fetch_assoc()) {
        $data[] = array($row['ACTIVIDAD'], $row['NOMBRE_DE_SUSTANCIA'], $row['MASA_SUSTANCIA_CONSUMIDA'], $row['UNIDAD_MEDIDA']);
    }
    $w = array(40, 60, 40, 40);
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay información de producción de CFCs y HFCs registrada.', 0, 1);
}
$pdf->Ln(5);

// Energía Eléctrica
$query_energiaElectrica = "SELECT * FROM EnergiaElectrica WHERE CVEIDEN = ?";
$stmt_energiaElectrica = $conexion->prepare($query_energiaElectrica);
$stmt_energiaElectrica->bind_param("s", $CVEIDEN);
$stmt_energiaElectrica->execute();
$result_energiaElectrica = $stmt_energiaElectrica->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Energía Eléctrica', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_energiaElectrica->num_rows > 0) {
    $header = array('Clave Chimenea', 'Horas al Año', 'Tipo de Emisión', 'Capacidad');
    $data = array();
    while ($row = $result_energiaElectrica->fetch_assoc()) {
        $data[] = array($row['CVECH'], $row['HR_ANO'], $row['TIPO_DE_EMISION'], $row['CAPACIDAD']);
    }
    $w = array(40, 40, 50, 40); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay registros de energía eléctrica para este usuario.', 0, 1);
}
$pdf->Ln(5);

// Producción de Energía Eléctrica
$query_produccionEnergia = "SELECT * FROM ProduccionEnergiaElectrica WHERE CVEIDEN = ?";
$stmt_produccionEnergia = $conexion->prepare($query_produccionEnergia);
$stmt_produccionEnergia->bind_param("s", $CVEIDEN);
$stmt_produccionEnergia->execute();
$result_produccionEnergia = $stmt_produccionEnergia->get_result();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'Producción de Energía Eléctrica', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
if ($result_produccionEnergia->num_rows > 0) {
    $header = array('Capacidad Instalada', 'Tipo de Planta', 'Generación Anual', 'Consumo de Combustible');
    $data = array();
    while ($row = $result_produccionEnergia->fetch_assoc()) {
        $data[] = array($row['CAPACIDAD_INSTALADA'], $row['TIPO_DE_PLANTA'], $row['GENERACION_ANUAL_MWH'], $row['CONSUMO_COMBUSTIBLE']);
    }
    $w = array(50, 40, 50, 40); 
    $pdf->FancyTable($header, $data, $w);
} else {
    $pdf->Cell(0, 10, 'No hay producción de energía eléctrica registrada.', 0, 1);
}
$pdf->Ln(5);
    $pdf->Output('D', 'Reporte_Empresa_' . $CVEIDEN . '.pdf');
    $conexion->close();
} else {
    echo "No se ha proporcionado un ID de usuario.";
}
?>