<?php
$query = "SELECT * FROM products WHERE status = '1' ORDER BY id DESC";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){ 
    while($row = mysqli_fetch_assoc($result)){ 
?>

    <div class="card-container" style="position: relative;">
        
        <figure class="card-image">
            <div class="image-product" 
                style="background-image: url('<?php echo $row['image_url']; ?>');">
            </div>
        </figure>
        
        <div class="card-info">
            <p><?php echo $row["name"]; ?></p>
            <p class="price"> <?php echo number_format($row["price"], 2); ?> MXN</p>
        </div>

        <a href="producto.php?id=<?php echo $row['id']; ?>" 
        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 10; cursor: pointer;">
        </a>

    </div>

<?php 
    } 
} else { 
    echo '<p>No hay productos disponibles...</p>'; 
} 
?>