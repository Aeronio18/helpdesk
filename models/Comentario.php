<?php
require_once (__DIR__ . '/../models/model.php');

class Comentario extends Model {
    // Crear un nuevo comentario
    public function crearComentario($ticket_id, $usuario_id, $comentario) {
        $sql = "INSERT INTO comentarios (ticket_id, usuario_id, comentario) 
                VALUES (:ticket_id, :usuario_id, :comentario)";
        $params = [
            ':ticket_id' => $ticket_id,
            ':usuario_id' => $usuario_id,
            ':comentario' => $comentario
        ];
        return $this->insert($sql, $params);
    }

    // Obtener los comentarios de un ticket
    public function obtenerComentariosPorTicket($ticket_id) {
        $sql = "SELECT * FROM comentarios WHERE ticket_id = :ticket_id";
        $params = [':ticket_id' => $ticket_id];
        return $this->fetchAll($sql, $params);
    }

    // Eliminar un comentario
    public function eliminarComentario($id) {
        $sql = "DELETE FROM comentarios WHERE id = :id";
        $params = [':id' => $id];
        return $this->execute($sql, $params);
    }
}
?>
