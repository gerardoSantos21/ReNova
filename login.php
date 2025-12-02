<?php
// 1. INICIO DE LÓGICA PHP
session_start(); // Inicia la sesión para poder guardar datos del usuario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // --- AQUÍ IRÁ TU CÓDIGO DE BASE DE DATOS DESPUÉS ---
    // Por ahora, simularemos que el usuario y contraseña son correctos
    // para que veas cómo funciona la redirección.
    
    if (!empty($email) && !empty($password)) {
        
        // ESTA ES LA LÍNEA MÁGICA QUE TE MANDA AL INDEX:
        header("Location: index.php");
        exit(); // Importante: detiene el script para asegurar la redirección
        
    } else {
        echo "<script>alert('Por favor llena todos los campos');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReNova - Iniciar Sesión</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tilt+Warp&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="login.css">
    
</head> <body>
    
    <?php require 'includes/header.php'; ?>

    <div class="cnt">
        <form class="frm" action="" method="POST">
            
            <h2>Bienvenido de Nuevo</h2>
            <p>Accede a tu cuenta</p>

            <div class="group-icon">
                <img src="assets/img/user_blue.svg" alt="email icon" class="input-icon icon-email">
                <input type="email" placeholder="Correo Electrónico" name="email" required>
            </div>

            <div class="group-icon">
                <img src="assets/img/password.svg" alt="psw icon" class="input-icon icon-psw">
                <input type="password" placeholder="Contraseña" name="password" required>
            </div>
<div class="cr">
            <a href="cr.php" >¿Olvidaste tu contraseña?</a>
</div>
            <button type="submit">Iniciar Sesión</button>
        </form>


    <div class="spt-container">
    <div class="spt-line"></div>
    <span class="spt-text">O</span>
    <div class="spt-line"></div>
</div>

<div class="social-row">
    <a href="#" class="social-btn">
        <img src="assets/img/google.svg" alt="Google" class="social-icon">
        <span>Google</span>
    </a>

    <a href="#" class="social-btn">
        <img src="assets/img/facebook.svg" alt="Facebook" class="social-icon">
        <span>Facebook</span>
    </a>
</div>

    <div class="sign">
        ¿No Tienes una Cuenta? <a href="sign.php">Registrarse</a> <!-- //aun me falta crear el archivo de crear cuenta -->
    </div>
</div>
</body>
</html>