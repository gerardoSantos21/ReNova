<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReNova</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tilt+Warp&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <?php require 'includes/header.php'; ?>

    <div class="hero">
        <div class="hero-content">
            <h2>Tecnología que Rinde.</h2>
            <p>Dale una segunda vida a equipos de cómputo de alto rendimiento. Compra reacondicionado y contribuye a un futuro más verde.</p>
            <a href="#" class="boton">Comprar Ahora</a>
        </div>
    </div>

    <section class="productos">
        <div class="productos-title">
            <h3>Productos Destacados</h3>
            <p>Equipos certificados con el mejor rendimiento garantizado.</p>
        </div>
        <div class="productos-content">
            <?php require 'includes/card.php'; ?>
            <?php require 'includes/card.php'; ?>
            <?php require 'includes/card.php'; ?>
            <?php require 'includes/card.php'; ?>
            <?php require 'includes/card.php'; ?>
            <?php require 'includes/card.php'; ?>
            <?php require 'includes/card.php'; ?>
            <?php require 'includes/card.php'; ?>
        </div>
    </section>

    <section class="banner">
        <div class="banner-container">
            <div class="banner-content">
                <h3>Potencia Asegurada. Ahorro Real.</h3>
                <p>Tu próxima laptop o PC, reacondicionada para rendir al máximo.</p>
                <p class="banner-list-items"><span>Máximo rendimiento:</span> Equipos optimizados para tus tareas diarias.</p>
                <p class="banner-list-items"><span>Gran inversión:</span> Obtén más por tu dinero sin sacrificar calidad.</p>
                <p class="banner-list-items"><span>Testeo completo:</span> Cada producto pasa por un control de calidad.</p>
                <p class="banner-list-items"><span>Soporte dedicado:</span> Estamos aquí para ayudarte antes y después de tu compra.</p>
                <a href="#" class="boton boton2">Ver Modelos Disponibles</a>
            </div>
            <figure>
                <img src="assets/img/imagen2.jpg" alt="imagen2">
            </figure>
        </div>
    </section>

    <section class="comunidad">
        <div class="comunidad-content">
            <h3>La Voz de Nuestra Comunidad</h3>
            <p>Lee las experiencias de quienes ya confían en el rendimiento reacondicionado</p>
            <div class="opiniones-container">
                <div class="opiniones-card">
                    <div class="img-person"></div>
                    <div class="opiniones-calificacion">
                        <img src="assets/img/star.svg" alt="star">
                        <img src="assets/img/star.svg" alt="star">
                        <img src="assets/img/star.svg" alt="star">
                        <img src="assets/img/star.svg" alt="star">
                        <img src="assets/img/middle_star.svg" alt="star">
                    </div>
                    <p>“El ahorro es real”</p>
                    <p>Luisa</p>
                </div>
                <div class="opiniones-card">
                    <div class="img-person person2"></div>
                    <div class="opiniones-calificacion">
                        <img src="assets/img/star.svg" alt="star">
                        <img src="assets/img/star.svg" alt="star">
                        <img src="assets/img/star.svg" alt="star">
                        <img src="assets/img/star.svg" alt="star">
                        <img src="assets/img/star.svg" alt="star">
                    </div>
                    <p>“Totalmente recomendado”</p>
                    <p>Eduardo</p>
                </div>
                <div class="opiniones-card">
                    <div class="img-person person3"></div>
                    <div class="opiniones-calificacion">
                        <img src="assets/img/star.svg" alt="star">
                        <img src="assets/img/star.svg" alt="star">
                        <img src="assets/img/star.svg" alt="star">
                        <img src="assets/img/star.svg" alt="star">
                        <img src="assets/img/middle_star.svg" alt="star">
                    </div>
                    <p>“Me encanta la iniciativa ecológica”</p>
                    <p>María</p>
                </div>
            </div>
        </div>
    </section>

    <?php require 'includes/footer.php'; ?>
</body>
</html>