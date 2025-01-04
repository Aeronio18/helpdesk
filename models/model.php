<?php
require_once(__DIR__ . '/../config/database.php');

class Model {
    protected $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Método para ejecutar consultas preparadas
    protected function query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    // Método para obtener múltiples resultados
    protected function fetchAll($sql, $params = []) {
        return $this->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un único resultado
    protected function fetchOne($sql, $params = []) {
        return $this->query($sql, $params)->fetch(PDO::FETCH_ASSOC);
    }

    // Método para insertar datos y obtener el ID
    protected function insert($sql, $params = []) {
        $this->query($sql, $params);
        return $this->conn->lastInsertId();
    }

    // Método para actualizar o eliminar datos
    protected function execute($sql, $params = []) {
        return $this->query($sql, $params)->rowCount();
    }
}
?>
