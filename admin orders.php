<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8" />
    <title>order-page</title>
    <link rel="stylesheet" href="order.css" />
</head>
<body>

<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "graduation_project";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// الاستعلام لجلب الطلبات مع أسماء المستخدمين وبيانات المنتجات + رقم الهاتف + معرف العنصر للحذف
$sql = "
   SELECT 
    orders.order_date, 
    ills.FullName AS username, 
    profile.phone AS phone,
    order_items.id AS order_item_id,
    order_items.product_name, 
    order_items.quantity, 
    order_items.price
FROM orders
JOIN ills ON orders.user_id = ills.id
JOIN profile ON profile.user_id = ills.id
JOIN order_items ON order_items.order_id = orders.id
ORDER BY orders.order_date DESC
";

$result = $conn->query($sql);

if (!$result) {
    die("حدث خطأ في الاستعلام: " . $conn->error);
}

// عرض النتائج
echo "<h2>user-orders</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>
        <tr>
            <th>user name</th>
            <th>phone</th>      
            <th>product name</th>
            <th>Quantity</th>
            <th>price</th>
            <th>time</th>
            <th>delet</th>
        </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['username']) . "</td>
                <td>" . htmlspecialchars($row['phone']) . "</td>
                <td>" . htmlspecialchars($row['product_name']) . "</td>
                <td>" . (int)$row['quantity'] . "</td>
                <td>" . number_format((float)$row['price'], 2) . " EGP</td>
                <td>" . $row['order_date'] . "</td>
                <td>
                  <form method='post' action='delete_order_item.php' onsubmit=\"return confirm('هل أنت متأكد من حذف هذا المنتج من الطلب؟');\">
                    <input type='hidden' name='order_item_id' value='" . $row['order_item_id'] . "'>
                    <button type='submit'>delet</button>
                  </form>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>لا توجد طلبات حالياً.</td></tr>";
}

echo "</table>";

// إغلاق الاتصال
$conn->close();
?>

</body>
</html>
