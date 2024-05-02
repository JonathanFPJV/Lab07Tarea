<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header("Location: formulario_inicio_sesion.php");
    exit();
}

// Mostrar los datos del usuario
$username = $_SESSION['username'];

// Destruir la sesión y redirigir al usuario al formulario de inicio de sesión al hacer clic en el enlace "Cerrar sesión"
if (isset($_GET['cerrar_sesion'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="Estilos/iniciostilo.css">
</head>
<body>

<div class="container">
    <h2 class="mt-5">Bienvenido, <?php echo $username; ?></h2>
    <!-- Aquí puedes mostrar más información del usuario si es necesario -->
    <p>Esta es la página de inicio. Aquí puedes mostrar los datos del usuario o cualquier otra información relevante.</p>
    <a href="?cerrar_sesion" class="btn btn-danger">Cerrar sesión</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>

