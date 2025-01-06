<?php
require_once __DIR__ . '/../models/Ticket.php';

class TicketController {

    // Mostrar todos los tickets
    public function listarTickets() {
        $ticketModel = new Ticket();
        $tickets = $ticketModel->obtenerTickets();
        require_once __DIR__ . '/../views/ticket.php';
    }
    public function gestionarTickets() {
        // Verificamos si el usuario está autenticado
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?action=login");
            exit();
        }
    
        // Cargamos la vista de gestión de tickets
        require_once __DIR__ . '/../views/gestionarTickets.php';
    }
    
    public function crearTicket() {
        if (isset($_SESSION['usuario'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Obtener los datos del formulario
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $prioridad = $_POST['prioridad'];
                $estado = $_POST['estado'];
                $usuario_id = $_SESSION['usuario']['id'];  // Asignar el ticket al usuario logueado
                $tecnico_asignado = $_POST['tecnico_asignado'] ?? null;  // Técnico asignado (opcional)
    
                // Crear el ticket en la base de datos
                $ticketModel = new Ticket();
                $ticketModel->crearTicket($titulo, $descripcion, $prioridad, $usuario_id, $estado, $tecnico_asignado);
    
                // Redirigir después de crear el ticket
                header('Location: index.php?action=listarTickets');
                exit();
            }
    
            // Obtener la lista de técnicos para el formulario
            $usuarioModel = new Usuario();
            $tecnicos = $usuarioModel->obtenerTecnicos();  // Asumimos que el método `obtenerTecnicos` retorna los técnicos
    
            // Mostrar la vista de crear ticket
            require_once __DIR__ . '/../views/create.php';
        } else {
            header('Location: index.php?action=mostrarLogin');
            exit();
        }
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
