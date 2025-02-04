<?php
require_once (__DIR__ . '/../models/model.php');

class Ticket extends Model {
    // Crear un nuevo ticket
    public function crearTicket($titulo, $descripcion, $prioridad, $usuario_id, $estado = 'Abierto', $tecnico_asignado = null) {
        $sql = "INSERT INTO tickets (titulo, descripcion, estado, prioridad, usuario_id, tecnico_asignado) 
                VALUES (:titulo, :descripcion, :estado, :prioridad, :usuario_id, :tecnico_asignado)";
        $params = [
            ':titulo' => $titulo,
            ':descripcion' => $descripcion,
            ':estado' => $estado,
            ':prioridad' => $prioridad,
            ':usuario_id' => $usuario_id,
            ':tecnico_asignado' => $tecnico_asignado
        ];
        return $this->insert($sql, $params);
    }

    // Obtener todos los tickets
    public function obtenerTickets() {
        $sql = "SELECT * FROM tickets";
        return $this->fetchAll($sql);
    }

    // Obtener un ticket por su ID
    public function obtenerTicketPorId($id) {
        $sql = "SELECT * FROM tickets WHERE id = :id";
        $params = [':id' => $id];
        return $this->fetchOne($sql, $params);
    }

    // Actualizar el estado de un ticket
    public function actualizarEstadoTicket($id, $estado, $tecnico_asignado = null) {
        $sql = "UPDATE tickets SET estado = :estado, tecnico_asignado = :tecnico_asignado WHERE id = :id";
        $params = [
            ':estado' => $estado,
            ':tecnico_asignado' => $tecnico_asignado,
            ':id' => $id
        ];
        return $this->execute($sql, $params);
    }

    // Eliminar un ticket
    public function eliminarTicket($id) {
        $sql = "DELETE FROM tickets WHERE id = :id";
        $params = [':id' => $id];
        return $this->execute($sql, $params);
    }
}
