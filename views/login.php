<?php $title = "Inicio de Sesión - Helpdesk"; ?>
<?php require_once __DIR__ . '/../templates/header_login.php'; ?>

<!-- Contenedor del formulario centrado -->
<div class="container d-flex justify-content-center align-items-center min-vh-100 position-relative">
    <div class="card shadow-lg" style="max-width: 400px; width: 100%; z-index: 10;">
        <div class="card-body bg-glass" style="background-color: rgba(255, 255, 255, 0.8);">
            <h3 class="text-center mb-4">Iniciar Sesión</h3>
            <form action="index.php?action=iniciarSesion" method="POST">
                <!-- Nombre de usuario -->
                <div class="form-group mb-3">
                    <label for="nombre_usuario">Nombre de usuario</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg" id="nombre_usuario" name="nombre_usuario" required placeholder="Usuario">
                    </div>
                </div>

                <!-- Contraseña -->
                <div class="form-group mb-3">
                    <label for="password">Contraseña</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control form-control-lg" id="password" name="password" required placeholder="Contraseña">
                    </div>
                </div>

                <!-- Botón de inicio de sesión -->
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Iniciar sesión</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <small>¿No tienes cuenta? <a href="index.php?action=mostrarRegistro">Regístrate aquí</a></small>
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

<!-- Estilos para el formulario -->
<style>
    /* Estilo para el fondo del formulario con opacidad */
    .bg-glass {
        background-color: rgba(255, 255, 255, 0.8); /* Blanco con opacidad */
        border-radius: 10px;
    }

    /* Estilo para los iconos dentro de los campos de entrada */
    .input-group-text {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        font-size: 1.2rem; /* Aumenta el tamaño del icono */
    }

    /* Asegurar que el campo de entrada ocupe el mismo tamaño que el icono */
    .form-control {
        border-radius: 10px;
        font-size: 1rem; /* Tamaño de fuente uniforme */
    }

    /* Asegurar que el tamaño de los campos y los iconos coincidan */
    .input-group {
        display: flex;
        align-items: center;
    }

    .form-control-lg {
        font-size: 1rem; /* Asegura que el campo sea del mismo tamaño que el icono */
    }
</style>

