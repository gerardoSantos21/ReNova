<?php
session_start();


include 'Cart.php';
$cart = new Cart;


require_once 'conexion.php'; 


if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        
        $productID = $_REQUEST['id'];
        $qty = $_REQUEST['qty']; 


$productID = intval($_REQUEST['id']); 
$qty = $_REQUEST['qty'];

$query = $conn->query("SELECT * FROM products WHERE id = $productID");
        $row = $query->fetch_assoc();
        

        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'qty' => $qty
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