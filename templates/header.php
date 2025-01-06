<?php
$rol = isset($_SESSION['usuario']) ? $_SESSION['usuario']['tipo_usuario'] : ''; // Obtener el rol desde la sesión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - <?php echo $rol ? $rol : 'Usuario'; ?></title>
    <!-- Estilos de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">TETSAdesk - <?php echo $rol ? $rol : 'Usuario'; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?action=mostrarDashboard">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=cerrarSesion">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- Contenido de la página -->
    <div class="container mt-4">
