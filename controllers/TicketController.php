<?php
require_once __DIR__ . '/../models/Ticket.php';

class TicketController {

    // Mostrar todos los tickets
    public function listarTickets() {
        $ticketModel = new Ticket();
        $tickets = $ticketModel->obtenerTickets();
        require_once __DIR__ . '/../views/ticket.php';
    }

    // Crear un nuevo ticket
    public function crearTicket() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $prioridad = $_POST['prioridad'];
            $usuario_id = $_SESSION['usuario']['id']; // Usuario logueado

            $ticketModel = new Ticket();
            $ticketModel->crearTicket($titulo, $descripcion, $prioridad, $usuario_id);

            header("Location: ticket.php");
        }
        require_once __DIR__ . '/../views/create.php';
    }

    // Ver los detalles de un ticket
    public function verTicket($id) {
        $ticketModel = new Ticket();
        $ticket = $ticketModel->obtenerTicketPorId($id);

        // Obtener los comentarios del ticket
        $comentarioModel = new Comentario();
        $comentarios = $comentarioModel->obtenerComentariosPorTicket($id);

        require_once __DIR__ . '/../views/show.php';
    }

    // Cambiar el estado de un ticket
    public function actualizarEstadoTicket($id) {
        $estado = $_POST['estado'];
        $tecnico_asignado = $_POST['tecnico_asignado']; // ID del técnico asignado

        $ticketModel = new Ticket();
        $ticketModel->actualizarEstadoTicket($id, $estado, $tecnico_asignado);

        header("Location: ticket.php");
    }

    // Eliminar un ticket
    public function eliminarTicket($id) {
        $ticketModel = new Ticket();
        $ticketModel->eliminarTicket($id);

        header("Location: ticket.php");
    }
}
?>
