<?php
session_start();

// Incluir los controladores
require_once __DIR__ . '/controllers/UsuarioController.php';
require_once __DIR__ . '/controllers/TicketController.php';
require_once __DIR__ . '/controllers/ComentarioController.php';

// Obtener la acción desde la URL
$action = isset($_GET['action']) ? $_GET['action'] : 'mostrarLogin';

// Instanciar los controladores
$usuarioController = new UsuarioController();
$ticketController = new TicketController();
$comentarioController = new ComentarioController();

// Rutas
switch ($action) {
    case 'mostrarLogin':
        $usuarioController->mostrarLogin();
        break;
    case 'iniciarSesion':
        $usuarioController->iniciarSesion();
        break;
    case 'mostrarRegistro':
        $usuarioController->mostrarRegistro();
        break;
    case 'registrarUsuario':
        $usuarioController->registrarUsuario();
        break;
    case 'mostrarDashboard':
        $usuarioController->mostrarDashboard();
        break;
    case 'cerrarSesion':
        $usuarioController->cerrarSesion();
        break;
    case 'listarTickets':
        $ticketController->listarTickets();
        break;
    case 'crearTicket':
        $ticketController->crearTicket();
        break;
    case 'verTicket':
        $ticketController->verTicket($_GET['id']);
        break;
    case 'eliminarTicket':
        $ticketController->eliminarTicket($_GET['id']);
        break;
    case 'crearComentario':
        $comentarioController->crearComentario($_GET['id']);
        break;
    case 'gestionarTickets':
            $ticketController->gestionarTickets();
            break;
    default:
        $usuarioController->mostrarLogin();
        break;
}
?>
