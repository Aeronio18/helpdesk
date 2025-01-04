<?php require_once __DIR__ . '/../templates/header.php'; ?>
<div class="container">
    <h2 class="mt-4">Listado de Tickets</h2>
    <a href="index.php?action=crearTicket" class="btn btn-primary mb-3">Crear Ticket</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Prioridad</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ticket): ?>
            <tr>
                <td><?php echo $ticket['id']; ?></td>
                <td><?php echo $ticket['titulo']; ?></td>
                <td><?php echo $ticket['prioridad']; ?></td>
                <td><?php echo $ticket['estado']; ?></td>
                <td>
                    <a href="index.php?action=verTicket&id=<?php echo $ticket['id']; ?>" class="btn btn-info">Ver</a>
                    <a href="index.php?action=eliminarTicket&id=<?php echo $ticket['id']; ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require_once __DIR__ . '/../templates/footer.php'; ?>
