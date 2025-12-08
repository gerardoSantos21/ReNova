<?php
// Verificamos si la sesión ya está iniciada, si no, la iniciamos
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluir configuración de base de datos
require_once 'includes/conexion.php'; 

// Inicializar la clase del carrito
require_once 'includes/Cart.php';
$cart = new Cart;

// Si el carrito está vacío, redirigir al inicio
if($cart->total_items() <= 0){
    header("Location: index.php");
    exit;
}

// --- IMPORTANTE ---
// Establecer ID del cliente en sesión (Tal como en tu ejemplo).
// En un sistema real, esto vendría del Login del usuario.
$_SESSION['sessCustomerID'] = 1;

// Obtener detalles del cliente
$query = $conn->query("SELECT * FROM customers WHERE id = ".$_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - ReNova</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;900&family=Tilt+Warp&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/checkout.css">
</head>
<body>
    <?php require 'includes/header.php'; ?>

    <main class="main-checkout">
        <section class="detalles-pedido">
            <div>
                <div class="detalles-container">
                    <p><span>Contacto</span> <?php echo $custRow['name']; ?></p>
                    <hr>
                    <p><span>Enviar a</span> <?php echo $custRow['address']; ?></p>
                </div>
    
                <h3>Método de envío</h3>
    
                <div class="detalles-container detalles-flex">
                    <div class="envio-detalle">
                        <input type="radio" name="envio" id="envio-estandar" checked>
                        <p>Envío Estándar</p>
                    </div>
                    <p class="bold">Gratis</p>
                </div>
            </div>

            <div class="opciones-checkout">
                <a href="viewCart.php" class="option option2">Volver al carrito</a>
                
                <a href="includes/cartAction.php?action=placeOrder" class="boton boton2">Pagar</a>
            </div>
        </section>

        <aside class="detalles-cart">
            <?php
            if($cart->total_items() > 0){
                $cartItems = $cart->contents();
                foreach($cartItems as $item){
            ?>
                <div class="list-product">
                    <figure class="card-image image-cart image-count-icon">
                        <p class="count-icon"><?php echo $item['qty']; ?></p>
                        <div class="image-product" 
                            style="background-image: url('<?php echo $item['image']; ?>')">
                        </div>
                    </figure>
                
                    <div class="product-info product-info2">
                        <p><?php echo $item['name']; ?></p>
                        <p class="price price2"><?php echo number_format($item['price'], 2); ?> MXN</p>
                        <p style="font-size: 0.8rem; color: #666;">Subtotal: $ <?php echo number_format($item['subtotal'], 2); ?> MXN</p>
                    </div>
                </div>
            <?php 
                } // Fin del foreach
            } 
            ?>
            <div class="cupon-container">
                <input type="text" name="cupon" id="cupon" placeholder="Cupón de descuento">
                <button type="button">Agregar</button>
            </div>

            <div class="resumen-container">
                <div class="resumen-info">
                    <p>Envio</p>
                    <p>Envio Gratis</p>
                </div>
                <div class="resumen-info">
                    <p>Total</p>
                    <p><span>$ <?php echo number_format($cart->total(), 2); ?> MXN</span></p>
                </div>
            </div>
        </aside>
    </main>
    
    <?php // require 'includes/footer.php'; ?>
</body>
</html>