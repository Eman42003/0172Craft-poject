<?php
// اتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "graduation_project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_item_id'])) {
    $order_item_id = intval($_POST['order_item_id']);

    // حذف العنصر من order_items
    $sql = "DELETE FROM order_items WHERE id = $order_item_id";

    if ($conn->query($sql) === TRUE) {
        // نجاح الحذف، إعادة التوجيه إلى صفحة الطلبات
        header("Location: admin orders.php"); // عدل حسب اسم صفحة العرض عندك
        exit;
    } else {
        echo "حدث خطأ أثناء الحذف: " . $conn->error;
    }
} else {
    echo "معرف العنصر غير موجود.";
}

$conn->close();
?>
