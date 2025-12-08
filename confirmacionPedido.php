<?php
require_once 'includes/conexion.php'; 
include 'includes/header.php';

if(!isset($_GET['id'])){
    echo "<script>window.location.href='index.php';</script>";
    exit;
}

$order_id = $conn->real_escape_string($_GET['id']);

// 1. INFO GENERAL
$sqlOrder = "SELECT * FROM orders WHERE id = '$order_id'";
$resultOrder = $conn->query($sqlOrder);

if($resultOrder->num_rows > 0){
    $orderInfo = $resultOrder->fetch_assoc();
} else {
    echo "Pedido no encontrado.";
    exit;
}

// 2. PRODUCTOS (CORREGIDO: Traemos p.price desde productos)
$sqlItems = "SELECT oi.*, p.name, p.image_url, p.price 
             FROM order_items oi 
             JOIN products p ON oi.product_id = p.id 
             WHERE oi.order_id = '$order_id'";
$resultItems = $conn->query($sqlItems);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Pago Confirmado</title>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tilt+Warp&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/confirmacionPedido.css">
</head>
<body>
    <div class="pagina-confirmacion">
    <div class="columna-izquierda">
        <img src="assets/img/checkcircle.svg" class="checkmark">
            <h2>Pago Confirmado</h2>
            <p class="orden-numero">ORDEN #<?php echo $orderInfo['id']; ?> </p>
            <p class="mensaje-agradecimiento">¡Gracias por unirte a la tecnología sostenible! El proceso de certificación de tu equipo está completo y estará listo para ser enviado en las próximas 48 horas. Revisa tu bandeja de entrada para futuras actualizaciones.</p>
        <button class="shopping" href="misCompras.php">
            ir a mis compras
        </button>
        <a href="index.php" class="enlace-volver">Volver al inicio<a>
    </div>

    <div class="columna-derecha">
<h3 class="resumen-titulo">Resumen de Pedido</h3>
        
        <div class="productos-scroll-box">
            <div class="lista-productos">
                <?php
                if($resultItems && $resultItems->num_rows > 0){
                    while($item = $resultItems->fetch_assoc()){
                ?>
                <div class="item-producto">
                    <img src="<?php echo $item['image_url']; ?>" alt="Producto" class="foto-producto">
                    <div class="detalle-producto">
                        <p class="nombre"><?php echo $item["name"]; ?></p>
                        <p class="cantidad">Cantidad: <?php echo $item["quantity"]; ?></p>
                    </div>
                    <span class="precio-individual"><?php echo '$'.$item["price"].' MX'; ?></span>
                </div>
                <?php 
                    } 
                } else { ?>
                <p>No se encontraron detalles.</p>
                
                <p>Error: No se encontraron artículos en la sesión.</p>
                <?php } ?>
            </div>
        </div>

        <div class="resumen-pago">
            <div class="fila"><span class="etiqueta">Subtotal</span>
            <span class="valor">$<?php echo number_format($orderInfo['total_price'], 2); ?> MXN</span>
        </div>
            <div class="fila"><span class="etiqueta">Envío</span>
            <span class="valor">Envío Gratis</span>
        </div>
            <hr class="divisor">
            <div class="fila total"><span class="etiqueta-pago">Pago</span><span class="valor pago-total">$<?php echo number_format($orderInfo['total_price'], 2); ?> MXN</span>
            </div>
        </div>
    </div>

</div>
</body>
</html>