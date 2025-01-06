<?php $title = "Crear Ticket - Helpdesk"; ?>
<?php require_once __DIR__ . '/../templates/header.php'; ?>

<div class="container">
    <h3 class="text-center mb-4">Nuevo Ticket</h3>
    <form action="index.php?action=crearTicket" method="POST">
        <!-- Título -->
        <div class="form-group mb-3">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <!-- Descripción -->
        <div class="form-group mb-3">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
        <!-- Prioridad -->
        <div class="form-group mb-3">
            <label for="prioridad">Prioridad</label>
            <select class="form-control" id="prioridad" name="prioridad">
                <option value="Alta">Alta</option>
                <option value="Media" selected>Media</option>
                <option value="Baja">Baja</option>
            </select>
        </div>
        <!-- Estado -->
        <div class="form-group mb-3">
            <label for="estado">Estado</label>
            <select class="form-control" id="estado" name="estado">
                <option value="Abierto">Abierto</option>
                <option value="En Proceso">En Proceso</option>
                <option value="Cerrado">Cerrado</option>
            </select>
        </div>
        <!-- Técnico Asignado -->
        <div class="form-group mb-3">
            <label for="tecnico_asignado">Técnico Asignado</label>
            <select class="form-control" id="tecnico_asignado" name="tecnico_asignado">
                <option value="">Ninguno</option>
                <?php foreach ($tecnicos as $tecnico): ?>
                    <option value="<?php echo $tecnico['id']; ?>"><?php echo $tecnico['nombre_usuario']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <!-- Botones: Crear Ticket y Volver -->
        <div class="d-flex justify-content-between mt-4">
            <a href="index.php?action=mostrarDashboard" class="btn btn-secondary">Volver</a>
            <button type="submit" class="btn btn-primary">Crear Ticket</button>
        </div>
    </form>
</div>


<style>
/* Estilización adicional para el formulario */
.container {
    max-width: 600px;
    margin-top: 30px;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h3 {
    font-weight: bold;
    color: #012C66;
}

.form-group label {
    font-weight: bold;
    color: #343a40;
}

.form-control {
    border-radius: 0.375rem;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.btn-primary {
    background-color: #012C66;
    border-color: #012C66;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn:hover {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.d-flex {
    gap: 10px;
}
</style>
