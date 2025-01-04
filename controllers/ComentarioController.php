<?php
require_once __DIR__ . '/../models/Comentario.php';

class ComentarioController {

    // Crear un comentario en un ticket
    public function crearComentario($ticket_id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comentario = $_POST['comentario'];
            $usuario_id = $_SESSION['usuario']['id']; // Usuario logueado

            $comentarioModel = new Comentario();
            $comentarioModel->crearComentario($ticket_id, $usuario_id, $comentario);

            header("Location: show.php?id=" . $ticket_id);
        }
    }

    // Eliminar un comentario
    public function eliminarComentario($id) {
        $comentarioModel = new Comentario();
        $comentarioModel->eliminarComentario($id);

        header("Location: ticket.php");
    }
}
?>
