<?php
include 'Cart.php';
$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tilt+Warp&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/viewCart.css">
</head>
<body>
    <?php require 'includes/header.php'; ?>

    <main class="main-carrito">
        <h2>Tu Carrito de Compras</h2>
        <a href="index.php" class="option">Continuar Comprando</a>
        <div class="list">
            <h4 class="Producto">Producto</h4>
            <h4 class="Precio"">Precio</h4>
            <h4 class="Cantidad">Cantidad</h4>
            <h4 class="Subtotal">Subtotal</h4>
            <div class="list-product">
                <figure class="card-image image-cart">
                    <div class="image-product" 
                        style="background-image: url('assets/img/apple-iphone-16-plus.png')">
                    </div>
                </figure>
    
                <div class="product-info">
                    <p>iPhone 16</p>
                    <a href="#" class="option option2">Eliminar</a>
                </div>
            </div>
    
            <p>$ 13,999</p>
            
            <input type="number" name="qty" id="qty" value="1">
    
            <p>$ 13,999</p>
        </div>

        <section class="seccion-pago">
            <p><span>Total:</span> $13,999 MXN</p>
            <a href="checkout.php" class="boton boton2">Finalizar Compra</a>
        </section>
    </main>

    <?php require 'includes/footer.php'; ?>
</body>
</html>