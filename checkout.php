<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "graduation_project";

// إنشاء الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// لو السلة فاضية، رجع المستخدم
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    header("Location: cart.php");
    exit();
}

// تأكد أن المستخدم مسجل دخول
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// التحقق من اكتمال بيانات الملف الشخصي
$checkProfile = $conn->prepare("SELECT phone, address FROM profile WHERE user_id = ?");
$checkProfile->bind_param("i", $user_id);
$checkProfile->execute();
$checkProfile->store_result();

$phone = $address = null;

if ($checkProfile->num_rows > 0) {
    $checkProfile->bind_result($phone, $address);
    $checkProfile->fetch();
}

$checkProfile->close();

// لو البيانات ناقصة، الرجوع لصفحة البروفايل
if (empty($phone) || empty($address)) {
    $_SESSION['checkout_redirect'] = true;
    header("Location: profile.php?error=complete_profile");
    exit();
}

$user_id = $_SESSION['user_id'];
$total = 0;
$order_date = date("Y-m-d H:i:s");
$status = "Pending";

// حساب إجمالي السعر
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

// 1. إدخال الطلب في جدول orders
$sql = "INSERT INTO orders (user_id, order_date, total_price, status) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("فشل في تحضير استعلام orders: " . $conn->error);
}
$stmt->bind_param("isss", $user_id, $order_date, $total, $status);
$stmt->execute();
$order_id = $stmt->insert_id;
$stmt->close();

// 2. إدخال كل عنصر في جدول order_items
foreach ($_SESSION['cart'] as $item) {
    $product_name = (string) $item['name'];
    $quantity = (int) $item['quantity'];
    $price = (float) $item['price'];

    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("فشل في تحضير استعلام order_items: " . $conn->error);
    }
    $stmt->bind_param("isid", $order_id, $product_name, $quantity, $price);
    $stmt->execute();
    $stmt->close();
}


$cart_items = $_SESSION['cart'];
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تأكيد الشراء</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Confirm the order</h2>

    <div class="alert alert-success text-center">
       Thank you! Your request has been submitted successfully.
    </div>

    <h4>Order details:</h4>
    <table class="table table-bordered text-center mt-3">
        <thead class="table-secondary">
        <tr>
            <th>product name</th>
            <th>Quantity</th>
            <th>price</th>
            <th>total</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($cart_items as $item):
            $subtotal = $item['price'] * $item['quantity'];
        ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td><?php echo (int)$item['quantity']; ?></td>
                <td><?php echo number_format((float)$item['price'], 2); ?> EGP</td>
                <td><?php echo number_format($subtotal, 2); ?> EGP</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3"><strong>total price</strong></td>
            <td><strong><?php echo number_format($total, 2); ?> EGP</strong></td>
        </tr>
        </tfoot>
    </table>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-primary">back to home-page</a>
    </div>
</div>
</body>
</html>
