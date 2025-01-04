<?php require_once __DIR__ . '/../templates/header.php'; ?>
<div class="container">
    <h2 class="mt-4">Crear Ticket</h2>
    <form action="index.php?action=crearTicket" method="POST">
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="prioridad">Prioridad</label>
            <select class="form-control" id="prioridad" name="prioridad">
                <option value="Baja">Baja</option>
                <option value="Media">Media</option>
                <option value="Alta">Alta</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear Ticket</button>
    </form>
</div>
<?php require_once __DIR__ . '/../templates/footer.php'; ?>
