
<?php
session_start();

require 'includes/conexion.php';

$error = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        
        $sql = "SELECT id, name, password FROM customers WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();

            // Texto Plano)
            // Compara directamente si son iguales
            if ($password == $usuario['password']) { 
                
                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['user_name'] = $usuario['name'];
                
                header("Location: index.php");
                exit();
            } else {
                $error = "Contraseña incorrecta.";
            }
        } else {
            $error = "No existe una cuenta con ese correo.";
        }
        $stmt->close();
    } else {
        $error = "Por favor llena todos los campos.";
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
    <link rel="stylesheet" href="assets/css/login.css">
    
</head> <body>
    
    <?php require 'includes/header.php'; ?>

    <div class="cnt">
        <?php if(!empty($error)): ?>
    <div style="color: red; text-align: center; margin-bottom: 10px;">
        <?php echo $error; ?>
    </div>
<?php endif; ?>
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