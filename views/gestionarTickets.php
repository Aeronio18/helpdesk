<?php $title = "Gestionar Tickets - Helpdesk"; ?>
<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container">
    <h3 class="text-center mb-4">Gestión de Tickets</h3>
    <div class="row">
        <!-- Tarjeta: Crear Ticket -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Crear Nuevo Ticket</h5>
                    <p class="card-text">Registra un nuevo ticket de soporte.</p>
                    <a href="index.php?action=crearTicket" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Crear Ticket
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarjeta: Ver Tickets -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Ver Tickets</h5>
                    <p class="card-text">Visualiza los tickets registrados.</p>
                    <a href="index.php?action=listarTickets" class="btn btn-info">
                        <i class="fas fa-search"></i> Ver Tickets
                    </a>
                </div>
            </div>
        </div>

        <!-- Tarjeta: Actualizar Tickets -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Actualizar Ticket</h5>
                    <p class="card-text">Actualiza el estado de los tickets.</p>
                    <a href="index.php?action=actualizarTicket" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Actualizar Ticket
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
