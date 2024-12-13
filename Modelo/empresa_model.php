<?php
class EmpresaModel {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function crearEmpresa($datos) {

        $query = "INSERT INTO EMPRESA (CVEIDEN, SECTOR, CAM, NombreEmpresa, SCIAN, UBICACION, CODIGOPOSTAL, MUNICIPIO, ENTIDADFEDERATIVA, LATITUD, LONGITUD, TELEFONO) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexion->prepare($query);

        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param(
            "ssssssssssss",
            $datos['cveiden'],
            $datos['sector'],
            $datos['cam'],
            $datos['nombre_empresa'],
            $datos['scian'],
            $datos['ubicacion'],
            $datos['codigo_postal'],
            $datos['municipio'],
            $datos['entidad_federativa'],
            $datos['latitud'],
            $datos['longitud'],
            $datos['telefono']
        );

        if (!$stmt->execute()) {
            die("Error al ejecutar la consulta: " . $stmt->error);
        }

        $stmt->close();
    }

    public function obtenerEmpresas() {
        $query = "SELECT * FROM EMPRESA";
        $result = $this->conexion->query($query);
        $empresas = [];
        while ($row = $result->fetch_assoc()) {
            $empresas[] = $row;
        }
        return $empresas;
    }
}
?>
