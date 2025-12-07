<?php
require_once 'includes/conexion.php'; 

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "SELECT * FROM products WHERE id = '$id' AND status = '1'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        

        $stock_actual = isset($product['stock']) ? $product['stock'] : 0; 
        
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tilt+Warp&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/producto.css">
</head>
<body>
    <?php require 'includes/header.php'; ?>

    <main class="product-container">

    <section class="col-left">
        <div class="producto-img">
            <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>">
            </div>

<div class="marketing-text">
    <p class="txt">Equipo certificado y revisado al 100%. Rendimiento asegurado para tus tareas más exigentes</p>
    <p class="txtx">🚚 ENVIO GRATIS</p>
</div>
</section>

<section class="col-right">
        <div class="product-header">
            <h2><?php echo $product['name']; ?></h2>
</div>

    <div class="purchase-content">
        <div class="product-info">
            <p class="price">$ <?php echo number_format($product['price'], 2); ?> MXN</p>
                <div class="qty-selector">
                    <label>Cantidad</label>
                    <div class="qty-input">
                    <button type="button" id="btn-menos">-</button>
                    <input type="number" 
                            value="1" 
                            min="1" 
                            max="<?php echo $stock_actual; ?>" 
                            id="cantidad" 
                            readonly>
                    <button type="button" id="btn-mas">+</button>
                    
                </div>
            </div>
        </div>

<form class="carrito" method="POST" action="includes/cartAction.php">

    <input type="hidden" name="action" value="addToCart"> <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    
    <input type="hidden" name="qty" id="hidden-qty" value="1"> 

    <div class="garantia-type">
        <label class="option-card">
            <input type="radio" name="tipo-compra" value="unica" checked>
            <span>Compra Única</span>
        </label>
        
        <label class="option-card2" style="opacity: 0.5; pointer-events: none;">
            <input type="radio" name="tipo-compra" value="garantia" disabled>
            <span>Garantía (Próximamente)</span>
        </label>
        
        <?php if ($stock_actual > 0): ?>
            <button type="submit" class="add">
                <img src="assets/img/cart.svg" class="cart" alt="carrito">
                Agregar al Carrito
            </button>
        <?php else: ?>
            <button type="button" class="add" style="background-color: #ccc;" disabled>AGOTADO</button>
        <?php endif; ?>
    </div>
</form>
        </div>
</div>




<div class="especific-box">
            <p><?php echo nl2br($product['description']); ?></p>
        </div>
        </section>

    </main>

    <?php require 'includes/footer.php'; ?>
<script>
        const inputCantidad = document.getElementById('cantidad');
        const hiddenQty = document.getElementById('hidden-qty'); // El input oculto dentro del form
        const btnMas = document.getElementById('btn-mas');
        const btnMenos = document.getElementById('btn-menos');

        btnMas.addEventListener('click', () => {
            let valorActual = parseInt(inputCantidad.value);
            // Leemos el máximo permitido desde el HTML
            let stockMaximo = parseInt(inputCantidad.getAttribute('max'));

            if (valorActual < stockMaximo) {
                let nuevoValor = valorActual + 1;
                inputCantidad.value = nuevoValor;
                if(hiddenQty) hiddenQty.value = nuevoValor; // Actualiza el dato que se enviará
            } else {
                alert("¡Lo sentimos! Solo tenemos " + stockMaximo + " unidades disponibles.");
            }
        });

        btnMenos.addEventListener('click', () => {
            let valorActual = parseInt(inputCantidad.value);
            if (valorActual > 1) {
                let nuevoValor = valorActual - 1;
                inputCantidad.value = nuevoValor;
                if(hiddenQty) hiddenQty.value = nuevoValor; 
            }
        });
        
        inputCantidad.addEventListener('change', () => {
            if(hiddenQty) hiddenQty.value = inputCantidad.value;
        });
    </script>
    
</body> 
</html>