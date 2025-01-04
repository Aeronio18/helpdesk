<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container-fluid">
    <h2 class="mt-4">Bienvenido al Dashboard</h2>

    <!-- Verificamos el rol -->
    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['tipo_usuario'] == 'Administrador'): ?>

        <!-- Si es Administrador, mostramos los siguientes elementos -->
        <div class="row">
            <!-- Tarjeta: Crear nuevo ticket -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Crear Nuevo Ticket</h5>
                        <p class="card-text">Registra un nuevo ticket de soporte.</p>
                        <a href="index.php?action=createTicket" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Crear Ticket
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta: Tickets en progreso -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Tickets en Progreso</h5>
                        <p class="card-text">Visualiza los tickets que están en proceso.</p>
                        <a href="index.php?action=ticketsEnProgreso" class="btn btn-warning">
                            <i class="fas fa-spinner"></i> Ver Tickets
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta: Tickets atendidos -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Tickets Atendidos</h5>
                        <p class="card-text">Visualiza los tickets que han sido atendidos.</p>
                        <a href="index.php?action=ticketsAtendidos" class="btn btn-success">
                            <i class="fas fa-check-circle"></i> Ver Tickets
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta: Ver Técnicos -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Ver Técnicos</h5>
                        <p class="card-text">Gestiona y asigna técnicos a tickets.</p>
                        <a href="index.php?action=verTecnicos" class="btn btn-info">
                            <i class="fas fa-users-cog"></i> Ver Técnicos
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráficas: Tickets en progreso y atendidos -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gráfica de Tickets en Progreso</h5>
                        <canvas id="graficaProgreso" style="max-height: 400px;"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gráfica de Tickets Atendidos</h5>
                        <canvas id="graficaAtendidos" style="max-height: 400px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráfico de Tickets Atendidos por Técnicos -->
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gráfico de Tickets Atendidos por Técnicos</h5>
                        <canvas id="graficaTecnicos" style="max-height: 400px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif (isset($_SESSION['usuario']) && $_SESSION['usuario']['tipo_usuario'] == 'Técnico'): ?>

        <!-- Si es Técnico, mostramos una vista diferente -->
        <div class="row">
            <!-- Tarjeta: Ver Tickets -->
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Ver Tickets</h5>
                        <p class="card-text">Visualiza los tickets que tienes asignados.</p>
                        <a href="index.php?action=ticketsAsignados" class="btn btn-primary">
                            <i class="fas fa-ticket-alt"></i> Ver Tickets
                        </a>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>
        <p>No tienes permisos para acceder a esta página.</p>
    <?php endif; ?>

</div>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>

<script>
// Gráfico de Tickets en Progreso
var ctxProgreso = document.getElementById('graficaProgreso').getContext('2d');
var graficaProgreso = new Chart(ctxProgreso, {
    type: 'bar',
    data: {
        labels: ['Ticket 1', 'Ticket 2', 'Ticket 3'], // Aquí puedes usar datos dinámicos
        datasets: [{
            label: 'Tickets en Progreso',
            data: [12, 19, 3], // Aquí puedes usar datos dinámicos
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1
        }]
    }
});

// Gráfico de Tickets Atendidos
var ctxAtendidos = document.getElementById('graficaAtendidos').getContext('2d');
var graficaAtendidos = new Chart(ctxAtendidos, {
    type: 'pie',
    data: {
        labels: ['Ticket A', 'Ticket B', 'Ticket C'],
        datasets: [{
            data: [10, 15, 5],
            backgroundColor: ['#28a745', '#dc3545', '#ffc107'],
            hoverOffset: 4
        }]
    }
});

// Gráfico de Tickets Atendidos por Técnicos
var ctxTecnicos = document.getElementById('graficaTecnicos').getContext('2d');
var graficaTecnicos = new Chart(ctxTecnicos, {
    type: 'doughnut',
    data: {
        labels: ['Técnico 1', 'Técnico 2', 'Técnico 3'],
        datasets: [{
            data: [5, 10, 8], // Aquí puedes usar datos dinámicos
            backgroundColor: ['#007bff', '#6c757d', '#17a2b8'],
            hoverOffset: 4
        }]
    }
});
</script>
