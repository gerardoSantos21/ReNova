<?php
// Incluimos la clase del carrito y creamos la instancia
include 'Cart.php';
$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito - ReNova</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;900&family=Tilt+Warp&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/viewCart.css">
    
    <script>
    function updateCartItem(obj, id){
        // Usamos fetch (JavaScript moderno) en lugar de jQuery para no cargar librerías extra
        const qty = obj.value;
        fetch(`includes/cartAction.php?action=updateCartItem&id=${id}&qty=${qty}`)
            .then(response => response.text())
            .then(data => {
                if(data.trim() == 'ok'){
                    location.reload(); // Recarga la página para ver los nuevos totales
                } else {
                    alert('Error al actualizar el carrito, intenta de nuevo.');
                }
            });
    }
    </script>
</head>
<body>
    <?php require 'includes/header.php'; ?>

    <main class="main-carrito">
        <h2>Tu Carrito de Compras</h2>
        <a href="index.php" class="option">Continuar Comprando</a>
        
        <?php if($cart->total_items() > 0): ?>
            <div class="list">
                <h4 class="Producto">Producto</h4>
                <h4 class="Precio">Precio</h4>
                <h4 class="Cantidad">Cantidad</h4>
                <h4 class="Subtotal">Subtotal</h4>
                
                <?php
                // Obtenemos los items del carrito de la sesión
                $cartItems = $cart->contents();
                foreach($cartItems as $item): 
                ?>
                    <div class="list-product">
                        <figure class="card-image image-cart">
                            <div class="image-product" 
                                style="background-image: url('<?php echo $item['image']; ?>')">
                                </div>
                        </figure>
            
                        <div class="product-info">
                            <p><?php echo $item["name"]; ?></p>
                            <a href="includes/cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" 
                               class="option option2" 
                               onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</a>
                        </div>
                    </div>
            
                    <p>$ <?php echo number_format($item["price"], 2); ?></p>
                    
                    <input type="number" 
                           name="qty" 
                           value="<?php echo $item["qty"]; ?>" 
                           onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"
                           style="width: 60px; padding: 5px;">
            
                    <p>$ <?php echo number_format($item["subtotal"], 2); ?></p>
                    <?php endforeach; ?>
            </div>

            <section class="seccion-pago">
                <p><span>Total:</span> $<?php echo number_format($cart->total(), 2); ?> MXN</p>
                <a href="checkout.php" class="boton boton2">Finalizar Compra</a>
            </section>

        <?php else: ?>
            <div style="text-align: center; margin: 50px 0;">
                <p>Tu carrito está vacío.</p>
                <br>
                <a href="index.php" class="boton">Ir a la tienda</a>
            </div>
        <?php endif; ?>

    </main>

    <?php require 'includes/footer.php'; ?>
</body>
</html>