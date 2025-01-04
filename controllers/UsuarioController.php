<?php
require_once __DIR__ . 'models/Usuario.php';

class UsuarioController {

    // Mostrar la página de inicio de sesión
    public function mostrarLogin() {
        require_once __DIR__ . '/../views/login.php';
    }

    // Mostrar la página de registro de usuarios
    public function mostrarRegistro() {
        require_once __DIR__ . '/../views/registro.php';
    }

    // Registrar un nuevo usuario
    public function registrarUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_usuario = $_POST['nombre_usuario'];
            $password = $_POST['password'];
            $tipo_usuario = $_POST['tipo_usuario']; // Administrador o Técnico

            $usuarioModel = new Usuario();
            $usuarioModel->crearUsuario($nombre_usuario, $password, $tipo_usuario);

            // Redirigir a login con mensaje de éxito
            header("Location: index.php?action=mostrarLogin&mensaje=Registro+exitoso&tipo=success");
        }
    }

    // Iniciar sesión de un usuario
    public function iniciarSesion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_usuario = $_POST['nombre_usuario'];
            $password = $_POST['password'];
    
            $usuarioModel = new Usuario();
            $usuario = $usuarioModel->verificarCredenciales($nombre_usuario, $password);
    
            if ($usuario) {
                // Iniciar sesión y guardar información
                $_SESSION['usuario'] = $usuario;
    
                // Pasar el rol al dashboard
                $rol = $usuario['tipo_usuario']; // Recuperamos el tipo de usuario (Administrador o Técnico)
                header("Location: index.php?action=mostrarDashboard&rol=$rol"); // Pasamos el rol en la URL
            } else {
                // Credenciales incorrectas
                header("Location: index.php?action=mostrarLogin&mensaje=Usuario+o+contraseña+incorrectos&tipo=error");
                exit();
            }
        }
    }

    // Mostrar el dashboard del administrador o técnico
    public function mostrarDashboard() {
        // Verificar si el usuario está logueado (sesión)
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?action=mostrarLogin");
        }
    
        // Lógica para mostrar el dashboard adecuado según el tipo de usuario
        $usuario = $_SESSION['usuario'];
    
        // Obtener los técnicos desde el modelo
        $usuarioModel = new Usuario();
        $tecnicos = $usuarioModel->obtenerTecnicos();
    
        // Pasar los técnicos a la vista
        require_once __DIR__ . '/../views/dashboard.php';
    }
    

    // Ver técnicos existentes
    public function verTecnicos() {
        // Verificar si el usuario es un administrador
        if ($_SESSION['usuario']['tipo_usuario'] == 'Administrador') {
            $usuarioModel = new Usuario();
            $tecnicos = $usuarioModel->obtenerTecnicos();
            require_once __DIR__ . '/../views/ver_tecnicos.php'; // Vista que listará los técnicos
        } else {
            echo "No tienes permisos para ver los técnicos.";
        }
    }

    // Registrar un nuevo técnico
    public function registrarTecnico() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_usuario = $_POST['nombre_usuario'];
            $password = $_POST['password'];
            $tipo_usuario = 'Técnico'; // Forzamos que sea un técnico

            $usuarioModel = new Usuario();
            $usuarioModel->crearUsuario($nombre_usuario, $password, $tipo_usuario);

            // Redirigir a la página de ver técnicos con mensaje de éxito
            header("Location: index.php?action=verTecnicos&mensaje=Técnico+registrado+con+éxito&tipo=success");
        }
    }

    // Cerrar sesión
    public function cerrarSesion() {
        session_destroy();
        header("Location: index.php?action=mostrarLogin&mensaje=Sesión+cerrada+correctamente&tipo=info");
    }
}
?>
