<?php
class ProductosModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function insertarProducto($producto, $cantidad, $unidad, $cveiden) {
        $stmt = $this->conn->prepare("INSERT INTO PRODUCTOS (PRODUCTO, CANTIDAD, UNIDAD, CVEIDEN) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $producto, $cantidad, $unidad, $cveiden);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerProductos($cveiden) {
        $productos = array();
        $stmt = $this->conn->prepare("SELECT PRODUCTO, CANTIDAD, UNIDAD, CVEIDEN FROM PRODUCTOS WHERE CVEIDEN = ?");
        $stmt->bind_param("i", $cveiden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }

        return $productos;
    }
}
?>
