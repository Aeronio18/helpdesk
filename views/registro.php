<?php $title = "Registro - Helpdesk"; ?>
<?php require_once __DIR__ . '/../templates/header_login.php'; ?>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg" style="max-width: 400px; width: 100%;">
        <div class="card-body">
            <h3 class="text-center mb-4">Registro de Usuario</h3>
            <form action="index.php?action=registrarUsuario" method="POST">
                <!-- Nombre de usuario -->
                <div class="form-group mb-3">
                    <label for="nombre_usuario">Nombre de usuario</label>
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                </div>

                <!-- Contraseña -->
                <div class="form-group mb-3">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <!-- Tipo de usuario -->
                <div class="form-group mb-3">
                    <label for="tipo_usuario">Tipo de usuario</label>
                    <select class="form-control" id="tipo_usuario" name="tipo_usuario">
                        <option value="Administrador">Administrador</option>
                        <option value="Técnico">Técnico</option>
                    </select>
                </div>

                <!-- Botón de registro -->
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <small>¿Ya tienes cuenta? <a href="index.php?action=mostrarLogin">Inicia sesión aquí</a></small>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<?php if (isset($_GET['mensaje']) && isset($_GET['tipo'])): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.4/dist/sweetalert2.min.js"></script>
    <script>
        Swal.fire({
            icon: '<?php echo $_GET['tipo']; ?>',  // success, error, info, etc.
            title: '<?php echo $_GET['mensaje']; ?>',
            showConfirmButton: true
        });
    </script>
<?php endif; ?>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>
