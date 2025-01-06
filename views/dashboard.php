<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container-fluid">
    <h2 class="mt-4">Soporte Tecnico TETSA</h2>

    <!-- Verificamos si el usuario está autenticado -->
    <?php if (isset($_SESSION['usuario'])): ?>

        <!-- Verificamos el rol -->
        <?php if ($_SESSION['usuario']['tipo_usuario'] == 'Administrador'): ?>

            <!-- Tarjetas principales para Administrador -->
            <div class="row">
                <!-- Tarjeta: Tickets -->
<div class="col-md-4 mb-4">
    <div class="card shadow-sm">
        <div class="card-body text-center">
            <h5 class="card-title">Tickets</h5>
            <p class="card-text">Accede a las opciones de gestión de tickets.</p>
            <a href="index.php?action=gestionarTickets" class="btn btn-primary">
                <i class="fas fa-ticket-alt"></i> Gestionar Tickets
            </a>
        </div>
    </div>
</div>


                <!-- Tarjeta: SCRUM -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 equal-size">
                        <div class="card-body text-center">
                            <h5 class="card-title">SCRUM</h5>
                            <p class="card-text">Visualiza el progreso de los tickets en SCRUM.</p>
                            <a href="index.php?action=scrum" class="btn btn-info">
                                <i class="fas fa-tasks"></i> Ver SCRUM
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta: Técnicos -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 equal-size">
                        <div class="card-body text-center">
                            <h5 class="card-title">Técnicos</h5>
                            <p class="card-text">Gestiona y asigna técnicos a tickets.</p>
                            <a href="index.php?action=verTecnicos" class="btn btn-warning">
                                <i class="fas fa-users-cog"></i> Ver Técnicos
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráficos -->
            <div class="row">
                <!-- Gráfico de Pastel: Tickets Pendientes -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 equal-size">
                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title">Tickets Pendientes</h5>
                            <canvas id="graficaPendientes" class="flex-fill"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Vista SCRUM: Tickets en Progreso -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 equal-size">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Tickets en Progreso (SCRUM)</h5>
                            <div id="scrumBoard" class="flex-fill">
                                <!-- Aquí se renderizará dinámicamente la vista SCRUM -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gráfico de Barras: Tickets Atendidos por Técnicos -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 equal-size">
                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title">Tickets Atendidos por Técnicos</h5>
                            <canvas id="graficaTecnicos" class="flex-fill"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif ($_SESSION['usuario']['tipo_usuario'] == 'Técnico'): ?>

            <!-- Vista para Técnico -->
            <div class="row">
                <!-- Tarjeta: Ver Tickets -->
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm h-100 equal-size">
                        <div class="card-body text-center">
                            <h5 class="card-title">Ver Tickets</h5>
                            <p class="card-text">Visualiza los tickets que tienes asignados.</p>
                            <a href="index.php?action=listarTickets" class="btn btn-primary">
                                <i class="fas fa-ticket-alt"></i> Ver Tickets
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    <?php else: ?>
        <p>No tienes permisos para acceder a esta página. Por favor, <a href="index.php?action=login">inicia sesión</a>.</p>
    <?php endif; ?>

</div>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>

<script>
// Gráfico de Tickets Pendientes
var ctxPendientes = document.getElementById('graficaPendientes').getContext('2d');
var graficaPendientes = new Chart(ctxPendientes, {
    type: 'pie',
    data: {
        labels: ['Abiertos', 'En Espera', 'Reasignados'],
        datasets: [{
            data: [30, 15, 10],
            backgroundColor: ['#ffc107', '#17a2b8', '#6c757d'],
            hoverOffset: 4
        }]
    }
});

// Renderizado dinámico de la vista SCRUM
var scrumData = [
    { id: 1, titulo: "Configurar servidor", estado: "En progreso" },
    { id: 2, titulo: "Actualizar sistema", estado: "Pendiente" },
    { id: 3, titulo: "Testear funcionalidad", estado: "En progreso" }
];
var scrumBoard = document.getElementById('scrumBoard');
scrumData.forEach(ticket => {
    var ticketElement = document.createElement('div');
    ticketElement.classList.add('scrum-item', 'mb-2', 'p-2', 'border', 'rounded');
    ticketElement.innerHTML = `<strong>${ticket.titulo}</strong><br><small>${ticket.estado}</small>`;
    scrumBoard.appendChild(ticketElement);
});

// Gráfico de Barras: Tickets Atendidos por Técnicos
var ctxTecnicos = document.getElementById('graficaTecnicos').getContext('2d');
var graficaTecnicos = new Chart(ctxTecnicos, {
    type: 'bar',
    data: {
        labels: ['Técnico A', 'Técnico B', 'Técnico C'],
        datasets: [{
            label: 'Tickets Atendidos',
            data: [12, 9, 15],
            backgroundColor: ['#007bff', '#28a745', '#dc3545'],
            borderColor: ['#0056b3', '#1e7e34', '#c82333'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<style>
/* Aseguramos que las tarjetas y gráficos tengan el mismo tamaño */
.equal-size {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
}
.equal-size canvas {
    width: 100% !important;
    height: 100% !important;
    flex-grow: 1;
}
</style>
