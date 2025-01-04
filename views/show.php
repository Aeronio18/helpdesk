<?php require_once __DIR__ . '/../templates/header.php'; ?>
<div class="container">
    <h2 class="mt-4">Ticket #<?php echo $ticket['id']; ?> - <?php echo $ticket['titulo']; ?></h2>
    <p><strong>Descripción:</strong> <?php echo $ticket['descripcion']; ?></p>
    <p><strong>Prioridad:</strong> <?php echo $ticket['prioridad']; ?></p>
    <p><strong>Estado:</strong> <?php echo $ticket['estado']; ?></p>
    <h3>Comentarios</h3>
    <form action="index.php?action=crearComentario&id=<?php echo $ticket['id']; ?>" method="POST">
        <div class="form-group">
            <textarea class="form-control" name="comentario" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Añadir Comentario</button>
    </form>
    <ul class="list-group mt-3">
        <?php foreach ($comentarios as $comentario): ?>
        <li class="list-group-item">
            <p><?php echo $comentario['comentario']; ?></p>
            <small>Por: <?php echo $comentario['usuario_id']; ?></small>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php require_once __DIR__ . '/../templates/footer.php'; ?>
