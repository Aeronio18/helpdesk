<?php
class Database {
   private $host = "localhost"; // Cambia esto si usas otro host
    private $db_name = "sistema_tickets";
     private $username = "root"; // Cambia esto con tu usuario de la base de datos
     private $password = ""; // Cambia esto con tu contraseña
    // private $host = "localhost"; // Cambia esto si usas otro host
    // private $db_name = "u327767040_sistema_ticket";
    // private $username = "u327767040_helpdesk"; // Cambia esto con tu usuario de la base de datos
    // private $password = "F=dHw9k4"; // Cambia esto con tu contraseña
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8mb4");
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
