<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    
    $product = [
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'image' => $product_image,
        'quantity' => 1
    ];

    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity']++;
            $found = true;
            break;
        }
    }

    
    if (!$found) {
        $_SESSION['cart'][] = $product;
    }

    
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
