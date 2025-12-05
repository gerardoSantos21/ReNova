<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
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
            <img src="assets/img/apple-iphone-16-plus.png" alt="iphone 16">
</div>  

<div class="marketing-text">
    <p class="txt">Equipo certificado y revisado al 100%. Rendimiento asegurado para tus tareas más exigentes</p>
    <p class="txtx">🚚 ENVIO GRATIS</p>
</div>
</section>

<section class="col-right">
        <div class="product-header">
            <h2>iPhone 16</h2>
</div>

        <div class="purchase-content">
    <div class="product-info">
            <p class="price">$ 13,999 MXN</p>
<div class="qty-selector">
                <label>Cantidad</label>
                <div class="qty-input">
                    <button type="button">-</button>
                    <input type="number" value="1" min="1">
                    <button type="button">+</button>
                </div>
            </div>
        </div>

    <form class="carrito" method="POST">


        <div class="garantia-type">
            
            <label class="option-card">
                        <input type="radio" name="tipo-compra" value="unica">
                            <span>Compra Única</span>
            </label>

<label class="option-card2">
    <input type="radio" name="tipo-compra" value="garantia" >
    <span>Garantía Extendida</span>
    
    <select name="plazo" class="select-plazo">
            <option value="3">3 Meses</option>
            <option value="6">6 Meses</option>
            <option value="12">12 Meses</option>
        </select>
            <p class="small-text">Añade meses extra de garantía y obtén un 10% de descuento en accesorios.</p>
</label>

<div class="contenedor-cart">
                <img src="assets/img/cart.svg" class="cart">
                <button type="submit" class="add">Agregar al Carrito</button>
                </div>
            </form>
        </div>
</div>



                
<div class="especific-box">
            <p><strong>Condición:</strong> Grado A+ (Como nuevo).</p>
            <p><strong>Certificación:</strong> 30+ puntos de inspección y prueba de componentes</p>
            <p><strong>Especificaciones:</strong> Chip A16 Bionic, 6GB RAM, 128GB</p>
        </div>
        </section>

    </main>

    <?php require 'includes/footer.php'; ?>

</body>
</html>