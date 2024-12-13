<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-admin-empresas.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Información de la Empresa</title>
</head>

<body>
<section class="showcase">
        <div class="social-media">
            <a href="menuAdministrador.html"><i class='bx bx-exit bx-rotate-180' ></i></a>
        </div>
</section>
    <div class="container">        
        <?php        
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

    // EMPRESA
    
    $query_empresa = "SELECT * FROM Empresa WHERE CVEIDEN = ?";
    $stmt_empresa = $conexion->prepare($query_empresa);
    $stmt_empresa->bind_param("s", $CVEIDEN);
    $stmt_empresa->execute();
    $result_empresa = $stmt_empresa->get_result();

    // Empresa
    echo "<div class='table-box'>";
    echo "<h1>Información de la Empresa</h1>";
    if ($result_empresa->num_rows > 0) {
        echo "<table><tr><th>Nombre de la Empresa</th><th>Sector</th><th>Ubicación</th><th>Municipio</th><th>Entidad Federativa</th></tr>";
        while ($row = $result_empresa->fetch_assoc()) {
            echo "<tr><td>" . $row['NombreEmpresa'] . "</td><td>" . $row['SECTOR'] . "</td><td>" . $row['UBICACION'] . "</td><td>" . $row['MUNICIPIO'] . "</td><td>" . $row['ENTIDADFEDERATIVA'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='empty-section'>No se encontró información de la empresa para este usuario.</p>";
    }
    echo "</div>";



    // MATERIAS_PRIMAS
$query_materiasPrimas = "SELECT * FROM MATERIAS_PRIMAS WHERE CVEIDEN = ?";
$stmt_materiasPrimas = $conexion->prepare($query_materiasPrimas);
$stmt_materiasPrimas->bind_param("s", $CVEIDEN);
$stmt_materiasPrimas->execute();
$result_materiasPrimas = $stmt_materiasPrimas->get_result();
echo "<div class='table-box'>";
echo "<h1>Materias Primas</h1>";
if ($result_materiasPrimas->num_rows > 0) {
    echo "<table><tr><th>Materia Prima</th><th>Consumo</th><th>Unidad</th></tr>";
    while ($row = $result_materiasPrimas->fetch_assoc()) {
        echo "<tr><td>" . $row['MATERIAPRIMA'] . "</td><td>" . $row['CONSUMO'] . "</td><td>" . $row['UNIDAD'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay materias primas registradas para este usuario.</p>";
}
echo "</div>";


// PRODUCTOS
$query_productos = "SELECT * FROM PRODUCTOS WHERE CVEIDEN = ?";
$stmt_productos = $conexion->prepare($query_productos);
$stmt_productos->bind_param("s", $CVEIDEN);
$stmt_productos->execute();
$result_productos = $stmt_productos->get_result();
echo "<div class='table-box'>";
echo "<h1>Productos</h1>";
if ($result_productos->num_rows > 0) {
    echo "<table><tr><th>Producto</th><th>Cantidad</th><th>Unidad</th></tr>";
    while ($row = $result_productos->fetch_assoc()) {
        echo "<tr><td>" . $row['Producto'] . "</td><td>" . $row['Cantidad'] . "</td><td>" . $row['Unidad'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay productos registrados para este usuario.</p>";
}
echo "</div>";


// Combustibles
$query_combustibles = "SELECT * FROM Combustibles WHERE CVEIDEN = ?";
$stmt_combustibles = $conexion->prepare($query_combustibles);
$stmt_combustibles->bind_param("s", $CVEIDEN);
$stmt_combustibles->execute();
$result_combustibles = $stmt_combustibles->get_result();
echo "<div class='table-box'>";
echo "<h1>Combustibles</h1>";
if ($result_combustibles->num_rows > 0) {
    echo "<table><tr><th>Combustible</th><th>Consumo</th><th>Unidad</th></tr>";
    while ($row = $result_combustibles->fetch_assoc()) {
        echo "<tr><td>" . $row['Combustible'] . "</td><td>" . $row['Consumo'] . "</td><td>" . $row['Unidad'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay combustibles registrados para este usuario.</p>";
}
echo "</div>";


    // DatosInsumoEmpresarial
    $query_datosInsumo = "SELECT * FROM DatosInsumoEmpresarial WHERE CVEIDEN = ?";
    $stmt_datosInsumo = $conexion->prepare($query_datosInsumo);
    $stmt_datosInsumo->bind_param("s", $CVEIDEN);
    $stmt_datosInsumo->execute();
    $result_datosInsumo = $stmt_datosInsumo->get_result();
    echo "<div class='table-box'>";  
    echo "<h1>Datos de Insumo Empresarial</h1>";
    if ($result_datosInsumo->num_rows > 0) {
        echo "<table><tr><th>NEC</th><th>NAP</th><th>NCH</th><th>NECONT</th></tr>";
        while ($row = $result_datosInsumo->fetch_assoc()) {
            echo "<tr><td>" . $row['NEC'] . "</td><td>" . $row['NAP'] . "</td><td>" . $row['NCH'] . "</td><td>" . $row['NECONT'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='empty-section'>No hay datos de insumo empresarial registrados para este usuario.</p>";
    }
    echo "</div>";

    // ComponentesCombustibles
    $query_componentesCombustibles = "SELECT * FROM ComponentesCombustibles WHERE CVEIDEN = ?";
    $stmt_componentesCombustibles = $conexion->prepare($query_componentesCombustibles);
    $stmt_componentesCombustibles->bind_param("s", $CVEIDEN);
    $stmt_componentesCombustibles->execute();
    $result_componentesCombustibles = $stmt_componentesCombustibles->get_result();
    echo "<div class='table-box'>";
    echo "<h1>Componentes de Combustibles</h1>";
    if ($result_componentesCombustibles->num_rows > 0) {
        echo "<table><tr><th>CO2</th><th>CH4</th><th>N2O</th></tr>";
        while ($row = $result_componentesCombustibles->fetch_assoc()) {
            echo "<tr><td>" . $row['CO2_COMB_SC'] . "</td><td>" . $row['CH4_COMB_SC'] . "</td><td>" . $row['N2O_COMB_SC'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='empty-section'>No hay componentes de combustibles registrados para este usuario.</p>";
    }
    echo "</div>";

    // ComponentesParticulasProcesos
    $query_componentesParticulas = "SELECT * FROM ComponentesParticulasProcesos WHERE CVEIDEN = ?";
    $stmt_componentesParticulas = $conexion->prepare($query_componentesParticulas);
    $stmt_componentesParticulas->bind_param("s", $CVEIDEN);
    $stmt_componentesParticulas->execute();
    $result_componentesParticulas = $stmt_componentesParticulas->get_result();
    echo "<div class='table-box'>";
    echo "<h1>Componentes de Partículas en Procesos</h1>";
    if ($result_componentesParticulas->num_rows > 0) {
        echo "<table><tr><th>CO2</th><th>CH4</th><th>N2O</th></tr>";
        while ($row = $result_componentesParticulas->fetch_assoc()) {
            echo "<tr><td>" . $row['CO2_PROC_SC'] . "</td><td>" . $row['CH4_PROC_SC'] . "</td><td>" . $row['N2O_PROC_SC'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='empty-section'>No hay componentes de partículas registrados para este usuario.</p>";
    }
    echo "</div>";

    // SumaParticulas
    $query_sumaParticulas = "SELECT * FROM SumaParticulas WHERE CVEIDEN = ?";
    $stmt_sumaParticulas = $conexion->prepare($query_sumaParticulas);
    $stmt_sumaParticulas->bind_param("s", $CVEIDEN);
    $stmt_sumaParticulas->execute();
    $result_sumaParticulas = $stmt_sumaParticulas->get_result();
    echo "<div class='table-box'>";
    echo "<h1>Suma de Partículas</h1>";
    if ($result_sumaParticulas->num_rows > 0) {
        echo "<table><tr><th>CO2</th><th>CH4</th><th>N2O</th></tr>";
        while ($row = $result_sumaParticulas->fetch_assoc()) {
            echo "<tr><td>" . $row['CO2_SUMA_SC'] . "</td><td>" . $row['CH4_SUMA_SC'] . "</td><td>" . $row['N2O_SUMA_SC'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='empty-section'>No hay sumas de partículas registradas para este usuario.</p>";
    }
    echo "</div>";

    // DatosResponsableEmpresa
    $query_responsableEmpresa = "SELECT * FROM DatosResponsableEmpresa WHERE CVEIDEN = ?";
    $stmt_responsableEmpresa = $conexion->prepare($query_responsableEmpresa);
    $stmt_responsableEmpresa->bind_param("s", $CVEIDEN);
    $stmt_responsableEmpresa->execute();
    $result_responsableEmpresa = $stmt_responsableEmpresa->get_result();
    echo "<div class='table-box'>";
    echo "<h1>Datos del Responsable de la Empresa</h1>";
    if ($result_responsableEmpresa->num_rows > 0) {
        echo "<table><tr><th>Responsable Técnico</th><th>Elaborado</th><th>Observaciones</th><th>Zona</th></tr>";
        while ($row = $result_responsableEmpresa->fetch_assoc()) {
            echo "<tr><td>" . $row['RESPONSABLE_TECNICO'] . "</td><td>" . $row['ELABORADO'] . "</td><td>" . $row['OBSERVACIONES'] . "</td><td>" . $row['ZONA'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='empty-section'>No hay datos del responsable de la empresa registrados para este usuario.</p>";
    }
    echo "</div>";

// ControlContaminantes
$query_controlContaminantes = "SELECT * FROM ControlContaminantes WHERE CVEIDEN = ?";
$stmt_controlContaminantes = $conexion->prepare($query_controlContaminantes);
$stmt_controlContaminantes->bind_param("s", $CVEIDEN);
$stmt_controlContaminantes->execute();
$result_controlContaminantes = $stmt_controlContaminantes->get_result();
echo "<div class='table-box'>";
echo "<h1>Control de Contaminantes</h1>";
if ($result_controlContaminantes->num_rows > 0) {
    echo "<table><tr><th>Contaminante Control 1</th><th>Contaminante Control 2</th><th>Contaminante Control 3</th></tr>";
    while ($row = $result_controlContaminantes->fetch_assoc()) {
        echo "<tr><td>" . $row['CONTAM_CONTROL_1'] . "</td><td>" . $row['CONTAM_CONTROL_2'] . "</td><td>" . $row['CONTAM_CONTROL_3'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay controles de contaminantes registrados para este usuario.</p>";
}
echo "</div>";

// ActividadSuministro
$query_actividadSuministro = "SELECT * FROM ActividadSuministro WHERE CVEIDEN = ?";
$stmt_actividadSuministro = $conexion->prepare($query_actividadSuministro);
$stmt_actividadSuministro->bind_param("s", $CVEIDEN);
$stmt_actividadSuministro->execute();
$result_actividadSuministro = $stmt_actividadSuministro->get_result();
echo "<div class='table-box'>";
echo "<h1>Actividad de Suministro</h1>";
if ($result_actividadSuministro->num_rows > 0) {
    echo "<table><tr><th>Actividad</th><th>Equipo de Combustión</th><th>Situación</th><th>MD</th><th>CT</th><th>CI</th></tr>";
    while ($row = $result_actividadSuministro->fetch_assoc()) {
        echo "<tr><td>" . $row['ACTIVIDAD'] . "</td><td>" . $row['EQUIPO_DE_COMBUSTION'] . "</td><td>" . $row['SITUACION'] . "</td><td>" . $row['MD'] . "</td><td>" . $row['CT'] . "</td><td>" . $row['CI'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay actividades de suministro registradas para este usuario.</p>";
}
echo "</div>";

// CombustiblesPoderesNetos
$query_combustiblesPoderesNetos = "SELECT * FROM CombustiblesPoderesNetos WHERE CVEIDEN = ?";
$stmt_combustiblesPoderesNetos = $conexion->prepare($query_combustiblesPoderesNetos);
$stmt_combustiblesPoderesNetos->bind_param("s", $CVEIDEN);
$stmt_combustiblesPoderesNetos->execute();
$result_combustiblesPoderesNetos = $stmt_combustiblesPoderesNetos->get_result();
echo "<div class='table-box'>";
echo "<h1>Combustibles - Poderes Netos</h1>";
if ($result_combustiblesPoderesNetos->num_rows > 0) {
    echo "<table><tr><th>Tipo de Combustible</th><th>Horas al Año</th><th>Capacidad</th><th>Unidad</th></tr>";
    while ($row = $result_combustiblesPoderesNetos->fetch_assoc()) {
        echo "<tr><td>" . $row['TIPO_DE_COMBUSTIBLE'] . "</td><td>" . $row['HR_ANO'] . "</td><td>" . $row['CAPACIDAD'] . "</td><td>" . $row['UNIDAD'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay combustibles con poderes netos registrados para este usuario.</p>";
}
echo "</div>";

// TipoCombustiblePoderesNetos
$query_tipoCombustiblePoderesNetos = "SELECT * FROM TipoCombustiblePoderesNetos WHERE CVEIDEN = ?";
$stmt_tipoCombustiblePoderesNetos = $conexion->prepare($query_tipoCombustiblePoderesNetos);
$stmt_tipoCombustiblePoderesNetos->bind_param("s", $CVEIDEN);
$stmt_tipoCombustiblePoderesNetos->execute();
$result_tipoCombustiblePoderesNetos = $stmt_tipoCombustiblePoderesNetos->get_result();
echo "<div class='table-box'>";
echo "<h1>Tipo de Combustible - Poderes Netos</h1>";
if ($result_tipoCombustiblePoderesNetos->num_rows > 0) {
    echo "<table><tr><th>Tipo de Combustible</th><th>Poder Calorífico Neto</th><th>Unidad</th></tr>";
    while ($row = $result_tipoCombustiblePoderesNetos->fetch_assoc()) {
        echo "<tr><td>" . $row['TIPO_DE_COMBUSTIBLE'] . "</td><td>" . $row['PODER_CALORIFICO_NETO'] . "</td><td>" . $row['UNIDAD_DE_MEDIDA_KJ_M3'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay tipos de combustible registrados para este usuario.</p>";
}
echo "</div>";


// ProduccionUsoCFCs
$query_usoCFCs = "SELECT * FROM ProduccionUsoCFCs WHERE CVEIDEN = ?";
$stmt_usoCFCs = $conexion->prepare($query_usoCFCs);
$stmt_usoCFCs->bind_param("s", $CVEIDEN);
$stmt_usoCFCs->execute();
$result_usoCFCs = $stmt_usoCFCs->get_result();
echo "<div class='table-box'>";
echo "<h1>Producción y Uso de CFCs</h1>";
if ($result_usoCFCs->num_rows > 0) {
    echo "<table><tr><th>Clave Chimenea</th><th>Equivalentes de Electricidad</th><th>Horas al Año</th><th>Tipo de Emisión</th></tr>";
    while ($row = $result_usoCFCs->fetch_assoc()) {
        echo "<tr><td>" . $row['CVECH'] . "</td><td>" . $row['EQUIVALENTES_DE_ELECTRICIDAD'] . "</td><td>" . $row['HR_ANO'] . "</td><td>" . $row['TIPO_DE_EMISION'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay información de producción y uso de CFCs para este usuario.</p>";
}
echo "</div>";

// ProduccionCFCsHFCs
$query_produccionCFCs = "SELECT * FROM ProduccionCFCsHFCs WHERE CVEIDEN = ?";
$stmt_produccionCFCs = $conexion->prepare($query_produccionCFCs);
$stmt_produccionCFCs->bind_param("s", $CVEIDEN);
$stmt_produccionCFCs->execute();
$result_produccionCFCs = $stmt_produccionCFCs->get_result();
echo "<div class='table-box'>";
echo "<h1>Producción de CFCs y HFCs</h1>";
if ($result_produccionCFCs->num_rows > 0) {
    echo "<table><tr><th>Actividad</th><th>Nombre de Sustancia</th><th>Masa Sustancia Consumida</th><th>Unidad de Medida</th></tr>";
    while ($row = $result_produccionCFCs->fetch_assoc()) {
        echo "<tr><td>" . $row['ACTIVIDAD'] . "</td><td>" . $row['NOMBRE_DE_SUSTANCIA'] . "</td><td>" . $row['MASA_SUSTANCIA_CONSUMIDA'] . "</td><td>" . $row['UNIDAD_MEDIDA'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay información de producción de CFCs y HFCs para este usuario.</p>";
}
echo "</div>";

// EnergiaElectrica
$query_energiaElectrica = "SELECT * FROM EnergiaElectrica WHERE CVEIDEN = ?";
$stmt_energiaElectrica = $conexion->prepare($query_energiaElectrica);
$stmt_energiaElectrica->bind_param("s", $CVEIDEN);
$stmt_energiaElectrica->execute();
$result_energiaElectrica = $stmt_energiaElectrica->get_result();
echo "<div class='table-box'>";
echo "<h1>Energía Eléctrica</h1>";
if ($result_energiaElectrica->num_rows > 0) {
    echo "<table><tr><th>Clave Chimenea</th><th>Horas al Año</th><th>Tipo de Emisión</th><th>Capacidad</th></tr>";
    while ($row = $result_energiaElectrica->fetch_assoc()) {
        echo "<tr><td>" . $row['CVECH'] . "</td><td>" . $row['HR_ANO'] . "</td><td>" . $row['TIPO_DE_EMISION'] . "</td><td>" . $row['CAPACIDAD'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay registros de energía eléctrica para este usuario.</p>";
}
echo "</div>";

// ProduccionEnergiaElectrica
$query_produccionEnergia = "SELECT * FROM ProduccionEnergiaElectrica WHERE CVEIDEN = ?";
$stmt_produccionEnergia = $conexion->prepare($query_produccionEnergia);
$stmt_produccionEnergia->bind_param("s", $CVEIDEN);
$stmt_produccionEnergia->execute();
$result_produccionEnergia = $stmt_produccionEnergia->get_result();
echo "<div class='table-box'>";
echo "<h1>Producción de Energía Eléctrica</h1>";
if ($result_produccionEnergia->num_rows > 0) {
    echo "<table><tr><th>Capacidad Instalada</th><th>Tipo de Planta</th><th>Generación Anual</th><th>Consumo de Combustible</th></tr>";
    while ($row = $result_produccionEnergia->fetch_assoc()) {
        echo "<tr><td>" . $row['CAPACIDAD_INSTALADA'] . "</td><td>" . $row['TIPO_DE_PLANTA'] . "</td><td>" . $row['GENERACION_ANUAL_MWH'] . "</td><td>" . $row['CONSUMO_COMBUSTIBLE'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay producción de energía eléctrica registrada para este usuario.</p>";
}
echo "</div>";

    // Chimenea
$query_chimenea = "SELECT * FROM Chimenea WHERE CVEIDEN = ?";
$stmt_chimenea = $conexion->prepare($query_chimenea);
$stmt_chimenea->bind_param("s", $CVEIDEN);
$stmt_chimenea->execute();
$result_chimenea = $stmt_chimenea->get_result();
echo "<div class='table-box'>";
echo "<h1>Chimenea</h1>";
if ($result_chimenea->num_rows > 0) {
    echo "<table><tr><th>Clave Chimenea</th><th>Altura</th><th>Diámetro</th><th>Velocidad</th><th>Temperatura</th></tr>";
    while ($row = $result_chimenea->fetch_assoc()) {
        echo "<tr><td>" . $row['CVECH'] . "</td><td>" . $row['ALTURA'] . "</td><td>" . $row['DIAMETRO'] . "</td><td>" . $row['VELOCIDAD'] . "</td><td>" . $row['TEMPERATURA'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay chimeneas registradas para este usuario.</p>";
}
echo "</div>";

   // CompuestosChimenea
$query_compuestosChimenea = "SELECT * FROM CompuestosChimenea WHERE CVEIDEN = ?";
$stmt_compuestosChimenea = $conexion->prepare($query_compuestosChimenea);
$stmt_compuestosChimenea->bind_param("s", $CVEIDEN);
$stmt_compuestosChimenea->execute();
$result_compuestosChimenea = $stmt_compuestosChimenea->get_result();
echo "<div class='table-box'>";
echo "<h1>Compuestos de Chimenea</h1>";
if ($result_compuestosChimenea->num_rows > 0) {
    echo "<table><tr><th>Clave Chimenea</th><th>CO2</th><th>CH4</th><th>N2O</th></tr>";
    while ($row = $result_compuestosChimenea->fetch_assoc()) {
        echo "<tr><td>" . $row['CVECH'] . "</td><td>" . $row['CO2'] . "</td><td>" . $row['CH4'] . "</td><td>" . $row['N2O'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay compuestos de chimenea registrados para este usuario.</p>";
}
echo "</div>";

// RegistroActividadesProceso
$query_registroProceso = "SELECT * FROM RegistroActividadesProceso WHERE CVEIDEN = ?";
$stmt_registroProceso = $conexion->prepare($query_registroProceso);
$stmt_registroProceso->bind_param("s", $CVEIDEN);
$stmt_registroProceso->execute();
$result_registroProceso = $stmt_registroProceso->get_result();
echo "<div class='table-box'>";
echo "<h1>Registro de Actividades en Proceso</h1>";
if ($result_registroProceso->num_rows > 0) {
    echo "<table><tr><th>Actividad</th><th>Proceso</th><th>Unidad de FE</th><th>Horas al Año</th><th>Tipo de Emisión</th></tr>";
    while ($row = $result_registroProceso->fetch_assoc()) {
        echo "<tr><td>" . $row['TIPACTIV_GRAL'] . "</td><td>" . $row['PROCESO'] . "</td><td>" . $row['UNIDAD_FE'] . "</td><td>" . $row['HR_ANO'] . "</td><td>" . $row['TIPO_DE_EMISION'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay actividades en proceso registradas para este usuario.</p>";
}
echo "</div>";


// ActividadParticulasProcesos
$query_actividadParticulas = "SELECT * FROM ActividadParticulasProcesos WHERE CVEIDEN = ?";
$stmt_actividadParticulas = $conexion->prepare($query_actividadParticulas);
$stmt_actividadParticulas->bind_param("s", $CVEIDEN);
$stmt_actividadParticulas->execute();
$result_actividadParticulas = $stmt_actividadParticulas->get_result();
echo "<div class='table-box'>";
echo "<h1>Actividad de Partículas en Procesos</h1>";
if ($result_actividadParticulas->num_rows > 0) {
    echo "<table><tr><th>CO2</th><th>CH4</th><th>N2O</th></tr>";
    while ($row = $result_actividadParticulas->fetch_assoc()) {
        echo "<tr><td>" . $row['CO2_PROC_SC'] . "</td><td>" . $row['CH4_PROC_SC'] . "</td><td>" . $row['N2O_PROC_SC'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay actividad de partículas en procesos registrada para este usuario.</p>";
}
echo "</div>";

// EquivalenteCombustible
$query_equivalenteCombustible = "SELECT * FROM EquivalenteCombustible WHERE CVEIDEN = ?";
$stmt_equivalenteCombustible = $conexion->prepare($query_equivalenteCombustible);
$stmt_equivalenteCombustible->bind_param("s", $CVEIDEN);
$stmt_equivalenteCombustible->execute();
$result_equivalenteCombustible = $stmt_equivalenteCombustible->get_result();
echo "<div class='table-box'>";
echo "<h1>Equivalente de Combustible</h1>";
if ($result_equivalenteCombustible->num_rows > 0) {
    echo "<table><tr><th>Tipo de Emisión</th><th>Capacidad</th><th>Unidad</th><th>Cantidad</th><th>Unidad de Cantidad</th></tr>";
    while ($row = $result_equivalenteCombustible->fetch_assoc()) {
        echo "<tr><td>" . $row['TIPO_DE_EMISION'] . "</td><td>" . $row['CAPACIDAD'] . "</td><td>" . $row['UNIDAD_CAPACIDAD'] . "</td><td>" . $row['CANTIDAD'] . "</td><td>" . $row['UNIDAD_CANTIDAD'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay equivalentes de combustible registrados para este usuario.</p>";
}
echo "</div>";


// EquivalenciaParticulasCombustible
$query_equivalenciaParticulas = "SELECT * FROM EquivalenciaParticulasCombustible WHERE CVEIDEN = ?";
$stmt_equivalenciaParticulas = $conexion->prepare($query_equivalenciaParticulas);
$stmt_equivalenciaParticulas->bind_param("s", $CVEIDEN);
$stmt_equivalenciaParticulas->execute();
$result_equivalenciaParticulas = $stmt_equivalenciaParticulas->get_result();
echo "<div class='table-box'>";
echo "<h1>Equivalencia de Partículas en Combustible</h1>";
if ($result_equivalenciaParticulas->num_rows > 0) {
    echo "<table><tr><th>CO2</th><th>CH4</th><th>N2O</th></tr>";
    while ($row = $result_equivalenciaParticulas->fetch_assoc()) {
        echo "<tr><td>" . $row['CO2_COMB_SC'] . "</td><td>" . $row['CH4_COMB_SC'] . "</td><td>" . $row['N2O_COMB_SC'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay equivalencias de partículas en combustible registradas para este usuario.</p>";
}
echo "</div>";

// EquivalenciasContaminantesControl
$query_contaminantesControl = "SELECT * FROM EquivalenciasContaminantesControl WHERE CVEIDEN = ?";
$stmt_contaminantesControl = $conexion->prepare($query_contaminantesControl);
$stmt_contaminantesControl->bind_param("s", $CVEIDEN);
$stmt_contaminantesControl->execute();
$result_contaminantesControl = $stmt_contaminantesControl->get_result();
echo "<div class='table-box'>";
echo "<h1>Control de Contaminantes</h1>";
if ($result_contaminantesControl->num_rows > 0) {
    echo "<table><tr><th>Tipo de Control</th><th>Eficiencia</th><th>Método de Estimación</th></tr>";
    while ($row = $result_contaminantesControl->fetch_assoc()) {
        echo "<tr><td>" . $row['TIPO_DE_EQ_CONTROL'] . "</td><td>" . $row['EFICIENCIA'] . "</td><td>" . $row['METODO_DE_ESTIMACION'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty-section'>No hay control de contaminantes registrados para este usuario.</p>";
}
echo "</div>";


    $conexion->close();
} else {
    echo "<p class='empty-section'>No se ha proporcionado un ID de usuario.</p>";
}
?>

    </div>
</body>

</html>