<?php
session_start();


include 'Cart.php';
$cart = new Cart;


require_once 'conexion.php'; 


if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    
    // En cartAction.php
if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
    $productID = $_REQUEST['id'];
    // get product details
    $query = $conn->query("SELECT * FROM products WHERE id = ".$productID);
    $row = $query->fetch_assoc();
    
    // Verificamos si viene una cantidad del formulario, si no, usamos 1 por defecto
    $qty = (isset($_REQUEST['qty']) && !empty($_REQUEST['qty'])) ? $_REQUEST['qty'] : 1;
    
    $itemData = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'price' => $row['price'],
        'qty' => $qty,
        'image' => $row['image_url']
    );
    
    $insertItem = $cart->insert($itemData);

        $redirectLoc = $insertItem ? '../viewCart.php' : '../index.php';
        header("Location: ".$redirectLoc);
        exit;

    } elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){

        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem ? 'ok' : 'err';
        die;

    } elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){

        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: ../viewCart.php");
        exit;
    }
}