<?php
session_start();

require_once 'conexion.php'; 
include 'Cart.php';

$cart = new Cart;

if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    
    // --- 1. AGREGAR AL CARRITO ---
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        $query = $conn->query("SELECT * FROM products WHERE id = ".$productID);
        $row = $query->fetch_assoc();
        
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

    // --- 2. ACTUALIZAR CANTIDAD ---
    } elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem ? 'ok' : 'err';
        die;

    // --- 3. BORRAR UN ITEM ---
    } elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: ../viewCart.php");
        exit;

    // --- 4. FINALIZAR COMPRA (CORREGIDO) ---
    } elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0){
        
        // a) Obtener ID del cliente (ID 1 por defecto para pruebas)
        $customer_id = isset($_SESSION['sessCustomerID']) ? $_SESSION['sessCustomerID'] : 1;
        
        $total_price = $cart->total();
        $created = date("Y-m-d H:i:s");
        $modified = date("Y-m-d H:i:s");

        // b) Insertar el PEDIDO
        $sql = "INSERT INTO orders (customer_id, total_price, created, modified, status) 
                VALUES ('$customer_id', '$total_price', '$created', '$modified', '1')";
        
        $insertOrder = $conn->query($sql);

        if($insertOrder){
            $orderID = $conn->insert_id; 

            // c) Insertar los PRODUCTOS (SIN unit_price)
            $sql = "";
            $cartItems = $cart->contents();
            
            foreach($cartItems as $item){
                $product_id = $item['id'];
                $quantity = $item['qty'];
                // Ya NO intentamos guardar el precio unitario en la tabla intermedia
                
                $sql .= "INSERT INTO order_items (order_id, product_id, quantity) 
                         VALUES ('$orderID', '$product_id', '$quantity');";
            }

            $insertOrderItems = $conn->multi_query($sql);

            if($insertOrderItems){
                $cart->destroy(); 
                header("Location: ../confirmacionPedido.php?id=$orderID"); 
                exit;
            }else{
                header("Location: ../checkout.php?error=items_fail");
                exit;
            }
        }else{
            header("Location: ../checkout.php?error=order_fail");
            exit;
        }
    }
}
?>