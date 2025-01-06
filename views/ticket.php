<?php $title = "Listado de Tickets - Helpdesk"; ?>
<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container">
    <h3 class="text-center mb-4">Listado de Tickets</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Estado</th>
                <th>Prioridad</th>
                <th>Técnico Asignado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ticket): ?>
                <tr>
                    <td><?php echo $ticket['titulo']; ?></td>
                    <td><?php echo $ticket['estado']; ?></td>
                    <td><?php echo $ticket['prioridad']; ?></td>
                    <td>
                        <?php 
                            // Si el técnico está asignado, mostrar su nombre
                            echo $ticket['tecnico_asignado'] ? 'Técnico Asignado' : 'Ninguno';
                        ?>
                    </td>
                    <td>
                        <a href="index.php?action=verTicket&id=<?php echo $ticket['id']; ?>" class="btn btn-info">Ver</a>
                        <!-- Otras acciones como editar, eliminar, etc. -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>
