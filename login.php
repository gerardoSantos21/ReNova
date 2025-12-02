<?php
// 1. INICIO DE LÓGICA PHP
// Aquí es donde se recibiran los datos cuando el usuario de clic en "Iniciar Sesión"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Aquí ira el código para verificar en la base de datos
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReNova - Iniciar Sesión</title>
    
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
    </div>

    <div class="sign">
        No tiene cuenta? <a href="sign.php">Cree Una...</a> <!-- //aun me falta crear el archivo de crear cuenta -->
    </div>

</body>
</html>