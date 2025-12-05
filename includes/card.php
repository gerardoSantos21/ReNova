<?php
include './db.Config.php';
$query = $db->query("SELECT * FROM products ORDER BY id DESC LIMIT 10");

if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
?>

    <div class="card-container">
        <figure class="card-image">
            <div class="image-product" 
                 style="background-image: url('<?php echo $row['image_url']; ?>');">
            </div>
        </figure>
        
        <div class="card-info">
            <p><?php echo $row["name"]; ?></p>
            
            <p class="price"><?php echo number_format($row["price"], 2); ?> MXN</p>
        </div>
    </div>
    <?php 
    } 
} else { 
    echo '<p>No hay productos disponibles...</p>'; 
} 
?>