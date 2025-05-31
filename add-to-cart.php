<?php
session_start();

// تأكد إن الطلب جاي عن طريق POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // استقبل بيانات المنتج من الفورم
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    // جهّز بيانات المنتج كأري
    $product = [
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'image' => $product_image,
        'quantity' => 1
    ];

    // أنشئ سلة المشتريات لو مش موجودة
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // لو المنتج موجود بالفعل في السلة، زوّد الكمية
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity']++;
            $found = true;
            break;
        }
    }

    // لو مش موجود، ضيفه
    if (!$found) {
        $_SESSION['cart'][] = $product;
    }

    // رجّع المستخدم للصفحة اللي كان فيها
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
